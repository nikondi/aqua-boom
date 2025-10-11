import './bootstrap';
import 'swiper/css';
import Parallax from "parallax-js";
import AOS from "aos";
import {lockBody, unlockBody} from "@/heplers";
import Swiper from "swiper";
import {Navigation} from "swiper/modules";

document.addEventListener('DOMContentLoaded', function () {
  initMenu()

  initHeaderScroll();
  initFirstParallax();

  AOS.init();

  initServicesSlider();
})

function initMenu() {
  const menu = document.querySelector('.header-menu') as HTMLElement;
  if (!menu)
    return;

  const inner = menu.querySelector('.header-menu-inner') as HTMLElement;
  const button = document.querySelector('.menu-toggle') as HTMLElement;

  const handleTransitionEnd = function (e: TransitionEvent) {
    if (!e || e.target !== inner || e.propertyName !== 'max-height')
      return;

    inner.style.maxHeight = null;
    inner.removeEventListener('transitionend', handleTransitionEnd)
  };


  const handleKeyUp = function (e: KeyboardEvent) {
    if (e.key == 'Escape')
      close();
  };


  const open = function () {
    button.classList.add('active');
    lockBody();
    menu.classList.add('active');
    inner.style.maxHeight = '0';
    inner.style.maxHeight = Math.min(window.innerHeight, inner.scrollHeight) + 'px';
    inner.addEventListener('transitionend', handleTransitionEnd);
    window.addEventListener('keyup', handleKeyUp);
  }
  const close = function () {
    button.classList.remove('active');

    unlockBody();
    menu.classList.remove('active');
    inner.style.maxHeight = Math.min(window.innerHeight, inner.scrollHeight) + 'px';
    inner.style.maxHeight = '0';
    inner.addEventListener('transitionend', handleTransitionEnd);
    window.removeEventListener('keyup', handleKeyUp);
  }

  button.addEventListener('click', function () {
    if (!menu.classList.contains('active'))
      open();
    else
      close();
  });

  menu.querySelector('.header-menu-background')?.addEventListener('click', function () {
    close();
  });
}

function initHeaderScroll() {
  const header = document.querySelector('.header');
  if (!header)
    return;

  const handleScroll = () => {
    if (window.scrollY > 0)
      header.classList.add('scroll');
    else
      header.classList.remove('scroll');
  }
  document.addEventListener('scroll', handleScroll);
  handleScroll();
}

function initFirstParallax() {
  document.querySelectorAll('.first-image-parallax').forEach(function (scene) {
    new Parallax(scene as HTMLElement, {
      relativeInput: true,
      scalarY: 3,
      scalarX: 3
    });
  })
}

function initServicesSlider() {
  const wrapper = document.querySelector('.services-section');
  if (!wrapper)
    return;

  const list = wrapper.querySelector('.services-list') as HTMLElement;
  new Swiper(list, {
    modules: [Navigation],
    slidesPerView: 'auto',
    centeredSlides: true,
    centeredSlidesBounds: false,
    spaceBetween: 25,
    navigation: {
      prevEl: wrapper.querySelector('.services-heading__button--prev') as HTMLElement,
      nextEl: wrapper.querySelector('.services-heading__button--next') as HTMLElement,
    },
    breakpoints: {
      992: {
        centeredSlides: false,
        slidesPerView: 4,
      }
    }
  })
}
