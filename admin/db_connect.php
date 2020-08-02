<?php
$host_name='localhost';
$user_name='root';
$password='';
$db_name='db_seip_ecommerce19';

$con=  mysqli_connect($host_name, $user_name, $password);
if($con) {
    $db_select=  mysqli_select_db($con, $db_name);
    if($db_select) {
        
    } else {
        die('Database no selected'. mysqli_error($con) );
    }
} else {
    die('Database connction fail'.  mysqli_error($con) );
}