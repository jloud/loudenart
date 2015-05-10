<?php

function louden_scripts()
{
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('conditionizr', get_template_directory_uri() . '/_inc/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0');
    wp_register_script('modernizr', get_template_directory_uri() . '/_inc/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1');
    wp_register_script('tweenmax', get_template_directory_uri() . '/_inc/js/lib/TweenMax.js', array(), '1.0.0', true);
    wp_register_script('tweenmax-css', get_template_directory_uri() . '/_inc/js/lib/CSSPlugin.min.js', array(), '1.0.0', true);
    wp_register_script('tweenmax-scrollto', get_template_directory_uri() . '/_inc/js/lib/ScrollToPlugin.min.js', array(), '1.0.0', true);
    wp_register_script('jquery', get_template_directory_uri() . '/_inc/js/lib/jquery.min.2.1.1.js', array(), '2.1.1');
    wp_register_script('scrollmagic', get_template_directory_uri() . '/_inc/js/lib/class.ScrollMagic.js', array('jquery'), '1.0.0', true);
    wp_register_script('scrollscene', get_template_directory_uri() . '/_inc/js/lib/class.ScrollScene.js', array('jquery'), '1.0.0', true);
    wp_register_script('scrolldebug', get_template_directory_uri() . '/_inc/js/lib/class.ScrollScene.extend.debug.js', array('jquery'), '1.0.0', true);
    wp_register_script('isotope', get_template_directory_uri() . '/_inc/js/lib/isotope.pkgd.min.js', array(), '1.0.0', true);
    wp_register_script('isotope-hor', get_template_directory_uri() . '/_inc/js/lib/masonry-horizontal.js', array(), '1.0.0');
    wp_register_script('images-load', get_template_directory_uri() . '/_inc/js/lib/imagesloaded.pkgd.min.js', array(), '1.0.0', true);
    wp_register_script('lightgallery', get_template_directory_uri() . '/_inc/js/lib/lightGallery.js', array(), '1.0.0');
    wp_register_script('easing', get_template_directory_uri() . '/_inc/js/lib/jquery.easing.1.3.js', array('jquery'), '1.0.0', true);
    wp_register_script('utillls', get_template_directory_uri() . '/_inc/js/lib/utils.js', array('jquery'), '1.0.0', true);
    wp_register_script('preloader', get_template_directory_uri() . '/_inc/js/lib/pace.min.js', array('jquery'), '1.0.0', true);
    wp_register_script('smooth-state', get_template_directory_uri() . '/_inc/js/lib/jquery.smoothState.js', array('jquery',), '1.0.0', true);
    wp_register_script('scripts', get_template_directory_uri() . '/_inc/js/scripts.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('jquery');
    wp_enqueue_script('tweenmax');
    wp_enqueue_script('tweenmax-css');
    wp_enqueue_script('tweenmax-scrollto');
    wp_enqueue_script('conditionizr');
    wp_enqueue_script('modernizr');
    wp_enqueue_script('scrollmagic');
    wp_enqueue_script('scrollscene');
    wp_enqueue_script('scrolldebug');
    wp_enqueue_script('isotope');
    // wp_enqueue_script('isotope-hor');
    wp_enqueue_script('images-load');
    wp_enqueue_script('lightgallery');
    wp_enqueue_script('easing');
    wp_enqueue_script('smooth-state');
    wp_enqueue_script('utillls');
    // wp_enqueue_script('preloader');
    wp_enqueue_script('scripts');
  }
}

// https://wordpress.org/support/topic/change-html-structure-of-all-img-tags-in-wordpress

function restructure_imgs($content) {
  $doc = new DOMDocument();
  $doc->LoadHTML($content);
  $images = $doc->getElementsByTagName('img');
  $attributes = array('src'=>'data-src');

  foreach ($images as $image) {
    foreach ($attributes as $key=>$value) {
      // Get the value of the current attributes and set them to variables.
      $$key = $image->getAttribute($key);
      $title = $image->getAttribute('title');
      // Remove the existing attributes.
      $image->removeAttribute($key);
      // Set the new attribute.
      $image->setAttribute($value, $$key);
      // Replace existing class with the new fs-img class.
      $image->setAttribute('class', 'art-img');
      $image->setAttribute('src', $src);
      $image->setAttribute('data-sub-html', '<p class="caption">'.$title.'</p>');
    }
    // You already have the $src once the $attributes loop has run, so you can use it here.
    // Find size attributes
    //$imagesize = getimagesize($src);
    // Set image size attributes
    // $image->setAttribute('data-width', $imagesize[0]);
    // $image->setAttribute('data-height', $imagesize[1]);
    // Add the new noscript node.
    //$noscript = $doc->createElement('noscript');
    //$noscriptnode = $image->parentNode->insertBefore($noscript, $image);
    // Add the img node to the noscript node.
    //$img = $doc->createElement('IMG');
    //$newimg = $noscriptnode->appendChild($img);
    //$newimg->setAttribute('src', $src);
  }
  return $doc->saveHTML();
}
add_filter('the_content', 'restructure_imgs');

add_action('init', 'louden_scripts');


function art_attachments( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'attachments' ),    // label to display
      'default'   => 'title',                         // default value upon selection
    )
  );

  $args = array(
    // title of the meta box (string)
    'label'         => 'Art Attachments',
    // all post types to utilize (string|array)
    'post_type'     => array( 'post', 'page' ),
    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',
    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',
    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => null,  // no filetype limit
    // include a note within the meta box (string)
    'note'          => 'Attach files here!',
    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,
    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Files', 'attachments' ),
    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),
    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',
    // whether Attachments should set 'Uploaded to' (if not already set)
    'post_parent'   => false,
    // fields array
    'fields'        => $fields,
  );

  $attachments->register( 'art_attachments', $args ); // unique instance name
}

add_action( 'attachments_register', 'art_attachments' );

function get_post_id( $id )
{
  $post = get_page_by_title( $id, OBJECT, 'post' );
  return $post->ID;
}



?>