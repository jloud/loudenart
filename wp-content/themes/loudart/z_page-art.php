<?php get_header(); ?>

  <?php
    $args = array('category_name=illustration');
    $ill_query = new WP_Query('category_name=illustration');
    //$bio_query = new WP_Query($args);
    $counter;
    $src;
  ?>

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

      $counter = 1;
      foreach($aImgs[0] as $img) {
        $src = (string) reset(simplexml_import_dom(DOMDocument::loadHTML($img))->xpath("//img/@src"));
        echo '<div class="img-holder art-holder'.$counter.'" data-src="'.$src.'" data-sub-html="'.get_the_title().'" ><a href="#">'.$img.'</a></div>';
        //echo '<a class="lbox" href="#">'.$img.'</a>';
        $counter++;
      }
      ?>

    <?php endwhile; ?> 
    <?php wp_reset_query(); ?>
  </div>

<?php get_footer(); ?>
