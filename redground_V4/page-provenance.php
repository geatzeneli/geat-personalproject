<?php
/**
 * Template Name: Provenance
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();

$origins = array(
	array( 'code'=>'ETH-01','region'=>'Sidamo, Ethiopia','farm'=>'Coop. Worka Sakaro','altitude'=>'1,950m','process'=>'Washed','grower'=>'Tesfaye A.','x'=>62,'y'=>48 ),
	array( 'code'=>'GTM-01','region'=>'Antigua, Guatemala','farm'=>'Finca El Volcán','altitude'=>'1,650m','process'=>'Natural','grower'=>'Familia Rojas','x'=>26,'y'=>55 ),
	array( 'code'=>'PAN-01','region'=>'Boquete, Panama','farm'=>'Hacienda Esmeralda','altitude'=>'1,800m','process'=>'Washed','grower'=>'L. Peterson','x'=>30,'y'=>60 ),
	array( 'code'=>'BRA-01','region'=>'Cerrado, Brazil','farm'=>'Fazenda Três Marias','altitude'=>'1,150m','process'=>'Pulped Natural','grower'=>'M. Silva','x'=>38,'y'=>72 ),
	array( 'code'=>'IDN-01','region'=>'Sumatra, Indonesia','farm'=>'Lake Toba Coop.','altitude'=>'1,400m','process'=>'Wet-hulled','grower'=>'Coop · 84','x'=>78,'y'=>60 ),
	array( 'code'=>'COL-01','region'=>'Huila, Colombia','farm'=>'Finca La Esperanza','altitude'=>'1,750m','process'=>'Honey','grower'=>'C. Muñoz','x'=>32,'y'=>62 ),
);
$tx = array(
	array( '$5.80/lb','AVG PAID TO FARMER','3.2× the C-market floor' ),
	array( '100%','DIRECT-TRADE','No anonymous brokers' ),
	array( '6','SOURCING TRIPS / YR','Boots on actual soil' ),
	array( '0%','OFFSETS USED','We measure, then we cut' ),
);
?>
<main id="main">
	<section class="pagehead">
		<div class="wrap">
			<div class="pagehead__bar"><span class="code">// PRV · ORIGIN TELEMETRY</span><span class="line"></span><span>6 NODES TRACKED</span></div>
			<h1 class="pagehead__title">Provenance</h1>
			<p class="pagehead__sub">Every bean came from somewhere on Earth — and we know exactly where, who grew it, and what they were paid.</p>
		</div>
	</section>

	<section class="map-section">
		<div class="wrap">
			<div class="dossier__head" style="border:0;padding:0 0 16px;"><span>EARTH · LAUNCH SITES</span><span class="live">LIVE</span></div>
			<div class="map">
				<svg viewBox="0 0 200 100" preserveAspectRatio="none">
					<?php for ( $i = 0; $i <= 20; $i++ ) : ?>
						<line x1="<?php echo $i*10; ?>" y1="0" x2="<?php echo $i*10; ?>" y2="100" stroke="#3a2a20" stroke-width="0.1" />
					<?php endfor; ?>
					<?php for ( $i = 0; $i <= 10; $i++ ) : ?>
						<line x1="0" y1="<?php echo $i*10; ?>" x2="200" y2="<?php echo $i*10; ?>" stroke="#3a2a20" stroke-width="0.1" />
					<?php endfor; ?>
					<path d="M20,30 Q40,20 60,32 L70,55 Q50,70 30,60 Z" fill="#261d18" />
					<path d="M70,40 Q90,30 110,38 L115,80 Q90,85 75,70 Z" fill="#261d18" />
					<path d="M120,25 Q160,20 185,35 L180,60 Q150,55 125,50 Z" fill="#261d18" />
				</svg>
				<?php foreach ( $origins as $o ) : ?>
					<div class="map__node" style="left:<?php echo (int) $o['x']; ?>%;top:<?php echo (int) $o['y']; ?>%;">
						<div class="map__pulse"></div>
						<div class="map__label"><?php echo esc_html( $o['code'] . ' · ' . $o['region'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="farms">
		<div class="wrap">
			<div class="eyebrow">// MISSION LOGS</div>
			<h2 class="restricted__title" style="font-size:48px;margin-top:8px;">Field reports from each origin node</h2>
			<div class="farms__grid">
				<?php foreach ( $origins as $o ) : ?>
					<article class="farm">
						<div class="farm__id"><span class="code"><?php echo esc_html( $o['code'] ); ?></span><span class="alt"><?php echo esc_html( $o['altitude'] ); ?></span></div>
						<h3 class="farm__name"><?php echo esc_html( $o['farm'] ); ?></h3>
						<div class="farm__region"><?php echo esc_html( $o['region'] ); ?></div>
						<div class="farm__rows">
							<div><div class="k">Process</div><div class="v"><?php echo esc_html( $o['process'] ); ?></div></div>
							<div><div class="k">Grower</div><div class="v"><?php echo esc_html( $o['grower'] ); ?></div></div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="transparency">
		<div class="wrap">
			<div class="transparency__panel">
				<div class="dossier__head" style="border:0;padding:0 0 16px;"><span>TRX · TRANSPARENCY REPORT</span><span class="live">FY 2030</span></div>
				<h2 class="restricted__title" style="font-size:48px;">No fog. No PR.</h2>
				<div class="transparency__grid">
					<?php foreach ( $tx as $row ) : ?>
						<div class="transparency__cell">
							<div class="transparency__big"><?php echo esc_html( $row[0] ); ?></div>
							<div class="transparency__lab"><?php echo esc_html( $row[1] ); ?></div>
							<div class="transparency__sub"><?php echo esc_html( $row[2] ); ?></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer();
