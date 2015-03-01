<?php get_header(); ?>

<main id="landing" class="landing" role="main">
  <div class="landing-holder" style="background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.95), rgba(211, 211, 211, 0.85)), url(<?php echo get_template_directory_uri(); ?>/css/imgs/strip.png);">
    <div class="box">
      <div class="web">
        <a href="<?php echo get_bloginfo('url'); ?>/web">Web</a>
      </div>
      <div class="icon-holder">
        <div class="jl-icon">
          <span>JL</span>
        </div>
      </div>
      <div class="art">
        <a href="<?php echo get_bloginfo('url'); ?>/art">Art</a>
      </div>
    </div>
  </div>
  <button class="landing-button"><a href="#contact">Contact me<span></span></a></button>
</main>

<?php get_footer(); ?>
