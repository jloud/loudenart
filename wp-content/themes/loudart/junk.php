<main role="main">
    <div class="main-holder">
      <?php
      $args = array('category_name=illustration');
      $the_query = new WP_Query($args); 
      ?>

      <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
      <section class="artwork-holder art-<?php the_ID(); ?>">  
      <div class="artwork">
        <span class="caption"><?php the_title(); ?></span>
        <?php the_content(); ?>
      </div>
      </section>
      <?php endwhile; ?> 

      <div id="animate" class="box1 blue">
        <p>Just breathe.</p>
        <a href="#" class="viewsource">view source</a>
      </div>
    </div>
  </main>



  var windowHeight = $(window).innerHeight();
        // function to be used to retrieve variable
        function getWindowHeight() {
          return windowHeight;
        }
        // update window height on resize
        $(window).on("resize", function () {
          windowHeight = $(window).innerHeight();
        });             

        // init controller
        var controller = new ScrollMagic();
        // build tween
        var tween = TweenMax.to(".art-23", 0.5, {scale: 1.3});
        // build scene and supply getWindowHeight function as duration
        var scene = new ScrollScene({triggerElement: ".art-23", duration: getWindowHeight})
                .setTween(tween)
                .addTo(controller);

        // show indicators (requires debug extension)
        //scene.addIndicators();
  $('#nav-list').mmenu({
      slidingSubmenus: false
    }).on('opening.mm', function() {
      $('#nav-button').addClass('open');
    }).on('closing.mm', function() {
      $('#nav-button').removeClass('open');
    });



    var lightboxdefaults = {
            namespace:    'featherlight',         /* Name of the events and css class prefix */
            targetAttr:   'src',                  /* Attribute of the triggered element that contains the selector to the lightbox content */
            variant:      null,                   /* Class that will be added to change look of the lightbox */
            resetCss:     false,                  /* Reset all css */
            background:   null,                   /* Custom DOM for the background, wrapper and the closebutton */
            openTrigger:  'click',                /* Event that triggers the lightbox */
            closeTrigger: 'click',                /* Event that triggers the closing of the lightbox */
            filter:       null,                   /* Selector to filter events. Think $(...).on('click', filter, eventHandler) */
            root:         'body',                 /* Where to append featherlights */
            openSpeed:    250,                    /* Duration of opening animation */
            closeSpeed:   250,                    /* Duration of closing animation */
            closeOnClick: 'background',           /* Close lightbox on click ('background', 'anywhere', or false) */
            closeOnEsc:   true,                   /* Close lightbox when pressing esc */
            closeIcon:    '&#10005;',             /* Close icon */
            otherClose:   null,                   /* Selector for alternate close buttons (e.g. "a.close") */
            beforeOpen:   $.noop,                 /* Called before open. can return false to prevent opening of lightbox. Gets event as parameter, this contains all data */
            beforeContent: $.noop,                /* Called when content is loaded. Gets event as parameter, this contains all data */
            beforeClose:  $.noop,                 /* Called before close. can return false to prevent opening of lightbox. Gets event as parameter, this contains all data */
            afterOpen:    $.noop,                 /* Called after open. Gets event as parameter, this contains all data */
            afterContent: $.noop,                 /* Called after content is ready and has been set. Gets event as parameter, this contains all data */
            afterClose:   $.noop,                 /* Called after close. Gets event as parameter, this contains all data */
            onKeyDown:    $.noop,                                   /* Called on key down for the frontmost featherlight */
            type:         null,                   /* Specify content type. If unset, it will check for the targetAttrs value. */
            contentFilters: ['jquery', 'image', 'html', 'ajax', 'text'] /* List of content filters to use to determine the content */
            
        }

        $('.artwork img').featherlightGallery(lightboxdefaults);


        $(document).on("click", "a[href^=#]", function (e) {
          var id = $(this).attr("href");
          if ($(id).length > 0) {
            e.preventDefault();
            // trigger scroll
            contArt.scrollTo(id);
              // if supported by the browser we can even update the URL.
            if (window.history && window.history.pushState) {
              history.pushState("", document.title, id);
            }
          }
        });

         <div class="chapter-holder">
      <ul class="chapters">
        <li><a href="#introduction">Home</a></li>
        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
        <li><a href="#art-<?php the_ID(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?> 
      </ul>
    </div>