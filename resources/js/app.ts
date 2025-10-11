import './bootstrap';
import Parallax from "parallax-js";
import AOS from "aos";

document.addEventListener('DOMContentLoaded', function () {
  initHeaderScroll();
  initFirstParallax();

  AOS.init();
})

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
