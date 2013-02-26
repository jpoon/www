<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Jason Poon</title>

<link rel="stylesheet" href="styles/style.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<script src="http://www.websnapr.com/js/websnapr.js"></script>
<script src="./scripts/jquery.qtip-1.0.0-rc3.min.js"></script>
<script src="./scripts/jquery.isotope.min.js"></script>
<script src="./scripts/jquery.smooth-scroll.min.js"></script>
<script src="./scripts/waypoints.min.js"></script>
<script src="./scripts/setup.js"></script>

<!-- Google Analytics -->
<script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
    try {
    var pageTracker = _gat._getTracker("UA-12315023-1");
        pageTracker._trackPageview();
    } catch(err) {}
</script>


</head>
<body>
<div id="wrap"> 
  <div id="sidebar_left"> 
    <!-- the sidebar --> 
    <!-- navigation menu -->
    <ul id="navigation">
      <li><a href="#about">About</a></li>
      <li><a href="#portfolio">Portfolio</a></li>
    </ul>
    <ul id="social_icons">
          <li><a href="mailto:webmail@jasonpoon.ca" id="fb"><img src="images/mail.png" alt="Email" /></a></li>
          <li><a href="http://www.linkedin.com/in/poonjas" id="ld"><img src="images/linkedin.png" alt="LinkedIn" /></a></li>
          <li><a href="http://www.github.com/jpoon" id="github"><img src="images/github.png" alt="GitHub" /></a></li>
    </ul>
  </div>

  <div id="sidebar_right">
    <img src="images/name.png" alt="Jason Poon" />
  </div>

  <div id="container"> 
    <!-- page container -->
    <div class="page" id="about"> 
      <!-- page about -->
      <h3 class="page_title">About</h3>
      <div class="page_content">
        <p> My name is Jason Poon, and I am a <b>software engineer</b>.</p>

        <p> As a child of two immigrant parents, my parents worked long arduous hours to provide for the family.
            As a result, at a very young age, I understood the value of money and was very conservative with it. 
            With my paper-route money and a little help from my parents, I bought my first computer when I was 14.
            I still remember the specs: Intel Pentium III 800MHz, 256MB RAM, 20GB hard drive, 52X CD-ROM reader, with Windows 98SE preinstalled.</p>

        <p> My first taste of programming was in high school where Fortran was the first programming language that I learned.
            It was at this point that I knew I wanted a career in the technology industry.
            When applying for university, I had the choice of two Faculties: Faculty of Applied Science (computer engineer) or Faculty of Science (computer scientist). 
            After considerable back-and-forth, I became a computer engineer as the "engineer" portion of the name sounded better.</p>

      </div>
    </div>

    <div class="page" id="portfolio"> 
      <!-- page portfolio -->
      <h3 class="page_title"> Portfolio</h3>
      <div class="page_content">
        <p>The following is an <i>incomplete</i> collection of the personal and professional projects that I have worked on in the past and my education.</p>

        <ul id="works_filter">
          <li><a href="#" data-filter="*" class="selected">Show All</a></li>
          <li><a href="#" data-filter=".employment">Professional</a></li>
          <li><a href="#" data-filter=".personal">Personal</a></li>
          <li><a href="#" data-filter=".academia">Academia</a></li>
        </ul>

        <div class="clear"></div>

        <div id="tabs">
            <ul id="works" class="grid">
              <li class="work employment microsoft"><a href="#tab-msft" rel="microsoft"> <img src="images/portfolio/microsoft.png" alt="Microsoft"></a></li>
              <li class="work personal weightwatch"><a href="#tab-weightwatch" rel="weightwatch"> <img src="images/portfolio/weightwatch.png" alt="WeightWatch"></a></li>
              <li class="work academia ubc"><a href="#tab-ubc" rel="ubc"> <img src="images/portfolio/ubc.png" alt="UBC"></a></li>
              <li class="work academia acm"><a href="#tab-acm" rel="acm"> <img src="images/portfolio/acm.png" alt="ACM"></a></li>
              <li class="work personal ubcbadm"><a href="#tab-ubcbadm" rel="ubcbadm"> <img src="images/portfolio/ubcbadm.png" alt="UBC Badminton Club"></a></li>
              <li class="work personal jeanetteball"><a href="#tab-jeanetteball" rel="jeanetteball"> <img src="images/portfolio/jeanetteball.png" alt="Jeanette Ball Dance"></a></li>
              <li class="work employment rim"><a href="#tab-rim" rel="rim"> <img src="images/portfolio/rim.png" alt="RIM"></a></li>
              <li class="work employment broadcom"><a href="#tab-broadcom" rel="broadcom"> <img src="images/portfolio/broadcom.png" alt="Broadcom"></a></li>
            </ul>

            <div class="clear"></div>

            <div id="tab-detail">
                <div id="tab-msft">
                    <h4 class="blue">Microsoft (MSFT)</h4>
                    <dl>
                        <dt>Who</dt>
                        <dd>
                            Software Development Engineer (SDE)
                        </dd>
                        <dt>When</dt>
                        <dd>
                            2010 - Present
                        </dd>
                        <dt>What</dt>
                        <dd>
                            <p>First as an intern, I had the opportunity to work on the developer portal for the Window Mobile App Store. 
                               Although the look-and-feel of the webpage has changed considerably (now known as the <a href="http://dev.windowsphone.com/">Windows Phone Dev Center</a>), this was my first project where the user base consisted of more than a couple of family and friends.
                               I still recall the amazing feeling of seeing the webpage live and being visited by thousands of people all across the world.</p>
                            <p>Once I entered the working with a degree in-hand, I became a blue-badger where I currently work within the Windows Phone Services team. 
                               Although I have been re-org'ed several times during my time at Microsoft, my role has largely been in designing/developing/managing the application certification process for the Windows Phone Marketplace</p>
                        </dd>
                        <dt>How</dt>
                        <dd>
                            C#, T-SQL, ASP.NET, ASP.NET AJAX Control Toolkit, CSS
                        </dd>
                    </dl>
                </div>
                <div id="tab-weightwatch">
                    <h4 class="blue">WeightWatch</h4>
                    <dl>
                        <dt>When</dt>
                        <dd>
                            2011 - 2012
                        </dd>
                        <dt>What</dt>
                        <dd>
                            Since it was first released on the Windows Phone Store, WeightWatch has been downloaded over 30 000 times. 
                            The mobile application helps users track their weight by allowing users to record their weight, and the app presents graphs showing their progress.
                            WeightWatch is available on all versions of Windows Phone via the <a href="http://www.windowsphone.com/en-us/store/app/weightwatch/3ce315c2-e455-e011-854c-00237de2db9e">store</a>.
                        </dd>
                        <dt>How</dt>
                        <dd>
                            C#, Windows Phone SDK
                        </dd>
                    </dl>
                </div>
                <div id="tab-ubc">
                    <h4 class="blue">University of British Columbia (UBC)</h4>
                    <dl>
                        <dt>When</dt>
                        <dd>
                            2005 - 2010
                        </dd>
                        <dt>Where</dt>
                        <dd>Vancouver, British Columbia, Canada</dd>
                        <dt>What</dt>
                        <dd>
                            <p>Five years in the making, I finally entered the working world armed with a Bachelor's in Applied Science. My major was in computer engineering, and my minor was in commerce.</p>
                        </dd>
                    </dl>
                </div>
                <div id="tab-acm">
                    <h4 class="blue">Application Based TCP Hijacking (ABTH)</h4>
                    <dl>
                        <dt>When</dt>
                        <dd>
                            2009
                        </dd>
                        <dt>Paper</dt>
                        <dd>
                            <a href="http://portal.acm.org/citation.cfm?id=1519144.1519146">ACM Portal</a>
                        </dd>
                        <dt>What</dt>
                        <dd>
                            <p>Working in concert with <a href="http://konstantin.beznosov.net">Dr. Konstantin Beznosov</a> and <a href="http://oliverzheng.com">Oliver Zheng</a>, we exploited flaws between the interplay of TCP and application-level protocols, ABTH was enabled the ability to quiety injecting TCP packets. 
                               In the case of Windows Live Messenger and its underlying protocol (Microsoft Notification Protocol), by using ABTH, an attacker was capable of impersonating anybody of his/her choosing and start a conversation with the victim. </p>
                            <p>ABTH had its beginnings as a course project for <a href="http://courses.ece.ubc.ca/412/">EECE 412</a> and would eventually be published in the Proceedings of <a href="http://www.ics.forth.gr/dcs/eurosec09/">EuroSec 2009</a>. 
                               As an added bonus, we were invited to present our findings at the workshop in Nuremberg, Germany.
                        </dd>
                    </dl>
                </div>
                <div id="tab-jeanetteball">
                    <h4 class="blue">Jeanette Ball Dance</h4>
                    <dl>
                        <dt>Website</dt>
                        <dd>
                            <a href="http://www.jeanetteballdance.com/">jeanetteballdance.com</a>
                        </dd>
                        <dt>What</dt>
                        <dd>
                            <p>My dance teacher was in the process of re-designing her webpage, and so I offered my services. If you are ever in the need for ballroom dance lessons in the Seattle area, I highly recommend Jeanette Ball.</p>
                        </dd>
                        <dt>How</dt>
                        <dd>
                            ASP.NET, C#, Javascript, CSS
                        </dd>
                    </dl>
                </div>
                <div id="tab-rim">
                    <h4 class="blue">Research in Motion (RIMM)</h4>
                    <dl>
                        <dt>When</dt>
                        <dd>
                            Summer 2008
                        </dd>
                        <dt>Where</dt>
                        <dd>
                            Waterloo, Ontario, Canada
                        </dd>
                        <dt>What</dt>
                        <dd>
                            <p>Back then, RIM had just released the Blackberry Bold 9000, and Apple was beginning to challenge the enterprise space with it's consumer-focused iPhone.
                               During it's heyday, I was an intern in the Radio Cellular Technologies department where I worked on improving the tooling and debugging capabilities of the radio stack.</p>
                        </dd>
                        <dt>How</dt>
                        <dd>
                            C/C++
                        </dd>
                    </dl>
                </div>
                <div id="tab-broadcom">
                    <h4 class="blue">Broadcom (BRCM)</h4>
                    <dl>
                        <dt>When</dt>
                        <dd>
                            Summer and Winter 2007
                        </dd>
                        <dt>Where</dt>
                        <dd>
                            Richmond, British Columbia, Canada
                        </dd>
                        <dt>What</dt>
                        <dd>
                            <p>Broadcom was my first introduction into the software engineering industry. 
                               One of the most memorable things I learned during my internship at Broadcom was the existence of source control. 
                               Yes, despite 2 years of undergraduate education, I had no idea such a thing existed.</p>
                        </dd>
                        <dt>How</dt>
                        <dd>
                            Tcl/Tk, C++
                        </dd>
                    </dl>
                </div>
                <div id="tab-ubcbadm">
                    <h4 class="blue">UBC Badminton Club</h4>
                    <dl>
                        <dt>Website</dt>
                        <dd>
                            <a href="http://ubcbadm.vlexofree.com/">ubcbadm.vlexofree.com</a>
                        </dd>
                        <dt>When</dt>
                        <dd>
                            2009 - 2010
                        </dd>
                        <dt>What</dt>
                        <dd>
                            <p>First as webmaster and later as president of the UBC Badminton Club, one of the problems I found was a lack of coordination within the executive team and poor communication with our members.
                               During my tenureship, I tried solving these problems by using Google Groups for communication within the executive team, establishing member mailing lists, improving the design of the webpage, and using RSS feeds, Facebook and Twitter to reach out to our members.</p>
                            <p>I inherited a webpage that looked similar to <a href="http://www.chimesdesign.com/fugly_site/index.html">this</a>. 
                               As my eyes were beginning to bleed, the website was redesigned using WordPress.
                               Every year, the club has a membership drive. 
                               As paper forms = chaos and online registration != chaos, I created an online registration system which resulted in app engine = awesome. 
                               The registration system is hosted at <a href="http://ubc-badminton.appspot.com/">ubc-badminton.appspot.com.</a></p>
                        </dd>
                        <dt>How</dt>
                        <dd>
                            Wordpress, C#, Silverlight, Python, Google App Engine, PHP
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="footer">
      Copyright &copy
    <?php 
        $copyYear = 2012; 
        $curYear = date('Y'); 
        echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
    ?>;
      Jason Poon.
     <!--VlexoFree_LinkBack-->
    </div>
  </div>
  <div class="clear"> </div>
</div>
<a class="gotop" href="#top">back to the beginning</a>
</body>
</html>
