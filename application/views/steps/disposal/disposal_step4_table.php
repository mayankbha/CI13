<div class="row spacing_shipping">
	<h3 class="block padding-bottom-10px title_bar">Order Review</h3>
	<div class="col-md-1">
	</div>
	<div class="col-md-3">
		<label class="labelsize">Created Order</label>
		<hr class="hr_margin"/>
		Order Number
		<span>
			<?php if(isset($order) && ($order->order_number)) ?>
		</span>						
	</div>
	<div class="col-md-3">
		<label class="labelsize">Dispose By</label>
		<hr class="hr_margin"/>
		<input name="dispose_by" class="form-control input-width-small datepicker" value="<?php if(isset($order) && ($order->dispose_by)) echo date('m/d/Y',strtotime($order->dispose_by)); ?>" type="text"  />
	</div>
	<div class="col-md-3">
		<label class="labelsize">Contents</label>
		<hr class="hr_margin"/>
		<span> <?php if(isset($items)) echo count($items);?> Msku</span></br>
		<span><?php if(isset($order) && ($order->unit)) echo $order->unit; ?> units</span>
	</div>
</div>

<h3 class="block padding-bottom-10px title_bar">Items</h3>
<table class="table">
	<thead>
		<tr style="border-color:white;">
			<th><?php echo $this->lang->line('Merchant_SKU'); ?></th>
			<th><?php echo $this->lang->line('ProductName'); ?></th>
			<th><?php echo $this->lang->line('Quantity'); ?></th>
			<th>Image Proof</th>
		</tr>
	</thead>
	<?php if(!empty($items)){ ?>	
	<tbody>
	<?php foreach($items as $key=> $row) { ?> 		
		<tr>
			<td><?php echo $row->sku; ?></td>
			<td><?php echo $row->item_name; ?></td>
			<td>
				<?php echo $row->quantity; ?>
			</td>
			<td>
				<?php  if($row->image_proff_needed==1){ echo "Yes";} else{ "N/A"; } ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
		<?php }else{ ?>
		<tbody>
			<tr>
				<td colspan="5" align="center">
					<div class="col-md-4 col-md-offset-4">
						<div class="alert alert-warning fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Warning!</strong> No record in shiping plan. </div>
					</div>
				</td>
			</tr>	
		</tbody>
	<?php }  ?>	
		
</table>
<script type="text/javascript">
$(function(){
	$('.datepicker').datepicker({ minDate: new Date()});
});

$(".button-submit").click(function() {
		var shipby 		= $("input[name=shipby]").val();	
		var track_order = $("input[name=track_order]").val();	
		$.ajax({
            type: 'POST',
            url: base_url + 'order/order/updateOrdler',
            data: {
				'order_status': 2,
				'track_order': track_order,
				'order_shipby':shipby,
                'saveOrder': true
            },
			beforeSend: function() {
				
			},
            success: function(res) {
				window.location.href = base_url + 'order/order/view_order';
            },
            error: function() {
                alert('request failed');
            }
        });
		
	});
	
	//DELETE record of table
function deleteRecord(table, column, id, step) {
		if (table == 'product_to_order') {
            $.ajax({
                type: 'POST',
                url: base_url + 'order/order/deleteRecord',
                data: {
                    'table': table,
                    'column': column,
                    'value': id
                },
                success: function(res) {
                    if (res == 1) {
						$('#deleteRecordModel').modal('hide');
                       getOrderTable(step);
                    } else if (res == 0) {
                        alert('Error occured!!! Please try again later.');
                    }
                }
            });
        }

}

</script>
