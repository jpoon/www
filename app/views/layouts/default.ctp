<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

		echo $scripts_for_layout;
	?>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("jquery", "1.3.2")
        google.load("jqueryui", "1.7.2")
    </script>

</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $html->link(__('Jason Poon', true), 'http://jasonpoon.ca'); ?></h1>
		</div>

        <div id="navigation">
            <table>
                <tr><td><a href="/pages/home">home</a></td></tr>
                <tr><td><a href="/pages/about">about</a><td></tr>
                <tr><td><a href="/pages/about">resume</a><td></tr>
                <tr><td><a href="/pages/about">portfolio</a><td></tr>
                <tr><td><a href="/pages/about">contact</a><td></tr>
            </table>
        </div>

		<div id="content">

			<?php $session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>

		<div id="footer">
            Footer
            <!--VlexoFree_LinkBack-->
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>
