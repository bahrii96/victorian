<?php

// Init social for author
if (!function_exists('init_social_author')) {
	function init_social_author($author_info): void
	{
		if ($author_info):
			foreach ($author_info as $key => $social):
				if ($social):
					?>
          <a href="<?php echo $key === 'email' ? 'mailto:' . $social : $social; ?>"
             class="soc-item <?php echo $key; ?>"><?php echo $key; ?></a>
				<?php
				endif;
			endforeach;
		endif;
	}
}

// Init medical reviewed authors
function init_after_reviewed_authors($textCaption, $fieldAuthor): void
{
	$pageID = get_the_ID();
	$medicalReviewedString = __($textCaption, 'nutrident');
	$reviewedAuthors = get_field($fieldAuthor, $pageID);
	if ($reviewedAuthors):
		?>
    <div class="user-info__body">
      <div class="user-info__caption"><span><?php echo $medicalReviewedString; ?></span></div>
			<?php
			$i = 1;
			foreach ($reviewedAuthors as $reviewedAuthor):
				$author_name = get_field('author_name', $reviewedAuthor->ID);
				$author_info = get_field('author_page_info', $reviewedAuthor->ID);
				$displayName = $author_name['display_name'];
				$displayInfo = $author_info['author_big_info_block'];
				?>
        <div class="user-info__wrap <?php echo $i > 1 ? 'bordered' : ''; ?>">
          <div class="user-info__data">
            <div class="user-info__data__info">
              <div class="photo">
								<?php
								$profileImage = get_the_post_thumbnail($reviewedAuthor->ID, 'profileImageAuthor');
								if ($profileImage) {
									echo $profileImage;
								} else {
									?>
                  <img width="66" height="66"
                       src="<?php echo get_template_directory_uri() . '/assets/img/profile.png' ?>"
                       alt="profile">
									<?php
								}
								?>
              </div>
              <a href="<?php the_permalink($reviewedAuthor->ID); ?>" class="name"><?php echo $displayName; ?></a>
            </div>
            <div class="user-info__data__social">
							<?php $author_social = get_field('author_contact_information', $reviewedAuthor->ID); ?>
							<?php $author_contact = get_field('contact_info', $reviewedAuthor->ID); ?>
							<?php
							init_social_author($author_contact);
							init_social_author($author_social);
							?>
            </div>
          </div>
          <div class="user-info__description">
						<?php if ($displayInfo): ?>
							<?php echo $displayInfo; ?>
						<?php endif; ?>
          </div>
        </div>
				<?php
				$i++;
			endforeach;
			?>
    </div>
	<?php
	endif;
}

function authors_bottom_info(): string
{
	ob_start();
	$html = init_after_reviewed_authors('Contributors:', 'page_author');
	$html .= init_after_reviewed_authors('Medically reviewed by:', 'medical_reviewed');
	$html .= ob_get_clean();

	return $html;
}

add_filter('the_content', 'show_user_after_info', 12);
function show_user_after_info($content): string
{
	if (is_front_page() || is_category() || is_404() || is_singular('user')) return $content;

	$users_mark = '';
	if (function_exists('get_field')) {
		$users_mark = '<div class="user-info">';
		ob_start();
		$users_mark .= authors_bottom_info();
		$users_mark .= ob_get_clean();
		$users_mark .= '</div>';
	}
	return $content . $users_mark;
}
