<?php

/**
 * Header template.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php flatsome_html_classes(); ?>">

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<link hreflang="vi" href="<?php echo home_url($_SERVER['REQUEST_URI']); ?>" rel="alternate" />

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- CODE LOCATION -->
	<meta name="geo.region" content="VN-HN" />
	<meta name="geo.placename" content="H&agrave; Nội" />
	<meta name="geo.position" content="20.9596;105.761494" />
	<meta name="ICBM" content="20.9596, 105.761494" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<?php
	function getCurrentPageURL($flag)
	{
		global $_SERVER;
		$pageURL = 'http';
		if (isset($_SERVER["HTTPS"]))
			if ($_SERVER["HTTPS"] == "on") {
				$pageURL .= "s";
			}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
		}
		if ($flag == 1) {
			$pageURL = explode("page", $pageURL);
			return $pageURL[0];
		} else {
			return $pageURL;
		}
	}
	?>
	<link rel="alternate" href="<?= getCurrentPageURL(2) ?>" hreflang="vi-vn" />
	<link rel="canonical" href="<?= getCurrentPageURL(1) ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action('flatsome_after_body_open'); ?>
	<?php wp_body_open(); ?>

	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'flatsome'); ?></a>

	<div id="wrapper">
		<div class="overlay"></div>
		<?php do_action('flatsome_before_header'); ?>

		<header id="header" class="header <?php flatsome_header_classes(); ?>">
			<div class="header-wrapper">
				<?php get_template_part('template-parts/header/header', 'wrapper'); ?>
			</div>
		</header>

		<?php do_action('flatsome_after_header'); ?>

		

		<main id="main" class="<?php flatsome_main_classes(); ?>">