require('./bootstrap');

window.addEventListener('load', function () {
  // Hamburger menu
  const navbar = document.querySelector('.navbar');
  const hamburger = navbar.querySelector('.navbar__toggle');
  const collapse = navbar.querySelector('.navbar__collapse');

  const visibleClass = 'navbar__collapse--visible';

  hamburger.addEventListener('click', () => {
    console.log('hamburger click');

    if (collapse.classList.contains(visibleClass)) {
      collapse.classList.remove(visibleClass);
      navbar.setAttribute('aria-expanded', false);
    } else {
      collapse.classList.add(visibleClass);
      navbar.setAttribute('aria-expanded', true);
    }
  });
});