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
						.
					</label>
					<div style="padding-left: 32px; margin-top: -20px;"><?php echo $this->lang->line('Individualproducts'); ?></div>
				</div>
				<div class="custom_radio_check2">
					<label class="radio rd2">
						<input type="radio" class="uniform sh_plan_type2" name="shipping_plan_type" value="Casepacked Products"
						<?php if(isset($shipments)    &&  ($shipments->shipping_plan_type=='Casepacked Products')) { echo 'checked'; }?>
						>
						.
					</label>
						<div style="padding-left: 32px; margin-top: -20px;"><?php echo $this->lang->line('Caseackedproducts'); ?></div>
				</div>
			</div>
			<div class="col-md-3">	
				<label class="labelsize"><?php echo $this->lang->line('Contents'); ?></label>
					<hr class="hr_margin"/>
				<span class="msku"><?php if(isset($products)) echo count($products); ?>Msku</span>
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
					<tr class="tableShipmenttr">
						<th class="tableShipmenttr"><?php echo $this->lang->line('Merchant_SKU'); ?></th>
						<th class="tableShipmenttr"><?php echo $this->lang->line('ProductName'); ?></th>
						<th class="tableShipmenttr"><?php echo $this->lang->line('Condition'); ?></th>
						<th class="tableShipmenttr"><?php echo $this->lang->line('Unit'); ?>(USD)</th>
						
						<?php if(isset($shipments)    &&  ($shipments->shipping_plan_type=='Individual Products')) {  ?>
							<th class="tableShipmenttr">Item Quantity</th>
							<th class="tableShipmenttr">Product Label to print</th>
						<?php }else{  ?>
						<th class="tableShipmenttr">Number of Cases</th>
						<th class="tableShipmenttr"><?php echo $this->lang->line('Labeltoprint'); ?></th>
						<?php } ?>
						
						<th class="tableShipmenttr"><?php echo $this->lang->line('Remove'); ?></th>
					</tr>
			
					<?php if(!empty($products)){ ?>
						<?php $index = 0; $cases = 0 ?>
					<?php foreach($products as $key=> $row) { ?> 		
					<tr class="tableShipmenttr">
						
						<td class="tableShipmenttr"><?php echo $row->merchant_SKU; ?></td>
						<td class="tableShipmenttr"><?php echo $row->title; ?></td>
						<td class="tableShipmenttr"><?php echo $row->condition; ?></td>
						<td class="tableShipmenttr">$<?php echo $row->price; ?></td>
						
						<?php if(isset($shipments)    &&  ($shipments->shipping_plan_type=='Individual Products')) { ?>
							<td class="tableShipmenttr"><?php echo $row->shipment_quantity; ?></td>
						<?php } else {
							$cases += $row->number_of_cases;
						?>
						<td class="tableShipmenttr"><?php echo $row->number_of_cases; ?></td>
						<?php } ?>
						
						<td class="tableShipmenttr"><input name="qnty" type="text" class="form-control qty label_generate"  id="label-<?php echo $row->product_id; ?>" onblur="changeLabel('<?php echo $row->product_id; ?>');" value="<?php echo $row->label_to_print; ?>" style="width:82px;"></td>
						<td class="tableShipmenttr"><i class="icon-remove" style="padding-left: 22px;" onclick="showDelete_recordPopup('product_to_shipments', 'product_id', <?php echo $row->product_id;?>,4);"></i></i></td>
					</tr>
					<?php  $index++;  ?>
					<?php } ?>
						<input type="hidden" id="msku"  value="<?php echo $index; ?>" >
					<?php } else{ ?>
						<tr>
						<td colspan="8" align="center">
							<div class="col-md-12 col-md-offset-12">
								<div class="alert alert-warning fade in">  <strong>Warning!</strong> Warning! You need to have atleast 1 product to proceed </div>
							</div>
							<p class="introatep4"></p>
						</td>
						</tr>	
					<?php }  ?>	
				</table>
			</div>	
		</div><br /><br />
			<!--<div class="row" >
				<div class="col-md-12" >
					<div class="col-md-4">
					</div>
					<div class="col-md-2">
						<!--<select class="form-control input-width-medium" id="culture-time" >
							<option value="en-EN" selected="selected">Apply to all</option>
							<option value="de-DE">Apply to all</option>
						</select>-->
					<!--</div>
					<div class="col-md-2">
						<button class="btn btn-success printLabel"><?php //echo $this->lang->line('Printlabelforthispage'); ?></button> 
					</div>
					<div class="col-md-4">
					</div>
				</div>
			</div>-->
			<br />
			<div class="row">
				<div class="col-md-8 col-md-offset-1">
					<div class="alert alert-info fade in">Each unit of Shipment must be labeled with a UPC barcode, print it from here if you don't have it, you can print it from here >></div>
				</div>
				<div class="col-md-2" style="padding-top:10px;">
						<button class="btn btn-success printLabel"><?php echo $this->lang->line('Printlabelforthispage'); ?></button> 
				</div>
			</div>
			
			<h3 class="block padding-bottom-10px title_bar"><?php echo $this->lang->line('need_to_ask'); ?></h3>	</br>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-4">
					<label><?php echo $this->lang->line('How_Many_Cartons'); ?></label>
				</div>
				<?php if(isset($shipments)    &&  ($shipments->shipping_plan_type=='Individual Products')) { ?>
				<div class="col-md-3">
					<input type="text" name="carton" class="form-control qty carton"> 
				</div>
				<div class="col-md-4" style="padding-left:125px;">
					<button onclick="myFunction();" class="btn btn-success pull-left print_carton">Print Label for Carton</button>
				</div>
				<?php } else { ?>
					<div class="col-md-3">
						<input type="text" disabled name="cartonCasepacked" value="<?php echo $cases; ?>" class="form-control qty carton"> 
					</div>
					<div class="col-md-4" style="padding-left:125px; ">
						<button onclick="cartonGenerate();"  class="btn btn-success pull-left">Print Label for Carton</button>
					</div>
				
				<?php } ?>
			</div>
			<br />
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
		var j = 0;
		$.each($('.label_generate'), function(index, value) {
			if(isNaN(parseInt($(this).val()))){ 
			}else{ 
				j += parseInt($(this).val());
			}
		});
		if(isNaN(j)) {
			$('.printLabel').attr('disabled', true);
		}else if(j==0){ 
			$('.printLabel').attr('disabled', true);
		}else{
			$('.printLabel').attr('disabled', false);
		}
	});
	function cartonGenerate() {
		var carton		=	$("input[name=cartonCasepacked]").val();
		if(carton!=''){
			window.location=  base_url + 'shipping/Shipping/printCarton/'+carton+'/0';
		}
	}
	function myFunction() {
		var carton		=	$("input[name=carton]").val();
		if(carton!=''){
			window.location=  base_url + 'shipping/Shipping/printCarton/'+carton+'/0';
		}
	}
	
	$(document).ready(function() { 
		$('.print_carton').attr('disabled', true);
		$(".label_generate").keyup(function(e){ 
				var j = 0;
			$.each($('.label_generate'), function(index, value) {
				if(isNaN(parseInt($(this).val()))){ 
				}else{ 
					j += parseInt($(this).val());
				}
			});
			if(isNaN(j)) {
				$('.printLabel').attr('disabled', true);
			}else if(j==0){ 
				$('.printLabel').attr('disabled', true);
			}else{
				$('.printLabel').attr('disabled', false);
			}
				
		});	
		
		$(".printLabel").click(function(e){ 
				var i = 0;
				$.each($('.label_generate'), function(index, value) { 
					 i += parseInt($(this).val());
				});
				if(i==0){
					$('.printLabel').attr('disabled', true);
				}else{
					window.location=  base_url + 'shipping/Shipping/printLabel/'+i+'/0';
				}
				
		});	
		
		
		$(".carton").keyup(function(){
			var j = parseInt($(this).val());
			if(isNaN(j)) {
				$('.print_carton').attr('disabled', true);
			}else if(j==0){ 
				$('.print_carton').attr('disabled', true);
			}else if(j==''){ 
				$('.print_carton').attr('disabled', true);
			}else{
				$('.print_carton').attr('disabled', false);
			}
		})		
		
		
		

		if($("p").hasClass("introatep4")){
			$('#continue_btn').attr('disabled', true);
			$('.printLabel').attr('disabled', true);
			$('.carton').attr('disabled', true);
		}else{
			$('#continue_btn').attr('disabled', false);
		}
		// executes when HTML-Document is loaded and DOM is ready
				
		$('input[type=radio][name=shipping_plan_type]').change(function() {

		$.ajax({
			url: base_url + 'shipping/Shipping/getShipment',
			beforeSend: function(){
				$.LoadingOverlay("show");
			},
			success: function(data) {
				$.LoadingOverlay("hide");
				var step =	data.step;
				if(data.step  ==  4 &&  data.shipping_plan_type=="Individual Products"){ 
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
				$.ajax({
					type: 'POST',
					url: base_url+'shipping/Shipping/updateShiping',
					data: {'changePackingtypes': true},
					beforeSend: function(){
						$.LoadingOverlay("show");
					},
					success: function(result) {
						if(result.shipment_id){
							$.LoadingOverlay("hide");
							if(step==3){
								get_thirdStepData(3);
							}
						}else{
							
						}
					}
				});

				} else if (data.step  ==  5 &&  data.shipping_plan_type=="Individual Products") {
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
					$.ajax({
						type: 'POST',
						url: base_url+'shipping/Shipping/updateShiping',
						data: {'changePackingtypes': true},
						beforeSend: function(){
							$.LoadingOverlay("show");
						},
						success: function(result) {
							if(result.shipment_id){
								$.LoadingOverlay("hide");
								if(result.step==3){
									get_thirdStepData(3);
								}
							}else{}
						}
					});
				}else{
					$.ajax({
						type: 'POST',
						url: base_url+'shipping/Shipping/updateShiping',
						data: {'changePackingtypes': true},
						beforeSend: function(){
							$.LoadingOverlay("show");
						},
						success: function(result) {
							if(result){
								$.LoadingOverlay("hide");
								if(result.step==3){
									get_thirdStepData(3);
								}else if (result.step==4){
									get_fourthStepData(4);
									updateShipingState(4);
								}else if(result.step==5){
									updateShipingState(4);
									get_fifthStepData(5);
								}

							}else{
								
							}
						}
					});
				}
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