<?php
	// Output an HTML message
	function message($msg = ""){
		$output = "";

		if(!empty($msg) || $msg !== "0"){
			$output .= "<p class='message'>";
			$output .= $msg;
			$output .= "</p>";
		}

		return $output;
	}

	/**
	 * A function that checks for query success
	 */
	function confirm($result, $sql = ""){
		global $db;

		if(!$result){
			if(!empty($sql)){
				echo $sql . "<br>";
			}

			die("Database query error " . $db->error);
		}
	}

	// Returns cart items count
	function cart_count(){
		$cart_quantity = 0;
		$cart_total = 0;
		$delivery_charges = 0;

		if(isset($_SESSION['session_id'])){
			$result = Cart::count_cart();

			if(isset($result->num_rows) && $result->num_rows > 0) { // i.e. if record already exists

				$cart_details = $result->fetch_object();
				$cart_quantity = $cart_details->total_quantity;
				$cart_total = $cart_details->total_amount;
			} 

			$delivery_charges = DeliveryCharges::get_charge_on_total($cart_total);
		}

		return $cart_quantity . "~" . $cart_total . "~" . $delivery_charges;
	}

	function createGUID() { 
    
		// Create a token
		$token      = $_SERVER['HTTP_HOST'];
		$token     .= $_SERVER['REQUEST_URI'];
		$token     .= uniqid(rand(), true);
		
		// GUID is 128-bit hex
		$hash        = strtoupper(md5($token));
		
		// Create formatted GUID
		$guid        = '';
		
		// GUID format is XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX for readability    
		$guid .= substr($hash,  0,  8) . 
			 '-' .
			 substr($hash,  8,  4) .
			 '-' .
			 substr($hash, 12,  4) .
			 '-' .
			 substr($hash, 16,  4) .
			 '-' .
			 substr($hash, 20, 12);
				
		return $guid;
	
	}

	function get_offer_price($quantity, $price)
	{
		if ($quantity % 2 == 0 ) {
			//calculate here buy one get one half price
			$real = ($quantity/2) * $price;
			$half = ($quantity/2) * ($price/2);

			$total = $real+$half;

		} else {
			$quantity = $quantity-1;

			$real = ($quantity/2) * $price;
			$half = ($quantity/2) * ($price/2);

			$total = $real + $half + $price;

		}

		return $total;
	}

	/**
	 * Autoload magic function - loads classes automatically
	 */
	function __autoload($class_name){
		if(! require_once('class.' . $class_name . '.inc')){

			die("{$class_name} class could not be loaded. Please check if it is in the correct directory");
		}
		
	}
