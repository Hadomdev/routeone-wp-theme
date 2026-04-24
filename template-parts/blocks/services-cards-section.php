<?php
$title        = get_field( 'title' );
$title_shadow = get_field( 'title_shadow' );
?>

<section class="services container mb-128">
    <?php if ( ! empty( $title ) ): ?>
        <h2 class="title title--02" data-shadow="<?= $title_shadow; ?>">
            <?= $title; ?>
        </h2>
    <?php endif; ?>
    <?php if ( have_rows( 'services_cards' ) ): ?>
        <div class="services__list">
            <?php while ( have_rows( 'services_cards' ) ) : the_row(); ?>
                <?php if ( get_row_layout() == 'card_and_photo_on_the_left' ) : ?>
                    <?php
                    $image = get_sub_field( 'image' );
                    $text  = get_sub_field( 'text' );
                    ?>
                    <div class="services__item services__item--horizontal">
                        <?php if ( ! empty( $image ) ): ?>
                            <div class="services__item-img">
                                <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>"/>
                            </div>
                        <?php endif; ?>
                        <?php if ( ! empty( $text ) ): ?>
                            <div class="services__item-text">
                                <p>
                                    <?= $text; ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php elseif ( get_row_layout() == 'flip_card' ) : ?>
                    <?php
                    $image   = get_sub_field( 'image' );
                    $heading = get_sub_field( 'title' );
                    $text    = get_sub_field( 'text' );
                    $link    = get_sub_field( 'link' );
                    ?>
                    <div class="services__item">
                        <a href="<?= $link['url']; ?>"
                           class="services__item-link" <?= $link['target'] ? 'target="_blank" rel="noopener"' : ''; ?>>
                            <?php if ( ! empty( $image ) ): ?>
                                <div class="services__item-img">
                                    <img src="<?= $image['sizes']['services-description']; ?>" alt="<?= $image['alt']; ?>"/>
                                </div>
                            <?php endif; ?>
                            <?php if ( ! empty( $heading ) ): ?>
                                <h3 class="services__item-title"><?= $heading; ?></h3>
                            <?php endif; ?>
                            <?php if ( ! empty( $text ) ): ?>
                                <div class="services__item-text">
                                    <p>
                                        <?= $text; ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                            <?php if ( ! empty( $link ) ): ?>
                                <span class="services__item-more link"><?= $link['title']; ?></span>
                            <?php endif; ?>
                        </a>
                    </div>
                <?php elseif ( get_row_layout() == 'white_card_with_button' ) : ?>
                    <?php
                    $text = get_sub_field( 'text' );
                    $link = get_sub_field( 'link' );
                    ?>
                    <div class="services__item services__item--white">
                        <div class="services__item-text">
                            <p>
                                <?= $text; ?>
                            </p>
                        </div>
                        <?php if ( ! empty( $link ) ): ?>
                            <a href="<?= $link['url']; ?>"
                               class="btn" <?= $link['target'] ? 'target="_blank" rel="noopener"' : ''; ?>>
                                <?= $link['title']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php elseif ( get_row_layout() == 'blue_card' ) : ?>
                    <?php $text = get_sub_field( 'text' ); ?>
                    <div class="services__item services__item--blue">
                        <?php if ( ! empty( $text ) ): ?>
                            <div class="services__item-text">
                                <p>
                                    <?= $text; ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>