<?php

$ID           = get_the_ID();
$title        = get_field( 'services_title' );
$shadow_title = get_field( 'services_shadow_title' );
$all_services = get_field( 'tax_services' );
$service_data = [];

if ( ! empty( $all_services ) ) {

    foreach ( $all_services as $service ) {
        $service_id    = $service->term_id;
        $current_posts = [];

        $args = [
            'posts_per_page' => - 1,
            'post_type'      => 'service',
            'orderby'        => 'DESC',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'city',
                    'field'    => 'id',
                    'terms'    => $service_id
                )
            )
        ];

        $posts = get_posts( $args );

        foreach ( $posts as $post ) {

            $ID = $post->ID;

            $current_posts[] = [
                'id'      => $ID,
                'title'   => $post->post_title,
                'content' => $post->post_excerpt,
                'link'    => get_the_permalink( $ID ),
                'image'   => get_the_post_thumbnail( $ID )
            ];
        }

        $service_data[] = [
            'slug'  => $service->slug,
            'title' => $service->name,
            'description' => $service->description,
            'posts' => $current_posts
        ];
    }
}


?>

<h1 class="title title--common" data-shadow="<?php echo $shadow_title; ?>"><?php echo $title; ?></h1>

<nav class="container page-nav">
    <div class="page-nav__list">
        <?php foreach ( $service_data as $service ): ?>

            <a href="#<?php echo $service['slug'] ?>" class="page-nav__link"><?php echo $service['title'] ?></a>

        <?php endforeach; ?>

    </div>
</nav>

<?php foreach ( $service_data as $service ): ?>

    <section class="services container mb-40">

        <em class="services__anchor" id="<?php echo $service['slug'] ?>"></em>

        <h2 class="title title--02 no-padding"><?php echo $service['title'] ?></h2>

        <div class="services__list">

            <div class="services__item services__item--blue">

                <div class="services__item-text">
                    <p><?= $service['description']; ?></p>
                </div>

            </div>

            <?php foreach ( $service['posts'] as $post ): ?>

                <div class="services__item ">

                    <div class="services__item-link">

                        <div class="services__item-img">
                            <?php echo $post['image'] ?>
                        </div>

                        <h3 class="services__item-title"><?php echo $post['title'] ?></h3>

                        <div class="services__item-text">
                            <?php echo $post['content'] ?>
                        </div>

                        <a href="<?= $post['link'] ?>" class="services__item-more link"><?= __('Read more', 'routeone') ?></a>

                    </div>

                </div>

            <?php endforeach; ?>
        </div>
    </section>

<?php endforeach; ?>



