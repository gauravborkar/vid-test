<?php $page_title = "home"; ?>
<?php require_once('../src/intialize.inc.php'); ?>
<?php include_once('layout/head.layout.php'); ?>

<!-- Main Section -->
<main role="main" class="container" id="main">

	<div class="row">
		<h2 class="h3 ml-15" id="products">Products</h2>

		<div class="col-sm-12">
			<div class="row">
				<?php include_once("layout/products.layout.php"); ?>
			</div><!-- .row -->
		</div><!-- .col-sm-8 -->

	</div><!-- .row -->

	<div class="row m-0">
		<div class="col-sm-12 box">
		<h2 class="h3" id="products">Delivery Charges</h2>

			<div class="col-sm-12 mb-15">
				<div class="row">
					<?php include_once("layout/deliverycharges.layout.php"); ?>
				</div><!-- .row -->
			</div><!-- .col-sm-8 -->
		</div>
	</div><!-- .row -->

	<div class="row m-0">
	<div class="col-sm-12 box">
			<h2 class="h3" id="products">Offers</h2>

			<div class="col-sm-16">
				<div class="row">
					<?php include_once("layout/offers.layout.php"); ?>
				</div><!-- .row -->
			</div><!-- .col-sm-8 -->
		</div>
	</div><!-- .row -->
</main>
		
<?php include_once('layout/footer.layout.php'); ?>