import './bootstrap';
import 'swiper/css';
import 'aos/dist/aos.css';
import "@fancyapps/ui/dist/fancybox/fancybox.css";
import Parallax from "parallax-js";
import AOS from "aos";
import {lockBody, unlockBody} from "@/heplers";
import Swiper from "swiper";
import {Navigation} from "swiper/modules";
import {CountUp} from "countup.js";
import {Fancybox} from "@fancyapps/ui";
import IMask from 'imask';

document.addEventListener('DOMContentLoaded', function () {
  const {closeMenu} = initMenu()

  initHeaderScroll();
  initFirstParallax();
  initRegisterParallax();

  AOS.init({
    duration: 300
  });

  initServicesSlider();
  initScrollTo(closeMenu);
  initResults();

  initCountUp();

  Fancybox.bind('[data-fancybox]');

  initReviewsSlider();

  document.querySelectorAll<HTMLInputElement>('input[type=tel]').forEach(function (el) {
    IMask(el, {
      mask: '+{7} (000) 000-00-00'
    })
  });

  initMap();
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

  const media = window.matchMedia('(max-width: 991px)');


  const open = function () {
    if (!media.matches)
      return;
    button.classList.add('active');
    lockBody();
    menu.classList.add('active');
    inner.style.maxHeight = '0';
    inner.style.maxHeight = Math.min(window.innerHeight, inner.scrollHeight) + 'px';
    inner.addEventListener('transitionend', handleTransitionEnd);
    window.addEventListener('keyup', handleKeyUp);
  }
  const close = function () {
    if (!media.matches)
      return;

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

  return {openMenu: open, closeMenu: close};
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
  });
}

function initRegisterParallax() {
  document.querySelectorAll('.register-image-parallax').forEach(function (scene) {
    new Parallax(scene as HTMLElement, {
      relativeInput: true,
      scalarY: 3,
      scalarX: 3
    });
  });
}

function initServicesSlider() {
  const wrapper = document.querySelector('.services-section');
  if (!wrapper)
    return;

  const list = wrapper.querySelector('.services-list') as HTMLElement;
  new Swiper(list, {
    modules: [Navigation],
    slidesPerView: 'auto',
    spaceBetween: 25,
    navigation: {
      prevEl: wrapper.querySelector('.heading__button--prev') as HTMLElement,
      nextEl: wrapper.querySelector('.heading__button--next') as HTMLElement,
    },
    breakpoints: {
      576: {
        centeredSlides: false,
        slidesPerView: 2,
      },
      768: {
        centeredSlides: false,
        slidesPerView: 3,
      },
      992: {
        centeredSlides: false,
        slidesPerView: 4,
      }
    }
  })
}

function initScrollTo(closeMenu: () => void) {
  document.querySelectorAll('a[href^="#"]').forEach(function (link) {
    link.addEventListener('click', function (e) {
      const id = new URL((link as HTMLAnchorElement).href).hash.substring(1);
      const elem = document.getElementById(id);
      if (!elem)
        return;

      e.preventDefault();
      closeMenu();
      const top = elem.getBoundingClientRect().top + window.scrollY;
      window.scroll({top: top - 73, behavior: 'smooth'})
    })
  });
}

function isMouseEvent(e: MouseEvent | TouchEvent): e is MouseEvent {
  return e.type === 'mousemove'; // || e.type === 'click'...
}

function initResults() {
  const section = document.querySelector('.result-section');
  const slider = document.querySelector('.results') as HTMLElement;
  if (!slider)
    return;

  const swiperWrapper = slider.querySelector('.swiper-wrapper') as HTMLElement;
  const cards: NodeListOf<HTMLElement> = document.querySelectorAll('.result-card');
  const cardsCount = cards.length;
  const media = window.matchMedia('(max-width: 575px');

  const swiper = new Swiper(slider, {
    slidesPerView: 1,
    spaceBetween: 10,
    touchStartPreventDefault: false,
    breakpoints: {
      576: {
        spaceBetween: 30
      }
    }
  });

  let bounds: DOMRect[] = [];

  const calcBounds = () => {
    bounds = [];
    cards.forEach(function (card) {
      bounds.push(card.getBoundingClientRect());
    })
  }

  const handleTranslate = (translate: number) => {
    calcBounds();
    if (cardsCount === 0) return;

    // Нормализованный прогресс от 0 до 1
    const minT = swiper.minTranslate();
    const maxT = swiper.maxTranslate();
    const range = maxT - minT;

    let progress = range === 0 ? 0 : (translate - minT) / range;
    progress = Math.max(0, Math.min(1, progress));

    // Позиция "центра" в терминах слайдов (может быть дробной!)
    const centerSlidePosition = progress * (cardsCount - 1);
    const centerIndex = Math.round(centerSlidePosition);
    const prevIndex = centerIndex - 1;
    const nextIndex = centerIndex + 1;

    // Обновляем scale для каждого слайда
    cards.forEach((card, index) => {
      // Расстояние от текущего слайда до "центра"
      const distance = Math.abs(index - centerSlidePosition);

      // Максимальное расстояние, при котором слайд ещё виден (например, 1.5)
      // Это значит: слайды в пределах ±1.5 от центра будут масштабироваться
      const maxDistance = 1.5;

      // Интерполируем scale от 1 (в центре) до 0.8 (на краю видимой зоны)
      const scale = distance <= maxDistance
        ? 1 - (distance / maxDistance) * (media.matches ? 0.6 : 0.2)
        : media.matches ? 0.4 : 0.8;

      // Ограничиваем минимальный scale (на всякий случай)
      const finalScale = Math.max(media.matches ? 0.4 : 0.8, Math.min(1, scale));

      let origin: string = null;
      if (index === prevIndex && prevIndex >= 0) {
        origin = '100% 50%'; // правый край
      } else if (index === nextIndex && nextIndex < cardsCount) {
        origin = '0% 50%';   // левый край
      }

      // Применяем стили
      card.style.transform = `scale(${finalScale})`;
      card.style.transformOrigin = origin;
    });
  };
  handleTranslate(0);

  let moving = false;
  let animRef: number = null;

  if (window.requestAnimationFrame) {
    const handleFrame = () => {
      handleTranslate(swiperWrapper.getBoundingClientRect().x - swiper.el.getBoundingClientRect().x);
      if (moving) {
        requestAnimationFrame(handleFrame);
      } else {
        cancelAnimationFrame(animRef);
        animRef = null;
      }
    }

    const onTransitionStart = () => {
      moving = true;
      animRef = requestAnimationFrame(handleFrame);
    }
    const onTransitionEnd = () => {
      moving = false;
    }

    swiper.on('transitionStart', onTransitionStart);
    swiper.on('transitionEnd', onTransitionEnd);
  }

  const onMove = () => {
    if (animRef)
      moving = false;

    handleTranslate(swiper.translate);
  };
  swiper.on('sliderMove', onMove);
  swiper.on('setTranslate', onMove);


  cards.forEach(function (elem, i) {
    const trigger = elem.querySelector('.result-card__trigger') as HTMLElement;
    const trigger_btn = elem.querySelector('.result-card__trigger-btn') as HTMLElement;

    const second_image = elem.querySelector('.result-card__image--second') as HTMLDivElement;
    const second_image_img = second_image.querySelector('img');
    let left = 50;
    let first = true;

    const handleResize = () => {
      calcBounds();
      second_image_img.style.width = bounds[i].width + 'px';
    }
    window.addEventListener('resize', handleResize);
    handleResize();

    const handleMove = (e: TouchEvent | MouseEvent) => {
      e.stopPropagation();
      const x = isMouseEvent(e) ? e.clientX : e.touches[0].clientX;
      left = (x - bounds[i].left) / bounds[i].width * 100;
      // console.log(left)
      if (left < 0)
        left = 0;
      if (left > 100)
        left = 100;

      trigger.style.left = left + '%';
      second_image.style.width = (100 - left) + '%';

      if (first) {
        first = false;
        section?.classList.add('moved');
      }
    }

    const unsubscribe = () => {
      elem.classList.remove('dragging');
      document.removeEventListener('mousemove', handleMove);
      document.removeEventListener('touchmove', handleMove);
      swiper.allowTouchMove = true;
    }
    const subscribe = (e: MouseEvent | TouchEvent) => {
      e.stopPropagation();
      elem.classList.add('dragging');
      document.addEventListener('mousemove', handleMove)
      document.addEventListener('touchmove', handleMove)
      document.addEventListener('mouseup', unsubscribe);
      document.addEventListener('touchend', unsubscribe);
      window.addEventListener('mouseleave', unsubscribe);
      swiper.allowTouchMove = false;
    }

    trigger_btn.addEventListener('mousedown', subscribe);
    trigger_btn.addEventListener('touchstart', subscribe);
  });
}

function initCountUp() {
  const counts = document.querySelectorAll<HTMLElement>('.countup');
  counts.forEach(function (item) {
    const demo = new CountUp(item, parseInt(item.dataset.to), {
      startVal: item.dataset.from ? parseInt(item.dataset.from) : 0,
      useGrouping: true,
      separator: ' '
    });

    const checkPosition = () => {
      const rect = item.getBoundingClientRect();
      const windowHeight = window.innerHeight;

      if (rect.top >= 20 && rect.bottom <= windowHeight - 20) {
        if (!demo.error) {
          demo.start();
        } else {
          console.error(demo.error);
        }

        window.removeEventListener('scroll', checkPosition)
      }
    }

    window.addEventListener('scroll', checkPosition);
    checkPosition();
  });
}


function initReviewsSlider() {
  const wrapper = document.getElementById('reviews');
  const slider = wrapper.querySelector<HTMLElement>('.reviews-slider');
  if (!slider)
    return;

  new Swiper(slider, {
    slidesPerView: 'auto',
    spaceBetween: 25,
    modules: [Navigation],
    navigation: {
      prevEl: wrapper.querySelector<HTMLElement>('.heading__button--prev'),
      nextEl: wrapper.querySelector<HTMLElement>('.heading__button--next'),
    },
    breakpoints: {
      768: {
        spaceBetween: 0
      }
    }
  })
}

function initMap() {
  ymaps.ready(function () {
    new ymaps.Map("map", {
      center: [55.76, 37.64],
      zoom: 10
    });
  });
}
