<?php get_header(); ?>

<?php
  $args = array(
  	'category_name' => 'coding',
  	'posts_per_page' => -1
  );
  $the_query = new WP_Query($args);
  $codemenu;

  $skills_post = get_page_by_title('skills', OBJECT, 'post');
?>

	<div id="site-container" class="page-web">
	
	<div id="landing" class="web-landing">
		<header class="web-box-content">
			<div class="web-landing-box">
				<h1 class="web-header"><span class="text-name"><span>Jim</span><br /><span class="last-name">Louden</span></span></h1><br />
				<p>frontend developer</p>
				<nav class="web-main-nav"><?php code_nav(); ?></nav>
			</div>
			<div class="arrow-holder"><a href="#work" class="arrow-down no-smoothstate"><span></span></a></div>
		</header>
		<div class="landing-bg bgParallax"></div>
	</div>

	<nav class="chapter-target chapter-holder">
		<?php code_nav(); ?>
	</nav>

	<main id="main-content" class="main-holder web" role="main">
		<div class="container">
			
		</div><!-- container -->
		</main>

		<section id="contact" class="contact page-section">

<?php get_footer(); ?>
