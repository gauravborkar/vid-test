<?php while($method = $delivery->fetch_object()): ?>

<section class="col-xs-12 col-md-4 col-sm-6 col-sm-offset-0 col-md-offset-0">	
    <div class="methodsContainer">
        <div class="methodsMeta">
            <h2 class="h4"> Basket total <?php echo ucwords($method->name); ?></h2>
            <label class="btn btn-danger btn-xs pricelabel">	
                <b>$<?php echo $method->charges; ?></b>
            </label>
        </div><!-- .productMeta -->
    </div><!-- .productContainer -->
</section>

<?php endwhile; ?>