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


  // tools

  function getWindowWidth() {
    var windowWidth = $(window).innerWidth();
    return windowWidth;
  }

  function getWindowHeight() {
    var windowHeight = $(window).innerHeight();
    return windowHeight;
  }

  function getUrlClass(u){
    var a = u.replace(/\/$/, '');
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

  function getHash(a){
    a = a.replace(/#/gi, ',#').split(',')[1];
    return a;
  }

  function bgParallax(){

    var wh = getWindowHeight();

    new ScrollScene({triggerElement: $wrapper, duration: wh * 2})
    .setTween(TweenMax.from('.bgParallax', 1, {top: "-25%", ease: Linear.easeNone}))
    .addTo(parController)
  }

  function webFunctions(){
    var wh = getWindowHeight();

    new ScrollScene({triggerElement: ".work"})
      .setClassToggle(".chapter-target", "active")
      .addTo(animController)
  }


	$(function () {

    isFired = true;

    // $(window).on('resize', function () {
    //   windowWidth = $(window).innerWidth();
    //   windowHeight = $(window).innerHeight();
    // }); 

    animController = new ScrollMagic();
    parController = new ScrollMagic();

    animController.scrollTo(function(target) {
      TweenMax.to(window, 1.5, {scrollTo: {y: target}, ease: Quint.easeInOut});
    });

    $wrapper.removeClass().addClass(pageClass);

    


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
      callback: function(url, $container, $content){}
    }).data('smoothState');



    //////////////////////////
    /* Coder Landing Scroll */
    //////////////////////////

    


    if($('.page-home').length){

      var wh = getWindowHeight();

      $('.landing-holder').css({
      'background-image':
        '-webkit-linear-gradient(60deg, rgba(145, 182, 226, 0.7), rgba(186, 186, 186, 0.7))'
      });
      if(detectIOS()){
        $('#landing').css({ 'height': wh });
      }
      bgParallax();
      new ScrollScene({triggerElement: "#landing", duration: wh * 2})
        .setTween(TweenMax.from(".box", 1, {top: "-45%", ease: Linear.easeNone}))
        .addTo(parController)
    }

    if($wrapper.hasClass('page-web')){
      webFunctions();
      bgParallax();
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

      var lgoptions = {
        speed             : 600,
        preload           : 3,
        thumbnail         : false,
        selector          : '.art-lb'
      }
      $('.artwork-holder').lightGallery(lgoptions);
    }


    $('a[href*=#]:not([href=#])').on('click', function (e) {
      var id = $(this).attr('href');
      id = getHash(id);
      if ( $(id) ) {
        e.preventDefault();
        animController.scrollTo(id);
      }
    });

    $('.scroll-top').on('click', function (e) {
      animController.scrollTo(0);
    });


  });

})(jQuery);