<?php get_header(); ?>

  <?php
    $args = array('category_name=illustration');
    $the_query = new WP_Query($args); 
  ?>
 

  <div class="content">
    <section id="introduction" class="introduction page active-custom">
    <div class="header-holder">
      <div class="logo-title">
        <h1>Jim<br />Louden</h1>
        <p>Illustration</p>
      </div>
      <hr>
    </div>
    </section>

    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
    <section id="art-<?php the_ID(); ?>" class="artwork-holder art-<?php the_ID(); ?> page">
    <div class="post-content">  
      <div class="artwork">
        <?php remove_filter ('the_content', 'wpautop'); ?>
        <?php the_content(); ?>
        <div class="clear"></div>
      </div>
      <h1 class="caption"><span><?php the_title(); ?></span></h1>
    </div>
    </section>
    <?php endwhile; ?> 


    <section class="bio page">
    <div class="about">
      <div class="photo">
        
      </div>
      <div class="text">
      <p>This is short bio text.</p>
      </div>
    </div>
    </section>
  </div>

<?php get_footer(); ?>
