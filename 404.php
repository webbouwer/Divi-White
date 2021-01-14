<?php get_header(); ?>

<div id="main-content">
    <div class="container">
        <div id="content-area" class="clearfix">
            <div id="left-area">
                <article id="post-0" <?php post_class( 'et_pb_post not_found' ); ?>>
                    <h3 style="font-size:2em;font-weight:bold;">Whooooooops!</h3>
                    <h1 style="font-size:3em;font-weight:bold;">That's a 404 :(</h1>
                    <p>Also called a '<?php esc_html_e('Page Not Found','Divi'); ?>' error; <?php esc_html_e('Looks like the page you navigated to does is not here (anymore).', 'Divi'); ?></p>
                    <h4><?php esc_html_e('Please navigate back or try a search for the subject you ended up here for.', 'Divi'); ?></h4>
                </article> <!-- .et_pb_post -->
            </div> <!-- #left-area -->

            <?php get_sidebar(); ?>
        </div> <!-- #content-area -->
    </div> <!-- .container -->
</div> <!-- #main-content -->
