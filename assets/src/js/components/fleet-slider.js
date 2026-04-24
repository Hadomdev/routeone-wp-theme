import Swiper from 'swiper';
import { Navigation, Pagination, EffectCreative } from 'swiper/modules';

export const fleetSlider = () => {
  const sliderNav = new Swiper(".fleet__slider-nav", {
    loop: true,
    spaceBetween: 0,
    slidesPerView: 1,
    freeMode: true,
    watchSlidesProgress: true,
    navigation: {
      nextEl: '.fleet__btn-next',
      prevEl: '.fleet__btn-prev',
    },
    effect: "creative",
    creativeEffect: {
      limitProgress: 2,
      prev: {
        translate: ['calc(-100% - 16px)', 0, 0],
      },
      next: {
        translate: ['calc(100% + 16px)', 0, 0],
      },
    },
    breakpoints: {
      768: {
        slidesPerView: 3,
        spaceBetween: 16,
        centeredSlides: true,
      },
      1279: {
        slidesPerView: 5,
        spaceBetween: 16,
        effect: "slide",
      },
    },
  });


  new Swiper('.fleet__slider', {
    modules: [Navigation, Pagination, EffectCreative],
    direction: 'horizontal',
    loop: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    pagination: {
      el: ".swiper-pagination",
      type: "fraction",
    },
    navigation: {
      prevEl: '.fleet__btn-prev',
      nextEl: '.fleet__btn-next',
    },
    effect: "creative",
    creativeEffect: {
      limitProgress: 2,
      prev: {
        translate: ['-50%', 0, 0],
        scale: [0.3],
      },
      next: {
        translate: ['50%', 0, 0],
        scale: [0.3],
      },
    },
    thumbs: {
      swiper: sliderNav,
    },
    breakpoints: {
      768: {
        slidesPerView: 3,
        creativeEffect: {
          limitProgress: 2,
          prev: {
            translate: ['-150%', 0, 0],
            scale: [0.5],
          },
          next: {
            translate: ['150%', 0, 0],
            scale: [0.5],
          },
        },
      },
    },
  });
}
