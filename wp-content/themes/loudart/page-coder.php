<?php get_header(); ?>

<?php
  $args = array('category_name=coding');
  $the_query = new WP_Query($args);
?>
	
	<div class="header-holder">
		<header>
		<div class="holder">
			<h1><span class="text-name"><span>Jim</span><br /><span class="last-name">Louden</span></span></h1><br />
			<p>frontend developer</p>
			<nav class="main-nav"><ul><li><a>Work</a></li><li><a>Skills</a></li><li><a>Contact</a></li></ul></nav>
		</div>
		</header>
	</div>

	<main class="main-holder" role="main">
		<div class="container">
			<section class="work">
				<h2><span>Selected work</span></h2>
				<div class="holder">
				<?php
					while ($the_query -> have_posts()) : $the_query -> the_post();
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
						$url = $thumb['0'];

						if ( has_post_thumbnail() ) {
							echo '<div class="thumbnails"><a href="'.get_permalink().'"><div class="thumbnails-bg" style="background-image:url('.$url.');"></div></a></div>';
						} 
					endwhile;
				?> 
				</div><!-- .holder -->
			</section><!-- /section -->
			<section class="skills">
				<h2>Skills</h2>
				<div class="holder">
					<ul class="skill-list design">
					<li class="list-head">Design</li>
					<li>Adobe Creative Suite
					<span class="sub-line">(Photoshop, Illustrator, InDesign)</span>
					</li>
					<li>Adobe Premiere & After Effects</li>
					<li>Final Cut Pro 7 & X</li>
					<li>Flash (Animation interface)</li>
					</ul>
					<ul class="skill-list tech">
					<li class="list-head">Technology</li>
					<li>HTML5</li>
					<li>CSS3/SASS/Compass</li>
					<li>Jquery/Javascript, Grunt</li>
					<li>PHP & MySQL</li>
					<li>Coder of choice: Sublime 3</li>
					</ul>
					<ul class="skill-list platforms">
					<li class="list-head">Platforms</li>
					<li>Wordpress & CodeIgniter</li>
					<li>Joomla & Symphony</li>
					<li>Ruby on Rails</li>
					<li>Git/Github</li>
					<li>phpMyAdmin</li>
					<li>MailChimp</li>
					</ul>
				</div>
			</section>
			<section class="intro-text">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; ?>
			<?php else: ?>
			<?php endif; ?>
			<div class="contact-form">
			<?php include (TEMPLATEPATH.'/cust-email-form.php'); ?>
			</div>
			</section><!-- intro-text -->
		</div><!-- main-holder -->
	</main>
	<footer>
		<div class="footer">
			Jim Louden
		</div>
	</footer>

<?php get_footer(); ?>
