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
add_action('admin_menu', 'DW_basic_add_theme_menu_info');

function DW_basic_add_theme_menu_info()
{
	add_menu_page('Dive White Child Theme Panel', 'Divi White', 'manage_options', 'dw-theme-panel', 'DW_basic_theme_info', null, 99999);
    // https://shibashake.com/wordpress-theme/add_menu_page-add_submenu_page#add-menu
    // https://codex.wordpress.org/Creating_Options_Pages
    // theme options
    add_action( 'admin_init', 'DW_register_theme_settings' );
}

// Adding theme options
function DW_register_theme_settings() {

	//register our options
    $optionname = 'use_menu_images';
	if( !get_option( $optionname ) ){
        add_option('use_menu_images', 0 );
    }
}


function DW_basic_theme_info()
{



     global $title;
    ?>
	    <div class='wrap'>
	    <h1>Divi White - <?php echo $title;?></h1>
            <p>
            <img width="400" height="auto" src="<?php echo get_stylesheet_directory_uri('stylesheet_directory')."/images/screenshot_divi_white.png"; ?>" />
            </p>
            <?php /*
            <form method="post" action="admin.php?page=dw-theme-panel">
                <table class="form-table">
                    <tr valign="top">
                    <th scope="row">Use theme native menu image</th>
                    <td><input type="checkbox" name="use_menu_images" value="<?php echo get_option( $optionname ) ?>" /></td>
                    </tr>
                </table>

                <?php submit_button(); ?>

            </form>

            <hr />
            */ ?>

            <h3>Divi White and DiviPack</h3>
            <p>DiviPack is a Wordpress code bundle including the commercial Divi Theme made by <a target="blank" href="https://www.elegantthemes.com/gallery/divi">Elegant Themes</a>.</p>
            <p>DiviPack includes the Divi White child theme to provide an easy to use library with 175+ recommended free plugins to choose and install directly in Wordpress.</p>
            <p>Divi White is made by <a target="blank" href="https://github.com/webbouwer">Webbouwer</a> at <a target="blank" href="https://www.webdesigndenhaag.net">Webdesign Den Haag</a>
             | <a target="blank" href="https://github.com/webbouwer/Divi-White/archive/stable.zip">download Divi-White/archive/stable.zip</a></p>
            <p>Plugin library is made with the <a target="blank" href="http://tgmpluginactivation.com">tgm plugin activation class</a></p>
            <p>Menu_Image original source <a target="blank" href="https://github.com/zviryatko/menu-image/blob/master/menu-image.php">github.com/zviryatko</a></p>


        <?php
            //global $options;
            //print_r( $options );
        ?>
		</div>
	<?php
}



/* extending social links/icons */
// source: https://diviextended.com/how-to-add-extra-social-media-icons-in-divi/
if ( ! function_exists( 'et_get_safe_localization' ) ) {

    function et_get_safe_localization( $string ) {
    	return wp_kses( $string, et_get_allowed_localization_html_elements() );
    }

<<<<<<< HEAD
add_action( 'tgmpa_register', 'register_required_plugins' );

function register_required_plugins() {

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
);


// or :)
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://raw.githubusercontent.com/webbouwer/wp-plugin-bundle/master/list.md'  );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$gitdata = curl_exec($ch);
curl_close($ch);

$pluginlist = preg_split("/[\s,]+/", $gitdata);

if(isset($pluginlist) && !empty($pluginlist) && $pluginlist[0] != '400:'){ // get a real file

    foreach($pluginlist as $foldername){

        if( $foldername != 'index.php' && $foldername != 'pluginlist.txt' ) // make sure it's a plugin slug
            $plugins[] = array(
            'name' => str_replace("-"," ",$foldername),
            'slug' => $foldername,
            'required' => false,
            );
=======
}

if ( ! function_exists( 'et_get_allowed_localization_html_elements' ) ) {

    function et_get_allowed_localization_html_elements() {
    	$whitelisted_attributes = array(
    		'id'    => array(),
    		'class' => array(),
    		'style' => array(),
    	);

    	$whitelisted_attributes = apply_filters( 'et_allowed_localization_html_attributes', $whitelisted_attributes );

    	$elements = array(
    		'a'      => array(
    			'href'   => array(),
    			'title'  => array(),
    			'target' => array(),
    		),
    		'b'      => array(),
    		'em'     => array(),
    		'p'      => array(),
    		'span'   => array(),
    		'div'    => array(),
    		'strong' => array(),
    	);

    	$elements = apply_filters( 'et_allowed_localization_html_elements', $elements );

    	foreach ( $elements as $tag => $attributes ) {
    		$elements[ $tag ] = array_merge( $attributes, $whitelisted_attributes );
    	}

    	return $elements;
    }

}

if ( ! function_exists( 'et_load_core_options' ) ) {
>>>>>>> origin/master

    function et_load_core_options() {
        $options = require_once( get_stylesheet_directory() . esc_attr( "/panel_options.php" ) );
    }
    add_action( 'init', 'et_load_core_options', 999 );

}

<<<<<<< HEAD
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
=======
>>>>>>> origin/master

/*
 * control (remove) gravatar
 */
function bp_remove_gravatar ($image, $params, $item_id, $avatar_dir, $css_id, $html_width, $html_height, $avatar_folder_url, $avatar_folder_dir) {
	$default = home_url().'/wp-includes/images/smilies/icon_cool.gif'; // get_stylesheet_directory_uri() .'/images/avatar.png';
	if( $image && strpos( $image, "gravatar.com" ) ){
		return '<img src="' . $default . '" alt="avatar" class="avatar" ' . $html_width . $html_height . ' />';
	} else {
		return $image;
	}
}
add_filter('bp_core_fetch_avatar', 'bp_remove_gravatar', 1, 9 );
function remove_gravatar ($avatar, $id_or_email, $size, $default, $alt) {
	$default = home_url().'/wp-includes/images/smilies/icon_cool.gif'; // get_stylesheet_directory_uri() .'/images/avatar.png';
	return "<img alt='{$alt}' src='{$default}' class='avatar avatar-{$size} photo avatar-default' height='{$size}' width='{$size}' />";
}
add_filter('get_avatar', 'remove_gravatar', 1, 5);
function bp_remove_signup_gravatar ($image) {
	$default = home_url().'/wp-includes/images/smilies/icon_cool.gif'; //get_stylesheet_directory_uri() .'/images/avatar.png';
	if( $image && strpos( $image, "gravatar.com" ) ){
		return '<img src="' . $default . '" alt="avatar" class="avatar" width="60" height="60" />';
	} else {
		return $image;
	}
}
add_filter('bp_get_signup_avatar', 'bp_remove_signup_gravatar', 1, 1 );

