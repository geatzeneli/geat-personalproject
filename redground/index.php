<?php
/**
 * REDGROUND — OLYMPUS TERMINAL
 * Main Index Template
 *
 * Uses the core structure defined in style.css:
 * site-main, main-inner, content-panel, sidebar-panel,
 * post-grid, post-card, sidebar-unit, and related classes.
 */

get_header();

$archive_query = new WP_Query(array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 4,
    'no_found_rows'  => true,
));

$slider_query = new WP_Query(array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 5,
    'no_found_rows'  => true,
));
?>

<main id="primary" class="site-main">
    <div class="main-inner">

        <section class="content-panel">
            <h2 class="archive-heading">Coffee Archive / Transmission Feed</h2>

            <p class="post-excerpt" style="max-width: 64rem;">
                A frontier ledger of roast profiles, dispatch notes, and colony-grade coffee intelligence from the Redground surface network.
            </p>

            <div class="post-divider" style="margin: 1rem 0 1.4rem;"></div>

            <!-- FEATURED SLIDER / REEL -->
            <section aria-label="Featured transmissions" style="margin-bottom: 2rem;">
                <div id="rg-featured-reel" style="position: relative; min-height: 420px;">
                    <?php if ($slider_query->have_posts()) : ?>
                        <?php $slide_index = 0; ?>
                        <?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
                            <?php
                            $slide_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                            $cats = get_the_category();
                            $label = !empty($cats) ? $cats[0]->name : 'UNCLASSIFIED';
                            ?>
                            <article
                                class="post-card rg-featured-slide"
                                style="position: absolute; inset: 0; opacity: <?php echo $slide_index === 0 ? '1' : '0'; ?>; transition: opacity 0.7s ease;"
                                data-slide="<?php echo esc_attr($slide_index); ?>"
                            >
                                <div class="post-card-inner" style="display: grid; gap: 1rem; align-content: start; min-height: 420px;">
                                    <div class="post-meta">
                                        <span class="category-label"><?php echo esc_html($label); ?></span>
                                        <span>FEATURED TRANSMISSION</span>
                                        <span>#<?php the_ID(); ?></span>
                                    </div>

                                    <h2 class="post-title" style="max-width: 22ch;">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>

                                    <div style="display: grid; grid-template-columns: minmax(0, 1.1fr) minmax(240px, 0.9fr); gap: 1rem; align-items: stretch;">
                                        <div class="post-excerpt" style="padding-right: 0.5rem;">
                                            <?php the_excerpt(); ?>
                                        </div>

                                        <a href="<?php the_permalink(); ?>" style="display: block; border-radius: 20px; overflow: hidden; min-height: 260px; border: 1px solid rgba(240, 232, 223, 0.08); text-decoration: none;">
                                            <?php if ($slide_image) : ?>
                                                <img
                                                    src="<?php echo esc_url($slide_image); ?>"
                                                    alt="<?php echo esc_attr(get_the_title()); ?>"
                                                    style="width: 100%; height: 100%; object-fit: cover;"
                                                >
                                            <?php else : ?>
                                                <div style="width: 100%; height: 100%; min-height: 260px; background:
                                                    radial-gradient(circle at 30% 30%, rgba(184,74,30,0.24), transparent 40%),
                                                    linear-gradient(180deg, rgba(196,163,90,0.16), rgba(18,13,10,0.92));
                                                    display: grid; place-items: center;">
                                                    <span style="font-family: 'DM Mono', monospace; letter-spacing: 0.18em; text-transform: uppercase; color: rgba(240,232,223,0.75);">
                                                        No Visual Asset
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                </div>
                            </article>
                            <?php $slide_index++; ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>

                <div style="display:flex; gap:0.5rem; margin-top:0.85rem;">
                    <button type="button" id="rg-prev-slide" style="appearance:none; border:1px solid rgba(240,232,223,0.10); background:rgba(255,255,255,0.03); color:var(--text); border-radius:999px; padding:0.7rem 1rem; font-family:'DM Mono', monospace; letter-spacing:0.12em; text-transform:uppercase; cursor:pointer;">
                        Prev
                    </button>
                    <button type="button" id="rg-next-slide" style="appearance:none; border:1px solid rgba(240,232,223,0.10); background:rgba(255,255,255,0.03); color:var(--text); border-radius:999px; padding:0.7rem 1rem; font-family:'DM Mono', monospace; letter-spacing:0.12em; text-transform:uppercase; cursor:pointer;">
                        Next
                    </button>
                </div>
            </section>

            <!-- MAIN LOOP -->
            <div class="post-grid">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                            <div class="post-card-inner">
                                <div class="post-meta">
                                    <?php
                                    $categories = get_the_category();
                                    $category_name = !empty($categories) ? $categories[0]->name : 'UNCLASSIFIED';
                                    ?>
                                    <span class="category-label"><?php echo esc_html($category_name); ?></span>
                                    <span>LOG ENTRY</span>
                                    <span>#<?php the_ID(); ?></span>
                                </div>

                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>

                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>" style="display:block; border-radius:20px; overflow:hidden; border:1px solid rgba(240,232,223,0.08);">
                                        <?php the_post_thumbnail('large'); ?>
                                    </a>
                                <?php endif; ?>

                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>

                                <div class="post-divider"></div>

                                <p style="margin:0; font-family:'DM Mono', monospace; font-size:0.78rem; letter-spacing:0.12em; text-transform:uppercase;">
                                    <a href="<?php the_permalink(); ?>">Access file →</a>
                                </p>
                            </div>
                        </article>
                    <?php endwhile; ?>

                    <div style="margin-top: 1.5rem;">
                        <?php
                        the_posts_pagination(array(
                            'mid_size'  => 1,
                            'prev_text' => __('← Previous', 'redground-olympus-terminal'),
                            'next_text' => __('Next →', 'redground-olympus-terminal'),
                        ));
                        ?>
                    </div>
                <?php else : ?>
                    <div class="entry-empty">
                        <h2 class="archive-heading" style="margin-bottom:0.5rem;">No Signal</h2>
                        <p>No transmissions detected.</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <aside class="sidebar-panel">
            <div class="sidebar-unit">
                <span class="unit-label">Martian Atmospheric Pressure</span>
                <p class="unit-value">
                    <?php echo function_exists('redground_get_mars_pressure') ? esc_html(redground_get_mars_pressure()) : 'N/A'; ?>
                    <span style="font-size:0.8rem; font-family:'DM Mono', monospace; color:var(--muted);">Pa</span>
                </p>
                <p class="unit-copy">Live colony telemetry from the Olympus terminal sensor stack.</p>
            </div>

            <div class="sidebar-unit">
                <span class="unit-label">System Log</span>
                <p class="unit-copy" style="margin-bottom:0.4rem;">Boot sequence complete.</p>
                <p class="unit-copy" style="margin-bottom:0.4rem;">Thermal envelope stable.</p>
                <p class="unit-copy" style="margin-bottom:0.4rem;">Water recovery active.</p>
                <p class="unit-copy">Coffee synthesis online.</p>
            </div>

            <div class="sidebar-unit">
                <span class="unit-label">Archive Access</span>
                <div class="widget">
                    <?php wp_get_archives(array('type' => 'monthly')); ?>
                </div>
            </div>

            <div class="sidebar-unit">
                <span class="unit-label">Colony Notes</span>
                <p class="unit-copy">
                    REDGROUND is presented as a technical fiction: a coffee collective, a logistics layer, and a visual system for a Martian settlement.
                </p>
            </div>
        </aside>

    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const slides = Array.from(document.querySelectorAll('.rg-featured-slide'));
    const prev = document.getElementById('rg-prev-slide');
    const next = document.getElementById('rg-next-slide');

    if (!slides.length) return;

    let current = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.opacity = i === index ? '1' : '0';
            slide.style.pointerEvents = i === index ? 'auto' : 'none';
        });
    }

    function nextSlide() {
        current = (current + 1) % slides.length;
        showSlide(current);
    }

    function prevSlideFn() {
        current = (current - 1 + slides.length) % slides.length;
        showSlide(current);
    }

    if (next) next.addEventListener('click', nextSlide);
    if (prev) prev.addEventListener('click', prevSlideFn);

    showSlide(current);
    setInterval(nextSlide, 6000);
});
</script>

<?php get_footer(); ?>