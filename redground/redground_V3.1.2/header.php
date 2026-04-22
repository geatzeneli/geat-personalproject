<?php
/**
 * REDGROUND — OLYMPUS TERMINAL
 * header.php
 *
 * Renders the document head, telemetry strip, brand masthead, and primary nav.
 *
 * @package Redground
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0A0705">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php
    /**
     * wp_head() is REQUIRED.
     * It emits the <title>, registered styles/scripts (including our
     * Google Fonts + style.css), feed links, generator meta, and any
     * plugin-injected head content.
     */
    wp_head();
    ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to manifest', 'redground' ); ?></a>

<header class="rg-header" role="banner">

    <!-- Telemetry strip: signal delay + colonial timestamp + station ID -->
    <div class="rg-telemetry" aria-label="<?php esc_attr_e( 'Colonial telemetry', 'redground' ); ?>">

        <div class="rg-telemetry__cell rg-signal" aria-live="polite">
            <span class="rg-signal__dot" aria-hidden="true"></span>
            <span class="rg-telemetry__label"><?php esc_html_e( 'LINK', 'redground' ); ?></span>
            <span class="rg-telemetry__value"><?php echo esc_html( redground_signal_delay() ); ?></span>
        </div>

        <div class="rg-telemetry__cell">
            <span class="rg-telemetry__label"><?php esc_html_e( 'STATION', 'redground' ); ?></span>
            <span class="rg-telemetry__value">OLYMPUS-MONS // BAY 07</span>
        </div>

        <div class="rg-telemetry__cell">
            <span class="rg-telemetry__label"><?php esc_html_e( 'TIME', 'redground' ); ?></span>
            <span class="rg-telemetry__value"><?php echo esc_html( redground_colonial_timestamp() ); ?></span>
        </div>

    </div>

    <!-- Masthead: dome glyph, brand wordmark, primary nav -->
    <div class="rg-masthead">

        <a class="rg-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <span class="rg-dome" aria-hidden="true"></span>
            <span>
                <span class="rg-brand__wordmark"><?php bloginfo( 'name' ); ?></span>
                <span class="rg-brand__sub"><?php esc_html_e( 'OLYMPUS TERMINAL // EST. M-YR 31', 'redground' ); ?></span>
            </span>
        </a>

        <nav class="rg-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary', 'redground' ); ?>">
            <?php
            // Render the registered "primary" menu, with a graceful fallback.
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'rg-nav__list',
                    'depth'          => 1,
                    'fallback_cb'    => false,
                ) );
            } else {
                ?>
                <ul class="rg-nav__list">
                    <li><a href="<?php echo esc_url( home_url( '/#manifest' ) ); ?>"><?php esc_html_e( 'Manifest', 'redground' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#provenance' ) ); ?>"><?php esc_html_e( 'Provenance', 'redground' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#dispatch' ) ); ?>"><?php esc_html_e( 'Dispatch', 'redground' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#colony' ) ); ?>"><?php esc_html_e( 'Colony', 'redground' ); ?></a></li>
                </ul>
                <?php
            }
            ?>
        </nav>

    </div>
</header>
