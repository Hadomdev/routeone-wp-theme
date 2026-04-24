<?php

$title          = get_field( 'transfers_title' );
$title_shadow   = get_field( 'transfers_shadow_title' );
$desc           = get_field( 'transfers_description' );
$button         = ! empty( get_field( 'transfers_button_text' ) ) ? get_field( 'transfers_button_text' ) : 'View more';
$choose         = get_field( 'transfers_self-selected_posts' );
$posts_per_page = get_option( 'posts_per_page' );
$post_type      = 'transfers';

if ( ! empty( $choose ) ) {

    $type_choose = 'posts';

    $posts = get_field( 'transfers_choice_transfers_posts' );

} else {
    $type_choose = 'taxes';

    $service_ids = get_field( 'transfers_choose_transfers' );

    $args = array(
        'post_type'      => 'transfer',
        'posts_per_page' => - 1,
        'orderby'        => 'modified',
        'order'          => 'DESC',
        'tax_query'      => array(
            array(
                'taxonomy' => 'transfer_category',
                'field'    => 'id',
                'terms'    => $service_ids,
            ),
        ),
    );


    $posts       = get_posts( $args );
    $service_ids = implode( ',', $service_ids );

}

$first_transfers = array_slice( $posts, 0, $posts_per_page );
$max_paged       = ceil( count( $posts ) / $posts_per_page );

?>


<?php if ( ! empty( $first_transfers ) ): ?>
    <section class="transfers container mb-80">

        <h2 class="title title--02" data-shadow="<?= $title_shadow; ?>"><?= $title; ?></h2>

        <div class="transfers__text">
            <?= $desc; ?>
        </div>
        <div class="transfers__list" id="<?= $post_type ?>-response">

            <?php foreach ( $first_transfers as $transfer ):
                $ID = $transfer->ID;

                get_template_part( 'template-parts/content', $post_type, $ID );

            endforeach; ?>

        </div>

        <?php if ( count( $posts ) > $posts_per_page ): ?>

            <button class="btn transfers__load-more" id="transfers__load-more" data-paged="1"
                    data-max_paged="<?= $max_paged; ?>" data-type="<?= $type_choose; ?>"
                    data-post_type="<?= $post_type ?>" data-service_ids="<?= $service_ids ?>">
                <?= $button; ?>
            </button>

        <?php endif; ?>

    </section>
<?php endif; ?>
