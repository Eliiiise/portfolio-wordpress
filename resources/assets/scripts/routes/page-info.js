export default {
  init () {
    // JavaScript to be fired on all pages
    this.initEls();
    this.initEvents();
  },

  initEls () {
    this.$els = {
      letters: document.querySelectorAll('.title .js-letter-project'),
    };
  },

  initEvents () {
    setTimeout(() => {
      this.getTitle();
    },100);
  },

  getTitle() {
    let cpt = 0

    this.$els.letters.forEach(function (letter) {
      letter.style.transition = `all 1s ease ${cpt}s`;
      letter.style.transform = 'translateX(0px)';
      cpt += 0.05
    });
  },

  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
