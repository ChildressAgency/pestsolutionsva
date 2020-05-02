/*!
 * theme custom scripts
*/

jQuery(document).ready(function($){
  AOS.init();

  //var $hero = $('.hp-hero');
  var $hero = $('[data-hero_images]');

  if($hero.length > 0){
    var heroSlides = $hero.data('hero_images');
    var numSlides = heroSlides.length;
    var slideIndex = 0;
    var slideShow = function(){
      if(slideIndex >= numSlides){
        slideIndex = 0;
      }

      //console.log(heroSlides[slideIndex]);
      $hero.css('background-image', 'url("' + heroSlides[slideIndex] + '")')
           .show(0, function(){ setTimeout(slideShow, 5000); });
      slideIndex++;
    };

    slideShow();
  }

  var testimonials = new Swiper('#hp-testimonials .swiper-container', {
    autoplay: true,
    loop: true,
    navigation: {
      nextEl: '.swiper-arrow-next',
      prevEl: '.swiper-arrow-prev'
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    slidesPerView: 1,
    spaceBetween: 25,
    breakpoints: {
      1200: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 2
      }
    }
  });

  $('.gallery-thumb').on('click', function(){
    var img = $(this).data('gallery_thumb');
    var $imgEl = $('#gallery-image img');
    $($imgEl).fadeOut('fast', function(){
      $($imgEl).attr('src', img).fadeIn();
    });
  });

  $('#did-you-know-carousel .carousel-inner .carousel-item').carouselHeights();

  $('#termite-modal').on('show.bs.modal', function(e){
    var button = $(e.relatedTarget);
    var termiteModalTitle = button.data('termite_modal_title');
    var termiteModalContent = button.data('termite_modal_content');

    var modal = $(this);
    modal.find('#termite-modal-title').text(termiteModalTitle);
    modal.find('#termite-modal-content').html(termiteModalContent);
  });

  if($('#special-services').length){
    $('#special-tabs li:first-child a').tab('show');
  }

  //////////////////////////////////////////////////////////
  // ant animation
  /////////////////////////////////////////////////////////

  var numberOfAnts = 10;
  for(var i=0; i<numberOfAnts; i++){
    $('#ant-box').append(antSvg);
  }
  $('.ant').each(function(){
    $(this).crawlingAnt();
  });
  
   /////////////////////////////////////////////////////////
  // end animation
  ////////////////////////////////////////////////////////
}); //end jquery

$.fn.crawlingAnt = function(){
  var ant = $(this);
  var antBox = document.querySelector('#ant-box');

  var oldPos = {x: 0, y: 0};
  var moveAnt = function(){
    pos = {
      x: Math.ceil(Math.random() * antBox.offsetWidth),
      y: Math.ceil(Math.random() * antBox.offsetHeight)
    };
    var dx = -1 * (oldPos.x - pos.x);
    var dy = -1 * (oldPos.y - pos.y);
    var theta = Math.atan2(dy, dx) * 180 / Math.PI;
    t = Math.floor(Math.sqrt(
      (oldPos.x - pos.x) * (oldPos.x - pos.x)
      + (oldPos.y - pos.y) * (oldPos.y - pos.y)
    )) * 8;

    ant.css({
      'transition-duration': t + 'ms, ' + t + 'ms',
      'left': pos.x + 'px',
      'top': pos.y + 'px',
      'transform': 'rotate(' + theta + 'deg)'
    });
    oldPos.x = pos.x;
    oldPos.y = pos.y;
    setTimeout(moveAnt, t);
  }

  moveAnt();
}


/**
 * Normalize Carousel Heights
 */
$.fn.carouselHeights = function () {
  var items = $(this), //grab all slides
    heights = [], //create empty array to store height values
    tallest; //create variable to make note of the tallest slide

  var normalizeHeights = function () {
    items.each(function () { //add heights to array
      heights.push($(this).height());
    });
    tallest = Math.max.apply(null, heights); //cache largest value
    if (tallest < 300) { tallest = 300; }
    items.each(function () {
      $(this).css('min-height', tallest + 'px');
    });
  };

  normalizeHeights();

  $(window).on('resize orientationchange', function () {
    //reset vars
    tallest = 0;
    heights.length = 0;

    items.each(function () {
      $(this).css('min-height', '0'); //reset min-height
    });
    normalizeHeights(); //run it again 
  });
};

function couponForPrint(source) {
  return "<html><head><script>function step1(){\n" +
          "setTimeout('step2()', 10);}\n" +
          "function step2(){window.print();window.close();}\n" +
          "</scri" + "pt></head><body onload='step1()'>\n" +
          "<img src='" + source + "' /></body></html>";
}

function printCoupon(source){
  pageLink = "about:blank";
  var pwa = window.open(pageLink, "_new");
  pwa.document.open();
  pwa.document.write(couponForPrint(source));
  pwa.document.close();
}

var antSvg = '<svg class="ant" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 28.6 18.7"><style type="text/css">.st0{fill:#242120;}</style><g id="s1"><path class="st0" d="M11.3,7.5c-0.3,1-0.7,1.6-1.6,1.9c-1.2,0.4-2.5,0.7-3.8,0.3C5,9.3,4.5,8.6,4.5,7.6C4.4,6.6,4.5,5.5,5.6,4.9c0.9-0.6,1.9-0.6,3.1-0.4c1.3,0.2,2.1,0.8,2.6,2c0.1-0.1,0.2-0.2,0.2-0.3c-0.1-0.7-0.1-1.5-0.2-2.2c0-0.2-0.4-0.4-0.6-0.5C10,3.2,9.4,3,8.8,2.8c-0.2-0.1-0.5,0-0.8,0C7.3,3,5.8,2.4,5.4,1.8c0,0,0-0.1,0.1-0.2c0.3,0.2,0.7,0.4,1,0.6c0.6,0.3,1.2,0.6,1.9,0.3c0.3-0.1,0.6-0.1,0.9,0c0.7,0.2,1.3,0.4,2,0.7c0.7,0.3,0.9,1.3,0.4,2.2c0.2,0.1,0.4,0.3,0.7,0.4c0.6,0.3,1.1,0.1,1.2-0.5C14,4,14.3,2.7,15.1,1.6c0.3-0.5,0.4-1.1,0.7-1.6c-0.3,2-1.2,3.9-1.7,5.9L14.3,6c0.1-0.1,0.3-0.2,0.3-0.3c0.3-0.9,1-1.4,1.8-1.8c0.3-0.2,0.8-0.3,1.1-0.3c0.8,0.2,1.6,0.2,2.3-0.4c0.1-0.1,0.3-0.1,0.4-0.1c-0.4,0.6-2,1.4-2.5,1.1c-0.6-0.3-0.9,0-1.3,0.3c-0.4,0.4-0.8,0.8-1.2,1.3C17,5.5,17,5.5,18.2,6.2c0-0.6,0.1-1.1,0.8-1.3c0.9-0.2,2,0.4,2.5,1.4c0.7-0.6,1-1.4,1.1-2.2c0.1-0.9,0.6-1.4,1.4-1.8c1-0.5,2-1.1,2.7-2.1c-0.1,0.2-0.1,0.6-0.3,0.7c-0.8,0.6-1.6,1.2-2.4,1.8c-0.2,0.2-0.5,0.4-0.7,0.7c-0.4,0.9-0.8,1.9-1.2,2.9c-0.2,0.4,0.1,1.9,0.3,2.2c0.6,0.8,1.1,1.6,1.7,2.4c1-0.6,1.9-1.6,3.4-1.7c-1.2,0.7-2.3,1.3-3.3,1.9c-0.4,0.2-0.6,0-0.8-0.3c-0.4-0.8-0.8-1.6-1.2-2.2c-1,0.2-1.8,0.5-2.6,0.5C18.3,9.1,18,8.7,18,7.6c-0.7,0.9-1.7,0.8-2.7,0.9c2.4,1.4,4.7,2.7,7,4.1c0,0.1-0.1,0.1-0.1,0.2c-0.6-0.3-1.3-0.5-1.9-0.8c-0.5-0.2-1-0.5-1.5-0.8c-1.1-0.5-2.2-1-3.2-1.6c-0.5-0.3-0.9-0.9-1.3-1.4C13.9,8.6,14,9,14.1,9.5c0.3,0.9,0.4,1.9,0.5,2.9c0.2,2,0.3,4,0.4,6c0,0.1-0.1,0.3-0.1,0.4c-0.1,0-0.1,0-0.2,0c0-0.8,0-1.6-0.2-2.3c-0.4-2.5-0.7-5.1-1.1-7.6c-0.1-0.9-0.3-0.9-1-0.5c-0.6,0.4-1.1,0.8-1.6,1.3c-0.5,0.5-1.4,0.7-2.1,1.1c-0.2,0.1-0.3,0.1-0.5,0.1c-2.3,1.4-4.8,2.2-7.4,2.9C0.6,14,0.4,14.1,0,14.1c0.1-0.1,0.3-0.4,0.4-0.4c0.5-0.2,1-0.2,1.5-0.4c1.7-0.7,3.4-1.4,5.1-2.1c1-0.4,2-0.7,2.8-1.3C10.5,9.4,11,8.6,11.5,8C11.5,7.9,11.4,7.8,11.3,7.5"/></g><g id="s2"><path class="st0" d="M11.3,7.5c-0.3,1-0.7,1.6-1.6,1.9c-1.2,0.4-2.5,0.7-3.8,0.3C5,9.3,4.5,8.6,4.5,7.6C4.4,6.6,4.5,5.5,5.6,4.9c0.9-0.6,1.9-0.6,3.1-0.4c1.3,0.2,2.1,0.8,2.6,2c0.1-0.1,0.2-0.2,0.2-0.3c-0.1-0.7-0.1-1.5-0.2-2.1c0-0.2-0.3-0.4-0.4-0.5C10.4,3.3,10,3,9.8,2.9c-0.1,0-0.2,0-0.3,0C9.2,2.9,8.5,2.5,8.4,2.2c0,0,0-0.1,0-0.1c0.1,0.1,0.3,0.3,0.4,0.4c0.3,0.2,0.5,0.4,0.8,0.2c0.1-0.1,0.3,0,0.4,0c0.3,0.1,0.8,0.4,1.2,0.7c0.5,0.3,1,1.1,0.5,2c0.2,0.1,0.4,0.3,0.7,0.4c0.6,0.3,1.5,0.1,1.2-0.5c-0.5-1.2-0.8-2.1-1.3-3.2c-0.3-0.7,0.1-1.2,0.3-1.7c-0.3,2,1.8,3.6,1.3,5.6L14.3,6c0.1-0.1,0.3-0.2,0.3-0.3c0.3-0.9-0.2-1.5,0.1-2.4c0.1-0.3,0.4-0.7,0.7-0.9c0.8-0.4,1.4-0.8,1.5-1.7c0-0.1,0.2-0.2,0.3-0.4c0.1,0.7-0.7,2.3-1.3,2.4c-0.6,0.1-0.7,0.6-0.8,1c-0.1,0.6,0.5,1.5,0.1,2C17,5.5,17,5.5,18.2,6.2c0-0.6,0.1-1.1,0.8-1.3c0.9-0.2,2,0.4,2.5,1.4c0.7-0.6,1-1.4,1.1-2.2c0.1-0.9,0.6-1.4,1.4-1.8c1-0.5,2-1.1,2.7-2.1c-0.1,0.2-0.1,0.6-0.3,0.7c-0.8,0.6-1.6,1.2-2.4,1.8c-0.2,0.2-0.5,0.4-0.7,0.7c-0.4,0.9-0.8,1.9-1.2,2.9c-0.2,0.4,0.1,1.9,0.3,2.2c0.6,0.8,1.1,1.6,1.7,2.4c1-0.6,1.9-1.6,3.4-1.7c-1.2,0.7-2.3,1.3-3.3,1.9c-0.4,0.2-0.6,0-0.8-0.3c-0.4-0.8-0.8-1.6-1.2-2.2c-1,0.2-1.8,0.5-2.6,0.5C18.3,9.1,18,8.7,18,7.6c-0.7,0.9-2.9,1.9-2.7,0.9c-0.4,2.1,0,5.6,0.2,8.3c-0.1,0-0.1,0-0.2,0c-0.1-0.7-0.3-1.4-0.4-2c-0.1-0.6-0.1-1.1-0.2-1.7c-0.2-1.2-0.5-2.3-0.6-3.5c0-0.6,0.6-0.9,0.2-1.4c-0.4,0.4-0.7,0.3-1,0.8c-0.4,0.9-0.9,1.7-1.5,2.6c-1.1,1.7-2.3,3.3-3.5,4.9c-0.1,0.1-0.2,0.2-0.3,0.3c0,0-0.1-0.1-0.1-0.1c0.5-0.6,1-1.2,1.4-1.9c1.3-2.2,2.6-4.4,3.9-6.6c0.5-0.8-0.3-0.4-0.7,0C12.2,8.6,12,9,11.7,9.5c-0.2,0.5-0.8,0.8-1.2,1.2c-0.1,0.1-0.2,0.1-0.3,0.2c-1.3,1.5-2.8,2.5-4.4,3.5c-0.2,0.1-0.3,0.2-0.5,0.3c0.1-0.1,0.1-0.3,0.2-0.4c0.3-0.2,0.6-0.4,0.9-0.6c1-0.8,2-1.7,3-2.5c0.6-0.5,1.2-0.9,1.6-1.5c0.4-0.5,0.5-1.1,0.7-1.7C11.9,7.9,11.4,7.8,11.3,7.5"/></g></svg>'