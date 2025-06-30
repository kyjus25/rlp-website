<?php
function village_of_round_lake_park_styles() {
    wp_enqueue_style( 'village_of_round_lake_park_style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'village_of_round_lake_park_styles' );
?>