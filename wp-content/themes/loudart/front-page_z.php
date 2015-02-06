<?php get_header(); ?>

  <?php
    $args = array('category_name=illustration');
    $ill_query = new WP_Query('category_name=illustration');
    //$bio_query = new WP_Query($args);
    $counter;
    $src;
  ?>

  <div class="bg-parallax"><div></div></div>

  <div class="button-holder">
    <a id="button-prev" class="icon-button prev"><span class="arrow-text">Previous</span><span class="arrow"></span></a>
    <ul id="chapters" class="chapters">
    <?php
      $catposts = get_posts('numberposts=-1&category_name=illustration');
      foreach($catposts as $post) :
    ?>
      <li class="<?php echo $post->post_name; ?>"><a href="#<?php echo $post->post_name; ?>"><span class="marker"></span></a></li>
    <?php endforeach; ?>
    </ul>
    <a id="button-next" class="icon-button next"><span class="arrow"></span><span class="arrow-text">Next</span></a>
  </div>

  <div id="content" class="content">
    <section id="introduction" class="introduction page active">
      <div class="logo-title">
        <div class="title-holder">
          <h1>
          <span class="name">Jim Louden</span>
          <span class="pp">Pen <span>&</span> Pencil</span>
          <span class="ill">Illustration</span>
          </h1>
        </div>
      </div>
      <div class="front-footer">
      <p><a id="button-intro">See the work<span class="front-line"></span><span class="front-arrow"></span></a></p>
      </div>
      <p class="front-email"><a href="mailto:jim@loudenart.com?Subject=Website%20Contact">jim@louden.io</a></p>
    </section>

    <?php while ($ill_query -> have_posts()) : $ill_query -> the_post();

      remove_filter ('the_content', 'wpautop');

      $pContent = $post->post_content;
      $pTitle = $post->post_name;
      $imgPattern = '~<img [^\>]*\ />~';

      preg_match_all( $imgPattern, $pContent, $aImgs );

      $imgNumber = count($aImgs[0]);

    ?>
    <section id="<?php echo $pTitle; ?>" class="artwork-holder art-<?php the_ID(); ?> page">
    <header class="header" role="banner">
      <h1 id="caption" class="caption"><span class="lb-caption"><?php the_title(); ?></span></h1>
    </header>
    <div class="post-content">
      <div class="artwork img<?php echo $imgNumber; ?>">
        <?php 
        $counter = 1;
        foreach($aImgs[0] as $img) {
          $src = (string) reset(simplexml_import_dom(DOMDocument::loadHTML($img))->xpath("//img/@src"));
          echo '<div class="img-holder art-holder'.$counter.'" data-src="'.$src.'" data-sub-html="'.get_the_title().'" ><a href="#">'.$img.'</a></div>';
          //echo '<a class="lbox" href="#">'.$img.'</a>';
          $counter++;
        }
        ?>
      </div>
    </div>
    </section>

    <?php endwhile; ?> 
    <?php wp_reset_query(); ?>
 
    <section id="contact" class="contact page">
    <div class="about">
      <!-- <div class="photo">
      <img src="<?php echo get_template_directory_uri(); ?>/css/imgs/bio.png">
      </div> -->
      <div class="text">
      <?php include (TEMPLATEPATH.'/cust-email-form.php'); ?>
      </div>
    </div>
    </section>
  </div>

<?php get_footer(); ?>
