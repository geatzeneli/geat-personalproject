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
