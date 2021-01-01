<?php
/**
 * The template for displaying single page
* Template Name: Full Width Page
 */
get_header(); ?>
<div class="banner <?php echo (has_header_image())?'':'no-header-img';?>">
    <?php  consulting_company_header_image(); ?>
    <div class="banner_text">
    <h1><?php the_title();?></h1>
    </div>
</div>
<!-- End banner -->
<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                <div class="page-cls">
                  <?php the_content(); 
                  wp_link_pages();?>
                </div>
            <?php endwhile; endif; ?>
            </div>            
        </div>
    </div>
</section>
<?php get_footer();