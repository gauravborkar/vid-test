<?php //session_start(); ?>
<?php $page_title = "shopping cart"; ?>
<?php require_once('../src/intialize.inc.php'); ?>
<?php include_once('layout/head.layout.php'); ?>

<main role="main" id="main" class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active"><a href="cart.php">Shopping Cart</a></li>
		</ol>
	</div><!-- .row -->
	
	<div class="productHeader row">
		<h2 class="h3 productHeaderTitle">
			Your Cart
		</h2>
		
	</div><!-- .productHeader -->

	<div class="row mainContainer">
		
		<!-- Payment Method - Right Part -->
		<div class="col-sm-8 col-sm-offset-2" id="cartSummary">
			<?php if($cart_quantity == 0): ?>
				<p class="noticeMsg text-center"><span class="fa fa-exclamation-circle"></span>  You cart is empty. Start shopping <a href="index.php" title="All Products">here.</a> </p>
			<?php else: ?>

				<div class="table-reponsive">
					<?php include_once('layout/cart.layout.php'); ?>
				</div><!-- .table-responsive -->
			

			<?php endif; ?>
			
		</div><!-- .col-sm-8 -->

	</div><!-- .row -->
	
</main>

<?php include_once('layout/footer.layout.php'); ?>
