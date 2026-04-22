<?php
/**
 * Front page — REDGROUND // Olympus Terminal
 * Maximalist single-scroll homepage with all colonial content blocks.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();

$slides = array(
	array( 'caption' => 'THARSIS-IV // PROCESSING FACILITY',  'word' => 'THARSIS' ),
	array( 'caption' => 'ROAST POD OL-R3 // ARMED CHAMBER',   'word' => 'OL·R3'  ),
	array( 'caption' => 'BED 07 // SOIL-CORRECTED CULTIVAR',  'word' => 'BED·07' ),
	array( 'caption' => 'CONVOY HEAVY-LIFT OL-09 // LAUNCH',  'word' => 'OL·09'  ),
	array( 'caption' => 'OLYMPUS BASIN // HABITAT 7-B',       'word' => '7-B'    ),
);
?>

<main id="main">

	<!-- ============== HERO ============== -->
	<section class="hero">
		<div class="wrap">
			<div class="hero__eyebrow eyebrow">// MANIFEST 0034.B — COFFEE COLLECTIVE</div>
			<h1 class="hero__title">Stolen <span class="accent">from Earth,</span><br />perfcted in<br /> the red dome.</h1>
			<p class="hero__lead">
				Hand-roasted in low-pressure pods at the Olympus Terminal. Sourced from soil-corrected beds in the Tharsis basin.
				Every batch is logged, sealed, and shipped with full colonial provenance.
			</p>

			<dl class="hero__meta">
				<div><dt>Origin</dt><dd>Tharsis-IV / Bed 07</dd></div>
				<div><dt>Roast Pod</dt><dd>OL-R3 // 1.2 atm</dd></div>
				<div><dt>Cycle</dt><dd>SOL 0112 // 16:05 MTC // M-YR 34</dd></div>
				<div><dt>Manifest #</dt><dd>RG-OLY-2026111</dd></div>
			</dl>
		</div>
	</section>

	<!-- ============== CAROUSEL / VISUAL ARCHIVE ============== -->
	<section class="carousel">
		<div class="wrap">
			<div class="carousel__head">
				<div>
					<div class="eyebrow">// Visual Archive · <?php echo count( $slides ); ?> FRAMES</div>
					<h2 class="carousel__title">Carousel Feed</h2>
				</div>
				<div class="carousel__sub">SCROLL ARCHIVE ←→</div>
			</div>

			<div class="carousel__viewport" data-carousel tabindex="0" aria-roledescription="carousel">
				<div class="carousel__track">
					<?php foreach ( $slides as $s ) : ?>
						<div class="carousel__slide" style="<?php echo esc_attr( redground_slide_styles( array_search( $s, $slides, true ) ) ); ?>">
							<div class="carousel__slide-art" aria-hidden="true"><?php echo esc_html( $s['word'] ); ?></div>
							<div class="carousel__slide-overlay">
								<span class="carousel__caption"><?php echo esc_html( $s['caption'] ); ?></span>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="carousel__nav prev"><button class="carousel__btn" data-carousel-prev aria-label="Previous frame">‹</button></div>
				<div class="carousel__nav next"><button class="carousel__btn" data-carousel-next aria-label="Next frame">›</button></div>

				<div class="carousel__slide-overlay" style="position:absolute;top:24px;right:32px;left:auto;bottom:auto;">
					<span class="carousel__counter" data-carousel-counter><b>FRAME 01</b> / <?php echo esc_html( str_pad( count( $slides ), 2, '0', STR_PAD_LEFT ) ); ?></span>
				</div>
			</div>
			<div class="carousel__dots" data-carousel-dots></div>
		</div>
	</section>

	<!-- ============== ORIGIN DISPATCH ============== -->
	<section class="origin">
		<div class="wrap">
			<div class="origin__grid">
				<div>
					<div class="eyebrow">// Origin Dispatch — File 001</div>
					<h2 class="origin__title">Founded cycle 0029 / Olympus Basin</h2>

					<div class="origin__body">
						<p>REDGROUND was founded in the long shadow of Olympus Mons by a crew of botanists, roasters, and soil engineers who refused to drink another sachet of freeze-dried colonial slurry.</p>
						<p>Cycle 0029. Habitat 7-B, sub-level two. Six volunteers, one stolen hydroponic rack, and a single contraband sack of Sidamo green beans smuggled up on the last Earth supply run. The first batch was roasted in a repurposed thermal regulator at 1.2 atm — barely enough pressure to hold the bean's volatile aromatics together. It tasted, by all surviving accounts, extraordinary.</p>
						<p>Today the Olympus Terminal operates four soil-corrected beds across the Tharsis basin, two low-pressure roast pods, and a full provenance ledger that follows every cherry from germination to cup. We do not ship to Earth. We do not franchise. We log, we roast, we dispatch.</p>
					</div>

					<ul class="origin__principles">
						<ol>
							<li><span class="num">01.</span>Soil before brand.</li>
							<li><span class="num">02.</span>Pressure is a flavor.</li>
							<li><span class="num">03.</span>Every batch is logged or it did not happen.</li>
							<li><span class="num">04.</span>Earth gets nothing until the colony is fed.</li>
						</ol>
					</ul>
				</div>

				<aside class="dossier">
					<div class="dossier__head"><span>// COLLECTIVE DOSSIER</span><span class="live">CLASSIFIED-OPEN</span></div>
					<ul class="dossier__rows">
						<li><span class="k">Established</span><span class="v">CYCLE 0029</span></li>
						<li><span class="k">HQ</span><span class="v">OLYMPUS TERM.</span></li>
						<li><span class="k">Beds</span><span class="v">04 ACTIVE</span></li>
						<li><span class="k">Roast pods</span><span class="v">02 / OL-R</span></li>
						<li><span class="k">Crew</span><span class="v">17 LOGGED</span></li>
						<li><span class="k">Earth imports</span><span class="v">00 SINCE 0031</span></li>
						<li><span class="k">Output</span><span class="v">~22 KG / CYCLE</span></li>
						<li><span class="k">Status</span><span class="v">OPERATIONAL</span></li>
					</ul>
				</aside>
			</div>
		</div>
	</section>

	<!-- ============== ROAST LOG ============== -->
	<section class="roastlog">
		<div class="wrap">
			<div class="roastlog__head">
				<div>
					<div class="eyebrow">// Roast Log — Earth vs. Mars</div>
					<h2 class="roastlog__title">Field<br />assessment<br />/ OL-R3</h2>
				</div>
				<p class="roastlog__intro">A technical comparison logged by the Olympus tasting panel. No marketing language. No diplomacy. The numbers — and the flavor — speak for themselves.</p>
			</div>

			<div class="roastlog__compare">
				<div class="sample --earth">
					<div class="sample__tag">SAMPLE A</div>
					<h3 class="sample__title">Earth Coffee</h3>
					<div class="sample__sub">SEA-LEVEL ROAST / 1.00 atm</div>
					<ul class="sample__rows">
						<li><span class="k">Pressure</span><span class="v">1.00 atm</span></li>
						<li><span class="k">Roast curve</span><span class="v">Standard / forgiving</span></li>
						<li><span class="k">Crema</span><span class="v">Predictable</span></li>
						<li><span class="k">Provenance</span><span class="v">Often vague</span></li>
						<li><span class="k">Carbon cost</span><span class="v">Container ships, trucks, dust</span></li>
						<li><span class="k">Verdict</span><span class="v">Comfortable. Loud. Old-world.</span></li>
					</ul>
					<div class="sample__verdict">"Tastes like a planet that has stopped paying attention to itself." — OL tasting panel, cycle 0044.</div>
				</div>

				<div class="versus">VS</div>

				<div class="sample --mars">
					<div class="sample__tag">SAMPLE B</div>
					<h3 class="sample__title">REDGROUND Mars Roast</h3>
					<div class="sample__sub">LOW-PRESSURE POD / 1.18 atm</div>
					<ul class="sample__rows">
						<li><span class="k">Pressure</span><span class="v">1.18 atm (controlled)</span></li>
						<li><span class="k">Roast curve</span><span class="v">Steeper, sharper, deliberate</span></li>
						<li><span class="k">Crema</span><span class="v">Denser — low-G bubble retention</span></li>
						<li><span class="k">Provenance</span><span class="v">Logged bean → cup, every time</span></li>
						<li><span class="k">Carbon cost</span><span class="v">Zero off-world transit</span></li>
						<li><span class="k">Verdict</span><span class="v">Bright. Mineral. Frontier.</span></li>
					</ul>
					<div class="sample__verdict">"Tastes like the soil decided to introduce itself first." — OL tasting panel, cycle 0044.</div>
				</div>
			</div>

			<div class="roastlog__sig">
				<span>// LOGGED BY: OL-TASTE-04</span>
				<span>// CYCLE: 2026111</span>
				<span>// CLASSIFICATION: PUBLIC DISPATCH</span>
			</div>
		</div>
	</section>

	<!-- ============== DISPATCH (newsletter) ============== -->
	<section class="dispatch">
		<div class="wrap">
			<div class="dispatch__grid">
				<div>
					<div class="eyebrow">// Dispatch — Open Channel</div>
					<h2 class="dispatch__title">Transmission queue / OL-TX</h2>
					<p class="dispatch__lead">Subscribe to the colonial wire. New roast logs, supply convoy ETAs, and cycle-end field notes — relayed every 14 sols straight from Bay 07.</p>
					<ul class="dispatch__list">
						<li><span class="num">01</span>Roast log updates</li>
						<li><span class="num">02</span>Convoy &amp; resupply windows</li>
						<li><span class="num">03</span>Field cupping notes</li>
					</ul>
				</div>

				<form class="dispatch__form" method="post" action="#" onsubmit="event.preventDefault();this.querySelector('button').textContent='// CHANNEL OPEN ✓';">
					<label for="rg-callsign">Callsign</label>
					<input id="rg-callsign" type="text" placeholder="OL-CIV-0001" />
					<label for="rg-email">Relay address</label>
					<input id="rg-email" type="email" placeholder="you@colony.mars" required />
					<button type="submit">Open channel →</button>
					<p class="foot__p" style="margin-top:14px;font-size:11px;">No spam. Decommission channel anytime.</p>
				</form>
			</div>
		</div>
	</section>

	<!-- ============== ACTIVE MANIFEST (recent posts) ============== -->
	<section class="manifest-feed">
		<div class="wrap">
			<div class="manifest-feed__head">
				<div>
					<div class="eyebrow">// Active Manifest</div>
					<h2 class="manifest-feed__title">Specimen log</h2>
				</div>
				<?php $count = wp_count_posts()->publish; ?>
				<span class="manifest-feed__count"><?php echo esc_html( $count ); ?> UNIT<?php echo (int) $count === 1 ? '' : 'S'; ?> LOGGED</span>
			</div>

			<?php
			$recent = new WP_Query( array( 'posts_per_page' => 6, 'post_status' => 'publish' ) );
			if ( $recent->have_posts() ) :
				$n = 1;
				while ( $recent->have_posts() ) : $recent->the_post();
					$id_code = 'RG-OL-' . strtoupper( substr( md5( get_the_ID() ), 0, 4 ) );
					$cat = '';
					$cats = get_the_category();
					if ( ! empty( $cats ) ) $cat = $cats[0]->name; else $cat = 'UNCATEGORIZED';
			?>
				<article class="specimen">
					<div>
						<div class="specimen__id">SPECIMEN <?php echo esc_html( str_pad( $n, 3, '0', STR_PAD_LEFT ) ); ?></div>
						<div class="specimen__id"><?php echo esc_html( $id_code ); ?></div>
						<div class="specimen__cat">// <?php echo esc_html( strtoupper( $cat ) ); ?></div>
					</div>
					<div>
						<h3 class="specimen__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="specimen__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
					</div>
					<div class="specimen__meta">
						<?php echo esc_html( $id_code ); ?><br /><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?>
					</div>
				</article>
			<?php
				$n++;
				endwhile;
				wp_reset_postdata();
			else :
			?>
				<article class="specimen">
					<div>
						<div class="specimen__id">SPECIMEN 001</div>
						<div class="specimen__id">RG-OL-C4CA</div>
						<div class="specimen__cat">// UNCATEGORIZED</div>
					</div>
					<div>
						<h3 class="specimen__title">Hello world!</h3>
						<p class="specimen__excerpt">Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>
					</div>
					<div class="specimen__meta">RG-OL-C4CA<br />2024.12.16</div>
				</article>
			<?php endif; ?>
		</div>
	</section>

	<!-- ============== TELEMETRY STRIP ============== -->
	<section class="telemetry">
		<div class="wrap">
			<div class="telemetry__grid">
				<div class="telem">
					<div class="telem__head"><span>// ATMOSPHERIC PRESSURE</span><span class="live">◆ LIVE</span></div>
					<div class="telem__big">619.36 <span style="font-size:24px;color:var(--muted);">Pa</span></div>
					<div class="telem__sub">// surface ambient</div>
					<ul class="telem__rows">
						<li><span class="k">Sensor</span><span>OL-MET-03</span></li>
						<li><span class="k">Sample</span><span>30s ROLL</span></li>
						<li><span class="k">Status</span><span>NOMINAL</span></li>
					</ul>
				</div>
				<div class="telem">
					<div class="telem__head"><span>// ROAST POD OL-R3</span><span class="live">ARMED</span></div>
					<div class="telem__big">218<span style="font-size:24px;color:var(--muted);">°C</span></div>
					<div class="telem__sub">// chamber temp</div>
					<ul class="telem__rows">
						<li><span class="k">Pressure</span><span>1.18 atm</span></li>
						<li><span class="k">Batch</span><span>0427-A</span></li>
						<li><span class="k">Yield</span><span>4.8 KG</span></li>
					</ul>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer();
