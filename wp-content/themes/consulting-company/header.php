<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class();?>>
 <!-- Header Start -->
    <header>
    <?php if(get_theme_mod('hide_top_header') == ""){
    for($i=1;$i<=4;$i++)
    {$count=(get_theme_mod('social_link'.$i) != "" || get_theme_mod('phone') != "") ? 1 : 0;if($count == 1){break;}}
        if($count == 1){ ?>
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                        <ul class="header-info">
                        <?php if(get_theme_mod('phone') != ""){ ?>
                            <li><?php echo esc_html__('Phone:', 'consulting-company') ?> <a href="<?php echo esc_url( 'tel:' . get_theme_mod( 'phone' ) ); ?>"><?php echo esc_html(get_theme_mod('phone')) ?></a></li>
                        <?php } 
                        if(get_theme_mod('email') != ""){ ?>
                            <li><?php echo esc_html__('E-mail: ', 'consulting-company') ?><a href="<?php echo esc_url( 'mailto:' . get_theme_mod( 'email' ) ); ?>"><?php echo esc_html(get_theme_mod('email')) ?></a></li>
                        <?php } ?>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4"> 
                        <ul class="social pull-right">
                        <?php for($i=1;$i<=4;$i++){ 
                            if(get_theme_mod('social_link'.$i)!= "" && get_theme_mod('social_link_icon'.$i)!= "" ){ ?>
                            <li>
                                <a href="<?php echo esc_url(get_theme_mod('social_link'.$i)) ?>"> <i class=" fa <?php echo esc_attr(get_theme_mod('social_link_icon'.$i)) ?>"></i></a>
                            </li>
                        <?php } } ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <?php } } ?>
        <div id="main_header_bg" class="<?php echo (has_header_image() || is_front_page())?'':'no-header-img';?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <nav id='consultingcompanymenu'>
                            <div class="logo">
                            <?php if(has_custom_logo()){ the_custom_logo(); }
                            if(display_header_text()){ ?><a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="brand_text"><span class="site-title"><h4><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h4><small class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></small></span></a> <?php } ?>
                            </div>
                            
                            <div class="button"></div>
                            <?php $consulting_defaults = array(
                                'theme_location' => 'primary',
                                'container' => 'ul',
                                'items_wrap' => '<ul class="first_menu">%3$s</ul>',
                            );
                            wp_nav_menu($consulting_defaults); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
 <!-- Finish Header -->