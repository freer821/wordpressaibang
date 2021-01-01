<?php 
/* Theme Default function and extra function*/
add_action('tgmpa_register', 'consulting_company_required_plugins');

function consulting_company_required_plugins() {
    if (class_exists('TGM_Plugin_Activation')) {
        $plugins = array(
            array(
                'name' => __('Page Builder by SiteOrigin', 'consulting-company'),
                'slug' => 'siteorigin-panels',
                'required' => false,
            ),
            array(
                'name' => __('SiteOrigin Widgets Bundle', 'consulting-company'),
                'slug' => 'so-widgets-bundle',
                'required' => false,
            ),
            array(
                'name' => __('Contact Form 7', 'consulting-company'),
                'slug' => 'contact-form-7',
                'required' => false,
            ),
        );
        $config = array(
            'default_path' => '',
            'menu' => 'consulting-company-install-plugins',
            'has_notices' => true,
            'dismissable' => true,
            'dismiss_msg' => '',
            'is_automatic' => false,
            'message' => '',
            'strings' => array(
                'page_title' => __('Install Recommended Plugins', 'consulting-company'),
                'menu_title' => __('Install Plugins', 'consulting-company'),
                'nag_type' => 'updated'
            )
        );
        tgmpa($plugins, $config);
    }
}