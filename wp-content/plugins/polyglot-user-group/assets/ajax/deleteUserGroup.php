<?php
require_once("../../../../../wp-config.php");

global $wpdb; // this is how you get access to the database
$table = $wpdb->prefix.'user_group';

$groupIds = $_POST['groupIds'];

if($groupIds!=''){
    $query = "DELETE FROM ".$table." WHERE id IN(".$groupIds.")";
    $wpdb->query($query);
}
die();

