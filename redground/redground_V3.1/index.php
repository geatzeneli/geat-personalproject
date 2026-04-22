<?php
/**
 * REDGROUND — OLYMPUS TERMINAL
 * index.php
 *
 * Primary template — renders the hero manifest, the coffee product
 * grid via The Loop, and the atmospheric telemetry sidebar.
 *
 * @package Redground
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// Pull live atmospheric reading for the sidebar.
$rg_atm = redground_atmospheric_pressure();
?>

<!-- ============================================================
     HERO — Olympus Manifest opening
     ============================================================ -->
<section class="rg-hero" aria-labelledby="rg-hero-title">
    <div class="rg-container rg-hero__inner">

        <span class="rg-hero__eyebrow">// MANIFEST 0034.B — COFFEE COLLECTIVE</span>

        <h1 id="rg-hero-title" class="rg-hero__title">
            Coffee, <em>cultivated</em><br> beneath the<br>red dome.
        </h1>

        <p class="rg-hero__lede">
            Hand-roasted in low-pressure pods at the Olympus Terminal. Sourced from
            soil-corrected beds in the Tharsis basin. Every batch is logged, sealed,
            and shipped with full colonial provenance.
        </p>

        <dl class="rg-hero__meta" aria-label="<?php esc_attr_e( 'Manifest metadata', 'redground' ); ?>">
            <div>
                <dt>Origin</dt>
                <dd>Tharsis-IV / Bed 07</dd>
            </div>
            <div>
                <dt>Roast Pod</dt>
                <dd>OL-R3 // 1.2 atm</dd>
            </div>
            <div>
                <dt>Cycle</dt>
                <dd><?php echo esc_html( redground_colonial_timestamp() ); ?></dd>
            </div>
            <div>
                <dt>Manifest #</dt>
                <dd>RG-OLY-<?php echo esc_html( gmdate( 'Yz' ) ); ?></dd>
            </div>
        </dl>
    </div>
</section>

<!-- ============================================================
     VISUAL ARCHIVE — Hard-coded image slider
     Edit images in: template-parts/slider.php ($rg_slides array)
     ============================================================ -->
<?php get_template_part( 'template-parts/slider' ); ?>

<!-- ============================================================
     ABOUT — Origin Dispatch (founding story)
     ============================================================ -->
<section class="rg-about" aria-labelledby="rg-about-title">
    <div class="rg-container">

        <header class="rg-section-head">
            <h2 id="rg-about-title" class="rg-section-head__title">// Origin Dispatch — File 001</h2>
            <span class="rg-section-head__meta">FOUNDED CYCLE 0029 / OLYMPUS BASIN</span>
        </header>

        <div class="rg-about__grid">

            <article class="rg-about__story">
                <p class="rg-about__lede">
                    REDGROUND was founded in the long shadow of Olympus Mons by a
                    crew of botanists, roasters, and soil engineers who refused to
                    drink another sachet of <em>freeze-dried colonial slurry</em>.
                </p>

                <p>
                    Cycle 0029. Habitat 7-B, sub-level two. Six volunteers,
                    one stolen hydroponic rack, and a single contraband sack
                    of Sidamo green beans smuggled up on the last Earth supply
                    run. The first batch was roasted in a repurposed thermal
                    regulator at 1.2&nbsp;atm — barely enough pressure to hold
                    the bean's volatile aromatics together. It tasted, by all
                    surviving accounts, <strong>extraordinary</strong>.
                </p>

                <p>
                    Today the Olympus Terminal operates four soil-corrected beds
                    across the Tharsis basin, two low-pressure roast pods, and a
                    full provenance ledger that follows every cherry from
                    germination to cup. We do not ship to Earth. We do not
                    franchise. We log, we roast, we dispatch.
                </p>

                <ul class="rg-about__principles">
                    <li><span>01.</span> Soil before brand.</li>
                    <li><span>02.</span> Pressure is a flavor.</li>
                    <li><span>03.</span> Every batch is logged or it did not happen.</li>
                    <li><span>04.</span> Earth gets nothing until the colony is fed.</li>
                </ul>
            </article>

            <aside class="rg-about__panel rg-panel" aria-label="<?php esc_attr_e( 'Collective dossier', 'redground' ); ?>">
                <div class="rg-panel__head">
                    <span>// COLLECTIVE DOSSIER</span>
                    <span>CLASSIFIED-OPEN</span>
                </div>

                <div class="rg-readout">
                    <div class="rg-readout__row"><span>ESTABLISHED</span><span>CYCLE 0029</span></div>
                    <div class="rg-readout__row"><span>HQ</span><span>OLYMPUS TERM.</span></div>
                    <div class="rg-readout__row"><span>BEDS</span><span>04 ACTIVE</span></div>
                    <div class="rg-readout__row"><span>ROAST PODS</span><span>02 / OL-R</span></div>
                    <div class="rg-readout__row"><span>CREW</span><span>17 LOGGED</span></div>
                    <div class="rg-readout__row"><span>EARTH IMPORTS</span><span>00 SINCE 0031</span></div>
                    <div class="rg-readout__row"><span>OUTPUT</span><span>~22 KG / CYCLE</span></div>
                    <div class="rg-readout__row"><span>STATUS</span><span>OPERATIONAL</span></div>
                </div>
            </aside>

        </div>
    </div>
</section>

<!-- ============================================================
     ROAST LOG — Earth vs. Mars (we roast Earth coffee, literally)
     ============================================================ -->
<section class="rg-roastlog" aria-labelledby="rg-roastlog-title">
    <div class="rg-container">

        <header class="rg-section-head">
            <h2 id="rg-roastlog-title" class="rg-section-head__title">// Roast Log — Earth vs. Mars</h2>
            <span class="rg-section-head__meta">FIELD ASSESSMENT / OL-R3</span>
        </header>

        <p class="rg-roastlog__intro">
            A technical comparison logged by the Olympus tasting panel.
            No marketing language. No diplomacy. The numbers — and the
            <em>flavor</em> — speak for themselves.
        </p>

        <div class="rg-roastlog__grid">

            <article class="rg-roastlog__col rg-roastlog__col--earth">
                <header class="rg-roastlog__head">
                    <span class="rg-roastlog__badge">SAMPLE A</span>
                    <h3>Earth Coffee</h3>
                    <span class="rg-roastlog__sub">SEA-LEVEL ROAST / 1.00 atm</span>
                </header>

                <dl class="rg-roastlog__stats">
                    <div><dt>Pressure</dt><dd>1.00 atm</dd></div>
                    <div><dt>Roast Curve</dt><dd>Standard / forgiving</dd></div>
                    <div><dt>Crema</dt><dd>Predictable</dd></div>
                    <div><dt>Provenance</dt><dd>Often vague</dd></div>
                    <div><dt>Carbon Cost</dt><dd>Container ships, trucks, dust</dd></div>
                    <div><dt>Verdict</dt><dd>Comfortable. Loud. Old-world.</dd></div>
                </dl>

                <p class="rg-roastlog__note">
                    Field note: <em>"Tastes like a planet that has stopped paying
                    attention to itself."</em> — OL tasting panel, cycle 0044.
                </p>
            </article>

            <div class="rg-roastlog__divider" aria-hidden="true">
                <span>VS</span>
            </div>

            <article class="rg-roastlog__col rg-roastlog__col--mars">
                <header class="rg-roastlog__head">
                    <span class="rg-roastlog__badge rg-roastlog__badge--mars">SAMPLE B</span>
                    <h3>REDGROUND Mars Roast</h3>
                    <span class="rg-roastlog__sub">LOW-PRESSURE POD / 1.18 atm</span>
                </header>

                <dl class="rg-roastlog__stats">
                    <div><dt>Pressure</dt><dd>1.18 atm (controlled)</dd></div>
                    <div><dt>Roast Curve</dt><dd>Steeper, sharper, deliberate</dd></div>
                    <div><dt>Crema</dt><dd>Denser — low-G bubble retention</dd></div>
                    <div><dt>Provenance</dt><dd>Logged bean → cup, every time</dd></div>
                    <div><dt>Carbon Cost</dt><dd>Zero off-world transit</dd></div>
                    <div><dt>Verdict</dt><dd>Bright. Mineral. Frontier.</dd></div>
                </dl>

                <p class="rg-roastlog__note">
                    Field note: <em>"Tastes like the soil decided to introduce
                    itself first."</em> — OL tasting panel, cycle 0044.
                </p>
            </article>

        </div>

        <footer class="rg-roastlog__foot">
            <span>// LOGGED BY: OL-TASTE-04</span>
            <span>// CYCLE: <?php echo esc_html( gmdate( 'Yz' ) ); ?></span>
            <span>// CLASSIFICATION: PUBLIC DISPATCH</span>
        </footer>
    </div>
</section>



<!-- ============================================================
     MAIN — Manifest grid + Telemetry sidebar
     ============================================================ -->
<main id="main" class="rg-main" role="main">
    <div class="rg-container rg-layout">

        <!-- ===== Coffee manifest (The Loop) ===== -->
        <section class="rg-manifest" aria-labelledby="rg-manifest-head">

            <header class="rg-section-head">
                <h2 id="rg-manifest-head" class="rg-section-head__title">// Active Manifest</h2>
                <span class="rg-section-head__meta">
                    <?php
                    global $wp_query;
                    printf(
                        /* translators: %d: number of items */
                        esc_html__( '%d UNITS LOGGED', 'redground' ),
                        (int) $wp_query->found_posts
                    );
                    ?>
                </span>
            </header>

            <?php if ( have_posts() ) : ?>

                <div class="rg-grid">
                <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'rg-card' ); ?>>

                        <!-- Featured image OR generated specimen graphic -->
                        <figure class="rg-card__thumb">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'redground-card', array(
                                    'alt' => esc_attr( get_the_title() ),
                                    'loading' => 'lazy',
                                ) ); ?>
                            <?php else : ?>
                                <div class="rg-card__specimen" aria-hidden="true">
                                    <span>SPECIMEN <?php echo esc_html( str_pad( get_the_ID(), 3, '0', STR_PAD_LEFT ) ); ?></span>
                                    <span><?php echo esc_html( redground_post_sku( get_the_ID() ) ); ?></span>
                                </div>
                            <?php endif; ?>
                        </figure>

                        <!-- Category — surfaced as a technical label -->
                        <span class="rg-card__cat">
                            // <?php echo esc_html( redground_post_label( get_the_ID() ) ); ?>
                        </span>

                        <h3 class="rg-card__title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                        <div class="rg-card__excerpt">
                            <?php
                            // Use excerpt if present, otherwise auto-trim content.
                            if ( has_excerpt() ) {
                                the_excerpt();
                            } else {
                                echo '<p>' . esc_html( wp_trim_words( wp_strip_all_tags( get_the_content() ), 28, '…' ) ) . '</p>';
                            }
                            ?>
                        </div>

                        <footer class="rg-card__foot">
                            <span class="rg-card__sku"><?php echo esc_html( redground_post_sku( get_the_ID() ) ); ?></span>
                            <span><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></span>
                        </footer>
                    </article>

                <?php endwhile; ?>
                </div>

                <!-- Numbered pagination, styled for the terminal -->
                <nav class="rg-pagination" aria-label="<?php esc_attr_e( 'Manifest pages', 'redground' ); ?>">
                    <?php
                    echo paginate_links( array(
                        'prev_text' => '◀ PREV',
                        'next_text' => 'NEXT ▶',
                        'type'      => 'plain',
                    ) );
                    ?>
                </nav>

            <?php else : ?>

                <div class="rg-panel">
                    <div class="rg-panel__head">
                        <span><?php esc_html_e( 'NO MANIFEST ENTRIES', 'redground' ); ?></span>
                        <span>--</span>
                    </div>
                    <p><?php esc_html_e( 'No coffee batches have been logged in this cycle. Check back after the next roast pod completes its low-pressure run.', 'redground' ); ?></p>
                </div>

            <?php endif; ?>

        </section>

        <!-- ===== Sidebar: Atmospheric Telemetry ===== -->
        <aside class="rg-sidebar" aria-label="<?php esc_attr_e( 'Atmospheric telemetry', 'redground' ); ?>">

            <!-- Live (simulated) Martian atmospheric pressure -->
            <section class="rg-panel">
                <div class="rg-panel__head">
                    <span>// ATMOSPHERIC PRESSURE</span>
                    <span><?php echo esc_html( $rg_atm['trend'] ); ?> LIVE</span>
                </div>

                <div class="rg-readout__big">
                    <?php echo esc_html( number_format( $rg_atm['pressure'], 2 ) ); ?>
                </div>
                <div class="rg-readout__unit">
                    <?php echo esc_html( $rg_atm['unit'] ); ?> // surface ambient
                </div>

                <div class="rg-bar" role="progressbar"
                     aria-valuemin="0" aria-valuemax="100"
                     aria-valuenow="<?php echo esc_attr( $rg_atm['percent'] ); ?>">
                    <div class="rg-bar__fill" style="width: <?php echo esc_attr( $rg_atm['percent'] ); ?>%;"></div>
                </div>

                <div class="rg-readout" style="margin-top: 20px;">
                    <div class="rg-readout__row"><span>SENSOR</span><span>OL-MET-03</span></div>
                    <div class="rg-readout__row"><span>SAMPLE</span><span>30s ROLL</span></div>
                    <div class="rg-readout__row"><span>STATUS</span><span>NOMINAL</span></div>
                </div>
            </section>

            <!-- Roast pod telemetry -->
            <section class="rg-panel">
                <div class="rg-panel__head">
                    <span>// ROAST POD OL-R3</span>
                    <span>ARMED</span>
                </div>
                <div class="rg-readout">
                    <div class="rg-readout__row"><span>CHAMBER</span><span>218°C</span></div>
                    <div class="rg-readout__row"><span>PRESSURE</span><span>1.18 atm</span></div>
                    <div class="rg-readout__row"><span>BATCH</span><span>0427-A</span></div>
                    <div class="rg-readout__row"><span>YIELD</span><span>4.8 KG</span></div>
                </div>
            </section>

            <!-- Allow admins to drop additional widgets in here -->
            <?php if ( is_active_sidebar( 'olympus-telemetry' ) ) : ?>
                <?php dynamic_sidebar( 'olympus-telemetry' ); ?>
            <?php endif; ?>

        </aside>

    </div>
</main>

<?php
get_footer();
