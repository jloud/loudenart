<?php get_header(); ?>

<main id="landing" class="landing" role="main">
  <div class="landing-holder" style="background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.95), rgba(211, 211, 211, 0.85)), url(<?php echo get_template_directory_uri(); ?>/css/imgs/strip.png);">
    <div class="box">
      <a class="landing-link web" href="<?php echo get_bloginfo('url'); ?>/web">Web</a>
      <h1><span class="double-rules"><span>Jim Louden</span></span></h1>
      <a class="landing-link art" href="<?php echo get_bloginfo('url'); ?>/art">Art</a>
      <button class="landing-button"><a href="#contact">Contact me<span></span></a></button>
    </div>
  </div>
</main>

<?php get_footer(); ?>
