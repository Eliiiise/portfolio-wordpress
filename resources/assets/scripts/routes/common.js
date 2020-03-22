let cpt = 0;
let ecouteurScroll = 1;
const tempsTransition = 900;

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
      div: document.querySelector('.js-projets:nth-of-type(1)'),
      projects: document.querySelector('.projets'),
      scroll: window.scrollY,
    };
  },

  initEvents () {
    window.scrollTo(0,0);
    this.$els.divs[0].scrollTo( 0 , this.$els.divs[0].clientHeight/20 );
    this.getWichProject();
    this.baseMonte();
    this.getTitle();
    this.getImage();
  },

  getWichProject() {
    this.$els.divs.forEach((div) => {
        div.addEventListener('scroll', () => {
          console.log(window.scrollY);
          if ( div.scrollTop >= div.clientHeight/11 && ecouteurScroll==1) {
            console.log('next');
            cpt++;
            if (cpt == 5) {
              cpt = 0;
            }
            ecouteurScroll = 0;
            this.baseDescend(1);
            this.change(cpt,+1);
          }
          else if ( div.scrollTop == 0 && ecouteurScroll==1) {
            console.log('previous');
            cpt--;
            if (cpt == -1) {
              cpt = 4;
            }
            ecouteurScroll = 0;
            this.baseMonte(1);
            this.change(cpt,-1);
          }
        }, false);
    });
  },

  change(cpt,s) {
    setTimeout(() => {
      this.$els.projects.style.transform = `translateY(${-100*cpt}vh)`;
      window.scrollTo(0,0);
      if (s<0) {
        this.baseDescend(0);
      }
      else {
        this.baseMonte(0);
      }
    }, tempsTransition/2);

    setTimeout(() => {
        this.$els.divs.forEach((div) => {
          div.scrollTo(0,div.clientHeight/20);
          this.getTitle();
          this.getImage();
          ecouteurScroll = 1;
        });
    }, tempsTransition);
  },

  getTitle() {
    this.$els.titles.forEach(function (title) {
      setTimeout( () => {
        title.style.transition = 'all 1s';
        title.style.transform = 'translateY(0px)';
      }, 100);
    });
  },

  getImage() {
    this.$els.images.forEach(function (image) {
      setTimeout( () => {
        image.style.transition = 'all 1s';
        image.style.transform = 'translateY(0px) rotate(10deg)';
      }, 100);
    });
  },

  baseMonte(t) {
    this.$els.titles.forEach(function (title) {
    title.style.transform = 'translateY(300px)';
      title.style.transition = `all ${t}s`;
    });
    this.$els.images.forEach(function (image) {
    image.style.transform = 'translate(-100px,1000px) rotate(50deg)';
    image.style.transition = `all ${t}s`;
    });
  },

  baseDescend(t) {
      this.$els.titles.forEach(function (title) {
        title.style.transform = 'translateY(-300px)';
        title.style.transition = `all ${t}s`;
      });
      this.$els.images.forEach(function (image) {
        image.style.transform = 'translate(-100px,-1000px) rotate(-40deg)';
        image.style.transition = `all ${t}s`;
      });
  },

  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
