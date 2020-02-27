<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="author" content="Abel Tariku">
	<meta name="viewport" content="width=device-width, intital-scale=1.0">
	<title>
		Viddyoze Test
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div id="wrapper" class="page">
		<header id="pageHeader" class="container-fluid">
			<div class="row">
				<!-- Top Navigation -->
				<nav class="col-sm-8 hidden-xs text-right" id="topNav">

					<ul class="list-inline" id="register">
						<li>Cart Details</li>
						<li>Quantity <label id="cart_quantity" name="cart_quantity"><?php echo  $cart_quantity > 0 ? $cart_quantity : "0"; ?></label></li>
						<li>Total <label id="cart_total" name="cart_total">$<?php echo $cart_total > 0 ? $cart_total + $delivery_charges : "0.00"; ?></label></li>
						<li><a href="cart.php">Go to Cart</a></li>
					</ul>
				</nav>
			</div><!-- .row -->
		</header><!-- #pageHeader -->