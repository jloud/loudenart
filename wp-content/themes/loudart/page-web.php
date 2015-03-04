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
	
	<div id="landing" class="web-landing">
		<header>
		<div class="holder">
			<h1 class="web-header"><span class="text-name"><span>Jim</span><br /><span class="last-name">Louden</span></span></h1><br />
			<p>frontend developer</p>
			<nav class="web-main-nav"><?php code_nav(); ?></nav>
		</div>
		</header>
		<div class="arrow-holder"><a href="#work" class="arrow-down"><span></span></a></div>
		<div class="landing-bg"></div>
	</div>

	<nav class="chapter-target chapter-holder">
		<?php code_nav(); ?>
	</nav>

	<main id="main-content" class="main-holder web" role="main">
		<div class="container">
			<section id="work" class="work page-section">
				<h2><span class="outer"><span class="inner">Selected work</span></span></h2>
				<div class="holder">
				<?php
					while ($the_query -> have_posts()) : $the_query -> the_post();
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						$url = $thumb['0'];

						if ( has_post_thumbnail() ) {
							echo '<div class="thumbnails '.$post->post_name.'">
								<a href="'.get_permalink().'"><img src="'.$url.'" />
								<span class="subtitle-box">
								<span class="subtitle-plane"><span>See the work</span></span>
								</span></span></a></div>';
						} 
					endwhile;
				?> 
				</div><!-- holder -->
			</section><!-- work -->
			<section id="skills" class="skills page-section">
				<div class="holder">
					<h2><span class="outer"><span class="inner"><?php echo $skills_post->post_title; ?></span></span></h2>
					<?php echo $skills_post->post_content; ?>
				</div>
			</section>
		</div><!-- container -->

<?php get_footer(); ?>
