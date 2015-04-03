<?php
global $post;
get_header();

$attachments = new Attachments( 'attachments' );
$counter = 1;

?>

	<nav class="chapter-target chapter-holder web-single">
		<?php code_single_nav(); ?>
	</nav>

	<main id="main-content" class="main-holder single-post" role="main">
	<div class="container">
		<section class="work-single">

		<article id="post-<?php the_ID(); ?>" class="page-section">
			
		<?php if (have_posts()): while (have_posts()) : the_post(); 

			if( $attachments->exist() ) : ?>
				<div class="single-sub-header">
			  	<h2><span class="outer"><span class="inner"><?php the_title(); ?></span></span></h2>
				</div>
		  	<ul class="work-thumbs">

		    <?php while( $attachments->get() ) : ?>
		      <li class="thumbs pic-<?php echo $counter; ?>"><span><?php echo $attachments->image( 'full' ); ?></span></li>
		    <?php
			    $counter++;
			    endwhile;
		    ?>
		      <li class="grid-sizer"></li>
		  	</ul>
			<?php endif; ?>

		</article>

		<?php endwhile; ?>

		<?php else: ?>

			<article>
				<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
			</article>

		<?php endif; ?>

		</section>

<?php get_footer(); ?>
