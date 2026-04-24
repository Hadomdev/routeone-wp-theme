<?php
    $anhor = get_field( 'anhor' );
    $form_shortcode = get_field( 'form_shortcode' );
?>

<div class="container mb-80">
    <div class="contact-us">
        <?php if(!empty($anhor)):?>
            <em class="contact-us__anchor" id="<?= $anhor;?>"></em>
        <?php endif;?>
        <?php if ( have_rows( 'contact_block' ) ) : ?>
            <?php while ( have_rows( 'contact_block' ) ) : the_row(); ?>
                <?php if ( get_sub_field( 'hide_this_block' ) == 0 ) : ?>
                    <?php
                        $title = get_sub_field( 'title' );
                    ?>
                    <article class="contact-us__content">
                        <?php if(!empty($title)):?>
                            <p class="title title--03 no-padding contact-us__title"><?= $title;?></p>
                        <?php endif;?>
                        <?php if ( have_rows( 'contact' ) ) : ?>
                            <div class="contact-us__info">
                                <?php while ( have_rows( 'contact' ) ) : the_row(); ?>
                                    <?php
                                        $label = get_sub_field( 'label' );
                                        $link = get_sub_field( 'link' );
                                    ?>
                                    <?php if(!empty($label) || !empty($link)):?>
                                        <div class="contact-us__info-item">
                                            <?= $label;?>
                                            <?php if(!empty($link)):?>
                                                <a class="contact-us__info-link" href="<?= $link['url'];?>" <?= $link['target']?'target="_blank" rel="noopener"':'';?>>
                                                    <?= $link['title'];?>
                                                </a>
                                            <?php endif;?>
                                        </div>
                                    <?php endif;?>
                                <?php endwhile;?>
                            </div>
                        <?php endif;?>
                    </article>
                <?php endif;?>
            <?php endwhile;?>
        <?php endif;?>
        <?php if(!empty( $form_shortcode)):?>
            <div class="contact-us__form">
                <?= $form_shortcode;?>
            </div>
        <?php endif;?>
    </div>
</div>