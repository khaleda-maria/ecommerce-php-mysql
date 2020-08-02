<?php
if(isset($_POST['update_btn'])) {
    $message=$obj_app->update_cart_product_info($_POST);
}    

if(isset($_GET['c_status'])) {
    $product_id=$_GET['product_id'];
    $message=$obj_app->delete_cart_product_info($product_id);
}


$query_result=$obj_app->select_cart_product_info_by_session_id();
        

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr/>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well text-center">
                <?php
                    if(isset($message)) {
                        echo $message;
                        unset($message);
                    }
                ?>
                <hr/>
                <table class="table table-bordered">
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    <?php $sum=0; while ($cart_product=  mysqli_fetch_assoc($query_result)) { ?>
                    <tr>
                        <td><?php echo $cart_product['product_id']; ?></td>
                        <td><?php echo $cart_product['product_name']; ?></td>
                        <td>
                            <img src="admin/<?php echo $cart_product['product_image']; ?>" alt="" width="50" height="50"> 
                        </td>
                        <td>BDT: <?php echo $cart_product['product_price']; ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="text" name="product_quantity" value="<?php echo $cart_product['product_quantity']; ?>" >
                                <input type="hidden" name="product_id" value="<?php echo $cart_product['product_id']; ?>" >
                                <input type="submit" name="update_btn" value="Update">
                            </form>
                        </td>
                        <td>
                            <?php 
                                $total=$cart_product['product_price']*$cart_product['product_quantity'];
                                 echo 'BDT: '.$total;       
                              ?>
                        </td>
                        <td>
                            <a href="?c_status=delete&product_id=<?php echo $cart_product['product_id']; ?>" class="btn btn-danger" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                    <?php $sum=$sum+$total; } ?>
                </table>
                <table class="table table-striped">
                    <tr>
                        <th>Sub Total</th>
                        <td class="pull-right"> <?php echo 'BDT: '.$sum; ?> </td>
                    </tr>
                    <tr>
                        <th>Vat Total</th>
                        <td class="pull-right">
                            <?php
                                $vat=$sum*0.15;
                                echo 'BDT: '.$vat;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Grand Total</th>
                        <td class="pull-right">
                            <?php
                                $grand_total=$sum+$vat;
                                $_SESSION['order_total']=$grand_total;
                                echo 'BDT: '.$grand_total;
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr/>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if($_SESSION['customer_id']) {?>
            <a href="shipping.php" class="btn btn-primary pull-right">Checkout</a>  
            <?php } else { ?>
            <a href="checkout.php" class="btn btn-primary pull-right">Checkout</a>  
            <?php } ?>
            <a href="index.php" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr/>
        </div>
    </div>
</div>