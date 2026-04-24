<?php
    $title = get_field( 'title' );
    $title_shadow = get_field( 'title_shadow' );
    $button = get_field( 'button' );
    $posts = get_field( 'posts' );
    if(empty($posts)){
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'DESC',
        );
    }else{
        $args = array(
            'post_type' => 'post',
            'post__in' => $posts,
        );
    }
    $query = new WP_Query( $args );
?>

<section class="container blog-posts mb-128">
    <?php if(!empty($title)):?>
        <h2 class="title title--02" data-shadow="<?= $title_shadow;?>"><?= $title;?></h2>
    <?php endif;?>
    <?php if(!empty($button)):?>
        <a href="<?= $button['url'];?>" class="btn blog-posts__link" <?= $button['target']?'target="_blank" rel="noopener"':'';?>>
            <?= $button['title'];?>
        </a>
    <?php endif;?>
    <?php if ( $query->have_posts() ) :?>
        <div class="blog-cards">
            <?php while ( $query->have_posts() ) : $query->the_post();?>
                <?php $featured_image_url = get_the_post_thumbnail_url();?>
                <a href="<?= get_permalink();?>" class="blog-cards__item">
                    <img class="blog-cards__item-image" src="<?= $featured_image_url;?>" alt="town im mountains"/>
                    <div class="blog-cards__item-description">
                        <div class="blog-cards__item-row">
                            <span class="blog-cards__item-type"><?= __('Tour', 'routeone') ?></span>
                            <span class="blog-cards__item-date"><?= get_the_date( 'j F, Y' );?></span>
                        </div>
                        <p class="blog-cards__item-title"><?= get_the_title();?></p>
                        <p class="blog-cards__item-text">
                            <?= get_the_excerpt();?>
                        </p>
                    </div>
                </a>
            <?php endwhile;?>
        </div>
    <?php endif;?>
</section>