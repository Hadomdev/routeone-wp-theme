<?php

$background = get_field('services_hero_banner');
$title = get_field('services_hero_title');
$content = get_field('services_hero_content');

?>

<style>
    .service-detail__hero {
        background: url(<?= $background ?>) no-repeat center / cover;
    }
</style>

<div class="service-detail__hero section-shadow">
    <div class="service-detail__hero-content container">
        <div class="service-detail__hero-article block-shadow">
            <?php
            if ( function_exists( 'yoast_breadcrumb' ) ) {
                yoast_breadcrumb( '<nav class="breadcrumbs">', '</nav>' );
            }
            ?>

            <h1 class="title title--001 no-padding service-detail__hero-title"><?= $title; ?></h1>
            <p class="service-detail__hero-text"><?= $content; ?></p>
        </div>
    </div>
</div>