<?php
/**
 * Template Name: Redground Manifest
 * REDGROUND — OLYMPUS TERMINAL
 * page-manifest.php
 *
 * @package Redground
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<section class="rg-pagehead" aria-labelledby="rg-page-title">
    <div class="rg-container">
        <span class="rg-pagehead__crumb">// FILE: MANIFEST // SEC-04_CARGO_HOLD</span>
        <h1 id="rg-page-title" class="rg-pagehead__title">Active Cargo</h1>
        <p class="rg-pagehead__meta">STATUS: PRESSURIZED / TOTAL UNITS: 1,402 KG</p>
    </div>
</section>

<main id="main" class="rg-page rg-manifest-detailed" role="main">
    <div class="rg-container rg-page__inner">

        <div class="rg-page__intro">
            <p class="rg-page__lede">
                The current payload available for colonial distribution. Every batch listed below 
                has passed vacuum-seal integrity tests and roast-pod stabilization.
            </p>
        </div>

        <section class="rg-manifest-section">
            <header class="rg-manifest-header">
                <h2 class="rg-page__h2">// [01] STANDARD ISSUE PAYLOAD</h2>
                <span class="rg-status-tag">ACTIVE_ROTATION</span>
            </header>

            <div class="rg-cargo-grid">
                <article class="rg-cargo-item">
                    <div class="rg-cargo-item__meta">
                        <span class="mono-ui">UNIT_ID: RG-CR-01</span>
                        <span class="mono-ui">ORIGIN: THARSIS</span>
                    </div>
                    <h3 class="rg-cargo-item__title">Crater Dust</h3>
                    <div class="rg-cargo-item__specs">
                        <div class="rg-spec"><dt>Roast Level</dt><dd>Dark / Thermal 04</dd></div>
                        <div class="rg-spec"><dt>Flavor Profile</dt><dd>Smoke, Burnt Sugar, Iron Ore</dd></div>
                        <div class="rg-spec"><dt>Stability</dt><dd>High / 1.2 atm</dd></div>
                    </div>
                    <p class="rg-cargo-item__desc">A brutal, heavy-bodied roast engineered for late-night sector shifts. High caffeine retention.</p>
                </article>

                <article class="rg-cargo-item">
                    <div class="rg-cargo-item__meta">
                        <span class="mono-ui">UNIT_ID: RG-DM-02</span>
                        <span class="mono-ui">ORIGIN: OLYMPUS</span>
                    </div>
                    <h3 class="rg-cargo-item__title">Dome Light</h3>
                    <div class="rg-cargo-item__specs">
                        <div class="rg-spec"><dt>Roast Level</dt><dd>Medium / Thermal 02</dd></div>
                        <div class="rg-spec"><dt>Flavor Profile</dt><dd>Citrus, Solar Flare, Floral</dd></div>
                        <div class="rg-spec"><dt>Stability</dt><dd>Nominal / 1.0 atm</dd></div>
                    </div>
                    <p class="rg-cargo-item__desc">Bright and acidic. Best brewed during solar-sync cycles for maximum clarity.</p>
                </article>
            </div>
        </section>

        <hr class="rg-divider">

        <section class="rg-manifest-section rg-restricted">
            <header class="rg-manifest-header">
                <h2 class="rg-page__h2" style="color: var(--tharsis-gold);">// [02] RESTRICTED CARGO</h2>
                <span class="rg-status-tag rg-status-tag--warning">CLASSIFIED_BATCH</span>
            </header>

            <div class="rg-cargo-grid">
                <article class="rg-cargo-item rg-cargo-item--premium">
                    <div class="rg-cargo-item__meta">
                        <span class="mono-ui">UNIT_ID: RG-VINI-07</span>
                        <span class="mono-ui">ORIGIN: HELLAS_PLANITIA</span>
                    </div>
                    <h3 class="rg-cargo-item__title">Vini Reserve</h3>
                    <div class="rg-cargo-item__specs">
                        <div class="rg-spec"><dt>Roast Level</dt><dd>Light / Experimental</dd></div>
                        <div class="rg-spec"><dt>Flavor Profile</dt><dd>Tropical, Hyper-Acidic, Berry</dd></div>
                    </div>
                    <p class="rg-cargo-item__desc">A favorite of the Sector 7 elite. Limited yield. These beans were processed in sub-zero frost pockets.</p>
                    <div class="rg-cargo-item__alert">ACCESS RESTRICTED TO COLONY TIER 3</div>
                </article>
            </div>
        </section>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="rg-page__editor">
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>

    </div>
</main>

<?php get_footer(); ?>