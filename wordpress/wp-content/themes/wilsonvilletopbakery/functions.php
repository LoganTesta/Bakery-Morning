<?php

add_theme_support('post-thumbnails'); //Allow image thumbnails in pages and posts.

add_action('wp_enqueue_scripts', function() {

    wp_register_script('toggle-blog-settings-javascript', get_template_directory_uri() . '/assets/javascript/javascript-functions.js');
    wp_enqueue_script('toggle-blog-settings-javascript', get_template_directory_uri() . '/vue-functions.js');
    wp_enqueue_style('styles', "" . get_template_directory_uri() . '/assets/css/main-styles.css?mod=12212019');
    wp_enqueue_style('styles', "" . get_template_directory_uri() . '/assets/css/print-styles.css?mod=12202019');
    
});
