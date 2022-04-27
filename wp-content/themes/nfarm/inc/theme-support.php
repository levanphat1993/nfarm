<?php

/*
	
@package nfarmtheme
	
	========================
		THEME SUPPORT OPTIONS
	========================
*/

$options = get_option( 'post_formats' );
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
foreach ($formats as $format) {
	$output[] = (@$options[$format] == 1 ? $format : '');
}

/**
 * Description: Must be called in the theme’s functions.php file to work. If attached to a hook, it must be ‘after_setup_theme’. The ‘init’ hook may be too late for some features.
 * Parameters:
 *      $feature: (string) (Required) The feature being added. Likely core values include:
 *          'admin-bar'
 *          'align-wide'
 *          'automatic-feed-links'
 *          'core-block-patterns'
 *          'custom-background'
 *          'custom-header'
 *          'custom-line-height'
 *          'custom-logo'
 *          'customize-selective-refresh-widgets'
 *          'custom-spacing'
 *          'custom-units'
 *          'dark-editor-style'
 *          'disable-custom-colors'
 *          'disable-custom-font-sizes'
 *          'editor-color-palette'
 *          'editor-gradient-presets'
 *          'editor-font-sizes'
 *          'editor-styles'
 *          'featured-content'
 *          'html5'
 *          'menus'
 *          'post-formats'
 *          'post-thumbnails'
 *          'responsive-embeds'
 *          'starter-content'
 *          'title-tag'
 *          'wp-block-styles'
 *          'widgets'
 *          'widgets-block-editor'
 *      $args: (mixed) (Optional) extra arguments to pass along with certain features.
 */

if(!empty($options)) {
	add_theme_support( 'post-formats', $output );
}
