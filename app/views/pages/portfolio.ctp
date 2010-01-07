<p>An incomplete collection of personal, work-related, or school-related projects that I have worked on in the past.</p><br/>

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
                <dd><?php echo $html->link('ACM Portal', 'http://portal.acm.org/citation.cfm?id=1519144.1519146'); ?></dd>

                <dt>Description:</dt>
                <dd>Co-wrote a paper that was accepted for publication by EuroSec where I subsequently travelled to EuroSec '09 in Germany to present a talk on ABTH. The paper describes a new form of attacking a TCP connection that exploits flaws due to the interplay between TCP and application protocols.</dd>

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
                <dd><?php echo $html->link('www.ams.ubc.ca/clubs/badminton', 'http://www.ams.ubc.ca/clubs/badminton')?></dd>

                <dt>Languages:</dt>
                <dd>PHP, Javascript (JQuery), CSS</dd>

                <dt>Description:</dt>
                <dd>As webmaster, then president, of the UBC Badminton Club, completely transformed the webpage from a 1990's style webpage to a more modern yet simple design. Focused on writing easily understandable and editable code allowing individuals without any PHP/HTML knowledge the ability to easily modify the website.</dd>
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

            <li>Website Updater</li>
            <dl>
                <dt>Sourcecode:</dt>
                <dd><?php echo $html->link('ftp_update.zip', 'http://www.jasonpoon.ca/files/ftp_update.zip'); ?></dd>

                <dt>Languages:</dt>
                <dd>Batch File (cmd.exe)</dd>

                <dt>Description:</dt>
                <dd>In order to accomodate individuals who possess no knowledge of FTP, this batch file can be executed to update the required web files with a single click of the mouse.</dd> 

            </dl>

            <li>Bulk File Renamer</li>
            <dl>
                <dt>Sourcecode:</dt>
                <dd><?php echo $html->link('music-rename.pl', 'http://www.jasonpoon.ca/files/music-rename.pl'); ?></dd>

                <dt>Languages:</dt>
                <dd>Perl</dd>
            </dl>
    </div>
</div>

