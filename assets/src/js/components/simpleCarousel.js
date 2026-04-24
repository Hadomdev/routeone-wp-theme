import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

export const simpleCarousel = ({ carouselName, nextEl, prevEl }) => {
  new Swiper(carouselName, {
    modules: [Navigation, Pagination],
    direction: 'horizontal',
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      type: "fraction",
    },
    navigation: {
      nextEl,
      prevEl,
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 16,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 24,
      },
    },
  });
}
