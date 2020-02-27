<table class="table table-condensed table-stripped cartTable">
	<thead>
		<tr>
			<th>QTY</th>
			<th>Product</th>
			<th>Code</th>
			<th class="text-right">Price</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = $cart->fetch_object()): ?>
			<tr>
				<td><?php echo $row->quantity; ?></td>
				<td><?php echo $row->product_name; ?></td>
				<td><?php echo $row->product_code; ?></td>
				<td class="text-right">$<?php echo $row->cart_amount; ?></td>
				<td class="actionRow text-left"> 
					<a href="cart.php?mode=removeitem&cart_id=<?php echo $row->cart_id; ?>" title="Remove an item">
						<span class="glyphicon glyphicon-minus-sign text-danger"></span>
					</a> 
					<a href="cart.php?mode=removeproduct&cart_id=<?php echo $row->cart_id; ?>" title="Remove product">
						<span class="glyphicon glyphicon-remove text-danger"></span>
					</a> 
				</td>
			</tr>


		<?php endwhile; ?>
	</tbody>

	<tfoot>
		<tr>
			<td colspan="3" class="text-right">Delivery Charges</td>
			<td class="text-right">$<?php echo $delivery_charges; ?></td>
		</tr>
		<tr>
			<td colspan="3" class="text-right">TOTAL</td>
			<td class="text-right">$<?php echo ($cart_total + $delivery_charges); ?></td>
		</tr>
	</tfoot>
</table>

<button type="button" class="btn btn-success btn-block" id="btn_confirm">Confirm Order</button>
<button type="button" class="btn btn-success btn-block" id="btn_clear">Clear Cart</button>

