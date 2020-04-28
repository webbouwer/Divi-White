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
function dw_section_options_callback(){
$options = get_option( 'dw_implement_menu_images' );
    echo '<input name="dw_implement_menu_images" id="dw_implement_menu_images" type="checkbox" value="1" class="code" ' . checked( 1, $options, false ) . ' />';

    echo 'enable images and descriptions inside menu options <br/> (if incompatible with other menu plugins turn this off)';
}

function dw_theme_settings(){
add_option('dw_implement_menu_images',1);// add theme option to database
add_settings_section( 'dw_first_section', 'Divi White Theme Options', 'dw_section_description_implement', 'dw-theme-panel');
add_settings_field( 'dw_implement_menu_images', 'Implement menu images','dw_section_options_callback', 'dw-theme-panel','dw_first_section' );//add settings field to the “first_section”
register_setting( 'dw-theme-panel-grp', 'dw_implement_menu_images');
}
add_action('admin_init','dw_theme_settings');


/*


function theme_option_page() {
?>
<div class="wrap">
<h1>Custom Theme Options Page</h1>
<form method="post" action="options.php">
<?php
// display settings field on theme-option page
settings_fields("theme-options-grp");
// display all sections for theme-options page
do_settings_sections("theme-options");
submit_button();
?>
</form>
</div>
<?php
}

function add_theme_menu_item() {
add_theme_page("Theme Customization", "Theme Customization", "manage_options", "theme-options", "theme_option_page", null, 99);
}
add_action("admin_menu", "add_theme_menu_item");

function theme_section_description(){
echo '<p>Theme Option Section</p>';}
function options_callback(){
$options = get_option( 'first_field_option' );
echo '<input name="first_field_option" id="first_field_option" type="checkbox" value="1" class="code" ' . checked( 1, $options, false ) . ' /> Check for enabling custom help text.';
}
function test_theme_settings(){
add_option('first_field_option',1);// add theme option to database
add_settings_section( 'first_section', 'New Theme Options Section',
'theme_section_description','theme-options');
add_settings_field('first_field_option','Test Settings Field','options_callback',
'theme-options','first_section');//add settings field to the “first_section”
register_setting( 'theme-options-grp', 'first_field_option');
}
add_action('admin_init','test_theme_settings');


//-----

function DW_basic_add_theme_menu_info()
{
	add_menu_page('Dive White Child Theme Panel', 'Divi White', 'manage_options', 'dw-theme-panel', 'DW_basic_theme_info', null, 99999);
    // https://shibashake.com/wordpress-theme/add_menu_page-add_submenu_page#add-menu
    // https://codex.wordpress.org/Creating_Options_Pages

}
add_action('admin_menu', 'DW_basic_add_theme_menu_info');
function dw_theme_panel_title(){
echo '<p>Divi White Settings</p>';
}

function DW_basic_theme_info()
{
     global $title;
    ?>
	    <div class='wrap'>
	    <h1>Divi White - <?php echo $title;?></h1>

            <div class="wrap">
<h1>Custom Theme Options Page</h1>
<form method="post" action="options.php">
<?php
    settings_fields("dw-theme-panel-grp");

    do_settings_sections("dw-theme-panel");
    submit_button();
?>
</form>
</div>

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
		</div>
	<?php
}


function dw_theme_options_callback(){
$options = get_option( 'DW_implement_section_menuimages_opt' );
echo '<input name="DW_implement_section_menuimages_opt" id="DW_implement_section_menuimages_opt" type="checkbox" value="1" class="code" ' . checked( 1, $options, false ) . ' /> Enable menu images';
}

//admin-init hook to create settings section with title “New Theme Options Section”.
function DW_theme_settings(){
add_option('DW_implement_section_menuimages_opt',1);// add theme option to database
add_settings_section( 'DW_implement_section', 'Divi White code implementation',
'dw_theme_panel_title','dw-theme-panel');

add_settings_field('DW_implement_section_menuimages_opt','Use Menu images','dw_theme_options_callback',
'dw-theme-panel','implement_section');//add settings field to the “first_section”
register_setting( 'dw-theme-panel-grp', 'DW_implement_section_menuimages_opt');
}
add_action('admin_init','DW_theme_settings');

*/



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

