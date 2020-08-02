<script>
    function ajax_email_check(x, y) {
        
        var xmlhttp=new XMLHttpRequest();
        var server_page='email_search.php?email='+x;
        xmlhttp.open('GET', server_page);
        xmlhttp.onreadystatechange = function () {
            if(xmlhttp.readyState == 4 && xmlhttp.status ==200) {
                document.getElementById(y).innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }
</script>

<?php
    if(isset($_POST['btn'])) {
        $obj_app->save_customer_info($_POST);
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
                <h4>You have to login to complete your valuable order. If you are not registered then please register now !</h4>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="well">
                <h3 class="text-center text-success">Registration Form</h3>
                <hr/>
                <form class="form-horizontal" role="form" action="" method="post">
                    <div class="form-group">
                        <label class="control-label col-md-3">First Name</label>
                        <div class="col-md-9">
                            <input type="text" name="first_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" name="last_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Email Address</label>
                        <div class="col-md-9">
                            <input type="email" name="email_address" class="form-control" onblur="ajax_email_check(this.value, 'res'); ">
                            <span id="res"></span>
                                
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control">
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
                            <input type="submit" name="btn" class="btn btn-primary btn-block" value="Registration">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="well">
                <h3 class="text-center text-success">Login Form</h3>
                <hr/>
                <form class="form-horizontal" role="form" action="" method="post">
                    <div class="form-group">
                        <label class="control-label col-md-3">Email Address</label>
                        <div class="col-md-9">
                            <input type="email" name="email_address" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Sign IN">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>