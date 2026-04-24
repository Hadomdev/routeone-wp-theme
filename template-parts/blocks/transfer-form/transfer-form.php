<?php

$form      = get_field( 'transfer_from_select' );
$text_from = get_field( 'transfer_from_text_from' );
$text_to   = get_field( 'transfer_from_text_to' );

?>

<div class="container mb-80 form__with-image">

    <?php if (! empty( $text_from ) ): ?>
        <div class="form__image form__image_transfer">
            <div class="form__image_text form__image_text-from">
                <img src="<?= get_template_directory_uri()?>/assets/dist/img/svg/point.svg" alt="point">
                <p>
                    <?= $text_from; ?>
                </p>
            </div>
            <img src="<?= get_template_directory_uri()?>/assets/dist/img/min-map.svg" alt="route">
            <div class="form__image_text form__image_text-to">
                <img src="<?= get_template_directory_uri()?>/assets/dist/img/svg/point.svg" alt="point">
                <p>
                    <?= $text_to; ?>
                </p>
            </div>
        </div>
    <?php endif; ?>

    <?php echo do_shortcode( "[contact-form-7 id='$form->ID' title='$form->post_title']" ); ?>


</div>
