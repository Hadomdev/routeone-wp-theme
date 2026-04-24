<?php

$title          = get_field( 'transfer_overview_title' );
$table          = 'transfer_overview_table';
$map            = get_field( 'transfer_overview_map' );
$contacts_title = get_field( 'transfer_overview_contacts_title' );
$contacts       = 'transfer_overview_contacts';

?>

<section class="overview container mb-80">

    <h2 class="title title--02 no-padding"><?= $title; ?></h2>

    <?php

    if ( have_rows( $table ) ): ?>
        <div class="overview__list">
            <?php while ( have_rows( $table ) ) : the_row();

                switch ( get_row_layout() ):
                    case 'text_row':
                        $title = get_sub_field( 'title' );
                        $hint = get_sub_field( 'hint' );
                        $value = get_sub_field( 'value' ); ?>
                        <div class="overview__row">
                            <div class="overview__row-heading">
                                <?= $title; ?>
                                <?php if ( ! empty( $hint ) ): ?>
                                    <div class="overview__row-hint">
                                        <span>i</span>
                                        <div class="overview__row-hint_text">
                                            <?= $hint; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="overview__row-holder">

                                <div class="overview__row-value"><?= $value; ?></div>

                            </div>
                        </div>
                        <?php break;
                    case 'image_row':
                        $title = get_sub_field( 'title' );
                        $images = 'images'; ?>
                        <div class="overview__row">
                            <div class="overview__row-heading"><?= $title; ?></div>
                            <div class="overview__row-holder">

                                <?php if ( have_rows( $images ) ): ?>

                                    <div class="overview__items">
                                        <?php while ( have_rows( $images ) ) : the_row();
                                            $title = get_sub_field( 'title' );
                                            $image = get_sub_field( 'image' ); ?>

                                            <div class="overview__item">
                                                <div class="overview__item-img">
                                                    <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
                                                </div>
                                                <span class="overview__item-text"><?= $title; ?></span>
                                            </div>
                                        <?php endwhile; ?>

                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>

                        <?php break;
                endswitch;

            endwhile; ?>

        </div>
    <?php endif; ?>

    <div class="overview__holder">
        <?= $map; ?>
        <div class="overview__contacts contact-us__content">
            <div class="title title--03 no-padding contact-us__title"><?= $contacts_title; ?></div>
            <?php if ( have_rows( $contacts ) ) : ?>
                <div class="contact-us__info">
                    <?php while ( have_rows( $contacts ) ) : the_row(); ?>
                        <?php $link = get_sub_field( 'link' ); ?>
                        <div class="contact-us__info-item">
                            <?php the_sub_field( 'label' ); ?>
                            <?php if ( ! empty( $link ) ): ?>
                                <a href="<?= $link['url']; ?>"
                                   class="contact-us__info-link" <?= $link['target'] ? 'target="_blank" rel="noopener"' : ''; ?> >
                                    <?= $link['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
