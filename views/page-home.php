<?php /* Template name: Home Page */
get_header();
$main_template = get_field('main_template');
$mainpath = get_stylesheet_directory_uri();
if ($main_template) {
	$hero_group = $main_template['hero_group'];
	$benefits_group = $main_template['benefits_group'];
	$category_group = $main_template['category_group'];
	$works_group = $main_template['works_group'];
	$popular_group = $main_template['popular_group'];
	$form_group = $main_template['form_group'];
	$mission_group = $main_template['mission_group'];
};
?>
<main class="home-page">
	<?php if ($hero_group) :
		$slider = $hero_group['slider'];
		$soc = $hero_group['social'];
	?>
		<section class="hero-block">
			<div class="swiper  hero-block__swiper">
				<div class="swiper-wrapper">
					<?php foreach ($slider as $item) {
						$overlay = $item['overlay'];
						$overlaymob = $item['overlay-mob'];
						$title = $item['title'];
						$button = $item['button'];
						$caption = $item['caption'];
					?>
						<div class="swiper-slide">
							<?php if ($overlay) : ?>
								<div class="hero-block__overlay" style="background-image: url(<?php echo $overlay['url'] ?>);"></div>
							<?php endif; ?>
							<div class="container">
								<div class="hero-block__box">
									<?php if ($title) : ?>
										<h1><?php echo $title ?></h1>
									<?php endif; ?>
									<div class="hero-block__caption">
										<?php echo $caption ?>
									</div>
									<?php if ($button) : ?>
										<div class="hero-block__btn">
											<?php echo initLinkHref($button, 'btn') ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
			<?php if ($soc) { ?>
				<div class="hero-block__soc">
					<div class="soc soc-list">
						<ul>
							<?php foreach ($soc as $item) {
								$overlay = $item['icon'];
								$link = $item['link'];
							?>
								<li>
									<a href="<?php echo $link ?>">
										<img src="<?php echo $overlay['url'] ?>" alt="<?php echo $overlay['title'] ?>" title="<?php echo $overlay['title'] ?>">
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			<?php } ?>
		</section>
	<?php endif; ?>

	<?php if ($benefits_group) :
		$list = $benefits_group['list'];
		$block_id = $benefits_group['block_id'];
	?>
		<section class="benefits-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<?php if (is_array($list)) : ?>
					<div class="benefits-block__list ">
						<?php foreach ($list as $item) {
							$title = $item['title'];
							$logo = $item['logo'];

						?>

							<div class="benefits-block__item">
								<?php if ($logo): ?>
									<div class="benefits-block__item-logo">
										<?php echo wp_get_attachment_image($logo, 'full'); ?>
									</div>
								<?php endif; ?>
								<h3><?php echo $title ?></h3>
							</div>
						<?php
						} ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($works_group) :
		$title = $works_group['title'];
		$list = $works_group['list'];
		$block_id = $works_group['block_id'];
	?>

		<section class="works-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<?php if ($title) : ?>
					<h2><?php echo $title ?></h2>
				<?php endif; ?>
				<?php if (is_array($list)) : ?>
					<div class="works-block__list ">
						<?php foreach ($list as $item) {
							$title = $item['title'];
						?>
							<div class="works-block__item">
								<h3><?php echo $title ?></h3>
							</div>
						<?php
						} ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($category_group) :
		$title = $category_group['title'];
		$block_id = $category_group['block_id'];
	?>
		<section class="category-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<?php if ($title) : ?>
					<h2><?php echo $title ?></h2>
				<?php endif; ?>

				<div class="category-block__list">
					<?php
					$product_categories = get_terms('product_cat', array(
						'orderby'    => 'name',
						'order'      => 'ASC',
						'hide_empty' => true,
					));

					if (!empty($product_categories) && !is_wp_error($product_categories)) {
						foreach ($product_categories as $category) {
							$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
							$image_url = wp_get_attachment_url($thumbnail_id);
							$name = $category->name;
							$count = $category->count;
							$category_link = get_term_link($category);

							// Перевірка, чи є зображення категорії. Якщо немає, використовуємо заглушку WooCommerce
							if ($image_url) {
								$image_tag = '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($name) . '">';
							} else {
								$image_tag = '<img src="' . esc_url(wc_placeholder_img_src()) . '" alt="' . esc_attr($name) . '">';
							}
					?>
							<a href="<?php echo esc_url($category_link); ?>" class="single-category">
								<div class="category-block__img">
									<?php echo $image_tag; ?>
								</div>
								<h3><?php echo esc_html($name); ?></h3>
							</a>
					<?php
						}
					}
					?>
				</div>

			</div>
		</section>
	<?php endif; ?>


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

	<?php if ($mission_group) :
		$list = $mission_group['list'];
		$title = $mission_group['title'];
	?>
		<section class="tags-block">
			<div class="container">
				<?php if ($title) : ?>
					<h2><?php echo $title ?></h2>
				<?php endif; ?>
				<?php if (is_array($list)) : ?>
					<div class="tags-block__list ">
						<?php foreach ($list as $item) {
							$title = $item['title'];
						?>
							<h3><?php echo $title ?></h3>
						<?php
						} ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>







	<?php if ($collection_group) :
		$block_id = $collection_group['block_id'];
		$title = $collection_group['title'];
		$list_product = $collection_group['list_product'];
	?>
		<section class="shop-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<?php if ($title) : ?>
					<h2>
						<?php echo $title ?>
					</h2>
				<?php endif; ?>
				<div class="row collection-row">
					<?php
					foreach ($list_product as $item) {
						$products = $item['products'];
						$posts = new WP_Query(array(
							'post_type' => 'product',
							'posts_per_page' => -1,
							'post_status'    => 'publish',
							'post__in' => $products,
							'orderby' => 'post__in',
						));
					?>
						<?php if ($posts) : ?>
							<?php
							initPostsViewPortfolio($posts, 'post-templates/post-item-col');
							?>
						<?php endif; ?>
					<?php
					} ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<?php if ($shop_group) :
		$block_id = $shop_group['block_id'];
		$title = $shop_group['title'];
		$list_product = $shop_group['list_product'];
		$button = $shop_group['button'];
	?>
		<section class="shop-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<?php if ($title) : ?>
					<h2>
						<?php echo $title ?>
					</h2>
				<?php endif; ?>
				<div class="shop-block__list">
					<?php
					foreach ($list_product as $item) {
						$products = $item['products'];
						$posts = new WP_Query(array(
							'post_type' => 'product',
							'posts_per_page' => -1,
							'post_status'    => 'publish',
							'post__in' => $products,
							'orderby' => 'post__in',
						));
					?>
						<?php if ($posts) : ?>
							<?php
							initPostsViewPortfolio($posts, 'post-templates/post-item');
							?>
						<?php endif; ?>
					<?php
					} ?>
				</div>
				<?php if ($button) : ?>
					<div class="shop-block__btn">
						<?php echo initLinkHref($button, 'btn') ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($certificate_group) :
		$block_id = $certificate_group['block_id'];
		$image = $certificate_group['image'];
		$caption = $certificate_group['caption'];
		$title = $certificate_group['title'];
		$description = $certificate_group['description'];
		$button = $certificate_group['button'];
	?>
		<section class="certificate-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<div class="certificate-block__box">
					<div class="certificate-block__left">
						<?php echo wp_get_attachment_image($image, 'full'); ?>
					</div>
					<div class="certificate-block__right">
						<?php if ($caption) : ?>
							<div class="certificate-block__caption">
								<?php echo $caption ?>
							</div>
						<?php endif; ?>
						<?php if ($title) : ?>
							<h2>
								<?php echo $title ?>
							</h2>
						<?php endif; ?>
						<?php if ($description) : ?>
							<div class="certificate-block__desc ">
								<?php echo $description ?>
							</div>
						<?php endif; ?>
						<?php if ($button) : ?>
							<div class="certificate-block__btn">
								<?php echo initLinkHref($button, 'btn') ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($gallery_group) :
		$block_id = $gallery_group['block_id'];
		$list = $gallery_group['list'];

	?>
		<section class="gallery-block" id="<?php echo $block_id  ?>">
			<div class="gallery-block__box">
				<?php if (is_array($list)) : ?>
					<?php foreach ($list as $item) {
						$image = $item['image'];
					?>
						<div class="gallery-block__item">
							<?php echo wp_get_attachment_image($image, 'full'); ?>
						</div>
					<?php } ?>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($mission_group) :
		$block_id = $mission_group['block_id'];
		$title = $mission_group['title'];
		$description = $mission_group['description'];
	?>
		<section class="mission-block" id="<?php echo $block_id ?>">
			<div class=" container">
				<?php if ($title) : ?>
					<h2><?php echo $title ?></h2>
				<?php endif; ?>
				<?php if ($description) : ?>
					<div class="mission-block__desc">
						<?php echo $description ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>