// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import single from './routes/single';
import contact from './routes/page-contact';
import info from './routes/page-info';
import shift from './util/shift';

import Swup from 'swup';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // Project page
  single,
  contact,
  info,
});

// Load Events
jQuery(document).ready(() => {
  routes.loadEvents();
  shift.init();

  const swup = new Swup(); // only this line when included with script tag
  swup.on('contentReplaced', () => {
    window.scrollTo(0,0);

    if (document.querySelector('.projets')) {
      document.body.style.height= '100vh';
      document.body.style.overflow= 'hidden';
      home.init()
    } else {
      document.body.style.height= 'auto';
      document.body.style.overflowY= 'scroll';
    }

    if (document.querySelector('.info')) {
      info.init()
    }

    if (document.querySelector('.contact')) {
      contact.init()
    }

    if (document.querySelector('.project')) {
      single.init()
    }
  });
});
