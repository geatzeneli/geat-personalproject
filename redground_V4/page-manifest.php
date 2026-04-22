<?php
/**
 * Template Name: Manifest
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();

$cargo = array(
	array( 'id'=>'MNF-001','name'=>'Crater Sunrise','origin'=>'Sidamo, Ethiopia','roast'=>'Light','notes'=>'Bergamot · Jasmine · Honey','price'=>'$22','status'=>'IN STOCK','class'=>'--ok','limited'=>false ),
	array( 'id'=>'MNF-002','name'=>'Olympus Black','origin'=>'Antigua, Guatemala','roast'=>'Dark','notes'=>'Cocoa · Tobacco · Black cherry','price'=>'$24','status'=>'IN STOCK','class'=>'--ok','limited'=>false ),
	array( 'id'=>'MNF-003','name'=>'Dust Storm','origin'=>'Yirgacheffe, Ethiopia','roast'=>'Medium','notes'=>'Blueberry · Caramel · Vanilla','price'=>'$26','status'=>'LOW','class'=>'--low','limited'=>false ),
	array( 'id'=>'MNF-004','name'=>'Phobos Reserve','origin'=>'Geisha, Panama','roast'=>'Light','notes'=>'Peach · Rose · Lemon zest','price'=>'$58','status'=>'RESTRICTED','class'=>'--rst','limited'=>true ),
	array( 'id'=>'MNF-005','name'=>'Red Valley Blend','origin'=>'Brazil + Colombia','roast'=>'Med-Dark','notes'=>'Hazelnut · Brown sugar · Milk choc.','price'=>'$20','status'=>'IN STOCK','class'=>'--ok','limited'=>false ),
	array( 'id'=>'MNF-006','name'=>'Deimos Drift','origin'=>'Sumatra Mandheling','roast'=>'Dark','notes'=>'Cedar · Earth · Dark molasses','price'=>'$23','status'=>'IN STOCK','class'=>'--ok','limited'=>false ),
);
$restricted = array(
	array( 'id'=>'RST-X1','name'=>'Anaerobic Olympus','desc'=>'72-hour anaerobic ferment. 80 bags ever produced.' ),
	array( 'id'=>'RST-X2','name'=>'Carbonic Maceration N°4','desc'=>'Co-fermented with Martian-grown botanicals (allegedly).' ),
);
?>
<main id="main">
	<section class="pagehead">
		<div class="wrap">
			<div class="pagehead__bar"><span class="code">// MNF · ACTIVE CARGO</span><span class="line"></span><span><span class="dot" style="display:inline-block;margin-right:6px;"></span>6 LOTS LIVE</span></div>
			<h1 class="pagehead__title">Manifest</h1>
			<p class="pagehead__sub">Every bean currently aboard. Updated as roasts cycle and limited drops launch.</p>
		</div>
	</section>

	<section class="cargo">
		<div class="wrap">
			<div class="cargo__row --head">
				<div>ID</div><div>DESIGNATION</div><div>ORIGIN</div><div>ROAST</div><div>PROFILE</div><div>UNIT</div><div>STATUS</div>
			</div>
			<?php foreach ( $cargo as $c ) : ?>
				<div class="cargo__row">
					<div class="id"><?php echo esc_html( $c['id'] ); ?></div>
					<div>
						<div class="name"><?php echo esc_html( $c['name'] ); ?></div>
						<?php if ( $c['limited'] ) : ?><div class="mono" style="color:var(--ember);font-size:10px;letter-spacing:.25em;margin-top:4px;">⚠ LIMITED DROP</div><?php endif; ?>
					</div>
					<div class="mono" style="font-size:12px;color:var(--text-soft);"><?php echo esc_html( $c['origin'] ); ?></div>
					<div class="mono" style="font-size:12px;"><?php echo esc_html( $c['roast'] ); ?></div>
					<div class="mono" style="font-size:12px;color:var(--text-soft);"><?php echo esc_html( $c['notes'] ); ?></div>
					<div class="mono"><?php echo esc_html( $c['price'] ); ?></div>
					<div><span class="badge <?php echo esc_attr( $c['class'] ); ?>"><?php echo esc_html( $c['status'] ); ?></span></div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="restricted">
		<div class="wrap">
			<div class="restricted__panel">
				<div class="restricted__head"><span>⚠ RESTRICTED CARGO</span><span class="line"></span><span>CLEARANCE REQUIRED</span></div>
				<h2 class="restricted__title">Experimental batches</h2>
				<p class="pagehead__sub" style="margin-top:8px;">Microlots, weird ferments, and one-off experiments. Often gone before you finish reading the description.</p>
				<div class="restricted__grid">
					<?php foreach ( $restricted as $r ) : ?>
						<div class="restricted__card">
							<div class="mono" style="color:var(--rust-2);font-size:11px;"><?php echo esc_html( $r['id'] ); ?></div>
							<h3 style="font-size:24px;margin-top:8px;"><?php echo esc_html( $r['name'] ); ?></h3>
							<p style="color:var(--text-soft);font-size:13px;line-height:1.6;margin-top:6px;"><?php echo esc_html( $r['desc'] ); ?></p>
							<button class="mono" style="margin-top:14px;background:none;border:0;color:var(--ember);font-size:11px;letter-spacing:.25em;text-transform:uppercase;cursor:pointer;">REQUEST ACCESS →</button>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer();
