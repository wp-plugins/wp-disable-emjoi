<?php
/**
 * Plugin Name: WP Disable Emjoi
 * Plugin URI:  http://xiedexu.cn/wp-disable-emjoi.htm
 * Description: Emoji 的实现方式会调用 http://s.w.org/images/core/emoji/72x72/ 下的图片来渲染 Emoji，而这个地址是国内(China)访问不了的，所以要禁用 WordPress Emoji 功能。
 * Version: 1.0
 * Author: iOpenV
 * Author URI: http://www.iopenv.com/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );