<?php
get_header(); // Підключаємо заголовок
?>

<div class="breadcrumb-block">
	<div class="container">
		<?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>', true);
		}
		?>
	</div>
</div>

<section class="category-products">
	<div class="container">
		<?php if (is_tax('product_cat')) : ?>
			<h1><?php single_term_title();
					?></h1>

		<?php endif; ?>

		<div class="category-products__list">
			<?php if (have_posts()) : ?>
				<?php
				while (have_posts()) : the_post();
					$product = wc_get_product(get_the_ID());
					$image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

					// Перевірка, чи є зображення. Якщо немає, використовуємо заглушку
					if (!$image_url) {
						$image_url = wc_placeholder_img_src(); // Заглушка WooCommerce
					}
				?>
					<a href="<?php the_permalink(); ?>" class="single-product">
						<div class="category-block__img">
							<img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" />
						</div>
						<h3><?php the_title(); ?></h3>
					</a>
				<?php endwhile; ?>
			<?php else : ?>
				<p><?php _e('No products found', 'your-theme-text-domain'); ?></p>
			<?php endif; ?>
		</div>

	</div>
</section>


<?php
$form_global = get_field('form_global', 'options');
if ($form_global) {
	$title = isset($form_global['title']) ? $form_global['title'] : null;
	$description = isset($form_global['description']) ? $form_global['description'] : null;
	$form_shortcode = isset($form_global['form_shortcode']) ? $form_global['form_shortcode'] : null;
?>
	<section class="form-block">
		<div class="container">
			<div class="form-block__box">
				<?php if (!empty($title)): ?>
					<h2><?php echo $title ?></h2>
				<?php endif; ?>
				<?php if (!empty($description)): ?>
					<div class="form-block__desc desc"><?php echo $description ?></div>
				<?php endif; ?>
				<?php if (!empty($form_shortcode)): ?>
					<div class="form-block__form "> <?php echo do_shortcode($form_shortcode); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php
}
?>


<section class="category-description">
	<div class="container">


		<?php echo term_description();
		?>
	</div>
</section>
<?php
get_footer();
