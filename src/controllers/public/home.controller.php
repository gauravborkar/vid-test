<?php
	$product = new Product;
	$delivery_methods = new DeliveryCharges;
	$cart = new Cart;

	$products   = $product->get_products();
	$delivery = $delivery_methods->get_charges();
	
