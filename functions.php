<?php

// https://herowp.com/auto-install-install-plugins-wordpress-themes/
// https://www.sitepoint.com/create-a-wordpress-theme-settings-page-with-the-settings-api/
// https://wpreset.com/programmatically-automatically-download-install-activate-wordpress-plugins/

/*
 * Include plugin handling using tgm-plugin-activation class
 *
 * includes/builder/class-tgm-plugin-activation.php
 *
 * see: http://tgmpluginactivation.com/configuration/
 * http://tgmpluginactivation.com/download/ | http://tgmpluginactivation.com/screenshots/
 * instructions from https://herowp.com/auto-install-install-plugins-wordpress-themes/
 */

require_once('includes/builder/class-tgm-plugin-activation.php');
require_once('includes/builder/functions-tgm-plugin-activation.php');


// more info! // : https://developer.wordpress.org/themes/advanced-topics/child-themes/
require_once( get_stylesheet_directory(). '/includes/menu/menu.php' ); // menu image plugin functions <?php
require_once( get_stylesheet_directory(). '/customizer.php' ); // customizer functions

/* Future jquery
 * including migration lib
 * replacing old jquery has issues with non compatable code
 */
/*
function replace_core_jquery_version() {
    wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', "https://code.jquery.com/jquery-3.1.1.min.js", array(), '3.1.1' );
    wp_deregister_script( 'jquery-migrate' );
    wp_register_script( 'jquery-migrate', "https://code.jquery.com/jquery-migrate-3.0.0.min.js", array(), '3.0.0' );
}
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// https://digwp.com/2016/01/include-styles-child-theme/

if ( !function_exists( 'DW_rtl_css' ) ):
    function DW_rtl_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'DW_rtl_css' );


if ( !function_exists( 'DW_parent_css' ) ):
    function DW_parent_css() {
        wp_enqueue_style( 'DW_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'DW_parent_css', 10 );


// Start customize
function DW_basic_add_theme_menu_info()


if ( !function_exists( 'DW_parent_css' ) ):
    function DW_parent_css() {
        wp_enqueue_style( 'DW_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'DW_parent_css', 10 );


// Start customize
function DW_basic_add_theme_menu_item()
{
	add_menu_page('Dive White Child Theme Panel', 'Divi White', 'manage_options', 'dw-theme-panel', 'DW_basic_theme_info', null, 99999);
    // https://shibashake.com/wordpress-theme/add_menu_page-add_submenu_page#add-menu
    // https://codex.wordpress.org/Creating_Options_Pages

}
add_action('admin_menu', 'DW_basic_add_theme_menu_info');

function DW_basic_theme_info()
{
     global $title;
    ?>
	    <div class='wrap'>
	    <h1>Divi White - <?php echo $title;?></h1>
            <p>
            <img width="400" height="auto" src="<?php echo get_stylesheet_directory_uri('stylesheet_directory')."/images/screenshot_divi_white.png"; ?>" />
            </p>
            <h3>Divi White and DiviPack</h3>

            <p>DiviPack is a Wordpress code bundle including the commercial Divi Theme made by <a target="blank" href="https://www.elegantthemes.com/gallery/divi">Elegant Themes</a>.</p>
            <p>DiviPack includes the Divi White child theme to provide an easy to use library with 175+ recommended free plugins to choose and install directly in Wordpress.</p>
            <p>Divi White is made by <a target="blank" href="https://github.com/webbouwer">Webbouwer</a> at <a target="blank" href="https://www.webdesigndenhaag.net">Webdesign Den Haag</a>
             | <a target="blank" href="https://github.com/webbouwer/Divi-White/archive/stable.zip">download Divi-White/archive/stable.zip</a></p>
            <p>Plugin library is made with the <a target="blank" href="http://tgmpluginactivation.com">tgm plugin activation class</a></p>
            <p>Menu_Image original source <a target="blank" href="https://github.com/zviryatko/menu-image/blob/master/menu-image.php">github.com/zviryatko</a></p>
            <p>DiviPack is a commercial Wordpress package including the commercial Divi Theme made by <a target="blank" href="https://www.elegantthemes.com/gallery/divi">Elegant Themes</a>.</p>
            <p>DiviPack includes the Divi White child theme for theme customization wich provides an easy to use library with 175+ recommended free plugins to choose and install directly in Wordpress.</p>
            <p>Divi White is made by <a target="blank" href="https://github.com/webbouwer">Webbouwer</a> at <a target="blank" href="https://www.webdesigndenhaag.net">Webdesign Den Haag</a>
             | <a target="blank" href="https://github.com/webbouwer/Divi-White/archive/master.zip">download</a></p>
            <p>Plugin library is made with the <a target="blank" href="http://tgmpluginactivation.com">tgm plugin activation class</a></p>
		</div>
	<?php
}


// https://herowp.com/auto-install-install-plugins-wordpress-themes/
// https://www.sitepoint.com/create-a-wordpress-theme-settings-page-with-the-settings-api/
// https://wpreset.com/programmatically-automatically-download-install-activate-wordpress-plugins/

/*
 * Include plugin handling using tgm-plugin-activation class
 *
 * includes/builder/class-tgm-plugin-activation.php
 *
 * see: http://tgmpluginactivation.com/configuration/
 * http://tgmpluginactivation.com/download/ | http://tgmpluginactivation.com/screenshots/
 * instructions from https://herowp.com/auto-install-install-plugins-wordpress-themes/
 */

require_once('includes/builder/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'register_required_plugins' );

function register_required_plugins() {
/**
* Register the required plugins for this theme.
*
* In this example, we register two plugins – one included with the TGMPA library
* and one from the .org repo.
*
* The variable passed to tgmpa_register_plugins() should be an array of plugin
* arrays.
*
* This function is hooked into tgmpa_init, which is fired within the
* TGM_Plugin_Activation class constructor.
*/
/**
* Array of plugin arrays. Required keys are name and slug.
* If the source is NOT from the .org repo, then source is also required.
*/



$plugins = array(



    // special admin
    array(
    'name' => 'Github Updater (theme updater)', // The plugin name.
    'slug' => 'github-updater', // The plugin slug (typically the folder name).
    'source' => 'https://github.com/afragen/github-updater/archive/master.zip', // The plugin source.
    'required' => true, // If false, the plugin is only 'recommended' instead of required.
    'external_url' => 'https://github.com/afragen/github-updater', // If set, overrides default API URL and points to an external URL.
    ),

    array(
    'name' => 'WP Custom Admin Interface',
    'slug' => 'wp-custom-admin-interface',
    'required' => false,
    ),

    // official commercial
    array(
    'name' => 'Divi Builder (commercial)', // The plugin name.
    'slug' => 'divi-builder', // The plugin slug (typically the folder name).
    'source' => 'https://www.webdesigndenhaag.net/wp/divipack/downloads/divi-builder.zip', // The plugin source.
    'required' => false, // If false, the plugin is only 'recommended' instead of required.
    'external_url' => 'https://www.elegantthemes.com/gallery/divi/', // If set, overrides default API URL and points to an external URL.
    ),

    /*
    // This is an example of how to include a plugin pre-packaged with a theme.
    array(
    'name' => 'TGM Example Plugin', // The plugin name.
    'slug' => 'tgm-example-plugin', // The plugin slug (typically the folder name).
    'source' => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
    'required' => true, // If false, the plugin is only 'recommended' instead of required.
    'version' => ”, // E.g. 1.0.0. If set, the active plugin must be this version or higher.
    'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
    'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
    'external_url' => ”, // If set, overrides default API URL and points to an external URL.
    ),

    // This is an example of how to include a plugin from a private repo in your theme.
    array(
    'name' => 'TGM New Media Plugin', // The plugin name.
    'slug' => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
    'source' => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
    'required' => true, // If false, the plugin is only 'recommended' instead of required.
    'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
    ),

    // This is an example of how to include a plugin from the WordPress Plugin Repository.
    array(
    'name' => 'BuddyPress',
    'slug' => 'buddypress',
    'required' => false,
    ),
    */

);


// or :)
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://raw.githubusercontent.com/webbouwer/wp-plugin-bundle/master/list.md'  );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$gitdata = curl_exec($ch);
curl_close($ch);

//echo $data;
$pluginlist = preg_split("/[\s,]+/", $gitdata);

if(isset($pluginlist) && !empty($pluginlist) && $pluginlist[0] != '400:'){ // get a real file

    foreach($pluginlist as $foldername){

        if( $foldername != 'index.php' && $foldername != 'pluginlist.txt' ) // make sure it's a plugin slug
            $plugins[] = array(
            'name' => str_replace("-"," ",$foldername),
            'slug' => $foldername,
            'required' => false,
            );

    }
}

/**
* Array of configuration settings. Amend each line as needed. http://tgmpluginactivation.com/configuration/
* If you want the default strings to be available under your own theme domain,
* leave the strings uncommented.
* Some of the strings are added into a sprintf, so see the comments at the
* end of each line for what each argument will be.
*/
$config = array(
    'default_path' => '', // Default absolute path to pre-packaged plugins.
    'menu' => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug' => 'dw-theme-panel', // Parent Menu slug.
    'capability' => 'edit_theme_options', // Theme Menu capability.
    'has_notices' => true, // Show admin notices or not.
    'dismissable' => true, // If false, a user cannot dismiss the nag message.
    'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false, // Automatically activate plugins after installation or not.
    'message' => '', // Message to output right before the plugins table.
    'strings' => array(
        'page_title' => __( 'Install Required Plugins', 'tgmpa' ),
        'menu_title' => __( 'Install Plugins', 'tgmpa' ),
        'installing' => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
        'oops' => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
        // %1$s = plugin name(s).
        'notice_can_install_required' => _n_noop( 'Divi White child theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
        'notice_can_install_recommended' => _n_noop( 'Divi White child theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
        'notice_cannot_install' => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
        'notice_can_activate_required' => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
        'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
        'notice_cannot_activate' => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
        'notice_ask_to_update' => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
        'notice_cannot_update' => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
        'install_link' => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
        'activate_link' => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
        'return' => __( 'Return to Required Plugins Installer', 'tgmpa' ),
        'plugin_activated' => __( 'Plugin activated successfully.', 'tgmpa' ),
        'complete' => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
        'nag_type' => 'updated' // Determines admin notice type – can only be 'updated', 'update-nag' or 'error'.
    )
);

tgmpa( $plugins, $config );

}
