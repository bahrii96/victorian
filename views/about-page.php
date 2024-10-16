<?php /* Template name: About Page */
get_header();
$about_template = get_field('about_template');

if ($about_template) {
	$mission_group = $about_template['mission_group'];
	$history_group = $about_template['history_group'];
	$faq_group = $about_template['faq_group'];
	$team_group = $about_template['team_group'];
	$form_group = $about_template['form_group'];
	$our_products_block = $about_template['our_products_block'];
};
?>
<main class="about-page">
	<div class="breadcrumb-block">
		<div class="container">
			<?php
			if (function_exists('yoast_breadcrumb')) {
				yoast_breadcrumb('<p id="breadcrumbs">', '</p>', true);
			}
			?>
		</div>
	</div>
	<?php if ($mission_group) :
		$image = $mission_group['image'];
		$image_second = $mission_group['image_second'];
		$title = $mission_group['title'];
		$description = $mission_group['description'];
		$button = $mission_group['button'];
	?>
		<section class="mission-block">
			<div class="container">
				<div class="mission-block__item">
					<div class="mission-block__inf">
						<h2><?php echo $title ?></h2>
						<div class="mission-block__inf-desc desc"><?php echo $description ?></div>
						<?php if ($button) { ?>
							<div class="mission-block__inf-btn"><?php echo initLinkHref($button, 'btn', true) ?></div>
						<?php } ?>
					</div>
					<div class="mission-block__img">
						<div class="mission-block__img-first" data-aos="fade-left" data-aos-delay="400"> <?php echo wp_get_attachment_image($image, 'full'); ?></div>
						<div class="mission-block__img-second" data-aos="fade-left" data-aos-delay="600"> <?php echo wp_get_attachment_image($image_second, 'full'); ?></div>
					</div>
				</div>

			</div>
		</section>
	<?php endif; ?>

	<?php if ($history_group) :
		$title = $history_group['title'];
		$list = $history_group['list_first'];
	?>
		<section class="history-block">
			<div class="container">
				<?php if ($title) : ?>
					<h2>
						<?php echo $title ?>
					</h2>
				<?php endif; ?>
				<div class="history-block__box">
					<div class="history-block__box-left">
						<div class="swiper  history-block__swiper ">
							<div class="swiper-wrapper">
								<?php if (is_array($list)) : ?>
									<?php foreach ($list as $item) {
										$image = $item['image'];
									?>
										<div class="swiper-slide history-block__slide">
											<div class="history-block__img">
												<?php echo wp_get_attachment_image($image, 'full'); ?>
											</div>
										</div>
									<?php } ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="history-block__box-right">
						<div class="swiper  history-block__swiper ">
							<div class="swiper-wrapper">
								<?php if (is_array($list)) : ?>
									<?php foreach ($list as $item) {
										$image = $item['image'];
										$year = $item['year'];
										$caption = $item['caption'];
										$description = $item['description'];
										$current_lang = pll_current_language();
										$next = "";
										$prew = "";
										switch ($current_lang) {
											case 'en':
												$next = "next";
												$prew = "prew";

												break;
											case 'uk':
												$next = "вперед";
												$prew = "назад";
												break;
										}
									?>
										<div class="swiper-slide history-block__slide">
											<div class="history-block__right">
												<div class="history-block__right-top">
													<div class="year">
														<?php echo $year ?>
													</div>
													<div class="caption">
														<?php echo $caption ?>
													</div>
												</div>
												<div class="history-block__right-desc desc"> <?php echo $description ?></div>
											</div>
										</div>
									<?php } ?>
								<?php endif; ?>
							</div>
						</div>
						<div class="swiper-nav">
							<button type="button" class="history-swiper-prev button-box">
								<div class="btn-arrow left"> </div>
								<span class="dtn-text"><?php echo $prew ?></span>
							</button>
							<button type="button" class="history-swiper-next button-box">
								<span class="dtn-text"><?php echo $next ?></span>
								<div class="btn-arrow"> </div>
							</button>
						</div>
					</div>
				</div>

			</div>
		</section>
	<?php endif; ?>

	<?php if ($faq_group) :
		$title = $faq_group['title'];
		$list = $faq_group['list'];
	?>
		<section class="question-block" id="<?php echo $block_id  ?>">
			<div class="container">
				<?php if ($title) : ?>
					<h2>
						<?php echo $title ?>
					</h2>
				<?php endif; ?>
				<div class="question-block__group">
					<div class="question-block__list" role="description" id="accordion">

						<?php foreach ($list as $item) {
							$title = $item['title'];
							$caption = $item['caption'];
						?>
							<div class="group question-block__item">
								<h3>
									<?php echo $title ?>
									<div class="i-btn"></div>

								</h3>
								<div role="description" class="group question-block__item-desc description">
									<p><?php echo $caption ?></p>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($team_group) :
		$title = $team_group['title'];
		$list_first = $team_group['list_first'];
	?>
		<section class="team-block">
			<div class="container">
				<?php if ($title) : ?>
					<h2><?php echo $title ?></h2>
				<?php endif; ?>

				<div class="team-block__box">
					<?php if (is_array($list_first)) : ?>
						<?php foreach ($list_first as $item) {
							$image = $item['image'];
							$name = $item['name'];
							$caption = $item['caption'];
						?>
							<div class="team-block__item">
								<?php if ($image) { ?>
									<div class="team-block__item-img">
										<?php echo wp_get_attachment_image($image, 'full'); ?>
									</div>
								<?php } ?>
								<div class="team-block__item-bottom">
									<h3><?php echo $name ?></h3>
									<div class="team-block__item-caption">
										<?php echo $caption ?>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php endif; ?>
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

	<?php if ($our_products_block) :
		$list = $our_products_block['list'];
		$title = $our_products_block['title'];
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

</main>
<?php get_footer(); ?>