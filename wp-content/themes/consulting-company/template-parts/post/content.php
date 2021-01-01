<?php
/**
 * Template part for displaying posts
 * @package Consulting Company
 */
$custom_class = (get_theme_mod('post_sidebar_layout', 'right') == 'left') ? "6" : ((get_theme_mod('post_sidebar_layout', 'right') == 'right') ? "6" : "4"); 
$no_image_class=(get_theme_mod('post_sidebar_layout', 'right')=="full") ? "no-post-image-full" : "no-post-image";
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="blog-cls col-lg-<?php echo esc_attr($custom_class); ?> col-md-<?php echo esc_attr($custom_class); ?> col-sm-12 col-xs-12">
     <div class="blog-post">
        <div class="post-simple-thumbnail">
        <?php if ( get_theme_mod( 'hide_post_image' ) == "" ) { ?>
            <!-- Start Thumbnail -->
            <div class="post-thumb">
                <a href="<?php the_permalink(); ?>">
                <?php if(has_post_thumbnail()) 
                    {
                        the_post_thumbnail( 'consulting-company-blog-image', array('class' => '') );
                    }else {
                        echo '<div class="'.esc_attr($no_image_class).'"><i class="fa fa-file-image-o" aria-hidden="true"></i></div>';
                     } ?> 
                </a>
            </div>
            <!-- End Thumbnail -->
            <?php } ?>
            <!-- Start Post Info -->
            <div class="post-info">
                <!-- Start Post Categories -->
                <div class="post-categories">
                    <?php if(get_the_category_list()) : echo '<i class="fa fa-folder-open"></i> '; echo get_the_category_list(', ', 'consulting-company');
                    endif; ?>
                </div>
                <!-- End Post Categories -->
                <!-- Post Title -->
                <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words( get_the_title(), 5, '...' )); ?></a></h3>
                <div class="post-contents-cls"><p><?php the_excerpt(); ?></p></div>
                <!-- Start Post Meta -->
                <?php if ( get_theme_mod( 'hide_post_meta_tag' ) == "" ) {  ?>
                <div class="post-meta"><?php consulting_company_entry_meta(); ?></div>
                <?php } ?>
                <!-- End Post Meta -->
            </div>
            <!-- End Post Info -->
        </div>
    </div>
</div>
</div>