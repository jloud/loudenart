<?php get_header(); ?>

  <?php
    $artpost = get_post_id( 'Art Page' );

    $attachments = new Attachments( 'art_attachments', $artpost );
    $counter = 1;
  ?>

  <div id="site-container" class="page-art">
    <div class="landing-bg"></div>
    <main id="content" class="content">

      <section id="artwork-section">
        <div class="art-intro-holder">
          <div class="art-intro">
            <h1 class="art-title">
              <span class="text-piece name">Jim Louden</span>
              <span class="double-rules"><span>Pen <span class="fix">&</span> Pencil</span></span>
              <span class="text-piece bottom">Illustration</span>
            </h1>
          </div>
          <div class="art-intro">
          <?php if( $attachments->exist() ) : ?>
            <?php $first_index = 0; ?>
            <?php if ( $attachment = $attachments->get_single( $first_index ) ) : ?>
              <div class="thumbs art-img-intro art-lb" data-sub-html="<?php echo $attachments->field( 'title', $first_index ); ?>" data-src="<?php echo $attachments->src( 'large', $first_index ); ?>">
              <span><a href="#"><?php echo $attachments->image( 'large', $first_index ); ?></a></span>
              </div>
            <?php endif ; ?>
          </div>
          <div class="clear"></div>
        </div><!-- art-intro-holder -->
        <ul class="artwork-holder">
       
        <?php while( $attachments->get() ) :

          $counter2 = $counter;

          if ( $counter2 != 1 ) : ?>
      
            <li class="thumbs art-holder-<?php echo $counter2; ?> art-img art-iso art-lb" data-sub-html="<?php echo $attachments->field( 'title' ); ?>" data-src="<?php echo $attachments->src( 'large' ); ?>">
            <span><a href="#"><?php echo $attachments->image( 'thumbnail' ); ?></a></span>
            </li>

        <?php endif;

            $counter++;
            endwhile;
          endif; ?>
          <li class="art-gutter-sizer"></li>
          <li class="art-grid-sizer"></li>
        </ul>
      </section><!-- #artwork -->
    </main>

    <section id="contact" class="contact page-section">

<?php get_footer('art'); ?>
