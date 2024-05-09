<?php

	$ecommerce_landing_page_custom_css = '';

	// banner background img
	$medical_landing_page_banner_bg_image = get_theme_mod('medical_landing_page_banner_bg_image');
	if($medical_landing_page_banner_bg_image != false){
		$ecommerce_landing_page_custom_css .='#banner{';
			$ecommerce_landing_page_custom_css .='background: url('.esc_url($medical_landing_page_banner_bg_image).');';
		$ecommerce_landing_page_custom_css .='}';
	}

	/*-------------------- First Highlight Color -------------------*/

	$ecommerce_landing_page_first_color = get_theme_mod('ecommerce_landing_page_first_color');

	if($ecommerce_landing_page_first_color != false){
		$ecommerce_landing_page_custom_css .='.principle-box:hover .principle-box-inner-img, .more-btn a, #comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.pro-button a, .woocommerce a.added_to_cart.wc-forward, #footer input[type="submit"], #footer-2, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .scrollup i:hover, #sidebar .custom-social-icons a,#footer .custom-social-icons a, #sidebar h3,  #sidebar .widget_block h3, #sidebar h2, .pagination span, .pagination a, .woocommerce span.onsale, nav.woocommerce-MyAccount-navigation ul li, .scrollup i, .pagination a:hover, .pagination .current, #sidebar .tagcloud a:hover, #main-product button.tablinks.active, .main-product-section .pro-button, .main-product-section:hover .the_timer, nav.woocommerce-MyAccount-navigation ul li:hover, #preloader, .event-btn-1 a, .event-btn-2 a:hover,.wp-block-tag-cloud a:hover,#sidebar h3, #sidebar .widget_block h3, #sidebar h2, #sidebar label.wp-block-search__label, #sidebar .wp-block-heading,.bradcrumbs a, .post-categories li a,.bradcrumbs span,.wp-block-button__link,#sidebar .wp-block-tag-cloud a:hover,#footer .wp-block-tag-cloud a:hover,#footer-2,.read-more a,.compare-btn a, .compare-btn-banner a,.menu-section,.myaccount-icon i, .cart-no i,.events-box:hover span.event-date, .events-box:hover span.event-location,.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button,.wp-block-woocommerce-cart .wc-block-cart__submit-button:hover, .wc-block-components-checkout-place-order-button:hover,.small-headphone:hover,#sidebar h3, #sidebar .wp-block-search .wp-block-search__label, #footer-2, .inner-box:hover,.post-main-box .more-btn a, .video-btn i,.banner-img .phone i, .banner-img .about i, .rating i, .expert-doctor i, .health-solution .team i, .health-solution .hospital i, .health-solution .environment i,.menu-section, .closebtn i{';
			$ecommerce_landing_page_custom_css .='background: '.esc_attr($ecommerce_landing_page_first_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	if($ecommerce_landing_page_first_color != false){
		$ecommerce_landing_page_custom_css .='#sidebar ul li::before,#footer-2,.wp-block-woocommerce-empty-cart-block .wc-block-grid__product-onsale, .post-main-box .more-btn a,input[type="submit"],.more-btn a, #comments input[type="submit"], #comments a.comment-reply-link, input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, .pro-button a, .pagination span, .pagination a,.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button,.wc-block-components-order-summary-item__quantity{';
			$ecommerce_landing_page_custom_css .='background: '.esc_attr($ecommerce_landing_page_first_color).'!important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	if($ecommerce_landing_page_first_color != false){
		$ecommerce_landing_page_custom_css .='.main-header span.donate a:hover, .main-header span.volunteer a:hover, .main-header span.donate i:hover, .main-header span.volunteer i:hover, .box-content h3, .box-content h3 a, .woocommerce-message::before,.woocommerce-info::before,.post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .main-navigation ul li.current_page_item,.main-navigation ul ul li a:hover,.main-navigation ul ul a:focus, .main-navigation ul ul a:hover,p.site-title a:hover, .logo h1 a:hover,.post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .grid-post-main-box:hover h2 a, .grid-post-main-box:hover .post-info span a,#best-product-section .product-box:hover .product-box-content h3 a,.events-box:hover h3 a,.wp-block-latest-comments__comment-meta a, .product_meta a, .wc-block-components-totals-coupon a, .woocommerce-MyAccount-content a,span.wp-calendar-nav-prev a, #today a{';
			$ecommerce_landing_page_custom_css .='color: '.esc_attr($ecommerce_landing_page_first_color).' !important;';
		$ecommerce_landing_page_custom_css .='}';
	}

	if($ecommerce_landing_page_first_color != false){
		$ecommerce_landing_page_custom_css .='.home-page-header,.main-navigation ul ul,.slider-nav-image-sec,.wp-block-woocommerce-empty-cart-block .wc-block-grid__product-onsale,.health-solution .health-text-sec .health-para1{';
			$ecommerce_landing_page_custom_css .='border-color: '.esc_attr($ecommerce_landing_page_first_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	if($ecommerce_landing_page_first_color != false){
		$ecommerce_landing_page_custom_css .='.main-navigation ul ul{';
			$ecommerce_landing_page_custom_css .='border-bottom:2px solid '.esc_attr($ecommerce_landing_page_first_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

