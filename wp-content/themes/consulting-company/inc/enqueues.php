<?php function consulting_company_enqueues(){
	wp_enqueue_style( 'consulting-company-google-fonts-api', '//fonts.googleapis.com/css?family=Catamaran', array());
	/* CSS Files */
	wp_enqueue_style('font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.css', array());
	wp_enqueue_style('bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.css', array());
	wp_enqueue_style('owl-carousel',get_template_directory_uri().'/assets/css/owl.carousel.css',array());
	wp_enqueue_style('consulting-company-default',get_template_directory_uri().'/assets/css/default.css', array(),null,false);

	/* JS Files */	
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() .'/assets/js/owl.carousel.js', array( 'jquery' ));
	wp_enqueue_script( 'consulting-company-default', get_template_directory_uri() .'/assets/js/default.js', array( 'jquery'),false,null);

	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	wp_enqueue_style( 'consulting-company-style', get_stylesheet_uri());

	consulting_company_custom_css();
}
add_action('wp_enqueue_scripts','consulting_company_enqueues');