<?php

function DW_theme_customizer( $wp_customize ){


    global $themename;

    /* add option to stick header below first section */
    $wp_customize->add_setting( 'et_divi_header_element_position_firstsection', array(
        'default'    => 0,
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'et_divi_header_element_position_firstsection',
            array(
                'label'          => __( 'On frontpage Below first section', $themename ),
                'section'   => 'et_divi_header_layout', //'et_divi_header_element_position',
                'settings'  => 'et_divi_header_element_position_firstsection',
                'type'      => 'checkbox',
            )
        )
    );

    // header secondary display
    $wp_customize->add_setting( 'et_divi_header_secondary_display', array(
        'default'    => 1
    ) );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'et_divi_header_secondary_display',
            array(
                'label'          => __( 'Secondary bar display', $themename ),
                'section'   => 'et_divi_header_secondary',
                'settings'  => 'et_divi_header_secondary_display',
                'type'      => 'checkbox',
            )
        )
    );

    // active sections menu links
    $wp_customize->add_setting( 'et_divi_header_fixed_section_links', array(
        'default'    => 0
    ) );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'et_divi_header_fixed_section_links',
            array(
                'label'     => __( 'Active section links', $themename ),
                'section'   => 'et_divi_header_fixed',
                'settings'  => 'et_divi_header_fixed_section_links',
                'type'      => 'checkbox',
            )
        )
    );

    // add header shadow option
    $wp_customize->add_setting( 'et_divi_header_bottomshadow_display', array(
        'default'    => 1
    ));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'et_divi_header_bottomshadow_display',
            array(
                'label'          => __( 'Header bottom shadow', $themename ),
                'section'   => 'et_divi_header_information',
                'settings'  => 'et_divi_header_bottomshadow_display',
                'type'      => 'checkbox',
            )
        )
    );

    // set mobile menu sticky et_divi_mobile_menu
    $wp_customize->add_setting( 'et_divi_mobile_menu_sticky', array(
        'default'    => 1
    ));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'et_divi_mobile_menu_sticky',
            array(
                'label'          => __( 'Mobile sticky', $themename ),
                'section'   => 'et_divi_mobile_menu',
                'settings'  => 'et_divi_mobile_menu_sticky',
                'type'      => 'checkbox',
            )
        )
    );

    // blog sidebar
    $wp_customize->add_section('et_divi_blog_settings_sidebar', array(
        'title'    => __('Sidebar', $themename ),
        'panel'  => 'et_divi_blog_settings',
		'priority' => 20,
    ));
    $wp_customize->add_setting( 'et_divi_blog_settings_sidebar_display', array(
        'default'    => '1'
    ) );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'et_divi_blog_settings_sidebar_display',
            array(
                'label'     => __( 'Blog Sidebar display', $themename ),
                'section'   => 'et_divi_blog_settings_sidebar',
                'settings'  => 'et_divi_blog_settings_sidebar_display',
                'type'      => 'checkbox',
            )
        )
    );

    // footer sticky
    $wp_customize->add_setting( 'et_divi_footer_elements_sticky', array(
        'default'    => '1'
    ) );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'et_divi_footer_elements_sticky',
            array(
                'label'     => __( 'Footer sticky', $themename ),
                'section'   => 'et_divi_footer_elements',
                'settings'  => 'et_divi_footer_elements_sticky',
                'type'      => 'checkbox',
            )
        )
    );

    /* Custom panels
    // add panels
    $wp_customize->add_panel('DW_elements', array(
        'title'    => __('DW Elements', $themename ),
        'priority' => 2,
    ));

    // add sections
    $wp_customize->add_section('DW_elements_header', array(
        'title'    => __('Header', $themename ),
        'panel'  => 'DW_elements',
		'priority' => 20,
    ));
    $wp_customize->add_section('DW_elements_sidebar', array(
        'title'    => __('Sidebar', $themename ),
        'panel'  => 'DW_elements',
		'priority' => 20,
    ));

    // header add options
    $wp_customize->add_setting( 'DW_elements_header_secondary_display' , array(
		'default' => 'hide',
		'sanitize_callback' => 'DW_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'DW_elements_header_secondary_display', array(
            	'label'          => __( 'Display Secondary bar', $themename ),
            	'section'        => 'DW_elements_header',
            	'settings'       => 'DW_elements_header_secondary_display',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the secondary menu bar display.', $themename ),
            	'choices'        => array(
                	'hide'   => __( 'hide', $themename ),
                	'show'   => __( 'show', $themename ),
            	)
    )));

    // sidebar add options
    $wp_customize->add_setting( 'DW_elements_sidebar_display' , array(
		'default' => 'right',
		'sanitize_callback' => 'DW_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'DW_elements_sidebar_display', array(
            	'label'          => __( 'Sidebar position', $themename ),
            	'section'        => 'DW_elements_sidebar',
            	'settings'       => 'DW_elements_sidebar_display',
            	'type'           => 'select',
 	    		'description'    => __( 'Select the default sidebar position.', $themename ),
            	'choices'        => array(
                	'hide'   => __( 'hidden', $themename ),
                	'left'   => __( 'left', $themename ),
            		'right'   => __( 'right', $themename ),
            	)
    )));
    */
}
add_action( 'customize_register', 'DW_theme_customizer' );


// default sanitize function
function DW_sanitize_default($obj){
    //.. global sanitizer
    return $obj;
}
?>
