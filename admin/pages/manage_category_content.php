<?php
    
    if(isset($_GET['p_status'])) {
        $category_id=$_GET['category_id'];
        
        if($_GET['p_status'] == 'unpublished') {
            $message=$obj_admin->unpublished_category_info($category_id);
        }
        else if($_GET['p_status'] == 'published') {
            $message=$obj_admin->published_category_info($category_id);
        }
        else if($_GET['p_status'] == 'delete') {
            $obj_admin->delete_category_info($category_id);
        }
    }
    $query_result=$obj_admin->select_all_category_info();
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
                    if(isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                ?>
            </h3>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">

                <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($category_info = mysqli_fetch_assoc($query_result)) { ?>
                        <tr>
                            <td align="center"><?php echo $category_info['category_id'] ?></td>
                            <td><?php echo $category_info['category_name'] ?></td>
                            <td><?php echo $category_info['category_description'] ?></td>
                            <td class="center">
                                <span class="label label-success">
                                    <?php
                                    if ($category_info['publication_status'] == 1) {
                                        echo 'Published';
                                    } else {
                                        echo 'Unpublished';
                                    }
                                    ?>
                                </span>
                            </td>
                            <td class="center">
                                <?php if ($category_info['publication_status'] == 1) { ?>
                                    <a class="btn btn-success" href="?p_status=unpublished&category_id=<?php echo $category_info['category_id'] ?>" title="Unpublished">
                                        <i class="halflings-icon white arrow-up"></i>  
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-danger" href="?p_status=published&category_id=<?php echo $category_info['category_id'] ?>" title="Published">
                                        <i class="halflings-icon white arrow-down"></i>  
                                    </a>
                                <?php } ?>
                                <a class="btn btn-info" href="edit.php?category_id=<?php echo $category_info['category_id'] ?>">
                                    <i class="halflings-icon white edit" title="edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="?p_status=delete&category_id=<?php echo $category_info['category_id'] ?>" title="delete" onclick="return check_delete();">Delete
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