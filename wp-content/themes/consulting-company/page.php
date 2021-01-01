<?php
/**
 * The template for displaying single page
 * @package Consulting Company
 */
get_header(); ?>
<div class="banner <?php echo (has_header_image() || is_front_page())?'':'no-header-img';?>">
    <?php  consulting_company_header_image(); ?>
    <div class="banner_text">
    <h1><?php the_title();?></h1>
    </div>
</div>
<!-- End banner -->
<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
             <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                <div class="page-cls">
                  <?php the_content(); ?>
                </div>
            <?php endwhile; endif; ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer();