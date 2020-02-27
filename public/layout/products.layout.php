	<!-- Get products from the database  -->
					
	<?php while($product = $products->fetch_object()): ?>
	
		<section class="product col-xs-12 col-md-4">	
			<div class="productContainer">
				<div class="productMeta">
					<h2 class="h4"> <?php echo ucwords($product->name); ?></h2>
					<h2 class="h4"> <?php echo ucwords($product->product_code); ?></h2>
					<label class="btn btn-danger btn-xs pricelabel center-block">	
						<b>$<?php echo $product->price; ?></b>
					</label>
				</div>
				<div class="mt-10">
					<input type="hidden" name="code-<?php echo $product->id; ?>" id="code-<?php echo $product->id; ?>" value="<?php echo $product->product_code; ?>" />
					<input type="hidden" name="price-<?php echo $product->id; ?>" id="price-<?php echo $product->id; ?>" value="<?php echo $product->price; ?>" /> 
					<input type="number" name="quantity-<?php echo $product->id; ?>" id="quantity-<?php echo $product->id; ?>" min="1" max="10" value="1" class="center-block mb-30" required />
					<button name="add_to_basket-<?php echo $product->id; ?>" id="add_to_basket-<?php echo $product->id; ?>" class="btn btn-success btn-xm center-block">Add to Basket</button>
				</div><!-- .productMeta -->
			</div><!-- .productContainer -->
		</section>

	<?php endwhile; ?>
