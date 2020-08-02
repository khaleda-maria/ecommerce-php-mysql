<?php
ob_start();

require './classes/application.php';
$obj_app = new Application();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title> <?php
		if (isset($pages)) {
			if ($pages == 'Category') {
				echo $pages;
			} else if ($pages == 'Blog') {
				echo $pages;
			}
		} else {
			echo 'Home';
		}
			?> </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Gifty Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript">
			addEventListener("load", function() {
				setTimeout(hideURLbar, 0);
			}, false);
			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<link href="assets/front_end_assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!-- Custom Theme files -->
		<link href="assets/front_end_assets/css/style.css" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="assets/front_end_assets/css/jquery.countdown.css" />
		<!-- Custom Theme files -->
		<!--webfont-->
		<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="assets/front_end_assets/js/jquery-1.11.1.min.js"></script>
		<!-- dropdown -->
		<script src="assets/front_end_assets/js/jquery.easydropdown.js"></script>
		<!-- start menu -->
		<link href="assets/front_end_assets/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
		<script type="text/javascript" src="assets/front_end_assets/js/megamenu.js"></script>
		<script>
			$(document).ready(function() {
				$(".megamenu").megamenu();
			});
		</script>
		<script src="assets/front_end_assets/js/responsiveslides.min.js"></script>
		<script>
			$(function() {
				$("#slider").responsiveSlides({
					auto : true,
					nav : false,
					speed : 500,
					namespace : "callbacks",
					pager : true,
				});
			});
		</script>
		<script src="assets/front_end_assets/js/jquery.countdown.js"></script>
		<script src="assets/front_end_assets/js/script.js"></script>
		<link rel="stylesheet" href="assets/front_end_assets/css/etalage.css">
		<script src="assets/front_end_assets/js/jquery.etalage.min.js"></script>
		<script>
			jQuery(document).ready(function($) {

				$('#etalage').etalage({
					thumb_image_width : 300,
					thumb_image_height : 400,
					source_image_width : 900,
					source_image_height : 1200,
					show_hint : true,
					click_callback : function(image_anchor, instance_id) {
						alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
					}
				});

			});
		</script>

	</head>
	<body>
		<?php
		include './includes/header_top.php';
 ?>

		<?php
	include './includes/header_botom.php';
 ?>

		<?php
	include './includes/menu.php';
 ?>

		<?php
		if (isset($pages)) {
			if ($pages == 'Category') {
				include './pages/category_content.php';
			} else if ($pages == 'blog') {
				include './pages/blog_content.php';
			} else if ($pages == 'product_details') {
				include './pages/product_details_content.php';
			} else if ($pages == 'cart_page') {
				include './pages/cart_page_content.php';
			} else if ($pages == 'checkout_page') {
				include './pages/checkout_page_content.php';
			} else if ($pages == 'shipping_page') {
				include './pages/shipping_page_content.php';
			} else if ($pages == 'payment_page') {
				include './pages/payment_page_content.php';
			} else if ($pages == 'customer_home_page') {
				include './pages/customer_home_page_content.php';
			} else if ($pages == 'sign_up') {
				include './pages/sign_up_content.php';
			} else if ($pages == 'login') {
				include './pages/login_content.php';
			}
		} else {
			include './pages/home_content.php';
		}
		?>
		<?php
			include './includes/footer.php';
 ?>

		<link href="assets/front_end_assets/css/flexslider.css" rel='stylesheet' type='text/css' />
		<script defer src="assets/front_end_assets/js/jquery.flexslider.js"></script>
		<script type="text/javascript">
			$(function() {
				SyntaxHighlighter.all();
			});
			$(window).load(function() {
				$('.flexslider').flexslider({
					animation : "slide",
					start : function(slider) {
						$('body').removeClass('loading');
					}
				});
			});
		</script>

	</body>
</html>
