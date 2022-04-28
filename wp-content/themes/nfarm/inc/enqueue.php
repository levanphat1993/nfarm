<?php
/*
@package nfarmtheme

    ===========================
        ADMIN ENQUEUE FUNCTIONS
    ===========================
*/

function nfarm_load_admin_scripts($hook)
{

    /**
     * Description: 
     * 
     * Parameters:
     *      $handle: (string) (Required) Name of the stylesheet. Should be unique.
     *      $src: (string|bool) (Required) Full URL of the stylesheet, or path of the stylesheet relative to the WordPress root directory. If source is set to false, stylesheet is an alias of other stylesheets it depends on.
     *      $ver: (string|bool|null) (Optional) String specifying stylesheet version number, if it has one, which is added to the URL as a query string for cache busting purposes. If version is set to false, a version number is automatically added equal to current installed WordPress version. If set to null, no version is added. Default value: false
     *      $media: (string) (Optional) The media for which this stylesheet has been defined. Accepts media types like 'all', 'print' and 'screen', or media queries like '(orientation: portrait)' and '(max-width: 640px)'. Default value: 'all'
     * 
     * wp_register_style($handle, $src, $ver, $media)
     * 
     * Description: Registers the style if source provided (does NOT overwrite) and enqueues.
     * 
     * Parameters:
     *      $handle: (string) (Required) Name of the stylesheet. Should be unique.
     *      $src: (string) (Optional) Full URL of the stylesheet, or path of the stylesheet relative to the WordPress root directory. Default value: ''
     *      $deps:(string[]) (Optional) An array of registered stylesheet handles this stylesheet depends on. Default value: array()
     *      $ver: (string|bool|null) (Optional) String specifying stylesheet version number, if it has one, which is added to the URL as a query string for cache busting purposes. If version is set to false, a version number is automatically added equal to current installed WordPress version. If set to null, no version is added. Default value: false
     *      $media: (string) (Optional) The media for which this stylesheet has been defined. Accepts media types like 'all', 'print' and 'screen', or media queries like '(orientation: portrait)' and '(max-width: 640px)'. Default value: 'all'
     * wp_enqueue_style($handle, $src, $deps, $ver, $media)
     */ 


    if ('toplevel_page_alecaddd_nfarm' == $hook) {
       
        wp_register_style('nfarm_admin', get_template_directory_uri() . '/css/nfarm_admin.css', array(), '1.0.0', 'all');
        wp_enqueue_style('nfarm_admin');
        wp_enqueue_media();
        wp_register_script( 'sunset-admin-script', get_template_directory_uri() . '/js/nfarm_admin.js', array('jquery'), '1.0.0', true );
        wp_enqueue_script( 'sunset-admin-script' );

    }else if ( 'nfarm_page_alecaddd_nfarm_css' == $hook ){
		
		wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/nfarm.ace.css', array(), '1.0.0', 'all' );
		wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.1', true );
		wp_enqueue_script( 'nfarm-custom-css-script', get_template_directory_uri() . '/js/nfarm.custom_css.js', array('jquery'), '1.0.0', true );
	
	} else { 
        return; 
    }
    

}

add_action('admin_enqueue_scripts', 'nfarm_load_admin_scripts');