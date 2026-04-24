<?php

$title       = get_field( 'payment_title' );
$title_shadow = get_field( 'payment_title_shadow' );
$description = get_field( 'payment_description' );
$payment     = 'payment__methods';

?>

<div class="benefits-section container mb-80">

    <h2 class="title title--02 " data-shadow="<?= $title_shadow; ?>"><?= $title; ?></h2>

    <div class="service-detail__text">

        <?= $description; ?>

    </div>

    <?php if ( have_rows( $payment ) ): ?>
        <div class="benefit">
            <?php while ( have_rows( $payment ) ): the_row();
                $icon  = get_sub_field( 'icon' );
                $title = get_sub_field( 'title' );
                $text  = get_sub_field( 'text' );
                ?>

                <article class="benefit__card">

                    <?php if ( ! empty( $icon ) ): ?>
                        <div class="benefit__icon-box">
                            <img class="benefit__icon" src="<?= $icon; ?>" alt="<?= $title; ?>">
                        </div>
                    <?php endif; ?>

                    <span class="benefit__title"><?= $title; ?></span>

                    <div class="benefit__text">
                        <p>
                            <?= $text; ?>
                        </p>
                    </div>
                </article>

            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>