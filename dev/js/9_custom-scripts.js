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
});