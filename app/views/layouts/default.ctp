<?php echo $html->docType('xhtml-trans') ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('Jason Poon - '); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');

		echo $html->css('main');

        # javascript
        echo $javascript->link("http://www.google.com/jsapi");
        echo $javascript->codeBlock('google.load("jquery", "1.3.2"); google.load("jqueryui", "1.7.2");');
        echo $javascript->link('analytics');

		echo $scripts_for_layout;
	?>
    <link rel="stylesheet" href="theme/ui.all.css" type="text/css" />
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
	<div id="container">
		<div id="header">
            <?php echo $html->image("header.png", array(
               "alt" => "Jason Poon",
               'url' => array('controller' => 'pages', 'home')
            )); ?>
        </div>

        <div id="navigation">
            <?php
            echo $listmenu->create (
                array(
                    'Home' => array('controller' => 'pages', 'home'),
                    'Resume' => array('controller' => 'pages', 'resume'),
                    'Portfolio' => array('controller' => 'pages', 'portfolio'),
                    'Contact' => array('controller' => 'pages', 'contact')
                    ),
                array('class' => 'menu')
            );
            ?>
        </div>

		<div id="content">
			<?php $session->flash(); ?>

			<?php echo $content_for_layout; ?>
		</div>

		<div id="footer">
            Copyright © 2009, Jason Poon | <!--VlexoFree_LinkBack-->
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>
