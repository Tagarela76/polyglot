<?php

require_once("../../../../../wp-config.php");

global $wpdb; // this is how you get access to the database
$groupTable = $wpdb->prefix . 'user_group';
$tableLanguage = $wpdb->prefix.'term_taxonomy';
//get action
$action = $_POST['action'];

switch ($action) {
    //save new group
    case 'add_group':
        $description = $_POST['description'];
        $data = array(
            'description' => $description
        );
        if (!is_null($description)) {
            $wpdb->insert($groupTable, $data);
        }
        //create menu for 2 locations
        //get localization
        $results = $wpdb->get_results( "SELECT description FROM ".$tableLanguage." WHERE taxonomy='language'", ARRAY_A);
        foreach($results as $result){
            $menuName = $description."_".$result['description'];
            $menu_id = wp_create_nav_menu($menuName);
        }
        break;
    //delete user group
    case 'delete_groups':
        $groupIds = $_POST['groupIds'];
        if ($groupIds != '') {
            $query = "DELETE FROM " . $groupTable . " WHERE id IN(" . $groupIds . ")";
            $wpdb->query($query);
        }
        break;
    default :
        echo 'error action';
        die();
        break;
}
die();