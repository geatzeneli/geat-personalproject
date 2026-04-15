<?php
/**
 * Theme header template.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="site-shell">
	<header class="site-header" role="banner">
		<div class="header-inner">
			<div class="branding">
				<div>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div>
				<div class="signal-strip" aria-label="Mission telemetry">
					<div class="signal-card">
						<span class="signal-label"><?php esc_html_e( 'Signal Delay', 'redground-olympus-terminal' ); ?></span>
						<span class="signal-value">+12.4 sec</span>
					</div>
					<div class="signal-card">
						<span class="signal-label"><?php esc_html_e( 'Colonial Timestamp', 'redground-olympus-terminal' ); ?></span>
						<span class="signal-value"><?php echo esc_html( redground_get_colonial_timestamp() ); ?></span>
					</div>
					<div class="signal-card">
						<span class="signal-label"><?php esc_html_e( 'Station Status', 'redground-olympus-terminal' ); ?></span>
						<span class="signal-value"><?php esc_html_e( 'Operational / Brewline Stable', 'redground-olympus-terminal' ); ?></span>
					</div>
				</div>
			</div>
			<div class="colony-horizon" aria-hidden="true"></div>
		</div>
	</header>
