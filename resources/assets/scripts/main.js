// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import projets from './routes/page-projets';
import single from './routes/single';
import contact from './routes/page-contact';
import info from './routes/page-info';
import shift from './util/shift';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  // Projects page
  projets,
  // Project page
  single,
  contact,
  info,
});

// Load Events
jQuery(document).ready(() => {
  routes.loadEvents();
  shift.init();
});


