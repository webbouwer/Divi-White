<?php
function DW_customize_adaptive_css(){
?>
<style>

    <?php
        $menuswitchwidth = get_theme_mod('et_divi_mobile_menu_breakpoint', 981 ); //1028;
    ?>

        <?php  //header below first section
            if( get_theme_mod('et_divi_header_element_position_firstsection', 0 ) === true  ){
        ?>

            body.home  #main-header, body.home #main-header .container {
                padding-top:0px !important;
                top:0px !important;
                -webkit-transition: all 1s ease-in-out;
                -moz-transition: all 1s ease-in-out;
                -o-transition: all 1s ease-in-out;
                transition: all 1s ease-in-out;
            }

            body.home  #page-container header#main-header {
                /*position:fixed !important;*/
            }

            /* test for fixed menu base css */
            body.home  #page-container header#main-header ul > li > a {
                /*position:fixed !important;*/
                padding-bottom:0px;
            }

            body.home  #page-container header#main-header.belowtopsection {
                position:relative !important;
            }
            /*
                body.home header#main-header.belowtopsection ul.sub-menu {
                    margin-top:-180%;
                    margin-left:-10px;
                }
            */



        <?php
            } // end first section
        ?>



    body.home li.centered-inline-logo-wrap
    {
        display: inline-block;
        vertical-align: bottom;
        margin-bottom:-80px;
        margin-top:-40px;

    }

    body.home li.centered-inline-logo-wrap .logo_container
    {
        padding-bottom:0px !important;
    }
    body.home li.centered-inline-logo-wrap .logo_container a {
    }
    body.home li.centered-inline-logo-wrap .logo_container #logo {
        padding-bottom:0px !important;
    }



    body.home #main-header:not(.et-fixed-header) li.centered-inline-logo-wrap{
    }
    body.home .et-fixed-header li.centered-inline-logo-wrap  {
        display: inline-block;
        vertical-align: bottom;
        padding-top:0px !important;
        padding-bottom:0px !important;
    }
    body.home .et-fixed-header li.centered-inline-logo-wrap .logo_container a {
        position:relative;
    }
    body.home  .et-fixed-header li.centered-inline-logo-wrap .logo_container #logo {
        margin-bottom:-10px;
        margin-top:-55px;
        max-width:120%;
    }


    /*
    body.home li.centered-inline-logo-wrap .logo_container
    {
        display: block;
        vertical-align: middle;
    }
    body.home .et-fixed-header li.centered-inline-logo-wrap .logo_container {
    }
    body.home li.centered-inline-logo-wrap .logo_container #logo {
        background-color:red;
    }
    body.home  .et-fixed-header li.centered-inline-logo-wrap .logo_container #logo {
        background-color:green;
    }
    */

    /*
    body.home li.centered-inline-logo-wrap .logo_container
    {
        vertical-align:text-top;
        margin-top:0;
        margin-bottom:0;
        background-color:red;
    }

    body.home .et-fixed-header li.centered-inline-logo-wrap
    {
        margin:-33px 0;
        -webkit-transition:all .4s ease-in-out;
        transition:all .4s ease-in-out;
        height:100%;
    }
    body.home .et-fixed-header li.centered-inline-logo-wrap .logo_container
    {
        margin-top:0;
        margin-bottom:0;
        background-color:green;
    }

    body.home .et-fixed-header li.centered-inline-logo-wrap .logo_container img#logo
    {
        margin-top:0;
        margin-bottom:0;
    }
    */

    /* Set main top padding
    body.home  #main-header, body.home #main-header .container
    {
    padding-top:0px !important; top:0px !important;
    }

    @media (min-width: 981px) {

    body.home #page-container { padding-top:0px !important; }

            body.home  .et_pb_section:first{
            }
            body.home  #page-container header#main-header {
                position:relative !important;
            }
            body.home  #page-container header#main-header.sticktotop {
                position:fixed !important;
            }
        }
        */

        /* Fix centered logotop height
        li.centered-inline-logo-wrap img#logo
        {
            margin-top:-64px;
        }
        */

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

        /* Setting the breakpoint of the mobile menu */
        @media only screen and ( max-width: <?php echo $menuswitchwidth; ?>px ) {
        #top-menu-nav, #top-menu {display: none;}
        #et_top_search {display: none;}
        #et_mobile_nav_menu {display: block;}
        }


         /*
         * Size mobile menu
         */
        @media (max-width: <?php echo $menuswitchwidth; ?>px ) {
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

        /*
         * Make mobile menu sticky
         */
        <?php if( get_theme_mod('et_divi_mobile_menu_sticky', '1' ) == '1' ){ ?>
        @media (max-width: <?php echo $menuswitchwidth; ?>px ) {
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
        @media (min-width: <?php echo $menuswitchwidth; ?>px ){
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

<?php
}

add_action( 'wp_head' , 'DW_customize_adaptive_css' );
?>
