<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?php echo get_template_directory_uri(); ?>/css/imgs/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/css/imgs/touch.png" rel="apple-touch-icon-precomposed">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
    <script>
      paceOptions = {
        restartOnPushState: false
      }
    </script>
		<?php wp_head(); ?>
		<script>
      // conditionizr.com
      // configure environment tests
      conditionizr.config({
          assets: '<?php echo get_template_directory_uri(); ?>',
          tests: {}
      });
    </script>

	</head>
	<body <?php body_class(); ?>>

    <div class="menu-overlay">
      <nav id="nav-holder" class="nav-holder" role="navigation">
        <h2>
        <span class="name">Jim Louden</span>
        <span class="pp">Pen <span>&</span> Pencil</span>
        <span class="ill">Illustration</span>
        </h2>
        <?php main_nav(); ?>
        <p class="email"><a href="mailto:jim@loudenart.com?Subject=Website%20Contact" target="_top">jim@louden.io</a></p>
      </nav>
    </div>

    <div id="menu-button" class="menu-button"><a><span></span><span></span><span></span><span></span></a></div>

		<div id="wrapper" class="wrapper">