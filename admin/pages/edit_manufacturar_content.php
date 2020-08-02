<?php

    $admin_id = $_SESSION['admin_id'];
    if ($admin_id == NULL) {
        header('Location: index.php');
    }
    
    $manufacturer_id=$_GET['manufacturer_id'];
    $query_result=$obj_admin->select_manufacturer_info_by_id($manufacturer_id);
    $category_info=mysqli_fetch_assoc($query_result);
    
    if (isset($_POST['update_btn'])) {
       $obj_admin->update_menufacturer_info($_POST);
    }
?>

                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="admin_master.php">Home</a>
                            <i class="icon-angle-right"></i> 
                        </li>
                        <li>
                            <i class="icon-edit"></i>
                            <a href="#">Forms</a>
                        </li>
                    </ul>

                    <div class="row-fluid sortable">
                        <div class="box span12">
                            <div class="box-header" data-original-title>
                                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category Form</h2>
                                <div class="box-icon">
                                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <h3>
                                    <?php 
                                        if(isset($message)){
                                            echo $message;
                                            unset($message);
                                        }
                                    ?>
                                 </h3>
                                <form name="edit_category_form" class="form-horizontal" action="" method="post">
                                    <fieldset>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Category Name </label>
                                            <div class="controls">
                                                <input type="text" name="manufacturer_name" value="<?php echo $category_info['manufacturer_name'];?>" class="span6 typeahead">
                                                <input type="hidden" name="manufacturer_id" value="<?php echo $category_info['manufacturer_id'];?>" class="span6 typeahead">
                                            </div>
                                        </div>
                                        

                                                  
                                        <div class="control-group hidden-phone">
                                            <label class="control-label" for="textarea2">Manufacturer Description</label>
                                            <div class="controls">
                                                <textarea class="cleditor" id="textarea2" rows="3" name="manufacturer_description"><?php echo $category_info['manufacturer_description'];?></textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Publication Status </label>
                                            <div class="controls">
                                                <select class="form-control" name="publication_status">
                                                    <option>--publication status--</option>
                                                    <option value="1">Published</option>
                                                    <option value="0">Unpublished</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary" name="update_btn">Update category</button>
                                            <button type="reset" class="btn">Reset</button>
                                        </div>
                                    </fieldset>
                                </form>   

                            </div>
                        </div><!--/span-->

                    </div><!--/row-->
                    
                    <script>
                        document.forms['edit_category_form'].elements['publication_status'].value='<?php echo $category_info['publication_status']?>';
                    </script>
                        