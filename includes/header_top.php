<?php 
if(isset($_GET['status'])) {
    $obj_app->customer_logout();
}
    
?>
<div class="header_top">
    <div class="container">
        <div class="header_top-box">
           
            <div class="cssmenu">
                <ul>
                    <li class="active"><a href="login.html">Account</a></li> 
                    <li><a href="wishlist.html">Wishlist</a></li>
                    <?php if (isset($_SESSION['customer_id'] ) ) { ?>
                    <li><a href="?status=logout">Log Out</a></li> 
                    <?php } else { ?>
                    <li><a href="login.php">Log In</a></li> 
                    <li><a href="sign_up.php">Sign Up</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>