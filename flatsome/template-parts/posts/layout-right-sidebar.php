<?php

/**
 * Posts layout right sidebar.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

do_action('flatsome_before_blog');
?>

<?php if (!is_single() && flatsome_option('blog_featured') == 'top') {
	get_template_part('template-parts/posts/featured-posts');
} ?>

<div class="row row-large <?php if (flatsome_option('blog_layout_divider')) echo 'row-divided '; ?>">

	<div class="large-9 col">
		<?php if (!is_single() && flatsome_option('blog_featured') == 'content') {
			get_template_part('template-parts/posts/featured-posts');
		} ?>
		<?php
		if (is_single()) {
			get_template_part('template-parts/posts/single');
			comments_template();
		} elseif (flatsome_option('blog_style_archive') && (is_archive() || is_search())) {
			get_template_part('template-parts/posts/archive', flatsome_option('blog_style_archive'));
		} else {
			get_template_part('template-parts/posts/archive', flatsome_option('blog_style'));
		}
		?>
	</div>
	<div class="post-sidebar large-3 col">
		<?php flatsome_sticky_column_open('blog_sticky_sidebar'); ?>
		<?php get_sidebar(); ?>
		<?php flatsome_sticky_column_close('blog_sticky_sidebar'); ?>
	</div>
	<?php
	if (is_single()) { ?>
		<h2 class="related-title">Bài viết liên quan</h2>
		<?php
		// Lấy ID của bài viết hiện tại
		$post_id = get_the_ID();

		// Lấy các category của bài viết hiện tại
		$categories = get_the_category();

		// Nếu bài viết hiện tại có ít nhất một category
		if (!empty($categories)) {

			// Lấy ID của tất cả các category
			$category_ids = array();
			foreach ($categories as $category) {
				$category_ids[] = $category->term_id;
			}

			// Truy vấn 4 bài viết liên quan dựa trên các category và loại trừ bài viết hiện tại
			$related_posts = get_posts(array(
				'posts_per_page' => 4,
				'category__in' => $category_ids,
				'post__not_in' => array($post_id),
				'orderby' => 'rand',
			));

			// Nếu có bài viết liên quan, hiển thị chúng
		?>
			<div class="main-container">
				<?php
				if ($related_posts) {
					foreach ($related_posts as $related_post) {
						$image_id = get_post_thumbnail_id($related_post->ID);
						$image_url = wp_get_attachment_image_src($image_id, 'full')[0];

						$post_title = get_the_title($related_post->ID);
						$stripped_content = strip_tags($post_title);
						$excerpt = wp_trim_words($stripped_content, 10, '...');
				?>
						<div class="main-content-related">
							<img class="item-image" src="<?php echo $image_url ?>">
							<a href="<?php echo get_permalink($related_post->ID); ?>" class="item-title-related"><?php echo $excerpt; ?></a>
							<div class="icon-date-related">
								<i class="fa-solid fa-calendar-days" style="color: #01953F;"></i> <?php echo get_the_date('j/m/Y', $related_post->ID); ?>
							</div>
							<div class="icon-name-related">
								<i class="fa-solid fa-user" style="color: #01953F;"></i> <?php echo get_the_author(); ?>
							</div>
						</div>
			<?php  }
				}
			}
			?>
			</div>
		<?php	}
		?>
</div>
</div>

<?php
do_action('flatsome_after_blog');
?>