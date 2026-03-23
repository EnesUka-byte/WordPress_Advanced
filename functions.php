<?php

function ds_theme_assets() {

 
    wp_enqueue_style(
        'ds-style',
        get_stylesheet_uri(),
        array(),
        '1.0',
        'all'
    );

  
    wp_enqueue_style(
        'slider-style',
        get_template_directory_uri() . '/css/slider.css',
        array(),
        '1.0',
        'all'
    );

   
    wp_enqueue_script(
        'ds-script',
        get_template_directory_uri() . '/js/custom.js',
        array('jquery'),
        '1.0',
        true
    );

 
    if ( is_singular() && comments_open() && get_option('thread_comments') ) {
        wp_enqueue_script('comment-reply');
    }
}


add_action('wp_enqueue_scripts', 'ds_theme_assets');


function ds_setup() {

    add_theme_support('menus');

   
    register_nav_menu('primary', 'Primary Menu');

}

add_action('init', 'ds_setup');

function ds_theme_setup() {
    add_theme_support('post-thumbnails');

    add_theme_support('post-formats', array('aside', 'image', 'video'));

    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'ds_theme_setup');

;

function ds_add_bootstrap_cdn() {

    
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css',
        array(),
        '4.6.2',
        'all'
    );

    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js',
        array('jquery'),
        '4.6.2',
        true
    );
}

add_action('wp_enqueue_scripts', 'ds_add_bootstrap_cdn');


function themename_widgets_init() {

    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'theme_name' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

}
add_action( 'widgets_init', 'themename_widgets_init' );



class Foo_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'foo_widget',
            'A Foo Widget'
        );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo '<p>Hello World</p>';
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        echo '<p>No options yet</p>';
    }

    public function update( $new_instance, $old_instance ) {
        return $new_instance;
    }
}

function register_foo_widget() {
    register_widget( 'Foo_Widget' );
}
add_action( 'widgets_init', 'register_foo_widget' );





function my_limit_posts_on_index($query) {
    if ( !is_admin() && $query->is_main_query() && is_home() ) {
        $query->set('posts_per_page', 5);
    }
}
add_action('pre_get_posts', 'my_limit_posts_on_index');
?>