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
     * 
     * function for activate user group plugin
     * create user_group table
     * 
     * @global type $wpdb
     */
    function wpActivateUserGroupPlugin()
    {
        global $wpdb;
        //create table
        $wpdb->query("CREATE TABLE IF NOT EXISTS `" . USER_GROUP_TABLE_NAME . "` (
                 `id` int(11) NOT NULL AUTO_INCREMENT,
                 `description` varchar(2000) CHARACTER SET utf8 NOT NULL,
                  UNIQUE KEY `id` (`id`)
                  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1");
    }

    /**
     * 
     * function for deactivate user group plugin
     * delete user_group table
     * 
     * @global type $wpdb
     */
    function wpDeactivateUserGroupPlugin()
    {
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS " . USER_GROUP_TABLE_NAME);
    }

    /**
     * add polyglot_user_group_admin to wordPess admin panel
     */
    function wpAddPolyglotUserGroupAdmin()
    {
        if (function_exists('add_options_page')) {
            add_options_page('Polyglot User Group Settings', 'Polyglot User Groups', 'manage_options', 'MypluginUniqIdentifictor', array($this, 'wpPolyglotUserGroupPageSettings'));
        }
    }

    function wpPolyglotUserGroupPageSettings()
    {
       include( PUG_PLUGIN_DIR.'/view/wp.edit.users.group.php' );
    }

}
?>