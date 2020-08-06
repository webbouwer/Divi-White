<?php
// Customizer Divi-White
// Divi White is a  child theme for the Divi Theme made by Elegant themes
// https://www.gavick.com/blog/using-javascript-theme-customization-screen
function DW_theme_customizer( $wp_customize ){

    global $themename;

    /* Enhanced panels */
    /*
    $wp_customize->add_panel('dw_custom', array(
        	'title'    => __('DW Global', $themename),
        	'priority' => 12,
    ));
    $wp_customize->add_section('dw_custom_header', array(
        	'title'    => __('DW Header Options', $themename),
        	'panel'  => 'et_divi_header_panel',
			'priority' => 99,
    ));
    */

    /* Header primairy panels */
    $wp_customize->add_section('dw_custom_header', array(
        	'title'    => __('DW Header options', $themename),
        	'panel'  => 'et_divi_header_panel',
			'priority' => 99997,
    ));


    /* add default header secondary display control */

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
                'section'   => 'dw_custom_header', //'et_divi_header_secondary',
                'settings'  => 'et_divi_header_secondary_display',
                'type'      => 'checkbox',
            )
        )
    );





    // active sections default menu links
    $wp_customize->add_setting( 'et_divi_header_fixed_section_links', array(
        'default'    => 0
    ) );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'et_divi_header_fixed_section_links',
            array(
                'label'     => __( 'Fixed menu page sections', $themename ),
                'section'   => 'dw_custom_header', //> 'et_divi_header_fixed',
                'settings'  => 'et_divi_header_fixed_section_links',
                'type'      => 'checkbox',
            )
        )
    );





    // add default header shadow control
    $wp_customize->add_setting( 'et_divi_header_bottomshadow_display', array(
        'default'    => 1
    ));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'et_divi_header_bottomshadow_display',
            array(
                'label'          => __( 'Header bottom shadow', $themename ),
                'section'   => 'dw_custom_header', // > 'dw_custom_header_primary_menu', //'et_divi_header_information',
                'settings'  => 'et_divi_header_bottomshadow_display',
                'type'      => 'checkbox',
            )
        )
    );

    /* Adding default menu dropdown options */
    $wp_customize->add_setting( 'et_divi_header_mainmenu_dropdown' , array(
		'default' => 'default',
        'priority' => '80',
		//'sanitize_callback' => 'onepiece_sanitize_default',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'et_divi_header_mainmenu_dropdown', array(
            'label'          => __( 'Custom dropdown', $themename ),
            'section'        => 'dw_custom_header', // > 'et_divi_header_primary',
            'settings'       => 'et_divi_header_mainmenu_dropdown',
            'type'           => 'select',
 	    	'description'    => __( 'Select primary menu dropdown type', $themename ),
            'choices'        => array(
                	'default'   => __( 'Default', $themename ),
                	'pointer'   => __( 'Pointer block', $themename ),
                	'horizontal'   => __( 'Horizontal Menu', $themename ),
            )
    	)));

    // height distance
            $wp_customize->add_setting( 'et_divi_header_mainmenu_topmargin' , array(
		'default' => 8,
        'priority' => '81',
		//'sanitize_callback' => 'onepiece_sanitize_default',
    	));

    $wp_customize->add_control( 'et_divi_header_mainmenu_topmargin', array(
  'type' => 'range',
  'section' => 'dw_custom_header',
  'label' => __( 'Submenu top margin' ),
  //'description' => __( 'Determine submenu top border and pointer weight.' ),
  'input_attrs' => array(
    'min' => -50,
    'max' => 100,
    'step' => 1,
  ),
) );

    // top weight
        $wp_customize->add_setting( 'et_divi_header_mainmenu_topweight' , array(
		'default' => 3,
        'priority' => '81',
		//'sanitize_callback' => 'onepiece_sanitize_default',
    	));

    $wp_customize->add_control( 'et_divi_header_mainmenu_topweight', array(
  'type' => 'range',
  'section' => 'dw_custom_header',
  'label' => __( 'Submenu top pointer weight' ),
  //'description' => __( 'Determine submenu top border and pointer weight.' ),
  'input_attrs' => array(
    'min' => 1,
    'max' => 20,
    'step' => 1,
  ),
) );

       // rounded corners
        $wp_customize->add_setting( 'et_divi_header_mainmenu_submenuradius' , array(
		'default' => 3,
        'priority' => '83',
		//'sanitize_callback' => 'onepiece_sanitize_default',
    	));

    $wp_customize->add_control( 'et_divi_header_mainmenu_submenuradius', array(
  'type' => 'range',
  'section' => 'dw_custom_header',
  'label' => __( 'Submenu rounded corners' ),
  //'description' => __( 'Determine submenu top border and pointer weight.' ),
  'input_attrs' => array(
    'min' => 0,
    'max' => 100,
    'step' => 1,
  ),
) );

    /* Adding default menu dropdown style colors */
    $wp_customize->add_setting( 'et_divi_header_mainmenu_base_color' , array(
		'default' => 'rgba(46,163,242,0.83)',
        'priority' => '81',
		//'sanitize_callback' => 'onepiece_sanitize_default',
    	));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'et_divi_header_mainmenu_base_color', array(
		'label' => __( 'Custom dropdown top color', $themename ),
		 'section' => 'dw_custom_header', // > 'et_divi_header_primary',
		'settings' => 'et_divi_header_mainmenu_base_color',
        'show_opacity' => true,
    ) ) );

    /* Adding default menu dropdown style colors */
    $wp_customize->add_setting( 'et_divi_header_mainmenu_optionbg_color' , array(
		'default' => 'rgba(46,163,242,0.83)',
        'priority' => '81',
		//'sanitize_callback' => 'onepiece_sanitize_default',
    	));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'et_divi_header_mainmenu_optionbg_color', array(
		'label' => __( 'Custom dropdown option bg color', $themename ),
		 'section' => 'dw_custom_header', // > 'et_divi_header_primary',
		'settings' => 'et_divi_header_mainmenu_optionbg_color',
        'show_opacity' => true,
    ) ) );



    // set default mobile menu breakpoint
    $wp_customize->add_setting( 'et_divi_mobile_menu_breakpoint', array(
        'default'    => 981
    ));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'et_divi_mobile_menu_breakpoint',
            array(
                'label'       => __( 'Responsive breakpoint', $themename ),
                'description' => __( 'Max. width for mobile menu display', $themename ),
                'section'   => 'et_divi_general_layout',
                'settings'  => 'et_divi_mobile_menu_breakpoint',
                'type'      => 'text',
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


/* global custom vars */
$menuswitchwidth = get_theme_mod('et_divi_mobile_menu_breakpoint', 981 ); //1028;
$menubelowfirstsection = get_theme_mod('et_divi_header_element_position_firstsection', 0 );

// add frontend
function DW_customize_adaptive(){
    // start output css ?>
    <style>
        <?php if( get_theme_mod('et_divi_header_mainmenu_dropdown', 'default' ) == 'pointer' ){ ?>

        <?php
        // main header dropdown menu
        ?>
        }
        /* Main nav */
        #et-top-navigation nav ul > li.menu-item-has-children,
        #et-top-navigation nav ul > li.menu-item-has-children > a
        {
            padding-right: 0px !important;
        }

        #et-top-navigation nav #top-menu .menu-item-has-children > a:after{
            content:"";
        }
        #et-top-navigation nav > ul > li.menu-item-has-children
        {
            padding-right: 0px !important;
        }
        #et-top-navigation nav > ul li,
        .et_pb_button,
        #et-top-navigation nav > ul > li > ul > li,
        .et_mobile_menu li a
        {
            /*padding-right: 0px !important;
            font-weight:400 !important;
            letter-spacing:0.04em;*/
        }




        #et-top-navigation nav > ul > li > ul
        {

            border-top: <?php echo get_theme_mod('et_divi_header_mainmenu_topweight', 3 );   ?>px solid <?php echo get_theme_mod('et_divi_header_mainmenu_base_color', 'rgba(46,163,242,0.83)' );   ?>;
            margin-top: <?php echo get_theme_mod('et_divi_header_mainmenu_topmargin', 8 );   ?>px;
            margin-left: -95px;

            border-radius:<?php echo get_theme_mod('et_divi_header_mainmenu_submenuradius', 3 );   ?>px;
        }

        #et-top-navigation nav > ul > li > ul li ul
        {
            border-top: <?php echo get_theme_mod('et_divi_header_mainmenu_topweight', 3 );   ?>px solid <?php echo get_theme_mod('et_divi_header_mainmenu_base_color', 'rgba(46,163,242,0.83)' );   ?>;
            margin-top: -<?php echo (get_theme_mod('et_divi_header_mainmenu_topweight', 3 ) - get_theme_mod('et_divi_header_mainmenu_submenuradius', 3 ) ); ?>px;
            border-radius:<?php echo get_theme_mod('et_divi_header_mainmenu_submenuradius', 3 );   ?>px;
        }

        <?php $fixedheight = get_theme_mod('et_divi_minimized_menu_height', 40 ); ?>

        .et-fixed-header #et-top-navigation nav > ul > li > ul
        {
            margin-top: <?php echo get_theme_mod('et_divi_header_mainmenu_topmargin', 8 ) + ($fixedheight / 5);   ?>px;  /* header height percentage */
        }

        #et-top-navigation nav > ul > li > ul > li.current-menu-item a,
        #et-top-navigation nav > ul > li > ul > li a:hover
        {
            background-color:<?php echo get_theme_mod('et_divi_header_mainmenu_optionbg_color', 'rgba(46,163,242,0.83)' ); ?>;
        }



        <?php $size = get_theme_mod('et_divi_header_mainmenu_topweight', 3 ) * 3;   ?>
        #et-top-navigation nav > ul > li > ul:after {
            position: absolute;
            left: 50%;
            margin-left: -<?php echo $size;  ?>px;
            top: -<?php echo $size;  ?>px;
            width: 0;
            height: 0;
            content:'';
            border-left: <?php echo $size;  ?>px solid transparent;
            border-right: <?php echo $size;  ?>px solid transparent;
            border-bottom: <?php echo $size;  ?>px solid <?php echo get_theme_mod('et_divi_header_mainmenu_base_color', 'rgba(46,163,242,0.83)' );  ?>;
        }


        <?php }else if( get_theme_mod('et_divi_header_mainmenu_dropdown', 'default' ) == 'horizontal' ){ ?>


        <?php $size = get_theme_mod('et_divi_header_mainmenu_topweight', 3 ) * 3;   ?>
        <?php $fixedheight = get_theme_mod('et_divi_minimized_menu_height', 40 ); ?>
            /* primary menu sub levels horizontal */
            .nav li ul {
                visibility: hidden;
                z-index: 9999;
                position: fixed;
                width: 100vw;
                left: 0;
                padding: <?php echo $fixedheight / 5; ?>px 0px;
                text-align: center !important;
                border-top: <?php echo $size;  ?>px solid <?php echo get_theme_mod('et_divi_header_mainmenu_base_color', 'rgba(46,163,242,0.83)' );  ?>;
                background-color: <?php get_theme_mod('et_divi_header_primary_nav_dropdown_bg', 'transparent'); ?>;
                box-shadow: none;
            }
            .nav li.et-reverse-direction-nav li ul {
                right: 0;
                top: auto;
                /* background: #bae1fc; */
            }
            #top-menu li li a {
                width: 100%;
                color: <?php get_theme_mod('et_divi-primary_nav_dropdown_link_color', 'black'); ?>;
            }
        <?php } ?>

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

        #top-menu-nav li.current_page_item  > a
        {
            color:<?php echo get_theme_mod('et_divi_fixed_menu_link_active', 'rgba(46,163,242,0.83)' ); ?> !important;
        }

        <?php if( is_front_page() && get_theme_mod('et_divi_header_fixed_section_links', 0 ) == '1' ){ ?>
        #top-menu-nav li.current-menu-item > a
        {
            color:<?php echo get_theme_mod('et_divi_fixed_menu_link_active', 'rgba(46,163,242,0.83)' ); ?> !important;
        }
         <?php } ?>
    </style>
    <?php // end output css ?>
    <script>


        jQuery(function ($) {
            $(document).ready( function(){


                <?php if( is_front_page() && get_theme_mod('et_divi_header_fixed_section_links', 0 ) == '1' ){ ?>

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
