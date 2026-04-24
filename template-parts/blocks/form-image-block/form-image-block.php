<?php

$form     = get_field( 'select_form' );
$image    = get_field( 'form_image' );
$position = get_field( 'image_position' );

?>

<div class="container mb-80  form__with-image">

    <?php if ( ! empty( $position ) && ! empty( $image ) ): ?>
        <div class="form__image">
            <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
        </div>
    <?php endif; ?>

    <?php echo do_shortcode( "[contact-form-7 id='$form->ID' title='$form->post_title']" ); ?>

    <?php if ( empty( $position ) && ! empty( $image ) ): ?>
        <div class="form__image">
            <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
        </div>
    <?php endif; ?>

</div>
