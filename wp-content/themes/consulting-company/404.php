<?php
/**
 * The template for displaying 404 pages (not found)
 * @package Consulting Company
 */
get_header(); ?>
<!-- Start banner -->
<div class="banner">
    <?php  consulting_company_header_image(); ?>
    <div class="banner_text">
    <h1><?php esc_html_e('404','consulting-company'); ?></h1>
    </div>
</div>
<!-- End banner -->
<!-- Main Content section -->
<section class="not-found-content">
     <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
               <?php esc_html_e( "Oops! That page can't be found.", 'consulting-company' );
    			esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'consulting-company');
    			get_search_form(); ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>
<!-- Main content section end -->
<?php get_footer();