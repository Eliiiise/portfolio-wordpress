let positionTransition = -1;

export default {
  init () {
    // JavaScript to be fired on all pages
    this.initEls();
    this.initEvents();
  },

  initEls () {
    this.$els = {
      transition: document.querySelector('.transition'),
      menus: document.querySelectorAll('#menu-menu-1 li a'),
    };
  },

  initEvents () {
    this.transitionPageGoOut();
    this.transitionPage();
  },

  transitionPage() {
    this.$els.menus.forEach((menu) => {
      const link = menu.getAttribute('href');
      menu.removeAttribute('href');
      menu.addEventListener('click', () => {
        this.$els.transition.style.transform = 'translateX(0)';
        setTimeout(function() {
          document.location.href=link;
        }, 500);
      });
    });
  },

  transitionPageGoOut() {
    this.$els.transition.style.transform = `translateX(${100*positionTransition}%)`;
    positionTransition = -positionTransition;
    setTimeout(() => {
      this.$els.transition.style.opacity = '0';
      this.$els.transition.style.transition = 'all 0s';
    },1000);
    setTimeout(() => {
      this.$els.transition.style.transform = `translateX(${100*positionTransition}%)`;
    },2000);
    setTimeout(() => {
      this.$els.transition.style.opacity = '1';
      this.$els.transition.style.transition = 'all 1s';
    },3000);
  },

  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
