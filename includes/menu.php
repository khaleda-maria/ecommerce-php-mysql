<?php
    
    $sabnur=$obj_app->select_all_published_category_info();
?>
<div class="menu">
            <div class="container">
                <div class="menu_box">
                    <ul class="megamenu skyblue">
                        <li class="active grid"><a class="color2" href="index.php">Home</a></li>
                        <?php while ($category_info =  mysqli_fetch_assoc($sabnur)) { ?>
                        <li><a class="color4" href="category.php?category_id=<?php echo $category_info['category_id']; ?>"><?php echo $category_info['category_name']; ?></a></li>				
                        <?php } ?>
                        <div class="clearfix"> </div>
                    </ul>
                 </div>
         </div>
</div>