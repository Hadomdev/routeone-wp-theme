<?php
    $title = get_field( 'title' );
    $title_shadow = get_field( 'title_shadow' );
    $content = get_field('content_under_title');
?>

<div class="benefits-section container mb-80">
    <?php if(!empty($title)):?>
        <h2 class="title title--02" data-shadow="<?= $title_shadow;?>">
            <?= $title;?>
        </h2>
    <?php endif;?>
    <?php
        if(!empty($content)):
            ?>
            <div class="service-detail__text"><?php echo $content; ?></div>
            <?php
        endif;
    ?>
    <?php if ( have_rows( 'cards_list' ) ) : ?>
        <div class="benefit">
            <?php while ( have_rows( 'cards_list' ) ) : the_row(); ?>
                <?php
                    $icon = get_sub_field( 'icon' );
                    $heading = get_sub_field( 'heading' );
                    $text = get_sub_field( 'text' );
                ?>
                <article class="benefit__card">
                    <?php if(!empty($icon)):?>
                        <div class="benefit__icon-box">
                            <img class="benefit__icon" src="<?= $icon['url'];?>" alt="<?= $icon['alt'];?>" />
                        </div>
                    <?php endif;?>
                    <?php if(!empty($heading)):?>
                        <span class="benefit__title"><?= $heading;?></span>
                    <?php endif;?>
                    <?php if(!empty($text)):?>
                        <div class="benefit__text">
                            <?= $text;?>
                        </div>
                    <?php endif;?>
                </article>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>