<?php
/*
* Blog page
*/
get_header();


?>
    <main class="page__main">
        <div class="page-header container blog-page__title">
            <h1 class="title title--01"
                data-shadow="Transfer services"><?php echo get_the_title( get_option( 'page_for_posts', true ) ); ?></h1>
        </div>
        <section class="container blog-posts mb-128">
            <div class="blog-posts__categories">
                <a class="btn btn--secondary-stroke btn--small current"
                   href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php _e( 'All', 'routeone' ); ?></a>
                <?php
                $categories = get_categories();
                foreach ( $categories as $key => $value ) {
                    ?>
                    <a class="btn btn--secondary-stroke btn--small"
                       href="<?php echo get_category_link( $value ); ?>"><?php echo $value->name; ?></a>
                    <?php
                }
                ?>
            </div>
            <div class="blog-cards">
                <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args  = [
                    'post_type'      => 'post',
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'posts_per_page' => 18,
                    'paged'          => $paged,
                ];
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        get_template_part( 'template-parts/cards/post-card' );
                    }
                }
                ?>

            </div>
            <div class="blog-posts__pagination">
                <div class="blog-posts__pagination-items">
                    <?php
                    $prev_btn   = '<button type="button" class="btn btn--secondary-stroke">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" fill="none">
								<path
								d="M2.6833 9.55771L8.3083 3.93271C8.42558 3.81543 8.58464 3.74955 8.75049 3.74955C8.91634 3.74955 9.0754 3.81543 9.19268 3.93271C9.30995 4.04998 9.37584 4.20904 9.37584 4.3749C9.37584 4.54075 9.30995 4.69981 9.19268 4.81708L4.63408 9.3749L16.8755 9.3749C17.0412 9.3749 17.2002 9.44074 17.3174 9.55795C17.4346 9.67516 17.5005 9.83414 17.5005 9.9999C17.5005 10.1657 17.4346 10.3246 17.3174 10.4418C17.2002 10.559 17.0412 10.6249 16.8755 10.6249L4.63408 10.6249L9.19268 15.1827C9.30995 15.3 9.37584 15.459 9.37584 15.6249C9.37584 15.7907 9.30995 15.9498 9.19268 16.0671C9.0754 16.1844 8.91634 16.2502 8.75049 16.2502C8.58464 16.2502 8.42558 16.1844 8.3083 16.0671L2.6833 10.4421C2.62519 10.384 2.57909 10.3151 2.54764 10.2392C2.51619 10.1634 2.5 10.082 2.5 9.9999C2.5 9.91776 2.51619 9.83643 2.54764 9.76056C2.57909 9.68468 2.62519 9.61575 2.6833 9.55771Z"
								/>
							</svg>
						</button>';
                    $next_btn   = '<button type="button" class="btn btn--secondary-stroke">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path
								d="M20.7806 12.5306L14.0306 19.2806C13.8899 19.4213 13.699 19.5003 13.5 19.5003C13.301 19.5003 13.1101 19.4213 12.9694 19.2806C12.8286 19.1398 12.7496 18.949 12.7496 18.7499C12.7496 18.5509 12.8286 18.36 12.9694 18.2193L18.4397 12.7499H3.75C3.55109 12.7499 3.36032 12.6709 3.21967 12.5303C3.07902 12.3896 3 12.1988 3 11.9999C3 11.801 3.07902 11.6103 3.21967 11.4696C3.36032 11.3289 3.55109 11.2499 3.75 11.2499H18.4397L12.9694 5.78055C12.8286 5.63982 12.7496 5.44895 12.7496 5.24993C12.7496 5.05091 12.8286 4.86003 12.9694 4.7193C13.1101 4.57857 13.301 4.49951 13.5 4.49951C13.699 4.49951 13.8899 4.57857 14.0306 4.7193L20.7806 11.4693C20.8504 11.539 20.9057 11.6217 20.9434 11.7127C20.9812 11.8038 21.0006 11.9014 21.0006 11.9999C21.0006 12.0985 20.9812 12.1961 20.9434 12.2871C20.9057 12.3782 20.8504 12.4609 20.7806 12.5306Z"
								/>
							</svg>
						</button>';
                    $pagination = paginate_links( array(
                        'base'               => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'              => $query->max_num_pages,
                        'current'            => max( 1, get_query_var( 'paged' ) ),
                        'format'             => '?paged=%#%',
                        'show_all'           => false,
                        'type'               => 'plain',
                        'end_size'           => 2,
                        'mid_size'           => 2,
                        'prev_next'          => true,
                        'prev_text'          => $prev_btn,
                        'next_text'          => $next_btn,
                        'before_page_number' => '<button type="button" class="btn btn--tetriary">',
                        'after_page_number'  => '</button>',
                    ) );
                    echo $pagination;
                    ?>
                </div>
            </div>
        </section>
        <?php
        $anhor          = get_field( 'anhor', 'option' );
        $form_shortcode = get_field( 'form_shortcode', 'option' );
        ?>

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
                <?php if ( ! empty( $form_shortcode ) ): ?>
                    <div class="contact-us__form">
                        <?= do_shortcode($form_shortcode); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
<?php
get_footer();
?>