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
require_once( get_stylesheet_directory(). '/customizer.php' ); // customizer functions

if( get_option( 'dw_implement_menu_images' ) == 1 ){
    require_once( get_stylesheet_directory(). '/includes/menu/menu.php' ); // menu image plugin functions <?php
}

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



// Build theme option menu page
function DW_basic_add_theme_menu_info()
{
	add_menu_page('Dive White Child Theme Panel', 'Divi White', 'manage_options', 'dw-theme-panel', 'DW_basic_theme_info', null, 99999);
    // https://shibashake.com/wordpress-theme/add_menu_page-add_submenu_page#add-menu
    // https://codex.wordpress.org/Creating_Options_Pages

}
add_action('admin_menu', 'DW_basic_add_theme_menu_info');

function DW_basic_theme_info()
{
?>
    <div class="wrap">
    <h1>Custom Theme Options Page</h1>
    <form method="post" action="options.php">
    <?php
    // display settings field on theme-option page
    settings_fields("dw-theme-panel-grp");
    // display all sections for theme-options page
    do_settings_sections("dw-theme-panel");
    submit_button();
    ?>
    </form>
    </div>
<?php
}

function dw_section_description_implement(){
echo '<p>Theme Option Section</p>';
}

function dw_section_menu_images_callback(){

    $options = get_option( 'dw_implement_menu_images' );
    echo '<input name="dw_implement_menu_images" id="dw_implement_menu_images" type="checkbox" value="1" class="code" ' . checked( 1, $options, false ) . ' />';
    echo '(turn this off if incompatible with other menu plugins )';


}

function dw_section_disable_gravatar_callback(){


    $options = get_option( 'dw_disable_gravatar_code' );
    echo '<input name="dw_disable_gravatar_code" id="dw_disable_gravatar_code" type="checkbox" value="1" class="code" ' . checked( 1 , $options, false ) . ' />';
    echo '( turn this on if Gravatar code is bugging your site )';

}

function dw_section_pluginbundle_callback(){


    $options = get_option( 'dw_select_pluginbundle' );
    echo '<select name="dw_select_pluginbundle" id="dw_select_pluginbundle" value="'. $options .'">';
    echo '<option value="0" '. selected( '0' == $options ) . '>Minimal</option>';
    echo '<option value="1" '. selected( '1' == $options ) . '>Woocommerce</option>';
    echo '<option value="2" '. selected( '2' == $options ) . '>Full(200+)</option>';
    echo '</select>';

}

function dw_theme_settings(){

    add_settings_section( 'dw_first_section', 'Divi White Theme Options', 'dw_section_description_implement', 'dw-theme-panel');

    add_option('dw_select_pluginbundle',1);// add theme option to database
    add_settings_field( 'dw_select_pluginbundle', 'Select plugin install bundle','dw_section_pluginbundle_callback', 'dw-theme-panel','dw_first_section' );//add settings field to the “first_section”
    register_setting( 'dw-theme-panel-grp', 'dw_select_pluginbundle');

    add_option('dw_implement_menu_images',1);// add theme option to database
    add_settings_field( 'dw_implement_menu_images', 'Enable menu images and descriptions','dw_section_menu_images_callback', 'dw-theme-panel','dw_first_section' );//add settings field to the
    register_setting( 'dw-theme-panel-grp', 'dw_implement_menu_images');

    add_option('dw_disable_gravatar_code',1);// add theme option to database
    add_settings_field( 'dw_disable_gravatar_code', 'Disable Gravatar code','dw_section_disable_gravatar_callback', 'dw-theme-panel','dw_first_section' );//add settings field to the “first_section”
    register_setting( 'dw-theme-panel-grp', 'dw_disable_gravatar_code');

}
add_action('admin_init','dw_theme_settings');



/* extending social links/icons */
// source: https://diviextended.com/how-to-add-extra-social-media-icons-in-divi/
if ( ! function_exists( 'et_get_safe_localization' ) ) {

    function et_get_safe_localization( $string ) {
    	return wp_kses( $string, et_get_allowed_localization_html_elements() );
    }

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

    function et_load_core_options() {
        $options = require_once( get_stylesheet_directory() . esc_attr( "/panel_options.php" ) );
    }
    add_action( 'init', 'et_load_core_options', 999 );

}



if( get_option( 'dw_disable_gravatar_code' ) == 1 ){

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

}
