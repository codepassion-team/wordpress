<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php if( get_theme_mod( 'ecommerce_landing_page_show_hide_banner',false) == 1) { ?>
    <section id="banner" class="position-relative wow bounceInDown delay-1000" data-wow-duration="3s">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12 banner-main-text align-self-center">
            <div class="inner_carousel">
              <?php if(get_theme_mod('ecommerce_landing_page_tagline_title') != '') {?>
                <h2 class="mb-3"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_tagline_title')) ?></h2>
              <?php }?>
              <?php if(get_theme_mod('ecommerce_landing_page_designation_text') != '') {?>
                <p class="slider-para"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_designation_text')) ?></p>
              <?php }?>
              <div class="row">
                <div class="col-lg-4 col-md-6 col-12 align-self-center">
                  <?php if ( get_theme_mod('ecommerce_landing_page_banner_button_label','Book Now') != '' ) {?>
                    <div class ="read-more mt-md-4 mt-0">
                      <a href="<?php echo esc_url(get_theme_mod('ecommerce_landing_page_top_button_url',false));?>"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_banner_button_label','Book Now'));?>
                        <span class="screen-reader-text"><?php esc_html_e( 'Book Now','medical-landing-page');?></span>
                      </a>
                    </div>
                  <?php }?>
                </div>
                <div class="col-lg-8 col-md-6 col-12 video-btn align-self-center d-flex">
                  <a id="openBtn"><i class="<?php echo esc_attr(get_theme_mod('medical_landing_page_video_button_icon','fas fa-play')); ?>"></i></a>
                  <p class="video-text align-self-center mb-0 ms-3"><?php echo esc_html( get_theme_mod('medical_landing_page_video_button_text','See How We Work') ); ?></p>
                    <div class="overlay" id="videoOverlay">
                      <div class="popup">
                        <span class="close-btn"><i class="fas fa-times"></i></span>
                        <iframe width="100%" height="100%" src="<?php echo esc_url(get_theme_mod('medical_landing_page_video_button_url'));?>" frameborder="0" allowfullscreen></iframe>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <?php if( get_theme_mod( 'medical_landing_page_show_hide_image_sec',false) == 1) { ?>
            <div class="col-lg-6 col-md-6 col-12 banner-img text-center align-self-lg-center">
              <div class="banner-image">
                <?php if(get_theme_mod('medical_landing_page_banner_image') != '') {?>
                  <img src="<?php echo esc_url(get_theme_mod('medical_landing_page_banner_image')); ?>" alt="" />
                <?php }?>
              </div>
              <div class="phone">
                <div class="row">
                  <div class="col-lg-2 col-md-2 col-12 align-self-center">
                    <?php if(get_theme_mod('medical_landing_page_phone_icon') != '') {?>
                      <i class="<?php echo esc_attr(get_theme_mod('medical_landing_page_phone_icon','fas fa-phone')); ?>" aria-hidden="true"></i>
                    <?php }?>
                  </div>
                  <div class="col-lg-10 col-md-10 col-12 align-self-center">
                    <?php if(get_theme_mod('medical_landing_page_phone_text') != '') {?>
                      <p class="phone-text"><?php echo esc_html( get_theme_mod('medical_landing_page_phone_text','') ); ?></p>
                    <?php }?>
                    <?php if(get_theme_mod('medical_landing_page_phone_number') != '') {?>
                      <p><a class="phone-no" href="tel:<?php echo esc_attr( get_theme_mod('medical_landing_page_phone_number','' )); ?>"><?php echo esc_html( get_theme_mod('medical_landing_page_phone_number','') ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('medical_landing_page_phone_number','') ); ?></span></a></p> 
                    <?php }?>  
                  </div>
                </div>
              </div>
              <div class="review">
                <?php if(get_theme_mod('medical_landing_page_review_text') != '') {?>
                  <p class="review-text"><?php echo esc_html( get_theme_mod('medical_landing_page_review_text','') ); ?></p>
                <?php }?>  
              </div>  
              <div class="about">
                <?php if(get_theme_mod('medical_landing_page_about_icon') != '') {?>
                  <i class="<?php echo esc_attr(get_theme_mod('medical_landing_page_about_icon','fas fa-user-md')); ?>" aria-hidden="true"></i>
                <?php }?>
                <?php if(get_theme_mod('medical_landing_page_about_title') != '') {?>
                  <p class="about-title"><?php echo esc_html( get_theme_mod('medical_landing_page_about_title','') ); ?></p>
                <?php }?>
                <?php if(get_theme_mod('medical_landing_page_about_text') != '') {?>
                  <p class="about-text"><?php echo esc_html( get_theme_mod('medical_landing_page_about_text','') ); ?></p>
                <?php }?>
              </div>
            </div>
          <?php }?>
        </div>
      </div>
      <!-- About Section -->
      <?php if( get_theme_mod( 'medical_landing_page_show_hide_about_sec',false) == 1) { ?>
        <div class="about-section wow bounceInDown delay-1000" data-wow-duration="3s">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-6 align-self-center">
              <div class="rating">
                <div class="row">
                  <div class="col-lg-2 col-md-2 col-2 align-self-center">
                    <?php if(get_theme_mod('medical_landing_page_rating_icon') != '') {?>
                      <i class="<?php echo esc_attr(get_theme_mod('medical_landing_page_rating_icon','fas fa-users')); ?>" aria-hidden="true"></i>
                    <?php }?>
                  </div>
                  <div class="col-lg-10 col-md-10 col-10 align-self-center">
                    <?php if(get_theme_mod('medical_landing_page_rating_count') != '') {?>
                      <p class="rating-count"><?php echo esc_html( get_theme_mod('medical_landing_page_rating_count','') ); ?><?php esc_html_e( '%', 'medical-landing-page' ); ?></p>
                    <?php }?>
                    <?php if(get_theme_mod('medical_landing_page_rating_text') != '') {?>
                      <p class="rating-text"><?php echo esc_html( get_theme_mod('medical_landing_page_rating_text','') ); ?></p>  
                    <?php }?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-6 align-self-center">
              <div class="expert-doctor">
                <div class="row">
                  <div class="col-lg-2 col-md-2 col-2 align-self-center">
                    <?php if(get_theme_mod('medical_landing_page_expert_doctor_icon') != '') {?>
                      <i class="<?php echo esc_attr(get_theme_mod('medical_landing_page_expert_doctor_icon','fas fa-user-md')); ?>" aria-hidden="true"></i>
                    <?php }?>
                  </div>
                  <div class="col-lg-10 col-md-10 col-10 align-self-center">
                    <?php if(get_theme_mod('medical_landing_page_expert_doctor_count') != '') {?>
                      <p class="expert-doctor-count"><?php echo esc_html( get_theme_mod('medical_landing_page_expert_doctor_count','') ); ?><?php esc_html_e( '+', 'medical-landing-page' ); ?></p>
                    <?php }?>
                    <?php if(get_theme_mod('medical_landing_page_expert_doctor_text') != '') {?>
                      <p class="expert-doctor-text"><?php echo esc_html( get_theme_mod('medical_landing_page_expert_doctor_text','') ); ?></p>  
                    <?php }?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php }?>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'ecommerce_landing_page_after_slider' ); ?>
  
  <!--  Health Solution Section -->
  <?php if( get_theme_mod( 'medical_landing_page_show_hide_solution_section',false) == 1) { ?>
    <section id="health-solution-section" class="wow bounceInDown delay-1000 py-5" data-wow-duration="3s">
      <div class="container"> 
        <div class="health-solution">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-12 health-img-sec align-self-center mb-5">
              <div class="health-image1">
                <?php if(get_theme_mod('medical_landing_page_health_image1') != '') {?>
                  <img src="<?php echo esc_url(get_theme_mod('medical_landing_page_health_image1')); ?>" alt="" />
                <?php }?>
              </div>
              <div class="health-image2">
                <?php if(get_theme_mod('medical_landing_page_health_image2') != '') {?>
                  <img src="<?php echo esc_url(get_theme_mod('medical_landing_page_health_image2')); ?>" alt="" />
                <?php }?>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 health-text-sec align-self-center">
              <?php if(get_theme_mod('medical_landing_page_health_title') != '') {?>
                <h3 class="mb-3"><?php echo esc_html(get_theme_mod('medical_landing_page_health_title')) ?></h3>
              <?php }?>
              <?php if(get_theme_mod('medical_landing_page_health_text1') != '') {?>
                <p class="health-para"><?php echo esc_html(get_theme_mod('medical_landing_page_health_text1')) ?></p>
              <?php }?>
              <?php if(get_theme_mod('medical_landing_page_health_text2') != '') {?>
                <p class="health-para1 my-4"><?php echo esc_html(get_theme_mod('medical_landing_page_health_text2')) ?></p>
              <?php }?>
              <div class="info-sec">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-12 team-sec align-self-center">
                    <div class="team">
                      <?php if(get_theme_mod('medical_landing_page_team_icon') != '') {?>
                        <i class="<?php echo esc_attr(get_theme_mod('medical_landing_page_team_icon','fas fa-users')); ?>" aria-hidden="true"></i>
                      <?php }?>
                      <?php if(get_theme_mod('medical_landing_page_team_title') != '') {?>
                        <p class="team-title my-2"><?php echo esc_html( get_theme_mod('medical_landing_page_team_title','') ); ?></p>
                      <?php }?>
                      <?php if(get_theme_mod('medical_landing_page_team_text') != '') {?>
                        <p class="team-text mb-0"><?php echo esc_html( get_theme_mod('medical_landing_page_team_text','') ); ?></p>
                      <?php }?>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-12 hospital-sec align-self-center">
                    <div class="hospital">
                      <?php if(get_theme_mod('medical_landing_page_hospital_icon') != '') {?>
                        <i class="<?php echo esc_attr(get_theme_mod('medical_landing_page_hospital_icon','fas fa-hospital')); ?>" aria-hidden="true"></i>
                      <?php }?>
                      <?php if(get_theme_mod('medical_landing_page_hospital_title') != '') {?>
                        <p class="hospital-title my-2"><?php echo esc_html( get_theme_mod('medical_landing_page_hospital_title','') ); ?></p>
                      <?php }?>
                      <?php if(get_theme_mod('medical_landing_page_hospital_text') != '') {?>
                        <p class="hospital-text mb-0"><?php echo esc_html( get_theme_mod('medical_landing_page_hospital_text','') ); ?></p>
                      <?php }?>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-12 environment-sec align-self-center">
                    <div class="environment">
                      <?php if(get_theme_mod('medical_landing_page_environment_icon') != '') {?>
                        <i class="<?php echo esc_attr(get_theme_mod('medical_landing_page_environment_icon','')); ?>" aria-hidden="true"></i>
                      <?php }?>
                      <?php if(get_theme_mod('medical_landing_page_environment_title') != '') {?>
                        <p class="environment-title my-2"><?php echo esc_html( get_theme_mod('medical_landing_page_environment_title','') ); ?></p>
                      <?php }?>
                      <?php if(get_theme_mod('medical_landing_page_environment_text') != '') {?>
                        <p class="environment-text mb-0"><?php echo esc_html( get_theme_mod('medical_landing_page_environment_text','') ); ?></p>
                      <?php }?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php }?>

  <!-- latest news and blog Section -->
  <?php if( get_theme_mod( 'ecommerce_landing_page_latest_news_blog_heading')|| get_theme_mod( 'ecommerce_landing_page_latest_news_blog_small_title') || get_theme_mod( 'ecommerce_landing_page_events_category')) { ?>
    <section id="latest-post-section" class="wow bounceInDown delay-1000 py-5" data-wow-duration="3s">
      <div class="container"> 
        <div class="latest-post-head">
          <?php if( get_theme_mod('ecommerce_landing_page_latest_news_blog_heading') != '' ){ ?>
            <h4 class="heading-text text-center"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_latest_news_blog_heading',''));?></h4>
          <?php }?>
          <?php if( get_theme_mod('ecommerce_landing_page_latest_news_blog_small_title') != '' ){ ?>
            <p class="small-text text-center"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_latest_news_blog_small_title',''));?></p>
          <?php }?>
        </div>
        <div class="row">
          <?php
            $ecommerce_landing_page_catdata=  get_theme_mod('ecommerce_landing_page_events_category');
            if($ecommerce_landing_page_catdata){
            $page_query = new WP_Query(array( 'category_name' => esc_html($ecommerce_landing_page_catdata ,'medical-landing-page'))); ?>         
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="col-lg-4 col-md-6 pb-5">
                <div class="events-box position-relative">
                  <?php if(has_post_thumbnail()){
                   the_post_thumbnail(); ?>
                  <span class="event-date"><?php echo esc_html( get_the_date() ); ?></span>
                  <?php } ?>
                  <span class="event-location"><?php the_category(); ?></span>
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                  <div class="author-comment d-flex gap-4 align-items-center">
                    <?php if( get_theme_mod( 'ecommerce_landing_page_blog_latest_post_author',true) == 1 || get_theme_mod( 'ecommerce_landing_page_blog_latest_post_comments',true) == 1 ) { ?>
                      <?php if(get_theme_mod('ecommerce_landing_page_blog_latest_post_author',true)==1){ ?>
                        <span class="entry-author">
                          <i class="<?php echo esc_attr(get_theme_mod('ecommerce_landing_page_latest_post_author_icon','fas fa-user')); ?> me-2">
                          </i>
                          <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?>
                            <span class="screen-reader-text"><?php the_author(); ?></span>
                          </a>
                        </span>
                      <?php } ?>
                      <?php if(get_theme_mod('ecommerce_landing_page_blog_latest_post_comments',true)==1){ ?>
                        <span class="entry-comments">
                          <i class="<?php echo esc_attr(get_theme_mod('ecommerce_landing_page_latest_post_comments_icon','fas fa-comment')); ?> me-2" aria-hidden="true">
                          </i>
                          <?php comments_number( __('0 Comment', 'medical-landing-page'), __('0 Comments', 'medical-landing-page'), __('% Comments', 'medical-landing-page') ); ?>
                        </span>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();}
          ?>
        </div>
      </div>
    </section>
  <?php }?>
  <?php do_action( 'ecommerce_landing_page_after_latest_news_blog_section' ); ?>  

  <div id="content-vw" class="py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>