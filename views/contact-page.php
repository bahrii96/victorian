<?php /* Template name: Page Contact */
get_header();
$page_contact = get_field('page_contact');

if ($page_contact) {
	$contact_group = $page_contact['contact_group'];
};
?>

<main>
	<?php if ($contact_group) :
		$map_iframe = $contact_group['map_iframe'];
		$list_office = $contact_group['list_office'];
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
		<section class="contact-block">
			<div class="container">
				<div class="contact-block__left">
					<?php if (is_array($list_office)) : ?>
						<div class="contact-block__list">
							<?php foreach ($list_office as $item) {
								$title = $item['title'];
								$list_contact = $item['list_contact'];
							?>
								<div class="contact-block__item">
									<h3><?php echo $title ?></h3>
									<?php if (is_array($list_contact)) : ?>
										<div class="contact-block__office">
											<?php foreach ($list_contact as $item) {
												$icon = $item['icon'];
												$link = $item['link'];
											?>
												<div class="contact-block__office-item">
													<?php echo wp_get_attachment_image($icon, 'full'); ?>
													<?php echo initLinkHref($link,) ?>
												</div>
											<?php } ?>
										</div>
									<?php endif; ?>
								</div>
							<?php } ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="contact-block__right">
					<?php if ($map_iframe) : ?>
						<?php echo $map_iframe ?>
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




</main>
<?php get_footer(); ?>