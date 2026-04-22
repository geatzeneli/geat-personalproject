<?php
/**
 * Template Name: Colony
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();

$colonists = array(
	array( '@maya.brews','Dust Storm pulled like syrup. Best espresso I\'ve made all year.','ENG-II' ),
	array( '@kofi_makes','Phobos Reserve as a V60 — actual peach skin in the cup. Wild.','PILOT' ),
	array( '@nora.cafe','Subscribed to the Crew Pack. My morning is fixed.','MED-OFC' ),
	array( '@theo.j','Olympus Black is the only thing that gets me through 6am calls.','COMMS' ),
);
$protocols = array(
	array( 'BRW-01','V60 — Survival Pour','15g / 250g','3:00','Medium-fine','Default protocol. Reliable in low gravity, low patience.' ),
	array( 'BRW-02','Espresso — Heat Shield','18g in / 38g out','28s','Fine','For when re-entry is happening at 6am.' ),
	array( 'BRW-03','AeroPress — Recycled Air','16g / 220g','2:30','Medium','One device, zero waste, full extraction.' ),
	array( 'BRW-04','Cold Brew — Cryo Reserve','100g / 1L','16h','Coarse','Brew once, drink for a week of EVAs.' ),
);
$events = array(
	array( 'MAY 04','Pop-up · Brooklyn','Greenpoint Terminal','PUBLIC' ),
	array( 'MAY 18','Cupping Lab · LA','Arts District HQ','RSVP' ),
	array( 'JUN 02','Roast Day Open House','Olympus Roastery','MEMBERS' ),
);
$tiers = array(
	array( 'RECRUIT','Free',array('10% off first order','Field dispatches'),false ),
	array( 'CREW','$8/mo',array('15% off everything','Early limited drops','Members-only events'),true ),
	array( 'COMMANDER','$22/mo',array('20% off + free shipping','Restricted cargo access','Quarterly mystery microlot'),false ),
);
?>
<main id="main">
	<section class="pagehead">
		<div class="wrap">
			<div class="pagehead__bar"><span class="code">// CLN · COLONIAL NETWORK</span><span class="line"></span><span>2,847 COLONISTS</span></div>
			<h1 class="pagehead__title">Colony</h1>
			<p class="pagehead__sub">The people drinking this stuff. The protocols they use. The events that bring us together.</p>
		</div>
	</section>

	<section class="colonists">
		<div class="wrap">
			<h2 style="font-family:var(--condensed);font-size:48px;text-transform:uppercase;">Featured colonists</h2>
			<div class="colonists__grid">
				<?php foreach ( $colonists as $c ) : ?>
					<div class="colonist">
						<div class="colonist__head">
							<span class="colonist__handle"><?php echo esc_html( $c[0] ); ?></span>
							<span class="colonist__rank"><?php echo esc_html( $c[2] ); ?></span>
						</div>
						<p class="colonist__quote">"<?php echo esc_html( $c[1] ); ?>"</p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="protocols">
		<div class="wrap">
			<div class="eyebrow">// brewing protocols · SURVIVAL MANUAL</div>
			<h2 style="font-family:var(--condensed);font-size:48px;text-transform:uppercase;margin-top:8px;">How to survive on Mars with great coffee</h2>
			<div class="protocols__grid">
				<?php foreach ( $protocols as $p ) : ?>
					<div class="protocol">
						<div class="protocol__head"><span class="protocol__code"><?php echo esc_html( $p[0] ); ?></span><span class="protocol__time"><?php echo esc_html( $p[3] ); ?></span></div>
						<h3 class="protocol__name"><?php echo esc_html( $p[1] ); ?></h3>
						<p class="protocol__desc"><?php echo esc_html( $p[5] ); ?></p>
						<div class="protocol__rows">
							<div><div class="k" style="color:var(--muted);letter-spacing:.2em;font-size:9px;text-transform:uppercase;">Ratio</div><div><?php echo esc_html( $p[2] ); ?></div></div>
							<div><div class="k" style="color:var(--muted);letter-spacing:.2em;font-size:9px;text-transform:uppercase;">Grind</div><div><?php echo esc_html( $p[4] ); ?></div></div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="events">
		<div class="wrap">
			<h2 style="font-family:var(--condensed);font-size:40px;text-transform:uppercase;">Upcoming gatherings</h2>
			<div style="margin-top:24px;">
				<?php foreach ( $events as $e ) : ?>
					<div class="event">
						<div class="event__date"><?php echo esc_html( $e[0] ); ?></div>
						<div>
							<div class="event__name"><?php echo esc_html( $e[1] ); ?></div>
							<div class="event__venue"><?php echo esc_html( $e[2] ); ?></div>
						</div>
						<span class="event__tag"><?php echo esc_html( $e[3] ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="tiers">
		<div class="wrap">
			<div class="eyebrow">// join the colony</div>
			<h2 style="font-family:var(--condensed);font-size:48px;text-transform:uppercase;margin-top:8px;">Membership tiers</h2>
			<div class="tiers__grid">
				<?php foreach ( $tiers as $t ) : ?>
					<div class="tier <?php echo $t[3] ? '--featured' : ''; ?>">
						<div class="tier__rank"><?php echo esc_html( $t[0] ); ?></div>
						<div class="tier__price"><?php echo esc_html( $t[1] ); ?></div>
						<ul class="tier__perks">
							<?php foreach ( $t[2] as $perk ) : ?>
								<li><?php echo esc_html( $perk ); ?></li>
							<?php endforeach; ?>
						</ul>
						<a class="btn-primary" href="#">Enlist →</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>
<?php get_footer();
