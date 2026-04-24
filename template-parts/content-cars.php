
<div class="page-header container car-rental-page">

    <?php
    if ( function_exists( 'yoast_breadcrumb' ) ) {
        yoast_breadcrumb( '<nav class="breadcrumbs">', '</nav>' );
    }
    ?>

    <h1 class="title no-padding"><?php the_title(); ?></h1>

    <?php the_content(); ?>
</div>
