// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import test from './routes/test';
import home from './routes/home';
import aboutUs from './routes/about';
import scrollEffect from './routes/scrollEffect';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  test,
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  scrollEffect,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());

