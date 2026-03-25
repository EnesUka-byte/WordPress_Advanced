<?php

// =========================
// ENQUEUE STYLES & SCRIPTS
// =========================
function ds_theme_assets() {

    wp_enqueue_style(
        'ds-style',
        get_stylesheet_uri(),
        array(),
        '1.0'
    );

    wp_enqueue_style(
        'slider-style',
        get_template_directory_uri() . '/css/slider.css',
        array(),
        '1.0'
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


// =========================
// BOOTSTRAP CDN
// =========================
function ds_add_bootstrap_cdn() {

    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css',
        array(),
        '4.6.2'
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


// =========================
// THEME SETUP
// =========================
function ds_theme_setup() {

    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Menu');

    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array('aside', 'image', 'video'));
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'ds_theme_setup');


// =========================
// SIDEBAR
// =========================
function themename_widgets_init() {

    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'theme_name'),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'themename_widgets_init');


// =========================
// CUSTOM WIDGET
// =========================
class Foo_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct('foo_widget', 'A Foo Widget');
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        echo '<p>Hello World</p>';
        echo $args['after_widget'];
    }

    public function form($instance) {
        echo '<p>No options yet</p>';
    }

    public function update($new_instance, $old_instance) {
        return $new_instance;
    }
}

function register_foo_widget() {
    register_widget('Foo_Widget');
}
add_action('widgets_init', 'register_foo_widget');


// =========================
// LIMIT POSTS ON HOME
// =========================
function my_limit_posts_on_index($query) {
    if (!is_admin() && $query->is_main_query() && is_home()) {
        $query->set('posts_per_page', 5);
    }
}
add_action('pre_get_posts', 'my_limit_posts_on_index');


// =========================
// REGISTER TAXONOMIES
// =========================
function register_taxonomy_movie_genres(){

    $labels = array(
        'name'              => _x('Movie Genres', 'taxonomy general name'),
        'singular_name'     => _x('Movie Genre', 'taxonomy singular name'),
        'search_items'      => __('Search Movie Genres'),
        'all_items'         => __('All Movie Genres'),
        'parent_item'       => __('Parent Genre'),
        'parent_item_colon' => __('Parent Genre:'),
        'edit_item'         => __('Edit Movie Genre'),
        'update_item'       => __('Update Movie Genre'),
        'add_new_item'      => __('Add New Movie Genre'),
        'new_item_name'     => __('New Movie Genre Name'),
        'menu_name'         => __('Movie Genres'),
    );

    register_taxonomy('movie_genres', array('movies'), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'movie_genre')
    ));

    register_taxonomy('movietags', 'movies', array(
        'label'             => 'Movie Tags',
        'rewrite'           => array('slug' => 'movie_tags'),
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true
    ));
}
add_action('init', 'register_taxonomy_movie_genres');


// =========================
// FILTER MOVIES BY GENRE (BUTTON SUPPORT)
// =========================
function my_filter_movies_by_genre($query) {

    if (!is_admin() && $query->is_main_query() && is_post_type_archive('movies')) {

        // Always ensure we're showing movies
        $query->set('post_type', 'movies');

        if (isset($_GET['genre']) && !empty($_GET['genre'])) {

            $query->set('tax_query', array(
                array(
                    'taxonomy' => 'movie_genres',
                    'field'    => 'slug',
                    'terms'    => sanitize_text_field($_GET['genre']),
                ),
            ));
        }
    }
}
add_action('pre_get_posts', 'my_filter_movies_by_genre');


// =========================
// HELPER: DISPLAY GENRE BUTTONS
// =========================
function display_movie_genre_buttons() {

    $terms = get_terms(array(
        'taxonomy' => 'movie_genres',
        'hide_empty' => true,
    ));

    if (!empty($terms) && !is_wp_error($terms)) {

        echo '<div class="mb-3">';

        echo '<a href="?" class="btn btn-secondary m-1">All</a>';

        foreach ($terms as $term) {
            echo '<a href="?genre=' . esc_attr($term->slug) . '" class="btn btn-primary m-1">';
            echo esc_html($term->name);
            echo '</a>';
        }

        echo '</div>';
    }
}