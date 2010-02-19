<p>An <i>incomplete</i> collection of personal, work-related, and school-related projects that I have worked on in the past.</p><br/>

<script type="text/javascript">
    $(document).ready(function() {
        $("#accordion").accordion({
            autoHeight: false
        });

        $("#open_rfidBlockDiagram").click(function() { 
            $("#rfidBlockDiagram").dialog({ 
                bgiframe: true,
                modal: true,
                width: 575,
                resizeable: false,
                buttons: {
                    Close: function() {
                        $(this).dialog("close");
                    }
                }
            });
            $("#rfidBlockDiagram").dialog("open"); 
        });
    });
</script>

<div id="accordion">
    <h3><a href="#">Research/Published Papers</a></h3>
    <div>
        <ul>
            <li>Application Based TCP Hijacking (ABTH)</li>
            <dl>
                <dt>Paper:</dt>
                <dd>
                    <?php echo $html->link('ACM Portal', 'http://portal.acm.org/citation.cfm?id=1519144.1519146'); ?>
                </dd>

                <dt>Co-Authors:</dt>
                <dd><?php echo $html->link('Dr. Konstantin Beznosov', 'http://konstantin.beznosov.net');?> and <?php echo $html->link('Oliver Zheng', 'http://oliverzheng.com');?></dd>

                <dt>Description:</dt>
                <dd><p>By exploiting flaws between the interplay of TCP and application-level protocols, ABTH was capable of quiety injecting TCP packets. In the case of Windows Live Messenger and its underlying protocol (Microsoft Notification Protocol), by using ABTH, an attacker was capable of impersonating anybody of his/her choosing and start a conversation with the victim. Read the paper for more details.</p>
                    <p>ABTH had its beginnings as a course project for <?php echo $html->link('EECE412', 'http://courses.ece.ubc.ca/412/'); ?> and would eventually be published in the Proceedings of <?php echo $html->link('EuroSec 2010', 'http://www.ics.forth.gr/dcs/eurosec09/'); ?>. As an added bonus, we were invited to present our findings at the workshop in Nuremberg, Germany.
            </dl>
        </ul>
    </div>
    <h3><a href="#">Embedded Software</a></h3>
    <div>
        <ul>
            <li>RFID Library Management System</li>
            <dl>
                <dt>Sourcecode:</dt>
                <dd><?php echo $html->link('GitHub', 'http://github.com/jpoon/eece375'); ?></dd>

                <dt>Languages:</dt>
                <dd>C, PHP</dd>

                <dt>Groupmates:</dt>
                <dd>Adnan Jiwani, Jay Wakefield, Manasi Kulkarni, Mohammed Taher</dd>

                <dt>Description:</dt>
                <dd><p>The RFID Library Management System was a project created for <?php echo $html->link('EECE375', 'http://courses.ece.ubc.ca/474/'); ?>. In essence, we built a remote handheld device capable of reading RFID-tagged books where the handheld unit would communicate to base station via Zigbee. As pictures are typically worth a thousand words, here's a <?php echo $html->link('system block diagram', '#', array('id' => 'open_rfidBlockDiagram')); ?>.</p>
                </dd>
            </dl>
        </ul>

        <div id="rfidBlockDiagram" style="display:none;" title="RFID Library Management System - Block Diagram">
            <center>
               <?php echo $html->image("rfidLibrary_BlockDiagram.png", array(
                        'alt' => 'RFID Library Managment System',
                        'height' => '550px')); ?>
            </center>
        </div>

    </div>
    <h3><a href="#">Web Development</a></h3>
    <div>
        <ul>
            <li>Windows Mobile for Developers</li>
            <dl>
                <dt>Website:</dt>
                <dd><?php echo $html->link('developer.windowsmobile.com', 'http://developer.windowsmobile.com');?></dd>

                <dt>Languages:</dt>
                <dd>ASP.NET, ASP.NET AJAX Control Toolkit, C#, Javascript, CSS</dd>

                <dt>Description:</dt>
                <dd>Although the look-and-feel of the webpage has changed considerably, as an intern at Microsoft, I had the opportunity to work on the developers portal for the Windows Mobile App Store.</dd>
            </dl>
 
            <li>UBC Badminton Club</li>
            <dl>
                <dt>Website:</dt>
                <dd><?php echo $html->link('www.ams.ubc.ca/clubs/badminton', 'http://www.ams.ubc.ca/clubs/badminton')?></dd>

                <dt>Languages:</dt>
                <dd>PHP, Python, Google App Engine SDK, Javascript (JQuery), CSS, WordPress</dd>

                <dt>Description:</dt>
                <dd><p>When I became the webmaster for the UBC Badminton Club, I inherited a webpage that looked similar to <?php echo $html->link('this', 'http://www.chimesdesign.com/fugly_site/index.html')?>. As my eyes were beginning to bleed, I completely redesigned the webpage to <?php echo $html->link('have a more simplistic theme', 'http://www.ams.ubc.ca/clubs/badminton/old')?>. As the webpage would be passed on to future executives of the badminton club who may or may not have knowledge in PHP, I focused on writing easily understandable code such that anyone without the necessary web knowledge could update the website. Unfortunately, this assumption was horribly wrong so I redesigned the website <?php echo $html->link('again', 'http://www.ams.ubc.ca/clubs/badminton')?> this time using Wordpress.</p>
                    <p>Every year, the UBC Badminton Club has a membership drive. As paper forms = chaos and online registration != chaos, I created an online registration system which resulted in app engine = awesome. Although you require the UBC Badminton credentials to login, the registration system is hosted at <?php echo $html->link('ubc-badm.appspot.com/register', 'http://ubc-badm.appspot.com/register')?>.</p></dd>
            </dl>

            <li>Jeanette Ball Dance</li>
            <dl>
                <dt>Website:</dt>
                <dd><?php echo $html->link('jeanetteballdance.com', 'http://www.jeanetteballdance.com');?></dd>

                <dt>Languages:</dt>
                <dd>ASP.NET, C#, Javascript, CSS</dd>

                <dt>Description:</dt>

                <dd>I offered my dance teacher help in redesign her webpage. If you are ever in need of ballroom dance lessons in the Seattle area, I'd recommend Jeanette Ball</dd>
            </dl>
 
        </ul>
    </div>
    <h3><a href="#">Scripting</a></h3>
    <div>
        <ul>
            <li>VPN</li>
            <dl>
                <dt>Sourcecode:</dt>
                <dd><?php echo $html->link('vpn.tcl', 'http://www.jasonpoon.ca/files/vpn.tcl'); ?></dd>

                <dt>Languages:</dt>
                <dd>Tcl/Tk</dd>

                <dt>Description:</dt>
                <dd>Created a VPN client that would establish a secure connection using AES for encryption and an MD5 hash and message sequence number for data integrity.</dd>
            </dl>

            <li>Bootstrap Service</li>
            <dl>
                <dt>Sourcecode:</dt>
                <dd><?php echo $html->link('bootstrap.sh', '/pages/portfolio/bootstrap'); ?></dd>

                <dt>Languages:</dt>
                <dd>Bash</dd>

                <dt>Description:</dt>
                <dd>Bootstrap script is used to install and execute certain instructions on a set of machines. To be precise, this script will install various programs (e.g. make, gcc, git, etc.), clone multiple git repositories, and from within the newly downloaded repositories, start a server</dd>
            </dl>


            <li>Website Updater</li>
            <dl>
                <dt>Sourcecode:</dt>
                <dd><?php echo $html->link('ftp_update.zip', 'http://www.jasonpoon.ca/files/ftp_update.zip'); ?></dd>

                <dt>Languages:</dt>
                <dd>Batch File (cmd.exe)</dd>

                <dt>Description:</dt>
                <dd>It was irritating having to open up an FTP client to manually drag each and every updated file to the web server. I eventually got fed up and wrote this batch script which would essentially grab all the files in a certain directory and upload them to the web server with a single click of the mouse.</dd>

            </dl>

            <li>Bulk File Renamer</li>
            <dl>
                <dt>Sourcecode:</dt>
                <dd><?php echo $html->link('music-rename.pl', '/pages/portfolio/music-rename'); ?></dd>

                <dt>Languages:</dt>
                <dd>Perl</dd>

                <dt>Description:</dt>
                <dd>As I'm a rather organized individual, I require that my music files be nicely titled in a certain format, namely "[Author] - [Song Title]". Created a perl script that would go through my music renaming my files to follow this format.</dd>
            </dl>
    </div>
</div>

