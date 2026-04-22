<?php
/**
 * REDGROUND — Olympus Terminal
 * functions.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'REDGROUND_VERSION', '1.5.0' );

/* -------- Theme setup -------- */
function redground_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'navigation-widgets' ) );
	add_theme_support( 'custom-logo', array( 'height' => 64, 'width' => 64, 'flex-height' => true, 'flex-width' => true ) );

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'redground-olympus-terminal' ),
		'footer'  => __( 'Footer Navigation', 'redground-olympus-terminal' ),
	) );

	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'redground_setup' );

/* -------- Assets -------- */
function redground_assets() {
	wp_enqueue_style(
		'redground-fonts',
		'https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800&family=Space+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'redground-style', get_stylesheet_uri(), array( 'redground-fonts' ), REDGROUND_VERSION );
	wp_enqueue_script( 'redground-app', get_template_directory_uri() . '/assets/js/app.js', array(), REDGROUND_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'redground_assets' );

/* -------- Auto-provision pages on activation -------- */
function redground_provision_pages() {
	$pages = array(
		'manifest'   => array( 'title' => 'Manifest',   'template' => 'page-manifest.php' ),
		'provenance' => array( 'title' => 'Provenance', 'template' => 'page-provenance.php' ),
		'dispatch'   => array( 'title' => 'Dispatch',   'template' => 'page-dispatch.php' ),
		'colony'     => array( 'title' => 'Colony',     'template' => 'page-colony.php' ),
	);
	foreach ( $pages as $slug => $info ) {
		$existing = get_page_by_path( $slug );
		if ( ! $existing ) {
			$page_id = wp_insert_post( array(
				'post_type'    => 'page',
				'post_title'   => $info['title'],
				'post_name'    => $slug,
				'post_status'  => 'publish',
				'post_content' => '',
			) );
			if ( $page_id && ! is_wp_error( $page_id ) ) {
				update_post_meta( $page_id, '_wp_page_template', $info['template'] );
			}
		}
	}

	// Optional: build a primary menu if none exists.
	if ( ! wp_get_nav_menu_object( 'Primary' ) ) {
		$menu_id = wp_create_nav_menu( 'Primary' );
		foreach ( array( 'manifest', 'provenance', 'dispatch', 'colony' ) as $slug ) {
			$page = get_page_by_path( $slug );
			if ( $page ) {
				wp_update_nav_menu_item( $menu_id, 0, array(
					'menu-item-title'     => get_the_title( $page ),
					'menu-item-object'    => 'page',
					'menu-item-object-id' => $page->ID,
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
				) );
			}
		}
		$locations = get_theme_mod( 'nav_menu_locations', array() );
		$locations['primary'] = $menu_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}
}
add_action( 'after_switch_theme', 'redground_provision_pages' );

/* -------- Walker for nav with [CODE] prefix -------- */
class Redground_Nav_Walker extends Walker_Nav_Menu {
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$active  = in_array( 'current-menu-item', $classes, true ) || in_array( 'current_page_item', $classes, true );
		$title   = apply_filters( 'the_title', $item->title, $item->ID );
		$code    = strtoupper( substr( preg_replace( '/[^A-Za-z]/', '', $title ), 0, 3 ) );
		$class   = $active ? 'is-active' : '';
		$output .= sprintf(
			'<a href="%s" class="%s"><span class="nav-code">[%s]</span>%s</a>',
			esc_url( $item->url ),
			esc_attr( $class ),
			esc_html( $code ),
			esc_html( $title )
		);
	}
	public function end_el( &$output, $item, $depth = 0, $args = null ) {}
	public function start_lvl( &$output, $depth = 0, $args = null ) {}
	public function end_lvl( &$output, $depth = 0, $args = null ) {}
}

/* -------- Helper: render a procedural slide background -------- */
function redground_slide_styles( $i ) {
	$palettes = array(
		array( '#3b1810', '#c84a1f', '#f0a850' ),
		array( '#2a1208', '#e35a25', '#d9c2a0' ),
		array( '#1a0c06', '#a83a18', '#f0a850' ),
		array( '#2c1410', '#d4451c', '#e8b878' ),
		array( '#1f0e08', '#b84020', '#dba868' ),
	);
	$p = $palettes[ $i % count( $palettes ) ];
	return sprintf(
		'background: radial-gradient(ellipse at 30%% 60%%, %s 0%%, %s 50%%, %s 100%%);',
		$p[2], $p[1], $p[0]
	);
}

/* -------- Body class helper -------- */
function redground_body_classes( $classes ) {
	$classes[] = 'rg-theme';
	return $classes;
}
add_filter( 'body_class', 'redground_body_classes' );
