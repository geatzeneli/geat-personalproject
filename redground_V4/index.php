<?php
/**
 * Default index — falls back to front page layout for the blog index too.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
<main id="main" class="manifest-feed">
	<div class="wrap">
		<div class="pagehead" style="padding:60px 0 30px;border:0;">
			<div class="pagehead__bar"><span class="code">// LOG</span><span class="line"></span><span>BLOG INDEX</span></div>
			<h1 class="pagehead__title">Specimen log</h1>
		</div>

		<?php if ( have_posts() ) : $n = 1; while ( have_posts() ) : the_post();
			$id_code = 'RG-OL-' . strtoupper( substr( md5( get_the_ID() ), 0, 4 ) );
			$cats = get_the_category();
			$cat  = ! empty( $cats ) ? $cats[0]->name : 'UNCATEGORIZED';
		?>
			<article class="specimen">
				<div>
					<div class="specimen__id">SPECIMEN <?php echo esc_html( str_pad( $n, 3, '0', STR_PAD_LEFT ) ); ?></div>
					<div class="specimen__id"><?php echo esc_html( $id_code ); ?></div>
					<div class="specimen__cat">// <?php echo esc_html( strtoupper( $cat ) ); ?></div>
				</div>
				<div>
					<h3 class="specimen__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p class="specimen__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>
				</div>
				<div class="specimen__meta"><?php echo esc_html( $id_code ); ?><br /><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></div>
			</article>
		<?php $n++; endwhile; the_posts_pagination(); else : ?>
			<p class="foot__p">No transmissions logged yet.</p>
		<?php endif; ?>
	</div>
</main>
<?php get_footer();
