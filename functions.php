<?php

// register AngularJS
wp_register_script('angular-core', 'https://code.angularjs.org/1.3.0-rc.2/angular.js', array(), null, false);
wp_register_script('angular-route', 'https://code.angularjs.org/1.3.0-rc.2/angular-route.min.js', array('angular-core'), null, false);
wp_register_script('angular-sanitize', 'https://code.angularjs.org/1.3.0-rc.2/angular-sanitize.js', array('angular-core'), null, false);
//wp_register_script('angular-animate', 'https://code.angularjs.org/1.3.0-rc.2/angular-animate.js', array('angular-core'), null, false);


// register our app.js, which has a dependency on angular-core
wp_register_script('angular-app', get_bloginfo('template_directory').'/app.js', array('angular-core', 'angular-route', 'angular-sanitize'), null, false);

//add bootstrap
wp_register_style('bootstrap-css', 'https://bootswatch.com/simplex/bootstrap.min.css');
wp_register_style('style', get_bloginfo('template_directory') . '/style.css', array('bootstrap-css'));
// enqueue all scripts
wp_enqueue_script('angular-core');
wp_enqueue_script('angular-app');
wp_enqueue_style('bootstrap-css');
wp_enqueue_style('style');
wp_enqueue_script('angular-route');
wp_enqueue_script('angular-sanitize');
//wp_enqueue_script('angular-animate');

// we need to create a JavaScript variable to store our API endpoint...
wp_localize_script( 'angular-core', 'AppAPI', array( 'url' => get_bloginfo('wpurl').'/api/') ); // this is the API address of the JSON API plugin
// ... and useful information such as the theme directory and website url
wp_localize_script( 'angular-core', 'BlogInfo', array( 'url' => get_bloginfo('template_directory').'/', 'site' => get_bloginfo('wpurl')) );

add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');
?>
