<?php

$post = $args;

if ( gettype( $post ) == 'array' ) {
    $ID      = $post['id'];
    $title   = $post['title'];
    $content = $post['content'];
} else {

    $ID      = $post;
    $title = get_the_title( $ID );
    $content = get_the_excerpt($ID);
}
$link  = get_the_permalink( $ID );
$image = get_the_post_thumbnail( $ID );
?>

<div class="services__item ">

    <div class="services__item-link">

        <div class="services__item-img">
            <?= $image ?>
        </div>

        <h3 class="services__item-title"><?= $title ?></h3>

        <div class="services__item-text">
            <?= $content ?>
        </div>

        <a href="<?= $link ?>" class="services__item-more link"><?= __( 'Read more', 'routeone' ) ?></a>

    </div>

</div>
