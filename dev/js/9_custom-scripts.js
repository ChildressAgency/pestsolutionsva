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

  var ant = document.querySelector('#ant');
  var oldPos = { x: 0, y: 0 };
  var antBox = document.getElementById('ant-box');
  function ani() {
    var pos = {
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
    ant.style.transitionDuration = t + 'ms, ' + t + 'ms';
    ant.style.left = pos.x + 'px';
    ant.style.top = pos.y + 'px';
    ant.style.transform = 'rotate(' + theta + 'deg)';
    oldPos.x = pos.x;
    oldPos.y = pos.y;
    setTimeout(ani, t);
  }
  ani();

  /////////////////////////////////////////////////////////
  // end animation
  ////////////////////////////////////////////////////////
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