<?php

add_action( 'wp_ajax_transfer-load_more', 'transfer_load_more' );
add_action( 'wp_ajax_nopriv_transfer-load_more', 'transfer_load_more' );

function transfer_load_more() {

    $posts     = [];
    $paged     = ! empty( $_POST['paged'] ) ? $_POST['paged'] : 1;
    $max_paged = ! empty( $_POST['max_paged'] ) ? $_POST['max_paged'] : 1;
    $type      = ! empty( $_POST['type'] ) ? $_POST['type'] : 'none';
    $post_type = ! empty( $_POST['post_type'] ) ? $_POST['post_type'] : 'service-item';

    if ( $type == 'taxes' ) {

        $terms = get_field( 'transfers_choose_transfers' );
        $service_ids = ! empty( $_POST['service_ids'] ) ? $_POST['service_ids'] : '';

        $args = array(
            'post_type' => 'transfer',
            'orderby'   => 'date',
            'order'     => 'DESC',
            'paged'     => $paged,
            'tax_query' => array(
                array(
                'taxonomy' => 'transfer_category',
                'field'    => 'id',
                'terms'    => $service_ids
                ),
            )
        );


    } elseif ( $type == 'service' ) {

        $service_ids = ! empty( $_POST['service_ids'] ) ? $_POST['service_ids'] : '';
        $current_post_id =  ! empty( $_POST['current_post'] ) ? $_POST['current_post'] : '';


        $args = [
            'post_type' => 'service',
            'orderby'   => 'DESC',
            'paged'     => $paged,
            'post__not_in'   => [ $current_post_id ],
            'tax_query' => array(
                array(
                    'taxonomy' => 'city',
                    'field'    => 'id',
                    'terms'    => $service_ids
                )
            )
        ];

    } else {
        $post_in = get_field( 'transfers_choice_transfers_posts' );

        $args = array(
            'post_type' => 'transfer',
            'orderby'   => 'date',
            'order'     => 'DESC',
            'paged'     => $paged,
            'post__in'  => $post_in,
        );

    }

    $q = new WP_Query( $args );

    if ( $q->have_posts() ) {
        while ( $q->have_posts() ) : $q->the_post();

            ob_start();

            $ID = get_the_ID();

            get_template_part( 'template-parts/content', $post_type, $ID );

            $posts[] = ob_get_clean();

        endwhile;
    } else {

        $results = [
            'none'         => true
        ];
        wp_send_json( $results );
    }
    wp_reset_postdata();


    $results = [
        'paged'       => $paged,
        'max_pages'   => $max_paged,
        'posts'       => $posts,
        'type_choose' => $type,
        'post_type' => $post_type,
        '$args' => $args,
        'service_ids' => $service_ids,
    ];

    wp_send_json( $results );
    die();
}