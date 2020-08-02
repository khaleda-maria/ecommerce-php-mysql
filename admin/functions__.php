<?php

    function admin_login_check($data) {
        require 'db_connect.php';
        $password=  md5($data['password']);
        $sql="SELECT * FROM tbl_admin WHERE email_address='$data[email_address]' AND password='$password' AND deletion_status=1 ";
        if (mysqli_query($con, $sql) ) {
            $query_result=mysqli_query($con, $sql);
            $admin_info=mysqli_fetch_assoc($query_result);
            if($admin_info) {
                session_start();
                $_SESSION['admin_id']=$admin_info['admin_id'];
                $_SESSION['admin_name']=$admin_info['admin_name'];
                
                header('Location: admin_master.php');
            }  else {
                $message='Please use valid email address & password';
                return $message;
            }
            
        } else{
            die('Query problem'. mysqli_error($con) );
        }
    }
    
    function save_category_info($data) {
        require './db_connect.php';
        $sql="INSERT INTO tbl_category (category_name, category_description, publication_status) VALUES ('$data[category_name]', '$data[category_description]', '$data[publication_status]' )";                                          
        if( mysqli_query($con, $sql) ) {
            $message='Category info save successfully'; 
            return $message;
        } else {
            die('Query problem'.  mysqli_error($con) );
        }
    }
    function save_manufacturer_info($data) {
        require './db_connect.php';
        $sql="INSERT INTO tbl_manufacturer (manufacturer_name,manufacturer_description, publication_status) VALUES ('$data[manufacturer_name]', '$data[manufacturer_description]', '$data[publication_status]' )";                                          
        if( mysqli_query($con, $sql) ) {
            $message='Category info save successfully'; 
            return $message;
        } else {
            die('Query problem'.  mysqli_error($con) );
        }
    }
    function select_all_category_info() {
        require './db_connect.php';
        $sql="SELECT * FROM tbl_category WHERE deletion_status=1 ";
        if(mysqli_query($con, $sql)) {
           $query_result=mysqli_query($con, $sql); 
           return $query_result;
        } else {
            die('Query problem'.mysqli_error($con) );
        }
    }    
    function unpublished_category_info($category_id) {
        require './db_connect.php';
        $sql="UPDATE tbl_category SET publication_status= 0 WHERE category_id='$category_id' ";
        if(mysqli_query($con, $sql)) {
           $message="Category info unpublished successfully !";
           return $message;
        } else {
            die('Query problem'.mysqli_error($con) );
        }
    }
    function published_category_info($data) {
        require './db_connect.php';
        $sql="UPDATE tbl_category SET publication_status= 1 WHERE category_id='$data' ";
        if(mysqli_query($con, $sql)) {
           $message="Category info published successfully !";
           return $message;
        } else {
            die('Query problem'.mysqli_error($con) );
        }
    }
    function unpublished_menufacturer_info($data) {
        require './db_connect.php';
        $sql="UPDATE tbl_manufacturer SET publication_status= 0 WHERE manufacturer_id='$data' ";
        if(mysqli_query($con, $sql)) {
           $message="Category info unpublished successfully !";
           return $message;
        } else {
            die('Query problem'.mysqli_error($con) );
        }
    }
    function published_menufacturer_info($data) {
        require './db_connect.php';
        $sql="UPDATE tbl_manufacturer SET publication_status= 1 WHERE manufacturer_id='$data' ";
        if(mysqli_query($con, $sql)) {
           $message="Category info published successfully !";
           return $message;
        } else {
            die('Query problem'.mysqli_error($con) );
        }
    }

    function select_category_info_by_id($data) {
        require './db_connect.php';
        $sql="SELECT * FROM tbl_category WHERE category_id='$data'";
        if(mysqli_query($con, $sql)) {
           $query_result=mysqli_query($con, $sql); 
           return $query_result;
        } else {
            die('Query problem'.mysqli_error($con) );
        }
    }
    function select_manufacturer_info_by_id($data) {
        require './db_connect.php';
        $sql="SELECT * FROM tbl_manufacturer WHERE manufacturer_id = '$data'";
        if(mysqli_query($con, $sql)) {
           $query_result=mysqli_query($con, $sql); 
           return $query_result;
        } else {
            die('Query problem'.mysqli_error($con) );
        }
    }
    function select_manufacturer_info() {
        require './db_connect.php';
        $sql="SELECT * FROM tbl_manufacturer WHERE deletion_status = 1";
        if(mysqli_query($con, $sql)) {
           $query_result=mysqli_query($con, $sql); 
           return $query_result;
        } else {
            die('Query problem'.mysqli_error($con) );
        }
    }
    
    function update_category_info($data) {
        require './db_connect.php';
        $sql="UPDATE tbl_category SET category_name='$data[category_name]', category_description='$data[category_description]', publication_status='$data[publication_status]' WHERE category_id='$data[category_id]' ";
        if(mysqli_query($con, $sql)) {
           $_SESSION['message']="Category info update successfully !";
           header('Location: manage_category.php');
        } else {
            die('Query problem'.mysqli_error($con) );
        }
    }
    function update_menufacturer_info($data) {
        require './db_connect.php';
        $sql="UPDATE tbl_manufacturer SET manufacturer_name='$data[manufacturer_name]', manufacturer_description='$data[manufacturer_description]', publication_status='$data[publication_status]' WHERE manufacturer_id='$data[manufacturer_id]' ";
        if(mysqli_query($con, $sql)) {
           $_SESSION['message']="Manufacturer info update successfully !";
           header('Location: manage_manufacturar.php');
        } else {
            die('Query problem'.mysqli_error($con) );
        }
    }
    function delete_category_info($data) {
        require './db_connect.php';
        $sql="UPDATE tbl_category SET deletion_status = 0 WHERE category_id='$data' ";
        if(mysqli_query($con, $sql)) {
           $_SESSION['message']="Category delete successfully !";
           //no need to call header because delete it same page
        } else {
            die('Query problem'.mysqli_error($con) );
        }
    }
    function delete_menufacturer_info($data) {
        require './db_connect.php';
        $sql="UPDATE tbl_manufacturer SET deletion_status = 0 WHERE manufacturer_id='$data' ";
        if(mysqli_query($con, $sql)) {
           $_SESSION['message']="Category delete successfully !";
           //no need to call header because delete it same page
        } else {
            die('Query problem'.mysqli_error($con) );
        }
    }
    
    
    function select_all_published_category_info() {
        require './db_connect.php';
        $sql="SELECT * FROM tbl_category WHERE publication_status=1 AND deletion_status=1";
        if(mysqli_query($con, $sql)) {
           $query_result=mysqli_query($con, $sql);
           return $query_result;
        } else {
            die('Query problem'.mysqli_error($con) );
        }
    }
    function select_all_published_manufacturer_info() {
        require './db_connect.php';
        $sql="SELECT * FROM tbl_manufacturer WHERE publication_status=1 AND deletion_status=1";
        if(mysqli_query($con, $sql)) {
           $query_result=mysqli_query($con, $sql);
           return $query_result;
        } else {
            die('Query problem'.mysqli_error($con) );
        }
    }
    
    function save_product_info($data) {
        require './db_connect.php';
        $directory = '../assets/admin_assets/product_image/';
        $target_file = $directory . $_FILES['product_image']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['product_image']['size'];
        $check = getimagesize($_FILES['product_image']['tmp_name']);
        if ($check) {
            if (file_exists($target_file)) {
                echo 'This image is exists. Please try again later.';
            } else {
                if ($file_type != 'jpg' && $file_type != 'png') {
                    echo 'Your file type is not valid. Please try again';
                } else {
                    if ($file_size > 512000) {
                        echo 'Your file sixe is too large. Pleas try again';
                    } else {
                        move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
                        $sql="INSERT INTO tbl_product (product_name, category_id, manufacturer_id, product_price, product_quantity, product_sku, product_short_description, product_long_description, product_image, publication_status) VALUES ('$data[product_name]', '$data[category_id]', '$data[manufacturer_id]', '$data[product_price]', '$data[product_quantity]', '$data[product_sku]', '$data[product_short_description]', '$data[product_long_description]', '$target_file', '$data[publication_status]' )";
                        if( mysqli_query($con, $sql) ) { 
                            $message='Produtc info save success fully';
                            return $message;
                        } else {
                            die('Query problem'.mysqli_error($con) );
                        }
                    }
                }
            }
        } else {
            echo 'Your upload file is not an image !. Please try again';
        }
    }

    function select_all_product_info() {
        require './db_connect.php';
        //$sql="SELECT p.*, c.category_name, m.manufacturer_name FROM tbl_product as p, tbl_category as c, tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id AND p.deletion_status=1";
        $sql="SELECT p.*, c.category_name, m.manufacturer_name FROM tbl_product as p, tbl_category as c, tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id AND p.deletion_status=1 ";
        if(mysqli_query($con, $sql)) {
           $query_result=mysqli_query($con, $sql); 
           return $query_result;
        } else {
            die('Query problem'.mysqli_error( $con) );
        }
    }
    function select_product_info_by_id($product_id) {
        require './db_connect.php';
        $sql="SELECT p.*, c.category_name, m.manufacturer_name FROM tbl_product as p, tbl_category as c, tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id AND p.product_id='$product_id' ";
        if(mysqli_query($con, $sql)) {
           $query_result=mysqli_query($con, $sql); 
           return $query_result;
        } else {
            die('Query problem'.mysqli_error( $con) );
        }
    }
    function update_product_info($data) {
        require './db_connect.php';
        $directory = '../assets/admin_assets/product_image/';
        $target_file = $directory . $_FILES['product_image']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['product_image']['size'];
        $check = getimagesize($_FILES['product_image']['tmp_name']);
        if ($check) {
            if (file_exists($target_file)) {
                echo 'This image is exists. Please try again later.';
            } else {
                if ($file_type != 'jpg' && $file_type != 'png') {
                    echo 'Your file type is not valid. Please try again';
                } else {
                    if ($file_size > 512000) {
                        echo 'Your file sixe is too large. Pleas try again';
                    } else {
                        move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
                        $sql="UPDATE tbl_product SET product_name='$data[product_name]', category_id='$data[category_id]', manufacturer_id='$data[manufacturer_id]', product_price='$data[product_price]', product_quantity='$data[product_quantity]', product_sku='$data[product_sku]', product_short_description='$data[product_short_description]', product_long_description='$data[product_long_description]', product_image='$target_file', publication_status='$data[publication_status]' ";
                        if( mysqli_query($con, $sql) ) { 
                            session_start();
                            
                            $_SESSION['message']='Produtc info update success fully';
                            header('Location: manage_product.php');
                        } else {
                            die('Query problem'.mysqli_error($con) );
                        }
                    }
                }
            }
        } else {
            echo 'Your upload file is not an image !. Please try again';
        }
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
































































    function admin_logout() {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_name']);
        
        header('Location: index.php');
    }