<?php

$title_tag = get_field( 'is_h1' );

if ( have_rows( 'faq_list' ) ) {
    ?>
    <section class="faq container mb-128">
        <?php if ( $title_tag ): ?>
            <h1 class="faq__title title title--02 no-padding" id="faq"><?php the_field( 'title' ); ?></h1>
        <?php else: ?>
            <h2 class="faq__title title title--02 no-padding" id="faq"><?php the_field( 'title' ); ?></h2>
        <?php endif; ?>
        <div class="faq__list">
            <?php
            while ( have_rows( 'faq_list' ) ) {
                the_row();
                ?>
                <div class="faq__item">
                    <div class="faq__item-question title-18">
                        <?php the_sub_field( 'question' ); ?>
                    </div>
                    <div class="faq__item-answer">
                        <div class="faq__item-answer-wrapper">
                            <p>
                                <?php the_sub_field( 'answer' ); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <?php
}
?>