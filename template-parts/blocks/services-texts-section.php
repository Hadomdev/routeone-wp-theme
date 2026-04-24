<?php
$title = get_field( 'title' );
$title_shadow = get_field( 'title_shadow' );
?>

<section class="container mb-128">
    <?php if(!empty($title)):?>
        <h2 class="title title--02" data-shadow="<?= $title_shadow;?>">
            <?= $title;?>
        </h2>
    <?php endif;?>
    <?php if ( have_rows( 'tabs_list' ) ) : ?>
        <div class="tabs">
            <div class="tabs__list">
                <?php $counter = 1;?>
                <?php while ( have_rows( 'tabs_list' ) ) : the_row(); ?>
                    <div class="tab <?= $counter == 1?'active':'';?>" data-tab-index="tab0<?= $counter;?>">
                        <p><?php the_sub_field( 'tab_name' ); ?></p>
                    </div>
                    <?php $counter++;?>
                <?php endwhile; ?>
            </div>
            <?php $counter = 1;?>
            <?php while ( have_rows( 'tabs_list' ) ) : the_row(); ?>
                <div class="tab__content <?= $counter == 1?'active':'';?>" data-tab-index="tab0<?= $counter;?>">
                    <div class="tab__content-holder">
                        <div class="tab__content-text">
                            <h3 class="title no-padding title--03">
                                <?php the_sub_field( 'tab_name' ); ?>
                            </h3>
                            <div class="tab__content-paragraphs">
                                <?php the_sub_field( 'tab_content' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $counter++;?>
            <?php endwhile; ?>
        </div>
    <?php endif;?>
</section>