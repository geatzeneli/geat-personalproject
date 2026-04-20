<?php
/**
 * REDGROUND — Olympus Terminal
 * template-parts/slider.php
 *
 * Hard-coded image slider. To swap images, edit the $rg_slides
 * array below. Each slide accepts:
 *   - src     : image URL (external URL or get_template_directory_uri() . '/assets/...')
 *   - alt     : accessible alt text
 *   - caption : technical label shown over the slide
 *
 * @package Redground
 * @since   1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* =============================================================
   EDIT HERE — Drop in 4–5 image URLs.
   Replace these Unsplash placeholders with your own.
   For local images, upload to wp-content/themes/redground/assets/
   and use:  get_template_directory_uri() . '/assets/your-file.jpg'
   ============================================================= */
$rg_slides = array(
    array(
        'src'     => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=1600&q=80',
        'alt'     => 'Roasted beans cooling in a low-pressure pod',
        'caption' => 'POD OL-R3 // ROAST CYCLE 0431',
    ),
    array(
        'src'     => 'https://images.unsplash.com/photo-1442550528053-c431ecb55509?auto=format&fit=crop&w=1600&q=80',
        'alt'     => 'Espresso pour under dome lighting',
        'caption' => 'EXTRACTION // 9.1 BAR @ 0.6 ATM',
    ),
    array(
        'src'     => 'https://images.unsplash.com/photo-1497515114629-f71d768fd07c?auto=format&fit=crop&w=1600&q=80',
        'alt'     => 'Single-origin green beans on inspection tray',
        'caption' => 'BED 07 // GRADE A / TYPE-3 SOIL',
    ),
    array(
        'src'     => 'https://images.unsplash.com/photo-1498804103079-a6351b050096?auto=format&fit=crop&w=1600&q=80',
        'alt'     => 'Cup of black coffee on technical surface',
        'caption' => 'CUP MANIFEST // BATCH RG-0034',
    ),
    array(
        'src'     => 'https://images.unsplash.com/photo-1559525839-d9acfd5b8c4f?auto=format&fit=crop&w=1600&q=80',
        'alt'     => 'Tharsis basin processing facility at dusk',
        'caption' => 'THARSIS-IV // PROCESSING FACILITY',
    ),
);

$rg_slider_id = 'rg-slider-' . wp_unique_id();
?>

<section class="rg-slider" aria-label="REDGROUND visual archive">
    <div class="rg-container">

        <header class="rg-section-head rg-section-head--slim">
            <h2 class="rg-section-head__title">// Visual Archive</h2>
            <span class="rg-section-head__meta">
                <?php echo (int) count( $rg_slides ); ?> FRAMES // CAROUSEL FEED
            </span>
        </header>

        <div
            class="rg-slider__stage"
            id="<?php echo esc_attr( $rg_slider_id ); ?>"
            data-rg-slider
            data-slide-count="<?php echo (int) count( $rg_slides ); ?>"
        >
            <div class="rg-slider__track">
                <?php foreach ( $rg_slides as $i => $slide ) : ?>
                    <figure
                        class="rg-slider__slide<?php echo 0 === $i ? ' is-active' : ''; ?>"
                        data-index="<?php echo (int) $i; ?>"
                        aria-hidden="<?php echo 0 === $i ? 'false' : 'true'; ?>"
                    >
                        <img
                            src="<?php echo esc_url( $slide['src'] ); ?>"
                            alt="<?php echo esc_attr( $slide['alt'] ); ?>"
                            loading="<?php echo 0 === $i ? 'eager' : 'lazy'; ?>"
                            class="rg-slider__img"
                        />
                        <figcaption class="rg-slider__caption">
                            <span class="rg-slider__index">FRAME <?php echo esc_html( str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) ); ?> / <?php echo esc_html( str_pad( count( $rg_slides ), 2, '0', STR_PAD_LEFT ) ); ?></span>
                            <span class="rg-slider__label"><?php echo esc_html( $slide['caption'] ); ?></span>
                        </figcaption>
                    </figure>
                <?php endforeach; ?>
            </div>

            <button type="button" class="rg-slider__nav rg-slider__nav--prev" data-rg-prev aria-label="Previous frame">
                <span aria-hidden="true">&larr;</span>
            </button>
            <button type="button" class="rg-slider__nav rg-slider__nav--next" data-rg-next aria-label="Next frame">
                <span aria-hidden="true">&rarr;</span>
            </button>

            <div class="rg-slider__dots" role="tablist" aria-label="Choose frame">
                <?php foreach ( $rg_slides as $i => $slide ) : ?>
                    <button
                        type="button"
                        role="tab"
                        class="rg-slider__dot<?php echo 0 === $i ? ' is-active' : ''; ?>"
                        data-rg-dot="<?php echo (int) $i; ?>"
                        aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>"
                        aria-label="<?php echo esc_attr( sprintf( 'Frame %d', $i + 1 ) ); ?>"
                    ></button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
