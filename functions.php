<?php 
if (!function_exists('PHP_LAB_2021_WordPress_Homework_2_setup')) :
    function PHP_LAB_2021_WordPress_Homework_2_setup()
    {

    }
endif;
add_action('after_setup_theme', 'PHP_LAB_2021_WordPress_Homework_2_setup');

function PHP_LAB_2021_WordPress_Homework_2_scripts() {
    wp_enqueue_style( 
        'fontawesome',
        get_template_directory_uri() . '/assets/css/fontawesome.css'
    );

    wp_enqueue_style( 
        'bootstrap',
        get_template_directory_uri() . '/assets/css/bootstrap.min.css'
    );

    wp_enqueue_style( 
        'owl',
        get_template_directory_uri() . '/assets/css/owl.css'
    );

    wp_enqueue_style('PHP_LAB_2021_WordPress_Homework_2_scripts-style', get_stylesheet_uri());

    wp_enqueue_script(
        'bootstrapjs',
        get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js',
        array('jquery'),
        '1.0',
        true
    );

    wp_enqueue_script(
        'customjs',
        get_template_directory_uri() . '/assets/js/custom.js',
        array('bootstrapjs'),
        '1.0',
        true
    );

    wp_enqueue_script(
        'owljs',
        get_template_directory_uri() . '/assets/js/owl.js',
        array('customjs'),
        '1.0',
        true
    );

    wp_enqueue_script(
        'slickjs',
        get_template_directory_uri() . '/assets/js/slick.js',
        array('owljs'),
        '1.0',
        true
    );

    wp_enqueue_script(
        'isotopejs',
        get_template_directory_uri() . '/assets/js/isotope.js',
        array('slickjs'),
        '1.0',
        true
    );

    wp_enqueue_script(
        'accordionsjs',
        get_template_directory_uri() . '/assets/js/accordions.js',
        array('isotopejs'),
        '1.0',
        true
    );
}
add_action('wp_enqueue_script', 'PHP_LAB_2021_WordPress_Homework_2_scripts');