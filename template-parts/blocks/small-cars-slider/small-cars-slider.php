<?php

$title        = get_field( 'cars_title' );
$title_shadow = get_field( 'cars_shadow_title' );
$description  = get_field( 'cars_description' );

$args = array(
    'post_type'     => 'cars',
    'post_per_page' => - 1
);

$posts = get_posts( $args );

?>

<div class="container mb-80">
    <div class="services-slider">
        <div class="services-slider__header">
            <div class="services-slider__header-content">

                <h2 class="title title--02" data-shadow="<?= $title_shadow; ?>"><?= $title; ?></h2>

            </div>

            <div class="services-slider__header-action swiper-actions">
                <div class="services-slider__prev swiper-actions__button"></div>
                <div class="services-slider__next swiper-actions__button swiper-actions__next"></div>
            </div>
        </div>

        <div class="services-slider__title-text">

            <?= $description; ?>

        </div>

        <?php if ( ! empty( $posts ) ): ?>

            <div class="services-slider__swiper">
                <div class="swiper-wrapper">
                    <?php foreach ( $posts as $post ):
                        $ID = $post->ID;
                        $title = $post->post_title;
                        $link = get_the_permalink( $ID );
                        $passengers_text = get_field( 'text_about_pasengers', $ID );
                        $passengers_number = get_field( 'passengers', $ID );
                        $image = get_the_post_thumbnail( $ID, 'full', array( 'class' => 'services-slider__img' ) );
                        ?>

                        <div class="swiper-slide">
                            <a href="<?= $link; ?>" class="services-slider__card">
                                <?php if ( ! empty( $image ) ): ?>
                                    <div class="services-slider__img-box">
                                        <?= $image; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="services-slider__title">
                                    <?= $title; ?>
                                </div>

                                <div class="services-slider__text">
                                    <?= $passengers_text; ?>
                                </div>

                                <div class="services-slider__description">
                                    <?= $passengers_number; ?>
                                </div>
                            </a>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
