<?php
$title        = get_field( 'title' );
$title_shadow = get_field( 'title_shadow' );
$text         = get_field( 'text' );

$args = array(
    'post_type'     => 'cars',
    'post_per_page' => - 1
);

$posts = get_posts( $args );

$items   = [];
$sliders = [];

foreach ( $posts as $post ):
    $ID                    = $post->ID;
    $title                 = $post->post_title;
    $link                  = get_the_permalink( $ID );
    $passengers_text       = get_field( 'text_about_pasengers', $ID );
    $image                 = get_the_post_thumbnail( $ID, 'full', array( 'class' => 'fleet__img' ) );
    $image_small           = get_the_post_thumbnail( $ID, 'full', array( 'class' => 'fleet__slider-nav-img' ) );
    $characteristics       = 'short_characteristics';
    $characteristics_array = [];

    if ( have_rows( $characteristics, $ID ) ) :
        while ( have_rows( $characteristics, $ID ) ) : the_row();
            $heading = get_sub_field( 'heading' );
            $text    = get_sub_field( 'text' );

            $characteristics_array[$heading] = $text;

        endwhile;
    endif;

    $items = [
        'link'            => $link,
        'title'           => $title,
        'image'           => $image,
        'image_small'     => $image_small,
        'characteristics' => $characteristics_array,
    ];

    $sliders[ $ID ] = $items;

endforeach;

?>

<section class="container">
    <?php if ( ! empty( $title ) ): ?>
        <h2 class="title title--02" data-shadow="<?= $title_shadow; ?>">
            <?= $title; ?>
        </h2>
    <?php endif; ?>
</section>

<?php if ( have_rows( 'slider' ) ) : ?>
    <section class="fleet mb-128">
        <div class="fleet__slider">
            <div class="swiper-wrapper">
                <?php foreach ( $sliders as $item ): ?>
                    <div class="swiper-slide">
                        <div class="fleet__content">
                            <?= $item['image']; ?>
                            <ul class="product-descriptions fleet__product-descriptions">
                                <?php foreach ( $item['characteristics'] as $title => $text ) : ?>
                                    <li class="product-descriptions__item">
                                        <div class="product-descriptions__title"><?= $title; ?></div>
                                        <div class="product-descriptions__text"><?= $text; ?></div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="fleet__link text-center">
                                <a href="<?= $item['link'] ?>" target="_blank" class="btn btn--small" rel="noopener">
                                    <?= __( 'Read more', 'routeone' ) ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="fleet__nav-container">
            <button class="fleet__btn-prev swiper-actions__button"></button>
            <div class="fleet__slider-nav">
                <div class="swiper-wrapper">
                    <?php foreach ( $sliders as $item ): ?>
                        <div class="swiper-slide">
                            <div class="fleet__slider-nav-img-box">
                                <?= $item['image_small']; ?>
                            </div>
                            <p class="fleet__slider-nav-text"><?= $item['title']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <button class="fleet__btn-next swiper-actions__button swiper-actions__next"></button>
        </div>
    </section>
<?php endif; ?>
