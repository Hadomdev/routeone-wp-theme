<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RouteOne
 */

$first_menu_name  = wp_get_nav_menu_object( '30' );
$second_menu_name = wp_get_nav_menu_object( '31' );

$messenger_icon = get_field('messenger_icon', 'option');
$messenger_link = get_field('messenger_link', 'option');


?>

<footer class="footer">
    <div class="footer__holder container">
        <?php if ( have_rows( 'footer_top_row', 'option' ) ) : ?>
            <?php while ( have_rows( 'footer_top_row', 'option' ) ) : the_row(); ?>
                <?php $logo = get_sub_field( 'logo' ); ?>
                <div class="footer__row">
                    <?php if ( ! empty( $logo ) ): ?>
                        <a href="<?= home_url(); ?>" class="footer__logo">
                            <img src="<?= $logo['url']; ?>" alt="<?= $logo['alt']; ?>"/>
                        </a>
                    <?php endif; ?>
                    <?php if ( have_rows( 'social_link_list' ) ) : ?>
                        <div class="footer__socials">
                            <?php while ( have_rows( 'social_link_list' ) ) : the_row(); ?>
                                <?php
                                $icon = get_sub_field( 'icon' );
                                $text = get_sub_field( 'text' );
                                $link = get_sub_field( 'link' );
                                ?>
                                <?php if ( ! empty( $link ) ): ?>
                                    <a href="<?= $link; ?>"
                                       class="footer__socials-item" target="_blank" rel="noopener">
                                        <?php if ( ! empty( $icon ) ): ?>
                                            <img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>"/>
                                        <?php endif; ?>
                                        <span><?= $text; ?></span>
                                    </a>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <nav class="footer__nav footer__row">
            <?php if ( ! empty( $first_menu_name ) ): ?>
                <div class="footer__nav-column">
                    <div class="footer__nav-title"><?php echo $first_menu_name->name ?></div>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'footer-first-column',
                            'depth'          => 1,
                            'container'      => 'nav',
                            'fallback_cb'    => false
                        )
                    ); ?>
                </div>
            <?php endif; ?>
            <?php if ( ! empty( $second_menu_name ) ): ?>
                <div class="footer__nav-column">
                    <div class="footer__nav-title"><?php echo $second_menu_name->name ?></div>
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'footer-second-column',
                            'depth'          => 1,
                            'container'      => 'nav',
                            'fallback_cb'    => false
                        )
                    ); ?>
                </div>
            <?php endif; ?>
            <?php if ( have_rows( 'footer_address', 'option' ) ) : ?>
                <?php while ( have_rows( 'footer_address', 'option' ) ) : the_row();
                    $title = get_sub_field( 'title' );
                    ?>
                    <div class="footer__nav-column">
                        <div class="footer__nav-title"><?php echo $title; ?></div>
                        <ul>
                            <?php while ( have_rows( 'address_rows' ) ) : the_row();
                                $text = get_sub_field( 'row' );
                                ?>
                                <li><?php echo $text; ?></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php if ( have_rows( 'contacts_group', 'option' ) ) : ?>
                <?php while ( have_rows( 'contacts_group', 'option' ) ) : the_row();
                    $title = get_sub_field( 'title' );
                    $phone = get_sub_field( 'phone' );
                    $mail = get_sub_field( 'mail' );

                    $separator        = '@';
                    $mail_parts       = explode( $separator, $mail );
                    $first_part_mail  = '';
                    $second_part_mail = '';

                    $i = 0;

                    foreach ( $mail_parts as $mail_part ) {
                        if ( $i === 0 ) {
                            $first_part_mail = $mail_part . $separator;
                        } else {
                            $second_part_mail = $mail_part;
                        }

                        $i ++;
                    }
                    ?>
                    <div class="footer__nav-column">
                        <div class="footer__nav-title"><?php echo $title; ?></div>
                        <ul>
                            <li>
                                <a href="tel:<?php echo $phone; ?>" class="footer__link">
                                    <?= __('Phone:', 'routeone') ?>
                                    <?php echo $phone; ?>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:<?php echo $mail; ?>" class="footer__link">
                                    <?= __('Email: ', 'routeone') ?>
                                    <span class="footer__link_mail"><?= $first_part_mail;?></span><span><?= $second_part_mail; ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </nav>
        <?php if ( have_rows( 'footer_bottom_row', 'option' ) ) : ?>
            <?php while ( have_rows( 'footer_bottom_row', 'option' ) ) : the_row(); ?>
                <?php
                $copyright_text = get_sub_field( 'copyright_text' );
                $privacy        = get_sub_field( 'privacy_policy' );
                ?>
                <div class="footer__row">
                    <?php if ( ! empty( $copyright_text ) ): ?>
                        <p><?= $copyright_text; ?></p>
                    <?php endif; ?>
                    <?php if ( ! empty( $privacy ) ): ?>
                        <a href="<?= $privacy['url']; ?>" <?php echo ! empty( $privacy['target'] ) ? 'target="_blank" rel="noopener"' : '' ?>
                           class="footer__link"><?= $privacy['title']; ?></a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</footer>

<div class="messenger">
    <?php if (!empty($messenger_link)): ?>
        <a href="<?= $messenger_link; ?>" target="_blank" rel="noopener">
            <img src="<?= $messenger_icon; ?>" alt="Messenger">
        </a>
    <?php endif; ?>
</div>

<div class="form-modal">
    <div class="form-modal__wrapper">
        <div class="form-modal__title"></div>
        <p class="form-modal__text"></p>
        <button class="btn btn--small form-modal__send-btn"><?= __('Close', 'routeone'); ?></button>
        <button class="form-modal__close-btn"><img src="<?php echo get_template_directory_uri() ?>/assets/dist/img/svg/close.svg" alt="close" /></button>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
