<?php
	if ( ! function_exists( 'medical_landing_page_setup' ) ) :

	function medical_landing_page_setup() {
		$GLOBALS['content_width'] = apply_filters( 'medical_landing_page_content_width', 640 );
		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );

		add_theme_support( 'custom-background', array(
			'default-color' => 'ffffff'
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'assets/css/editor-style.css', medical_landing_page_font_url() ) );

		// Theme Activation Notice
		global $pagenow;

		if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] )) {
			add_action('admin_notices', 'medical_landing_page_activation_notice');
		}
	}
	endif;

	add_action( 'after_setup_theme', 'medical_landing_page_setup' );

	// Notice after Theme Activation
	function medical_landing_page_activation_notice() {
		echo '<div class="notice notice-success is-dismissible welcome-notice">';
		echo '<p>'. esc_html__( 'Thank you for choosing Medical Landing Page Theme. Would like to have you on our Welcome page so that you can reap all the benefits of our Medical Landing Page Theme.', 'medical-landing-page' ) .'</p>';
		echo '<span><a href="'. esc_url( admin_url( 'themes.php?page=medical_landing_page_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'medical-landing-page' ) .'</a></span>';
		echo '<span class="demo-btn"><a href="'. esc_url( 'https://www.vwthemes.net/vw-medical-landing-page/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'VIEW DEMO', 'medical-landing-page' ) .'</a></span>';
		echo '<span class="upgrade-btn"><a href="'. esc_url( 'https://www.vwthemes.com/themes/landing-page-wordpress-theme/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'UPGRADE PRO', 'medical-landing-page' ) .'</a></span>';
		echo '</div>';
	}

	/* Theme Font URL */
	function medical_landing_page_font_url() {
		$font_url      = '';
		$font_family   = array(
			'Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900'	
		);
		$fonts_url = add_query_arg( array(
			'family' => implode( '&family=', $font_family ),
			'display' => 'swap',
		), 'https://fonts.googleapis.com/css2' );

		$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
		return $contents;
	}

	add_action( 'wp_enqueue_scripts', 'medical_landing_page_enqueue_styles' );
	function medical_landing_page_enqueue_styles() {
		wp_enqueue_style( 'medical-landing-page-font', medical_landing_page_font_url(), array() );
    	$parent_style = 'ecommerce-landing-page-basic-style'; // Style handle of parent theme.
    	
		wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'medical-landing-page-style', get_stylesheet_uri(), array( $parent_style ) );
		require get_theme_file_path( '/custom-style.php' );
		wp_add_inline_style( 'medical-landing-page-style',$ecommerce_landing_page_custom_css );
		require get_parent_theme_file_path( '/custom-style.php' );
		wp_add_inline_style( 'ecommerce-landing-page-basic-style',$ecommerce_landing_page_custom_css );
		wp_enqueue_style( 'medical-landing-page-block-patterns-style-frontend', get_theme_file_uri('/inc/block-patterns/css/block-frontend.css') );
		wp_enqueue_style( 'medical-landing-page-block-style', get_theme_file_uri('/assets/css/blocks.css') );
		wp_enqueue_script( 'medical-landing-page-custom-scripts-jquery', get_theme_file_uri() . '/assets/js/custom.js', array('jquery'),'' ,true );	

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
		
	add_action( 'init', 'medical_landing_page_remove_parent_function');
	function medical_landing_page_remove_parent_function() {
		remove_action( 'admin_notices', 'ecommerce_landing_page_activation_notice' );
		remove_action( 'admin_menu', 'ecommerce_landing_page_gettingstarted' );
	}

	add_action( 'customize_register', 'medical_landing_page_customize_register', 11 );
	function medical_landing_page_customize_register($wp_customize) {
		global $wp_customize;
		$wp_customize->remove_section( 'ecommerce_landing_page_go_pro' );
		$wp_customize->remove_section( 'ecommerce_landing_page_get_started_link' );
		$wp_customize->remove_setting( 'ecommerce_landing_page_cart_icon' );
		$wp_customize->remove_control( 'ecommerce_landing_page_cart_icon' );
		$wp_customize->remove_setting( 'ecommerce_landing_page_show_hide_product' );
		$wp_customize->remove_control( 'ecommerce_landing_page_show_hide_product' );
		$wp_customize->remove_setting( 'ecommerce_landing_page_product_small_text' );
		$wp_customize->remove_control( 'ecommerce_landing_page_product_small_text' );
		$wp_customize->remove_setting( 'ecommerce_landing_page_product_category' );
		$wp_customize->remove_control( 'ecommerce_landing_page_product_category' );
		$wp_customize->remove_setting( 'ecommerce_landing_page_banner_background_color' );
		$wp_customize->remove_control( 'ecommerce_landing_page_banner_background_color' );
		$wp_customize->remove_setting( 'ecommerce_landing_page_tagline_title1' );
		$wp_customize->remove_control( 'ecommerce_landing_page_tagline_title1' );

		$wp_customize->add_setting('medical_landing_page_video_button_icon',array(
			'default'	=> 'fas fa-play',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
	        $wp_customize,'medical_landing_page_video_button_icon',array(
			'label'	=> __('Video Button Icon','medical-landing-page'),
			'transport' => 'refresh',
			'section'	=> 'ecommerce_landing_page_banner',
			'setting'	=> 'medical_landing_page_video_button_icon',
			'type'		=> 'icon'
		)));

		$wp_customize->add_setting('medical_landing_page_video_button_text',array(
			'default'	=> 'See How We Work',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_video_button_text',array(
			'label'	=> __('Video Button Text','medical-landing-page'),
			'section'	=> 'ecommerce_landing_page_banner',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('medical_landing_page_video_button_url',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
		));
		$wp_customize->add_control('medical_landing_page_video_button_url',array(
			'label'	=> __('Add Video Button URL','medical-landing-page'),
			'description' => __('Add embed link','medical-landing-page'),
			'section'	=> 'ecommerce_landing_page_banner',
			'setting'	=> 'medical_landing_page_video_button_url',
			'type'	=> 'url'
		));

		$wp_customize->add_setting('medical_landing_page_banner_bg_image',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'medical_landing_page_banner_bg_image',array(
	      'label' => __('Banner Background Image','medical-landing-page'),
	      'description' => __('Image size (1400px x 750px)','medical-landing-page'),
	      'section' => 'ecommerce_landing_page_banner'
		)));

		$wp_customize->add_setting( 'medical_landing_page_show_hide_image_sec',array(
	    	'default' => 0,
	      	'transport' => 'refresh',
	      	'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
	    ));
	    $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'medical_landing_page_show_hide_image_sec',array(
	      	'label' => esc_html__( 'Show / Hide Image Section','medical-landing-page' ),
	      	'section' => 'ecommerce_landing_page_banner'
	    )));

		$wp_customize->add_setting('medical_landing_page_banner_image',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'medical_landing_page_banner_image',array(
	      'label' => __('Banner Image','medical-landing-page'),
	      'description' => __('Image size (1400px x 750px)','medical-landing-page'),
	      'section' => 'ecommerce_landing_page_banner'
		)));

		$wp_customize->add_setting('medical_landing_page_phone_icon',array(
			'default'	=> 'fas fa-phone',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
	        $wp_customize,'medical_landing_page_phone_icon',array(
			'label'	=> __('Phone Icon','medical-landing-page'),
			'transport' => 'refresh',
			'section'	=> 'ecommerce_landing_page_banner',
			'setting'	=> 'medical_landing_page_phone_icon',
			'type'		=> 'icon'
		)));

		$wp_customize->add_setting('medical_landing_page_phone_text',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_phone_text',array(
			'label'	=> __('Enter Phone Text','medical-landing-page'),
			'section'	=> 'ecommerce_landing_page_banner',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('medical_landing_page_phone_number',array(
			'default'	=> '',
			'sanitize_callback'	=> 'medical_landing_page_sanitize_phone_number'
		));
		$wp_customize->add_control('medical_landing_page_phone_number',array(
			'label'	=> __('Enter Phone No','medical-landing-page'),
			'section'	=> 'ecommerce_landing_page_banner',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('medical_landing_page_review_text',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_review_text',array(
			'label'	=> __('Review Text','medical-landing-page'),
			'section'	=> 'ecommerce_landing_page_banner',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('medical_landing_page_about_icon',array(
			'default'	=> 'fas fa-user-md',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
	        $wp_customize,'medical_landing_page_about_icon',array(
			'label'	=> __('About Icon','medical-landing-page'),
			'transport' => 'refresh',
			'section'	=> 'ecommerce_landing_page_banner',
			'setting'	=> 'medical_landing_page_about_icon',
			'type'		=> 'icon'
		)));

		$wp_customize->add_setting('medical_landing_page_about_title',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_about_title',array(
			'label'	=> __('About Title','medical-landing-page'),
			'section'	=> 'ecommerce_landing_page_banner',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('medical_landing_page_about_text',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_about_text',array(
			'label'	=> __('About Text','medical-landing-page'),
			'section'	=> 'ecommerce_landing_page_banner',
			'type'		=> 'text'
		));

		$wp_customize->add_section('medical_landing_page_about_section' , array(
	  		'title' => esc_html__( 'About Section', 'medical-landing-page' ), 
			'panel' => 'ecommerce_landing_page_panel_id',
			'description' => "For more options of about section section </br><a class='go-pro-btn' target='_blank' href='". esc_url(ECOMMERCE_LANDING_PAGE_GO_PRO) ." '>GET PRO</a>",
			'priority' => 40,
		) );

		$wp_customize->add_setting( 'medical_landing_page_show_hide_about_sec',array(
	    	'default' => 0,
	      	'transport' => 'refresh',
	      	'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
	    ));
	    $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'medical_landing_page_show_hide_about_sec',array(
	      	'label' => esc_html__( 'Show / Hide About Section','medical-landing-page' ),
	      	'section' => 'medical_landing_page_about_section'
	    )));

		$wp_customize->add_setting('medical_landing_page_rating_icon',array(
			'default'	=> 'fas fa-users',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
	        $wp_customize,'medical_landing_page_rating_icon',array(
			'label'	=> __('Rating Icon','medical-landing-page'),
			'transport' => 'refresh',
			'section'	=> 'medical_landing_page_about_section',
			'setting'	=> 'medical_landing_page_rating_icon',
			'type'		=> 'icon'
		)));

		$wp_customize->add_setting('medical_landing_page_rating_count',array(
			'default'	=> '',
			'sanitize_callback'	=> 'medical_landing_page_sanitize_float'
		));
		$wp_customize->add_control('medical_landing_page_rating_count',array(
			'label'	=> __('Rating','medical-landing-page'),
			'description' => __('Add Rating Count','medical-landing-page'),
			'section'	=> 'medical_landing_page_about_section',
			'type'		=> 'number',
			'input_attrs' => array(
				'step' => 1,
				'min' => 0,
				'max' => 100,
			)
		));

		$wp_customize->add_setting('medical_landing_page_rating_text',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_rating_text',array(
			'label'	=> __('Rating Text','medical-landing-page'),
			'section'	=> 'medical_landing_page_about_section',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('medical_landing_page_expert_doctor_icon',array(
			'default'	=> 'fas fa-user-md',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
	        $wp_customize,'medical_landing_page_expert_doctor_icon',array(
			'label'	=> __('Experts Doctors Icon','medical-landing-page'),
			'transport' => 'refresh',
			'section'	=> 'medical_landing_page_about_section',
			'setting'	=> 'medical_landing_page_expert_doctor_icon',
			'type'		=> 'icon'
		)));

		$wp_customize->add_setting('medical_landing_page_expert_doctor_count',array(
			'default'	=> '',
			'sanitize_callback'	=> 'medical_landing_page_sanitize_float'
		));
		$wp_customize->add_control('medical_landing_page_expert_doctor_count',array(
			'label'	=> __('Experts Doctors Count','medical-landing-page'),
			'description' => __('Add Experts Doctors Count','medical-landing-page'),
			'section'	=> 'medical_landing_page_about_section',
			'type'		=> 'number',
			'input_attrs' => array(
				'step' => 1,
				'min' => 0,
				'max' => 100,
			)
		));

		$wp_customize->add_setting('medical_landing_page_expert_doctor_text',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_expert_doctor_text',array(
			'label'	=> __('Experts Doctors Text','medical-landing-page'),
			'section'	=> 'medical_landing_page_about_section',
			'type'		=> 'text'
		));

		$wp_customize->add_section('medical_landing_page_health_solution_section' , array(
	  		'title' => esc_html__( 'Health Solution Section', 'medical-landing-page' ), 
			'panel' => 'ecommerce_landing_page_panel_id',
			'description' => "For more options of health solution section section </br><a class='go-pro-btn' target='_blank' href='". esc_url(ECOMMERCE_LANDING_PAGE_GO_PRO) ." '>GET PRO</a>",
			'priority' => 50,
		) );

		$wp_customize->add_setting( 'medical_landing_page_show_hide_solution_section',array(
	    	'default' => 0,
	      	'transport' => 'refresh',
	      	'sanitize_callback' => 'ecommerce_landing_page_switch_sanitization'
	    ));
	    $wp_customize->add_control( new Ecommerce_Landing_Page_Toggle_Switch_Custom_Control( $wp_customize, 'medical_landing_page_show_hide_solution_section',array(
	      	'label' => esc_html__( 'Show / Hide Health Section','medical-landing-page' ),
	      	'section' => 'medical_landing_page_health_solution_section'
	    )));

		$wp_customize->add_setting('medical_landing_page_health_image1',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'medical_landing_page_health_image1',array(
		    'label' => __('Treatment Image 1','medical-landing-page'),
		    'description' => __('Image size (1400px x 750px)','medical-landing-page'),
		    'section' => 'medical_landing_page_health_solution_section'
		)));

		$wp_customize->add_setting('medical_landing_page_health_image2',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'medical_landing_page_health_image2',array(
		    'label' => __('Treatment Image 2','medical-landing-page'),
		    'description' => __('Image size (1400px x 750px)','medical-landing-page'),
		    'section' => 'medical_landing_page_health_solution_section'
		)));

		$wp_customize->add_setting('medical_landing_page_health_title',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_health_title',array(
			'label'	=> __('Treatment Title','medical-landing-page'),
			'input_attrs' => array(
            	'placeholder' => __( 'All In One Treatment And Health Solution', 'medical-landing-page' ),
        	),
			'section'	=> 'medical_landing_page_health_solution_section',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('medical_landing_page_health_text1',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_health_text1',array(
			'label'	=> __('Treatment Text','medical-landing-page'),
			'input_attrs' => array(
            	'placeholder' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard', 'medical-landing-page' ),
        	),
			'section'	=> 'medical_landing_page_health_solution_section',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('medical_landing_page_health_text2',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_health_text2',array(
			'label'	=> __('Treatment Sub Text','medical-landing-page'),
			'input_attrs' => array(
            	'placeholder' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard', 'medical-landing-page' ),
        	),
			'section'	=> 'medical_landing_page_health_solution_section',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('medical_landing_page_team_icon',array(
			'default'	=> 'fas fa-users',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
	        $wp_customize,'medical_landing_page_team_icon',array(
			'label'	=> __('Team Icon','medical-landing-page'),
			'transport' => 'refresh',
			'section'	=> 'medical_landing_page_health_solution_section',
			'setting'	=> 'medical_landing_page_team_icon',
			'type'		=> 'icon'
		)));

		$wp_customize->add_setting('medical_landing_page_team_title',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_team_title',array(
			'label'	=> __('Team Title','medical-landing-page'),
			'input_attrs' => array(
            	'placeholder' => __( 'Dedicated Team', 'medical-landing-page' ),
        	),
			'section'	=> 'medical_landing_page_health_solution_section',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('medical_landing_page_team_text',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_team_text',array(
			'label'	=> __('Team Text','medical-landing-page'),
			'input_attrs' => array(
            	'placeholder' => __( 'Lorem Ipsum is simply dummy text of the printing and', 'medical-landing-page' ),
        	),
			'section'	=> 'medical_landing_page_health_solution_section',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('medical_landing_page_hospital_icon',array(
			'default'	=> 'fas fa-hospital',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
	        $wp_customize,'medical_landing_page_hospital_icon',array(
			'label'	=> __('Hospital Icon','medical-landing-page'),
			'transport' => 'refresh',
			'section'	=> 'medical_landing_page_health_solution_section',
			'setting'	=> 'medical_landing_page_hospital_icon',
			'type'		=> 'icon'
		)));

		$wp_customize->add_setting('medical_landing_page_hospital_title',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_hospital_title',array(
			'label'	=> __('Hospital Title','medical-landing-page'),
			'input_attrs' => array(
            	'placeholder' => __( 'Medical & Health', 'medical-landing-page' ),
        	),
			'section'	=> 'medical_landing_page_health_solution_section',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('medical_landing_page_hospital_text',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_hospital_text',array(
			'label'	=> __('Hospital Text','medical-landing-page'),
			'input_attrs' => array(
            	'placeholder' => __( 'Lorem Ipsum is simply dummy text of the printing and', 'medical-landing-page' ),
        	),
			'section'	=> 'medical_landing_page_health_solution_section',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('medical_landing_page_environment_icon',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control(new Ecommerce_Landing_Page_Fontawesome_Icon_Chooser(
	        $wp_customize,'medical_landing_page_environment_icon',array(
			'label'	=> __('Environment Icon','medical-landing-page'),
			'transport' => 'refresh',
			'section'	=> 'medical_landing_page_health_solution_section',
			'setting'	=> 'medical_landing_page_environment_icon',
			'type'		=> 'icon'
		)));

		$wp_customize->add_setting('medical_landing_page_environment_title',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_environment_title',array(
			'label'	=> __('Environment Title','medical-landing-page'),
			'input_attrs' => array(
            	'placeholder' => __( 'Friendly Environment', 'medical-landing-page' ),
        	),
			'section'	=> 'medical_landing_page_health_solution_section',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('medical_landing_page_environment_text',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('medical_landing_page_environment_text',array(
			'label'	=> __('Environment Text','medical-landing-page'),
			'input_attrs' => array(
            	'placeholder' => __( 'Lorem Ipsum is simply dummy text of the printing and', 'medical-landing-page' ),
        	),
			'section'	=> 'medical_landing_page_health_solution_section',
			'type'		=> 'text'
		));
	}

	add_action( 'customize_register', 'medical_landing_page_typography_customize_register', 12 );
	function medical_landing_page_typography_customize_register( $wp_customize ) {
		$wp_customize->remove_control( 'ecommerce_landing_page_second_color' );
	}

	define('MEDICAL_LANDING_PAGE_FREE_THEME_DOC',__('https://preview.vwthemesdemo.com/docs/free-medical-landing-page/','medical-landing-page'));
	define('MEDICAL_LANDING_PAGE_SUPPORT',__('https://wordpress.org/support/theme/medical-landing-page/','medical-landing-page'));
	define('MEDICAL_LANDING_PAGE_REVIEW',__('https://wordpress.org/support/theme/medical-landing-page/reviews','medical-landing-page'));
	define('MEDICAL_LANDING_PAGE_BUY_NOW',__('https://www.vwthemes.com/themes/landing-page-wordpress-theme/','medical-landing-page'));
	define('MEDICAL_LANDING_PAGE_LIVE_DEMO',__('https://www.vwthemes.net/vw-medical-landing-page/','medical-landing-page'));
	define('MEDICAL_LANDING_PAGE_PRO_DOC',__('https://preview.vwthemesdemo.com/docs/medical-landing-page-pro/','medical-landing-page'));
	define('MEDICAL_LANDING_PAGE_FAQ',__('https://www.vwthemes.com/faqs/','medical-landing-page'));
	define('MEDICAL_LANDING_PAGE_CONTACT',__('https://www.vwthemes.com/contact/','medical-landing-page'));
	define('MEDICAL_LANDING_PAGE_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','medical-landing-page'));
	define('MEDICAL_LANDING_PAGE_CREDIT',__('https://www.vwthemes.com/themes/free-medical-landing-page-wordpress-theme/','medical-landing-page'));

	if ( ! function_exists( 'medical_landing_page_credit' ) ) {
		function medical_landing_page_credit(){
			echo "<a href=".esc_url(MEDICAL_LANDING_PAGE_CREDIT)." target='_blank'>".esc_html__('Medical Landing Page WordPress Theme','medical-landing-page')."</a>";
		}
	}

	if ( ! defined( 'ECOMMERCE_LANDING_PAGE_GO_PRO' ) ) {
		define( 'ECOMMERCE_LANDING_PAGE_GO_PRO', 'https://www.vwthemes.com/themes/landing-page-wordpress-theme/');
	}

	if ( ! defined( 'ECOMMERCE_LANDING_PAGE_GETSTARTED_URL' ) ) {
	define( 'ECOMMERCE_LANDING_PAGE_GETSTARTED_URL', 'themes.php?page=medical_landing_page_guide');
	}

	function medical_landing_page_sanitize_phone_number( $phone ) {
		return preg_replace( '/[^\d+]/', '', $phone );
	}

	function medical_landing_page_sanitize_float( $input ) {
	    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	}


	/**
	 * Enqueue block editor style
	 */
	function medical_landing_page_block_editor_styles() {
	    wp_enqueue_style( 'medical-landing-page-font', medical_landing_page_font_url(), array() );
	    wp_enqueue_style( 'medical-landing-page-block-patterns-style-editor', get_theme_file_uri( '/inc/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
	    wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );
	}
	add_action( 'enqueue_block_editor_assets', 'medical_landing_page_block_editor_styles' );



	/* Theme Widgets Setup */

	function medical_landing_page_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Footer Navigation 1', 'medical-landing-page' ),
			'description'   => __( 'Appears on footer 1', 'medical-landing-page' ),
			'id'            => 'footer-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Navigation 2', 'medical-landing-page' ),
			'description'   => __( 'Appears on footer 2', 'medical-landing-page' ),
			'id'            => 'footer-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Navigation 3', 'medical-landing-page' ),
			'description'   => __( 'Appears on footer 3', 'medical-landing-page' ),
			'id'            => 'footer-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Navigation 4', 'medical-landing-page' ),
			'description'   => __( 'Appears on footer 4', 'medical-landing-page' ),
			'id'            => 'footer-4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'medical_landing_page_widgets_init' );


// Customizer Pro
load_template( ABSPATH . WPINC . '/class-wp-customize-section.php' );

class Medical_Landing_Page_Customize_Section_Pro extends WP_Customize_Section {
	public $type = 'medical-landing-page';
	public $pro_text = '';
	public $pro_url = '';
	public function json() {
		$json = parent::json();
		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );
		return $json;
	}
	protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}

final class Medical_Landing_Page_Customize {
	public static function get_instance() {
		static $instance = null;
		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}
		return $instance;
	}
	private function __construct() {}
	private function setup_actions() {
		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );
		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}
	public function sections( $manager ) {
		// Register custom section types.
		$manager->register_section_type( 'Medical_Landing_Page_Customize_Section_Pro' );
		// Register sections.
		$manager->add_section( new Medical_Landing_Page_Customize_Section_Pro( $manager, 'medical_landing_page_upgrade_pro_link',
		array(
			'priority'   => 1,
			'title'    => esc_html__( 'MEDICAL LANDING PAGE PRO', 'medical-landing-page' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'medical-landing-page' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/landing-page-wordpress-theme/'),
		) ) );

		// Register sections.
		$manager->add_section(new Medical_Landing_Page_Customize_Section_Pro($manager,'medical_landing_page_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'medical-landing-page' ),
			'pro_text' => esc_html__( 'DOCS', 'medical-landing-page' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-medical-landing-page/'),
		)));
	}
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'medical-landing-page-customize-controls', get_stylesheet_directory_uri() . '/assets/js/customize-controls-child.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'medical-landing-page-customize-controls', get_stylesheet_directory_uri() . '/assets/css/customize-controls-child.css' );
	}
}
Medical_Landing_Page_Customize::get_instance();

/* getstart */
require get_theme_file_path('/inc/getstart/getstart.php');

/* Plugin Activation */
require get_theme_file_path() . '/inc/getstart/plugin-activation.php';

/* Tgm */
require get_theme_file_path() . '/inc/tgm/tgm.php';

/* Block Pattern */
require get_theme_file_path('/inc/block-patterns/block-patterns.php');