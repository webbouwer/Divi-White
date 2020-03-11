<?php
function DW_customize_adaptive_js(){
?>
    <script>

        jQuery(function ($) {

            $(document).ready( function(){

                <?php
                /* move header below first section */
                if( get_theme_mod('et_divi_header_element_position_firstsection', false ) === true ){
                ?>

                /**/
                var resizeId;
                $(window).resize(function() {
                  clearTimeout(resizeId);
                  resizeId = setTimeout(headerBelowSection, 20);
                });

                function headerBelowSection(){

                    var targetsection = $('body.home .et_pb_section:first');
                    var topFixHeight = 0;
                    if ($('body.home #top-header').length > 0 ) {
                        topFixHeight = topFixHeight + $('body.home #top-header').outerHeight();
                    }
                    var targetAddPadding = targetsection.css('padding-top');

                    var fullTopHeight = topFixHeight;
                    if ($('body.home #wpadminbar').length > 0 ) {
                        fullTopHeight = topFixHeight + $('body.home #wpadminbar').outerHeight();
                    }

                    var topAreaHeight = $('body.home .et_pb_section:first').outerHeight() + topFixHeight;// - $('body.home #main-header').height() + topFixHeight;
                    topAreaHeight = topAreaHeight + topFixHeight;

                    function header_relative(){
                        if( $(window).width() > 981 ){
                            $('body.home #main-header').css({ 'margin-top': 0 } );
                            $('body.home #main-header').removeClass('sticktotop');
                            $('body.home .et_pb_section:first').css({ 'padding-top': targetAddPadding } );
                        }
                    }

                    function header_fixed(){
                        if( $(window).width() > 981 ){
                            $('body.home #main-header').css({ 'margin-top': fullTopHeight  } );
                            $('body.home #main-header').addClass('sticktotop');
                            $('body.home .et_pb_section:first').css({ 'padding-top': $('body.home #main-header').outerHeight() + fullTopHeight } );
                        }
                    }




                    if( $(window).width() > 981 ){
                        targetsection.css({ 'margin-top': topFixHeight });
                        $("body.home #main-header").css({ 'position': 'relative' }).insertAfter( targetsection );
                        $(window).bind('scroll', function() {
                            if ($(window).scrollTop() > topAreaHeight ) {
                                header_fixed();
                            }else {
                                header_relative();
                            }
                        });
                    }else{
                        <?php if( get_theme_mod('et_divi_mobile_menu_sticky', '1' ) == '1' ){ ?>
                        $("body.home #main-header").css({ 'position': 'fixed' }).insertBefore( targetsection );
                        $('body.home  #main-header').css({ 'margin-top': fullTopHeight } );
                        $('body.home .et_pb_section:first').css({ 'margin-top': 0 } );
                        <?php }else{ ?>
                        $("body.home #main-header").css({ 'position': 'relative' }).insertBefore( targetsection );
                        $('body.home #page-container').css({ 'padding-top': topFixHeight } );
                        $('body.home #main-header').css({ 'margin-top': 0 } );
                        $('body.home .et_pb_section:first').css({ 'margin-top': 0 } );
                        <?php } ?>
                        /*
                        // not wide screen
                        $('body.home #main-header').css({ 'margin-top': 0  } );
                        $("body.home #main-header").css({ 'position': 'relative' }).insertBefore( targetsection );
                        $('body.home #main-header').removeClass('sticktotop');
                        $('.home.page #page-container').css({ 'padding-top': topFixHeight } );
                        $('.et_pb_section:first').css({ 'padding-top': 0 } );
                        */
                    }
                }
                headerBelowSection();

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
