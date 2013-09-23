<?php

/**
 * admin class for user Profile Group
 */
class adminUserGroup
{

    function __construct()
    {
        ;
    }

    /**
     * add polyglot_user_group_admin to wordPess admin
     */
    function wp_add_polyglot_user_group_admin()
    {
        if (function_exists('add_options_page')) {
            //add_options_page($page_title, $menu_title, $capability, $menu_slug, $function);
            add_options_page('Страница настроек моего плагина', 'Polyglot User Groups', 'manage_options', 'MypluginUniqIdentifictor', array($this, 'wp_polyglot_user_page'));
        }
    }

    function wp_polyglot_user_page()
    {
        include( PUG_PLUGIN_DIR.'/frontend/wp.edit.users.group.php' );
        showAddGroup();
    }

}

?>