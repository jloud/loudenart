(function ($, root, undefined) {
	
	$(function () {

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
        var tween = TweenMax.to(".art-23", 0.5, {});
        // build scene and supply getWindowHeight function as duration
        var scene = new ScrollScene({triggerElement: ".art-23", duration: getWindowHeight})
                .setTween(tween)
                .addTo(controller);

        controller.scrollTo(function (newpos) {
          TweenMax.to(window, 0.75, {scrollTo: {y: newpos}});
        });

        $(document).on("click", "a[href^=#]", function (e) {
          var id = $(this).attr("href");
          if ($(id).length > 0) {
            e.preventDefault();
            // trigger scroll
            controller.scrollTo(id);
              // if supported by the browser we can even update the URL.
            if (window.history && window.history.pushState) {
              history.pushState("", document.title, id);
            }
          }
        });

        $(window).load(function(){
          // Remove the # from the hash, as different browsers may or may not include it
          var hash = location.hash.replace('#','');

          if(hash != ''){
             // Clear the hash in the URL
             // location.hash = '';   // delete front "//" if you want to change the address bar
             controller.scrollTo('#'+hash);
          }
        });  

        // show indicators (requires debug extension)
        //scene.addIndicators();
       
        $('#nav-holder').mmenu({
          offCanvas: {
            position: "right",
            zposition : "next"
          }
        }).on('opening.mm', function() {
          $('#nav-button').addClass('open');
        }).on('closing.mm', function() {
          $('#nav-button').removeClass('open');
        });
    
        var snapoptions = {
          $menu: false,
          menuSelector: 'a',
          panelSelector: '.page',
          namespace: '',
          onSnapStart: function($target){
            $('.page').removeClass('active-custom');
            $target.addClass('active-custom');
            console.log('this snapped');
          },
          onSnapFinish: function($target){
            var id = $target.attr('id');
            console.log(id.length);
            
            if (id.length > 0) {
              console.log('there is an id');
              if (window.history && window.history.pushState) {
                history.pushState("", document.title, '#'+id);
              }
            }
          },
          onActivate: function(){},
          directionThreshold: 50,
          slideSpeed: 800,
          easing: 'easeInOutCubic',
          keyboardNavigation: {
            enabled: false,
            nextPanelKey: 40,
            previousPanelKey: 38,
            wrapAround: true
          },
          strictContainerSelection: false
        };

        $('body').panelSnap(snapoptions);


        // lightbox

        var lgoptions = {
            mode      : 'slide',  // Type of transition between images. Either 'slide' or 'fade'.
            useCSS    : true,     // Whether to always use jQuery animation for transitions or as a fallback.
            cssEasing : 'ease',   // Value for CSS "transition-timing-function".
            easing    : 'linear', //'for jquery animation',//
            speed     : 600,      // Transition duration (in ms).
            addClass  : '',       // Add custom class for gallery.
            preload   : 3,    //number of preload slides. will exicute only after the current slide is fully loaded. ex:// you clicked on 4th image and if preload = 1 then 3rd slide and 5th slide will be loaded in the background after the 4th slide is fully loaded.. if preload is 2 then 2nd 3rd 5th 6th slides will be preloaded.. ... ...
            showAfterLoad   : true,  // Show Content once it is fully loaded.
            selector        : '.art-img',  // Custom selector property insted of just child.
            index           : false, // Allows to set which image/video should load when using dynamicEl.
            dynamic   : false, // Set to true to build a gallery based on the data from "dynamicEl" opt.
            dynamicEl : [],    // Array of objects (src, thumb, caption, desc, mobileSrc) for gallery els.
            thumbnail            : false,     // Whether to display a button to show thumbnails.
            showThumbByDefault   : false,    // Whether to display thumbnails by default..
            exThumbImage         : false,    // Name of a "data-" attribute containing the paths to thumbnails.
            animateThumb         : false,     // Enable thumbnail animation.
            currentPagerPosition : 'middle', // Position of selected thumbnail.
            thumbWidth           : 100,      // Width of each thumbnails
            thumbMargin          : 5,        // Spacing between each thumbnails
            controls         : true,  // Whether to display prev/next buttons.
            hideControlOnEnd : false, // If true, prev/next button will be hidden on first/last image.
            loop             : false, // Allows to go to the other end of the gallery at first/last img.
            auto             : false, // Enables slideshow mode.
            pause            : 4000,  // Delay (in ms) between transitions in slideshow mode.
            escKey           : true,  // Whether lightGallery should be closed when user presses "Esc".
            closable         : true,  //allows clicks on dimmer to close gallery
       
            counter      : false, // Shows total number of images and index number of current image.
            lang         : { allPhotos: 'All photos' }, // Text of labels.
       
            mobileSrc         : false, // If "data-responsive-src" attr. should be used for mobiles.
            mobileSrcMaxWidth : 640,   // Max screen resolution for alternative images to be loaded for.
            swipeThreshold    : 50,    // How far user must swipe for the next/prev image (in px).
            enableTouch       : true,  // Enables touch support
            enableDrag        : true,  // Enables desktop mouse drag support
       
            vimeoColor    : 'CCCCCC', // Vimeo video player theme color (hex color code).
            videoAutoplay : true,     // Set to false to disable video autoplay option.
            videoMaxWidth : '855px',  // Limits video maximal width (in px).
       
            // Callbacks el = current plugin object
            onOpen        : function(el) {}, // Executes immediately after the gallery is loaded.
            onSlideBefore : function(el) {}, // Executes immediately before each transition.
            onSlideAfter  : function(el) {}, // Executes immediately after each transition.
            onSlideNext   : function(el) {}, // Executes immediately before each "Next" transition.
            onSlidePrev   : function(el) {}, // Executes immediately before each "Prev" transition.
            onBeforeClose : function(el) {}, // Executes immediately before the start of the close process.
            onCloseAfter  : function(el) {} // Executes immediately once lightGallery is closed.
        }

        $(".content").lightGallery(lgoptions);

        $('#art-15 .artwork').isotope({
          itemSelector: '.art-img',
          masonry: {
            columnWidth: 100
          }
        });
	});
	
})(jQuery, this);
