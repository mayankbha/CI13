<table  class="table table-striped table-bordered table-hover table-checkable datatable" >
	<thead>
		<tr>
			<th class="checkbox-column" style="width: 61px !important;">
				<input  type="checkbox" class="uniform">
			</th>
			<th style="width: 81px !important;"><?php echo $this->lang->line('Merchant_SKU'); ?></th>
			<th style="width: 660px !important;"><?php echo $this->lang->line('Title'); ?></th>
			<th style="width: 141px !important;"><?php echo $this->lang->line('Condition'); ?></th>
			<th style="width: 141px !important;"><?php echo $this->lang->line('Cost'); ?></th>
			<th style="width: 141px !important;"><?php echo $this->lang->line('EAN'); ?></th>
			<th style="width: 141px !important;"><?php echo $this->lang->line('UPS'); ?></th>
			<th style="width: 141px !important;"><?php echo $this->lang->line('Price'); ?></th>
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
					<input type="checkbox" name="inventory" class="uniform customCheck" onclick="checkFunctionOrder('<?php echo $row->inventory_id; ?>')" id="check_ord<?php echo $row->inventory_id; ?>"  value="<?php echo $row->inventory_id; ?>" <?php
					if(!empty($existorderProduct)){   if (in_array($row->inventory_id, $ids)) echo 'checked="checked"';   }
					?> >
				</td>
				<td><a href="#"><?php echo $row->merchant_SKU; ?></a></td>
				<td >
				<?php echo $row->title;
				?>
				</td>
				<td><?php echo $row->condition; ?></td>
				<td><input type="text" id="costSh-<?php echo $row->inventory_id; ?>" onblur="changeCostShipment('<?php echo $row->inventory_id; ?>');" class="form-control input-width-mini qty" value="<?php echo $row->cost; ?>"></td>
				<td><?php echo $row->EAN; ?></td>
				<td><?php echo $row->UPC; ?></td>
				<td>$<?php echo $row->price; ?></td>
			</tr>
		<?php }?>	
		
	</tbody>
</table>
<script type="text/javascript"> 
$(document).ready(function() {
		$.ajax({
			url: base_url + 'order/order/getOrderProduct',
			success: function(data) {
				displayLoder(loader=2);
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
	});	
function checkFunctionOrder(id) {
        if ($("#check_ord"+id).is(':checked')) {
			
			$.ajax({
				type: 'GET',
				url: base_url+'order/order/checkproductCost/'+id,
				success: function(res) {
					if(res!=null){
						 $.ajax({
							type: 'POST',
							url: base_url + 'order/order/updateOrder/',
							data: {
								'product_id': id,
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
					}else{
						$("#"+id).attr('checked', false);
						$("#"+id).prop('checked', false); 
						$("#uniform-"+id+"  > span").removeClass ( 'checked' );
						// Unchecks it
						$('#'+id).show();
						$('#err_div1').show();
						$('#errrMsg1').html('You need to enter the cost of the Product Before selecting it');
						setTimeout(function() {
							$('#err_div1').hide();
						}, 5000);
					}
				}
			});
        } else {
            $.ajax({
                type: 'POST',
                url: base_url + 'order/order/updateOrder',
                data: {
                    'item': id,
                    'deleteItem': true
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