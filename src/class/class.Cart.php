<?php
	require_once 'class.Generic.php';


	class Cart extends Generic{
		public $id;
		public $user_id;
		public $ticket_id;
		public $ticket_name;
		public $quantity;
		public $time;

		/**
		 * Method returns all cart items
		 */
		public function get_cart(){
			global $db;

			$reference_id = trim($_SESSION['session_id']);
			
			$sql  = "SELECT c.id as cart_id, c.quantity as quantity, c.amount as cart_amount,";
			$sql .= " p.id as product_id, p.name as product_name, p.product_code as product_code FROM cart c";
			$sql .= " inner join products p on p.id = c.product_id";
			$sql .= " WHERE cart_reference_id = '{$reference_id}' AND is_confirmed=0";

			$result = $db->query($sql);

			if(!$result){
				die("Database connection error");
			}

			return $result;
		}


		public static function add_to_cart($product_id, $quantity, $price, $code){
			global $db;

			$reference_id = trim($_SESSION['session_id']);

			// Check if ticket_id already exists in the database
			$check_sql  = "SELECT c.id, quantity, amount, p.product_code, p.price FROM cart c";
			$check_sql .= " inner join products p ON c.product_id = p.id";
			$check_sql .= " WHERE product_id = {$product_id} ";
			$check_sql .= " AND cart_reference_id = '{$reference_id}' AND is_confirmed = 0 ";

			$check = $db->query($check_sql);

			if(isset($check->num_rows) && $check->num_rows > 0){ // i.e. if record already exists

				$old_record = $check->fetch_object();
				$old_quantity = $old_record->quantity;
				$product_code = $old_record->product_code;
				$product_price = $old_record->price;
				$old_amount = $old_record->amount;
				
				$new_quantity = $old_quantity + $quantity;
				if($product_code == "R01")
				{
					$new_amount = get_offer_price($new_quantity, $product_price);
				} else {
					$new_amount = $new_quantity * $product_price;;
				}

				

				if($old_record)

				$sql_update  = "UPDATE cart SET quantity = {$new_quantity}, amount = {$new_amount} ";
				$sql_update .= " WHERE product_id = {$product_id} AND cart_reference_id = '{$reference_id}' AND is_confirmed = 0 ";
				$sql_update .= " LIMIT 1 ";

				$update_result = $db->query($sql_update);

				if(!$update_result){
					echo $sql_update . "<br>";
					die("DATABASE QUERY ERROR. FAILED TO UPDATE TO DATABASE");
				}else{
					return true;
				}
			}else{
				if($code == "R01")
				{
					$price = get_offer_price($quantity, $price);
				} else {
					$price = $quantity * $price;
				}


				// If record doesnt exist, add new record
				$sql  = "INSERT INTO cart ";
				$sql .= " (cart_reference_id, product_id, quantity, amount, is_confirmed) ";
				$sql .= " VALUES('$reference_id', $product_id, $quantity, $price, 0) ";

				$result = $db->query($sql);

				if(!$result){
					echo $sql . "<br>";
					die("DATABASE QUERY ERROR. FAILED TO ADD TO DATABASE");
				}else{
					return true;
				}
			}	
		}

		/**
		 * Method counts database cart records
		 */
		public static function count_cart($user_id = 0){
			global $db;

			$sql  = "SELECT sum(quantity) as total_quantity, sum(amount) as total_amount FROM cart ";
			$sql .= " WHERE cart_reference_id = '{$_SESSION['session_id']}' AND is_confirmed=0 ";

			$result = $db->query($sql);

			if(!$result){
				die("Database connection error");
			}

			return $result;
		}

		/**
		 * Method empty the cart
		 */
		public static function empty_cart(){
			global $db;

			$sql = "DELETE FROM cart where cart_reference_id = '{$_SESSION['session_id']}' AND is_confirmed=0  ";

			$result = $db->query($sql);

			if(!$result){
				echo $sql . "<br>";
				die("DATABASE QUERY ERROR. FAILED TO DELETE ITEMS");
			}else{
				return true;
			}
		}

		/**
		 * Method remove item from cart
		 */
		public static function remove_item($cart_id = 0){
			global $db;

			$reference_id = $_SESSION['session_id'];

			// Check if ticket_id already exists in the database
			$check_sql  = "SELECT c.id, quantity, amount, p.product_code, p.price FROM cart c";
			$check_sql .= " inner join products p ON c.product_id = p.id";
			$check_sql .= " WHERE c.id = {$cart_id} ";
			$check_sql .= " AND cart_reference_id = '{$reference_id}' AND is_confirmed = 0 ";

			$check = $db->query($check_sql);

			if(isset($check->num_rows) && $check->num_rows > 0) { // i.e. if record already exists
				$old_record = $check->fetch_object();
				$old_quantity = $old_record->quantity;
				$product_code = $old_record->product_code;
				$product_price = $old_record->price;
				$old_amount = $old_record->amount;
				
				$new_quantity = $old_quantity - 1;

				if($new_quantity > 0) {
					if($product_code == "R01")
					{
						$new_amount = get_offer_price($new_quantity, $product_price);
					} else {
						$new_amount = $new_quantity * $product_price;;
					}
					
					$sql_update  = "UPDATE cart SET quantity = {$new_quantity}, amount = {$new_amount} ";
					$sql_update .= " WHERE id = {$cart_id} AND cart_reference_id = '{$reference_id}' AND is_confirmed = 0 ";
					$sql_update .= " LIMIT 1 ";

					$update_result = $db->query($sql_update);
	
					if(!$update_result){
						echo $sql_update . "<br>";
						die("DATABASE QUERY ERROR. FAILED TO UPDATE TO DATABASE");
					}else{
						return true;
					}
				} else {
					$sql = "DELETE FROM cart where id = {$cart_id} AND is_confirmed=0  ";

					$result = $db->query($sql);

					if(!$result){
						echo $sql . "<br>";
						die("DATABASE QUERY ERROR. FAILED TO DELETE ITEMS");
					}else{
						return true;
					}
				}
			}
		}	
		
		public static function remove_product($cart_id = 0){
			global $db;

			$reference_id = $_SESSION['session_id'];

			$sql = "DELETE FROM cart where id = '{$cart_id}' AND is_confirmed=0  ";

			$result = $db->query($sql);

			if(!$result){
				echo $sql . "<br>";
				die("DATABASE QUERY ERROR. FAILED TO DELETE ITEMS");
			}else{
				return true;
			}
		}
		/**
		 * Method confirm items from cart
		 */
		public static function confirm_cart(){
			global $db;

			$sql_update  = "UPDATE cart SET is_confirmed = 1 ";
			$sql_update .= " WHERE cart_reference_id = '{$_SESSION['session_id']}' AND is_confirmed = 0 ";

			$result = $db->query($sql_update);

			if(!$result){
				echo $sql_update . "<br>";
				die("DATABASE QUERY ERROR. FAILED TO UPDATE TO DATABASE");
			}else{
				return true;
			}
		}	
	}