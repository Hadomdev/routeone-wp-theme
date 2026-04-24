<?php

$title              = get_field( 'price_title' );
$description        = get_field( 'price_description' );
$description_bottom = get_field( 'price_description_bottom' );
$prices             = 'price_prices';

?>

<section class="container personal-service mb-80">
    <h2 class="title title--02 no-padding service-detail__title"><?= $title; ?></h2>

    <div class="personal-service__text">

        <?= $description; ?>

    </div>

    <?php if ( have_rows( $prices ) ):
        $number = 0;
        ?>
        <div class="personal-service__list">
            <?php while ( have_rows( $prices ) ): the_row();
                $number ++;
                $price = get_sub_field( 'price' );
                $time  = get_sub_field( 'time' );
                ?>
                <div class="personal-service__card">
                    <div class="personal-service__card-number">
                        <?= $number; ?>
                    </div>

                    <div>
                        <span class="personal-service__card-text"><?= __( 'Price:', 'routeone' ) ?></span>
                        <span class="personal-service__card-info"><?= $price; ?></span>
                    </div>

                    <div>
                        <span class="personal-service__card-text"><?= __( 'Total time:', 'routeone' ) ?></span>
                        <span class="personal-service__card-info"><?= $time; ?></span>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

    <div class="personal-service__additional-text">

        <?= $description_bottom; ?>

    </div>

</section>