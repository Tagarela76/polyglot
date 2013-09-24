<?php
   
function polyglotUserGroupStylesInit() {
    
    //wp_register_style('bootstrap.css', WP_PLUGIN_DIR.'/assets/css/bootstrap.css');
    wp_register_style('bootstrap.css', PUG_PLUGIN_DIR.'/assets/css/bootstrap.css');
    wp_register_style('jquery-ui-1.8.2.custom.css', PUG_PLUGIN_DIR.'/assets/css/jquery-ui-1.8.2.custom.css');
    
    wp_enqueue_style('bootstrap',
                     WP_PLUGIN_URL.'/polyglot-user-group/assets/css/bootstrap.css',
                      false, false, 'all');
    
    wp_enqueue_style('jquery-ui-1.8.2.custom',
                     WP_PLUGIN_URL.'/polyglot-user-group/assets/css/jquery-ui-1.8.2.custom.css',
                      false, false, 'all');
    //add js
    wp_register_script('jquery', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery-1.4.2.min.js');
    wp_register_script('custom', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery-ui-1.8.2.custom.min.js');
    wp_register_script('widjet', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.widget.js');
    
    wp_register_script('addon', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery-ui-timepicker-addon.js');
    wp_register_script('bgiframe', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.bgiframe-2.1.1.js');
    wp_register_script('core', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.core.js');
    wp_register_script('mouse', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.mouse.js');
    wp_register_script('draggable', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.draggable.js');
    wp_register_script('position', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.position.js');
    wp_register_script('resizable', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.resizable.js');
    
    
    wp_register_script('dialog', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.dialog.js');
    wp_register_script('numeric', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.numeric.js');
    wp_register_script('addUserGroupDialog', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/addUserGroupDialog.js');
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom');
    wp_enqueue_script('widjet');
    wp_enqueue_script('addon');
    wp_enqueue_script('core');
    wp_enqueue_script('mouse');
    wp_enqueue_script('draggable');
    wp_enqueue_script('position');
    wp_enqueue_script('resizable');
    wp_enqueue_script('numeric');
    wp_enqueue_script('dialog');
    wp_enqueue_script('addUserGroupDialog');

}
//add_action('admin_init', 'polyglotUserGroupStylesInit');

/**
 * 
 * function for getting poliglot user group list
 * 
 * @global type $wpdb
 * @return \polyglotUserGroup[]
 */
function getPolyglotUserGroups()
{
    global $wpdb;
    
    $polyglotUserGroups = array();
    
    $results = $wpdb->get_results( "SELECT * FROM ".USER_GROUP_TABLE_NAME, ARRAY_A);
    
    foreach($results as $result){
        $polyglotUserGroup = new polyglotUserGroup();
        $polyglotUserGroup->initByArray($result);
        $polyglotUserGroups[] = $polyglotUserGroup;
    }
    
    
    return $polyglotUserGroups;
}
?>