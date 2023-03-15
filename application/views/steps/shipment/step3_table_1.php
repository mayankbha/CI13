
<table class="table" id="custEnvent">
	<thead>
		<tr class="tableShipmenttr">
			<th class="tableShipmenttr"><?php echo $this->lang->line('Merchant_SKU'); ?></th>
			<th class="tableShipmenttr"><?php echo $this->lang->line('ProductName'); ?></th>
			<th class="tableShipmenttr"><?php echo $this->lang->line('Condition'); ?></th>
			<th class="tableShipmenttr" style="width: 81px !important;"><?php echo $this->lang->line('UPS'); ?></th>
			<th class="tableShipmenttr" style="width: 81px !important;"><?php echo $this->lang->line('EAN'); ?></th>
			<th class="tableShipmenttr" ><?php echo $this->lang->line('Unit'); ?>(USD)</th>
			<th class="tableShipmenttr"><?php echo $this->lang->line('Quantity'); ?></th>
			<th class="tableShipmenttr"><?php echo $this->lang->line('Number_of_cases'); ?></th>
			<th class="tableShipmenttr"><?php echo $this->lang->line('Unit_per_case'); ?></th>
			
			<th class="tableShipmenttr"><?php echo $this->lang->line('Remove'); ?></th>
		</tr>
			
		<!--<<tr style="background-color:#EEEEEE;">
			<th class="label_product_table"></th>
			<th class="label_product_table">
				<input type="checkbox" class="uniform"> <?php// echo $this->lang->line('ShowASINFNSKU'); ?>
			</th>
			<th class="label_product_table"></th>
			<th class="label_product_table"></th>
			<th class="label_product_table"></th>
			<th class="label_product_table"></th>
			<th class="label_product_table"></th>
			<th class="label_product_table"></th>
			<th class="label_product_table"></th>
			<th class="label_product_table"></th>
			<th class="label_product_table"></th>-->
		</tr>	
	</thead>
	<?php if(!empty($products)){ ?>	
	<tbody>
	<?php foreach($products as $key=> $row) { ?> 		
		<tr class="txtMult tableShipmenttr">
		
			<td class="tableShipmenttr"><?php echo $row->merchant_SKU; ?></td>
			<td class="tableShipmenttr"><?php echo $row->title; ?></td>
			<td class="tableShipmenttr"><?php echo $row->condition; ?></td>
			<td class="tableShipmenttr"><?php echo $row->UPC; ?></td>
			<td class="tableShipmenttr"><?php echo $row->EAN; ?></td>
			<td class="tableShipmenttr">$<?php echo $row->price; ?></td>

			<td class="tableShipmenttr"><input name="<?php echo $row->product_id; ?>" type="text" class="form-control qty"  id="new<?php echo $row->product_id; ?>" onkeyup="changeQuantity_1('<?php echo $row->product_id; ?>');" value="<?php echo $row->shipment_quantity; ?>" style="width:30%;" required></td>

			<td class="tableShipmenttr"><input name="number_of_cases_<?php echo $row->product_id; ?>" type="text" class="form-control qty "  id="Number_of_cases-<?php echo $row->product_id; ?>" onkeyup="changeQuantity_1('<?php echo $row->product_id; ?>');" value="<?php echo $row->number_of_cases; ?>" style="width:30%;" required></td>
			
			<td class="tableShipmenttr"><input name="unit_per_case_<?php echo $row->product_id; ?>" type="text" class="form-control qty "  id="Unit_per_case-<?php echo $row->product_id; ?>" onkeyup="changeQuantity_1('<?php echo $row->product_id; ?>');" value="<?php echo $row->unit_per_case; ?>" style="width:30%;" required></td>
			
			<td class="tableShipmenttr"><i class="icon-remove" style="padding-left: 22px;" onclick="showDelete_recordPopup('product_to_shipments', 'product_id', <?php echo $row->product_id;?>,3);"></i></i></td>
		</tr>
		<?php } ?>
	</tbody>
		<?php }else{ ?>
		<tbody>
			<tr>
				<td colspan="10" align="center" class="tableShipmenttr">
					<div class="col-md-12 col-md-offset-12">
						<div class="alert alert-warning fade in">  <strong>Warning!</strong> Warning! You need to have atleast 1 product to proceed </div>
					</div>
					<p class="intro"></p>
				</td> 
			</tr>
		</tbody>
	<?php }  ?>	
		
</table>
<style>
.frontflip{
    color: red;
}
</style>
<script type="text/javascript">
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
	
	$(document).ready(function(){
		if($("p").hasClass("intro")){
			$('#continue_btn').attr('disabled', true);
		}else{ 
			$('#continue_btn').attr('disabled', false);
		}
			 
	});
		
</script>