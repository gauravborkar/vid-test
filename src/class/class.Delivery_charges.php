<?php

	class DeliveryCharges extends Generic {
		public $table = "delivery_charges";

		/**
		 * Get all delivery charges from database
		 */
		public function get_charges(){
			global $db;

			$sql  = "SELECT * FROM " . $this->table;
			$result = $db->query($sql);
			
			confirm($result);

			return $result;
		}

		public static function get_charge_on_total($cart_total){
			global $db;

			$sql  = "SELECT * FROM delivery_charges";
			$sql .= " WHERE min_amount <= {$cart_total} AND max_amount > {$cart_total}";

			$result = $db->query($sql);

			if(isset($result->num_rows) && $result->num_rows > 0) { // i.e. if record already exists
				$obj = $result->fetch_object();
				
				return $obj->charges;
			}
		}
	}