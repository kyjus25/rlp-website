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

// Menu Icons
add_filter('wp_nav_menu_item_custom_fields', function ($item_id, $item, $depth, $args) {
    $icon = get_post_meta($item_id, '_menu_item_dashicon', true);
    ?>
    <p class="field-icon description description-wide">
        <label for="edit-menu-item-dashicon-<?php echo $item_id; ?>">
            Dashicon Class (e.g. dashicons-admin-home)<br>
            <input type="text" id="edit-menu-item-dashicon-<?php echo $item_id; ?>"
                   class="widefat code edit-menu-item-dashicon"
                   name="menu-item-dashicon[<?php echo $item_id; ?>]"
                   value="<?php echo esc_attr($icon); ?>">
        </label>
    </p>
    <?php
}, 10, 4);

add_action('wp_update_nav_menu_item', function ($menu_id, $menu_item_db_id, $args) {
    if (isset($_POST['menu-item-dashicon'][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, '_menu_item_dashicon', sanitize_text_field($_POST['menu-item-dashicon'][$menu_item_db_id]));
    }
}, 10, 3);

add_filter('walker_nav_menu_start_el', function ($item_output, $item, $depth, $args) {
    $icon = get_post_meta($item->ID, '_menu_item_dashicon', true);
    if ($icon) {
        $icon_html = '<span class="dashicons ' . esc_attr($icon) . '" style="margin-right:0.3em;"></span>';
        $item_output = preg_replace('/(<a[^>]*>)(.*?)(<\/a>)/i', '$1' . $icon_html . '$2$3', $item_output);
    }
    return $item_output;
}, 10, 4);