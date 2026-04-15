<?php
/**
 * Theme footer template.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	<footer class="site-footer" role="contentinfo">
		<div class="footer-inner">
			<p><?php echo esc_html( get_bloginfo( 'name' ) ); ?> // <?php esc_html_e( 'Frontier-Maximalist Coffee Infrastructure', 'redground-olympus-terminal' ); ?></p>
			<p class="version-string"><?php esc_html_e( 'v1.0 // M-Year 34', 'redground-olympus-terminal' ); ?></p>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
