<?php
/**
 * The template for displaying single posts
 * @package Consulting Company
 */
get_header(); ?>
<!-- Start banner -->
<div class="banner <?php echo (has_header_image())?'':'no-header-img';?>">
    <?php  consulting_company_header_image(); ?>
    <div class="banner_text">
    <h1><?php the_title();?></h1>
    </div>
</div>
<!-- End banner -->
<!-- Main Content section -->
<section class="main_blog_content detail_page">
    <div class="container">
        <div class="row">
            <?php 
            $custom_class = (get_theme_mod('single_post_sidebar_layout', 'right') == 'left') ? "9" : ((get_theme_mod('single_post_sidebar_layout', 'right') == 'right') ? "9" : "12");  
            if ( get_theme_mod( 'single_post_sidebar_layout','right'  ) == "left" ) { ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">                
                <?php get_sidebar(); ?>
            </div><?php } ?>
            <div class="col-lg-<?php echo esc_attr($custom_class); ?> col-md-<?php echo esc_attr($custom_class); ?> col-sm-12 col-xs-12">
                <?php if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>
                <div class="blog-post">
                    <div class="post-simple-thumbnail">
                    <?php if ( get_theme_mod( 'hide_single_post_image' ) == "" ) {  ?>
                        <div class="post-thumb">
                             <?php if(has_post_thumbnail()):
                                    the_post_thumbnail('full'); 
                                endif; ?>
                        </div>
                    <?php } ?>
                        <div class="post-info">
                            <?php if ( get_theme_mod( 'hide_single_post_meta_tag' ) == "" ) {  ?>
                                <div class="post-categories">
                                <?php if(get_the_category()) : echo '<i class="fa fa-folder-open-o" aria-hidden="true"></i> '; the_category( __( ', ', 'consulting-company' )); endif;?>
                                </div>
                            <?php } ?>
                           
                            <?php the_content(); 
                                wp_link_pages(); ?>
                            <?php if ( get_theme_mod( 'hide_single_post_meta_tag' ) == "" ) {  ?>
                            <div class="post-meta">
                                <?php consulting_company_entry_meta(); ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif; 
             /* Pagignation Start */
                the_post_navigation( array(
                'type'  => 'list','prev_text' => '<i class="fa fa-arrow-left" aria-hidden="true"></i>'.esc_html__( ' Previous', 'consulting-company' ),
                'next_text' => esc_html__( 'Next ', 'consulting-company' ).'<i class="fa fa-arrow-right" aria-hidden="true"></i>',
                'screen_reader_text' => ' ',                         
                ) ); 
                
            /* Pagignation End*/
            if (comments_open() || get_comments_number()) :  ?>
                <div class="comments">
                <?php if(get_comments_number() > 0){ ?>
                    <div class="comment_title">
                        <h3 class="title_line"><i class="fa fa-comments"></i> <?php esc_html_e('Comments','consulting-company'); ?></h3>
                    </div>
                <?php } 
                comments_template(); ?>
                </div>
            <?php endif;?>
            </div>
            <?php if ( get_theme_mod( 'single_post_sidebar_layout','right' ) == "right" ) { ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="sidebar">
                   <?php get_sidebar(); ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Main content section end -->

<?php get_footer();