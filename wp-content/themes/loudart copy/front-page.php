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

<div id="site-container" class="page-home">
  <main id="landing" class="landing" role="main">
    <div class="landing-holder">
      <div class="box forParallax">
        <div>
          <a class="landing-link web" href="<?php echo get_bloginfo('url'); ?>/web"><span>Webwork</span></a>
          <h1 class="landing-header" ><span class="double-rules"><span>Jim Louden</span></span></h1>
          <a class="landing-link art" href="<?php echo get_bloginfo('url'); ?>/art"><span>Artwork</span></a>
        </div>
        <button class="landing-button"><a href="#contact" class="no-smoothstate">Contact me<span></span></a></button>
      </div>
    </div>
    <div class="landing-home-bg bgParallax"></div>
  </main>

  <section id="contact" class="contact page-section">

<?php get_footer(); ?>
