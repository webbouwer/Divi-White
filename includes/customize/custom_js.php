<?php
function DW_customize_adaptive_js(){
?>
    <script>

        jQuery(function ($) {

             $(document).ready( function(){

                /* Divi centered logo
                $('#top-menu li.centered-inline-logo-wrap').addClass('menu-item');
                $('#top-menu li.centered-inline-logo-wrap .logo_container').addClass('nav-item-box');
                $('#top-menu li.centered-inline-logo-wrap .logo_container a').addClass('menu-image-textwrap');
                $('#top-menu li.centered-inline-logo-wrap .logo_container a img#logo').addClass('menu-image');
                */

                <?php
                $menuswitchwidth = get_theme_mod('et_divi_mobile_menu_breakpoint', 981 );

                /* move header below first section */
                if( get_theme_mod('et_divi_header_element_position_firstsection', false ) === true){
                ?>

                    //var sectionTopPadding = $('body.home .et_pb_section:first').css('padding-top');

                    function headerBelowTopSection(){

                        var targetsection = $('body.home .et_pb_section:first');
                        var targetsectionheight = $('body.home .et_pb_section:first').height();
                        var headerHeight = $("body.home #main-header").outerHeight();
                        var topFixHeight = 0;
                        if ($('body.home #top-header').length > 0 ) {
                            topFixHeight = topFixHeight + $('body.home #top-header').outerHeight();
                        }
                        var adminbarHeight = 0;
                        if ($('body.home #wpadminbar').length > 0 ) {
                            adminbarHeight = $('body.home #wpadminbar').outerHeight();
                        }

                        if( $(window).width() > <?php echo $menuswitchwidth; ?> ){

                            $('body.home #page-container').css({ 'padding-top': topFixHeight });
                            targetsection.css({ 'padding-top': 0 });
                            $("body.home #main-header").insertAfter( targetsection );
                            $('body.home #main-header').addClass('belowtopsection');


                            $(window).bind('scroll', function() {

                                targetsectionheight = $('body.home .et_pb_section:first').height();
                                headerHeight = $("body.home #main-header").outerHeight();
                                if ($(window).scrollTop() > targetsectionheight + headerHeight ) {
                                    $('body.home #page-container').css({ 'padding-top': 0 });
                                    targetsection.css({ 'padding-top': (headerHeight + topFixHeight) });
                                    $("body.home #main-header").insertBefore( targetsection );
                                    $('body.home #main-header').css({ 'margin-top': topFixHeight + adminbarHeight }).removeClass('belowtopsection');
                                }else{
                                    if( $(window).width() > <?php echo $menuswitchwidth; ?> ){
                                        $('body.home #page-container').css({ 'padding-top': topFixHeight });
                                        targetsection.css({ 'padding-top': 0 });
                                        $("body.home #main-header").insertAfter( targetsection );
                                        $('body.home #main-header').css({ 'margin-top': 0 }).addClass('belowtopsection');
                                    }
                                }
                            });


                        }else{

                            $('body.home #page-container').css({ 'padding-top': 0 });
                            targetsection.css({ 'padding-top': (headerHeight + topFixHeight) });
                            $("body.home #main-header").insertBefore( targetsection );
                            $('body.home #main-header').css({ 'margin-top': topFixHeight }).removeClass('belowtopsection');

                        }

                    }

                    headerBelowTopSection();

                    var resizeId;
                    $(window).resize(function() {
                      clearTimeout(resizeId);
                      resizeId = setTimeout(headerBelowTopSection, 20);
                    });

                <?php
                } // end first section */
                ?>



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

        /*
        (function(){
            // Override the addClass to prevent fixed header class from being added
            var addclass = jQuery.fn.addClass;
            jQuery.fn.addClass = function(){
                var result = addclass.apply(this, arguments);
                    jQuery('#main-header').removeClass('et-fixed-header');
                return result;
            }
        })();
        jQuery(function($){
            $('#main-header').removeClass('et-fixed-header');
        });
        */



    </script>

    <?php // end output js
}
add_action( 'wp_head' , 'DW_customize_adaptive_js' );
?>
