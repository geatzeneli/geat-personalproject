<?php
/**
 * REDGROUND — OLYMPUS TERMINAL
 * functions.php
 *
 * Theme bootstrap: feature support, asset enqueueing, and custom helpers
 * for the Martian colonial telemetry UI.
 *
 * @package Redground
 * @since   1.0.0
 */

// Block direct file access — standard WordPress hardening.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'REDGROUND_VERSION' ) ) {
    define( 'REDGROUND_VERSION', '1.2.1' );
}

if ( ! defined( 'REDGROUND_MARTIAN_YEAR' ) ) {
    // Symbolic colonial year — surfaced in the footer versioning strip.
    define( 'REDGROUND_MARTIAN_YEAR', 34 );
}

/* =============================================================
 * 1. Theme Setup
 * ============================================================= */

if ( ! function_exists( 'redground_setup' ) ) :
    /**
     * Register core theme features.
     *
     * - title-tag      : lets WP render <title> via wp_head() (required by spec).
     * - post-thumbnails: enables featured imagery on coffee posts.
     * - html5         : modern semantic markup for core elements.
     * - automatic-feed-links: standard feed discovery.
     * - menus         : registers the primary colonial nav.
     */
    function redground_setup() {
        load_theme_textdomain( 'redground', get_template_directory() . '/languages' );

        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ) );

        // Custom thumbnail size sized for the manifest grid cards.
        add_image_size( 'redground-card', 720, 450, true );

        register_nav_menus( array(
            'primary' => __( 'Primary Terminal Navigation', 'redground' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'redground_setup' );

/* =============================================================
 * 2. Asset Enqueueing — Google Fonts + Theme Stylesheet
 * ============================================================= */

/**
 * Enqueue stylesheets and Google Fonts.
 *
 * Per spec: do NOT hardcode font links in header.php — load them
 * via wp_enqueue_scripts so they appear in wp_head().
 */
function redground_enqueue_assets() {

    // Google Fonts: Bebas Neue (display), Cormorant Garamond (body), DM Mono (UI).
    $fonts_url = add_query_arg(
        array(
            'family'  => implode( '&family=', array(
                'Bebas+Neue',
                'Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400',
                'DM+Mono:wght@300;400;500',
            ) ),
            'display' => 'swap',
        ),
        'https://fonts.googleapis.com/css2'
    );

    // Pre-connect for performance — added to <head> via wp_resource_hints.
    wp_enqueue_style(
        'redground-fonts',
        $fonts_url,
        array(),
        null // null = no cache-busting query for fonts
    );

    // Main theme stylesheet — required to live in style.css per WP standards.
    wp_enqueue_style(
        'redground-style',
        get_stylesheet_uri(),
        array( 'redground-fonts' ),
        REDGROUND_VERSION
    );

    // Slider controller — vanilla JS, deferred so it never blocks paint.
    wp_enqueue_script(
        'redground-slider',
        get_template_directory_uri() . '/assets/js/slider.js',
        array(),
        REDGROUND_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'redground_enqueue_assets' );

/**
 * Add <link rel="preconnect"> hints for Google Fonts.
 */
function redground_resource_hints( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type && wp_style_is( 'redground-fonts', 'queue' ) ) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'redground_resource_hints', 10, 2 );

/* =============================================================
 * 3. Colonial Telemetry Helpers
 * ============================================================= */

/**
 * Simulated Martian Atmospheric Pressure reading.
 *
 * Real surface pressure on Mars varies between ~600 and ~1000 Pa
 * depending on season and altitude. This helper produces a value in
 * that band, deterministic per-day so the readout is stable across
 * page loads but still drifts with time.
 *
 * @return array {
 *   @type float  $pressure  Pressure value in pascals.
 *   @type string $unit      'Pa'.
 *   @type int    $percent   0-100 normalized for the bar UI.
 *   @type string $trend     '▲', '▼' or '◆'.
 * }
 */
function redground_atmospheric_pressure() {
    // Seed with the day-of-year + martian year so the value is stable per-day.
    $seed = (int) gmdate( 'z' ) + REDGROUND_MARTIAN_YEAR * 10;
    mt_srand( $seed );

    $pressure = 610 + mt_rand( 0, 380 ) + ( mt_rand( 0, 100 ) / 100 );
    $percent  = (int) round( ( ( $pressure - 600 ) / 400 ) * 100 );
    $percent  = max( 4, min( 98, $percent ) );

    $trend_seed = mt_rand( 0, 2 );
    $trend = array( '▲', '▼', '◆' )[ $trend_seed ];

    // Reset RNG so we don't pollute other code.
    mt_srand();

    return array(
        'pressure' => round( $pressure, 2 ),
        'unit'     => 'Pa',
        'percent'  => $percent,
        'trend'    => $trend,
    );
}

/**
 * Build a colonial timestamp string for the header telemetry bar.
 *
 * Format: "SOL 0421 // 14:22 MTC // M-YR 34"
 *
 * @return string
 */
function redground_colonial_timestamp() {
    $sol      = str_pad( (int) gmdate( 'z' ) + 1, 4, '0', STR_PAD_LEFT );
    $mtc      = gmdate( 'H:i' );
    $year     = REDGROUND_MARTIAN_YEAR;
    return sprintf( 'SOL %s // %s MTC // M-YR %d', $sol, $mtc, $year );
}

/**
 * Signal-delay readout. Earth ↔ Mars one-way light time varies between
 * roughly 3 and 22 minutes depending on orbital geometry.
 *
 * @return string e.g. "DELAY 12:47"
 */
function redground_signal_delay() {
    $seed = (int) gmdate( 'z' ) + 7;
    mt_srand( $seed );
    $minutes = mt_rand( 3, 22 );
    $seconds = mt_rand( 0, 59 );
    mt_srand();
    return sprintf( 'DELAY %02d:%02d', $minutes, $seconds );
}

/**
 * Generate a stable "SKU" per post — used in card footers.
 *
 * @param int $post_id
 * @return string e.g. "RG-OL-0427"
 */
function redground_post_sku( $post_id ) {
    $hash = substr( md5( (string) $post_id ), 0, 4 );
    return strtoupper( 'RG-OL-' . $hash );
}

/**
 * Render a primary category as a technical label.
 * Falls back to "UNCATEGORIZED" if no category exists.
 *
 * @param int $post_id
 * @return string
 */
function redground_post_label( $post_id ) {
    $cats = get_the_category( $post_id );
    if ( empty( $cats ) ) {
        return 'UNCATEGORIZED';
    }
    return strtoupper( $cats[0]->name );
}

/* =============================================================
 * 4. Sidebar / Widgets registration
 * ============================================================= */

/**
 * Register the Olympus telemetry sidebar so admins can drop in
 * additional widgets beneath the atmospheric panel.
 */
function redground_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Olympus Telemetry Sidebar', 'redground' ),
        'id'            => 'olympus-telemetry',
        'description'   => __( 'Sidebar shown on the manifest index, below atmospheric readouts.', 'redground' ),
        'before_widget' => '<aside id="%1$s" class="rg-panel widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<div class="rg-panel__head"><span>',
        'after_title'   => '</span><span>OK</span></div>',
    ) );
}
add_action( 'widgets_init', 'redground_widgets_init' );

/* =============================================================
 * 5. Body class — adds 'rg-theme' for namespaced selectors
 * ============================================================= */

function redground_body_classes( $classes ) {
    $classes[] = 'rg-theme';
    return $classes;
}
add_filter( 'body_class', 'redground_body_classes' );
