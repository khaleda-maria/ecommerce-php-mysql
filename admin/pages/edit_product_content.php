<?php

$product_id=$_GET['product_id'];
$query_result=$obj_admin->select_product_info_by_id($product_id);
$product_info=mysqli_fetch_assoc($query_result);

if(isset($_POST['update_btn'])) {
    $obj_admin->update_product_info($_POST);   
}

$query_result = $obj_admin->select_all_published_category_info();
$query_result1 = $obj_admin->select_all_published_manufacturer_info();
?>   
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h2>
                <?php 
                if(isset($message)) {
                    echo $message;
                    unset($message);
                }
            ?>
            </h2>
            <form name="edit_product_form" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Product Name</label>
                        <div class="controls">
                            <input class="input-xlarge focused" value="<?php echo $product_info['product_name']; ?>" id="focusedInput" type="text" name="product_name">
                            <input class="input-xlarge focused" value="<?php echo $product_info['product_id']; ?>" id="focusedInput" type="hidden" name="product_id">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError">Category Name</label>
                        <div class="controls">
                            <select id="selectError" data-rel="chosen" name="category_id">
                                <option>---Select Category Name---</option>
                                <?php while ($category_info = mysqli_fetch_assoc($query_result)) { ?>
                                    <option value="<?php echo $category_info['category_id']; ?>"><?php echo $category_info['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError">Manufacturer Name</label>
                        <div class="controls">
                            <select id="selectError3" data-rel="chosen" name="manufacturer_id">
                                <option>---Select Manufacturer Name---</option>
                                <?php while ($manufacturer_info = mysqli_fetch_assoc($query_result1)) { ?>
                                    <option value="<?php echo $manufacturer_info['manufacturer_id']; ?>"> <?php echo $manufacturer_info['manufacturer_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Product Price</label>
                        <div class="controls">
                            <input class="input focused" value="<?php echo $product_info['product_price']; ?>" id="focusedInput" type="number" name="product_price">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Product Quantity</label>
                        <div class="controls">
                            <input class="input focused" value="<?php echo $product_info['product_quantity']; ?>" id="focusedInput" type="number" name="product_quantity">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Product Sku</label>
                        <div class="controls">
                            <input class="input focused" id="focusedInput" value="<?php echo $product_info['product_sku']; ?>" type="text" name="product_sku">
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Short Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="product_short_description" id="textarea2" rows="3">
                                <?php echo $product_info['product_short_description']; ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Long Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="product_long_description" id="textarea2" rows="3">
                                <?php echo $product_info['product_long_description']; ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Product Image</label>
                        <div class="controls">
                            <input class="input focused" id="focusedInput" type="file" name="product_image">
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
                        <button type="submit" class="btn btn-primary" name="update_btn">Update Product Info</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div><!--/span-->
</div>
<script>
    document.forms['edit_product_form'].elements['category_id'].value='<?php echo $product_info['category_id']; ?>';
    document.forms['edit_product_form'].elements['manufacturer_id'].value='<?php echo $product_info['manufacturer_id']; ?>';
    document.forms['edit_product_form'].elements['publication_status'].value='<?php echo $product_info['publication_status']; ?>';
</script>













