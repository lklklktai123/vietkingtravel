jQuery(document).ready(function () {
  jQuery(".slider-home-wp").slick({
    infinite: true,
    speed: 1000,
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows: true,
    prevArrow:
      '<span class="slider-arrow-left"><img src="/wp-content/uploads/2023/07/Group-3.png" alt=""></span>',
    nextArrow:
      '<span class="slider-arrow-right"><img src="/wp-content/uploads/2023/07/Group-4.png" alt=""></span>',
    mobileFirst: true,
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 1023,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 911,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 819,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 411,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 374,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 359,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
        },
      },
    ],
  });
});
jQuery(".feedback-wp").slick({
  infinite: true,
  speed: 1000,
  slidesToShow: 2,
  slidesToScroll: 1,
  arrows: false,
  prevArrow:
    '<span class="slider-arrow-left"><img src="/wp-content/uploads/2023/07/Group-3.png" alt=""></span>',
  nextArrow:
    '<span class="slider-arrow-right"><img src="/wp-content/uploads/2023/07/Group-4.png" alt=""></span>',
  mobileFirst: true,
  autoplay: false,
  dots: true,
  autoplaySpeed: 3000,
  responsive: [
    {
      breakpoint: 1199,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 1023,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 911,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 819,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 411,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      },
    },
    {
      breakpoint: 374,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      },
    },
    {
      breakpoint: 359,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      },
    },
  ],
});
jQuery(".logo-wp").slick({
  infinite: true,
  speed: 1000,
  slidesToShow: 6,
  slidesToScroll: 2,
  arrows: false,
  prevArrow:
    '<span class="slider-arrow-left"><img src="/wp-content/uploads/2023/07/Group-3.png" alt=""></span>',
  nextArrow:
    '<span class="slider-arrow-right"><img src="/wp-content/uploads/2023/07/Group-4.png" alt=""></span>',
  mobileFirst: true,
  autoplay: false,
  dots: true,
  autoplaySpeed: 3000,
  responsive: [
    {
      breakpoint: 1199,
      settings: {
        slidesToShow: 6,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 1023,
      settings: {
        slidesToShow: 6,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 911,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 819,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 411,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 374,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 359,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2,
        infinite: true,
      },
    },
  ],
});
jQuery(document).ready(function () {
  jQuery(".tour-post-slider-for").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: ".tour-post-slider-nav",
  });
  jQuery(".tour-post-slider-nav").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: ".tour-post-slider-for",
    dots: false,
    centerMode: false,
    arrows: false,
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 1023,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 911,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 819,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 411,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 374,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 359,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
        },
      },
    ],
  });
});
jQuery(".tour-khac-box").slick({
  infinite: true,
  speed: 1000,
  slidesToShow: 4,
  slidesToScroll: 2,
  arrows: false,
  prevArrow:
    '<span class="slider-arrow-left"><img src="/wp-content/uploads/2023/07/Group-3.png" alt=""></span>',
  nextArrow:
    '<span class="slider-arrow-right"><img src="/wp-content/uploads/2023/07/Group-4.png" alt=""></span>',
  mobileFirst: true,
  autoplay: true,
  dots: false,
  autoplaySpeed: 3000,
  responsive: [
    {
      breakpoint: 1199,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 1023,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 911,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 819,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 411,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 374,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 2,
        infinite: true,
      },
    },
    {
      breakpoint: 359,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 2,
        infinite: true,
      },
    },
  ],
});