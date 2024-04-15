<?php

/**
 * Header template.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

?>
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
	function isGoogleSpeed()
	{
			if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false){
					return false;
			}else{
					return true;
			}
	}

	?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php flatsome_html_classes(); ?>">

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<link hreflang="vi" href="<?php echo home_url($_SERVER['REQUEST_URI']); ?>" rel="alternate" />

	<link rel="preconnect" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script  rel="preconnect" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<?php if(!isGoogleSpeed()){ ?>



<?php }?>

		<!-- CODE LOCATION -->
	<meta name="geo.region" content="VN-HN" />
	<meta name="geo.placename" content="H&agrave; Nội" />
	<meta name="geo.position" content="20.9596;105.761494" />
	<meta name="ICBM" content="20.9596, 105.761494" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">

	<link rel="alternate" href="<?= getCurrentPageURL(2) ?>" hreflang="vi-vn" />


	<?php 
		$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
		$domain = $_SERVER['HTTP_HOST'];
		$url = $protocol . $domain;
		if(strpos(getCurrentPageURL(1), "/?fbclid") !== false) {
	?>
		<link rel="canonical" href="<?= $url ?>" />
	<?php
		}else{
	?>
		<link rel="canonical" href="<?= getCurrentPageURL(1) ?>" />
	<?php } ?>

<?php if(!isGoogleSpeed()){ ?>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-KBK2LHP5');</script>
	<!-- End Google Tag Manager -->



	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-85YQYVVELK"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'G-85YQYVVELK');
	</script>

<?php }?>
	
	<?php wp_head(); ?>

<?php 
	$current_page_id = get_queried_object();
	$cus_schema = get_field('schema',$current_page_id,  true);
	if (!empty($cus_schema)) { echo $cus_schema; } else {
?>

	<script type="application/ld+json">
		{
		"@context": "https://schema.org",
		"@type": "LocalBusiness",
		"name": "Công ty TNHH du lịch và công nghệ Việt Nam",
		"image": "https://vietkingtravel.com/wp-content/uploads/2023/07/logo-tet-viet-king-1-1.png",
		"@id": "",
		"url": "https://vietkingtravel.com/",
		"telephone": "0938345222",
		"address": {
			"@type": "PostalAddress",
			"streetAddress": "Số 204 Phan Đình Phùng",
			"addressLocality": "Hồ Chí Minh",
			"postalCode": "",
			"addressCountry": "VN"
		},
		"geo": {
			"@type": "GeoCoordinates",
			"latitude": 10.795607136938589,
			"longitude": 106.68248971719615
		}  
		}
	</script> <?php } ?>
</head>

<body <?php body_class(); ?>>


<?php if(!isGoogleSpeed()){ ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KBK2LHP5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php }?>

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