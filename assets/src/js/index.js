import Header from "./components/header";
import Hero from "./components/hero";
import Tabs from "./components/tabs";
import {fleetSlider} from './components/fleet-slider';
import PageNav from "./components/page-nav";
import {simpleCarousel} from './components/simpleCarousel';
import Faq from "./components/faq";
import Ajax from "./components/ajax";
import {errorPageHandler} from './components/error-page-animation';
import ArticleNavHandler from "./components/article-nav-handler";
import Testimonials from "./components/testimonials-slider";
import Modal from "./components/modal";
import Services from "./components/services";

document.addEventListener("DOMContentLoaded", function () {
  Header();
  Hero();
  fleetSlider();
  Tabs();
  PageNav();
  Faq();
  Ajax();
  Testimonials();
  simpleCarousel({
    carouselName: '.testimonials__slider',
    nextEl: '.testimonials__next',
    prevEl: '.testimonials__prev',
  });
  simpleCarousel({
    carouselName: '.services-slider__swiper',
    nextEl: '.services-slider__next',
    prevEl: '.services-slider__prev',
  });
  simpleCarousel({
    carouselName: '.services-cards-slider__swiper',
    nextEl: '.services-cards-slider__next',
    prevEl: '.services-cards-slider__prev',
  });
  simpleCarousel({
    carouselName: '.our-team__slider',
    nextEl: '.our-team__next',
    prevEl: '.our-team__prev',
  });
  errorPageHandler();
  ArticleNavHandler();
  Modal();
  Services();
});
