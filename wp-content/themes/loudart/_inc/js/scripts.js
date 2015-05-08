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
      a = 'web-single ';
    } else if ($('#main-content').hasClass('web')){
      a = 'page-web';
    } else {
      a = 'page-' + a;
    }
    return a;
  }

  function detectIOS() {
    if(navigator.userAgent.match(/(iPad|iPhone|iPod)/g)) {
      return true;
    }
  }

  function detectTab() {
    if ( Modernizr.touch && (getWindowHeight() < 1030)) { 
      return true;
    }
  }

  function getHash(a){
    a = a.replace(/#/gi, ',#').split(',')[1];
    return a;
  }

  function bgParallax() {
    var wh = getWindowHeight(),
        parController = new ScrollMagic();
    new ScrollScene({triggerElement: $wrapper, duration: wh * 2})
    .setTween(TweenMax.from('.bgParallax', 1, {top: "-75%", ease: Linear.easeNone}))
    .addTo(parController)
  }

  function chapterLinks() {
    new ScrollScene({triggerElement: '#main-content'})
      .setClassToggle('.menu-adjust', 'menu-active')
      .addTo(animController)
  }

  function animControl() {
    var wh = getWindowHeight(),
        urlHash,
        currUrl = document.URL;

    animController.scrollTo(function(target) {
      TweenMax.to(window, 1, {scrollTo: {y: target}, ease: Cubic.easeInOut});
    });

    $('.scroll-top').on('click', function (e) {
      animController.scrollTo(0);
    });

    urlHash = currUrl.replace(/#/gi, ',#').split(',');

    if ( urlHash[0] ) {
      animController.scrollTo(urlHash[1]);
    }

    $('a[href*=#]:not([href=#])').on('click', function (e) {
      var url = $(this).attr('href');
      url = url.replace(/#/gi, ',#').split(',')[1];

      if ( $(url) !== 'undefined' && $(url) !== null) {
        e.preventDefault();
        animController.scrollTo(url);
      }
    });
  }

  function webHome() {
    if(!detectTab()) {
      $('.web-landing-box').addClass('parFix');
      $('.forParallax').addClass('parFix');
      animController = new ScrollMagic();
      chapterLinks();
      animControl();
      // bgParallax();
    } else {
      animController = new ScrollMagic();
      $('.chapter-holder').addClass('mobile');
      $('.forParallax').addClass('vert-align');
      chapterLinks();
    }
  }

  function webSingle() {
    animController = new ScrollMagic();

    if(!detectTab()) {

      var isoContainer = document.querySelector('.work-thumbs'),
          iso;
          
      animControl();
      chapterLinks();
      imagesLoaded(isoContainer, function(){
        iso = new Isotope(isoContainer, {
          itemSelector: 'li',
          masonry: {
            columnWidth: '.grid-sizer'
          }
        });
      });
    }
  }

  function artHome() {
    var isoContainer = document.querySelector('.artwork-holder'),
        iso,
        currWinWidth = getWindowWidth();

    if(currWinWidth > 600) {
      imagesLoaded(isoContainer, function(){
        iso = new Isotope(isoContainer, {
          itemSelector: '.art-iso',
          masonry: {
            columnWidth: '.art-grid-sizer'
          },
          stamp             : '.stamp'
        });
      });
    }
    var lgoptions = {
      speed             : 600,
      preload           : 3,
      thumbnail         : false,
      selector          : '.art-lb'
    }
    $('.artwork-holder').lightGallery(lgoptions);
  }

  function smoothState() {

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
          
          $('body').find("a").css("cursor", "auto");
          $('body').css("cursor", "auto");

          $container.html($content);
          $body.scrollTop(0);

          $(document).ready();
          $(window).trigger('load');
        }
      },
      callback: function(url, $container, $content){}
    }).data('smoothState');
  }

	$(function () {

    isFired = true;

    var currWinWidth = getWindowWidth();

    $(window).on('resize', function () {
      currWinWidth = getWindowWidth();
    }); 

    $('#site-container').addClass('page-show');

    if (currWinWidth > 700) {
      smoothState();
    }

    var urlClass,
        urlHash,
        $siteCont = $('#site-container');

    if( $('.page-home').length ){
      homeHome();
    }

    if( $siteCont.hasClass('page-web-single') ) {
      webSingle();
    }

    if( $siteCont.hasClass('page-web') ) {
      webHome();
    }

    if( $('.artwork-holder').length ){
      artHome();
    }

  });

})(jQuery);