<?php
	session_start();

	// Configuration files
	require_once("config/config.php");

	// Functions
	require_once(FUNC_PATH . "functions.php");

	// Class files
	require_once(CLASS_PATH . "class.database.php");
	require_once(CLASS_PATH . "class.Generic.php");

	// Class Files
	require_once(CLASS_PATH . "class.Product.php");

	// Session config
	require_once(CONFIG_PATH . "config.session.php");


	// Class files
	require_once(CLASS_PATH . "class.Delivery_charges.php");
	require_once(CLASS_PATH . "class.Cart.php");

	//session id for cart reference
	if(!isset($_SESSION['session_id']))
	{
		$_SESSION['session_id'] = createGUID();
	}

	$cart_details = cart_count();

	$arr_cart_details = explode("~", $cart_details);

	$cart_quantity = $arr_cart_details[0];
	$cart_total = $arr_cart_details[1];
	$delivery_charges = $arr_cart_details[2];

	if(isset($page_title)){
		require_once(LIB_PATH . "route.php");
	}