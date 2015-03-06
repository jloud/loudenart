(function($, undefined) {

  var isFired = false;
  var oldReady = jQuery.fn.ready;
  $(function() {
      isFired = true;
      $(document).ready();
  });
  jQuery.fn.ready = function(fn) {
      if(fn === undefined) {
          $(document).trigger('_is_ready');
          return;
      }
      if(isFired) {
          window.setTimeout(fn, 1);
      }
      $(document).bind('_is_ready', fn);
  };

	$(function () {

    var windowWidth = $(window).innerWidth(),
        windowHeight = $(window).innerHeight();

    function getWindowWidth() {
      return windowWidth;
    }
    function getWindowHeight() {
      return windowHeight;
    }
    function getUrlClass(u){
      a = u.replace(/\/$/, '');
      a = a.substr(a.lastIndexOf('/') + 1);
      if(a === 'loudenart' || a === 'louden.io'){
        a = 'home';
      }
      // console.log(a);
      return 'page-'+a;
    }

    $(window).on("resize", function () {
      windowWidth = $(window).innerWidth();
      windowHeight = $(window).innerHeight();
    }); 

    var artScene = [],
        tween,
        artSceneNumber,
        $currId,
        currUrlClass,
        animController,
        $body = $('html, body'),
        $wrapper = $('#wrapper'),
        currUrl = document.URL,
        pageClass = getUrlClass(currUrl);

    //console.log(currUrl);

    animController = new ScrollMagic();
    parController = new ScrollMagic();

    animController.scrollTo(function(target) {
      TweenMax.to(window, 1.5, {scrollTo: {y: target}, ease: Quint.easeInOut});
    });

    


    $wrapper.removeClass().addClass(pageClass);

    if($wrapper.hasClass('page-web')){
      webFunctions();
    }


    //////////////////////
    /* Preload Fade Ins */
    //////////////////////

  
    var content = $wrapper.smoothState({
      prefetch: true,
      pageCacheSize: 4,
      onStart: {
        duration: 250, // Duration of our animation
        render: function (url, $container) {
          content.toggleAnimationClass('is-exiting');
          $body.animate({
              scrollTop: 0
          });
        }
      },
      onEnd: {
        duration: 0,
        render: function (url, $container, $content) {

          var urlClass = getUrlClass(url);

          $container.html($content);
          $container.removeClass();
          
          if(urlClass.length){
            $container.addClass(urlClass);
          } else {
            $container.addClass('default');
          }

          // if(urlClass === 'web'){
          //   webFunctions();
          // } 
          // Trigger document.ready and window.load
          $(document).ready();
          $(window).trigger('load');
        }
      }
    }).data('smoothState');



    //////////////////////////
    /* Coder Landing Scroll */
    //////////////////////////

    function webFunctions(){
      new ScrollScene({triggerElement: ".work"})
        .setClassToggle(".chapter-target", "active")
        .addTo(animController)
      new ScrollScene({triggerElement: ".web-landing", duration: windowHeight * 2})
        .setTween(TweenMax.from(".landing-bg", 1, {top: "-25%", ease: Linear.easeNone}))
        .addTo(parController)
    }

    $('a[href*=#]:not([href=#])').on('click', function (e) {
      var id = $(this).attr('href');
      if ($(id).length > 0) {
        e.preventDefault();
        animController.scrollTo(id);
      }
    });

    if($('.work-thumbs').length){
      var isoContainer = document.querySelector('.work-thumbs');
      var iso;
      imagesLoaded(isoContainer, function(){
        iso = new Isotope(isoContainer, {
          itemSelector: 'li',
          masonry: {
            columnWidth: '.grid-sizer'
          }
        });
      });
    }

    $('.landing-holder').css({
      'background-image':
        '-webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.8), rgba(211, 211, 211, 0.75))'
    });

    if($('.artwork-holder').length){
      var isoContainer = document.querySelector('.artwork-holder');
      var iso;
      imagesLoaded(isoContainer, function(){
        iso = new Isotope(isoContainer, {
          itemSelector: '.art-img',
          masonry: {
            columnWidth: '.art-grid-sizer'
          }
        });
      });
    }

    // LIGHTBOX

    var lgoptions = {
        mode      : 'slide',  // Type of transition between images. Either 'slide' or 'fade'.
        cssEasing : 'ease',   // Value for CSS "transition-timing-function".
        easing    : 'linear', //'for jquery animation',//
        speed     : 600,      // Transition duration (in ms).
        preload   : 3,    //number of preload slides. will exicute only after the current slide is fully loaded. ex:// you
        selector        : '.art-lb',  // Custom selector property insted of just child.
        mobileSrc         : false, // If "data-responsive-src" attr. should be used for mobiles.
        mobileSrcMaxWidth : 640,   // Max screen resolution for alternative images to be loaded for.
        swipeThreshold    : 50,    // How far user must swipe for the next/prev image (in px).
        enableTouch       : true,  // Enables touch support
        enableDrag        : true,  // Enables desktop mouse drag support
    }

    $('.artwork-holder').lightGallery(lgoptions);

    // WORK

    // $('.work-thumbs').isotope({
    //   itemSelector: 'li',
    //   masonry: {
    //     columnWidth: '.grid-sizer'
    //   }
    // });

    // paceOptions = {
    //   restartOnPushState: false
    // }
      

      //   scrollActions = function(target) {
      //     $('.page, .chapters li').removeClass('active');
      //     target.addClass('active');
      //     $('.chapters').find('.'+target.attr('id')).addClass('active');
      //     //contArt.scrollTo(target);
      //   }

      //   pageControls = function(el){
      //     var $currId = $('#content').find('.active'),
      //         $nextId = $currId.next(),
      //         $prevId = $currId.prev(),
      //         dir = el.attr('id').split('-').pop(),
      //         $target = el,
      //         id;

      //     if (dir === 'prev'){
      //       if ($currId.is(':first-child')) {
      //         id = $currId.attr('id');
      //         return false;
      //       } else {
      //         scrollActions($prevId);
      //         id = $prevId.attr('id');
      //       }
      //     } else if (dir === 'next'){
      //       if ($currId.is(':last-child')) {
      //         $currId.addClass('rightEnd2');
      //         setTimeout(function() {
      //           $currId.removeClass('rightEnd2');
      //         }, 400);
      //         id = $currId.attr('id');
      //         return false;
      //       } else {
      //         scrollActions($nextId);
      //         id = $nextId.attr('id'); 
      //       }
      //     } else {
      //       scrollActions(el);
      //       id = $target.attr('id'); 
      //     }
      //     if (id.length > 0) {
      //       if (window.history && window.history.pushState) {
      //         if(id === 'introduction') {
      //           $('body').addClass('page-intro');
      //           history.pushState("", document.title, window.location.pathname);
      //         } else if(id === 'contact'){
      //           $('body').addClass('page-contact');
      //           history.pushState("", document.title, '#'+id);
      //         } else {
      //           $('body').removeClass('page-intro page-contact');
      //           history.pushState("", document.title, '#'+id);
      //         }
      //       }
      //     }
      //   }

      //   $(window).load(function(){
      //     var hash = location.hash.replace('#','');

      //     if(hash === 'introduction'){
      //       $('body').addClass('page-intro');
      //       return false;
      //     } else if(hash === 'contact'){
      //       $('body').addClass('page-contact');
      //       return false;
      //     } else if (hash != ''){
      //        $('body').removeClass('page-intro page-contact');
      //        $currId = $('#'+hash);
      //        scrollActions($currId);
      //     } else {
      //       $('body').addClass('page-intro');
      //       return false;
      //     }
      //     if ($currId == undefined){
      //       $currId = $('#introduction');
      //     }
      //   }); 

      //   $(window).on('resize', function () {
      //     $currId = $('#content').find('.active');
      //     //contArt.scrollTo($currId);
      //     scrollActions($currId);
      //   });


      //   // MENU

      //   var $menuBut = $('#menu-button'),
      //       $menuOverlay = $('div.menu-overlay');
      //       //closeBttn = overlay.querySelector( 'button.overlay-close' );

      //   $menuBut.on("click", function() {
      //     $(this).toggleClass('open');
      //     $('#wrapper').toggleClass('blur');
      //     $menuOverlay.toggleClass('open');
      //   });

      //   $('#nav-list a').on("click", function() {
      //     $menuOverlay.removeClass('open');
      //     $('#wrapper').removeClass('blur');
      //   });

      //   $('.icon-button').on('click', function (e) {
      //     pageControls($(this));
      //   });

      //   $('#button-intro').on("click", function (e) {
      //     firstId = $('.content').find(':first-child').next('section').attr('id');
      //     pageControls($('#heavy-pen-work'));
      //     console.log(firstId);
      //   });

      //   $('#nav-list li a, #chapters a').on("click", function (e) {
      //     e.preventDefault();
      //     var hrefId = $(this).attr('href');
      //     if (hrefId != undefined){
      //       pageControls($(hrefId));
      //     }
      //   });

      
     

  });
	
// })(jQuery, this);

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

    //         if($('body').hasClass('artpage')){
    //   animController = new ScrollMagic({vertical: false});
    //   animController.scrollTo(function(target) {
    //     var eleWidth = $('.artwork-holder').first().width(),
    //         newTarget = target - ((windowWidth/2) - (eleWidth/2));
    //     if(target === 0){
    //       newTarget = 0;
    //     }   
    //     TweenMax.to(window, 1.2, {scrollTo: {x: newTarget}, ease: Quint.easeOut});
    //   });

    //   new ScrollScene({ triggerElement: $('#content'), duration: '10000px'})
    //     .setTween(parallaxtween)
    //     .addTo(animController);
    // }


})(jQuery);