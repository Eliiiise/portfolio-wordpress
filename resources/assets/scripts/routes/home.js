let cpt = 0;
let ecouteurScroll = 1;
const tempsTransition = 500;

export default {
  init () {
    // JavaScript to be fired on all pages
    this.initEls();
    this.initEvents();
  },

  initEls () {
    this.$els = {
      letters: document.querySelectorAll('.js-letter-project'),
      images: document.querySelectorAll('.js-image-presentation-projet'),
      divs: document.querySelectorAll('.js-projet'),
      projects: document.querySelector('.projets'),
      body: document.querySelector('body'),
      nbProjects: document.querySelectorAll('.js-npProjet'),
      miniInfos: document.querySelectorAll('.js-miniInfo'),
      transition: document.querySelector('.transition'),
    };
    this.nbProject = this.$els.divs.length;
  },

  initEvents () {
    window.scrollTo(0,0);
    this.$els.divs[0].scrollTo( 0 , this.$els.divs[0].clientHeight/20 );
    this.getWichProject();
    this.baseMonte();
    this.getTitle();
    this.getImage();
    this.hiddenBody();
  },

  getWichProject() {
    this.$els.divs.forEach((div) => {
      div.addEventListener('scroll', () => {

        if ( div.scrollTop >= div.clientHeight/11 && ecouteurScroll==1) {
          cpt++;
          if (cpt == this.nbProject) {
            cpt = 0;
          }
          ecouteurScroll = 0;
          this.baseDescend(1);
          this.infoHidden();
          this.change(cpt,+1);
        }

        else if ( div.scrollTop == 0 && ecouteurScroll==1) {
          cpt--;
          if (cpt == -1) {
            cpt = this.nbProject-1;
          }
          ecouteurScroll = 0;
          this.baseMonte(1);
          this.infoHidden();
          this.change(cpt,-1);
        }

      }, false);
    });
  },

  change(cpt,s) {

    setTimeout(() => {
      window.scrollTo(0,this.$els.divs[0].clientHeight*cpt);

      if (s<0) {
        this.baseDescend(0);
      }
      else {
        this.baseMonte(0);
      }
    }, 400);

    setTimeout(() => {
      this.getTitle();
      this.getImage();
    }, tempsTransition);

    setTimeout(() => {
      this.$els.divs.forEach((div) => {
        div.scrollTo(0,div.clientHeight/20);
      });
      ecouteurScroll = 1;
      this.getInfo();
    }, tempsTransition+1000);
  },

  getTitle() {
    let cpt
    let parentMemo
    this.$els.letters.forEach(function (letter) {
      if (letter.parentElement.parentElement !== parentMemo) {
        cpt = 0
        parentMemo = letter.parentElement.parentElement
      }
      letter.style.transition = `all 1s ease ${cpt}s`;
      letter.style.transform = 'translateX(0px)';
      cpt += 0.05
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

    this.$els.letters.forEach(function (letter) {
      letter.style.transform = 'translateX(-220px)';
      letter.style.transition = `all ${t}s`;
    });

    this.$els.images.forEach(function (image) {
      image.style.transform = 'translate(400px,1000px) rotate(50deg)';
      image.style.transition = `all ${t}s`;
    });
  },

  baseDescend(t) {
    this.$els.letters.forEach(function (letter) {
      letter.style.transform = 'translateX(-220px)';
      letter.style.transition = `all ${t}s`;
    });

    this.$els.images.forEach(function (image) {
      image.style.transform = 'translate(-400px,-1000px) rotate(-40deg)';
      image.style.transition = `all ${t}s`;
    });
  },

  hiddenBody() {
    if ( this.$els.projects ) {
      this.$els.body.style.height= '100vh';
      this.$els.body.style.overflow= 'hidden';
    }
    else {
      this.$els.body.style.height= 'auto';
      this.$els.body.style.overflow= 'scroll';
      cpt = 0;
      this.change(0,0);
    }
  },

  infoHidden() {
    this.$els.nbProjects.forEach(function (nbProject) {
      nbProject.style.opacity = '0';
    });

    this.$els.miniInfos.forEach(function (miniInfo) {
      miniInfo.style.opacity = '0';
    });
  },

  getInfo() {
    this.$els.nbProjects.forEach(function (nbProject) {
      nbProject.style.opacity = '1';
    });

    this.$els.miniInfos.forEach(function (miniInfo) {
      miniInfo.style.opacity = '1';
    });
  },

  lettersHover() {
    this.$els.letters.forEach((letter) => {
      letter.addEventListener('hover'), () => {
        this.$els.letters.forEach((letter) => {
          letter.classList.add('stroke');
        })
      }
    })
  },

  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
