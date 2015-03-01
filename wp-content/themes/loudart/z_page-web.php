<?php get_header(); ?>

<?php
  $args = array(
  	'category_name' => 'coding',
  	'posts_per_page' => -1
  );
  $the_query = new WP_Query($args);
  $codemenu;
?>
	
	<div id="landing" class="header-holder">
		<header>
		<div class="holder">
			<h1><span class="text-name"><span>Jim</span><br /><span class="last-name">Louden</span></span></h1><br />
			<p>frontend developer</p>
			<nav class="main-nav"><?php code_nav(); ?></nav>
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
				</div><!-- .holder -->
			</section><!-- /section -->
			<section id="skills" class="skills page-section">
				<div class="holder">
					<h2><span class="outer"><span class="inner">Skills</span></span></h2>
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
					<div class="clear"></div>
					<div class="resume-holder"><a href="" class="text">Resume</a></div>
				</div>
			</section>
		</div><!-- container -->

<?php get_footer(); ?>
