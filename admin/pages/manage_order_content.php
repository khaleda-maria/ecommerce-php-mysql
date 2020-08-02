<?php
if (isset($_GET['p_status'])) {
    $category_id = $_GET['category_id'];

    if ($_GET['p_status'] == 'unpublished') {
        $message = $obj_admin->unpublished_category_info($category_id);
    } else if ($_GET['p_status'] == 'published') {
        $message = $obj_admin->published_category_info($category_id);
    } else if ($_GET['p_status'] == 'delete') {
        $obj_admin->delete_category_info($category_id);
    }
}

$query_result = $obj_admin->select_all_oreder_info();
//while ($order_info=  mysqli_fetch_assoc($query_result)) {
//    echo '<pre>';
//    print_r($order_info);
//}
//
//exit();

?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="admin_master.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Manage Category</a>
    </li>
</ul>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Category Details</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h3>
<?php
if (isset($message)) {
    echo $message;
    unset($message);
}
?>
            </h3>
            <h3>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
            </h3>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">

                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Order Status</th>
                        <th>Payment Type</th>
                        <th>Payment Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                        <?php while ($order_info=  mysqli_fetch_assoc($query_result)) { ?>
                        <tr>
                            <td align="center"><?php echo $order_info['order_id']; ?></td>
                            <td><?php echo $order_info['first_name'].' '.$order_info['last_name']; ?></td>
                            <td><?php echo $order_info['order_total']; ?></td>
                            <td><?php echo $order_info['order_status']; ?></td>
                            <td><?php echo $order_info['payment_type']; ?></td>
                            <td class="center"><?php echo $order_info['payment_status']; ?></td>
                            <td class="center">
                                <a class="btn btn-success" href="view_order.php?order_id=<?php echo $order_info['order_id'] ?>" title="View Order Details">
                                    <i class="halflings-icon white zoom-in"></i>  
                                </a>
                                <a class="btn btn-primary" href="view_invoice.php?order_id=<?php echo $order_info['order_id'] ?>" title="View Order Invoice">
                                    <i class="halflings-icon white zoom-out"></i>  
                                </a>
                                <a class="btn btn-info" href="download_invoice.php?order_id=<?php echo $order_info['order_id'] ?>" title="Download Invoice">
                                    <i class="halflings-icon white download"></i>  
                                </a>
                                <a class="btn btn-default" href="edit_order.php?order_id=<?php echo $order_info['order_id'] ?>" >
                                    <i class="halflings-icon white edit" title="edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="?o_status=delete&order_id=<?php echo $order_info['order_id'] ?>" title="delete" onclick="return check_delete();">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                            </td>
                        </tr>
<?php } ?>


                </tbody>

            </table>            
        </div>
    </div><!--/span-->
</div>