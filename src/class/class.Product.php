<?php

	/**
	 * 	Product class definition
	 */
	class Product {
		public $table = "products";

		/**
		 * Constructor 
		 */
		public function __construct(){
			$this->get_products();
		}

		/**	
		*  Return all products records
		*/	
		public function get_products($option = "DESC", $parm = "price"){
			global $db;

			$sql  = "SELECT id, name, product_code, price FROM " . $this->table;
			$sql .= " ORDER BY {$parm} {$option} ";

			$result = $db->query($sql);

			confirm($result);

			return $result;
		}

		/**
		 * Method returns total products
		 */
		public function total_products(){
			global $db;

			$sql  = "SELECT COUNT(id) FROM ";
			$sql .= $this->table;


			$result = $db->query($sql);
			$record_count = $result->fetch_array();

			if($result){
				return array_shift($record_count);
			}
		}
	} 