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
		
			<?php if(!empty($existshipingProduct)){
				$ids	=	array();
				foreach ($existshipingProduct as $val) {
					$ids[]	=	$val->product_id;
				}
			} ?>
			<?php foreach($inventoryData as $row){ ?>
				<tr>
					<td class="checkbox-column">
						<input type="checkbox" name="inventory" class="uniform customCheck" onclick="checkFunction('<?php echo $row->inventory_id; ?>')" id="<?php echo $row->inventory_id; ?>"  value="<?php echo $row->inventory_id; ?>" <?php
						if(!empty($existshipingProduct)){   if (in_array($row->inventory_id, $ids)) echo 'checked="checked"';   }
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
			url: base_url + 'shipping/Shipping/getShipmentProduct',
			success: function(data) {
				displayLoder(loader=2);
				if(data==null){
					$('#continue_btn').attr('disabled', true);
				}else{
					$('#continue_btn').attr('disabled', false);
				}
			},
			error: function() {
				alert('request failed');
			}
		});
	});	
	
	$(function(){ // this will be called when the DOM is ready
		$('.qty').on('input', function (event) { 
			this.value = this.value.replace(/[^0-9]/g, '');
			var val = $(this).val();
			while (val.substring(0, 1) === '0') {   //First character is a '0'.
				val = val.substring(1);             //Trim the leading '0'
			}
			$(this).val(val);
		});
		
	});
</script>
