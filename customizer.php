<?php
// Customizer Divi-White
// Divi White is a  child theme for the Divi Theme made by Elegant themes
// https://www.gavick.com/blog/using-javascript-theme-customization-screen
function DW_theme_customizer( $wp_customize ){

    global $themename;

    /* Enhanced panels */

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


// add frontend
function DW_customize_adaptive(){
    // start output css ?>
    <style>

        <?php if( get_theme_mod('et_divi_header_secondary_display', '1' ) != '1' ){ ?>
        /* remove header secondary menubar */
        #top-header
        {
        display:none !important;
        }
        <?php } ?>


        <?php if( get_theme_mod('et_divi_header_bottomshadow_display', '1' ) != '1' ){ ?>
        /* remove header bottom shadow  */
        header#main-header.et-fixed-header, #main-header
        {
            -webkit-box-shadow:none !important;
            -moz-box-shadow:none !important;
            box-shadow:none !important;
        }
        <?php } ?>


        /* Mobile menu */
        @media (max-width: 980px) {
         .container.et_menu_container {
         width: calc( 100% - 60px);
         }
        }
        .et_mobile_menu {
         margin-left: -30px;
         padding: 5%;
         width: calc( 100% + 60px);
        }
        .mobile_nav.opened .mobile_menu_bar:before {
         content: "\4d";
        }


        <?php if( get_theme_mod('et_divi_mobile_menu_sticky', '1' ) == '1' ){ ?>
        @media (max-width: 980px) {
        .et_non_fixed_nav.et_transparent_nav #main-header, .et_non_fixed_nav.et_transparent_nav #top-header, .et_fixed_nav #main-header, .et_fixed_nav #top-header {
            position: fixed;
        }
        }
        .et_mobile_menu {
            overflow: scroll !important;
            max-height: 82vh;
        }
        <?php } ?>



        <?php if( get_theme_mod('et_divi_blog_settings_sidebar_display', '1' ) != '1' ){ ?>
        /* remove sidebars */
        #main-content .container:before {
            background: none;
        }
        @media (min-width: 981px){
        #left-area {
            min-width: 100%;
            width: 100%;
            padding: 23px 0px 0px !important;
            margin:0px;
            float: none !important;
        }
        }
        #sidebar {
            display:none;
        }
        <?php } ?>



        <?php if( get_theme_mod('et_divi_footer_elements_sticky', '1' ) == '1' ){ ?>
        /* Footer */
        #page-container {
          display: -webkit-box;
          display: -ms-flexbox;
          display: flex;
          -ms-flex-flow: column;
          flex-flow: column;
          min-height: 100vh;
        }
        #et-main-area {
          display:-webkit-box;
          display:-ms-flexbox;
          display:flex;
          -ms-flex-flow: column;
          flex-flow: column;
        }
        #et-main-area, #main-content  {
          -webkit-box-flex: 1 0 auto;
          -ms-flex: 1 0 auto;
          flex: 1 0 auto;
        }


        <?php } ?>


    </style>
    <?php // end output css ?>
    <script>


        jQuery(function ($) {
            $(document).ready( function(){

                <?php if( get_theme_mod('et_divi_header_fixed_section_links', 0 ) == '1' ){ ?>

				$(window).load(function(){
                    setPageActiveMenuLink();
                });
                // Scroll Innit
				$(window).scroll(function(){
                    setPageActiveMenuLink();
                });
                $(window).onresize(function(){
                    setPageActiveMenuLink();
                 });
                function setPageActiveMenuLink(){
                    var navlinks = $('#top-menu-nav ul li a');
                    var sections = $('.et_pb_section');  //var rows = $('.et_pb_row');
                    var currentScrollPos = $(this).scrollTop();

                    var mh =  $('#main-header').height() + $('#top-header').height();
                      sections.each(function() {
                        var self = $(this);
                        if (self.offset().top <= (currentScrollPos + mh + (self.outerHeight()/10) ) && (currentScrollPos + mh ) <= (self.offset().top + self.outerHeight() + (self.outerHeight()/10) )) {
                            var targetName = '#'+self.attr('id');
                            navlinks.parent().removeClass('current-menu-item'); // 'current_page_item'
                            $('a[href$='+targetName+']').parent().addClass('current-menu-item');
                            $('a[href$='+targetName+']').parent().parent().parent().parent().find('>li').addClass('current-menu-item');
                        }

                        if( currentScrollPos <= mh ){
                            navlinks.parent().removeClass('current-menu-item');
                            $('#top-menu-nav ul li a').first().parent().addClass('current-menu-item');
                        }
                     });

                 }

                <?php } ?>

			});
        });
    </script>

    <?php // end output js
}
add_action( 'wp_head' , 'DW_customize_adaptive' );

// default sanitize function
function DW_sanitize_default($obj){
    //.. global sanitizer
    return $obj;
}
