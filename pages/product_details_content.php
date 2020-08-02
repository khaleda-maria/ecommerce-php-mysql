<?php
$product_id = $_GET['product_id'];
$query_result = $obj_app->select_product_info_by_product_id($product_id);
$product_info = mysqli_fetch_assoc($query_result);
$category_id = $product_info['category_id'];
$query_result1 = $obj_app->select_product_info_by_category_id($category_id);

if(isset($_POST['btn'])) {
    $obj_app->save_cart_product_info($_POST);
}


?>
<div class="men">
    <div class="container">
        <div class="single_top">
            <div class="col-md-9 single_right">
                <div class="grid images_3_of_2">
                    <ul id="etalage">
                        <li>
                            <a href="optionallink.html">
                                <img class="etalage_thumb_image" src="pages/<?php echo $product_info['product_image']; ?>" class="img-responsive" />
                                <img class="etalage_source_image" src="pages/<?php echo $product_info['product_image']; ?>" class="img-responsive" title="" />
                            </a>
                        </li>
                        <li>
                            <img class="etalage_thumb_image" src="pages/<?php echo $product_info['product_image']; ?>" class="img-responsive" />
                            <img class="etalage_source_image" src="pages/<?php echo $product_info['product_image']; ?>" class="img-responsive" title="" />
                        </li>
                        <li>
                            <img class="etalage_thumb_image" src="pages/<?php echo $product_info['product_image']; ?>" class="img-responsive"  />
                            <img class="etalage_source_image" src="pages/<?php echo $product_info['product_image']; ?>"class="img-responsive"  />
                        </li>
                        <li>
                            <img class="etalage_thumb_image" src="pages/<?php echo $product_info['product_image']; ?>" class="img-responsive"  />
                            <img class="etalage_source_image" src="pages/<?php echo $product_info['product_image']; ?>"class="img-responsive"  />
                        </li>
                    </ul>
                    <div class="clearfix"></div>		
                </div> 
                <div class="desc1 span_3_of_2">
                    <h1><b>Product Name: </b><?php echo $product_info['product_name']; ?></h1>
                    <h1><b>Category Name: </b><?php echo $product_info['category_name']; ?></h1>
                    <h1><b>Manufacturer Name: </b><?php echo $product_info['manufacturer_name']; ?></h1>
                    <h1><b>Product Price: </b><?php echo 'BDT ' . $product_info['product_price']; ?></h1>
                    <h1><b>Stock Amount: </b><?php echo $product_info['product_quantity']; ?></h1>

                    <div class="btn_form">
                        <form action="" method="post">
                            <input type="number" name="product_quantity" value="1" >
                            <input type="hidden" name="product_id" value="<?php echo $product_info['product_id']; ?>" >
                            <input type="submit" name="btn" value="ADD TO CART">
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>	
            </div>
            <!--<div class="col-md-3">
                FlexSlider 
              
                <section class="slider_flex">
                    <div class="flexslider">
                        <ul class="slides">
                        	
                            <li><img src="pages/<?php echo $product_info['product_image']; ?>" class="img-responsive" alt=""/></li>
                             <li><img src="pages/<?php echo $product_info['product_image']; ?>" class="img-responsive" alt=""/></li>
                              <li><img src="pages/<?php echo $product_info['product_image']; ?>" class="img-responsive" alt=""/></li>
                               <li><img src="pages/<?php echo $product_info['product_image']; ?>" class="img-responsive" alt=""/></li>
                          
                        </ul>
                    </div>
                </section>
              
               
            </div>
           -->
            <div class="clearfix"> </div>
        </div>
        <div class="toogle">
            <h2>Product Details</h2>
            <p class="m_text2"><?php echo $product_info['product_short_description']; ?></p>
        </div>
        <div class="toogle">
            <h2>More Information</h2>
            <p class="m_text2"><?php echo $product_info['product_long_description']; ?></p>
        </div>
        <h4 class="head_single">Related Products</h4>
        <div class="span_3">
            <?php while ($category_product = mysqli_fetch_assoc($query_result1)) { ?>
                <div class="col-sm-3 grid_1">
                    <a href="product_details.php?product_id=<?php echo $category_product['product_id']; ?>">
                        <img src="admin/<?php echo $category_product['product_image']; ?>" class="img-responsive" alt="" />
                        <h3><?php echo $category_product['product_name']; ?></h3>
                        <p><?php echo $product_info['manufacturer_name']; ?></p>
                        <h4>BDT <?php echo $category_product['product_price']; ?></h4>
                    </a>  
                </div> 
            <?php } ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>