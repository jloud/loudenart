(function ($, root, undefined) {
	
	$(function () {

    // window dimensions
    var windowWidth = $(window).innerWidth(),
        windowHeight = $(window).innerHeight();
    // function to be used to retrieve variable
    function getWindowWidth() {
      return windowWidth;
    }
    function getWindowHeight() {
      return windowHeight;
    }
    $(window).on("resize", function () {
      windowWidth = $(window).innerWidth();
      windowHeight = $(window).innerHeight();
    }); 

    var artScene = [],
        element,
        element1,
        tween,
        artSceneNumber,
        $currId,
        contArt = new ScrollMagic({vertical: false});
        //contPar = new ScrollMagic({vertical: false});
        //contPar = new ScrollMagic({vertical: false});

        artScene = document.getElementsByClassName('artwork-holder'),
        artSceneNumber = artScene.length;

        artTween = function(el) {
          picTween = TweenMax.fromTo(el, 0.5, 
              {'bottom': '-60px'},
              {'bottom': '0px'}
          );
        }

        var parallaxtween = new TimelineMax ()
          .add([
            TweenMax.fromTo(".bg-parallax > div", 1.2, {backgroundPosition: "350px 0"},{backgroundPosition: "-350px 0", ease: Quint.easeOut})
        ]);

        for (var i = 0; i < artSceneNumber; i++){
          element = artScene[i];
          var $artId = $(element),
              $artImgs = [];
              
              $artId.find('.img-holder').each(function(){
                $artImgs.push($(this));
              });

              //console.log($artImgs);
              // });
          // for (var j = 0; j < $artImgs; j++) {
          //   element1 = $artImgs[j];
          //   var $indImg = $(element1);
          //   artTween($artImgs[j]);
          //   console.log($artImgs[j]);
          //   new ScrollScene({ triggerElement: $artId, duration: 300})
          //     .setTween(picTween)
          //     .addTo(contArt);
          // }
        }

        new ScrollScene({ triggerElement: $('#content'), duration: '10000px'})
          .setTween(parallaxtween)
          .addTo(contArt);

        contArt.scrollTo(function (target) {
          var eleWidth = $('.artwork-holder').first().width(),
              newTarget = target - ((windowWidth/2) - (eleWidth/2));
          if(target === 0){
            newTarget = 0;
          }
          console.log(target);    
          TweenMax.to(window, 1.2, {scrollTo: {x: newTarget}, ease: Quint.easeOut});
        });

        scrollActions = function(target) {
          $('.page, .chapters li').removeClass('active');
          target.addClass('active');
          $('.chapters').find('.'+target.attr('id')).addClass('active');
          contArt.scrollTo(target);
        }

        pageControls = function(el){
          var $currId = $('#content').find('.active'),
              $nextId = $currId.next(),
              $prevId = $currId.prev(),
              dir = el.attr('id').split('-').pop(),
              $target = el,
              id;

          if (dir === 'prev'){
            if ($currId.is(':first-child')) {
              id = $currId.attr('id');
              return false;
            } else {
              scrollActions($prevId);
              id = $prevId.attr('id');
            }
          } else if (dir === 'next'){
            if ($currId.is(':last-child')) {
              $currId.addClass('rightEnd2');
              setTimeout(function() {
                $currId.removeClass('rightEnd2');
              }, 400);
              id = $currId.attr('id');
              return false;
            } else {
              scrollActions($nextId);
              id = $nextId.attr('id'); 
            }
          } else {
            scrollActions(el);
            id = $target.attr('id'); 
          }
          if (id.length > 0) {
            if (window.history && window.history.pushState) {
              if(id === 'introduction') {
                $('body').addClass('page-intro');
                history.pushState("", document.title, window.location.pathname);
              } else if(id === 'contact'){
                $('body').addClass('page-contact');
                history.pushState("", document.title, '#'+id);
              } else {
                $('body').removeClass('page-intro page-contact');
                history.pushState("", document.title, '#'+id);
              }
            }
          }
        }

        $(window).load(function(){
          var hash = location.hash.replace('#','');

          if(hash === 'introduction'){
            $('body').addClass('page-intro');
            return false;
          } else if(hash === 'contact'){
            $('body').addClass('page-contact');
            return false;
          } else if (hash != ''){
             $('body').removeClass('page-intro page-contact');
             $currId = $('#'+hash);
             scrollActions($currId);
          } else {
            $('body').addClass('page-intro');
            return false;
          }
          if ($currId == undefined){
            $currId = $('#introduction');
          }
        }); 

        $(window).on('resize', function () {
          $currId = $('#content').find('.active');
          //contArt.scrollTo($currId);
          scrollActions($currId);
        }); 

        $('.icon-button').on('click', function (e) {
          pageControls($(this));
        });

        $('#button-intro').on("click", function (e) {
          firstId = $('.content').find(':first-child').next('section').attr('id');
          //pageControls($('#' + firstId));
          pageControls($('#heavy-pen-work'));
          console.log(firstId);
        });

        $('#nav-list li a, #chapters a').on("click", function (e) {
          e.preventDefault();
          var hrefId = $(this).attr('href');
          if (hrefId != undefined){
            pageControls($(hrefId));
          }
        });

      
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
            selector        : '.img-holder',  // Custom selector property insted of just child.
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

        $('#content').lightGallery(lgoptions);

        // MENU

        var $menuBut = $('#menu-button'),
            $menuOverlay = $('div.menu-overlay');
            //closeBttn = overlay.querySelector( 'button.overlay-close' );

        $menuBut.on("click", function() {
          $(this).toggleClass('open');
          $('#wrapper').toggleClass('blur');
          $menuOverlay.toggleClass('open');
        });

        $('#nav-list a').on("click", function() {
          $menuOverlay.removeClass('open');
          $('#wrapper').removeClass('blur');
        });

        // $('.artwork-page').isotope({
        //   layoutMode: 'masonryHorizontal',
        //   itemSelector: 'a',
        //   masonryHorizontal: {
        //     rowHeight: 50,
        //     gutter: 10
        //   }
        // });

        $('.work-thumbs').isotope({
          itemSelector: 'li',
          masonry: {
            columnWidth: '.grid-sizer'
          }
        });

paceOptions = {
  restartOnPushState: false
}

	});
	
})(jQuery, this);

//var snapoptions = {
        //   $menu: false,
        //   menuSelector: 'a',
        //   panelSelector: '.page',
        //   namespace: '',
        //   onSnapStart: function($target){
        //     // $('.page').removeClass('active-custom');
        //     // $target.addClass('active-custom');
        //     console.log('this snapped');
            
        //   },
        //   onSnapFinish: function($target){},
        //   onActivate: function(){},
        //   directionThreshold: 50,
        //   slideSpeed: 800,
        //   easing: 'easeInOutCubic',
        //   keyboardNavigation: {
        //     enabled: false,
        //     nextPanelKey: 40,
        //     previousPanelKey: 38,
        //     wrapAround: true
        //   },
        //   strictContainerSelection: false
        // };

        // $('#content').panelSnap(snapoptions);
