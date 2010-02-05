<p>An incomplete collection of personal, work-related, and school-related projects that I have worked on in the past.</p><br/>

<?php
#    echo $javascript->link('sh/shCore');
#    echo $javascript->link('sh/shBrushJScript');
#    echo $javascript->codeBlock('SyntaxHighlighter.all()');
#    echo $html->css('shCore');
#    echo $html->css('shThemeDefault');
?>
<!--	
<pre class="brush: js">
    /**
     * SyntaxHighlighter
     */
    function foo()
    {
        // it works!
    }
</pre>
-->

<script type="text/javascript">
    $(document).ready(function() {
        $("#accordion").accordion({
            autoHeight: false
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
                     or 
                    <?php echo $html->link('direct download', 'http://www.jasonpoon.ca/files/abth.pdf'); ?>
                </dd>

                <dt>Description:</dt>
                <dd>Did you know Windows Live Messenger is filled with security vulnerabilities? Read the paper I co-wrote and you'll be amazed at how easy it is to impersonate someone. It was so amazing that it was accepted for publication by EuroSec where I subsequently travelled to EuroSec '09 in Germany to present a talk on Applicaton-Based TCP Hijacking (ABTH). ABTH is a new form of attacking a TCP connection that exploits flaws due to the interplay between TCP and application protocols.</dd>

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
                <dd>C</dd>
                
                <dt>Description:</dt>
                <dd>The RFID Library Management System was a project created for EECE375. In essence, we built a remote handheld device capable of reading RFID-tagged books where the handheld unit would communicate to base station via Zigbee.</dd>
            </dl>
        </ul>
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
                <dd><?php echo $html->link('version 1', 'http://www.ams.ubc.ca/clubs/badminton')?> and <?php echo $html->link('version 2', 'http://www.ams.ubc.ca/clubs/badminton/old')?></dd>

                <dt>Languages:</dt>
                <dd>PHP, Javascript (JQuery), CSS</dd>

                <dt>Description:</dt>
                <dd>When I first inherited the webpage from my predecessor, it looked similar to <?php echo $html->link('this', 'http://www.chimesdesign.com/fugly_site/index.html')?>. As my eyes were beginning to bleed, I redesigned the webpage to <?php echo $html->link('have a more simple yet modern theme', 'http://www.ams.ubc.ca/clubs/badminton/old')?>. I focused on writing easily understandable code such that anyone without any PHP/HTML knowledge could update the website. However, this assumption was horribly wrong so I redesigned the webpage <?php echo $html->link('again', 'http://www.ams.ubc.ca/clubs/badminton')?> this time using Wordpress.</dd>
            </dl>

            <li>UBC Badminton Club - Member Registration</li>
            <dl>
                <dt>Website:</dt>
                <dd><?php echo $html->link('ubc-badm.appspot.com/register (login required)', 'http://ubc-badm.appspot.com/register')?></dd>

                <dt>Languages:</dt>
                <dd>Python, Google App Engine SDK, Javascript, CSS</dd>

                <dt>Description:</dt>
                <dd>In order to eliminate the chaos associated with paper membership forms, created a membership registration page.</dd>
            </dl>

            <li>Jeanette Ball Dance</li>
            <dl>
                <dt>Website:</dt>
                <dd><?php echo $html->link('jeanetteballdance.com', 'http://www.jeanetteballdance.com');?></dd>

                <dt>Languages:</dt>
                <dd>ASP.NET, C#, Javascript, CSS</dd>

                <dt>Description:</dt>

                <dd>Volunteered my services to create a homepage for my dance teacher, Jeanette Ball.</dd>
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
                <dd><?php echo $html->link('bootstrap.sh', 'http://www.jasonpoon.ca/files/bootstrap.sh'); ?></dd>

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
                <dd><?php echo $html->link('music-rename.pl', 'http://www.jasonpoon.ca/files/music-rename.pl'); ?></dd>

                <dt>Languages:</dt>
                <dd>Perl</dd>

                <dt>Description:</dt>
                <dd>As I'm a rather organized individual, I require that my music files be nicely titled in a certain format, namely "[Author] - [Song Title]". Created a perl script that would go through my music renaming my files to follow this format.</dd>
            </dl>
    </div>
</div>

