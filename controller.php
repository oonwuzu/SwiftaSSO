<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
session_start();

function connectToDatabase() {
    include("config.php");

    $email_address = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $result = array();

    $select_query = "select * from logindetails where lower(username) = '" . strtolower($email_address) . "' and lower(password) = '" . strtolower($password) . "'";
    $search_result = mysql_query($select_query);
    $search_array = mysql_fetch_array($search_result);
    if ($search_result) {
        if (mysql_num_rows($search_result) == '0') {
            //  if ($email_address == 'princeyekaso@gmail.com') {        
            $result = array('status' => 'failure');
        } else {
            $result = array('status' => 'success');
            $_SESSION['username'] = $email_address;
            $_SESSION['login'] = 'true';
        }
    } else {
        $result = array('status' => 'failure');
    }
    return $result;
}

$result = connectToDatabase();
echo json_encode($result);
?>
