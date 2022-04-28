<?php

/*
@package nfarmtheme

    ===========================
        ADMIN PAGE
    ===========================
*/

function nfarm_add_admin_page()
{

    /**
     * Description: This function takes a capability which will be used to determine whether or not a page is included in the menu.
     *              The function which is hooked in to handle the output of the page must check that the user has the required capability as well.
     * 
     * Parameters:
     *      $page_title: (string) (Required) The text to be displayed in the title tags of the page when the menu is selected.
     *      $menu_title: (string) (Required) The text to be used for the menu.
     *      $capability: (string) (Required) The capability required for this menu to be displayed to the user.
     *      $menu_slug: (string) (Required) The slug name to refer to this menu by. Should be unique for this menu page and only include lowercase alphanumeric, dashes, and underscores characters to be compatible with sanitize_key().
     *      $function: (callable) (Optional) The function to be called to output the content for this page. Default value: ''
     *      $icon_url: (string) (Optional) The URL to the icon to be used for this menu
     * 
     * add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url)
     * 
     * Description: (string) URI to current theme's template directory.
     * 
     * get_template_directory_uri()
     * 
     * Description: This function takes a capability which will be used to determine whether or not a page is included in the menu.
     *              The function which is hooked in to handle the output of the page must check that the user has the required capability as well.
     * Parameters:
     *      $parent_slug: (string) (Required) The slug name for the parent menu (or the file name of a standard WordPress admin page).
     *      $page_title: (string) (Required) The text to be displayed in the title tags of the page when the menu is selected.
     *      $menu_title: (string) (Required) The text to be used for the menu.
     *      $capability: (string) (Required) The capability required for this menu to be displayed to the user.
     *      $menu_slug: (string) (Required) The slug name to refer to this menu by. Should be unique for this menu and only include lowercase alphanumeric, dashes, and underscores characters to be compatible with sanitize_key().
     *      $function: (callable) (Optional) The function to be called to output the content for this page. Default value: ''
     *      $position: (int) (Optional) The position in the menu order this item should appear. Default value: null
     * 
     * add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function, $position)
     */


    // Generate Nfarm Admin Page
    add_menu_page('Nfarm Theme Options', 'nfarm', 'manage_options', 'alecaddd_nfarm', 'nfarm_theme_create_page', get_template_directory_uri(). '/img/nfarm-icon.png', 110);
    // add_menu_page('Nfarm Theme Options', 'nfarm', 'manage_options', 'alecaddd-nfarm', 'nfarm_theme_create_page', 'dashicons-admin-customizer', 110);

    // Generate Nfarm Admin Sub Page
    add_submenu_page('alecaddd_nfarm', 'Nfram Sidebar Options', 'Sidebar', 'manage_options', 'alecaddd_nfarm', 'nfarm_theme_create_page');
    add_submenu_page('alecaddd_nfarm', 'Nfram Theme Options', 'Theme Options', 'manage_options', 'alecaddd_nfarm_theme', 'nfarm_theme_support_page' );
    add_submenu_page('alecaddd_nfarm', 'Nfram Contact Form', 'Custom Form', 'manage_options', 'alecaddd_nfarm_theme_contact', 'nfarm_theme_contact_form_page');
    add_submenu_page('alecaddd_nfarm', 'Nfram Css Options', 'Custom CSS', 'manage_options', 'alecaddd_nfarm_css', 'nfarm_theme_settings_page');

    // Activate Custom Settings
    add_action('admin_init', 'nfarm_custom_settings');
}



/**
 * Description: Actions are the hooks that the WordPress core launches at specific points during execution, or when specific events occur.
 *              Plugins can specify that one or more of its PHP functions are executed at these points, using the Action API
 * 
 * Parameters:
 *      $hook_name: (string) (Required) The name of the action to add the callback to.
 *      $callback: (callable) (Required) The callback to be run when the action is called.
 *      $priority: (int) (Optional) Used to specify the order in which the functions associated with a particular action are executed. Lower numbers correspond with earlier execution, and functions with the same priority are executed in the order in which they were added to the action. Default value: 10
 *      $accepted_args: (int) (Optional) The number of arguments the function accepts. Default value: 1
 * 
 * add_action(string $hook_name, callable $callback, int $priority = 10, int $accepted_args = 1)
 */

add_action('admin_menu', 'nfarm_add_admin_page');


function nfarm_custom_settings()
{
    /**
     * Description: Registers a setting and its data.
     * 
     * Parameters:
     *      $option_group: (string) (Required) A settings group name. Should correspond to an allowed option key name. Default allowed option key names include 'general', 'discussion', 'media', 'reading', 'writing', and 'options'.
     *      $option_name: (string) (Required) The name of an option to sanitize and save.
     *      $args: (array) (Optional) Data used to describe the setting when registered.
     *          type: (string) The type of data associated with this setting. Valid values are 'string', 'boolean', 'integer', 'number', 'array', and 'object'.
     *          description: (string) A description of the data attached to this setting.
     *          sanitize_callback: (callable) A callback function that sanitizes the option's value.
     *          show_in_rest: (bool|array) Whether data associated with this setting should be included in the REST API. When registering complex settings, this argument may optionally be an array with a 'schema' key.
     *          default: (mixed) Default value when calling get_option().
     * 
     * register_setting($option_group, $option_name, $args)
     * 
     * Description: Part of the Settings API. Use this to define new settings sections for an admin page. Show settings sections in your admin page callback function with do_settings_sections()
     *              .Add settings fields to your section with add_settings_field().
     *              The $callback argument should be the name of a function that echoes out any content you want to show at the top of the settings section before the actual fields. It can output nothing if you want.
     * 
     * Parameters:
     *      $id: (string) (Required) Slug-name to identify the section. Used in the 'id' attribute of tags.
     *      $title: (string) (Required) Slug-name to identify the section. Used in the 'id' attribute of tags.
     *      $callback: (callable) (Required) Function that echos out any content at the top of the section (between heading and fields).
     *      $page: (string) (Required) The slug-name of the settings page on which to show the section. Built-in pages include 'general', 'reading', 'writing', 'discussion', 'media', etc. Create your own using add_options_page();
     * 
     * add_settings_section($id, $title,  $callback,  $page)
     * 
     * Description: Part of the Settings API. Use this to define a settings field that will show as part of a settings section inside a settings page.
     *              The fields are shown using do_settings_fields() in do_settings_sections().
     *              The $callback argument should be the name of a function that echoes out the HTML input tags for this setting field. Use get_option() to retrieve existing values to show.
     * 
     * Parameters:
     *      $id: (string) (Required) Slug-name to identify the field. Used in the 'id' attribute of tags.
     *      $title: (string) (Required) Formatted title of the field. Shown as the label for the field during output.
     *      $callback: (callable) (Required) Function that fills the field with the desired form inputs. The function should echo its output.
     *      $page: (string) (Required) The slug-name of the settings page on which to show the section (general, reading, writing, ...).
     *      $section: (string) (Optional) The slug-name of the section of the settings page in which to show the box. Default value: 'default'
     *      $args: (array) (Optional) Extra arguments used when outputting the field.
     *          label_for: (string) When supplied, the setting title will be wrapped in a <label> element, its for attribute populated with this value.
     *          class: (string) CSS Class to be added to the <tr> element when the field is output. Default value: array()
     * 
     * add_settings_field($id, $title, $callback, $page, $section, $args)
     */

    // Sidebar Options
    register_setting('nfarm-settings-group', 'profile_picture');
    register_setting('nfarm-settings-group', 'first_name');
    register_setting('nfarm-settings-group', 'last_name');
    register_setting('nfarm-settings-group', 'user_desperation');
    register_setting('nfarm-settings-group', 'twitter_handler', 'nfarm_sanitize_twitter_handler');
    register_setting('nfarm-settings-group', 'facebook_handler', 'nfarm_sanitize_facebook_handler');
    register_setting('nfarm-settings-group', 'gplus_handler', 'nfarm_sanitize_gplus_handler');

    add_settings_section('nfarm-sidebar-options', 'Sidebar Options', 'nfarm_sidebar_options', 'alecaddd_nfarm');
    add_settings_field('sidebar-profile-picture', 'Profile Picture', 'nfarm_sidebar_profile', 'alecaddd_nfarm', 'nfarm-sidebar-options');
    add_settings_field('sidebar-name', 'First Name', 'nfarm_sidebar_name', 'alecaddd_nfarm', 'nfarm-sidebar-options');
    add_settings_field('sidebar-desperation', 'Desperation', 'nfarm_sidebar_desperation', 'alecaddd_nfarm', 'nfarm-sidebar-options');
    add_settings_field('sidebar-twitter', 'Twitter handler', 'nfarm_sidebar_twitter', 'alecaddd_nfarm', 'nfarm-sidebar-options');
    add_settings_field('sidebar-facebook', 'Facebook handler', 'nfarm_sidebar_facebook', 'alecaddd_nfarm', 'nfarm-sidebar-options');
    add_settings_field('sidebar-gplus', 'Google+ handler', 'nfarm_sidebar_gplus', 'alecaddd_nfarm', 'nfarm-sidebar-options');

    // Theme Support Options
    register_setting('nfarm-theme-support', 'post_formats', '');
    register_setting('nfarm-theme-support', 'custom_header' );
	register_setting('nfarm-theme-support', 'custom_background' );
    
    add_settings_section('nfram-theme-options', 'Theme Options', 'nfarm_theme_opntions', 'alecaddd_nfarm_theme');

    add_settings_field('post_formats', 'Post Formats', 'nfarm_post_formats', 'alecaddd_nfarm_theme', 'nfram-theme-options');
    add_settings_field('custom-header', 'Custom Header', 'nfarm_custom_header', 'alecaddd_nfarm_theme', 'nfram-theme-options' );
	add_settings_field('custom-background', 'Custom Background', 'nfarm_custom_background', 'alecaddd_nfarm_theme', 'nfram-theme-options' );

    // Contact Form Options
    register_setting('nfarm-contact-options', 'activate_contact');

    add_settings_section('nfarm-contact-secition', 'Contact Form', 'nfarm_contact_section', 'alecaddd_nfarm_theme_contact');

    add_settings_field('activate-form', 'Activate Contact Form', 'nfarm_activate_contact', 'alecaddd_nfarm_theme_contact', 'nfarm-contact-secition');
}

// Post Formats Callback Function

function nfarm_theme_opntions()
{
    echo 'Activate and Deactivate specific Theme Support Options';
}

function nfarm_contact_section()
{
    echo 'Activate and Deactivate the Build-in Contact Form';
}

function nfarm_activate_contact()
{

    $options = get_option( 'activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="activate_contact" value="1" '.$checked.' /></label>';
}

// Theme Support Options
function nfarm_post_formats() {
	$options = get_option( 'post_formats' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ){
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}

function nfarm_custom_header() {
	$options = get_option( 'custom_header' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}

function nfarm_custom_background() {
	$options = get_option( 'custom_background' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}

// Sidebar Options Function
function nfarm_sidebar_options()
{
    echo 'Customize your Sidebar Information';
}


function nfarm_sidebar_profile()
{
    $picture = esc_attr( get_option( 'profile_picture' ) );
	if( empty($picture) ){
		echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Remove" id="remove-picture">';
	}
}

function nfarm_sidebar_twitter()
{
    $twitterHandler = esc_attr(get_option('twitter_handler'));
    echo '<input type="text" name="twitter_handler" value="'.$twitterHandler.'" placeholder="Twitter Handler"  />'
        .'<p class="description">Input your Twitter username without the @ character.</p>';
}

function nfarm_sidebar_facebook()
{
    $facebookHandler = esc_attr(get_option('facebook_handler'));
    echo '<input type="text" name="facebook_handler" value="'.$facebookHandler.'" placeholder="Facebook Handler"  />';
}

function nfarm_sidebar_gplus()
{
    $gplusHandler = esc_attr(get_option('gplus_handler'));
    echo '<input type="text" name="gplus_handler" value="'.$gplusHandler.'" placeholder="Google+ Handler"  />';
}

function nfarm_sidebar_desperation()
{
    $desperation = esc_attr(get_option('user_desperation'));
    echo '<input type="text" name="user_desperation" value="'.$desperation.'" placeholder="Desperation"  />' 
        .'<p class="description">Write something smart.</p>';
}

function nfarm_sidebar_name()
{
    /**
     * Description: Escaping for HTML attributes.
     * 
     * Parameters:
     *      $text: (string) (Required)
     * 
     * esc_attr($text)
     * 
     * Description: If the option does not exist, and a default value is not provided, boolean false is returned. 
     *              This could be used to check whether you need to initialize an option during installation of a plugin, however that can be done better by using add_option() which will not overwrite existing options.
     *              Not initializing an option and using boolean false as a return value is a bad practice as it triggers an additional database query.
     *              The type of the returned value can be different from the type that was passed when saving or updating the option. If the option value was serialized, then it will be unserialized when it is returned. In this case the type will be the same. For example, storing a non-scalar value like an array will return the same array.
     *              In most cases non-string scalar and null values will be converted and returned as string equivalents.
     * 
     * Parameters:
     *      $option: (string) (Required) Name of the option to retrieve. Expected to not be SQL-escaped.
     *      $default: (mixed) (Optional) Default value to return if the option does not exist.Default value: false
     * 
     * get_option($option, $default)
     */

    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />'
        .'<input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}


// Sanitization settings
function nfarm_sanitize_twitter_handler($input)
{
    /**
     * Description:
     *      . Checks for invalid UTF-8,
     *      . Converts single < characters to entities
     *      . Strips all tags
     *      . Removes line breaks, tabs, and extra whitespace
     *      . Strips octets
     * 
     * Parameters:
     *      $str: (string) (Required) String to sanitize.
     *      
     * sanitize_text_field($str)
     */
    $output = sanitize_text_field($input);
    $output = str_replace('@', '', $output);
    return $output;
}

// Template submenu functions

function nfarm_theme_create_page()
{
    require_once( get_template_directory() . '/inc/templates/nfarm-admin.php' );
}


function nfarm_theme_support_page()
{
	require_once( get_template_directory() . '/inc/templates/nfarm-theme-support.php' );
}

function nfarm_theme_contact_form_page()
{
    require(get_template_directory() . '/inc/templates/nfarm-contact-form.php');
}

function nfarm_theme_settings_page()
{
    echo '<h1>Nfarm Custom Css</h1>';
}
