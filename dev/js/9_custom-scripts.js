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
}); //end jquery

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

  $('.locations-map').each(function () {
    map = new_map($(this));
  });
};