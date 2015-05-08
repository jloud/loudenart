<?php get_header(); ?>

  <?php
    $args = array('category_name=illustration');
    $ill_query = new WP_Query('category_name=artpage');
    //$bio_query = new WP_Query($args);
    $attachments = new Attachments( 'art_attachments', 324 );
    $counter = 1;
  ?>

  <div id="site-container" class="page-art">
    <div class="landing-bg"></div>
    <main id="content" class="content">

      <section id="artwork-section">
        <ul class="artwork-holder">
        <li class="art-intro stamp">
          <h1 class="art-title">
            <span class="text-piece">Jim Louden</span>
            <span class="double-rules"><span>Pen <span class="fix">&</span> Pencil</span></span>
            <span class="text-piece bottom">Illustration</span>
          </h1>
        </li>
        <?php while( $attachments->get() ) :

          $counter2 = $counter;

          if ($counter2 == 1) { ?>
            <li class="thumbs art-holder-<?php echo $counter2; ?> stamp art-img art-lb" data-sub-html="<?php echo $attachments->field( 'title' ); ?>" data-src="<?php echo $attachments->src( 'full' ); ?>">
            <span><a href="#"><?php echo $attachments->image( 'full' ); ?></a></span>
            </li>
            <li class="clear"></li>
        <?php } else { ?>
            <li class="thumbs art-holder-<?php echo $counter2; ?> art-img art-iso art-lb" data-sub-html="<?php echo $attachments->field( 'title' ); ?>" data-src="<?php echo $attachments->src( 'full' ); ?>">
            <span><a href="#"><?php echo $attachments->image( 'full' ); ?></a></span>
            </li>
        <?php } ?>

        <?php
          $counter++;
          endwhile;
        ?>
      
          <li class="art-gutter-sizer"></li>
          <li class="art-grid-sizer"></li>
        </ul>
      </section><!-- #artwork -->
    </main>

    <section id="contact" class="contact page-section">

<?php get_footer('art'); ?>
