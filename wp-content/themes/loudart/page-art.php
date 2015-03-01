<?php get_header(); ?>

  <?php
    $args = array('category_name=illustration');
    $ill_query = new WP_Query('category_name=illustration');
    //$bio_query = new WP_Query($args);
    $counter;
    $src;
  ?>

  <main id="content" class="content">
    <section id="introduction" class="introduction page active">
      <div class="title-holder">
        <h1>
        Jim Louden
        <span class="pp"><span class="double-rules"><span>Pen <span class="fix">&</span> Pencil</span></span></span>
        Illustration
        </h1>
      </div>
  
      <div class="arrow-holder"><a href="#heavy-pen-work" class="arrow-down"><span></span></a></div>
      
    </section>
    <section id="artwork">
      <ul class="artwork-holder">
      <li class="grid-sizer"></li>
    <?php while ($ill_query -> have_posts()) : $ill_query -> the_post();

      remove_filter ('the_content', 'wpautop');

      $pContent = $post->post_content;
      $pTitle = $post->post_name;
      $imgPattern = '~<img [^\>]*\ />~';

      preg_match_all( $imgPattern, $pContent, $aImgs );
      $imgNumber = count($aImgs[0]);
      $counter = 1;

      echo '<h2 id="'.$pTitle.'" class="'.$pTitle.'-rule clear-row art-img"><span>'.get_the_title().'</span></h2>';

      foreach($aImgs[0] as $img) {
        $src = (string) reset(simplexml_import_dom(DOMDocument::loadHTML($img))->xpath("//img/@src"));
        echo '<li class="'.$pTitle.' art-holder-'.$counter.' art-img" data-src="'.$src.'" data-sub-html="'.get_the_title().'" ><a href="#">'.$img.'</a></li>';
        $counter++;
      }

      ?>

    <?php endwhile; ?> 
    <?php wp_reset_query(); ?>
        <li class="art-gutter-sizer"></li>
        <li class="art-grid-sizer"></li>
      </ul>
    </section><!-- #artwork -->
  </main>

<?php get_footer(); ?>
