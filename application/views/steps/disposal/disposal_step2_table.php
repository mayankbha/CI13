<table  class="table table-striped table-bordered table-hover table-checkable datatable" >
	<thead>
		<tr>
			<th class="checkbox-column">
				<input  type="checkbox" class="uniform">
			</th>
			<th style="width: 81px !important;"><?php echo $this->lang->line('Merchant_SKU'); ?></th>
			<th style="width: 141px !important;"><?php echo $this->lang->line('Title'); ?></th>
			
			<th style="width: 141px !important;"><?php echo $this->lang->line('EAN'); ?></th>
		
			<th style="width: 141px !important;">In Stock</th>
		</tr>
	</thead>
	<tbody>
		<?php if(!empty($existorderProduct)){ 
			$ids	=	array();
			foreach ($existorderProduct as $val) {
				$ids[]	=	$val->productId;
			}
		} ?>
		<?php foreach($inventoryData as $row){ ?>
			<tr>
				<td class="checkbox-column">
					<input type="checkbox" name="item_inventory" class="uniform customCheck" onclick="add_dispose('<?php echo $row->inventory_id; ?>')" id="dis_<?php echo $row->inventory_id; ?>"  value="<?php echo $row->inventory_id; ?>" 
					<?php
					if(!empty($existorderProduct)){   if (in_array($row->inventory_id, $ids)) echo 'checked="checked"';   }
					?> required />
				</td>
				<td>
					<a href="#"><?php echo $row->merchant_SKU; ?></a>
				</td>
				<td >
					<?php 
						echo $row->title;
					?>
				</td>
		
				<td><?php echo $row->EAN; ?></td>
		
				<td><?php echo $row->total_received; ?></td>
			</tr>
		<?php }?>	
		
	</tbody>
</table>

<script type="text/javascript">
	function add_dispose(id) {
		var disposal_id  =  $('#disposal_id').val();
		if ($("#dis_"+id).is(':checked')) {
			$.ajax({
				type: 'POST',
				url: base_url + 'order/order/update_disposalOrder',
				data: {
					'product_id': id,
					'order_id': disposal_id,
					'addProduct': true
				},
				beforeSend: function() {
					$.LoadingOverlay("show");
				},
				success: function(data) {
					$.LoadingOverlay("hide");
					
					if(data==null){
						$('.button-next').attr('disabled', true);
					}else{
						$('.button-next').attr('disabled', false);
					}
				},
				error: function() {
					alert('request failed');
				}
			});
			} else {
				$.ajax({
					type: 'POST',
					url: base_url + 'order/order/update_disposalOrder',
					data: {
						'product_id': id,
						'order_id': disposal_id,
						'deleteProduct': true
					},
					beforeSend: function() {
						$.LoadingOverlay("show");
					},
					success: function(data) {
						$.LoadingOverlay("hide");
						if(data==null){
							$('.button-next').attr('disabled', true);
						}else{
							$('.button-next').attr('disabled', false);
						}
					},
					error: function() {
						alert('request failed');
					}
				});
		}
	}
</script>