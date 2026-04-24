<?php

$link = get_the_permalink( $args );
$title = get_the_title( $args );
$time = get_field( 'transfers_time', $args );
$price = get_field( 'transfers_price', $args );
?>


<a href="<?= $link; ?>" class="transfers__card">
    <p class="transfers__card-way"><?= $title; ?></p>

    <div class="transfers__card-footer">
        <?php if ( ! empty( $time ) ): ?>
            <div class="transfers__card-time-wrapper">
                <img src="<?php echo get_template_directory_uri() ?>/assets/dist/img/svg/clock.svg"
                     alt="clock"/>
                <span class="transfers__card-time"><?= $time; ?></span>
            </div>
        <?php endif; ?>
        <?php if ( ! empty( $price ) ): ?>
            <div class="transfers__card-price-wrapper">
                <img src="<?php echo get_template_directory_uri() ?>/assets/dist/img/svg/cash.svg"
                     alt="cash"/>
                <span class="transfers__card-price"><?= $price; ?></span>
            </div>
        <?php endif; ?>
    </div>
</a>