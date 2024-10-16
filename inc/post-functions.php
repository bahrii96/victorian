<?php

if (!function_exists('initLinkHref')) {
	function initLinkHref($link, $class = '', $popup = false)
	{
		if ($link) :
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
?>
			<a class="<?php echo $class; ?>" <?php echo $popup === true ? 'data-fancybox' : ''; ?> href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
			<?php endif;
	}
}

if (!function_exists('initGravityForm')) {
	function initGravityForm($form_id)
	{
		echo do_shortcode('[contact-form-7 id="' . $form_id . '" title="Contact form 1"]');
	}
}

if (!function_exists('queryPostInit')) {
	function queryPostInit($postType, $perPage, $postInt, $postStatus): WP_Query
	{
		return new WP_Query(array(
			'post_type' => $postType,
			'posts_per_page' => $perPage,
			'post__in' => $postInt,
			'post_status' => $postStatus
		));
	}
}

if (!function_exists('setTagGorPost')) {
	function setTagForPost()
	{
		$postTags = get_the_tags();
		if ($postTags) {
			foreach ($postTags as $tag) {
			?>
				<li class="mf-meta-separator"><a href="<?php echo get_tag_link($tag->term_id) ?>"><?php echo $tag->name . ' '; ?></a></li>
			<?php
			}
		}
	}
}

if (!function_exists('contentTrim')) {
	function contentTrim($qntWords, $post): string
	{
		$postContent = get_the_content($post);
		return wp_trim_words($postContent, $num_words = $qntWords, $more = '.');
	}
}


if (!function_exists('imageShowPost')) {
	function imageShowPost($imageField, $size)
	{
		if ($imageField) {
			echo wp_get_attachment_image($imageField, $size);
		}
	}
}

if (!function_exists('initPostsViewPortfolio')) {
	function initPostsViewPortfolio($postsName, $tplPath)
	{
		if ($postsName->have_posts()) {
			while ($postsName->have_posts()) : $postsName->the_post(); ?>
				<?php get_template_part($tplPath, get_post_format()); ?>
<?php endwhile;
			wp_reset_query();
			wp_reset_postdata();
		} else {
			echo ('<p>Posts is empty.</p>');
			wp_reset_query();
			wp_reset_postdata();
		}
	}
}

if (!function_exists('pagination_bar')) {
	function pagination_bar($custom_query)
	{

		$total_pages = $custom_query->max_num_pages;
		$big = 999999999; // need an unlikely integer

		if ($total_pages > 1) {
			$current_page = max(1, get_query_var('paged'));

			echo paginate_links(array(
				'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'format' => '?paged=%#%',
				'current' => $current_page,
				'total' => $total_pages,
			));
		}
	}
}
