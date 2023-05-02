// Navbar
window.addEventListener('scroll', function() {
  let header = document.querySelector('.navbar-fixed-top');
  let windowChecker = window.scrollY > 0;
  header.classList.toggle('scrolling-active', windowChecker);
})