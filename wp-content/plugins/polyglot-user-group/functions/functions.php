<?php
   
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