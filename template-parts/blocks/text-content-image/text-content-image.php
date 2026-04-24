<?php

$title        = get_field( 'text_content_image_title' );
$title_shadow = get_field( 'text_content_image_title_shadow' );
$content      = get_field( 'text_content_image_content' );
$image        = get_field( 'text_content_image_image' );

?>

<div class="container services-description mb-80">
    <article class="services-description__article ">

        <h2 class="title title--02 no-padding" data-shadow="<?= $title_shadow; ?>"><?= $title ?></h2>

        <div class=" services-description__text">

        <?= $content ?>

</div>
</article>

<?php if ( ! empty( $image ) ): ?>

    <div class="services-description__img-box">
        <img src="<?= $image['sizes']['services-description']; ?>" alt="<?= $image['alt']; ?>" class="services-description__img"/>
    </div>

<?php endif; ?>
</div>