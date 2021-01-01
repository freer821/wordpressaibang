<!-- Footer start -->
    <footer>
    <?php if(is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) { ?>
        <div class="first_footer layout-set">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><?php dynamic_sidebar( 'footer-1' ); ?></div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><?php dynamic_sidebar( 'footer-2' ); ?></div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><?php dynamic_sidebar( 'footer-3' ); ?></div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><?php dynamic_sidebar( 'footer-4' ); ?></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="site-info">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 text-center">
                    <?php if(get_theme_mod('footerCopyright') != ""){ ?>
                    <p><?php echo wp_kses_post(get_theme_mod('footerCopyright')); ?></p>
                    <?php } 
                    esc_html_e('Theme : ','consulting-company'); ?><a href="<?php echo esc_url('https://cipherthemes.com/wordpress-theme/consulting-company'); ?>"><?php esc_html_e(' Consulting Company WordPress Theme','consulting-company'); ?></a>
                    </div>
                </div>
            </div>
            <div class="scroll_top">
                <span class="fa fa-chevron-up">
          </span>
            </div>
        </div>
 </footer>
<!-- Footer End -->
<?php wp_footer(); ?>