<?php

function pug_register_settings() {
	register_setting( 'getUserGroupList', 'getUserGroupList' );
	
}
function getUserGroupList()
{
    //global $wpdb;
    //var_dump('sef');die();
}

if(is_admin()){
add_action('admin_init', 'pug_register_settings');
}
?>