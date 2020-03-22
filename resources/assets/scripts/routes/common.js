let cpt = 0;
let ecouteurScroll = 1;
const tempsTransition = 1000;

export default {
  init () {
    // JavaScript to be fired on all pages
    this.initEls();
    this.initEvents();
  },

  initEls () {
    this.$els = {
      titles: document.querySelectorAll('.js-title-project'),
      images: document.querySelectorAll('.js-image-presentation-projet'),
      divs: document.querySelectorAll('.js-projet'),
      projects: document.querySelector('.projets'),
      scroll: window.scrollY,
    };
  },

  initEvents () {
    this.getWichProject();
  },

  getWichProject() {
    this.$els.divs.forEach((div) => {

      if ( ecouteurScroll == 0 ) {
        div.scrollTo(0,div.clientHeight/20);
        console.log('centrage');
      }

      else {
        div.addEventListener('scroll', () => {

          if ( div.scrollTop >= div.clientHeight/11) {
            console.log('next');
            cpt++;
            ecouteurScroll = 0;
            this.change(cpt);
          }
          else if ( div.scrollTop == 0) {
            console.log('previous');
            cpt--;
            ecouteurScroll = 0;
            this.change(cpt);
          }
        }, false);
      }

    });
  },

  change(cpt) {
    this.$els.projects.style.transform = `translateY(${-100*cpt}vh)`;
    setTimeout(() => {
      ecouteurScroll = 1;
    }, tempsTransition);
  },

  getTitle() {
    this.$els.titles.forEach(function (title) {
      title.style.transform = 'translateY(300px)';
      setTimeout( () => {
        title.style.transition = 'all 2s';
        title.style.transform = 'translateY(100px)';
        this.getWichProject();
      }, 100);
    });
  },

  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
