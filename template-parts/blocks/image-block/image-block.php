<?php
$left_image  = get_field( 'left_image' );
$left_text   = get_field( 'left_text' );
$right_image = get_field( 'right_image' );
$right_text  = get_field( 'right_text' );

?>

<?php if ( ! empty( $left_image ) && ! empty( $right_image ) ): ?>
    <section class="trip container mb-40">
        <div class="trip__holder">
            <div class="trip__item">
                <figure class="trip__item-img"><img src="<?= $left_image['url']; ?>" alt="<?= $left_image['alt']; ?>"/>
                </figure>
                <div class="trip__item-text"><?= $left_text; ?></div>
            </div>
            <div class="trip__item">
                <figure class="trip__item-img"><img src="<?= $right_image['url']; ?>"
                                                    alt="<?= $right_image['alt']; ?>"/></figure>
                <div class="trip__item-text"><?= $right_text; ?></div>
            </div>
        </div>
    </section>
<?php endif; ?>