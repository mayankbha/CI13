	
		<h3 class="block padding-bottom-10px title_bar"><?php echo $this->lang->line('ShipmentBasics'); ?></h3>
		<div class="row spacing_shipping">
			<div class="col-md-1"></div>
			<div class="col-md-3">
				<label><?php echo $this->lang->line('Shipfrom'); ?></label><br />
				<div class="addressDiv">
					<hr class="hr_margin"/>
					<?php if(!empty($saveaddressDetails)) { ?>
					<input type="hidden" name="shipfrom"  value="<?php echo $saveaddressDetails->address_id; ?> ">
					<?php echo $saveaddressDetails->name; ?> 
					<?php echo $saveaddressDetails->addressline1; ?></br>
					<?php echo $saveaddressDetails->addressline2; ?></br>
					<?php echo $saveaddressDetails->country; ?>
					<?php echo $saveaddressDetails->city; ?>
					<?php echo $saveaddressDetails->zipcode; ?></br>
					<?php echo $saveaddressDetails->contactoffice; ?>
					<?php echo $saveaddressDetails->contactmobile; ?>
					</br>
					<a href='#myModalFullscreen' data-toggle='modal' class="spacing_shipping_custom"><?php echo $this->lang->line('Change'); ?></a>
					&nbsp;&nbsp;&nbsp;
					<?php } else{ ?> 
							<a href='#myModalFullscreen' data-toggle='modal'><?php echo $this->lang->line('Add'); ?></a> 
					<?php } ?>
				</div>
			</div>
			<div class="col-md-2">
				<label class="labelsize"><?php echo $this->lang->line('WarehouseLocation'); ?></label>
				<hr class="hr_margin"/>
				795 Lorem Ipsum, Suite 600<br />
				San industry's, CA 94107 <br />
				P: (000) 111-0101 
			</div>
				
			<div class="col-md-3 customrd">
				<label class="labelsize"><?php echo $this->lang->line('Packingtypes'); ?></label>
				<hr class="hr_margin"/>
				
				
				<div class="custom_radio_check1">
					<label class="radio rd2 radio-inline" >
						<input type="radio" class="uniform sh_plan_type1" name="shipping_plan_type" value="Individual Products" 
						<?php if(isset($shipments)    &&  ($shipments->shipping_plan_type=='Individual Products')) { echo 'checked'; }?>
						>
						.
					</label>
					<div style="padding-left: 32px; margin-top: -20px;"><?php echo $this->lang->line('Individualproducts'); ?></div>
				</div>
				<div class="custom_radio_check2">
					<label class="radio rd2 radio-inline">
						<input type="radio" class="uniform sh_plan_type2" name="shipping_plan_type" value="Casepacked Products"
						<?php if(isset($shipments)    &&  ($shipments->shipping_plan_type=='Casepacked Products')) { echo 'checked'; }?>
						>
						.
					</label>
					<div style="padding-left: 32px; margin-top: -20px;"><?php echo $this->lang->line('Caseackedproducts'); ?></div>
				</div>
			</div>
			<div class="col-md-3">	
			
			</div>
		</div>
		
		<h3 class="block padding-bottom-10px title_bar"><?php echo $this->lang->line('ShipmentQuantity'); ?></h3>
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
			</div>
		</div>
		<div class="row">
			<?php if(isset($shipments)    &&  ($shipments->shipping_plan_type=='Individual Products')) { ?>
				<div class="col-md-12 table-responsive">
					<table class="table">
						<thead>
							<tr class="tableShipmenttr">
								<th class="tableShipmenttr"><?php echo $this->lang->line('Merchant_SKU'); ?></th>
								<th class="tableShipmenttr"><?php echo $this->lang->line('ProductName'); ?></th>
								<th class="tableShipmenttr"><?php echo $this->lang->line('Condition'); ?></th>
								<th class="tableShipmenttr" style="width: 105px !important;"><?php echo $this->lang->line('UPS'); ?></th>
								<th class="tableShipmenttr" style="width: 112px !important;"><?php echo $this->lang->line('EAN'); ?></th>
								<th class="tableShipmenttr"><?php echo $this->lang->line('Unit'); ?>(USD)</th>
								<th style="width: 65px;">Items Quantity</th>
								<th class="tableShipmenttr"><?php echo $this->lang->line('Remove'); ?></th>
							</tr>
						</thead>
						<?php if(!empty($products)){ ?>	
						<tbody>
						<?php foreach($products as $key=> $row) { ?> 
							<tr class="tableShipmenttr">
								<td class="tableShipmenttr"><?php echo $row->merchant_SKU; ?></td>
								<td class="tableShipmenttr" style="width:572px"><?php echo $row->title; ?></td>
								<td class="tableShipmenttr"><?php echo $row->condition; ?>
								</td>
								<td class="tableShipmenttr"><?php echo $row->UPC; ?></td>
								<td class="tableShipmenttr"><?php echo $row->EAN; ?></td>
								<td class="tableShipmenttr">$<?php echo $row->price; ?></td>
								<td style="width: 102px;" class="tableShipmenttr"><input name="<?php echo $row->product_id; ?>" type="text" class="form-control qty"  id="new<?php echo $row->product_id; ?>" onblur="changeQuantity('<?php echo $row->product_id; ?>');" value="<?php echo $row->shipment_quantity; ?>" style="width:87px;" required></td>
								<td class="tableShipmenttr"><i class="icon-remove" style="padding-left: 22px;" onclick="showDelete_recordPopup('product_to_shipments', 'product_id', <?php echo $row->product_id;?>,3);"></i></i></td>
							</tr>
							<?php } ?>
						</tbody>
							<?php }else{ ?>
							<tbody>
								<tr class="tableShipmenttr">
									<td colspan="8" align="center">
										<div class="col-md-12 col-md-offset-12">
											<div class="alert alert-warning fade in">  <strong>Warning!</strong> Warning! You need to have atleast 1 product to proceed </div>
										</div>
										<p class="introstep3"></p>
									</td> 
								</tr>	
							</tbody>
						<?php }  ?>	
					</table>
				</div>	
				<?php } else { ?>
					<div class="col-md-12 table-responsive">
						<table class="table" id="custEnvent">
							<thead>
								<tr class="tableShipmenttr">
									<th class="tableShipmenttr" style="width: 102px;"><?php echo $this->lang->line('Merchant_SKU'); ?></th>
									<th class="tableShipmenttr"><?php echo $this->lang->line('ProductName'); ?></th>
									<th class="tableShipmenttr"><?php echo $this->lang->line('Condition'); ?></th>
									<th class="tableShipmenttr" style="width: 105px !important;"><?php echo $this->lang->line('UPS'); ?></th>
									<th class="tableShipmenttr" style="width: 112px !important;"><?php echo $this->lang->line('EAN'); ?></th>
									<th class="tableShipmenttr"><?php echo $this->lang->line('Unit'); ?></th>
									<th class="tableShipmenttr">Quantity</th>
									<th class="tableShipmenttr"><?php echo $this->lang->line('Number_of_cases'); ?></th>
									<th class="tableShipmenttr"><?php echo $this->lang->line('Unit_per_case'); ?></th>
									
									<th class="tableShipmenttr"><?php echo $this->lang->line('Remove'); ?></th>
								</tr>
									
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

									<td class="tableShipmenttr"><input name="<?php echo $row->product_id; ?>" type="text" class="form-control qty"  id="new<?php echo $row->product_id; ?>" onkeyup="changeQuantity_1('<?php echo $row->product_id; ?>');" value="<?php echo $row->shipment_quantity; ?>" style="width:84%;" required></td>

									<td class="tableShipmenttr"><input name="number_of_cases_<?php echo $row->product_id; ?>" type="text" class="form-control qty "  id="Number_of_cases-<?php echo $row->product_id; ?>" onkeyup="changeQuantity_1('<?php echo $row->product_id; ?>');" value="<?php echo $row->number_of_cases; ?>" style="width:84%;" required></td>
									
									<td class="tableShipmenttr"><input name="unit_per_case_<?php echo $row->product_id; ?>" type="text" class="form-control qty "  id="Unit_per_case-<?php echo $row->product_id; ?>" onkeyup="changeQuantity_1('<?php echo $row->product_id; ?>');" value="<?php echo $row->unit_per_case; ?>" style="width:84%;" required></td>
									
									<td class="tableShipmenttr"><i class="icon-remove" style="padding-left: 22px;" onclick="showDelete_recordPopup('product_to_shipments', 'product_id', <?php echo $row->product_id;?>,3);"></i></i></td>
								</tr>
								<?php } ?>
							</tbody>
								<?php }else{ ?>
								<tbody>
									<tr class="tableShipmenttr">
										<td colspan="10" align="center">
											<div class="col-md-12 col-md-offset-12">
												<div class="alert alert-warning fade in">  <strong>Warning!</strong> Warning! You need to have atleast 1 product to proceed </div>
											</div>
											<p class="introstep3"></p>
										</td> 
									</tr>
								</tbody>
							<?php }  ?>	
		
						</table>
					</div>	
				<?php }  ?>
		</div><br /><br />
		<hr />
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
	$(document).ready(function() {
		if($("p").hasClass("introstep3")){ 
			$('#continue_btn').attr('disabled', true);
		}else{
			$('#continue_btn').attr('disabled', false);
		}
		

		$('input[type=radio][name=shipping_plan_type]').change(function() {
			$.ajax({
				type: 'POST',
				url: base_url+'shipping/Shipping/updateShiping',
				data: {'changePackingtypes': true},
				beforeSend: function(){
					$.LoadingOverlay("show");
				},
				success: function(data) {
					$.LoadingOverlay("hide");
					get_thirdStepData(3);
				}
			});
		});
	});
	
</script>
<style>
.radio-inline{
	cursor: pointer;
    display: inline-block;
    font-weight: normal;
    margin-bottom: 0;
    padding-left: 20px;
    vertical-align: middle;
	color:white ! important;
}
</style>