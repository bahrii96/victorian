<?php
$footer_settings = get_field('footer_settings', 'options');
$contactus_settings = get_field('contactus_settings', 'options');

if ($contactus_settings) {
	$contactus_list = isset($contactus_settings['list']) ? $contactus_settings['list'] : null;
}


if ($footer_settings) {

	$copyright = isset($footer_settings['copyright']) ? $footer_settings['copyright'] : null;
	$popup = isset($footer_settings['popup']) ? $footer_settings['popup'] : null;
	$widget_list = isset($footer_settings['widget_list']) ? $footer_settings['widget_list'] : null;
}
?>
<div class="contactus-block">
	<div class="contactus-block__list">
		<?php if (!empty($contactus_list)) : ?>
			<?php foreach ($contactus_list as $item) {
				$icon = $item['icon'];
				$link = $item['link'];
			?>
				<div class="contactus-block__item">
					<a class="link" href="<?php echo $link ?>" target="_blank"> <?php echo wp_get_attachment_image($icon, 'full'); ?></a>
				</div> <?php } ?>
		<?php endif; ?>
	</div>
	<div class="contactus-block__icon">
		<svg width="80" height="81" viewBox="0 0 80 81" fill="none" xmlns="http://www.w3.org/2000/svg">
			<rect width="80" height="80" transform="translate(0 0.981201)" fill="#DBD0D4" />
			<g clip-path="url(#clip0_140_2303)">
				<path d="M36.25 37.2313C37.285 37.2313 38.1251 36.3925 38.1251 35.3562C38.1251 34.3213 37.285 33.4812 36.25 33.4812C35.215 33.4812 34.375 34.3213 34.375 35.3562C34.375 36.3924 35.215 37.2313 36.25 37.2313ZM43.75 37.2313C44.7851 37.2313 45.625 36.3925 45.625 35.3562C45.625 34.3213 44.785 33.4812 43.75 33.4812C42.715 33.4812 41.8751 34.3213 41.8751 35.3562C41.875 36.3924 42.715 37.2313 43.75 37.2313ZM32.67 49.4024C33.6425 49.56 35.8512 49.7312 36.875 49.7312C45.85 49.7312 51.875 43.0524 51.875 35.1999C51.875 27.3474 44.3463 20.9812 36.875 20.9812C27.8875 20.9812 20.625 27.3475 20.625 35.1999C20.625 39.7487 22.3587 43.6112 25.625 46.3925V53.4812L32.67 49.4024ZM23.125 35.3562C23.125 28.7974 29.0662 23.4812 36.875 23.4812C43.0913 23.4812 49.375 28.7974 49.375 35.3562C49.375 41.9149 44.4687 47.2312 36.875 47.2312C35.7588 47.2312 33.43 47.1037 32.3913 46.8874L28.125 49.7312V45.3013C25.0762 42.8275 23.125 39.5224 23.125 35.3562ZM54.3112 32.4037C54.335 32.7625 54.375 33.1175 54.375 33.4812C54.375 34.2762 54.2987 35.055 54.1862 35.8238C55.8688 37.7938 56.875 40.22 56.875 42.8563C56.875 47.0225 54.385 50.6825 50.625 52.8012V57.2313L46.3587 54.3875C45.32 54.6037 44.2413 54.7312 43.125 54.7312C39.8875 54.7312 38.1675 53.7588 35.8175 52.1413C35.1363 52.1963 34.4475 52.2313 33.75 52.2313C33.2526 52.2313 32.765 52.195 32.275 52.1675C35.25 55.0775 38.3113 56.9188 43.125 56.9188C44.1488 56.9188 45.1475 56.8263 46.1188 56.6675L53.125 60.9813V53.8912C56.9237 51.2887 59.375 47.2488 59.375 42.6987C59.375 38.6437 57.425 34.995 54.3112 32.4037ZM28.75 37.2313C29.785 37.2313 30.625 36.3925 30.625 35.3562C30.625 34.3213 29.785 33.4812 28.75 33.4812C27.715 33.4812 26.875 34.3213 26.875 35.3562C26.875 36.3924 27.715 37.2313 28.75 37.2313Z" fill="#1F1D1E" />
			</g>
			<defs>
				<clipPath id="clip0_140_2303">
					<rect width="40" height="40" fill="white" transform="translate(20 20.9812)" />
				</clipPath>
			</defs>
		</svg>

	</div>
</div>

<?php if (!empty($popup)):
	$title = $popup['title'];
	$name = $popup['name'];
	$caption = $popup['caption'];
	$shortcode = $popup['shortcode'];

?>
	<div class="hidden popup-box form-block" id="<?php echo $name; ?>">
		<div class="form-block__box">
			<?php if ($title) : ?>
				<h2>
					<?php echo $title ?>
				</h2>
			<?php endif; ?>
			<?php if ($caption) : ?>
				<div class="form-block__desc desc">
					<?php echo $caption ?>
				</div>
			<?php endif; ?>
			<?php if ($shortcode) : ?>
				<div class="form-block__form">
					<?php echo do_shortcode($shortcode); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>




<footer class="footer">
	<div class="container">
		<div class="footer__contact">
			<?php if (!empty($widget_list)) : ?>
				<?php foreach ($widget_list as $item) {
					$title_first = $item['title_first'];
					$links = $item['links'];
					$add_social = $item['add_social'];
					$socials = $item['socials'];
				?>
					<div class="footer__contact-item">
						<?php if ($title_first): ?>
							<h3><?php echo $title_first ?></h3>
						<?php endif; ?>

						<?php if (!empty($links)) : ?>
							<ul class="footer__contact-links">
								<?php
								foreach ($links as $item) {
									$link = $item['link'];
								?>
									<li>
										<?php echo initLinkHref($link,) ?>
									</li>
								<?php
								} ?>
							</ul>
						<?php endif; ?>

						<?php if ($add_social) : ?>
							<div class="footer__contact-soc">
								<?php
								foreach ($socials as $item) {
									$link = $item['link'];
									$icon = $item['icon'];
								?>
									<a href="<?php echo $link ?>" class="footer__soc-item">
										<?php if ($icon) : ?>
											<?php echo wp_get_attachment_image($icon, 'full'); ?>
										<?php endif; ?>
									</a>
								<?php
								} ?>
							</div>
						<?php endif; ?>
					</div>
				<?php } ?>
			<?php endif; ?>
		</div>

	</div>
	<?php if (!empty($copyright)) : ?>
		<div class="copyright">
			<div class="container"><?php echo $copyright ?></div>
		</div>
	<?php endif; ?>
</footer>
<?php
wp_footer();
?>
</body>

</html>