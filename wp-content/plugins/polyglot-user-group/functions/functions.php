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
    
    //add js for dialog window
    //wp_register_script('jquery-1.9.1', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery-1.9.1.js');
    wp_register_script('core', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.core.js');
    wp_register_script('widget', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.widget.js');
    wp_register_script('mouse', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.mouse.js');
    wp_register_script('button', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.button.js');
    wp_register_script('draggable', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.draggable.js');
    wp_register_script('position', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.position.js');
    wp_register_script('resizable', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.resizable.js');
    wp_register_script('dialog', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.dialog.js');
    wp_register_script('effect', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/jquery.ui.effect.js');
    wp_register_script('addUserGroupDialog', WP_PLUGIN_URL.'/polyglot-user-group/assets/js/addUserGroupDialog.js');
    
    //wp_enqueue_script('jquery-1.9.1');
    wp_enqueue_script('core');
    wp_enqueue_script('widget');
    wp_enqueue_script('mouse');
    wp_enqueue_script('button');
    wp_enqueue_script('draggable');
    wp_enqueue_script('position');
    wp_enqueue_script('resizable');
    wp_enqueue_script('dialog');
    wp_enqueue_script('effect');
    wp_enqueue_script('addUserGroupDialog');

}


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

