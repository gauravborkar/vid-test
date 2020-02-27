<?php	
		/**
		 * Public page controllers starts
		 */
		$mode = "";
		if(isset($_GET['mode']) && trim($_GET['mode']) != ""){
			$mode = trim($_GET['mode']);
		}

		switch(strtolower($page_title)){

			// index.php
			case "home":
				require_once(PC . 'home.controller.php');
			break;

			case "add to cart":
				require_once(PC . 'add_to_cart.controller.php');
			break;

			
			case "shopping cart":
				require_once(PC . 'cart.controller.php');
			break;

			default:


			break;

		}
		/**************** End Swith - for public page controllers */