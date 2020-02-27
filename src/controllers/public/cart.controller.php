<?php
	if($mode == "clear") {
		
		if(Cart::empty_cart()){
			header("Location: cart.php?status=success");
			exit;
		}else{
			header("Location: cart.php?status=failed");
			exit;
		}
	} else if($mode == "confirm") {
		if(Cart::confirm_cart()){
			$_SESSION['session_id'] = createGUID();
			header("Location: cart.php?status=success");
			exit;
		}else{
			header("Location: cart.php?status=failed");
			exit;
		}
	} else if($mode == "removeitem") {
		if(!isset($_GET['cart_id']) || !is_int((int)$_GET['cart_id'])){
			header("Location: cart.php?status=wrong");
			exit;
		}
		
		$cart_id = (int)$_GET['cart_id'];

		if(Cart::remove_item($cart_id)){
			header("Location: cart.php?status=success");
			exit;
		}else{
			header("Location: cart.php?status=failed");
			exit;
		}
	
	} else if($mode == "removeproduct") {
		if(!isset($_GET['cart_id']) || !is_int((int)$_GET['cart_id'])){
			header("Location: cart.php?status=wrong");
			exit;
		}
		
		$cart_id = (int)$_GET['cart_id'];

		if(Cart::remove_product($cart_id)){
			header("Location: cart.php?status=success");
			exit;
		}else{
			header("Location: cart.php?status=failed");
			exit;
		}
	
	} else {
		$cart_object = new Cart;
		$delivery_charge_object = new DeliveryCharges;

		$cart = $cart_object->get_cart();
	}


