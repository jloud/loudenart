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

  function bgParallax(){
    var wh = getWindowHeight();
    new ScrollScene({triggerElement: $wrapper, duration: wh * 2})
    .setTween(TweenMax.from('.bgParallax', 1, {top: "-45%", ease: Linear.easeNone}))
    .addTo(parController)
  }

  // function forParallax(tr,el) {
  //   var wh = getWindowHeight();
  //   console.log(wh);
  //   new ScrollScene({triggerElement: tr, duration: wh * 2})
  //     .setTween(TweenMax.from(el, 1, {top: '-70%', ease: Linear.easeNone}))
  //     .addTo(parController)
  // }

  function chapterLinks() {
    new ScrollScene({triggerElement: '.work'})
      .setClassToggle('.chapter-target', 'active')
      .addTo(animController)
  }

  function animControl() {
    var wh = getWindowHeight(),
        urlHash,
        currUrl = document.URL;

    animController.scrollTo(function(target) {
      TweenMax.to(window, 1.5, {scrollTo: {y: target}, ease: Quint.easeInOut});
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

  function homeHome() {
    if(!detectTab()) {
      animController = new ScrollMagic();
      animControl();
    } else {
      $('.forParallax').addClass('vert-align');
    }

    if(detectIOS()){
      $('#landing').css({ 'height': getWindowHeight() });
    }

    if(navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
     //Do Firefox-related activities
    }

    $('.landing-holder').css({
    'background-image':
      'linear-gradient(60deg, rgba(145, 182, 226, 0.7), rgba(186, 186, 186, 0.7))'
    });
  }

  function webHome() {
    if(!detectTab()) {
      $('.web-landing-box').addClass('parFix');
      $('.forParallax').addClass('parFix');
      animController = new ScrollMagic();
      chapterLinks();
      animControl();
    } else {
      $('.chapter-holder').addClass('mobile');
      $('.forParallax').addClass('vert-align');
    }
  }

  function webSingle() {
    animController = new ScrollMagic();

    if(!detectTab()) {

      var isoContainer = document.querySelector('.work-thumbs'),
          iso;
          
      animControl();
         
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

    parController = new ScrollMagic();

    $('#site-container').addClass('page-show');

    smoothState();

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
      var isoContainer = document.querySelector('.artwork-holder'),
          iso;

      if(currWinWidth > 600) {
        imagesLoaded(isoContainer, function(){
          iso = new Isotope(isoContainer, {
            itemSelector: '.art-img',
            masonry: {
              columnWidth: '.art-grid-sizer'
            }
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
  });

})(jQuery);

 // if( $('.page-web').length ) {
      
    // }

    // if( $('.web-single').length ) {

    //   animController = new ScrollMagic();

    //   if(!detectTab()) {

    //     var isoContainer = document.querySelector('.work-thumbs'),
    //         iso;
            
    //     animControl();
           
    //     imagesLoaded(isoContainer, function(){
    //       iso = new Isotope(isoContainer, {
    //         itemSelector: 'li',
    //         masonry: {
    //           columnWidth: '.grid-sizer'
    //         }
    //       });
    //     });
    //   }
    // }