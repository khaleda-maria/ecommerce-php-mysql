<?php
$given_email=$_GET['email'];
$con=mysqli_connect('localhost', 'root', '');
    if($con) {
        mysqli_select_db($con, 'db_seip_ecommerce19');
    } else {
        die('Connection fail'.  mysqli_error( $con) );
    }
    
    $sql="SELECT * FROM tbl_customer WHERE email_address='$given_email'  ";
    if( mysqli_query($con, $sql) )
    {
        $query_result=mysqli_query($con, $sql);
    } else {
        die('Query problem'.mysqli_error($con) );
    }
    
    $customer_info=mysqli_fetch_assoc($query_result);
    if($customer_info) {
        echo 'Email already exists';
    } else {
        echo "Doesn't Exist";
    }