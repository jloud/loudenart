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

var $container = $('#art-15 .artwork'),
            $body = $('body'),
            colW = 60,
            columns = null;

        $container.isotope({
          resizable: false,
          itemSelector: '.art-img',
          masonry: {
            columnWidth: colW
          }
        });

        // $('.content').scrollsnap({
        //     snaps: '.page',
        //     proximity: 50,
        //     direction: 'x'
        // });

        $(window).smartresize(function(){
          // measure the width of all the items
          var itemTotalWidth = 0;
          $container.children().each(function(){
            itemTotalWidth += $(this).outerWidth(true);
          });
          
          // check if columns has changed
          var bodyColumns = Math.floor( ( $body.width() -10 ) / colW ),
              itemColumns = Math.floor( itemTotalWidth / colW ),
              currentColumns = Math.min( bodyColumns, itemColumns );
          if ( currentColumns !== columns ) {
            // set new column count
            columns = currentColumns;
            // apply width to container manually, then trigger relayout
            $container.width( columns * colW )
              .isotope('reLayout');
          }
          
        }).smartresize(); // trigger resize to set container width


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

    //@import "jquery.mmenu.oncanvas";

//@import "addons/jquery.mmenu.offcanvas";

//@import "addons/jquery.mmenu.header";

//@import "extensions/jquery.mmenu.positioning";

// .mm-menu {
//   z-index: 300;
//   background: #fff;
//   &.mm-front {
//     border-left: 5px solid #000;
//     box-shadow: none;
//   }
//   .mm-header {
//     padding: 0 20px;
//     color: #000;
//     text-align: left;
//     border: 0;
//   }
//   h2 {
//     margin: 25px 0 0;
//     padding-bottom: 20px;
//     font-family: $serif;
//     font-size: 2.3rem;
//     font-weight: normal;
//     border-bottom: 1px solid #000;
//     span {
//       font-family: $sans;
//       font-weight: 300;
//       font-size: 1.5rem;
//     }
//   }
//   &.mm-hasheader li.mm-subtitle {
//     display: block;
//   }
// }

// .mm-menu .mm-list > li > a.mm-subclose {
//   margin-top: -13px;
//   padding-top: 20px;
//   padding-bottom: 20px;
//   background: #000;
//   color: #fff;
// }

// .mm-menu .mm-list > li > a.mm-subopen:after, .mm-menu .mm-list > li > a.mm-subclose:before {
//   width: 10px;
//   height: 10px;
//   margin-bottom: -5px;
//   border-color: #fff;
//   border-width: 1px;
// }

// .mm-menu .mm-list > li.mm-selected > a:not(.mm-subopen), .mm-menu .mm-list > li.mm-selected > span {
//   background: transparent;
// }

// .mm-menu .mm-list > li > a.mm-subopen:before {
//   border: 0;
// }

// .mm-list a.mm-subopen:after {
//   color: #000;
//   border-color: #000 !important;
// }

// .mm-menu.mm-hasheader > .mm-panel.mm-list {
//   padding-top: 100px;
//   a {
//     padding-left: 50px;
//     font-family: $serif;
//     font-size: 1.7rem;
//     color: #000;
//     &.mm-subclose {
//       color: #fff;
//     }
//   }
//   .email-line a {
//     padding-left: 20px;
//   }
//   .artwork-line a {
//     padding-left: 20px;
//   }
//   & > li:after {
//     border: 0;
//   }
// }

module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    autoprefixer: {
      css: {
        src: 'css/**.css'
      }
    },
    compass: {
      options: {
        require: 'susy'
      },
      dist: {
        options: {
          sassDir: 'scss',
          cssDir: 'css'
        }
      }
    },
    watch: {
      tasks: ['compass', 'autoprefixer:css']
      //tasks: ['autoprefixer']
    }
  });
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.registerTask('default',['watch']);
}

 $counter = 1;
        foreach($aImgs[0] as $img) {
          $src = (string) reset(simplexml_import_dom(DOMDocument::loadHTML($img))->xpath("//img/@src"));
          echo '<div class="img-holder imgpic-'.$counter.'" data-src="'.$src.'" data-sub-html="'.get_the_title().'" /><a href="#">'.$img.'</a></div>';
          //echo '<a class="lbox" href="#">'.$img.'</a>';
          $counter++;
        }