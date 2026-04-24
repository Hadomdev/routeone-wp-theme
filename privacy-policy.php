<?php
/*
Template Name: Privacy policy
*/

get_header();
?>

<main id="primary" class="site-main page__main">
    <div class="container">
        <div class="policy">
            <?php
            if ( function_exists( 'yoast_breadcrumb' ) ) {
                yoast_breadcrumb( '<nav class="breadcrumbs">', '</nav>' );
            }
            ?>
            <h1 class="title"><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
    </div>
</main><!-- #main -->

<?php get_footer(); ?>
