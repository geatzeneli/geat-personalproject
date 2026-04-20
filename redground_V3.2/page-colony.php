<?php
/**
 * Template Name: Redground Colony
 * page-colony.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<section class="rg-pagehead">
    <div class="rg-container">
        <span class="rg-pagehead__crumb">// FILE: COLONY // SOCIAL_INFRASTRUCTURE</span>
        <h1 class="rg-pagehead__title">The Redground Legion</h1>
        <p class="rg-pagehead__meta">CITIZENS: 1,422 // LOYALTY_STATUS: ENFORCED</p>
    </div>
</section>

<main class="rg-page">
    <div class="rg-container rg-page__inner">
        
        <div class="rg-colony-grid">
            <section class="rg-colony-main">
                <h2 class="rg-page__h2">// Featured Colonists</h2>
                <div class="rg-citizen-gallery">
                    <div class="rg-citizen-card">
                        <div class="rg-avatar-placeholder"></div>
                        <span class="mono-ui">OPERATOR_042</span>
                        <p>"The only thing keeping me sane in Sector 4 is the Crater Dust espresso."</p>
                    </div>
                </div>

                <h2 class="rg-page__h2" style="margin-top: 50px;">// Survival Manual: Brewing</h2>
                <div class="rg-guide-manual">
                    <article class="rg-manual-entry">
                        <h3>01. The Low-Pressure Aeropress</h3>
                        <p>When atmospheric pressure drops below 1.1 atm, traditional drip brewing fails. Follow these steps for high-altitude extraction...</p>
                    </article>
                    <article class="rg-manual-entry">
                        <h3>02. Water Filtration in Sector 7</h3>
                        <p>Ice-melt must be triple-filtered to remove basaltic particulates before it touches the beans.</p>
                    </article>
                </div>
            </section>

            <aside class="rg-colony-sidebar">
                <div class="rg-loyalty-panel">
                    <h3 class="mono-ui">JOIN THE LEGION</h3>
                    <div class="rg-tier">
                        <span class="tier-label">RANK: RECRUIT</span>
                        <p>5% off all resupply orders.</p>
                    </div>
                    <div class="rg-tier active">
                        <span class="tier-label">RANK: VETERAN</span>
                        <p>Free orbital shipping + restricted cargo access.</p>
                    </div>
                    <button class="rg-btn-tactical" style="width: 100%;">ENLIST_NOW</button>
                </div>

                <div class="rg-panel" style="margin-top: 20px;">
                    <div class="rg-panel__head"><span>// UPCOMING_EVENTS</span></div>
                    <ul class="rg-event-list">
                        <li><span>SOL 180</span> - Tharsis Basin Pop-up</li>
                        <li><span>SOL 192</span> - Roasting Workshop</li>
                    </ul>
                </div>
            </aside>
        </div>

    </div>
</main>

<?php get_footer(); ?>