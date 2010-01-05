# ----------------------------------------------------------
#  Virtual Private Network
#     Encryption - AES
#     Data Integrity - MD5 hash, message sequence number
#  Submitted by Jason Poon, Oliver Zheng, Daniel Dent
# ----------------------------------------------------------

package require Tk 8.4
package require Iwidgets
package require aes
package require md5

set endServer 0
namespace eval vpn {
   variable mseq_send 1000
   variable mseq_received 1000
   variable mseq_previous 999
}

# read msg from socket
proc vpn::ReadMsg {sockChan clientaddr clientport} {
    .log_scrolledtext insert end "+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+\n"
    .log_scrolledtext insert end "MESSAGE FROM $clientaddr\n"
    gets $sockChan iv
    gets $sockChan paddingLength
    gets $sockChan binaryCipherText
    gets $sockChan hash
    flush $sockChan
    close $sockChan
    .log_scrolledtext insert end "Received IV:                    $iv\n"
    
    # aes
    set cipherText [binary format b* $binaryCipherText]
    .log_scrolledtext insert end "Received ciphertext:        $cipherText\n"
    set Key [aes::Init cbc $::SHARED_SECRET $iv]
    aes::Reset $Key $iv
    set plaintext [aes::Decrypt $Key $cipherText]
    aes::Final $Key
    
    # remove padding
    set plaintext [string range $plaintext 0 end-$paddingLength]
    
    # mseq
    set vpn::mseq_received [string range $plaintext end-3 end]
    .log_scrolledtext insert end "MSEQ of received msg:    $vpn::mseq_received\n"
    if {$vpn::mseq_received != [incr vpn::mseq_previous]} {
      .log_scrolledtext insert end "WARNING: MSEQ of message does not match. Possible replay attack.\n"
    }
    
    # plaintext
    set plaintext [string range $plaintext 0 end-4]
    .log_scrolledtext insert end "Decrypted message:         $plaintext\n"
    
    # check md5 hash
    set msgHash [md5::md5 -hex $plaintext]
    
    .log_scrolledtext insert end "MD5 Hash of message:     $msgHash\n"
    if {$hash != $msgHash} {
        .log_scrolledtext insert end "ERROR: MD5 Hash does not match. Data integrity may have been lost."
    } else {
        .recievedtext_entry clear
        .recievedtext_entry insert 0 $plaintext
    }
    .log_scrolledtext see end
}

# open listening socket
proc vpn::OpenServer {port} {
    if {[catch {socket -server vpn::ReadMsg $port}]} {
        .log_scrolledtext insert end "ERROR: port $port is already in use. This error may have been caused by the previous SERVER/CLIENT not end properly. Please end VPN using the \"Exit\" buttons. Terminate all running processes named \"wish\" to proceed.\n"
    }
    vwait $::endServer
}

# open connection to server and send msg
proc vpn::SendMsg {ip port msg} {
    .log_scrolledtext insert end "+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+\n"
    
    # iv
    set alphanum [list a b c d e f g h i j k l m n o p q r s t u v w x y z 0 1 2 3 4 5 6 7 8 9]
    set iv ""
    for {set ivLength 0} {$ivLength < 16} {incr ivLength} {
        set letter [lindex $alphanum [expr {int(rand()*[llength $alphanum])}]]
        append iv $letter
    }
    .log_scrolledtext insert end "Generating random IV:          $iv\n"
    
    # md5 hash
    set hash [md5::md5 -hex $msg]
    
    # append MSG Sequence number
    append msg $vpn::mseq_send
    .log_scrolledtext insert end "MSEQ of sent message:       $vpn::mseq_send\n"
    .log_scrolledtext insert end "Message appended w/ MSEQ:   $msg\n"
    incr vpn::mseq_send
    
    
    # padding
    set msgLen [string length $msg]
    set paddingLen [expr 16-int(fmod($msgLen,16))]
    append msg [string repeat 0 $paddingLen]
    .log_scrolledtext insert end "Padding message with '0's:   $msg\n"

    # aes
    set Key [aes::Init cbc $::SHARED_SECRET $iv]
    set ciphertext [aes::Encrypt $Key $msg]
    binary scan $ciphertext b* binaryciphertext
    aes::Final $Key
    .log_scrolledtext insert end "Ciphertext to be sent:             $ciphertext\n"
    
    .log_scrolledtext insert end "MD5 hash of message:          $hash\n"
    .log_scrolledtext insert end "MESSAGE HAS BEEN SENT\n"
    set sockChan [socket $ip $port]
    puts $sockChan $iv
    puts $sockChan $paddingLen
    puts $sockChan $binaryciphertext
    puts $sockChan $hash
    close $sockChan
    .log_scrolledtext see end
}

# ---------------------------

namespace eval gui {}

proc gui::ui {root args} {
    # this handles '.' as a special case
    set base [expr {($root == ".") ? "" : $root}]
    variable ROOT $root
    variable BASE $base
    variable SCRIPTDIR ; # defined in main script


    # Widget Initialization
    variable config_frame [labelframe $BASE.config_frame \
	    -text "Configurations"]
    variable messaging_frame [labelframe $BASE.messaging_frame \
	    -text "Messaging"]
    variable serverip_label [label $BASE.serverip_label \
	    -text "Server IP"]
    variable serverport_label [label $BASE.serverport_label \
	    -text "Server Port"]
    variable serverport_label [label $BASE.clientip_label \
	    -text "Client IP"]
    variable serverport_label [label $BASE.clientport_label \
	    -text "Client Port"]
    variable sharedsecret_label [label $BASE.sharedsecret_label \
	    -text "16-ltr Shared Key"]
    variable serverip_entry [iwidgets::entryfield $BASE.serverip_entry]
    variable serverport_entry [iwidgets::entryfield $BASE.serverport_entry]
    variable clientip_entry [iwidgets::entryfield $BASE.clientip_entry]
    variable clientport_entry [iwidgets::entryfield $BASE.clientport_entry]
    variable sharedsecret_entry [iwidgets::entryfield $BASE.sharedsecret_entry]
    variable sendBut [button $BASE.sendBut \
	    -command [namespace code [list sendBut_command]] \
	    -text "Send"]
    variable mode_label [label $BASE.mode_label \
	    -text "Mode of Operation"]
    variable mode_optionmenu [iwidgets::optionmenu $BASE.mode_optionmenu \
        -command [namespace code [list mode_optionmenu_command]]]
    .mode_optionmenu insert 0 Server Client
    variable setup_but [button $BASE.setup_but \
	    -command [namespace code [list setup_but_command]] \
	    -text "Setup"]
    variable exit_but [button $BASE.exit_but \
	    -command [namespace code [list exit_but_command]] \
	    -text "Exit"]
    variable sendtext_entry [iwidgets::entryfield $BASE.sendtext_entry \
	    -command [namespace code [list sendtext_entry_command]]]
    variable recievedtext_entry [iwidgets::entryfield $BASE.recievedtext_entry]
    variable sendtext_label [label $BASE.sendtext_label \
	    -text "Data to be Sent"]
    variable receivedtext_label [label $BASE.receivedtext_label \
	    -text "Last received msg"]
    variable log_frame [labelframe $BASE.log_frame \
	    -text "Log"]
    variable log_scrolledtext [iwidgets::scrolledtext $BASE.log_scrolledtext \
	    -visibleitems "60x15"]


    # Geometry Management
    grid $BASE.config_frame -in $root -row 1 -column 1 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky "news"
    grid $BASE.messaging_frame -in $root -row 1 -column 2 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky "news"
    grid $BASE.serverip_label -in $base.config_frame -row 2 -column 1 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.serverport_label -in $base.config_frame -row 3 -column 1 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.clientip_label -in $base.config_frame -row 4 -column 1 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.clientport_label -in $base.config_frame -row 5 -column 1 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.sharedsecret_label -in $base.config_frame -row 6 -column 1 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.serverip_entry -in $base.config_frame -row 2 -column 2 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.serverport_entry -in $base.config_frame -row 3 -column 2 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.clientip_entry -in $base.config_frame -row 4 -column 2 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.clientport_entry -in $base.config_frame -row 5 -column 2 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.sharedsecret_entry -in $base.config_frame -row 6 -column 2 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.sendBut -in $base.messaging_frame -row 3 -column 2 \
	    -columnspan 2 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.mode_label -in $base.config_frame -row 1 -column 1 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.mode_optionmenu -in $base.config_frame -row 1 -column 2 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.setup_but -in $root -row 2 -column 1 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.exit_but -in $root -row 2 -column 3 \
	    -columnspan 1 \
	    -ipadx 8 \
	    -ipady 0 \
	    -padx 0 \
	    -pady 0 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.sendtext_entry -in $base.messaging_frame -row 2 -column 2 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.recievedtext_entry -in $base.messaging_frame -row 1 -column 2 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.sendtext_label -in $base.messaging_frame -row 2 -column 1 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.receivedtext_label -in $base.messaging_frame -row 1 -column 1 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
    grid $BASE.log_frame -in $root -row 1 -column 3 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky "news"
    grid $BASE.log_scrolledtext -in $base.log_frame -row 1 -column 1 \
	    -columnspan 1 \
	    -rowspan 1 \
	    -sticky ""
        
    # Resize Behavior
    grid rowconfigure $root 1 -weight 0 -minsize 40 -pad 0
    grid rowconfigure $root 2 -weight 0 -minsize 40 -pad 0
    grid columnconfigure $root 1 -weight 0 -minsize 40 -pad 0
    grid columnconfigure $root 2 -weight 0 -minsize 40 -pad 0
    grid rowconfigure $base.config_frame 1 -weight 0 -minsize 40 -pad 0
    grid rowconfigure $base.config_frame 2 -weight 0 -minsize 40 -pad 0
    grid rowconfigure $base.config_frame 3 -weight 0 -minsize 40 -pad 0
    grid rowconfigure $base.config_frame 4 -weight 0 -minsize 40 -pad 0
    grid rowconfigure $base.config_frame 5 -weight 0 -minsize 40 -pad 0
    grid rowconfigure $base.config_frame 6 -weight 0 -minsize 40 -pad 0    
    grid columnconfigure $base.config_frame 1 -weight 0 -minsize 40 -pad 0
    grid columnconfigure $base.config_frame 2 -weight 0 -minsize 40 -pad 0
    grid rowconfigure $base.messaging_frame 1 -weight 0 -minsize 40 -pad 0
    grid rowconfigure $base.messaging_frame 2 -weight 0 -minsize 40 -pad 0
    grid rowconfigure $base.messaging_frame 3 -weight 0 -minsize 40 -pad 0
    grid columnconfigure $base.messaging_frame 1 -weight 0 -minsize 40 -pad 0
    grid columnconfigure $base.messaging_frame 2 -weight 0 -minsize 40 -pad 0
    grid rowconfigure $base.log_frame 1 -weight 0 -minsize 40 -pad 0
    grid columnconfigure $base.log_frame 1 -weight 0 -minsize 40 -pad 0
    
    # default values
    .serverip_entry insert 0 "N/A"    
    .serverport_entry insert 0 54321
    .clientip_entry insert 0 "localhost"    
    .clientport_entry insert 0 54322
    .sharedsecret_entry insert 0 "16_letter_secret"

}

proc gui::mode_optionmenu_command args {
    set MODE [.mode_optionmenu get]
    if {$MODE == "Server"} {
        .serverip_entry clear  
        .serverport_entry clear
        .clientip_entry clear
        .clientport_entry clear
        .serverip_entry insert 0 "N/A"    
        .serverport_entry insert 0 54321
        .clientip_entry insert 0 "localhost"    
        .clientport_entry insert 0 54322
    } elseif {$MODE == "Client"} {
        .serverip_entry clear  
        .serverport_entry clear
        .clientip_entry clear
        .clientport_entry clear
        .serverip_entry insert 0 "localhost"    
        .serverport_entry insert 0 54321
        .clientip_entry insert 0 "N/A"    
        .clientport_entry insert 0 54322
    }
}
proc gui::exit_but_command args {
    global endServer
    set endServer 1
    exit
}


proc gui::sendBut_command args {
    set sendtext [.sendtext_entry get]
    if {$::MODE == "Client"} {
        vpn::SendMsg $::SERVER_IP $::SERVER_PORT $sendtext
    } else {
        vpn::SendMsg $::CLIENT_IP $::CLIENT_PORT $sendtext
    }
}


proc gui::setup_but_command args {
    global MODE SERVER_IP SERVER_PORT SHARED_SECRET CLIENT_IP CLIENT_PORT
    set MODE [.mode_optionmenu get]
    set SERVER_IP [.serverip_entry get]
    set SERVER_PORT [.serverport_entry get]
    set CLIENT_IP [.clientip_entry get]
    set CLIENT_PORT [.clientport_entry get]
    set SHARED_SECRET [.sharedsecret_entry get]

    if {[string length $SHARED_SECRET] != 16} {
        .log_scrolledtext insert end "Configuration Error: Shared Secret is not 16 characters long.\n"
    } else {
        .log_scrolledtext insert end "Setup OK\n"
        if {$MODE == "Server"} {
            vpn::OpenServer $::SERVER_PORT
        } elseif {$MODE == "Client"} {
            vpn::OpenServer $::CLIENT_PORT
        }

    }
}

proc gui::init {root args} {
    # Catch this in case the user didn't define it
    catch {gui::userinit}
    if {[info exists embed_args]} {
	# we are running in the plugin
	gui::ui $root
    } elseif {$::argv0 == [info script]} {
	# we are running in stand-alone mode
	wm title $root "Jason Poon/ Oliver Zheng/ Daniel Dent"
	if {[catch {
	    # Create the UI
	    gui::ui  $root
	} err]} {
	    bgerror $err ; exit 1
	}
    }
    catch {gui::run $root}
}

gui::init .
