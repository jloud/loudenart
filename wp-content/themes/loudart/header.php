<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

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
    <?php
      $args = array('category_name=illustration');
      $the_query = new WP_Query($args); 
    ?>

    <div class="menu-overlay">
      <nav id="nav-holder" class="nav-holder" role="navigation">
        <h2>Jim Louden <br /><span>Pen & Pencil Illustration</span></h2>
        <?php main_nav(); ?>
        <p><a href="mailto:jim@loudenart.com?Subject=Website%20Contact" target="_top">jim@loudenart.com</a></p>
      </nav>
    </div>

    <div id="nav-button" class="nav-button"><a><span></span><span></span><span></span><span></span></a></div>

		<div id="wrapper" class="wrapper">
    <div class="bg-parallax"><div></div></div>

		<header class="header" role="banner"></header>

    <div class="button-holder">
      <a id="button-prev" class="icon-button prev"><span class="arrow-text">Previous</span><span class="arrow"></span></a>
      <a id="button-next" class="icon-button next"><span class="arrow"></span><span class="arrow-text">Next</span></a>
    </div>

    
    <!-- <header class="header" role="banner">
      <nav id="nav-holder" class="nav-holder" role="navigation">
        <?php main_nav(); ?>
      </nav>
      <div id="nav-button" class="nav-button"><a href="#nav-holder"><span></span><span></span><span></span><span></span></a></div>
    </header> -->


