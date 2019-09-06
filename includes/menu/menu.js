

/**
 * Start Menu_Image for use in theme with description
 * original source https://github.com/zviryatko/menu-image/blob/master/menu-image.php
 */

/**
 * @package Menu_Image
 * @version 2.6.4
 * @licence GPLv2
 */
/*
Plugin Name: Menu Image
Plugin URI: http://html-and-cms.com/plugins/menu-image/
Description: Provide uploading images to menu item
Author: Alex Davyskiba aka Zviryatko
Version: 2.6.9
Author URI: http://makeyoulivebetter.org.ua/
*/
(function ($) {
	$(document).ready(function () {
		var menuImageUpdate = function( item_id, thumb_id, is_hover ) {
			wp.media.post( 'set-menu-item-thumbnail', {
				json:         true,
				post_id:      item_id,
				thumbnail_id: thumb_id,
				is_hover:			is_hover ? 1 : 0,
				_wpnonce:     menuImage.settings.nonce
			}).done( function( html ) {
				$('.menu-item-images', '#menu-item-' + item_id).html( html );
			});
		};

		$('#menu-to-edit')
			.on('click', '.menu-item .set-post-thumbnail', function (e) {
				e.preventDefault();
				e.stopPropagation();

				var item_id = $(this).parents('.field-image').siblings('input.menu-item-data-db-id').val(),
					is_hover = $(this).hasClass('hover-image'),
					uploader = wp.media({
						title: menuImage.l10n.uploaderTitle, // todo: translate
						button: { text: menuImage.l10n.uploaderButtonText },
						multiple: false
					}).on('select', function () {
						var attachment = uploader.state().get('selection').first().toJSON();
						menuImageUpdate( item_id, attachment.id, is_hover );
					}).open();
			})
			.on('click', '.menu-item .remove-post-thumbnail', function (e) {
				e.preventDefault();
				e.stopPropagation();

				var item_id = $(this).parents('.field-image').siblings('input.menu-item-data-db-id').val();
				menuImageUpdate( item_id, -1, $(this).hasClass('hover-image') );
			});
	});
})(jQuery);
/**
 * End Menu_Image for use in theme with description
 */
