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
    <div class="landing-box forParallax">
      <div>
        <a class="landing-link web no-smoothstate" href="#work"><span>Webwork</span></a>
        <h1 class="landing-header" ><a id="intro-contact" href="#contact" class="no-smoothstate"><span class="double-rules"><span>Jim Louden</span></span></a></h1>
        <a class="no-smoothstate landing-link art" href="#artwork"><span>Artwork</span></a>
      </div>
     <button class="landing-button"><a href="#contact" class="no-smoothstate">Contact me<span></span></a></button>
    </div>
    <div class="landing-home-bg bgParallax"></div>
  </div>

  <nav class="chapter-target chapter-holder menu-adjust">
    <?php code_nav(); ?>
  </nav>
  
    <main id="main-content" class="main-holder web" role="main">

    <div class="container">
  
    <section id="work" class="work page-section menu-adjust">
      <div class="work-holder">
        <h2 id="webwork" class="work-header"><span class="outer"><span class="inner">Webwork</span></span></h2>
        <div class="holder">
        <?php
          while ($the_query -> have_posts()) : $the_query -> the_post();


            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
            $url = $thumb['0'];
            
            echo '<div class="web-thumbnails '.$post->post_name.'">
              <a href="'.get_permalink().'">
              <span class="thumb-text title">'.get_the_title().'</span>
              <span class="thumb-text action">See the work</span>
              <div class="thumb-bg"></div>
              </a></div>';
          endwhile;
        ?>
        </div><!-- holder -->
        <h2 id="artwork" class="work-header"><span class="outer"><span class="inner">Artwork</span></span></h2>
        <div class="holder">
        <?php
          while ($the_query_ill -> have_posts()) : $the_query_ill -> the_post();

            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
            $url = $thumb['0'];
    
            echo '<div class="web-thumbnails '.$post->post_name.'">
              <a href="'.get_permalink().'">
              <span class="thumb-text title">'.get_the_title().'</span>
              <span class="thumb-text action">See the work</span>
              <div class="thumb-bg"></div>
              </a></div>';

            endwhile;
          ?> 
          </div><!-- holder -->
        </div><!-- work-holder -->
      </section><!-- work -->
      <section id="skills" class="skills page-section menu-adjust">
        <div class="holder">
          <h2 class="work-header"><span class="outer"><span class="inner"><?php echo $skills_post->post_title; ?></span></span></h2>
          <?php echo $skills_post->post_content; ?>
        </div>
        <div class="skills-bg bgParallax"></div>
      </section>
    </div><!-- .container -->

  </main>

  <section id="contact" class="contact page-section menu-adjust">

<?php get_footer(); ?>
