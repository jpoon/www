<?php echo $html->link(__('Jason Poon', true), 'http://jasonpoon.ca'); ?>
http://github.com/jpoon/eece375
RFID Library Management System

http://github.com/jpoon/eece375

<?php
    echo $javascript->link('sh/shCore');
    echo $javascript->link('sh/shBrushJScript');
    echo $javascript->codeBlock('SyntaxHighlighter.all()');
    echo $html->css('shCore');
    echo $html->css('shThemeDefault');
?>
	
<pre class="brush: js">
    /**
     * SyntaxHighlighter
     */
    function foo()
    {
        // it works!
    }
</pre>

<script type="text/javascript">
    $(function() {
        $("#accordion").accordion({
            autoHeight: false
        });
    });
    </script>



<div id="accordion">
    <h3><a href="#">Research/Published Papers</a></h3>
    <div>
        <ul>
            <li><?php echo $html->link('Application Based TCP Hijacking', 'http://portal.acm.org/citation.cfm?id=1519144.1519146'); ?></li>
            <p><i>Description:</i></p>
        </ul>
    </div>
    <h3><a href="#">Embedded Software</a></h3>
    <div>
    </div>
    <h3><a href="#">Web Development</a></h3>
    <div>
        <ul>
            <li><?php echo $html->link('Windows Mobile for Developers', 'http://developer.windowsmobile.com');?></li>
            <p><i>Languages:</i> ASP.NET, ASP.NET AJAX Control Toolkit, C#, Javascript, CSS</p>
            <p><i>Description:</i> As an intern at Microsoft, I had the opportunity to work on the developers portal for the Windows Mobile App Store.</p>
 
            <li><?php echo $html->link('UBC Badminton Club', 'http://www.ams.ubc.ca/clubs/badminton')?></li>
            <p><i>Languages:</i> PHP, Javascript (JQuery), CSS</p>
            <p><i>Description:</i> As webmaster, then president, of the UBC Badminton Club, completely transformed the webpage from a 1990's style webpage to a more modern yet simple design. Focused on writing easily understandable and editable code allowing individuals without any PHP/HTML knowledge the ability to easily modify the website.</p>

            <li><?php echo $html->link('UBC Badminton Club - Member Registration', 'ubc-badm.appspot.com/register')?> (login required)</li>
            <p><i>Languages:</i> Python, Google App Engine SDK, Javascript, CSS</p>
            <p><i>Description:</i> Created a membership registration page in an attempt to eliminate the chaos associated with paper forms.</p>
        </ul>
    </div>
    <h3><a href="#">Scripting</a></h3>
    <div>
        <ul>
            <li><?php echo $html->link('VPN', 'http://www.jasonpoon.ca/files/vpn.tcl'); ?></li>
            <p><i>Languages:</i> Tcl/Tk</p>
            <p><i>Description:</i></p>
            <li>Bootstrap</li>
            <p><i>Languages:</i> Bash</p>
            <p></p>
            <li>FTP Uploader<li>
            <p><i>Languages:</i> Batch File (cmd.exe)</p>
            <li>Music File Renamer</i></li>
            <p><i>Languages:</i> Perl</p>
    </div>
</div>

