<?php

/* Woocommerce plugin theme customizer options */




function DW_theme_woo_customizer( $wp_customize ){

  if( is_woocommerce_active() ){

    global $themename;

      /* TODO (when needed) */
      // Woocommerce Divi White panels
      $wp_customize->add_section('dw_custom_woo', array(
          	'title'    => __('Divi White options', $themename),
          	'panel'  => 'woocommerce',
  			    'priority' => 99,
      ));


      // remove menu option dropdown arrows
      $wp_customize->add_setting( 'et_divi_woo_menu_remove_sidebar', array(
          'default'    => 1,
          'priority' => 1,
      ) );
      $wp_customize->add_control(
          new WP_Customize_Control(
              $wp_customize,
              'et_divi_woo_menu_remove_sidebar',
              array(
                  'label'     => __( 'Display product sidebar', $themename ),
                  'section'   => 'dw_custom_woo', //> 'et_divi_header_fixed',
                  'desc'   => __( 'Display sidebar on product pages', $themename ),
                  'settings'  => 'et_divi_woo_menu_remove_sidebar',
                  'type'      => 'checkbox',
              )
          )
      );

      // remove menu option dropdown arrows
      $wp_customize->add_setting( 'et_divi_woo_menu_remove_arrows', array(
          'default'    => 1,
          'priority' => 1,
      ) );
      $wp_customize->add_control(
          new WP_Customize_Control(
              $wp_customize,
              'et_divi_woo_menu_remove_arrows',
              array(
                  'label'     => __( 'Display arrows', $themename ),
                  'section'   => 'dw_custom_header', //> 'et_divi_header_fixed',
                  'desc'   => __( 'Remove or display mainmenu option arrows', $themename ),
                  'settings'  => 'et_divi_woo_menu_remove_arrows',
                  'type'      => 'checkbox',
              )
          )
      );

    } // end woocheck
}
add_action( 'customize_register', 'DW_theme_woo_customizer' );


// add frontend
function DW_customize_woo(){
  if( is_woocommerce_active() ){
    /* TODO (when needed) */
    /* Note:
     * Divi > Theme Options > General Settings and
     * set the "Shop Page & Category Page Layout for WooCommerce" to "Full Width".
     */
    if( get_theme_mod('et_divi_woo_menu_remove_sidebar', 1 ) == 0 ){
      remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar',10);
    ?>
    <style>
    /* woocommerce hide sidebar */
    body.single-product #main-content .container:before {
    display: none;
    }
    body.single-product #content-area #left-area {
    width: 100%;
    padding-right:0!important;
    }
    body.single-product #sidebar {
      display: none;
    }
    </style>
  <?php } // end hide-sidebar css
  }
}
add_action( 'wp_head' , 'DW_customize_woo' );
