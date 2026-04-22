<?php
/**
 * Template Name: Dispatch
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();

$missions = array(
	array( 'id'=>'DSP-2104-A','dest'=>'Brooklyn, NY','stage'=>75,'eta'=>'2 days','status'=>'IN TRANSIT' ),
	array( 'id'=>'DSP-2104-B','dest'=>'Austin, TX','stage'=>100,'eta'=>'Delivered','status'=>'ARRIVED' ),
	array( 'id'=>'DSP-2104-C','dest'=>'Portland, OR','stage'=>30,'eta'=>'4 days','status'=>'ROASTING' ),
);
$stages = array( 'Roast','Rest','Pack','Launch','Transit','Arrival' );
$cycles = array(
	array( 'name'=>'Weekly Resupply','desc'=>'12oz · every Friday','price'=>'$22/cycle' ),
	array( 'name'=>'Bi-weekly Crew Pack','desc'=>'2× 12oz · every other week','price'=>'$40/cycle' ),
	array( 'name'=>'Monthly Expedition','desc'=>'3× 12oz · monthly','price'=>'$58/cycle' ),
);
$tx = array(
	array( '04.18','Phobos Reserve lands tonight at 22:00 MTC','80 bags. Geisha. Gone fast last quarter — set a reminder.' ),
	array( '04.12','Roast Log: dialing in Dust Storm v3','Dropped temp 3°C, extended dev time 12s. Blueberry got louder.' ),
	array( '04.04','Field report from Sidamo','Rain came late. Cherries denser. Cup score up across three lots.' ),
);
?>
<main id="main">
	<section class="pagehead">
		<div class="wrap">
			<div class="pagehead__bar"><span class="code">// DSP · TRANSIT CONTROL</span><span class="line"></span><span>3 IN FLIGHT</span></div>
			<h1 class="pagehead__title">Dispatch</h1>
			<p class="pagehead__sub">Where your coffee is, where it's going, and when the next batch leaves the terminal.</p>
		</div>
	</section>

	<section class="missions">
		<div class="wrap">
			<h2 style="font-family:var(--condensed);font-size:48px;text-transform:uppercase;">Active missions</h2>
			<div style="margin-top:24px;">
				<?php foreach ( $missions as $m ) : ?>
					<div class="mission">
						<div class="mission__top">
							<span class="mission__id"><?php echo esc_html( $m['id'] ); ?></span>
							<span class="mono" style="color:var(--text-soft);">→ <?php echo esc_html( $m['dest'] ); ?></span>
							<span class="badge --ok"><?php echo esc_html( $m['status'] ); ?></span>
							<span class="mono">ETA: <?php echo esc_html( $m['eta'] ); ?></span>
						</div>
						<div class="mission__bar"><span style="width:<?php echo (int) $m['stage']; ?>%"></span></div>
						<div class="mission__stages">
							<?php foreach ( $stages as $i => $s ) :
								$pct = ( $i / ( count($stages) - 1 ) ) * 100;
								$active = $pct <= $m['stage'];
							?>
								<span style="<?php echo $active ? 'color:var(--text);' : ''; ?>"><?php echo esc_html( $s ); ?></span>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="cycles">
		<div class="wrap">
			<div class="eyebrow">// scheduled cycles</div>
			<h2 style="font-family:var(--condensed);font-size:48px;text-transform:uppercase;margin-top:8px;">Lock in your supply window</h2>
			<p class="pagehead__sub">Pick a cadence. We roast, rest, and launch on schedule. Skip or pause anytime.</p>
			<div class="cycles__grid">
				<?php foreach ( $cycles as $c ) : ?>
					<div class="cycle">
						<h3 class="cycle__name"><?php echo esc_html( $c['name'] ); ?></h3>
						<p class="cycle__desc"><?php echo esc_html( $c['desc'] ); ?></p>
						<div class="cycle__price"><?php echo esc_html( $c['price'] ); ?></div>
						<a class="btn-primary" href="#">Subscribe →</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="missions">
		<div class="wrap">
			<h2 style="font-family:var(--condensed);font-size:40px;text-transform:uppercase;">Recent transmissions</h2>
			<div style="margin-top:24px;">
				<?php foreach ( $tx as $t ) : ?>
					<div class="mission">
						<div style="display:flex;gap:24px;flex-wrap:wrap;align-items:start;">
							<div class="mono" style="color:var(--rust-2);width:60px;"><?php echo esc_html( $t[0] ); ?></div>
							<div style="flex:1;min-width:240px;">
								<h3 style="font-family:var(--condensed);font-size:22px;text-transform:uppercase;"><?php echo esc_html( $t[1] ); ?></h3>
								<p style="color:var(--text-soft);font-size:13px;margin-top:6px;line-height:1.6;"><?php echo esc_html( $t[2] ); ?></p>
							</div>
							<a class="mono" href="#" style="color:var(--ember);font-size:11px;letter-spacing:.25em;text-transform:uppercase;">Read log →</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>
<?php get_footer();
