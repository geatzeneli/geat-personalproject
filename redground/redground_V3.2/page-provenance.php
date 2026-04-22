<?php
/**
 * Template Name: Redground Provenance
 * page-provenance.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<section class="rg-pagehead">
    <div class="rg-container">
        <span class="rg-pagehead__crumb">// FILE: PROVENANCE // TERRA_STATION_TELEMETRY</span>
        <h1 class="rg-pagehead__title">Origin & Ethics</h1>
        <p class="rg-pagehead__meta">LOGGING: SEED TO SOIL TO SHIP</p>
    </div>
</section>

<main class="rg-page">
    <div class="rg-container rg-page__inner">
        
        <div class="rg-provenance-map-placeholder">
            <h2 class="rg-page__h2">// Launch Site Telemetry</h2>
            <div class="rg-map-ui">
                <div class="rg-map-overlay">
                    <div class="rg-coordinate">SITE_01: Ethiopia (Latitude: 9.01, Longitude: 38.74)</div>
                    <div class="rg-coordinate">SITE_02: Colombia (Latitude: 4.57, Longitude: -74.07)</div>
                </div>
            </div>
        </div>

        <section class="rg-mission-logs">
            <h2 class="rg-page__h2">// Mission Logs</h2>
            
            <article class="rg-log-entry">
                <header class="rg-log-entry__head">
                    <span class="mono-ui">SOL 142 // LOG ENTRY 009</span>
                    <h3>The Basaltic Experiment</h3>
                </header>
                <div class="rg-log-entry__body">
                    <p>We attempted to plant Ethiopian heirloom seeds in raw Tharsis regolith. The iron content was overwhelming, but by cycle 12, the mutation stabilized. The resulting bean is smaller, denser, and carries a metallic sweetness unique to this sector.</p>
                </div>
            </article>

            <article class="rg-log-entry">
                <header class="rg-log-entry__head">
                    <span class="mono-ui">SOL 156 // LOG ENTRY 012</span>
                    <h3>Transparency & Yield</h3>
                </header>
                <table class="rg-transparency-table">
                    <thead>
                        <tr>
                            <th>Metric</th>
                            <th>Value</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Farmer Equity</td><td>$5.50/lb</td><td>Direct Trade / No Middlemen</td></tr>
                        <tr><td>Transit Carbon</td><td>Net Zero</td><td>Orbital Solar Cargo</td></tr>
                        <tr><td>Ethics Status</td><td>Verified</td><td>Olympus Oversight</td></tr>
                    </tbody>
                </table>
            </article>
        </section>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>