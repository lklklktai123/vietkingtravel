<?php
/**
 * The template for displaying search forms in flatsome
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

$placeholder = __( 'Search', 'woocommerce' ).'&hellip;';
if(get_theme_mod('search_placeholder')) $placeholder = get_theme_mod('search_placeholder');
?>
<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<div class="flex-row relative">
			<div class="flex-col flex-grow">
	   	   <input type="search" class="search-field mb-0" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="Nhập từ khóa..." />
			</div>
			<div class="flex-col">
				<button type="submit" class="ux-search-submit submit-button secondary button icon mb-0" aria-label="<?php esc_attr_e( 'Submit', 'flatsome' ); ?>">
					<?php echo get_flatsome_icon('icon-search'); ?>
				</button>
			</div>
		</div>
    <div class="live-search-results text-left z-top"></div>
</form>
