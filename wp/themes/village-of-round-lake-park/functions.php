<?php

// Load styles.css
function village_of_round_lake_park_styles() {
    wp_enqueue_style( 'village_of_round_lake_park_style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'village_of_round_lake_park_styles' );

// Custom logo
add_theme_support('custom-logo', [
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
]);

// Icons - https://developer.wordpress.org/resource/dashicons/
function mytheme_enqueue_dashicons() {
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_dashicons');

// Custom settings
function rlp_customize_register($wp_customize) {
    // Add setting for mayor
    $wp_customize->add_setting('mayor_name', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('mayor_name', [
        'label'    => __('Mayor Name', 'your-text-domain'),
        'section'  => 'title_tagline', // This is the Site Identity section
        'type'     => 'text',
        'priority' => 10, // Adjust as needed
    ]);

    // Canvas Image Upload
    $wp_customize->add_setting('canvas_image', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'canvas_image',
        [
            'label'    => __('Canvas Image', 'your-text-domain'),
            'section'  => 'title_tagline', // Still in Site Identity
            'settings' => 'canvas_image',
            'priority' => 11,
        ]
    ));
}
add_action('customize_register', 'rlp_customize_register');

// Marquee
add_action('init', function () {
    register_block_type(__DIR__ . '/blocks/marquee');
});

// Card
add_action('init', function () {
    register_block_type(__DIR__ . '/blocks/card');
});

// Navigation With Icon
add_action('init', function () {
    register_block_type(__DIR__ . '/blocks/navigation-with-icon');
});

// Navigation With Icon Item
add_action('init', function () {
    register_block_type(__DIR__ . '/blocks/navigation-with-icon-item');
});
