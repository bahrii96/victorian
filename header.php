<!DOCTYPE html>
<html lang="en-US">

<head>
	<?php
	get_template_part('structure/meta');
	wp_head();
	?>
</head>
<?php
$link_first = get_field('link_first', 'options');
$link_second = get_field('link_second', 'options');
?>
<?php $mainpath = get_stylesheet_directory_uri(); ?>

<body <?php body_class(); ?>>

	<header class="header">
		<div class="container">
			<a href="<?php echo home_url('/'); ?>" class="logo" aria-label="Site Logo">
				<?php
				$custom_logo_id = get_theme_mod('custom_logo_site');
				if ($custom_logo_id) :
					$logo_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
					$logo_title = get_the_title($custom_logo_id);
					echo wp_get_attachment_image($custom_logo_id, 'full', false, [
						'alt' => $logo_alt,
						'title' => $logo_title,
						'loading' => 'eager'
					]);
				endif;
				?>
			</a>
			<nav>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary_left',
					'menu_class' => 'main-nav',
					'walker' => new Custom_Walker_Nav_Menu
				));
				?>
			</nav>
			<div class="header__list-btn">
				<div class="header__btn-first">
					<?php echo initLinkHref($link_first, 'btn-tr btn-sm') ?>
				</div>
				<div class="header__btn-second">
					<?php echo initLinkHref($link_second, 'btn-sm ') ?>
				</div>
			</div>
			<span class="menu-toggle">
				<small></small>
			</span>
		</div>
	</header>