<?php /* Template name: Success Page */
get_header();
$success = get_field('page_success');

if ($success) {
	$overlay = $success['overlay'];
	$list_office = $success['list_office'];
};
$footer_settings = get_field('footer_settings', 'options');
$popup_title_answer = isset($footer_settings['popup_title_answer']) ? $footer_settings['popup_title_answer'] : null;
$popup_image_answer = isset($footer_settings['popup_image_answer']) ? $footer_settings['popup_image_answer'] : null;
$popup_button_answer = isset($footer_settings['popup_button_answer']) ? $footer_settings['popup_button_answer'] : null;
?>
<main>

	<section class="contact-block">
		<div class="container">
			<div class="contact-block__left">
				<div class="popup-answer__box">
					<?php if ($popup_title_answer) : ?>
						<h2>
							<?php echo $popup_title_answer ?>
						</h2>
					<?php endif; ?>
					<?php if ($popup_image_answer) : ?>
						<div class=" contact-block__img">
							<?php echo wp_get_attachment_image($popup_image_answer, 'full'); ?>
						</div>
					<?php endif; ?>
					<?php if ($popup_button_answer) : ?>
						<div class="popup-answer__box-btn">
							<?php echo initLinkHref($popup_button_answer, 'btn-border') ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="contact-block__right" style="background-image: url(<?php echo $overlay['url'] ?>);">
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
		</div>
	</section>
</main>
<?php get_footer(); ?>