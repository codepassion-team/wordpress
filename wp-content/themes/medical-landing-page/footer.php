<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Medical Landing Page
 */
?>

    <footer role="contentinfo">
        <?php if (get_theme_mod('ecommerce_landing_page_footer_hide_show', true)){ ?>
            <aside id="footer" class="copyright-wrapper" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'medical-landing-page' ); ?>">
                <div class="container">
                    <?php
                        $medical_landing_page_count = 0;
                        
                        if ( is_active_sidebar( 'footer-1' ) ) {
                            $medical_landing_page_count++;
                        }
                        if ( is_active_sidebar( 'footer-2' ) ) {
                            $medical_landing_page_count++;
                        }
                        if ( is_active_sidebar( 'footer-3' ) ) {
                            $medical_landing_page_count++;
                        }
                        if ( is_active_sidebar( 'footer-4' ) ) {
                            $medical_landing_page_count++;
                        }
                        // $medical_landing_page_count == 0 none
                        if ( $medical_landing_page_count == 1 ) {
                            $medical_landing_page_colmd = 'col-md-12 col-sm-12';
                        } elseif ( $medical_landing_page_count == 2 ) {
                            $medical_landing_page_colmd = 'col-md-6 col-sm-6';
                        } elseif ( $medical_landing_page_count == 3 ) {
                            $medical_landing_page_colmd = 'col-md-4 col-sm-4';
                        } else {
                            $medical_landing_page_colmd = 'col-md-3 col-sm-3';
                        }
                    ?>
                    <div class="row">
                        <div class="<?php if ( !is_active_sidebar( 'footer-1' ) ){ echo "footer_hide"; }else{ echo "$medical_landing_page_colmd"; } ?> col-xs-12 footer-block">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>
                        <div class="<?php if ( is_active_sidebar( 'footer-2' ) ){ echo "$medical_landing_page_colmd"; }else{ echo "footer_hide"; } ?> col-xs-12 footer-block">
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                        <div class="<?php if ( is_active_sidebar( 'footer-3' ) ){ echo "$medical_landing_page_colmd"; }else{ echo "footer_hide"; } ?> col-xs-12 col-xs-12 footer-block">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>
                        <div class="<?php if ( !is_active_sidebar( 'footer-4' ) ){ echo "footer_hide"; }else{ echo "$medical_landing_page_colmd"; } ?> col-xs-12 footer-block">
                            <?php dynamic_sidebar('footer-4'); ?>
                        </div>
                    </div>
                </div>
            </aside>
        <?php }?> 
        <?php if (get_theme_mod('ecommerce_landing_page_copyright_hide_show', true)) {?>
            <div id="footer-2" class="pt-3 pb-3 text-center">
                <div class="copyright container">
                    <p class="mb-0"><?php medical_landing_page_credit(); ?> <?php echo esc_html(get_theme_mod('ecommerce_landing_page_footer_text',__('By VWThemes','medical-landing-page'))); ?></p>
                    <?php if ( ! dynamic_sidebar( 'footer-icon' ) ) : ?> 
                        <?php dynamic_sidebar('footer-icon'); ?>
                    <?php endif; ?>
                    <?php if( get_theme_mod( 'ecommerce_landing_page_footer_scroll',true) == 1 || get_theme_mod( 'ecommerce_landing_page_resp_scroll_top_hide_show',true) == 1) { ?>
                        <?php $ecommerce_landing_page_theme_lay = get_theme_mod( 'ecommerce_landing_page_scroll_top_alignment','Right');
                        if($ecommerce_landing_page_theme_lay == 'Left'){ ?>
                            <a href="#" class="scrollup left"><i class="<?php echo esc_attr(get_theme_mod('ecommerce_landing_page_scroll_to_top_icon','fas fa-long-arrow-alt-up')); ?> p-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Back To Top', 'medical-landing-page' ); ?></span></a>
                        <?php }else if($ecommerce_landing_page_theme_lay == 'Center'){ ?>
                            <a href="#" class="scrollup center"><i class="<?php echo esc_attr(get_theme_mod('ecommerce_landing_page_scroll_to_top_icon','fas fa-long-arrow-alt-up')); ?> p-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Back To Top', 'medical-landing-page' ); ?></span></a>
                        <?php }else{ ?>
                            <a href="#" class="scrollup"><i class="<?php echo esc_attr(get_theme_mod('ecommerce_landing_page_scroll_to_top_icon','fas fa-long-arrow-alt-up')); ?> p-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Back To Top', 'medical-landing-page' ); ?></span></a>
                        <?php }?>
                    <?php }?>
                </div>
                <div class="clear"></div>
            </div>
        <?php }?>
    </footer>
        <?php wp_footer(); ?>
    </body>
</html>