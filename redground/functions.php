<?php
/**
 * REDGROUND — OLYMPUS TERMINAL functions.
 *
 * Modular foundation for the theme: assets, theme supports, and reusable
 * Martian utility functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme setup.
 */
function redground_theme_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'redground-olympus-terminal' ),
		)
	);
}
add_action( 'after_setup_theme', 'redground_theme_setup' );

/**
 * Enqueue fonts and compiled theme stylesheet.
 */
function redground_enqueue_assets() {
	wp_enqueue_style(
		'redground-google-fonts',
		'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cormorant+Garamond:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'redground-theme-style',
		get_stylesheet_uri(),
		array( 'redground-google-fonts' ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'redground_enqueue_assets' );

/**
 * Build a synthetic Martian atmospheric pressure reading.
 *
 * The output is deterministic enough for a polished interface while still
 * feeling live. It varies by hour to mimic telemetry drift.
 *
 * @return string Human-readable pressure value.
 */
function redground_get_martian_atmospheric_pressure() {
	$seed = (int) gmdate( 'YmdH' );
	srand( $seed );
	$base_kpa = 0.61; // Mars surface pressure is roughly 0.6 kPa in real-world terms.
	$drift    = ( rand( -8, 8 ) / 100 );
	$reading  = max( 0.38, min( 0.92, $base_kpa + $drift ) );

	return number_format( $reading, 2 ) . ' kPa';
}

/**
 * Render the colonial timestamp in UTC with an infrastructure-style format.
 *
 * @return string
 */
function redground_get_colonial_timestamp() {
	return gmdate( 'Y-m-d \U\T\C H:i:s' );
}

/**
 * Utility for post categories rendered as technical labels.
 *
 * @return string
 */
function redground_get_category_label() {
	$categories = get_the_category();

	if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
		return strtoupper( esc_html( $categories[0]->name ) );
	}

	return 'UNCLASSIFIED';
}

/**
 * Simulate Martian Atmospheric Pressure
 * Returns a randomized realistic Mars pressure reading (Pa)
 */
function redground_get_mars_pressure() {

    // Mars pressure range ~600–750 Pascals
    $pressure = rand(600, 750);

    // Optional: add slight decimal realism
    $decimal = rand(0, 99);

    return $pressure . '.' . str_pad($decimal, 2, '0', STR_PAD_LEFT);
}