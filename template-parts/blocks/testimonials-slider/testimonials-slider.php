<?php

$title        = get_field( 'testimonial_slider_title' );
$title_shadow = get_field( 'testimonial_slider_shadow_title' );
$points       = get_field( 'testimonial_slider_points', 'option' );
$desc         = get_field( 'testimonial_slider_description', 'option' );
$link         = ! empty( get_field( 'testimonial_slider_google_link', 'option' ) ) ? get_field( 'testimonial_slider_google_link', 'option' ) : 'https://www.google.com/maps/search/?api=1&query=Google&query_place_id=ChIJSVk_RqK5kUcRfaXxcCtU-wM';
$button       = ! empty( get_field( 'testimonial_slider_button_text', 'option' ) ) ? get_field( 'testimonial_slider_button_text', 'option' ) : 'Read all reviews';

if ( ! empty( $title ) ): ?>
    <section class="testimonials__section container mb-80">

        <h2 class="title title--02" data-shadow="<?= $title_shadow; ?>"><?= $title; ?></h2>

        <div class="testimonials">
            <div class="testimonials__header">
                <div class="testimonials__info">
                    <div class="testimonials__info-rate">
                        <strong>
                            <?= $points; ?>
                        </strong>
                    </div>

                    <?= $desc; ?>
                    <a href="<?= $link; ?>" class="btn" target="_blank" rel="noopener">
                        <?= $button; ?>
                    </a>
                </div>

                <div class="testimonials__header-action swiper-actions">
                    <div class="testimonials__prev swiper-actions__button" id="testimonials__prev"></div>
                    <div class="testimonials__next swiper-actions__button swiper-actions__next"
                         id="testimonials__next"></div>
                </div>
            </div>
            <?php echo do_shortcode( '[trustindex no-registration=google]' ) ?>
        </div>
    </section>
<?php endif; ?>
