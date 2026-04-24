<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RouteOne
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<?php if ( have_rows( 'header_section', 'option' ) ) : ?>
		<?php while ( have_rows( 'header_section', 'option' ) ) : the_row(); ?>
			<?php
				$logo = get_sub_field( 'logo' );
				$menu = wp_get_nav_menu_items(get_sub_field( 'menu_name' ));
				$right_button = get_sub_field( 'right_button' );
			?>
			<header class="header">
				<div class="header__holder container">
					<?php if(!empty($logo)): ?>
						<a href="<?= home_url(); ?>" class="header__logo">
							<img src="<?= $logo['url'];?>" alt="<?= $logo['alt'];?>" />
						</a>
					<?php endif;?>
					<nav class="header__nav">
						<?php if(!empty($menu)): ?>
							<ul>
								<?php foreach($menu as $menu_item): ?>
									<li><a href="<?= $menu_item->url;?>"><?= $menu_item->title;?></a></li>
								<?php endforeach;?>
							</ul>
						<?php endif;?>
						<?php if(!empty($right_button)):?>
							<a href="<?= $right_button['url'];?>" class="btn btn--small" <?= $right_button['target']?'target="_blank" rel="noopener"':'';?>>
								<?= $right_button['title'];?>
							</a>
						<?php endif;?>
						<button class="header__nav-opener"><span class="header__nav-opener-line"></span></button>
					</nav>
				</div>
			</header>
		<?php endwhile; ?>
	<?php endif; ?>
