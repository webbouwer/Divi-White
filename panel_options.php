<?php
/* extending social links/icons */
// source: https://diviextended.com/how-to-add-extra-social-media-icons-in-divi/

require_once( get_template_directory() . esc_attr( "/options_divi.php" ) );
global $options;

$enable_key = "name";
$enable_value = "Show Facebook Icon";
$enable_options = array (

	array( "name" => esc_html__( "Show LinkedIn Icon", $themename ),
           "id" => $shortname."_show_linkedin_icon",
           "type" => "checkbox",
           "std" => "off",
           "desc" => esc_html__( "Here you can choose to display the Github Icon. ", $themename ) ),

    array( "name" => esc_html__( "Show Github Icon", $themename ),
           "id" => $shortname."_show_github_icon",
           "type" => "checkbox",
           "std" => "off",
           "desc" => esc_html__( "Here you can choose to display the Github Icon. ", $themename ) ),


    array( "name" => esc_html__( "Show Youtube Icon", $themename ),
           "id" => $shortname."_show_youtube_icon",
           "type" => "checkbox",
           "std" => "off",
           "desc" => esc_html__( "Here you can choose to display the Youtube Icon. ", $themename ) ),


    array( "name" => esc_html__( "Show Tumblr Icon", $themename ),
           "id" => $shortname."_show_tumblr_icon",
           "type" => "checkbox",
           "std" => "off",
           "desc" => esc_html__( "Here you can choose to display the Tumblr Icon. ", $themename ) ),


    array( "name" => esc_html__( "Show Skype Icon", $themename ),
           "id" => $shortname."_show_skype_icon",
           "type" => "checkbox",
           "std" => "off",
           "desc" => esc_html__( "Here you can choose to display the Skype Icon. ", $themename ) ),

    array( "name" => esc_html__( "Show Vimeo Icon", $themename ),
           "id" => $shortname."_show_vimeo_icon",
           "type" => "checkbox",
           "std" => "off",
           "desc" => esc_html__( "Here you can choose to display the Vimeo Icon. ", $themename ) ),

    array( "name" => esc_html__( "Show Pinterest Icon", $themename ),
           "id" => $shortname."_show_pinterest_icon",
           "type" => "checkbox",
           "std" => "off",
           "desc" => esc_html__( "Here you can choose to display the Pinterest Icon. ", $themename ) ),
);

foreach( $options as $index => $value ) {
    if ( isset($value[$enable_key]) && $value[$enable_key] === $enable_value ) {
        foreach( $enable_options as $custom_index => $enable_option ) {
            $options = insertArrayIndex($options, $enable_option, $index+$custom_index+1);
        }
        break;
    }
}

$url_key = "name";
$url_value = "Facebook Profile Url";
$value_options = array (

	array( "name" => esc_html__( "LinkedIn Profile Url", $themename ),
           "id" => $shortname."_linkedin_url",
           "std" => "#",
           "type" => "text",
           "validation_type" => "url",
		   "desc" => esc_html__( "Enter the URL of your LinkedIn Profile. ", $themename ) ),

    array( "name" => esc_html__( "Github Profile Url", $themename ),
           "id" => $shortname."_github_url",
           "std" => "#",
           "type" => "text",
           "validation_type" => "url",
		   "desc" => esc_html__( "Enter the URL of your Github Profile. ", $themename ) ),

    array( "name" => esc_html__( "Youtube Profile Url", $themename ),
           "id" => $shortname."_youtube_url",
           "std" => "#",
           "type" => "text",
           "validation_type" => "url",
		   "desc" => esc_html__( "Enter the URL of your Youtube Profile. ", $themename ) ),

    array( "name" => esc_html__( "Tumblr Profile Url", $themename ),
           "id" => $shortname."_tumblr_url",
           "std" => "#",
           "type" => "text",
           "validation_type" => "url",
		   "desc" => esc_html__( "Enter the URL of your Tumblr Profile. ", $themename ) ),

    array( "name" => esc_html__( "Skype Profile Url", $themename ),
           "id" => $shortname."_skype_url",
           "std" => "#",
           "type" => "text",
           "validation_type" => "url",
		   "desc" => esc_html__( "Enter the URL of your Skype Profile. ", $themename ) ),

    array( "name" => esc_html__( "Vimeo Profile Url", $themename ),
           "id" => $shortname."_vimeo_url",
           "std" => "#",
           "type" => "text",
           "validation_type" => "url",
		   "desc" => esc_html__( "Enter the URL of your Vimeo Profile. ", $themename ) ),

    array( "name" => esc_html__( "Pinterest Profile Url", $themename ),
           "id" => $shortname."_pinterest_url",
           "std" => "#",
           "type" => "text",
           "validation_type" => "url",
		   "desc" => esc_html__( "Enter the URL of your Pinterest Profile. ", $themename ) )

);

foreach( $options as $index => $value ) {
    if ( isset($value[$url_key]) && $value[$url_key] === $url_value ) {
        foreach( $value_options as $custom_index => $value_option ) {
            $options = insertArrayIndex($options, $value_option, $index+$custom_index+1);
        }
        break;
    }
}


function insertArrayIndex($array, $new_element, $index) {
	$start = array_slice($array, 0, $index);
	$end = array_slice($array, $index);
	$start[] = $new_element;
	return array_merge($start, $end);
}

return $options;
?>
