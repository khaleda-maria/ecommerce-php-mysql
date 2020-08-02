<?php
    $product_id=$_GET['product_id'];
    $query_result=$obj_admin->select_product_info_by_id($product_id);
    $product_info=  mysqli_fetch_assoc($query_result);
    

?>

<table class="table table-bordered">
    <tr>
        <th>Product ID</th>
        <td><?php echo $product_info['product_id']; ?></td>
    </tr>
    <tr>
        <th>Product Name</th>
        <td><?php echo $product_info['product_name']; ?></td>
    </tr>
    <tr>
        <th>Category Name</th>
        <td><?php echo $product_info['category_name']; ?></td>
    </tr>
    <tr>
        <th>Manufacturer Name</th>
        <td><?php echo $product_info['manufacturer_name']; ?></td>
    </tr>
    <tr>
        <th>Product Price</th>
        <td><?php echo $product_info['product_price']; ?></td>
    </tr>
    <tr>
        <th>Product Quantity</th>
        <td><?php echo $product_info['product_quantity']; ?></td>
    </tr>
    <tr>
        <th>Product Sku</th>
        <td><?php echo $product_info['product_sku']; ?></td>
    </tr>
    <tr>
        <th>Product Short Description</th>
        <td><?php echo $product_info['product_short_description']; ?></td>
    </tr>
    <tr>
        <th>Product Long Description</th>
        <td><?php echo $product_info['product_long_description']; ?></td>
    </tr>
    <tr>
        <th>Product Image</th>
        <td>
            <img src="<?php echo $product_info['product_image']; ?>" alt="">
        </td>
    </tr>
    <tr>
        <th>Publication Status</th>
        <td>
            <?php
                if($product_info['publication_status'] == 1 ) {
                    echo 'Published';
                 } else {
                     echo 'Unpublished';
                 }
            
            ?>
            
        </td>
    </tr>
    
    
</table>