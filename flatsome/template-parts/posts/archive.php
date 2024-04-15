<?php

/**
 * Posts archive.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */
?>
<?php
if (have_posts()) : ?>
	<div id="post-list">
		<div class="I-main">
			<?php /* Start the Loop */ ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php
				$post_content = get_the_content();
				$stripped_content = strip_tags($post_content);
				$excerpt = wp_trim_words($stripped_content, 22, '...');

				$post_title = get_the_title();
				$stripped_title = strip_tags($post_title);
				$excerpt_title = wp_trim_words($stripped_title, 14, '...');
				?>
				<div class="main">
					<img class="item-image" src="<?php echo the_post_thumbnail_url(); ?>">
					<a href="<?php echo get_permalink(); ?>" class="item-title"><?php echo $excerpt_title; ?></a>
					<div class="excerpt-content"><?php echo $excerpt; ?></div>
					<button><a href="<?php echo get_permalink(); ?>" class="more-view">Xem Thêm</a></button>
					<!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="article-inner <?php flatsome_blog_article_classes(); ?>">
							<?php get_template_part('template-parts/posts/partials/entry-header', flatsome_option('blog_posts_header_style')); ?>
							<?php get_template_part('template-parts/posts/content', 'default'); ?>
							<?php get_template_part('template-parts/posts/partials/entry-footer', 'default'); ?>
						</div>
					</article> -->
				</div>
			<?php endwhile; ?>
		</div>

		<div class="chapter-navigation">
			<div class="paging_simple_numbers">
				<div class="pagination">
					<?php flatsome_posts_pagination(); ?>
				</div>
			</div>
		</div>

	</div>

<?php else : ?>

	<?php get_template_part('template-parts/posts/content', 'none'); ?>

<?php endif; ?>