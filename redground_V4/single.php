<?php
/**
 * Single post.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header(); ?>
<main id="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<section class="pagehead">
			<div class="wrap">
				<div class="pagehead__bar">
					<span class="code">// SPECIMEN</span>
					<span class="line"></span>
					<span><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></span>
				</div>
				<h1 class="pagehead__title"><?php the_title(); ?></h1>
			</div>
		</section>
		<section class="origin">
			<div class="wrap-tight">
				<div class="origin__body" style="font-size:17px;">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
</main>
<?php get_footer();
