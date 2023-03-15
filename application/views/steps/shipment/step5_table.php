<h3 class="block padding-bottom-10px title_bar"><?php echo $this->lang->line('BookingNotes'); ?></h3>
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
				<label class="radio rd1">
					<input type="radio" class="uniform sh_plan_type1" name="shipping_plan_type" value="Individual Products" 
					<?php if(isset($shipments)    &&  ($shipments->shipping_plan_type=='Individual Products')) { echo 'checked'; }?>
					>
					 <?php echo $this->lang->line('Individualproducts'); ?>
				</label>
			</div>
			<div class="custom_radio_check2">
				<label class="radio rd2">
					<input type="radio" class="uniform sh_plan_type2" name="shipping_plan_type" value="Casepacked Products"
					<?php if(isset($shipments)    &&  ($shipments->shipping_plan_type=='Casepacked Products')) { echo 'checked'; }?>
					>
					<?php echo $this->lang->line('Caseackedproducts'); ?>
				</label>
			</div>
		</div>
		<div class="col-md-3">	
			<label class="labelsize"><?php echo $this->lang->line('Contents'); ?></label>
					<hr class="hr_margin"/>
			<span class="msku"><?php if(isset($products)) echo count($products); ?> Msku</span>
			</br>
			<span class="unit"><?php if(isset($shipments)    &&  ($shipments->unit!='')) { echo $shipments->unit; }?> Unit</span>
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
			<div class="col-md-12 table-responsive">
			<table class="table">
				<thead>
					<tr class="tableShipmenttr">
						<th class="tableShipmenttr"><?php echo $this->lang->line('Merchant_SKU'); ?></th>
						<th class="tableShipmenttr"><?php echo $this->lang->line('ProductName'); ?></th>
						<th class="tableShipmenttr"><?php echo $this->lang->line('Condition'); ?></th>
						<th class="tableShipmenttr" style="width: 81px !important;"><?php echo $this->lang->line('UPS'); ?></th>
						<th class="tableShipmenttr" style="width: 81px !important;"><?php echo $this->lang->line('EAN'); ?></th>
						<th class="tableShipmenttr"><?php echo $this->lang->line('Unit'); ?>(USD)</th>
						<?php if(isset($shipments)    &&  ($shipments->shipping_plan_type=='Individual Products')) {  ?>
							<th class="tableShipmenttr">Item Quantity</th>
						<?php }else{  ?>
						<th class="tableShipmenttr">Number of Cases</th>
						<?php } ?>
						
					</tr>
					</tr>
				</thead>
				<?php if(!empty($products)){ ?>	
				<?php $index = 0; ?>
					<tbody>
				<?php foreach($products as $key=> $row) { ?> 		
						<tr class="tableShipmenttr">
							<td class="tableShipmenttr"><?php echo $row->merchant_SKU; ?></td>
							<td class="tableShipmenttr"><?php echo $row->title; ?></td>
							<td class="tableShipmenttr"><?php echo $row->condition; ?></td>
							<td class="tableShipmenttr"><?php echo $row->UPC; ?></td>
							<td class="tableShipmenttr"><?php echo $row->EAN; ?></td>
							<td class="tableShipmenttr">$<?php echo $row->price; ?></td>
							<?php if(isset($shipments)    &&  ($shipments->shipping_plan_type=='Individual Products')) { ?>
							<td class="tableShipmenttr"><?php echo $row->shipment_quantity; ?></td>
							<?php } else { ?>
							<td class="tableShipmenttr"><?php echo $row->number_of_cases; ?></td>
							<?php } ?>
							
						</tr>
						<?php  $index++;  ?> 
					<?php } ?>
				</tbody>
		 
				<input type="hidden" id="mskustep5"  value="<?php echo $index; ?>" >
			<?php } else{  ?>
				<tbody>
					<tr class="tableShipmenttr">
						<td colspan="5" align="center">
							<div class="col-md-4 col-md-offset-4" id="myDiv">
								<div class="alert alert-warning fade in" id="bar"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Warning!</strong> You need to have atleast 1 product to proceed </div>
								<p class="intro"></p>
							</div>
						</td>
					</tr>	
				</tbody>
		<?php }  ?>	
		
		</table>
	</div>	
</div><br /><br />
<hr />

<script type="text/javascript">
	$(document).ready(function() {
		if($("p").hasClass("intro")){
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
					if(data.step  ==  5 &&  data.shipping_plan_type=="Casepacked Products"){ 
						$("#t2").trigger("click");
						$(".nav-pills a[data-toggle=tab]").on("click", function(e) {
							if(e.originalEvent && $(this).attr("class") == "step"){
								e.preventDefault();
								e.stopImmediatePropagation();
								return true;
							}
						});	
						$("#t3").trigger("click");
						$('#tab3').tab('show');
						$.LoadingOverlay("hide");
						get_thirdStepData(3);
					}else{
						get_fifthStepData(5);
					}
				}
			});
		
		});
	});
</script>