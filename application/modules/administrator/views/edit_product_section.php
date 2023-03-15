<style>
	/* Tooltip container */
	.tooltip1 {
		position: relative;
		display: inline-block;
		border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
	}

	/* Tooltip text */
	.tooltip1 .tooltiptext {
		visibility: hidden;
		width: 180px;
		background-color: #555;
		color: #fff;
		text-align: center;
		padding: 5px 0;
		border-radius: 6px;

		/* Position the tooltip text */
		position: absolute;
		z-index: 1;
		bottom: 125%;
		left: 50%;
		margin-left: -90px;

		/* Fade in tooltip */
		opacity: 0;
		transition: opacity 1s;
	}

	/* Tooltip arrow */
	.tooltip1 .tooltiptext::after {
		content: "";
		position: absolute;
		top: 100%;
		left: 50%;
		margin-left: -5px;
		border-width: 5px;
		border-style: solid;
		border-color: #555 transparent transparent transparent;
	}

	/* Show the tooltip text when you mouse over the tooltip container */
	.tooltip1:hover .tooltiptext {
		visibility: visible;
		opacity: 1;
	}
</style>

<form name="shipment_received_items_form" id="shipment_received_items_form" method="post" action="">
	<input type="hidden" name="shipment_id" id="shipment_id" value="<?php echo urlencode(base64_encode($shipment_id)); ?>" />

	<input type="hidden" name="total_received_products" id="total_received_products" value="<?php echo $total_received_products + 1; ?>" />

	<input type="hidden" name="product_id" id="product_id" value="<?php echo urlencode(base64_encode($product_id)); ?>" />

	<input type="hidden" name="col_id" id="col_id" value="<?php echo $col_id; ?>" />

	<input type="hidden" name="shipped" id="shipped" value="<?php echo $shipped; ?>" />

	<input type="hidden" name="product_unit" id="product_unit" value="<?php echo $product_unit; ?>" />

	<input type="hidden" name="remaining_received_product" id="remaining_received_product" value="<?php echo $shipped - $received; ?>" />

	<div class="row">
		<!--=== Table ===-->
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th class="hidden-xs">Shipped</th>
						<th class="hidden-xs">Received</th>
						<th class="hidden-xs">Date</th>
						<th class="hidden-xs">Comments</th>
						<!--<th class="hidden-xs" scope="colgroup">height</th>
						<th class="hidden-xs" scope="colgroup">weight</th>
						<th class="hidden-xs" scope="colgroup">length</th>
						<th class="hidden-xs" scope="colgroup">width</th>-->
						<th class="hidden-xs">
							Cubic Ft / Container

							<div class="tooltip1">
								<i class="glyphicon glyphicon-info-sign"></i>

								<span class="tooltiptext tooltip-bottom">
									How we calculate this? <br>

									Width&nbsp;&nbsp;Height&nbsp;&nbsp;Length <br>

									<?php echo $item_width; ?>&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $item_height; ?>&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $item_length; ?> <br>
								</span>
							</div>
						</th>
						<th class="hidden-xs">Total Cubic Ft</th>
					</tr>
				</thead>

				<tbody id="add_more_recevied_items">
					<?php if(!empty($shipmentReceivedItems)) { $sno = 1; ?>
						<?php foreach($shipmentReceivedItems as $key => $val) { ?>
							<input type="hidden" name="row_count" id="row_count<?php echo $sno; ?>" value="<?php echo $sno; ?>" />
							<input type="hidden" name="validate_row" id="validate_row<?php echo $sno; ?>" value="1" />

							<tr>
								<td class="shipment_detailsadmin"><?php echo $sno; ?></td>
								<td class="shipment_detailsadmin"><?php echo $shipped; ?></td>
								<td class="shipment_detailsadmin"><?php echo $val->received; ?></td>
								<td class="shipment_detailsadmin"><?php echo date('m-d-Y', strtotime($val->received_date)); ?></td>
								<td class="shipment_detailsadmin"><?php echo $val->comment; ?></td>
								<td class="shipment_detailsadmin"><?php echo $val->cubic_feet; ?></td>
								<td class="shipment_detailsadmin" id="total_cubic_feet_<?php echo $sno; ?>"><?php echo $val->received * $product_unit; ?></td>
							</tr>
						<?php $sno++; } ?>
					<?php } ?>

					<?php if($shipped != $received) { ?>
						<input type="hidden" name="row_count" id="row_count<?php echo $total_received_products + 1; ?>" value="<?php echo $total_received_products + 1; ?>" />
						<input type="hidden" name="validate_row" id="validate_row<?php echo $total_received_products + 1; ?>" value="0" />

						<tr>
							<td class="shipment_detailsadmin"><?php if(isset($sno)) echo $sno; else echo 1; ?></td>
							<td class="shipment_detailsadmin"><?php echo $shipped; ?></td>
							<td class="shipment_detailsadmin"><input type="text" name="received_items" class="form-control" style="width: 75%;" placeholder="Received Items" id="received_items_<?php echo $total_received_products + 1; ?>" onkeyup="calculateTotalCubicFeet(<?php echo $total_received_products + 1; ?>);" /></td>
							<td class="shipment_detailsadmin">
								<input type="text" name="received_date" class="form-control datepicker1" style="width: 75%;" placeholder="MM-DD-YYYY" /> 
							</td>
							<td class="shipment_detailsadmin"><textarea class="form-control" style="height: 35px ! important; line-height: 0.429 !important; width: 224px !important;" name="comment" placeholder="Comments"></textarea></td>
							<td class="shipment_detailsadmin"><input type="text" name="cubic_feet" class="form-control" style="width: 75%;" placeholder="Cubic Ft / Container" id="cubic_feet_per_container_<?php echo $total_received_products + 1; ?>" onkeyup="calculateTotalCubicFeet(<?php echo $total_received_products + 1; ?>);" value="<?php echo $product_unit; ?>" /></td>
							<td class="shipment_detailsadmin" id="total_cubic_feet_<?php echo $total_received_products + 1; ?>"></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

		<br />
		
		<div class="col-md-12">
			<div class="col-md-10">
				<span id="validate_prev_row_filled"></span>
			</div>

			<div class="col-md-2">
				<?php if($shipped != $received) { ?>
					<a href="javascript: void(0);" class="btn btn-primary" id="add_more_row_btn" onclick="addMoreReceivedItems();">Add More Row</a>
				<?php } ?>
			</div>
		</div>

		<div class="padding-top-10px">
			<div class="col-md-2"></div>

			<div class="col-md-8">
				<br /><br />

				<div class="well">
					<p align="center"><strong>Note: </strong> Data Once added is not editable at later Stage.</p>
				</div>
			</div>

			<div class="col-md-2"></div>

			<div class="col-md-2 align-right">
				<!---<ul class="list-unstyled amount padding-bottom-5px">
					<li><strong>Subtotal:</strong> $11,069</li>
					<li><strong>Delivery:</strong> $5</li>
					<li><strong>VAT (10%):</strong> $1107.40</li>
					<li class="total"><strong>Total:</strong> $12,181.40</li>
				</ul>-->

				<br /><br />

				<div class="buttons">
					<a class="btn btn-default btn-lg" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-print"></i> Print</a>

					<input type="submit" class="btn btn-success btn-lg icon-angle-right" name="save_received_item_btn" id="save_received_item_btn" value="Save Data" disabled="disabled" />
				</div>
			</div>
		</div>
	</div>
</form>

<script type="text/javascript">
	// When the document is ready
	$(document).ready(function() {
		$('.datepicker1').datepicker({
			format: "dd-mm-yyyy"
		});

		$("#shipment_received_items_form").submit(function(e) {
			//alert('Hi');

			e.preventDefault(e);

			var shipment_id = $('#shipment_id').val();
			var product_id = $('#product_id').val();
			var col_id = $('#col_id').val();

			//alert(shipment_id+' :: '+product_id+' :: '+col_id);

			var form = $('#shipment_received_items_form');

			$.ajax({
				type: 'POST',
				url: base_url+'administrator/ViewShipmentAll/saveShipmentReceivedInfo',
				data: form.serialize(),
				success: function(res) {
					//console.log(res);

					var response = res.split('&&&&');

					if(response[0] == 1) {
						$('#item_received_qty'+col_id).html(response[3]);

						$('#validate_row'+response[1]).val(1);

						$('.common_class').addClass('m_show');

						if(response[2] == response[3]) {
							$('#edit_link_col'+col_id).html('');
							$('#add_more_row_btn').hide();
						}

						showEditProductSection(shipment_id, product_id, col_id);
					}

					if(response[0] == 0) {
						alert('Some error occured!!! Please try again.');
					}
				}
			});
		});
	});
</script>