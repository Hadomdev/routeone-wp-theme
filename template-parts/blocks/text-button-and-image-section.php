<?php
    $title = get_field( 'title' );
    $text = get_field( 'text' );
    $image = get_field( 'image' );
    $button = get_field( 'button' );
?>

<section class="container mb-128">
    <div class="description-section">
        <div class="description-section__article">
            <?php if(!empty($title)):?>
                <h2 class="title no-padding title--03 description-section__title"><?= $title;?></h2>
            <?php endif;?>
            <?php if(!empty($text)):?>
                <div class="description-section__text">
                    <?= $text;?>
                </div>
            <?php endif;?>
            <?php if(!empty($button)):?>
                <a href="<?= $button['url'];?>" class="btn btn--secondary" <?= $button['target']?'target="_blank" rel="noopener"':'';?>>
                    <?= $button['title'];?>
                </a>
            <?php endif;?>
        </div>
        <?php if(!empty($image)):?>
            <div class="description-section__image">
                <img src="<?= $image['url'];?>" alt="<?= $image['alt'];?>"/>
            </div>
        <?php endif;?>
    </div>
</section>