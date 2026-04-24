<?php
$post_id            = get_the_id();
$author_id          = get_post_field( 'post_author', $post_id );
$author             = get_user_by( 'ID', $author_id );
$author_label       = $author->display_name;
$author_image       = get_field( 'author_image', 'user_' . $author_id );
$author_description = get_the_author_meta( 'description', $author_id );
$category           = get_the_category();

?>
<div class="page-header container article-page">
    <?php
    if ( function_exists( 'yoast_breadcrumb' ) ) {
        yoast_breadcrumb( '<nav class="breadcrumbs">', '</nav>' );
    }
    ?>
    <h1 class="title no-padding"><?php the_title(); ?></h1>
</div>
<section class="single-article container mb-40">
    <div class="single-article__header">
        <div class="single-article__author">
            <?php if ( ! empty( $author_image ) ): ?>
                <div class="single-article__author-avatar"><img src="<?= $author_image['url'] ?>"
                                                                alt="<?= $author_image['alt'] ?>"/></div>
            <?php endif; ?>
            <div class="single-article__author-info">
                <p class="single-article__author-name"><?= $author_label; ?></p>
                <div class="single-article__info-list">
                    <div class="single-article__info-item">
                        <span class="single-article__info-parameter"><?= __( 'Published:', 'routeone' ) ?></span>
                        <span class="single-article__info-value"><?= get_the_date(); ?></span>
                    </div>
                    <div class="single-article__info-item">
                        <span class="single-article__info-parameter"><?= __( 'Last Updated:', 'routeone' ) ?></span>
                        <span class="single-article__info-value"><?= get_the_modified_date(); ?></span>
                    </div>
                    <div class="single-article__info-item">
                        <span class="single-article__info-parameter"><?= __( 'Category:', 'routeone' ) ?></span>
                        <span class="single-article__info-value"><?= $category[0]->name ?></span>
                    </div>
                    <div class="single-article__info-item">
                        <span class="single-article__info-parameter"><?= __( 'Reading time:', 'routeone' ) ?></span>
                        <span class="single-article__info-value"><?= routeone_reading_time(); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-article__socials">
            <a href="<?php the_permalink(); ?>" class="single-article__socials-link copy-link"><img
                        src="<?php echo TDU; ?>/assets/dist/img/svg/copy-link-button.svg" alt="copy link"/></a>
            <?php echo do_shortcode( '[addtoany]' ) ?>
        </div>
    </div>
    <div class="single-article__wrapper ">
        <div class="single-article__main">
            <div class="single-article__article">
                <?php the_post_thumbnail('full'); ?>
                <?php the_content(); ?>
                <div class="single-article__about-author">
                    <?php if ( ! empty( $author_image ) ): ?>
                        <div class="single-article__author-avatar-big">
                            <img src="<?php echo $author_image['url'] ?>"
                                 alt="<?php echo $author_image['alt'] ?>"/>
                        </div>
                    <?php endif; ?>
                    <article class="single-article__author-article">
                        <h3 class="title title--03 no-padding"><?php echo $author_label; ?></h3>
                        <p>
                            <?= $author_description; ?>
                        </p>
                    </article>
                </div>
            </div>
            <?php
            $content        = get_the_content();
            $headings_array = array();
            $pattern        = '/<h\d[^>]*>(.*?)<\/h\d>/i';
            preg_match_all( $pattern, $content, $matches );
            if ( isset( $matches[1] ) && ! empty( $matches[1] ) ) {
                $headings_array = $matches[1];
            }
            if ( count( $headings_array ) ) {
                ?>
                <div class="single-article__nav">
                    <p class="single-article__nav-title text-18"><?php _e( 'In this article', 'routeone' ); ?></p>
                    <?php
                    foreach ( $headings_array as $key => $value ) {
                        ?>
                        <a href="#<?php echo sanitize_title( $value ); ?>" class="single-article__nav-link">
                            <p><?php echo $value; ?></p></a>
                        <?php
                    }
                    if ( strpos( $content, 'acf/faq-section' ) !== false ) {
                        ?>
                        <a href="#faq" class="single-article__nav-link"><p><?= __( 'FAQ', 'routeone' ) ?></p></a>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>

        <?php
        $args  = array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post__not_in'   => [$post_id],
            'cat'            => $category[0]->term_id
        );
        $query = new WP_Query( $args );
        ?>

        <section class="container blog-posts mb-128">
                <h2 class="title title--02"><?= __( 'You might also like', 'routeone' ) ?></h2>
            <?php if ( $query->have_posts() ) : ?>
                <div class="blog-cards">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <?php $featured_image_url = get_the_post_thumbnail_url(); ?>
                        <a href="<?= get_permalink(); ?>" class="blog-cards__item">
                            <img class="blog-cards__item-image" src="<?= $featured_image_url; ?>"
                                 alt="town im mountains"/>
                            <div class="blog-cards__item-description">
                                <div class="blog-cards__item-row">
                                    <span class="blog-cards__item-type"><?= $category[0]->name ?></span>
                                    <span class="blog-cards__item-date"><?= get_the_modified_date(); ?></span>
                                </div>
                                <p class="blog-cards__item-title"><?= get_the_title(); ?></p>
                                <p class="blog-cards__item-text">
                                    <?= get_the_excerpt(); ?>
                                </p>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </section>

        <div class="container mb-128">
            <div class="contact-us">
                <?php if ( ! empty( $anhor ) ): ?>
                    <em class="contact-us__anchor" id="<?= $anhor; ?>"></em>
                <?php endif; ?>
                <?php if ( have_rows( 'contact_block', 'option' ) ) : ?>
                    <?php while ( have_rows( 'contact_block', 'option' ) ) : the_row(); ?>
                        <?php if ( get_sub_field( 'hide_this_block' ) == 0 ) : ?>
                            <?php
                            $title = get_sub_field( 'title' );
                            ?>
                            <article class="contact-us__content">
                                <?php if ( ! empty( $title ) ): ?>
                                    <h3 class="title title--03 no-padding contact-us__title"><?= $title; ?></h3>
                                <?php endif; ?>
                                <?php if ( have_rows( 'contact' ) ) : ?>
                                    <div class="contact-us__info">
                                        <?php while ( have_rows( 'contact' ) ) : the_row(); ?>
                                            <?php
                                            $label = get_sub_field( 'label' );
                                            $link  = get_sub_field( 'link' );
                                            ?>
                                            <?php if ( ! empty( $label ) || ! empty( $link ) ): ?>
                                                <div class="contact-us__info-item">
                                                    <?= $label; ?>
                                                    <?php if ( ! empty( $link ) ): ?>
                                                        <a class="contact-us__info-link"
                                                           href="<?= $link['url']; ?>" <?= $link['target'] ? 'target="_blank" rel="noopener"' : ''; ?>>
                                                            <?= $link['title']; ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </article>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>


                <?php
                $anhor          = get_field( 'anhor', 'option' );
                $form_shortcode = get_field( 'form_shortcode', 'option' );
                if ( ! empty( $form_shortcode ) ): ?>
                    <div class="contact-us__form">
                        <?= do_shortcode( $form_shortcode ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>