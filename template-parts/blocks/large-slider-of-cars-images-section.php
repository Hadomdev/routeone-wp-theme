<?php
$title          = get_field( 'title' );
$title_shadow   = get_field( 'title_shadow' );
$form_shortcode = get_field( 'form_shortcode' );

$image_sizes = array(
    '(max-width: 599px) 135px',
    '(min-width: 600px) 580px',
    '100vw',
);
?>

<section class="mb-40">
    <div class="hero container">
        <?php if ( ! empty( $title ) ): ?>
            <div class="hero__title title" data-shadow="<?= $title_shadow; ?>">
                <h1><?= $title; ?></h1>
            </div>
        <?php endif; ?>
        <?php if ( have_rows( 'cars_slider' ) ) : ?>
            <div class="hero__carousel heroCarousel swiper">
                <div class="swiper-wrapper">
                    <?php $counter = 1; ?>
                    <?php while ( have_rows( 'cars_slider' ) ) : the_row(); ?>
                        <?php
                        $desktop_image = get_sub_field( 'desktop_image' );
                        if ( ! empty( $desktop_image ) ): ?>
                            <div class="swiper-slide">
                                <div class="hero__carousel-item" data-id="car0<?= $counter; ?>">
                                    <?php 
                                        echo wp_get_attachment_image(
                                            $desktop_image['id'],
                                            'banner-carousel-mobile',
                                            false,
                                            array(
                                                'fetch_priority' => 'high',
                                                'decoding'       => 'async',
                                                'class'          => 'wp-image-' . $desktop_image['id'],
                                                'sizes'          => implode(', ', $image_sizes),
                                            )
                                        );
                                    ?>
                                </div>
                            </div>
                            <?php $counter ++; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="hero__holder">
            <?php if ( have_rows( 'cars_slider' ) ) : ?>
                <div class="hero__description">
                    <nav class="hero__nav swiper-actions">
                        <button class="hero__nav-btn hero__nav-btn--prev swiper-actions__button"></button>
                        <button class="hero__nav-btn hero__nav-btn--next swiper-actions__button swiper-actions__next"></button>
                    </nav>
                    <div class="hero__description-holder">
                        <?php $counter = 1; ?>
                        <?php while ( have_rows( 'cars_slider' ) ) : the_row(); ?>
                            <?php
                            $car_name        = get_sub_field( 'car_name' );
                            $car_description = get_sub_field( 'car_description' );
                            ?>
                            <div class="hero__description-item" data-target="car0<?= $counter; ?>">
                                <?php if ( ! empty( $car_name ) ): ?>
                                    <p class="title title-24 no-padding hero__min-title"><?= $car_name; ?></p>
                                <?php endif; ?>
                                <div class="hero__description-content">
                                    <?php if ( have_rows( '3_short_characteristics' ) ) : ?>
                                        <ul class="hero__options product-descriptions">
                                            <?php while ( have_rows( '3_short_characteristics' ) ) : the_row(); ?>
                                                <li class="product-descriptions__item">
                                                    <div class="product-descriptions__title"><?= the_sub_field( 'characteristic_title' ); ?></div>
                                                    <div class="product-descriptions__text hero__description-text"><?= the_sub_field( 'characteristic_description' ); ?></div>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <?php if ( ! empty( $car_description ) ): ?>
                                        <div class="hero__description-text">
                                            <?= $car_description; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php $counter ++; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ( ! empty( $form_shortcode ) ): ?>
                <div class="hero__form">
                    <?php echo do_shortcode( $form_shortcode ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>