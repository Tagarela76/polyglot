<?php
require_once("../../../../../wp-config.php");

global $wpdb; // this is how you get access to the database
$table = $wpdb->prefix.'user_group';

$description = $_POST['description'];

$data = array(
    'description' => $description
);
if (!is_null($description)) {
    $wpdb->insert($table, $data);
}
die();

