<?php
$top_title   = get_field( 'title_top' );
$top_content = get_field( 'content_top' );
$top_image   = get_field( 'image_top' );

$bottom_title   = get_field( 'title_bottom' );
$bottom_content = get_field( 'content_bottom' );
//$bottom_image = get_field();
?>
<div class="about-us-info mb-80">
    <div class="container services-description">
        <article class="services-description__article services-description__article--box">
            <?php
            if ( ! empty( $top_title ) ) {
                ?>
                <h2 class="title title--02 no-padding"><?php echo $top_title; ?></h2>
                <?php
            }
            if ( ! empty( $top_content ) ) {
                ?>
                <div class="services-description__text"><?php echo $top_content; ?></div>
                <?php
            }
            ?>
        </article>
        <div class="services-description__img-box">
            <img src="<?php echo $top_image['url']; ?>"
                 alt="<?php echo ! empty( $top_image['alt'] ) ? $top_image['alt'] : $top_title; ?>"
                 class="services-description__img"/>
        </div>
    </div>
    <?php if ( ! empty( $bottom_title ) || ! empty( $bottom_content ) ) : ?>
        <div class="container">
            <section class="information-section">
                <?php
                if ( ! empty( $bottom_title ) ) {
                    ?>
                    <h2 class="title title--02 no-padding"><?php echo $bottom_title; ?></h2>
                    <?php
                }
                if ( ! empty( $bottom_content ) ) {
                    ?>
                    <div><?php echo $bottom_content; ?></div>
                    <?php
                }
                ?>
            </section>
        </div>
    <?php endif; ?>
</div>