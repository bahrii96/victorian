<?php
$footer_settings = get_field('footer_settings', 'options');
if ($footer_settings) {

	$copyright = isset($footer_settings['copyright']) ? $footer_settings['copyright'] : null;
	$links = isset($footer_settings['links']) ? $footer_settings['links'] : null;

	$list_logo = isset($footer_settings['list_logo']) ? $footer_settings['list_logo'] : null;
	$logo = isset($footer_settings['logo']) ? $footer_settings['logo'] : null;
}
?>



<footer class="footer">
	<div class="container">
		<div class="footer__top">

			<div class="footer__contact">
				<?php if (!empty($links)) : ?>
					<?php foreach ($links as $item) {
						$link = $item['link'];
					?>
						<div class="footer__contact-item">
							<?php echo initLinkHref($link) ?>
						</div> <?php } ?>
				<?php endif; ?>
			</div>

			<?php if (!empty($list_logo)) : ?>
				<div class="footer__logo-list">
					<?php
					foreach ($list_logo as $item) {
						$link = $item['link'];
						$icon = $item['icon'];
					?>
						<a href="<?php echo $link ?>" class="footer__logo-item">
							<div class="footer__logo-item-box">
								<?php if ($icon) : ?>
									<?php echo wp_get_attachment_image($icon, 'full'); ?>
								<?php endif; ?>
							</div>
						</a>
					<?php
					} ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
	<?php if ( !empty($copyright)) : ?>
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