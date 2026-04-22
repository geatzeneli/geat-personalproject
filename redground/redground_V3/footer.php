<?php
/**
 * REDGROUND — OLYMPUS TERMINAL
 * footer.php
 *
 * Renders the technical colonial footer + versioning strip.
 *
 * @package Redground
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<footer class="rg-footer" role="contentinfo">

    <div class="rg-container rg-footer__inner">

        <div class="rg-footer__col">
            <strong>// COLLECTIVE</strong>
            <p>REDGROUND Coffee Collective</p>
            <p>Olympus Terminal, Bay 07</p>
            <p>Tharsis Basin, Mars</p>
        </div>

        <div class="rg-footer__col">
            <strong>// DISPATCH</strong>
            <p>Earth Window: Q3 / M-YR <?php echo esc_html( REDGROUND_MARTIAN_YEAR ); ?></p>
            <p>Lift Vehicle: Heavy-Lift OL-09</p>
            <p>Cargo Bay: 7.4 t pressurized</p>
        </div>

        <div class="rg-footer__col">
            <strong>// SIGNAL</strong>
            <p>Earth ↔ Olympus: <?php echo esc_html( redground_signal_delay() ); ?></p>
            <p>Relay: Phobos-Sat 03</p>
            <p>Status: NOMINAL</p>
        </div>

    </div>

    <!-- Versioning strip — production manifest signature -->
    <div class="rg-footer__strip">
        <span>
            &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
            <?php bloginfo( 'name' ); ?>
            // ALL ROASTS LOGGED
        </span>
        <span class="rg-footer__version">
            v<?php echo esc_html( REDGROUND_VERSION ); ?>
            // M-YEAR <?php echo esc_html( REDGROUND_MARTIAN_YEAR ); ?>
            // BUILD <?php echo esc_html( strtoupper( substr( md5( REDGROUND_VERSION . REDGROUND_MARTIAN_YEAR ), 0, 8 ) ) ); ?>
        </span>
    </div>

</footer>

<?php
/**
 * wp_footer() is REQUIRED — it emits enqueued footer scripts, the
 * admin bar (when logged in), and any plugin-injected output.
 */
wp_footer();
?>
</body>
</html>
