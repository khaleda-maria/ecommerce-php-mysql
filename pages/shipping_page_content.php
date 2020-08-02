<?php
    if(isset($_POST['btn'])) {
        $obj_app->save_shipping_info($_POST);
		
		$name = $_POST['full_name'];
		$email_address = $_POST['email_address'];
		$address = $_POST['address'];
		
		$to = "$email_address";
		$subject = "Product Order Confirmation";
		$header = "From: <jamdanimela.gmail.com>";
		$message = "Thank u....$name. Your order will be brought to your..... $address ";
		if(mail($to,$subject,$message,$header))
		{
			echo "Thank u";
		}else{
			echo "tray with another valid email";
		}
		
    }

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
            <div class="well">
                <h4>Hello <strong style="font-size: 24px; color: #E05B5B"><?php echo $_SESSION['customer_name']; ?></strong>,  we need your shipping address for processing</h4>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well">
                <h3 class="text-center text-success">Shipping Form</h3>
                <hr/>
                <form class="form-horizontal" role="form" action="" method="post">
                    <div class="form-group">
                        <label class="control-label col-md-3">Full Name</label>
                        <div class="col-md-9">
                            <input type="text" name="full_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Email Address</label>
                        <div class="col-md-9">
                            <input type="email" name="email_address" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Address</label>
                        <div class="col-md-9">
                            <textarea name="address" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Phone Number</label>
                        <div class="col-md-9">
                            <input type="number" name="phone_number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">City</label>
                        <div class="col-md-9">
                            <input type="text" name="city" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Country</label>
                        <div class="col-md-9">
                            <select name="country" class="form-control">
                                <option>---Select Country Name---</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="United States">United States</option>
                                <option value="Canada">Canada</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" name="btn" class="btn btn-primary btn-block" value="Save Shipping Info">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>