<?php
/**
 * Default page template.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header(); ?>
<main id="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<section class="pagehead">
			<div class="wrap">
				<div class="pagehead__bar"><span class="code">// PAGE</span><span class="line"></span><span>OPEN FILE</span></div>
				<h1 class="pagehead__title"><?php the_title(); ?></h1>
			</div>
		</section>
		<section class="origin">
			<div class="wrap-tight">
				<div class="origin__body"><?php the_content(); ?></div>
			</div>
		</section>
	<?php endwhile; ?>
</main>
<?php get_footer();
