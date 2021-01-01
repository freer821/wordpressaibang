<?php
/**
 * The template for displaying Author archive pages
 * @package Consulting Company
 */
get_header(); ?>
<!-- Start banner -->
<div class="banner <?php echo (has_header_image())?'':'no-header-img';?>">
    <?php  consulting_company_header_image(); ?>
    <div class="banner_text">
    <h1> <?php esc_html_e('All posts by','consulting-company'); echo " : ".get_the_author();?> </h1>    
    </div>
</div>
<!-- End banner -->
<!-- Main Content section -->
<section class="main_blog_content">
     <div class="container">
        <div class="row">
            <?php 
            $custom_class = (get_theme_mod('post_sidebar_layout', 'right') == 'left') ? "9" : ((get_theme_mod('post_sidebar_layout', 'right') == 'right') ? "9" : "12");  
            if ( get_theme_mod( 'post_sidebar_layout','right'  ) == "left" ) { ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">                
                <?php get_sidebar(); ?>
            </div><?php } ?>
            <div class="col-lg-<?php echo esc_attr($custom_class); ?> col-md-<?php echo esc_attr($custom_class); ?> col-sm-12 col-xs-12">
                <?php if ( have_posts() ) :
                        while ( have_posts() ) : the_post(); 
                            get_template_part( 'template-parts/post/content', get_post_format() );
                        endwhile;
                        the_posts_pagination( array(
                            'type'  => 'list',
                            'screen_reader_text' => ' ',
                            'prev_text'          => esc_html__( 'Previous', 'consulting-company' ),
                            'next_text'          => esc_html__('Next','consulting-company'),
                            ) );
                    endif; ?>
            </div>
            <?php if ( get_theme_mod( 'post_sidebar_layout','right' ) == "right" ) { ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Main content section end -->
<?php get_footer();