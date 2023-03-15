<?php

// Setup theme
function uitzendbureauevent_theme_support()
{
    // Add theme supports
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    // sizes
    add_image_size('hero-big', 1920, 750, true);
    add_image_size('hero-img', 1200, 900, true);
    add_image_size('function', 360, 420, true);
    add_image_size('worker-small', 170, 180, true);

    // Menu's
    register_nav_menus(
        array(
            'primary' => esc_html__('Primary menu', 'uitzendbureauevent'),
            'footer'  => esc_html__('Footer menu', 'uitzendbureauevent'),
        )
    );

    // Include ACF
    require_once(get_template_directory() .  '/includes/acf.php');

    register_sidebar(array(
        'name'          => 'Footer een',
        'id'            => 'footer_1',
        'before_title' => '<h4>',
        'after_title' => "</h4>",
    ));

    register_sidebar(array(
        'name'          => 'Footer twee',
        'id'            => 'footer_2',
        'before_title' => '<h4>',
        'after_title' => "</h4>",
    ));

    // Add option page

    acf_add_options_page(array(
        'page_title'     => 'Website informatie',
        'menu_title'     => 'Opties',
        'menu_slug'     => 'website-informatie',
        'capability'     => 'edit_posts',
        'icon_url' => 'dashicons-universal-access-alt',
        'position' => 3
    ));
}

add_action('after_setup_theme', 'uitzendbureauevent_theme_support');

// Load in styles
function uitzendbureauevent_register_styles()
{
    //  Include our css
    $theme_version = wp_get_theme()->get('Version');
    wp_enqueue_style('theme-styles', get_stylesheet_uri(), array(), $theme_version);

    // Remove default stylings wordpress
    wp_dequeue_style('global-styles');
    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
    remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
}

add_action('wp_enqueue_scripts', 'uitzendbureauevent_register_styles');

// Load in scripts
function uitzendbureauevent_register_scripts()
{
    wp_enqueue_script('jquery');

    $theme_version = wp_get_theme()->get('Version');
    wp_enqueue_script('swiper', get_template_directory_uri() . '/node_modules/swiper/swiper-bundle.min.js', array(), $theme_version, false, true);
    wp_enqueue_script('uitzendbureauevent-js', get_template_directory_uri() . '/assets/js/index.js', array(), $theme_version, true);

    wp_enqueue_script('TweenMax', get_template_directory_uri() . '/assets/js/TweenMax.min.js', array(), $theme_version, true);
    wp_enqueue_script('ScrollMagic', get_template_directory_uri() . '/assets/js/ScrollMagic.min.js', array(), $theme_version, true);
    wp_enqueue_script('AnimationGsap', get_template_directory_uri() . '/assets/js/animation.gsap.min.js', array(), $theme_version, true);
    wp_enqueue_script('debug', get_template_directory_uri() . '/assets/js/addIndicators.min.js', array(), $theme_version, true);
    wp_enqueue_script('animations', get_template_directory_uri() . '/assets/js/animations.js', array(), $theme_version, true);
}

add_action('wp_enqueue_scripts', 'uitzendbureauevent_register_scripts');


// Custom post types
if (!function_exists('create_post_type')) :
    function create_post_type()
    {
        register_post_type(
            'Locaties',
            array(
                'labels' => array(
                    'name' => esc_html__('Locaties', 'uitzendbureauevent'),
                    'singular_name' => esc_html__('Locatie', 'uitzendbureauevent'),
                ),
                'public' => true,
                'has_archive' => false,
                'supports' => array('title', 'custom-fields', 'page-attributes', 'thumbnail', 'revisions'),
                'hierarchical' => true,
                'menu_icon' => 'dashicons-location',
                'rewrite' => array(
                    'slug' => esc_html__('locaties', 'uitzendbureauwebsite'),
                )
            )
        );

        register_post_type(
            'Agendas',
            array(
                'labels' => array(
                    'name' => esc_html__('Agendas', 'uitzendbureauevent'),
                    'singular_name' => esc_html__('Agenda', 'uitzendbureauevent'),
                ),
                'public' => true,
                'has_archive' => false,
                'supports' => array('title', 'custom-fields', 'page-attributes', 'thumbnail', 'revisions'),
                'hierarchical' => true,
                'menu_icon' => 'dashicons-editor-ul',
                'rewrite' => array(
                    'slug' => esc_html__('agendas', 'uitzendbureauwebsite'),
                )
            )
        );
    }
    add_action('init', 'create_post_type');
endif;

// ACF Json
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path)
{
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point($paths)
{
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}

function wpb_change_title_text($title)
{
    $screen = get_current_screen();

    if ('agendas' == $screen->post_type) {
        $title = 'Jaar';
    }

    return $title;
}

add_filter('enter_title_here', 'wpb_change_title_text');
