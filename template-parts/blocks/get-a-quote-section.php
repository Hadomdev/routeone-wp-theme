<?php
$background       = get_field( 'background' );
$title            = get_field( 'title' );
$title_shadow     = get_field( 'title_shadow' );
$text_after_title = get_field( 'text_after_title' );
$form_shortcode   = get_field( 'form_shortcode' );
$background_style = '';
if ( ! empty( $background ) ) {
    $background_style = 'style="background: center / cover no-repeat url(' . $background['url'] . ')"';
}

$height = ! empty( get_field( 'screen_size_height' ) ) ? '80vh' : '';
?>
<?php if ( ! empty( $height ) || ! empty( $background ) ): ?>
    <style>
        .contact-us-page {
        <?php if ( !empty($background) ): ?> background: center / cover no-repeat url('<?= $background['url']; ?>');
        <?php endif; ?><?php if ( !empty($height) ): ?> height: <?= $height ?>;
            min-height: 750px;
        <?php endif; ?>
        }

        @media (max-width: 767px) {
            .contact-us-page {
                height: auto;
            }
        }
    </style>

<?php endif; ?>

<div class="contact-us-page section-shadow">
    <section class="container block-shadow">
        <?php if ( ! empty( $title ) ): ?>
            <h1 class="title title__light title--common" data-shadow="<?= $title_shadow; ?>"><?= $title; ?></h1>
        <?php endif; ?>
        <?php if ( ! empty( $text_after_title ) ): ?>
            <div class="contact-us-page__text">
                <?= $text_after_title; ?>
            </div>
        <?php endif; ?>
        <div class="contact-us">
            <?php if ( have_rows( 'contact_info' ) ) : ?>
                <?php while ( have_rows( 'contact_info' ) ) : the_row();
                    $block_heading = get_sub_field( 'block_heading' );
                    $content       = get_sub_field( 'content' );
                    $blur          = get_sub_field( 'blur_background' );
                    $class         = '';
                    if ( ! empty( $blur ) ) {
                        $class = 'blur';
                    }
                    ?>
                    <article class="contact-us__content <?= $class; ?>">
                        <?php if ( ! empty( $block_heading ) ): ?>
                            <h3 class="title title--03 no-padding contact-us__title"><?= $block_heading; ?></h3>
                        <?php endif; ?>
                        <?php if ( have_rows( 'info' ) ) : ?>
                            <div class="contact-us__info">
                                <?php while ( have_rows( 'info' ) ) : the_row(); ?>
                                    <?php $link = get_sub_field( 'link' ); ?>
                                    <div class="contact-us__info-item">
                                        <?php the_sub_field( 'label' ); ?>
                                        <?php if ( ! empty( $link ) ): ?>
                                            <a href="<?= $link['url']; ?>"
                                               class="contact-us__info-link" <?= $link['target'] ? 'target="_blank" rel="noopener"' : ''; ?>>
                                                <?= $link['title']; ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( ! empty( $content ) ): ?>
                            <div class="contact-us__text">
                                <?= $content; ?>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php if ( ! empty( $form_shortcode ) ): ?>
                <div class="contact-us__form white">
                    <?= do_shortcode( $form_shortcode ); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>