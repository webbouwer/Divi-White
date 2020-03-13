<?php
function DW_customize_adaptive_css(){
?>
<style>

        <?php  //header below first section
            if( ( get_theme_mod('et_divi_header_element_position_firstsection', 0 ) === true || get_theme_mod('et_divi_header_element_position_section_id', '' ) !== '' )  ){
        ?>

            body.home  #main-header, body.home #main-header .container { padding-top:0px !important; top:0px !important; }

            body.home  #page-container header#main-header {
                /*position:fixed !important;*/
            }

            body.home  #page-container header#main-header.belowtopsection {
                position:relative !important;
            }

                body.home header#main-header.belowtopsection ul.sub-menu {
                    margin-top:-180%;
                    margin-left:-10px;
                }


        <?php
            } // end first section
        ?>


            /* Set main top padding
            body.home  #main-header, body.home #main-header .container { padding-top:0px !important; top:0px !important; }

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



        /* Fix centered logotop height */
        li.centered-inline-logo-wrap img#logo
        {
            margin-top:-64px;
        }

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


         /*
         * Size mobile menu
         */
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

        /*
         * Make mobile menu sticky
         */
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

<?php
}

add_action( 'wp_head' , 'DW_customize_adaptive_css' );
?>
