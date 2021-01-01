<?php
/*
* Template Name: Front Page
*/
get_header(); ?>
<!-- Start Slider -->
<?php if(get_theme_mod('hide_slider_section') == ""){ ?>
    <div class="slider">
        <div id="home-slider" class="owl-carousel owl-theme">
        <?php for($consulting_company=1;$consulting_company<=2;$consulting_company++){ 
            $url = wp_get_attachment_url(get_theme_mod('slider_image_'.$consulting_company)); 
            if($url != ""){ ?>
            <div class="item">
                <div class="custom_overlay_wrapper">
                    <img src="<?php echo esc_url($url); ?>">
                    <?php if(get_theme_mod('slide_title_'.$consulting_company) != "" || get_theme_mod('slide_description_'.$consulting_company) != ""){ ?>
                    <div class="custom_overlay">
                        <span class="custom_overlay_inner">
                            <h4><?php echo esc_html(get_theme_mod('slide_title_'.$consulting_company)); ?></h4>
                            <p><?php echo esc_html(get_theme_mod('slide_description_'.$consulting_company)); ?></p>
                            <?php if(get_theme_mod('slide_button_title_'.$consulting_company) != ""){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('slide_link_'.$consulting_company)); ?>" class="read_more"><?php echo esc_html(get_theme_mod('slide_button_title_'.$consulting_company)); ?>
                            </a><?php } ?>
                        </span>
                    </div>
                    <?php } ?>
                </div>
            </div>
        <?php } } ?>
        </div>
    </div>
<!-- End Slider -->  
<?php } 
if(get_theme_mod('hide_about_us_section') == ""){ ?>
<!-- About us Start -->
<section class="about_us layout-set">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12 text-center">
                <h2><?php echo esc_html(get_theme_mod('about_us_section_title',esc_html__('About Us','consulting-company'))) ?></h2>
            </div>
        </div>
        <div class="row">
          <?php 
          $latestpost = new WP_Query(array('post_type' => 'page', 'post__in' => array(get_theme_mod('about_us_section_page_id')) ));    
                if($latestpost->have_posts()) : 
                while($latestpost->have_posts()) : $latestpost->the_post();
                    $image_col_cls =(has_post_thumbnail())?"8":"12";
                    if(has_post_thumbnail()): ?>
                     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
                        <div class="about_us_img layout-set"><?php the_post_thumbnail('consulting-company-our-blog-home',array('class' => 'img-responsive responsive--full'));?></div>
                    </div>
                    <?php endif; ?>
                    <div class="col-xs-12 col-md-<?php echo esc_attr($image_col_cls) ?> col-lg-<?php echo esc_attr($image_col_cls) ?> col-sm-12">
                        <h4><?php the_title(); ?></h4>
                        <?php the_content(); ?>
                    </div>     
                     <?php 
                endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
</section>
<!-- About us End -->
<?php } 
if(get_theme_mod('hide_our_blog_section') == ""){ ?>
<!-- Blog start -->
<section class="blog-wrapper">
 <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <h2><?php echo esc_html(get_theme_mod('our_blog_section_title',esc_html__('Our Blog','consulting-company') )) ?></h2>
            <div class="service_description">
            <p><?php echo esc_html(get_theme_mod('our_blog_description')) ?></p>
            </div>
        </div>
        <?php    
        $post_per_page=2;
        $args = array('cat' => get_theme_mod('our_blog_section_category'), 'order' => 'DESC', 'posts_per_page' => $post_per_page,'post_status' => 'publish');
        query_posts($args);
        if(have_posts()) : 
        while (have_posts()) : the_post(); ?>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="blog-inner">
                <div class="row zig-zag-row">
                <?php if(has_post_thumbnail()): 
                    $col=7; ?>
                    <div class="col-md-5">
                    <a href="<?php the_permalink(); ?>">
                        <div class="post-thumb">
                            <?php the_post_thumbnail('consulting-company-our-blog-home',array('class' => 'img-responsive responsive--full')); ?>
                        </div>
                    </a>
                    </div>
                    <?php  else: $col=12;
                        endif; ?>
                    <div class="col-md-<?php echo esc_attr($col); ?>  align-self-center <?php echo esc_attr($blog_cls); ?>">
                        <div class="entry-title">
                        <h3><a href="<?php the_permalink(); ?>" class="post-title"><?php echo esc_html(wp_trim_words( get_the_title(), 5, '...' )); ?></a></h3></div>
                        <div class="top-meta clearfix">
                            <ul class="top-meta-list">
                                <li>
                                    <div class="post-author"><i class="fa fa-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><span class="author-name"><?php echo esc_html(ucfirst(get_the_author())); ?></span></a></div>
                                </li>
                                <li>
                                    <div class="post-date"><i class="fa fa-clock-o"></i> <a href="<?php echo esc_url( get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))) ?>"><i class="icon icon-calendar"></i> <?php echo get_the_date(); ?></a></div>
                                </li>
                            </ul>
                        </div>
                        <div class="post-excerpt">
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); endif; ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <?php   if(get_option( 'page_for_posts' ) > 0){ 
                    $url=get_permalink( get_option( 'page_for_posts' ) ); 
                }else{
                    if(get_theme_mod('our_blog_section_category') != ""){
                    $url =get_category_link( get_theme_mod('our_blog_section_category') );
                    }else{ $url = ""; } 
                } ?>
        <a href="<?php echo esc_url($url); ?>" class="read_more"><?php echo esc_html(get_theme_mod('our_blog_section_readmore', esc_html__('ALL BLOG','consulting-company'))); ?></a>
        </div>
    </div>
 </div>
</section>
<!-- Blog End -->
<?php }
get_footer();