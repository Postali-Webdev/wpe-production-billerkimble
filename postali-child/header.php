<?php
/**
 * Theme header.
 *
 * @package Postali Child
 * @author Postali LLC
**/
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KNFFJSQ');</script>
<!-- End Google Tag Manager -->

<!-- Add JSON Schema here -->
<?php 
// Global Schema
$global_schema = get_field('global_schema', 'options');
if ( !empty($global_schema) ) :
    echo '<script type="application/ld+json">' . $global_schema . '</script>';
endif;

// Single Page Schema
$single_schema = get_field('single_schema');
if ( !empty($single_schema) ) :
    echo '<script type="application/ld+json">' . $single_schema . '</script>';
endif; ?>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>
<link rel="preload" href="https://www.billerkimble.com/wp-content/uploads/2021/10/homepage-hero.jpg" as="image"> 
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Lato:wght@400;600;900&family=Roboto&display=swap" rel="stylesheet"> 
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript>
	<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KNFFJSQ" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!-- End Google Tag Manager (noscript) -->

    <a class="skip-link" href='#main-content'>Skip to Main Content</a>

	<header>
		<div id="header-top" class="container">
			<div id="header-top_left">
				<?php the_custom_logo(); ?>
			</div>
			
			<div id="header-top_right">
				<div id="header-top_menu">
						<?php
							$args = array(
								'container' => false,
								'theme_location' => 'header-nav'
							);
							wp_nav_menu( $args );
						?>			
					<div id="header-top_mobile">
						<div id="menu-icon" class="toggle-nav">
							<span class="line line-1"></span>
							<span class="line line-2"></span>
							<span class="line line-3"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-cta">
			<p>Contact Us Today</p>
			<a href="/contact/" class="header-cta-btn" title="Online Form">Online Form</a>
			<p class="header-cta-phone"><span>P</span><a href="tel:<?php ( is_page(506) ? the_field('columbus_phone','options') : the_field('cincinnati_phone','options') ); ?>"><?php ( is_page(506) ? the_field('columbus_phone','options') : the_field('cincinnati_phone','options') ); ?></a><p>
		</div>
		<div class="mobile-header-cta">
			<a title="mobile call button" href="tel:<?php ( is_page(506) ? the_field('columbus_phone','options') : the_field('cincinnati_phone','options') ); ?>" class="mobile-cta-phone"><span class="icon-icon-mobile-call-us"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span></a>
			<div class="mobile-cta-buttons">
				<a href="sms:<?php ( is_page(506) ? the_field('columbus_phone','options') : the_field('cincinnati_phone','options') ); ?>" title="text us">Text Us</a>
				<a href="/contact/" title="contact form">Contact Form</a>
			</div>
		</div>
	</header>

<div id="main-content"></div>