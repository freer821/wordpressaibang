<?php
/**
* Customization options
**/
function consulting_company_post_category(){
  $cats = array();
  $cats['']=esc_html__('Select Category','consulting-company');
  foreach ( get_categories() as $categories => $category ){
      $cats[$category->term_id] = $category->name;
  }
  return $cats;
}
function consulting_company_sanitize_checkbox( $checked ) {
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
//select sanitization function
function consulting_company_sanitize_select( $input, $setting ){         
//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
$input = sanitize_key($input); 
//get the list of possible select options 
$choices = $setting->manager->get_control( $setting->id )->choices;                            
return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
}
//URL
function consulting_company_sanitize_url( $url ) {
  return esc_url_raw( $url );
}
function consulting_company_customize_register( $wp_customize ) {
  $wp_customize->add_setting(
    'consulting_company_theme_color',
    array(
      'default'           => '#A31A1E',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control( $wp_customize,
      'consulting_company_theme_color',
      array(
        'label'     => esc_html__( 'Theme Color', 'consulting-company' ),
        'section'   => 'colors',
      )
  ) ); 
  $wp_customize->add_panel(
  'general',
    array(
      'title'       => esc_html__( 'General Settings', 'consulting-company' ),
      'description' => esc_html__('General Settings','consulting-company'),
      'priority'    => 20, 
  ));
  $wp_customize->get_section('title_tagline')->panel = 'general';
  $wp_customize->get_section('header_image')->panel = 'general';
  $wp_customize->get_section('static_front_page')->panel = 'general';   
  $wp_customize->get_section('title_tagline')->title = esc_html__( 'Header & Logo', 'consulting-company'); 
  /* --------------------------- Start Front Page Panel -------------------- */
  $wp_customize->add_panel(
    'homepage_setting',
    array(
    'title'               => esc_html__( 'Front Page Settings', 'consulting-company' ),
    'description'         => esc_html__('Front Page Settings','consulting-company'),
    'priority'            => 20, 
    )
  );
  // Start Slider Section 
  $wp_customize->add_section( 'slider_setting', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Slider Section', 'consulting-company'),
    'panel'               => 'homepage_setting'
  ) );
  // Checkbox
  $wp_customize->add_setting( 'hide_slider_section', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'consulting_company_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_slider_section', array(
    'type'                => 'checkbox',
    'section'             => 'slider_setting', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide this section.', 'consulting-company' ),
  ) );
  // Image
  for($i=1;$i<=2;$i++)
  {
    $wp_customize->add_setting( 'slider_image_'.$i, array(
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Cropped_Image_Control(
      $wp_customize,
      'slider_image_'.$i,
      array(
      'label'             => esc_html( 'Slide '.$i ),
      'section'           => 'slider_setting',
      'settings'          => 'slider_image_'.$i,
      'description'       => esc_html__('Upload Image Size : 1280 x 620', 'consulting-company'),
      'height'            => 620,
      'width'             => 1280,
      'flex_width'        => false,
      'flex_height'       => false,
      )
    ) ); 
    // Slide Title
    $wp_customize->add_setting( 'slide_title_'.$i.'', array(
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'slide_title_'.$i.'', array(
      'type'              => 'text',
      'priority'          => 10,
      'section'           => 'slider_setting',
      'input_attrs'       => array(
            'placeholder' => esc_html__( 'Title', 'consulting-company' ),
      )
    ) );
    // Slide Description
    $wp_customize->add_setting( 'slide_description_'.$i.'', array(
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'slide_description_'.$i.'', array(
        'type'            => 'text',
        'priority'        => 10,
        'section'         => 'slider_setting',
        'input_attrs'     => array(
              'placeholder' => esc_html__( 'Description', 'consulting-company' ),
        )
    ) );
    // Slide Button Title
    $wp_customize->add_setting( 'slide_button_title_'.$i.'', array(
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'slide_button_title_'.$i.'', array(
      'type'              => 'text',
      'priority'          => 10,
      'section'           => 'slider_setting',
      'input_attrs'       => array(
            'placeholder' => esc_html__( 'Button Title', 'consulting-company' ),
      )
    ) );
    // Slide Butoon Link 
    $wp_customize->add_setting( 'slide_link_'.$i, array(    
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'consulting_company_sanitize_url',
    ) );
    $wp_customize->add_control( 'slide_link_'.$i, array(
      'type'              => 'url',
      'priority'          => 10,
      'section'           => 'slider_setting',      
      'input_attrs'       => array(
            'placeholder' => esc_html__( 'Button Link', 'consulting-company' ),
      )
    ) );
  }
  // End Slider Section 
  // Start About Us Section
  $wp_customize->add_section( 'about_us', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('About Us Section', 'consulting-company'),
    'panel'               => 'homepage_setting'
  ) );
  // Checkbox Field 
  $wp_customize->add_setting( 'hide_about_us_section', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'consulting_company_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_about_us_section', array(
    'type'                => 'checkbox',
    'section'             => 'about_us', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide this section.', 'consulting-company' ),
  ) );
  // Title
  $wp_customize->add_setting( 'about_us_section_title', array(
    'default'             => esc_html__('About Us','consulting-company'),
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'about_us_section_title', array(
    'type'                => 'text',
    'section'             => 'about_us',
    'label'               => esc_html__('Title','consulting-company'),
  ) );
  // Sub Title
  $wp_customize->add_setting( 'about_us_section_page_id', array(
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'absint',
  ) );
  $wp_customize->add_control( 'about_us_section_page_id', array(
    'type'                => 'dropdown-pages',
    'section'             => 'about_us',
    'label'               => esc_html__('Page Select','consulting-company'),
  ) );
  
  // Start Our Blog Section
  $wp_customize->add_section( 'our_blog', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Our Blog Section', 'consulting-company'),
    'panel'               => 'homepage_setting'
  ) );
  // Checkbox Field 
  $wp_customize->add_setting( 'hide_our_blog_section', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'consulting_company_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_our_blog_section', array(
    'type'                => 'checkbox',
    'section'             => 'our_blog', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide this section.', 'consulting-company' ),
  ) );
  // Title
  $wp_customize->add_setting( 'our_blog_section_title', array(
    'default'             => esc_html__('Our Blog','consulting-company'),
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'our_blog_section_title', array(
    'type'                => 'text',
    'section'             => 'our_blog',
    'label'               => esc_html__('Title','consulting-company'),
  ) );
  // Description
  $wp_customize->add_setting( 'our_blog_description', array(
    'default'             => esc_html__('Lorem Ispum Lorem Ispum','consulting-company'),
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'our_blog_description', array(
    'type'                => 'textarea',
    'priority'            => 10,
    'label'               => esc_html__( 'Description', 'consulting-company' ),
    'section'             => 'our_blog',
  ) );
  // Post Category select box
  $wp_customize->add_setting( 'our_blog_section_category', array(
    'sanitize_callback'   => 'consulting_company_sanitize_select',
  ) );
  $wp_customize->add_control( 'our_blog_section_category', array(
    'type'                => 'select',
    'choices'             => consulting_company_post_category(),
    'section'             => 'our_blog',
    'label'               => esc_html__( 'Category', 'consulting-company' ),
  ) );
  $wp_customize->add_setting( 'our_blog_section_readmore', array(
    'default'             => esc_html__('All Blog','consulting-company'),
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'our_blog_section_readmore', array(
    'type'                => 'text',
    'section'             => 'our_blog',
    'label'               => esc_html__('Button Title Text','consulting-company'),
  ) );
  // End Our Blog Section
  /* --------------------------- End Front Page Panel -------------------- */
  /* --------------------------- Start General Panel -------------------- */
  // Start Top Header Section
  $wp_customize->add_section( 'top_header', array(
    'priority'            => 10,
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Top Header', 'consulting-company'),
    'panel'               => 'general'
  ) );
  // Top Header Checkbox 
  $wp_customize->add_setting( 'hide_top_header', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'consulting_company_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_top_header', array(
    'type'                => 'checkbox',
    'section'             => 'top_header', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide this section.', 'consulting-company' ),      
  ) );
  $wp_customize->add_setting( 'phone', array(
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'phone', array(
    'type'                => 'text',
    'priority'            => 10,
    'section'             => 'top_header',
    'label'               => esc_html__( 'Phone', 'consulting-company' ),
    'input_attrs'       => array(
            'placeholder' => esc_html__( 'Enter Contact Number', 'consulting-company' ),
      )
  ) );
  $wp_customize->add_setting( 'email', array(
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'email', array(
    'type'                => 'text',
    'priority'            => 10,
    'section'             => 'top_header',
    'label'               => esc_html__( 'Email', 'consulting-company' ),
    'input_attrs'       => array(
            'placeholder' => esc_html__( 'Enter Contact Email ', 'consulting-company' ),
      )
  ) );
  for($i=1;$i<=4;$i++){
    $wp_customize->add_setting( 'social_link'.$i, array(
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'consulting_company_sanitize_url',
    ) );
    $wp_customize->add_control( 'social_link'.$i, array(
      'type'              => 'url',
      'priority'          => 10,
      'section'           => 'top_header',
      'label'             => esc_html( 'Social Media Link '.$i),
      'input_attrs'       => array(
            'placeholder' => esc_html__( 'Enter URL', 'consulting-company' ),
      )
    ) );
    $wp_customize->add_setting( 'social_link_icon'.$i, array(
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'social_link_icon'.$i, array(
      'type'              => 'text',
      'priority'          => 10,
      'section'           => 'top_header',
      'input_attrs'       => array(
            'placeholder' => esc_html__( 'Enter Icon', 'consulting-company' ),
      )
    ) );
  }
  // End Top Header Section 
  // Start Blog Listing Section 
  $wp_customize->add_section( 'blog_page_section', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Blog(Archive) Page', 'consulting-company'),
    'panel'               => 'general'
  ) );
  // Meta Tag Checkbox
  $wp_customize->add_setting( 'hide_post_meta_tag', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'consulting_company_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_post_meta_tag', array(
    'type'                => 'checkbox',
    'section'             => 'blog_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide post meta tag', 'consulting-company' ),
  ) );
  // Blog Image Checkbox
  $wp_customize->add_setting( 'hide_post_image', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'consulting_company_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_post_image', array(
    'type'                => 'checkbox',
    'section'             => 'blog_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide post image', 'consulting-company' ),
  ) );
  // Read More Link
  $wp_customize->add_setting( 'hide_post_readmore_button', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'consulting_company_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_post_readmore_button', array(
    'type'                => 'checkbox',
    'section'             => 'blog_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide read more link', 'consulting-company' ),
  ) );
  // Post Content Limit
  $wp_customize->add_setting( 'post_content_limit', array(
    'default'             => '16',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'post_content_limit', array(
    'type'                => 'text',
    'priority'            => 10,
    'section'             => 'blog_page_section',
    'label'               => esc_html__( 'Post Content Limit', 'consulting-company' ),
  ) );
  // Post Button text
  $wp_customize->add_setting( 'post_button_text', array(
    'default'             => esc_html__( 'Read More', 'consulting-company' ),
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'post_button_text', array(
    'type'                => 'text',
    'priority'            => 10,
    'section'             => 'blog_page_section',
    'label'               => esc_html__( 'Post Read Me Text', 'consulting-company' ),
  ) );
  // Blog sidebar setting 
  $wp_customize->add_setting( 'post_sidebar_layout', array(
    'default'             => 'right',
    'sanitize_callback'   => 'consulting_company_sanitize_select',
  ) );
  $wp_customize->add_control( 'post_sidebar_layout', array(
    'type'                => 'select',
    'section'             => 'blog_page_section',
    'label'               => esc_html__( 'Display Sidebar', 'consulting-company' ),
    'choices'             => array(
      'right'             => esc_html__( 'Right', 'consulting-company' ),
      'left'              => esc_html__( 'Left', 'consulting-company' ),
      'full'              => esc_html__( 'Full', 'consulting-company' ),
      )
  ) );
  // End Blog Listing Section
  // Start Single Post Page Section
  $wp_customize->add_section( 'single_post_page_section', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Single Post Page', 'consulting-company'),
    'panel'               => 'general'
  ) );
  // Single Post Meta Tag Checkbox 
  $wp_customize->add_setting( 'hide_single_post_meta_tag', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'consulting_company_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_single_post_meta_tag', array(
    'type'                => 'checkbox',
    'section'             => 'single_post_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide post meta tag', 'consulting-company' ),      
  ) );
 
  // Single Post Image Checkbox 
  $wp_customize->add_setting( 'hide_single_post_image', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'consulting_company_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_single_post_image', array(
    'type'                => 'checkbox',
    'section'             => 'single_post_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide post image', 'consulting-company' ),
  ) );
  // Single Post Page Sidebar
  $wp_customize->add_setting( 'single_post_sidebar_layout', array(
    'default'             => 'right',
    'sanitize_callback'   => 'consulting_company_sanitize_select',
  ) );
  $wp_customize->add_control( 'single_post_sidebar_layout', array(
    'type'                => 'select',
    'section'             => 'single_post_page_section',
    'label'               => esc_html__( 'Display Sidebar', 'consulting-company' ),
    'choices'             => array(
      'right'             => esc_html__( 'Right', 'consulting-company' ),
      'left'              => esc_html__( 'Left', 'consulting-company' ),
      'full'              => esc_html__( 'Full', 'consulting-company' ),
    )
  ) );
  // End Blog Page Section
  /* --------------------------- End General Panel -------------------- */
  /* --------------------------- Start Footer Settings Panel ------------- */
  $wp_customize->add_section( 'footer_setting', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Footer Settings', 'consulting-company'),
  ) );
  $wp_customize->add_setting( 'footerCopyright', array(
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'footerCopyright', array(
    'type'                => 'textarea',
    'section'             => 'footer_setting',
    'label'               => esc_html__('Copyright Text','consulting-company'),
    'description'         => esc_html__('Some text regarding copyright of your site, you would like to display in the footer.', 'consulting-company'),
  ) );
  /* --------------------------- End Footer Settings Panel ------------------ */
}
add_action( 'customize_register', 'consulting_company_customize_register' );
function consulting_company_custom_css(){
$theme_color=get_theme_mod('consulting_company_theme_color','#a31a1e');

$customcss = '';

$customcss .= ' a, .first_footer a:hover, a:hover, a:focus, .post-info h3 > a, .searchform button.btn.btn-default i, .sidebar .widget ul li::before, .sidebar .widget ul li:hover a, .page-numbers li, .sidebar h3.widget-title, .brand_text .site-title h4, small, .sidebar .widget ul li:hover>a, .sidebar .widget ul li:hover, #consultingcompanymenu > ul > li > a:hover, #consultingcompanymenu ul ul li:hover > a, #consultingcompanymenu ul ul li a:hover, .nav-links .page-numbers a, .post-info h3.post-title-cls, h3.title_line, h3.comment-reply-title, p.form-submit input{color: '.esc_attr($theme_color).';}
#consultingcompanymenu li:hover > ul, .page-numbers li, .detail_page .post-info h3.post-title-cls::after, h3.title_line::after, h3.comment-reply-title::after, p.form-submit input {border-color: '.esc_attr($theme_color).';}
#consultingcompanymenu ul ul li.has-sub:hover > a::after {border-left-color: '.esc_attr($theme_color).';}
a.read_more::before, a.read_more:hover::before, a.read_more:hover, .page-numbers li span.page-numbers.current, .page-numbers li span.page-numbers.dots, .nav-links .page-numbers a:hover, p.form-submit input:hover{background: '.esc_attr($theme_color).'; background-color: '.esc_attr($theme_color).';}
.sidebar h3.widget-title::after {border-top: 3px solid #a31a1e;}
.blog-wrapper a.read_more{ border: 1px solid '.esc_attr($theme_color).'; }
.scroll_top{ background: '.esc_attr($theme_color).'; border: 1px solid '.esc_attr($theme_color).';}
.blog-wrapper a.read_more{  border: 1px solid '.esc_attr($theme_color).'; }
#home-slider .owl-dots .owl-dot.active span, #home-slider .owl-dots .owl-dot:hover span{ background: '.esc_attr($theme_color).'!important  }

.topbar, .home h2::before,footer p.widget-title::before, footer h4::before, footer .footer-title:before{ background:'.esc_attr($theme_color).';}
#main_header_bg.sticky{border-bottom:3px solid '.esc_attr($theme_color).';}
.owl-prev i, .owl-next i, .site-info a, a.read-more, #consultingcompanymenu ul li.current_page_item a, #consultingcompanymenu ul li.current-menu-parent a, #consultingcompanymenu ul li.current_page_ancestor a{ color: '.esc_attr($theme_color).'  }
.sidebar h3.widget-title::after{border-top: 3px solid '.esc_attr($theme_color).';}
.sidebar .tagcloud a, footer .footer-list .tagcloud a{ border: 1px solid '.esc_attr($theme_color).'; }
.sidebar .tagcloud a:hover,footer .footer-list .tagcloud a:hover{ background-color: '.esc_attr($theme_color).'; }
ul.footer-list li > a:hover{color: '.esc_attr($theme_color).';}
footer p.widget-title::before, footer h4::before{background: '.esc_attr($theme_color).';}
footer .widget_nav_menu.footer-list ul li > a:before, footer .widget_tag_cloud.footer-list ul li > a:before, footer .widget_search.footer-list ul li > a:before, footer .widget_rss.footer-list ul li > a:before, footer .widget_recent_entries.footer-list ul li > a:before, footer .widget_recent_comments.footer-list ul li > span:before, footer .widget_meta.footer-list ul li > a:before, footer .widget_pages.footer-list ul li > a:before, footer .widget_categories.footer-list ul li > a:before, footer .widget_archive.footer-list ul li > a:before, footer .widget_calendar.footer-list ul li > a:before, ul.footer-list li a:before{color:'.esc_attr($theme_color).';}
@media only screen and ( max-width: 767px) {
 .button:after {
  border-top: 2px solid '.esc_attr($theme_color).';
  border-bottom: 2px solid '.esc_attr($theme_color).';
}
 #consultingcompanymenu .submenu-button.submenu-opened, #consultingcompanymenu ul li:hover, .button.menu-opened::before, .button.menu-opened::after, .button:before{ background: '.esc_attr($theme_color).' }
#consultingcompanymenu ul ul li:hover{background: '.esc_attr($theme_color).' !important}
#consultingcompanymenu ul li a:hover, #consultingcompanymenu ul li.current_page_ancestor a, #consultingcompanymenu ul ul li a:hover, #consultingcompanymenu ul ul li:hover a{ color: #fff }
}
@media only screen and ( max-width: 1000px) {
  .button:after {
  border-top: 2px solid '.esc_attr($theme_color).';
  border-bottom: 2px solid '.esc_attr($theme_color).';
}
 #consultingcompanymenu .submenu-button.submenu-opened, #consultingcompanymenu ul li:hover, .button.menu-opened::before, .button.menu-opened::after, .button:before{ background: '.esc_attr($theme_color).' }
#consultingcompanymenu ul ul li:hover{background: '.esc_attr($theme_color).' !important}
#consultingcompanymenu ul li a:hover, #consultingcompanymenu ul li.current_page_ancestor a, #consultingcompanymenu ul ul li a:hover, #consultingcompanymenu ul ul li:hover a{ color: #fff }
}
.logo .site-title h4,.logo .site-title small{
    color:#'.get_header_textcolor().';
}';
wp_add_inline_style('consulting-company-style',$customcss);
}  