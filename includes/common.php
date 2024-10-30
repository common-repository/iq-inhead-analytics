<?php
namespace IQA\Plugin;
/* 
 * Determine if user is logged in with admin rights.
 * Returns true or false. 
 *   
*/
function is_admin_logged_in(){
    $userInfo = wp_get_current_user();
    if (in_array( 'administrator', (array) $userInfo->roles)){
        return true;
    }
    return false;
}




