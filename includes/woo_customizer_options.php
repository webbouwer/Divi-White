<?php

/* Woocommerce plugin theme customizer options */


function DW_theme_woo_customizer( $wp_customize ){

    global $themename;

    /* TODO (when needed)
    // Header primairy panels
    $wp_customize->add_section('dw_custom_header_woo', array(
        	'title'    => __('DW Woo Header options', $themename),
        	'panel'  => 'et_divi_header_panel',
			'priority' => 99998,
    ));

    // remove menu option dropdown arrows
    $wp_customize->add_setting( 'et_divi_woo_menu_remove_arrows', array(
        'default'    => 1,
        'priority' => '8',
    ) );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'et_divi_woo_menu_remove_arrows',
            array(
                'label'     => __( 'Display arrows', $themename ),
                'section'   => 'dw_custom_header_woo', //> 'et_divi_header_fixed',
                'desc'   => __( 'Remove or display mainmenu option arrows', $themename ),
                'settings'  => 'et_divi_woo_menu_remove_arrows',
                'type'      => 'checkbox',
            )
        )
    );

    */


}
add_action( 'customize_register', 'DW_theme_woo_customizer' );


// add frontend
function DW_customize_woo(){
    /* TODO (when needed) */
}
add_action( 'wp_head' , 'DW_customize_woo' );
