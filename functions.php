<?php

function ds_theme_assets(){

   //Main csss

   wp_enqueue_style(

   'ds-style',
   get_stylesheet_uri(),
   array(),
   '1.0',
   'all'
     );


wp_enqueue_style(
    'slider-style',
    get_template_directory_uri().'/css/slider.css',
    array(),
    '1.0',
    'all'

);

wp_enqueue_style(
    'ds-script',
    get_template_directory_uri().'/js/slider.css',
    array('jquery'),
    '1.0',
    'all',
    true

);


 if(is_singular()&& comments_opne() && get_option('thread_comments')){
    wp_enqueue_scripts('comment_replay');
 }


}

add_action('wp_enqueue_scripts','ds_theme_assets');

function ds_setup(){
    //kem me leju me pas meny
    add_theme_support('menu');

    //register primary menu

    register_nav_menu('primary','Primary menu');
    
}


add_action('init','ds_setup');



?>