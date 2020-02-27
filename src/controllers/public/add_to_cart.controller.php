<?php
	// Not properly submitted
	if(!isset($_POST['productData'])) {
		header("Location: index.php");
		exit;
	}
	else{
		$product_data = json_decode($_POST["productData"]);

		// if properly submitted
		$product_id = trim(htmlspecialchars($product_data->product_id));
		$quantity   = trim(htmlspecialchars($product_data->quantity));
		$price   = trim(htmlspecialchars($product_data->price));
		$code   = trim(htmlspecialchars($product_data->code));

		if(Cart::add_to_cart($product_id, $quantity, $price, $code)){
			echo "true";
			exit;

		}else{
			echo "failure";
			exit;
		}

	}