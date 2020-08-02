<?php

session_start();

class Application {

    //put your code here
    public function __construct() {
        $host_name = 'localhost:3307';
        $user_name = 'root';
        $password = '';
        $db_name = 'db_seip_ecommerce19';
        $con = mysqli_connect($host_name, $user_name, $password);
        if ($con) {
            $db_select = mysqli_select_db($con, $db_name);
            if ($db_select) {
                return $con;
            } else {
                die('Database no selected' . mysqli_error($con));
            }
        } else {
            die('Database connction fail' . mysqli_error($con));
        }
    }

    public function select_all_published_category_info() {
        $con = $this->__construct();
        $sql = "SELECT * FROM tbl_category WHERE publication_status=1 AND deletion_status=1";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
	public function category_page_show($category_id){
        
        $con = $this->__construct();
        $sql ="SELECT * FROM tbl_product WHERE category_id='$category_id' AND publication_status=1 AND deletion_status=1";
        if(mysqli_query($con, $sql)){
            $result = mysqli_query($con, $sql);
            
            return $result;
        }
    }
    public function select_all_published_product() {
        $con = $this->__construct();
        $sql = "SELECT * FROM tbl_product WHERE publication_status=1 AND deletion_status=1";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    public function select_product_info_by_product_id($product_id) {
        $con = $this->__construct();
        $sql = "SELECT p.*, c.category_name, m.manufacturer_name FROM tbl_product as p, tbl_category as c, tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id AND p.product_id='$product_id' ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    public function select_product_info_by_category_id($category_id) {
        $con = $this->__construct();
        $sql = "SELECT * FROM tbl_product WHERE category_id='$category_id' AND publication_status=1 AND deletion_status= 1 ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    public function save_cart_product_info($data) {
        $con = $this->__construct();
        $product_id = $data['product_id'];
        $sql = "SELECT * FROM tbl_product WHERE product_id='$product_id' ";
        $query_result = mysqli_query($con, $sql);
        $product_info = mysqli_fetch_assoc($query_result);
        $product_quantity = $product_info['product_quantity'];
        $cart_product_quantity = $data['product_quantity'];
        if ($cart_product_quantity > $product_quantity) {
            echo 'You have to order equal or less then' . ' ' . $product_quantity;
        } else if ($cart_product_quantity < 1) {
            echo 'You have to order greater then 0';
        } else {

            $session_id = session_id();
            $sql = "INSERT INTO tbl_temp_cart (product_id, session_id, product_name, product_image, product_price, product_quantity) VALUES ('$product_id', '$session_id', '$product_info[product_name]', '$product_info[product_image]', '$product_info[product_price]', '$data[product_quantity]' )";
            mysqli_query($con, $sql);
            header('Location: cart.php');
        }
    }

    public function select_cart_product_info_by_session_id() {
        $con = $this->__construct();
        $session_id = session_id();
        $sql = "SELECT * FROM tbl_temp_cart WHERE session_id= '$session_id' ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Querry problem' . mysqli_error($con));
        }
    }

    public function update_cart_product_info($data) {
        $con = $this->__construct();
        $session_id = session_id();
        $sql = "UPDATE tbl_temp_cart SET product_quantity='$data[product_quantity]' WHERE session_id= '$session_id' AND product_id='$data[product_id]' ";
        if (mysqli_query($con, $sql)) {
            $message = "Cart product info updated successfully";
            return $message;
        } else {
            die('Querry problem' . mysqli_error($con));
        }
    }

    public function delete_cart_product_info($product_id) {
        $con = $this->__construct();
        $session_id = session_id();
        $sql = "DELETE  FROM tbl_temp_cart WHERE session_id= '$session_id' AND product_id='$product_id' ";
        if (mysqli_query($con, $sql)) {
            $message = "Cart product info deleted successfully";
            return $message;
        } else {
            die('Querry problem' . mysqli_error($con));
        }
    }

    public function save_customer_info_menubar($data) {
        $con = $this->__construct();
        $password=  md5($data['password']);
        $sql = "INSERT INTO tbl_customer (first_name, last_name, email_address, password, address, phone_number, city, country) VALUES ('$data[first_name]', '$data[last_name]', '$data[email_address]', '$password', '$data[address]', '$data[phone_number]', '$data[city]', '$data[country]')";
        if( mysqli_query($con, $sql) ) {
            $customer_id=mysqli_insert_id($con);
            $_SESSION['customer_id']=$customer_id;
            $_SESSION['customer_name']=$data['first_name'].' '.$data['last_name'];
            
            header('Location: login.php');
        } else {
            die('Query problem'.  mysqli_error( $con) );   
        }
    }
	
	   public function save_customer_info($data) {
        $con = $this->__construct();
        $password=  md5($data['password']);
        $sql = "INSERT INTO tbl_customer (first_name, last_name, email_address, password, address, phone_number, city, country) VALUES ('$data[first_name]', '$data[last_name]', '$data[email_address]', '$password', '$data[address]', '$data[phone_number]', '$data[city]', '$data[country]')";
        if( mysqli_query($con, $sql) ) {
            $customer_id=mysqli_insert_id($con);
            $_SESSION['customer_id']=$customer_id;
            $_SESSION['customer_name']=$data['first_name'].' '.$data['last_name'];
            
            header('Location: shipping.php');
        } else {
            die('Query problem'.  mysqli_error( $con) );   
        }
    }
	
	    public function customer_login_check_menubar($data) {
         $con = $this->__construct();
        $password = md5($data['password']);
        $query = "SELECT * FROM tbl_customer WHERE email_address='$data[email_address]' AND password='$password' ";
        if (mysqli_query($con, $query)) {
            $query_result = mysqli_query($con, $query);
            $customer_info = mysqli_fetch_assoc($query_result);
            if ($customer_info) {
                session_start();
                
                $_SESSION['customer_id'] = $customer_info['customer_id'];
                $_SESSION['customer_name'] = $customer_info['first_name'] . ' ' . $customer_info['last_name'];
                header('Location: index.php');
            } else {
                $message = "<h4>Please use valid email and password, otherwise Signup!</h4>";
                echo $message;
            }
        } else {
            die('Failed to login' . mysqli_error($con));
        }
    }
		
	public function customer_login_check($data) {
         $con = $this->__construct();
        $password = md5($data['password']);
        $query = "SELECT * FROM tbl_customer WHERE email_address='$data[email_address]' AND password='$password' ";
        if (mysqli_query($con, $query)) {
            $query_result = mysqli_query($con, $query);
            $customer_info = mysqli_fetch_assoc($query_result);
            if ($customer_info) {
                session_start();
                $_SESSION['customer_id'] = $customer_info['customer_id'];
                $_SESSION['customer_name'] = $customer_info['first_name'] . ' ' . $customer_info['last_name'];
                header('Location: shipping.php');
            } else {
                $message = "<h4>Please use valid email and password, otherwise Signup!</h4>";
                echo $message;
            }
        } else {
            die('Failed to login' . mysqli_error($con));
        }
    }
    
    public function save_shipping_info($data) {
        $con = $this->__construct();
        $sql = "INSERT INTO tbl_shipping (full_name, email_address, address, phone_number, city, country) VALUES ('$data[full_name]', '$data[email_address]', '$data[address]', '$data[phone_number]', '$data[city]', '$data[country]')";
        if( mysqli_query($con, $sql) ) {
            $shipping_id=mysqli_insert_id($con);
            $_SESSION['shipping_id']=$shipping_id;
            
            header('Location: payment.php');
        } else {
            die('Query problem'.  mysqli_error( $con) );   
        }
    }
	
    public function save_order_info($data) {
        $con = $this->__construct();
        $payment_type=$data['payment_type'];
        if($payment_type == 'cash_on_delivary') {
            $sql="INSERT INTO tbl_order(customer_id, shipping_id, order_total) VALUES ('$_SESSION[customer_id]', '$_SESSION[shipping_id]', '$_SESSION[order_total]')";
            if( mysqli_query($con, $sql) ) {
                $order_id=mysqli_insert_id($con);
                $_SESSION['order_id']=$order_id;
                $sql="INSERT INTO tbl_payment (order_id, payment_type) VALUES ('$_SESSION[order_id]', '$payment_type')";
                if(mysqli_query($con, $sql)) {
                    $session_id=  session_id();
                    $sql="SELECT * FROM tbl_temp_cart WHERE session_id='$session_id' ";
                    $query_result=mysqli_query($con, $sql);
                    while ($row=  mysqli_fetch_assoc($query_result)) {
                        $sql="INSERT INTO tbl_order_details (order_id, product_id, product_name, product_price, product_quantity) VALUES ('$_SESSION[order_id]', '$row[product_id]', '$row[product_name]', '$row[product_price]', '$row[product_quantity]')";
                        mysqli_query($con, $sql);
                    }
                    $sql="DELETE FROM tbl_temp_cart WHERE session_id='$session_id' ";
                    mysqli_query($con, $sql);
                    header('Location: customer_home.php');
                }else {
                    die('Query problem'.mysqli_error($con) );
                }
            } else {
                die('Query Problem'.mysqli_error($con) );
            }
        } 
        else if($payment_type == 'bkash') {
             header('Location: customer_home.php');
        }         
        
    }
    
    public function customer_logout() {
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_name']);
        unset($_SESSION['shipping_id']);
        unset($_SESSION['order_id']);
        
        header('Location: index.php');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}