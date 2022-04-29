<?php
/*
@package nfarmtheme

    ===========================
        ADMIN ENQUEUE FUNCTIONS
    ===========================
*/

function nfarm_load_admin_scripts($hook)
{

    //register css admin section
	wp_register_style('raleway-admin', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500');
	wp_register_style('nfarm_admin', get_template_directory_uri() . '/css/nfarm_admin.css', array(), '1.0.0', 'all');
	
    //register js admin section
	wp_register_script('nfarm-admin-script', get_template_directory_uri() . '/js/nfarm_admin.js', array('jquery'), '1.0.0', true );

    $pages_array = array(
		'toplevel_page_alecaddd_nfarm',
		'nfarm_page_alecaddd_nfarm_css',
		'nfarm_page_alecaddd_nfarm_theme_contact'
	);


    if( in_array($hook, $pages_array) ){
		
		wp_enqueue_style('raleway-admin');
		wp_enqueue_style('nfarm_admin');
	
	} else if( 'toplevel_page_alecaddd_nfarm' == $hook ){
		
		wp_enqueue_media();
		
		wp_enqueue_script('nfarm-admin-script');
		
	} else if ( 'nfarm_page_alecaddd_nfarm_css' == $hook ){
		

		wp_enqueue_style( 'raleway-admin' );
		wp_enqueue_style( 'nfarm_admin' );
		
		wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/nfarm.ace.css', array(), '1.0.0', 'all' );
		
		wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.1', true );
		wp_enqueue_script( 'nfarm-custom-css-script', get_template_directory_uri() . '/js/nfarm.custom_css.js', array('jquery'), '1.0.0', true );
	
	} else { return; }



}

add_action('admin_enqueue_scripts', 'nfarm_load_admin_scripts');

/*
	
	========================
		FRONT-END ENQUEUE FUNCTIONS
	========================
*/

function nfarm_load_scripts(){
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all' );
	wp_enqueue_style( 'nfarm', get_template_directory_uri() . '/css/nfarm.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
	
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery' , get_template_directory_uri() . '/js/jquery.js', false, '1.11.3', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
	
}
add_action( 'wp_enqueue_scripts', 'nfarm_load_scripts' );