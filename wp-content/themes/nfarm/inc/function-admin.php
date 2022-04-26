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
    add_submenu_page('alecaddd_nfarm', 'Nfram Theme Options', 'General', 'manage_options', 'alecaddd_nfarm', 'nfarm_theme_create_page');

    add_submenu_page('alecaddd_nfarm', 'Nfram Css Options', 'Custom CSS', 'manage_options', 'alecaddd_nfarm_css', 'nfarm_theme_settings_page');
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

function nfarm_theme_create_page()
{
    require_once( get_template_directory() . '/inc/templates/nfarm-admin.php' );
}

function nfarm_theme_settings_page()
{
    echo '<h1>Nfarm Custom Css</h1>';
}