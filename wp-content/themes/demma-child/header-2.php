<?php global $qode_options_proya, $wp_query, $qode_toolbar, $qodeIconCollections; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php
	if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) {
		echo('<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">');
	} ?>

	<title><?php wp_title(''); ?></title>

	<?php
	/**
	 * qode_header_meta hook
	 *
	 * @see qode_header_meta() - hooked with 10
	 * @see qode_user_scalable_meta() - hooked with 10
	 */
	do_action('qode_header_meta');
	?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url($qode_options_proya['favicon_image']); ?>">
	<link rel="apple-touch-icon" href="<?php echo esc_url($qode_options_proya['favicon_image']); ?>"/>
	<script type="text/javascript" language="javascript" src="<?php echo site_url( '/wp-content/themes/demma-child/js/jquery-3.2.1.js', null ); ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url( '/wp-content/themes/demma-child/css/bootstrap.css', null ); ?>">
	<script type="text/javascript" language="javascript" src="<?php echo site_url( '/wp-content/themes/demma-child/js/bootstrap.js', null ); ?>"></script>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<header>
		<div class="container relative">
			<div class="top-header">      
				<div class="contact-language">
					<div class="col-xs-4"><a href="http://demo.dev/demem/lien-he">Contact Us</a></div>
					<div class="col-xs-4 "><a href="http://demo.dev/demem">English</a></div>
					<div class="col-xs-4 "><font color="#ffffff"><i class="fa fa-search" aria-hidden="true"></i></font></div>
				</div>      
			</div>
		</div>
		<?php echo do_shortcode( '[rev_slider alias="home-slider"]' ); ?>
	</header>
