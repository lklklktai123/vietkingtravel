<?php

/**
 * Post-entry header.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

?>
<header class="entry-header">
	<div class="entry-header-text entry-header-text-top text-<?php echo get_theme_mod('blog_posts_title_align', 'center'); ?>">
		<?php get_template_part('template-parts/posts/partials/entry', 'title'); ?>
	</div>
	<div class="date-name">
		<div class="icon-date">
			<i class="fa-solid fa-calendar-days" style="color: #01953F;"></i> <?php echo get_the_date('\N\g\à\y j \t\há\n\g m \nă\m Y'); ?>
		</div>
		<div class="icon-name">
			<i class="fa-solid fa-user" style="color: #01953F;"></i> <?php echo get_the_author(); ?>
		</div>
	</div>
	<div class="divider-post-header"></div>
	<br>
	<?php if (has_post_thumbnail()) : ?>
		<?php if (!is_single() || (is_single() && get_theme_mod('blog_single_featured_image', 1))) : ?>
			<div class="entry-image relative">
				<?php get_template_part('template-parts/posts/partials/entry-image', 'default'); ?>
				<?php if (get_theme_mod('blog_badge', 1)) get_template_part('template-parts/posts/partials/entry', 'post-date'); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</header>