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
			<div class="header__top">
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

				<nav class="primary">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'primary_left',
						'menu_class' => 'main-nav',
						'walker' => new Custom_Walker_Nav_Menu
					));
					?>
					<div class="category">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'primary_category',
							'menu_class' => 'category-nav',
							'walker' => new Custom_Walker_Nav_Menu
						));
						?>
					</div>
				</nav>

				<div class="header__list-box">
					<div class="tel-box">
						<div class="tel">
							<?php echo initLinkHref($link_first,) ?>
						</div>
						<div class="tel">
							<?php echo initLinkHref($link_second,) ?>
						</div>
					</div>
					<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
						<button type="submit" value="<?php echo esc_attr_x('Search', 'submit button', 'woocommerce'); ?>"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g clip-path="url(#clip0_201_145)">
									<path d="M9.83641 0.101318C4.46641 0.101318 0.0976562 4.47007 0.0976562 9.84007C0.0976562 15.2101 4.47016 19.5751 9.83641 19.5751C12.2289 19.5751 14.4227 18.7051 16.1177 17.2688L22.8527 24.0001L23.6102 23.2426L16.9014 16.5301C18.5589 14.7826 19.5752 12.4276 19.5752 9.83632C19.5752 4.47007 15.2064 0.101318 9.83641 0.101318ZM1.17391 9.83632C1.17391 5.05882 5.06266 1.17007 9.84016 1.17007C14.6177 1.17007 18.5064 5.05882 18.5064 9.83632C18.5064 14.6138 14.6139 18.5026 9.83641 18.5026C5.05891 18.5026 1.17391 14.6138 1.17391 9.83632Z" fill="#1F1D1E" />
								</g>
								<defs>
									<clipPath id="clip0_201_145">
										<rect width="24" height="24" fill="white" />
									</clipPath>
								</defs>
							</svg>
						</button>
						<input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="<?php echo esc_attr__('Search products…', 'woocommerce'); ?>" value="<?php echo get_search_query(); ?>" name="s" />

						<input type="hidden" name="post_type" value="product" />
					</form>
				</div>
				<span class="menu-toggle">
					<small></small>
				</span>
			</div>
			<div class="header__bottom">
				<nav class="category">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'primary_category',
						'menu_class' => 'category-nav',
						'walker' => new Custom_Walker_Nav_Menu
					));
					?>
				</nav>
			</div>


		</div>
	</header>