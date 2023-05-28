// Navbar
window.addEventListener('scroll', function() {
  let header = document.querySelector('.navbar-fixed-top');
  let windowChecker = window.scrollY > 0;
  header.classList.toggle('scrolling-active', windowChecker);
})

// Product List Swiper
var swiper = new Swiper(".productSwiper", {
  slidesPerView: 4,
  slidesPerColumn: 0,
  spaceBetween: 10,
  loop: true,
  breakpoints: {
    1200: {
      slidesPerView: 4,
      spaceBetween: 0
    },

    768: {
      slidesPerView: 3,
      spaceBetween: 0
    },
    412: {
      slidesPerView: 2,
      spaceBetween: 0
    },
    240: {
      slidesPerView: 1,
      spaceBetween: 0
    },
    
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".button-next",
    prevEl: ".button-prev",
  },
});
