<?php get_header(); ?>

<?php

  $mainCat = get_cat_ID('Portfolio');

  $args1 = array(
    'category_name' => 'Coding',
    'category__in' => $mainCat,
    'posts_per_page' => -1
  );
  $args2 = array(
    'category_name' => 'Illustration',
    'category__in' => $mainCat,
    'posts_per_page' => -1
  );

  $the_query = new WP_Query($args1);
  $the_query_ill = new WP_Query($args2);
  $codemenu;

  $skills_post = get_page_by_title('skills', OBJECT, 'post');
?>

<div id="site-container" class="page-web">

  <div id="landing" class="landing">
    <div class="box forParallax">
      <div>
        <a class="landing-link web" href="<?php echo get_bloginfo('url'); ?>/web"><span>Webwork</span></a>
        <h1 class="landing-header" ><span class="double-rules"><span>Jim Louden</span></span></h1>
        <a class="landing-link art" href="<?php echo get_bloginfo('url'); ?>/art"><span>Artwork</span></a>
      </div>
      <button class="landing-button"><a href="#contact" class="no-smoothstate">Contact me<span></span></a></button>
    </div>
    <div class="landing-home-bg bgParallax"></div>
  </div>
  
    <main id="main-content" class="main-holder web" role="main">

    <div class="container">
    <section id="work" class="work page-section">
      <div class="work-holder">
        <h2><span class="outer"><span class="inner">Webwork</span></span></h2>
        <div class="holder">
        <?php
          while ($the_query -> have_posts()) : $the_query -> the_post();


            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
            $url = $thumb['0'];
    
            if ( has_post_thumbnail() ) {
              echo '<div class="web-thumbnails '.$post->post_name.'">
                <a href="'.get_permalink().'"><img src="'.$url.'" />
                <span class="subtitle-box">
                <span class="subtitle-plane"><span>See the work</span></span>
                </span></span><div class="thumb-bg"></div></a></div>';
            } 
          endwhile;
        ?>
        </div><!-- holder -->
        <h2><span class="outer"><span class="inner">Artwork</span></span></h2>
        <div class="holder">
        <?php
          while ($the_query_ill -> have_posts()) : $the_query_ill -> the_post();

            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
            $url = $thumb['0'];
    
            echo '<div class="web-thumbnails '.$post->post_name.'">
              <a href="'.get_permalink().'">
              <span class="thumb-title">See the work</span>
              <div class="thumb-bg"></div>
              </a></div>';

            endwhile;
          ?> 
          </div><!-- holder -->
        </div><!-- work-holder -->
      </section><!-- work -->
      <section id="skills" class="skills page-section">
        <div class="holder">
          <h2><span class="outer"><span class="inner"><?php echo $skills_post->post_title; ?></span></span></h2>
          <?php echo $skills_post->post_content; ?>
        </div>
      </section>
    </div><!-- .container -->

  </main>

  <section id="contact" class="contact page-section">

<?php get_footer(); ?>
