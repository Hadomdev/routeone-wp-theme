<?php

$title           = get_field( 'other_serbvices_title' );
$title_shadow   = get_field( 'other_services_shadow_title' );
$output_type     = get_field( 'other_output_type' );
$button          = ! empty( get_field( 'other_button_text' ) ) ? get_field( 'other_button_text' ) : 'Load more';
$current_post_id = get_the_ID();
$posts_per_page  = get_option( 'posts_per_page' );
$post_type       = 'service-item';

$service_ids = get_field( 'other_select_service' );

$args = [
    'posts_per_page' => - 1,
    'post_type'      => 'service',
    'orderby'        => 'DESC',
    'post__not_in'   => [ $current_post_id ],
    'tax_query'      => array(
        array(
            'taxonomy' => 'city',
            'field'    => 'id',
            'terms'    => $service_ids
        )
    )
];

$service_ids = implode( ',', $service_ids );

$posts     = get_posts( $args );
$max_paged = ceil( count( $posts ) / $posts_per_page );

?>

<?php if ( ! empty( $posts ) ): ?>
    <?php if ( ! empty( $output_type ) ):
        $first_posts = array_slice( $posts, 0, $posts_per_page ); ?>
        <section class="transfers container mb-128">

            <h2 class="title title--02" data-shadow="<?= $title_shadow; ?>"><?= $title; ?></h2>

            <div class="transfers__list" id="<?= $post_type ?>-response">

                <?php foreach ( $first_posts as $post ):
                    $ID = $post->ID;
                    get_template_part( 'template-parts/content', $post_type, $ID );

                endforeach; ?>

            </div>

            <?php if ( count( $posts ) > $posts_per_page ): ?>

                <button class="btn transfers__load-more" id="transfers__load-more" data-paged="1"
                        data-max_paged="<?= $max_paged; ?>" data-type="service" data-post_type="<?= $post_type ?>"
                        data-service_ids="<?= $service_ids ?>" data-current_post="<?= $current_post_id; ?>">
                    <?= $button; ?>
                </button>

            <?php endif; ?>

        </section>
    <?php else: ?>
        <section class="services-cards-slider container mb-128">
            <div class="services-cards-slider__header">
                <h2 class="services-cards-slider__title title title--02 no-padding"><?= $title; ?></h2>

                <div class="services-slider__header-action swiper-actions">
                    <div class="services-cards-slider__prev swiper-actions__button"></div>
                    <div class="services-cards-slider__next swiper-actions__button swiper-actions__next"></div>
                </div>
            </div>

            <div class="services-cards-slider__swiper">
                <div class="swiper-wrapper">
                    <?php foreach ( $posts as $post ) : ?>

                        <div class="swiper-slide">
                            <div class="services-slider__card">
                                <?php get_template_part( 'template-parts/content', 'service-item', $post ); ?>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>