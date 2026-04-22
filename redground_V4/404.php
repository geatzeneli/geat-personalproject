<?php
/**
 * 404
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header(); ?>
<main id="main">
	<section class="pagehead">
		<div class="wrap">
			<div class="pagehead__bar"><span class="code">// SIGNAL LOST</span><span class="line"></span><span>404</span></div>
			<h1 class="pagehead__title">404 — Off-route transmission</h1>
			<p class="pagehead__sub">That coordinate isn't on the colonial map. Return to base and try a different vector.</p>
			<p style="margin-top:24px;"><a class="btn-primary" style="display:inline-block;width:auto;padding:14px 28px;" href="<?php echo esc_url( home_url('/') ); ?>">Return to base →</a></p>
		</div>
	</section>
</main>
<?php get_footer();
