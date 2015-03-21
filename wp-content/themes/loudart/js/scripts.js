(function($, undefined) {

  var isFired = false,
      oldReady = jQuery.fn.ready;

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

    isFired = true;

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
        a = 'page-home';
      } else if ($('#main-content').hasClass('single-post')){
        a = 'web-single ' + 'page-' + a;
      } else if ($('#main-content').hasClass('web')){
        a = 'page-web';
      } else {
        a = 'page-' + a;
      }
      return a;
    }

    function detectIOS() {
      if(navigator.userAgent.match(/(iPad|iPhone|iPod)/g)){
        return true;
      }
    }

    $(window).on('resize', function () {
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

    $('#site-container').addClass('page-show');
  
    var content = $wrapper.smoothState({
      prefetch: true,
      pageCacheSize: 4,
      onStart: {
        duration: 1000, 
        render: function (url, $container) {
          $('#site-container').removeClass('page-show');
        }
      },
      onEnd: {
        duration: 0,
        render: function (url, $container, $content) {

          var urlClass = getUrlClass(url),
              urlHash;

          $container.html($content);
          $container.removeClass();

          if(urlClass){
            $container.addClass(urlClass);
          } else {
            $container.addClass('default');
          }

          $body.scrollTop(0);
          $(document).ready();
          $(window).trigger('load');

          if (url.indexOf('#') !== -1) {
            urlHash = url.replace(/#/gi, ',#').split(',')[1];
            animController.scrollTo(urlHash);
          }
        }
      },
      callback: function(url, $container, $content){
        $(function(){
          // setTimeout(function(){}, 400)
        });
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
      var id = $(this).attr('href'),
          urlHash = id.replace(/#/gi, ',#').split(',')[1];

      //console.log(id);
      if ($(urlHash).length > 0) {
        e.preventDefault();
        animController.scrollTo(urlHash);
      }
    });

    $('.scroll-top').on('click', function (e) {
      animController.scrollTo(0);
    });

    if($('.page-home').length){
      $('.landing-holder').css({
      'background-image':
        '-webkit-linear-gradient(60deg, rgba(145, 182, 226, 0.7), rgba(186, 186, 186, 0.7))'
      });
      if(detectIOS()){
        $('#landing').css({'height': getWindowHeight()});
      }
      new ScrollScene({triggerElement: "#landing", duration: windowHeight * 2})
        .setTween(TweenMax.from(".box", 1, {top: "-45%", ease: Linear.easeNone}))
        .addTo(parController)
    }

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
        thumbnail : false,
        selector        : '.art-lb',  // Custom selector property insted of just child.
        mobileSrc         : false, // If "data-responsive-src" attr. should be used for mobiles.
        mobileSrcMaxWidth : 640,   // Max screen resolution for alternative images to be loaded for.
        swipeThreshold    : 50,    // How far user must swipe for the next/prev image (in px).
        enableTouch       : true,  // Enables touch support
        enableDrag        : true,  // Enables desktop mouse drag support
    }

    $('.artwork-holder').lightGallery(lgoptions);

  });

})(jQuery);