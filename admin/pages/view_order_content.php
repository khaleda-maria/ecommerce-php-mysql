<?php
    $order_id=$_GET['order_id'];
    $customer_query_result=$obj_admin->select_customer_info_by_order_id($order_id);
    $customer_info=mysqli_fetch_assoc($customer_query_result);
    
    $shipping_query_result=$obj_admin->select_shipping_info_by_order_id($order_id);
    $shipping_info=  mysqli_fetch_assoc($shipping_query_result);
    
    $product_query_result=$obj_admin->select_product_info_by_order_id($order_id);
    
    
?>


<div class="well">
    <h2 class="text-success text-center lead">Customer Info</h2>
    <hr/>
    <table class="table table-bordered">
        <tr>
            <th>Customer Name</th>
            <td><?php echo $customer_info['first_name'].' '.$customer_info['last_name']; ?></td>
        </tr>
        <tr>
            <th>Email Address</th>
            <td><?php echo $customer_info['email_address']; ?></td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td><?php echo $customer_info['phone_number']; ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $customer_info['address']; ?></td>
        </tr>
        <tr>
            <th>City</th>
            <td><?php echo $customer_info['city']; ?></td>
        </tr>
        <tr>
            <th>Country</th>
            <td><?php echo $customer_info['country']; ?></td>
        </tr>
    </table>
</div>
<div class="well">
    <h2 class="text-success text-center lead">Shipping Info</h2>
    <hr/>
    <table class="table table-bordered">
        <tr>
            <th>Full Name</th>
            <td><?php echo $shipping_info['full_name']; ?></td>
        </tr>
        <tr>
            <th>Email Address</th>
            <td><?php echo $shipping_info['email_address']; ?></td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td><?php echo $shipping_info['full_name']; ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $shipping_info['address']; ?></td>
        </tr>
        <tr>
            <th>City</th>
            <td><?php echo $shipping_info['city']; ?></td>
        </tr>
        <tr>
            <th>Country</th>
            <td><?php echo $shipping_info['country']; ?></td>
        </tr>
    </table>
</div>
<div class="well">
    <h2 class="text-success text-center lead">Product Info</h2>
    <hr/>
    <table class="table table-bordered">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Total Price</th>
        </tr>
        <?php $sum=0; while ($order_product=  mysqli_fetch_assoc($product_query_result)) { ?>
        <tr>
            <td><?php echo $order_product['product_id']; ?></td>
            <td><?php echo $order_product['product_name']; ?></td>
            <td><?php echo $order_product['product_price']; ?></td>
            <td><?php echo $order_product['product_quantity']; ?></td>
            <td>
                <?php 
                    $total=$order_product['product_price']*$order_product['product_quantity']; 
                    echo 'BDT: '.$total;
                    ?>
            </td>
        </tr>
        <?php $sum=$sum+$total; } ?>
    </table>
    <table class="table table-striped">
        <tr>
            <th>Sub Total</th>
            <td class="pull-right"><?php echo 'BDT: '.$sum; ?></td>
        </tr>
        <tr>
            <th>Vat</th>
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
                <?php echo 'BDT: '.($sum+$vat); ?>
            </td>
        </tr>
    </table>
</div>
