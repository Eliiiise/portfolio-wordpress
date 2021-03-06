import AOS from 'aos'

export default {
  init () {
    // JavaScript to be fired on all pages
    this.initEls();
    this.initEvents();
  },

  initEls () {
    this.$els = {
      transition: document.querySelector('.transition'),
      mainImage: document.querySelector('.js-image-presentation-projet'),
      title: document.querySelector('.js-entry-title'),
      images: document.querySelectorAll('img'),
      next: document.querySelector('.next'),
    };
  },

  initEvents () {
    this.parallax();
    this.imageError();
    this.transitionPage()
    console.log(AOS);
    AOS.init();
  },

  parallax() {
    this.$els.mainImage.style.transform= `rotate(${10+window.scrollY/100}deg) translateY(${-window.scrollY/10}px)`;
    this.$els.title.style.transform= `translateY(${window.scrollY/30}px)`;
    window.addEventListener('scroll', () => {
      this.$els.mainImage.style.transform= `rotate(${10+window.scrollY/100}deg) translateY(${-window.scrollY/10}px)`;
      this.$els.title.style.transform= `translateY(${window.scrollY/30}px)`;
    })
  },

  imageError() {
    this.$els.images.forEach((image) => {
      image.onerror = () => {
        image.style.display = 'none';
        console.log('none');
      }
    })
  },

  transitionPage() {
    const link = this.$els.next.getAttribute('href');
      this.$els.next.removeAttribute('href');
      this.$els.next.addEventListener('click', () => {
        this.$els.transition.style.transform = 'translateX(0)';
        setTimeout(function() {
          document.location.href=link;
        }, 500);
     });
  },

  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
