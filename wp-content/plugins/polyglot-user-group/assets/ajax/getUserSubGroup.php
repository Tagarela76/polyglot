<?php
require_once("../../../../../wp-config.php");

global $wpdb; // this is how you get access to the database
$table = $wpdb->prefix.'users_subgroup';

$groupId = $_POST['groupId'];

if(isset($groupId)){
    $results = $wpdb->get_results( "SELECT * FROM ".$table." WHERE group_id=".$groupId, ARRAY_A);
    if (!empty($results)) {
        $html = '<tr class="active" >
                <td width="10%">
                    select
                </td>
                <td width="10%">
                    Sub Group ID
                </td>
                <td width="80%">
                    Sub Group Name
                </td>
            </tr>';
        foreach ($results as $result) {
            $html.='<tr class="success">
            <td width="10%">
                <input type=\'checkbox\' id="sub_group_' . $result['description'] . '"
                       value="' . $result['id'] . '">
            </td>
            <td width="10%">
                ' . $result['id'] . '
            </td>
            <td width="80%">
                ' . $result['description'] . '
            </td>
        </tr>';
        }
    }else{
        $html = "No sub groups! Please add some!";
    }
    echo $html;
}
die();

