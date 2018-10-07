<?php
/*
Plugin Name: Sora_show_only_self_posts
Plugin URI: #
Description: 后台用户只显示自己的文章（管理员除外）
Version: 1.0
Author: Sora
Author URI: http://www.pinnpinn.com/sora/index.html
*/
function sora_show_only_self_posts($wp_query) {
	if(strpos($_SERVER['REQUEST_URI'],'/wp-admin/edit.php')!== false) {
		global $current_user;
		if(!in_array('administrator',$current_user->roles)) {
			$wp_query->set('author',$current_user->id);
		}
	}
}
add_filter('parse_query','sora_show_only_self_posts');
?>