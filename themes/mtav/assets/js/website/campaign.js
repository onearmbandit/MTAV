require('jquery');

import Swiper, { Navigation } from 'swiper';
// configure Swiper to use modules
Swiper.use([Navigation]);

require('../../scss/website/components/mtav-swiper.scss');

require('../../scss/website/campaign-page.scss');
(function ($) {

    console.log('Test');

    $(".city").mouseover(function () {
        // $('.number-div').hide();
        $(this).next().show();
    });
    $(".city").mouseout(function () {
      $('.city').next().hide();
    })

    // START : Home By The NUmber Js
  var swiper = new Swiper('.media-slider', {
    slidesPerView: 2.3,
    spaceBetween: 40,
    // slidesPerGroup: 3,
    // loop: true,
    navigation: {
      nextEl: '.media-next',
      prevEl: '.media-prev',
    },
  });

  console.log('Campaign js');
})(jQuery);