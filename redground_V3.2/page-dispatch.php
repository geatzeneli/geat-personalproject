<?php
/**
 * Template Name: Redground Dispatch
 * page-dispatch.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

get_header();
?>

<section class="rg-pagehead">
    <div class="rg-container">
        <span class="rg-pagehead__crumb">// FILE: DISPATCH // ORBITAL_LOGISTICS</span>
        <h1 class="rg-pagehead__title">Terminal Logistics</h1>
        <p class="rg-pagehead__meta">SYSTEM: ACTIVE / UPLINK: NOMINAL</p>
    </div>
</section>

<main class="rg-page">
    <div class="rg-container rg-page__inner rg-dispatch-layout">
        
        <section class="rg-tracking">
            <h2 class="rg-page__h2">// Active Mission Tracking</h2>
            <div class="rg-tracking-ui">
                <div class="rg-progress-step rg-step--complete">
                    <span>01_ROASTING</span>
                    <div class="rg-dot"></div>
                </div>
                <div class="rg-progress-step rg-step--active">
                    <span>02_PACKAGING</span>
                    <div class="rg-dot"></div>
                </div>
                <div class="rg-progress-step">
                    <span>03_ORBITAL_TRANSIT</span>
                    <div class="rg-dot"></div>
                </div>
                <div class="rg-progress-step">
                    <span>04_DELIVERY</span>
                    <div class="rg-dot"></div>
                </div>
            </div>
            <p class="mono-ui" style="text-align: center; margin-top: 10px;">CONVOY OL-09: T-MINUS 14 HOURS TO LAUNCH</p>
        </section>

        <section class="rg-subscriptions">
            <h2 class="rg-page__h2">// Scheduled Dispatch Cycles</h2>
            <div class="rg-sub-card">
                <h3 class="mono-ui">Automatic Resupply</h3>
                <p>Never run out of caffeine in the dead of a dust storm. Our automated resupply cycle ensures 1kg of fresh roasted beans is dispatched to your habitat every 30 Sols.</p>
                <button class="rg-btn-tactical">INITIALIZE_CYCLE</button>
            </div>
        </section>

        <section class="rg-dispatch-news">
            <h2 class="rg-page__h2">// Dispatch Reports (The News)</h2>
            
            <?php 
            $news_query = new WP_Query(array('posts_per_page' => 3));
            if ($news_query->have_posts()) : while ($news_query->have_posts()) : $news_query->the_post(); 
            ?>
                <article class="rg-news-item">
                    <span class="mono-ui"><?php echo get_the_date(); ?> // RELAY_ID: <?php the_ID(); ?></span>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                </article>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </section>

    </div>
</main>

<?php get_footer(); ?>