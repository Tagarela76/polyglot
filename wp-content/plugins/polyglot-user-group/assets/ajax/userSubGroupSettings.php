<?php

require_once("../../../../../wp-config.php");

global $wpdb; // this is how you get access to the database
$table = $wpdb->prefix.'users_subgroup';

$action = $_POST['action'];

switch($action){
    case 'add_sub_group':
        $groupId = $_POST['groupId'];
        $description = $_POST['description'];
        
        $data = array(
            'description' => $description,
            'group_id' => $groupId
        );
        if (!is_null($description)) {
            $wpdb->insert($table, $data);
        }
        break;
    case 'delete_sub_groups':
        $groupIds = $_POST['groupIds'];

        if($groupIds!=''){
            $query = "DELETE FROM ".$table." WHERE id IN(".$groupIds.")";
            $wpdb->query($query);
        }
        
        break;
    default :
        echo 'error action'; die();
        break;
}
die();