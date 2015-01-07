<?php get_header(); ?>

  <?php
    $args = array('category_name=illustration');
    $the_query = new WP_Query($args);
    $bio_query = new WP_Query($args);
    $counter;
    $src;
    
  ?>
 

  <div id="content" class="content">
    <section id="introduction" class="introduction page active">
      <div class="logo-title">
        <img src="<?php echo get_template_directory_uri(); ?>/css/imgs/intro2.svg">
        <p>Pen <span>&</span> Pencil Illustrator</p>
      </div>
      <div class="front-footer">
      <p><a id="button-intro">See the work<span class="front-line"></span><span class="front-arrow"></span></a></p>
      </div>
      <p class="front-email"><a href="mailto:jim@loudenart.com?Subject=Website%20Contact">jim@loudenart.com</a></p>
    </section>

    <?php while ($the_query -> have_posts()) : $the_query -> the_post();

      remove_filter ('the_content', 'wpautop');

      $pContent = $post->post_content;
      $pTitle = $post->post_name;
      $imgPattern = '~<img [^\>]*\ />~';

      preg_match_all( $imgPattern, $pContent, $aImgs );

      $imgNumber = count($aImgs[0]);

    ?>

    <section id="<?php echo $pTitle; ?>" class="artwork-holder art-<?php the_ID(); ?> page">
    <h1 id="caption" class="caption"><span class="lb-caption"><?php the_title(); ?></span></h1>
    <div class="post-content">
      <div class="artwork img<?php echo $imgNumber; ?>">
        <?php 
        $counter = 1;
        foreach($aImgs[0] as $img) {
          $src = (string) reset(simplexml_import_dom(DOMDocument::loadHTML($img))->xpath("//img/@src"));
          echo '<div class="img-holder imgpic-'.$counter.'" data-src="'.$src.'" data-sub-html="'.get_the_title().'" /><a href="#">'.$img.'</a></div>';
          //echo '<a class="lbox" href="#">'.$img.'</a>';
          $counter++;
        }
        ?>
      </div>
    </div>
    </section>
    <?php endwhile; ?> 

    <section id="bio" class="bio page">
    <div class="about">
      <div class="photo">
      <img src="<?php echo get_template_directory_uri(); ?>/css/imgs/bio.png">
      </div>
      <div class="text">
      <p>You can contact me at</p>
      <p class="email">jim@loudenart.com</p>
      </div>
    </div>
    </section>
  </div>

<?php get_footer(); ?>
