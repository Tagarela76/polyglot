<?php
/*require_once("../../../../../wp-config.php");

global $wpdb; // this is how you get access to the database

$action = $_POST['action'];
$subGroupMenu = $wpdb->prefix.'sub_group_menu_settings';

if ($action == 'getSubGroupList') {
    $table = $wpdb->prefix.'users_subgroup';
    //get Sub Groups
    $selectedMenuItems = $wpdb->get_results("SELECT menu_settings FROM " . $subGroupMenu . " WHERE group_id=" . $groupId, ARRAY_A);
    
    //var_dump($selectedMenuItems);die();
    $groupId = $_POST['groupId'];
    $results = $wpdb->get_results("SELECT * FROM " . $table . " WHERE group_id=" . $groupId, ARRAY_A);

    $html = '';
    foreach ($results as $result) {
        $html.="<option value='" . $result['id'] . "'>";
        $html.= $result['description'];
        $html.="</option>";
    }

    echo $html;
    die();
}

if ($action == 'saveUserGroupMenuSettings') {
    $table = $wpdb->prefix.'sub_group_menu_settings';
    $subGroupId = $_POST['subGroupId'];
    $menuSettings = $_POST['menuItems'];
    
    $data = array(
        'sub_group_id' => $subGroupId,
        'menu_settings'=> $menuSettings
    );
        $wpdb->insert($table, $data);
}*/
?>