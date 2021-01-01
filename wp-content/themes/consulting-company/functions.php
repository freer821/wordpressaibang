<?php
function consulting_company_setup() {
	load_theme_textdomain( 'consulting-company',get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'consulting-company-blog-image', $width = 408, $height = 286, true );
    add_image_size( 'consulting-company-single-post-image', $width = 847, $height = 841, true );
	add_image_size( 'consulting-company-about-us', $width = 352,$height = 352, true );
	add_image_size( 'consulting-company-our-blog-home', $width = 213,$height = 213, true );
	
	register_nav_menus( array(
		'primary'    => esc_html__( 'Top Menu', 'consulting-company' ),
	) );
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	// Add theme support for Custom hEADER.
	add_theme_support('custom-header', apply_filters('consulting_company_custom_header_args', array(
        'default-image' => get_template_directory_uri()."/assets/images/banner.jpg",
        'default-text-color' => 'A31A1E',
        'width' => 1299,
        'height' => 345,
        'flex-height' => true,
        'header_text' =>true, 
    )));
	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	register_default_headers(
		array(
			'default-image' => array(
				'url'           => '%s/assets/images/banner.jpg',
				'thumbnail_url' => '%s/assets/images/banner.jpg',
				'description'   => __( 'Default Header Image', 'consulting-company' ),
			),
		)
	);
}
add_action( 'after_setup_theme', 'consulting_company_setup' );
function consulting_company_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'consulting_company_content_width', 640 );
}
add_action( 'after_setup_theme', 'consulting_company_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function consulting_company_widgets_init() {
	register_sidebar( array(
		'name'          		=> esc_html__( 'Sidebar', 'consulting-company' ),
		'id'            		=> 'sidebar-1',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your sidebar.', 'consulting-company' ),
		'before_widget' 		=> '<aside id="%1$s" class="widget %2$s" data-aos="fade-up">',
		'after_widget'  		=> '</aside>',
		'before_title'  		=> '<h3 class="widget-title">',
		'after_title'   		=> '</h3>',
	) );
	register_sidebar( array(
		'name'          		=> __( 'Footer 1', 'consulting-company' ),
		'id'            		=> 'footer-1',
		'romana_description'	=> esc_html__( 'Add widgets here to appear in your footer.', 'consulting-company' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-list">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h4 class="footer-title">',
		'after_title'   		=> '</h4>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 2', 'consulting-company' ),
		'id'            		=> 'footer-2',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your footer.', 'consulting-company' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-list">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h4 class="footer-title">',
		'after_title'   		=> '</h4>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 3', 'consulting-company' ),
		'id'            		=> 'footer-3',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your footer.', 'consulting-company' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-list">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h4 class="footer-title">',
		'after_title'   		=> '</h4>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 4', 'consulting-company' ),
		'id'            		=> 'footer-4',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your footer.', 'consulting-company' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-list">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h4 class="footer-title">',
		'after_title'   		=> '</h4>',
	) );
}
add_action( 'widgets_init', 'consulting_company_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 */
function consulting_company_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	global $post;
	if ( get_theme_mod( 'hide_post_readmore_button' ) == "" ) { 
	return '<div class="bottom-meta clearfix"><ul class="bottom-meta-list"><li><div class="post-more"><a class="read-more" href="'.esc_url(get_permalink($post->ID)). '">'.esc_html(get_theme_mod('post_button_text',esc_html__('Read More','consulting-company') )).'</a></div></li></ul></div>';
	}
}
add_filter( 'excerpt_more', 'consulting_company_excerpt_more' );
// Post Excerpt length
function consulting_company_excerpt_length( $length ) {
	if ( is_admin() ) {		return $length;	}
	return get_theme_mod('post_content_limit', 16);
}
add_filter( 'excerpt_length', 'consulting_company_excerpt_length', 999 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function consulting_company_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' )) );
	}
}
add_action( 'wp_head', 'consulting_company_pingback_header' );

// Header background image
 if ( ! function_exists( 'consulting_company_header_image' ) ) :
 function consulting_company_header_image()
{ ?>
	<img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>">
<?php 
}
endif;
// Post Meta Tag
if ( ! function_exists( 'consulting_company_entry_meta' ) ) :

function consulting_company_entry_meta() {

    $consulting_company_tag_list = get_the_tag_list('<i class="fa fa-tags"></i> ', ', ');     
    $consulting_company_date = sprintf( '<i class="fa fa-clock-o"></i><span class="date"><a href="%1$s" title="%2$s" ><time class="date-time-cls" datetime="%3$s">%4$s</time></a></span>',
        esc_url( get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date() ),
        esc_attr( get_the_date() )
    );
    if ( $consulting_company_tag_list ) {
        /* translators: 1: category name, 2: date time, 3: post author */
        $consulting_company_utility_text = esc_html__( ' %2$s  %1$s', 'consulting-company' );
    } else {
        /* translators: 1: date time, 2: author name */
        $consulting_company_utility_text = esc_html__( ' %2$s ', 'consulting-company' );
    }       
    printf(
        $consulting_company_utility_text,
        $consulting_company_tag_list,
        $consulting_company_date
        );  
   }
endif;
// Remove Comment Website Field
add_filter('comment_form_default_fields', 'consulting_company_remove_url');
function consulting_company_remove_url($val) {
    $val['url'] = '';
    return $val;    
}
// Comment Form Fields Placeholder
function consulting_company_comment_form_fields( $fields ) {
	foreach( $fields as &$field ) {
		$field = str_replace( 'id="author"', 'id="author" placeholder="'.esc_attr__('Your Name *','consulting-company').'"', $field );
		$field = str_replace( 'id="email"', 'id="email" placeholder="'.esc_attr__('Your Email *','consulting-company').'"', $field );
	}
	return $fields;
}
add_filter( 'comment_form_default_fields', 'consulting_company_comment_form_fields' );
// Change comment form textarea to use placeholder
function consulting_company_comment_textarea_placeholder( $args ) {
	$args['comment_field']        = str_replace( 'textarea', 'textarea placeholder="'.esc_attr__('Your Message *','consulting-company').'"', $args['comment_field'] );
	return $args;
}
add_filter( 'comment_form_defaults', 'consulting_company_comment_textarea_placeholder' );
//change text to leave a reply on comment form
function consulting_company_comment_reform ($arg) {
$arg['title_reply'] = '<i class="fa fa-comment"></i> '.esc_html__('Leave a comment','consulting-company');
return $arg;
}
add_filter('comment_form_defaults','consulting_company_comment_reform');
// Change comment form Submit button text
function consulting_company_change_comment_form_submit_label($arg) {
$arg['label_submit'] = esc_html__('Submit comment','consulting-company') ;
return $arg;
}
add_filter('comment_form_defaults', 'consulting_company_change_comment_form_submit_label');
if ( ! function_exists( 'consulting_company_comment' ) ) :
function consulting_company_comment( $comment, $args, $depth ) {
	switch ( $comment->comment_type ) :
	case 'pingback' :
	case 'trackback' :
// Display trackbacks differently than normal comments.?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
  <p><?php esc_html_e( 'Pingback:', 'consulting-company' ); ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( esc_html__( 'Edit', 'consulting-company' ), '<span class="edit-link">', '</span>' ); ?>
  </p>
</li>
<?php
break;
default :
// Proceed with normal comments.
if($comment->comment_approved == 1)
{
global $post; ?>
<div class="comments-list">
	<div <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	  <article id="comment-<?php comment_ID(); ?>" class="comment ">
	  <div class="right-img">
	    <figure class="avtar"> <a href="#"><?php echo get_avatar( get_the_author_meta(), '80'); ?></a> </figure>
	    </div>
	    <div class="txt-holder">
	    <?php
	    printf( '<h4 class="comment-title-date">%1$s',
	    get_comment_author_link(),
	    ( $comment->user_id === $post->post_author ) ? '<span>' . esc_html__( 'Post author ', 'consulting-company' ) . '</span>' : ''
	    );
		echo ' '.get_comment_date().' '.esc_html__( 'at', 'consulting-company' ).' '.esc_html(get_the_time()).'</h4>'; ?>
			<div class="comment-content comment">
				<?php comment_text();
			  	echo '<a href="#" class="reply pull-right">'.comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<i class="fa fa-reply-all" aria-hidden="true"></i> Reply', 'consulting-company' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ).'</a>'; ?>
			</div>
		<!-- .comment-content --> 
		</div>
	    <!-- .txt-holder --> 
	 </article>
	</div>
</div>
 <!-- #comment-## -->
<?php }
break; endswitch; // end comment_type check
}
endif;

add_filter('get_custom_logo','consulting_company_logo_class');
function consulting_company_logo_class($logo_html)
{
	$logo_html = str_replace('width=', 'original-width=', $logo_html);
	$logo_html = str_replace('height=', 'original-height=', $logo_html);
	$logo_html = str_replace('class="custom-logo"', 'class="img-responsive logo-fixed"', $logo_html);	
	$logo_html = str_replace('class="custom-logo-link"', 'class="img-responsive logo-fixed"', $logo_html);
	return $logo_html;
}

add_action( 'admin_menu', 'consulting_company_admin_menu');
function consulting_company_admin_menu( ) { 

    add_theme_page( esc_html__('Pro Feature','consulting-company'), esc_html__('Consulting Company Pro','consulting-company'), 'manage_options', 'consulting-company-pro-buynow', 'consulting_company_pro_buy_now', 300 );   
}
function consulting_company_pro_buy_now(){ ?>
<div class="consulting_company_pro_version">
  <a href="<?php echo esc_url('https://cipherthemes.com/wordpress-themes/consulting-company-pro/'); ?>" target="_blank">
    <img src ="<?php echo esc_url(get_template_directory_uri().'/assets/images/consulting-company-pro-feature.png') ?>" width="70%" height="auto" />
  </a>
</div>
<?php
}

include get_template_directory().'/inc/enqueues.php';
include get_template_directory().'/inc/theme-customization.php';
include get_template_directory().'/inc/class-tgm-plugin-activation.php';
include get_template_directory().'/inc/theme-default-setup.php';
