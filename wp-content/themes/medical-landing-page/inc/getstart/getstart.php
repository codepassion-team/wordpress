<?php
//about theme info
add_action( 'admin_menu', 'medical_landing_page_gettingstarted' );
function medical_landing_page_gettingstarted() {    	
	add_theme_page( esc_html__('About Medical Landing Page', 'medical-landing-page'), esc_html__('About Medical Landing Page', 'medical-landing-page'), 'edit_theme_options', 'medical_landing_page_guide', 'medical_landing_page_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function medical_landing_page_admin_theme_style() {
   wp_enqueue_style('medical-landing-page-custom-admin-style', esc_url(get_theme_file_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('medical-landing-page-tabs', esc_url(get_theme_file_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'medical_landing_page_admin_theme_style');

//guidline for about theme
function medical_landing_page_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$medical_landing_page_theme = wp_get_theme( 'medical-landing-page' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Medical Landing Page Theme', 'medical-landing-page' ); ?> <span class="version"><?php esc_html_e( 'Version:', 'medical-landing-page' ); ?><?php echo esc_html($medical_landing_page_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','medical-landing-page'); ?></p>
    </div>

   <div class="tab-sec">
		<div class="tab">
		  	<button class="tablinks" onclick="medical_landing_page_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'medical-landing-page' ); ?></button>
		  	<button class="tablinks" onclick="medical_landing_page_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'medical-landing-page' ); ?></button>
		  	<button class="tablinks" onclick="medical_landing_page_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'medical-landing-page' ); ?></button>
		  	<button class="tablinks" onclick="medical_landing_page_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'medical-landing-page' ); ?></button>
		  	<button class="tablinks" onclick="medical_landing_page_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'medical-landing-page' ); ?></button>
		</div>
		
		<?php
			$medical_landing_page_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$medical_landing_page_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Medical_Landing_Page_Plugin_Activation_Settings::get_instance();
				$medical_landing_page_actions = $plugin_ins->recommended_actions;
				?>
				<div class="medical-landing-page-recommended-plugins">
				    <div class="medical-landing-page-action-list">
				        <?php if ($medical_landing_page_actions): foreach ($medical_landing_page_actions as $key => $medical_landing_page_actionValue): ?>
				                <div class="medical-landing-page-action" id="<?php echo esc_attr($medical_landing_page_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($medical_landing_page_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($medical_landing_page_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($medical_landing_page_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','medical-landing-page'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($medical_landing_page_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'medical-landing-page' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('Medical Landing Page is a user-friendly WordPress theme tailored for medical professionals and healthcare organizations. With a clean and modern design, this theme provides a streamlined and accessible online platform to showcase essential information. Whether you own Healthcare centre, Medical Practices and Clinics, Hospitals and Medical Centers, Health and Wellness Centers, Pharmacies and Medical Supplies. This theme is compatible with contact form7 plugin and Ibtana. Pharmaceutical Companies, Veterinary Services, Dental Services, Rehabilitation Centers, Nutritionist and Dieticians and Maternity Service centers can also use this theme for their website. It is versatile theme that excels in the medical world. The layout is designed for simplicity and ease of navigation, ensuring that visitors can quickly find the information they need. The color scheme is calming and professional, creating a trustworthy and reassuring online presence for medical services. The responsive design ensures that the landing page looks and functions seamlessly on various devices, accommodating patients who access the website from desktops, tablets, or smartphones. Key features of this theme include prominent contact details, appointment scheduling options, and sections to highlight medical services offered. The theme prioritizes user experience, making it straightforward for patients to learn about the healthcare facility, the medical professionals involved, and the range of services available. The Medical Landing Page WordPress Theme is a valuable tool for healthcare providers seeking a polished and effective online presence. It serves as a welcoming virtual front door, providing patients with essential information and establishing trust in the medical services offered. Demo: https://www.vwthemes.net/vw-medical-landing-page/','medical-landing-page'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'medical-landing-page' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'medical-landing-page' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( MEDICAL_LANDING_PAGE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'medical-landing-page' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'medical-landing-page'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'medical-landing-page'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'medical-landing-page'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'medical-landing-page'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'medical-landing-page'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( MEDICAL_LANDING_PAGE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'medical-landing-page'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'medical-landing-page'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'medical-landing-page'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( MEDICAL_LANDING_PAGE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'medical-landing-page'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'medical-landing-page' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','medical-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_banner') ); ?>" target="_blank"><?php esc_html_e('Banner Settings','medical-landing-page'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_topbar_section') ); ?>" target="_blank"><?php esc_html_e('Topbar Settings','medical-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=medical_landing_page_about_section') ); ?>" target="_blank"><?php esc_html_e('About Section','medical-landing-page'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','medical-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','medical-landing-page'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','medical-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=medical_landing_page_health_solution_section') ); ?>" target="_blank"><?php esc_html_e('Health Solution Section','medical-landing-page'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','medical-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','medical-landing-page'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','medical-landing-page'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','medical-landing-page'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','medical-landing-page'); ?></span><?php esc_html_e(' Go to ','medical-landing-page'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','medical-landing-page'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','medical-landing-page'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','medical-landing-page'); ?></span><?php esc_html_e(' Go to ','medical-landing-page'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','medical-landing-page'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','medical-landing-page'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','medical-landing-page'); ?> <a class="doc-links" href="https://preview.vwthemesdemo.com/docs/free-medical-landing-page/" target="_blank"><?php esc_html_e('Documentation','medical-landing-page'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>		

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Medical_Landing_Page_Plugin_Activation_Settings::get_instance();
			$medical_landing_page_actions = $plugin_ins->recommended_actions;
			?>
				<div class="medical-landing-page-recommended-plugins">
				    <div class="medical-landing-page-action-list">
				        <?php if ($medical_landing_page_actions): foreach ($medical_landing_page_actions as $key => $medical_landing_page_actionValue): ?>
				                <div class="medical-landing-page-action" id="<?php echo esc_attr($medical_landing_page_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($medical_landing_page_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($medical_landing_page_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($medical_landing_page_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'medical-landing-page' ); ?></h3>
				<hr class="h3hr">
				<div class="medical-landing-page-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','medical-landing-page'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
						<h3><?php esc_html_e( 'Link to customizer', 'medical-landing-page' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','medical-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','medical-landing-page'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','medical-landing-page'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_footer_section') ); ?>" target="_blank"><?php esc_html_e('Footer Text','medical-landing-page'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','medical-landing-page'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','medical-landing-page'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','medical-landing-page'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','medical-landing-page'); ?></a>
								</div> 
							</div>

						</div>
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = Medical_Landing_Page_Plugin_Activation_Woo_Products::get_instance();
				$medical_landing_page_actions = $plugin_ins->recommended_actions;
				?>
				<div class="medical-landing-page-recommended-plugins">
					    <div class="medical-landing-page-action-list">
					        <?php if ($medical_landing_page_actions): foreach ($medical_landing_page_actions as $key => $medical_landing_page_actionValue): ?>
					                <div class="medical-landing-page-action" id="<?php echo esc_attr($medical_landing_page_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($medical_landing_page_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($medical_landing_page_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($medical_landing_page_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'medical-landing-page' ); ?></h3>
				<hr class="h3hr">
				<div class="medical-landing-page-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','medical-landing-page'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','medical-landing-page'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','medical-landing-page'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','medical-landing-page'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','medical-landing-page'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','medical-landing-page'); ?></span></b></p>
	              	<div class="medical-landing-page-pattern-page-btn">
				    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','medical-landing-page'); ?>
				    		</a>
			    		</div>
	              	<p><?php esc_html_e('You can create a template as you like.','medical-landing-page'); ?></span></p>
			  </div>
			<?php } ?>
		</div>	

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'medical-landing-page' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('The Landing Page WordPress Theme stands as a pinnacle of excellence in crafting a captivating online presence. Designed with meticulous attention to detail, this theme offers a sophisticated and visually stunning platform for businesses, services, or individuals aiming to make a lasting impression. The theme boasts a clean, modern aesthetic that not only captures attention but also ensures a seamless and engaging user experience. Its layout is meticulously crafted to guide visitors through a strategically organized display of content, making it an ideal choice for showcasing products, services, or essential information. The benefits of opting for a premium theme become evident in its advanced customization options. Tailor the theme extensively to align with your brand identity, utilizing features such as customizable color schemes, fonts, and layouts. This level of personalization ensures a distinctive and memorable online presence. Whether you’re promoting a product, launching a service, or simply establishing an online portfolio, this theme provides the flexibility and sophistication required to stand out in the digital landscape.','medical-landing-page'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( MEDICAL_LANDING_PAGE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'medical-landing-page'); ?></a>
					<a href="<?php echo esc_url( MEDICAL_LANDING_PAGE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'medical-landing-page'); ?></a>
					<a href="<?php echo esc_url( MEDICAL_LANDING_PAGE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'medical-landing-page'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'medical-landing-page' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'medical-landing-page'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'medical-landing-page'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Banner Settings', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Template Pages', 'medical-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'medical-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'medical-landing-page'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Home Page Template', 'medical-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'medical-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('5', 'medical-landing-page'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Theme sections', 'medical-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'medical-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('9', 'medical-landing-page'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Appointment Page Template', 'medical-landing-page'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'medical-landing-page'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Blog Templates & Layout', 'medical-landing-page'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1(Full width/Left/Right Sidebar)', 'medical-landing-page'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('WordPress 6.4 or later', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('PHP 8.2 or 8.3', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('MySQL 5.6 (or greater) | MariaDB 10.0 (or greater)', 'medical-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( MEDICAL_LANDING_PAGE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'medical-landing-page'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'medical-landing-page'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'medical-landing-page'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( MEDICAL_LANDING_PAGE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'medical-landing-page'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'medical-landing-page'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'medical-landing-page'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( MEDICAL_LANDING_PAGE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'medical-landing-page'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'medical-landing-page'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'medical-landing-page'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( MEDICAL_LANDING_PAGE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'medical-landing-page'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'medical-landing-page'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'medical-landing-page'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( MEDICAL_LANDING_PAGE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','medical-landing-page'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'medical-landing-page'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'medical-landing-page'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( MEDICAL_LANDING_PAGE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'medical-landing-page'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>