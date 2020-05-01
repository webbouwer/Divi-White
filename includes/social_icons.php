<ul class="et-social-icons">

<?php if ( 'on' === et_get_option( 'divi_show_facebook_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-facebook">
		<a href="<?php echo esc_url( et_get_option( 'divi_facebook_url', '#' ) ); ?>" class="icon">
			<span><?php esc_html_e( 'Facebook', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>

<?php /* new linkedin icon */
    if ( 'on' === et_get_option( 'divi_show_linkedin_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-linkedin">
		<a href="<?php echo esc_url( et_get_option( 'divi_linkedin_url', '#' ) ); ?>" class="icon">
			<span><?php esc_html_e( 'Linkedin', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>

<?php /* new github icon */
    if ( 'on' === et_get_option( 'divi_show_github_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-github">
		<a href="<?php echo esc_url( et_get_option( 'divi_github_url', '#' ) ); ?>" class="icon">
			<span><?php esc_html_e( 'Github', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>


<?php /* new youtube icon */
    if ( 'on' === et_get_option( 'divi_show_youtube_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-youtube">
		<a href="<?php echo esc_url( et_get_option( 'divi_youtube_url', '#' ) ); ?>" class="icon">
			<span><?php esc_html_e( 'Youtube', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>

<?php /* new tumblr icon */
    if ( 'on' === et_get_option( 'divi_show_tumblr_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-tumblr">
		<a href="<?php echo esc_url( et_get_option( 'divi_tumblr_url', '#' ) ); ?>" class="icon">
			<span><?php esc_html_e( 'Tumblr', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>

<?php /* new skype icon */
    if ( 'on' === et_get_option( 'divi_show_skype_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-skype">
		<a href="<?php echo esc_url( et_get_option( 'divi_skype_url', '#' ) ); ?>" class="icon">
			<span><?php esc_html_e( 'Skype', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>

<?php /* new vimeo icon */
    if ( 'on' === et_get_option( 'divi_show_vimeo_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-vimeo">
		<a href="<?php echo esc_url( et_get_option( 'divi_vimeo_url', '#' ) ); ?>" class="icon">
			<span><?php esc_html_e( 'Vimeo', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>

<?php /* new pinterest icon */
    if ( 'on' === et_get_option( 'divi_show_pinterest_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-pinterest">
		<a href="<?php echo esc_url( et_get_option( 'divi_pinterest_url', '#' ) ); ?>" class="icon">
			<span><?php esc_html_e( 'Pinterest', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>

<?php /* original follow */
    if ( 'on' === et_get_option( 'divi_show_twitter_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-twitter">
		<a href="<?php echo esc_url( et_get_option( 'divi_twitter_url', '#' ) ); ?>" class="icon">
			<span><?php esc_html_e( 'Twitter', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>
<?php if ( 'on' === et_get_option( 'divi_show_google_icon', 'on' ) ) : ?>
	<li class="et-social-icon et-social-google-plus">
		<a href="<?php echo esc_url( et_get_option( 'divi_google_url', '#' ) ); ?>" class="icon">
			<span><?php esc_html_e( 'Google', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>
<?php $et_instagram_default = ( true === et_divi_is_fresh_install() ) ? 'on' : 'false'; ?>
<?php if ( 'on' === et_get_option( 'divi_show_instagram_icon', $et_instagram_default ) ) : ?>
	<li class="et-social-icon et-social-instagram">
		<a href="<?php echo esc_url( et_get_option( 'divi_instagram_url', '#' ) ); ?>" class="icon">
			<span><?php esc_html_e( 'Instagram', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>
<?php if ( 'on' === et_get_option( 'divi_show_rss_icon', 'on' ) ) : ?>
<?php
	$et_rss_url = '' !== et_get_option( 'divi_rss_url' )
		? et_get_option( 'divi_rss_url' )
		: get_bloginfo( 'rss2_url' );
?>
	<li class="et-social-icon et-social-rss">
		<a href="<?php echo esc_url( $et_rss_url ); ?>" class="icon">
			<span><?php esc_html_e( 'RSS', 'Divi' ); ?></span>
		</a>
	</li>
<?php endif; ?>

</ul>
