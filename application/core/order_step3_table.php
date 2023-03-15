<h3 class="block padding-bottom-10px title_bar"><?php echo $this->lang->line('BookingNotes'); ?></h3>
<div class="row spacing_shipping">
	<div class="col-md-1"></div>
	<div class="col-md-3">
		<label>Ship To </label><br />
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
				<input type="radio" class="uniform" name="order_type" value="1" 
				<?php if(isset($order)    &&  ($order->packing_types==1)) { echo 'checked'; }?>
				>
				.
			</label>
			<div style="padding-left: 32px; margin-top: -20px;"><?php echo $this->lang->line('Individualproducts'); ?></div>
		</div>
		<div class="custom_radio_check2">
			<label class="radio rd2">
				<input type="radio" class="uniform" name="order_type" value="2"
				<?php if(isset($order)    &&  ($order->packing_types==2)) { echo 'checked'; }?>
				>
				.
			</label>
			<div style="padding-left: 32px; margin-top: -20px;"><?php echo $this->lang->line('Caseackedproducts'); ?></div>
		</div>
	</div>
	<div class="col-md-3">	
		<label class="labelsize"><?php echo $this->lang->line('Contents'); ?></label>
			<hr class="hr_margin"/>
		<span class="msku"><?php if(isset($items)) echo count($items); ?>Msku</span>
		</br>
		
	</div>
</div>
		
<h3 class="block padding-bottom-10px title_bar">Order</h3>
	<?php if(isset($order) && $order->packing_types	==	1) {  ?>
	<table class="table table-striped table-bordered table-checkable table-highlight-head table-no-inner-border table-hover">
		<thead>
			<tr style="border-color:white;">
				<th>Sku</th>
				<th>Item Name</th>
				<th>Condition</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>OutBound Charges</th>
				<th>fss</th>
				<th><?php echo $this->lang->line('Remove'); ?></th>
			</tr>
		</thead>
		<?php if(!empty($items)){ ?>	
			<tbody>	
		<?php foreach($items as $key=> $item) { ?>
		
			<tr>
				<td><?php echo $item->sku; ?></td>
				<td><?php echo $item->item_name; ?></td>
				<td>NEW</td>
				<td>$<?php echo $item->unitPrice; ?></td>
				
				
				<td ><input name="<?php echo $item->item_id; ?>" type="text" class="form-control qty"  id="order_<?php echo $item->item_id; ?>" onkeyup="changeorderQuantity('<?php echo $item->item_id; ?>');" value="<?php echo $item->quantity; ?>" style="width:84%;" required></td>
				
				
				<?php if(isset($item->quantity) && ($item->quantity!=null)) {?>
					<td>
						<a type="button" id="popover-content-<?php echo $item->item_id; ?>"  <?php if(isset($item))  $total =$item->item_dimension*$item->quantity*0.22; echo "Item dimension".$item->item_dimension ."*quantity". $item->quantity . "*outbound charge 0.22 =".$total; ?>" data-toggle="popover-x" data-target="#popover-content-<?php echo $item->item_id; ?>" data-placement="left" style="cursor: pointer;">
							<span id="item_unit-<?php echo $item->item_id; ?>">
								<?php $total =$item->item_dimension*$item->quantity*0.22;  
									echo $item->item_dimension ."*". $item->quantity . "* 0.22 =".$total;
								?>
							</span>			
						</a>
						<span id="item_unitCalculation-<?php echo $item->item_id; ?>"></span></td>
						
						<div id="popover-content-<?php echo $item->item_id; ?>" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
							<div>
								<div class="arrow"></div>
								<h3 class="popover-title"><span class="close pull-right" data-dismiss="popover-x">&times;</span>Fee Preview</h3>
							</div>
							<div class="popover-content">
								<div  class="col-md-12">
									<div class="popover-title">
										<span class="pull-right">Amount</span>Type  
									</div>
									<div class="popover-text">
										<span class="pull-right">$0.15</span>Stay  <br />
										<span class="pull-right">$0.15 </span>Initial Freight in  <br />
										<span class="pull-right">$0.15</span>Freight out  <br />
										<span class="pull-right">$.01</span>unit processing fee <br /> 
										<span class="pull-left togglediv">
											<div class="showmenu">
												<i class="icon-sort-down" style="font-size:19px;"></i>     Hide FBA fullfillment fee details
											</div>
										</span>  <br />
											<div class="menu" style="display: none;">
												<span class="pull-right">$0.00</span>Order Handing <br />
												<span class="pull-right">$8.41</span>Pick & Pack <br />
												<span class="pull-right">$0.00</span>Weight Handing <br />
											</div>	
									</div>
									<div class="popover-title2">
										<span class="pull-right">$11.26</span>Fee Estimate  <br />
									</div>
									<div class="popover-content">
										<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
									</div>
								</div>
								<div class="popover-footer1">
									To see estimated fees on all your products  <button type="reset" class="btn btn-sm btn-default">Click here</button>
								</div>
							</div>
						</div>				
						
				<?php } else { ?>
				
					<td>
					<span data-toggle="popover-x" data-target="#popover-content11-<?php echo $item->item_id; ?>" data-placement="left" style="cursor: pointer;"  id="item_unit-<?php echo $item->item_id; ?>"></span>
					
				          	<span id="item_unitCalculation-<?php echo $item->item_id; ?>"></span>
						
						<div id="popover-content11-<?php echo $item->item_id; ?>" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
							<div>
								<div class="arrow"></div>
								<h3 class="popover-title"><span class="close pull-right" data-dismiss="popover-x">&times;</span>Fee Preview</h3>
							</div>
							<div class="popover-content">
								<div  class="col-md-12">
									<div class="popover-title">
										<span class="pull-right">Amount</span>Type  
									</div>
									<div class="popover-text">
										<span class="pull-right">$0.15</span>Stay  <br />
										<span class="pull-right">$0.15 </span>Initial Freight in  <br />
										<span class="pull-right">$0.15</span>Freight out  <br />
										<span class="pull-right">$.01</span>unit processing fee <br /> 
										<span class="pull-left togglediv">
											<div class="showmenu">
												<i class="icon-sort-down" style="font-size:19px;"></i>     Hide FBA fullfillment fee details
											</div>
										</span>  <br />
											<div class="menu" style="display: none;">
												<span class="pull-right">$0.00</span>Order Handing <br />
												<span class="pull-right">$8.41</span>Pick & Pack <br />
												<span class="pull-right">$0.00</span>Weight Handing <br />
											</div>	
									</div>
									<div class="popover-title2">
										<span class="pull-right">$11.26</span>Fee Estimate  <br />
									</div>
									<div class="popover-content">
										<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
									</div>
								</div>
								<div class="popover-footer1">
									To see estimated fees on all your products  <button type="reset" class="btn btn-sm btn-default">Click here</button>
								</div>
							</div>
						</div>
					</td>
				<?php } ?>
				<td>
					<span class="" data-toggle="popover-x" data-target="#123456dd" data-placement="left" style="cursor: pointer;">$10.00</span>
					<div id="123456dd" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
						<div>
							<div class="arrow"></div>
							<h3 class="popover-title"><span class="close pull-right" data-dismiss="popover-x123">&times;</span>Fee Preview</h3>
						</div>
						<div class="popover-content">
							<div  class="col-md-12">
								<div class="popover-title">
									<span class="pull-right">Amount</span>Type  
								</div>
								<div class="popover-text">
									<span class="pull-right">$0.15</span>Stay  <br />
									<span class="pull-right">$0.15 </span>Initial Freight in  <br />
									<span class="pull-right">$0.15</span>Freight out  <br />
									<span class="pull-right">$.01</span>unit processing fee <br /> 
									<span class="pull-left togglediv">
										<div class="showmenu">
											<i class="icon-sort-down" style="font-size:19px;"></i>     Hide FBA fullfillment fee details
										</div>
									</span>  <br />
										<div class="menu" style="display: none;">
											<span class="pull-right">$0.00</span>Order Handing <br />
											<span class="pull-right">$8.41</span>Pick & Pack <br />
											<span class="pull-right">$0.00</span>Weight Handing <br />
										</div>	
								</div>
								<div class="popover-title2">
									<span class="pull-right">$11.26</span>Fee Estimate  <br />
								</div>
								<div class="popover-content">
									<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
								</div>
							</div>
							<div class="popover-footer1">
								To see estimated fees on all your products  <button type="reset" class="btn btn-sm btn-default">Click here</button>
							</div>
								
						</div>
					</div>	
				
				</td>
				<td>
					<i class="icon-remove" style="padding-left: 22px;" onclick="showDelete_recordPopup('product_to_order', 'item_id', <?php echo $item->item_id; ?>,3);"></i>
				</td>
				
			</tr>
		
		<?php } ?>
			<tr>
				<td></td><td></td><td></td><td>Total Item Quantity</td><td>Total Qubic Ft</td><td> Total Outbound Charges</td><td></td>
			</tr>
			<tr>
				<td></td><td></td><td></td><td><span class="unit"><?php if(isset($order) && $order->unit!=null) { echo $order->unit; } else { echo 0; } ?></span></td><td><span class="totalqubicft"><?php if(isset($order) && $order->totalqubicft!=null) { echo $order->totalqubicft; } else { echo 0; } ?></span></td><td> <span class="tataloutbound">$<?php if(isset($order) && $order->tataloutbound!=null) { echo $order->tataloutbound; } else { echo 0; } ?></span></td><td></td>
			</tr>
			</tbody>
		<?php }  ?>
	</table>
	<?php } else {  ?>
	
	<table class="table table-striped table-bordered table-checkable table-highlight-head table-no-inner-border table-hover">
		<thead>
			<tr style="border-color:white;">
				<th>Sku</th>
				<th>Item Name</th>
				<th>Condition</th>
				<th>Price</th>
				<th>Quantity</th>
				<th class="tableShipmenttr"><?php echo $this->lang->line('Number_of_cases'); ?></th>
				<th class="tableShipmenttr"><?php echo $this->lang->line('Unit_per_case'); ?></th>
				<th>OutBound Charges</th>
				<th><?php echo $this->lang->line('Remove'); ?></th>
			</tr>
		</thead>
		<?php if(!empty($items)){ ?>	
			<tbody>	
		<?php foreach($items as $key=> $item) { ?>
		
			<tr>
				<td><?php echo $item->sku; ?></td>
				<td><?php echo $item->item_name; ?></td>
				<td>NEW</td>
				<td>$<?php echo $item->unitPrice; ?></td>
		

				<td class="tableShipmenttr"><input name="o-<?php echo $item->item_id ?>" type="text" class="form-control qty"  id="new-o<?php echo $item->item_id ?>" onkeyup="changeQuantityOrder('<?php echo $item->item_id ?>');" value="<?php echo $item->quantity; ?>"  required></td>

				<td class="tableShipmenttr"><input name="number_of_cases_o<?php echo $item->item_id ?>" type="text" class="form-control qty "  id="Number_of_cases_o-<?php echo $item->item_id ?>" onkeyup="changeQuantityOrder('<?php echo $item->item_id; ?>');" value="<?php echo $item->number_of_cases; ?>"  required></td>
				
				<td class="tableShipmenttr"><input name="unit_per_case_o<?php echo $item->item_id ?>" type="text" class="form-control qty "  id="Unit_per_case_o-<?php echo $item->item_id ?>" onkeyup="changeQuantityOrder('<?php echo $item->item_id; ?>');" value="<?php echo $item->unit_per_case; ?>"  required></td>

				<?php if(isset($item->quantity) && ($item->number_of_cases!=null)) {?>
					<td>
						
					<a type="button" id="popover-content"  data-container="body" data-toggle="popover" data-placement="left" data-content=" <?php if(isset($item))  $total =$item->item_dimension*$item->number_of_cases*0.22;  
								echo "Item dimension".$item->item_dimension ."*number of cases". $item->number_of_cases . "*outbound charge 0.22 =".$total; ?>">
						<span id="item_unit-<?php echo $item->item_id; ?>">
								<?php $total =$item->item_dimension*$item->number_of_cases*0.22;  
									echo $item->item_dimension ."*". $item->number_of_cases . "* 0.22 =".$total;
								?>
						</span>			
					</a>
					
					<span id="item_unitCalculation-<?php echo $item->item_id; ?>"></span>
					</td>
				<?php } else { ?>
					<td><span id="item_unit-<?php echo $item->item_id; ?>"></span></td>
				<?php } ?>
				<td>
					<i class="icon-remove" style="padding-left: 22px;" onclick="showDelete_recordPopup('product_to_order', 'item_id', <?php echo $item->item_id; ?>,3);"></i>
				</td>
				
			</tr>
		
		<?php } ?>
			<tr>
				<td></td><td></td><td></td><td></td><td></td><td>Total Item </td><td>Total Qubic Ft</td><td> Total Outbound Charges</td><td></td>
			</tr>
			<tr>
				<td></td><td></td><td></td><td></td><td></td><td><span class="unit"><?php if(isset($order) && $order->unit!=null) { echo $order->unit; } else { echo 0; } ?></span></td><td><span class="totalqubicft"><?php if(isset($order) && $order->totalqubicft!=null) { echo $order->totalqubicft; } else { echo 0; } ?></span></td><td> <span class="tataloutbound">$<?php if(isset($order) && $order->tataloutbound!=null) { echo $order->tataloutbound; } else { echo 0; } ?></span></td><td></td>
			</tr>
			</tbody>
		<?php }  ?>
	</table>

	<?php } ?>
	<h3 class="block padding-bottom-10px title_bar">
		Palletting
	</h3>
	<div class="row spacing_shipping">
		<div class="col-md-3">
			Do you need Palletting? Please enter Quantity
		</div>
		<div class="col-md-3">
			<input type="text" class="form-control qty" id="no_of_pallets" value="<?php if(isset($order)) echo $order->no_of_pallets; ?>" name="no_of_pallets" required></br>
			<span style="color:#4d7496;">*Will be charged at $8/pallet</span>
			
		</div>
		<div class="col-md-3">
			<span  id="palletmsg" style="color:#4d7496; display:none"></span>
		</div>
	</div>



<script type="text/javascript"> 


function changeQuantityOrder(id){
	var quantity	=	$('#new-o'+id).val(); 
	var number_of_cases	=	$('#Number_of_cases_o-'+id).val();	
	var	unit_per_case	=	$('#Unit_per_case_o-'+id).val();	
	var total			=	number_of_cases*unit_per_case;
	var flag						=		localStorage.getItem('shipmentDisabled');
	if(flag==1){
		$('#err_div1').show();
		$("#errrMsg1").html("Sorry shipment can not edited now");
		setTimeout(function(){ $('#err_div1').hide(); }, 3000);
		$("html, body").animate({ scrollTop: 0 }, "slow");
	}else{
		if(quantity==''){
			$('.button-next').attr('disabled', true);
			$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).addClass("invalid");
		}
		else if(quantity==0){
			$('.button-next').attr('disabled', true);
			$$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).addClass("invalid");
		}
		else if (quantity < total) {
			$('.button-next').attr('disabled', true);
			$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).addClass("invalid");
            $('#err_div1').show();
            $("#errrMsg1").html("Failure! Number of cases can not be greater than product quantity");
            setTimeout(function() {
                $('#err_div1').hide();
            }, 3000);
		} 
		else if (quantity > total) {
			$('.button-next').attr('disabled', true);
			$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).addClass("invalid");
            $('#err_div1').show();
            $("#errrMsg1").html("Failure! Number of cases can not be greater than product quantity");
            setTimeout(function() {
                $('#err_div1').hide();
            }, 3000);
		} 
		else if ((quantity=='' ) && (total=='') ) {
			$('.button-next').attr('disabled', true);
			$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).addClass("invalid");
		} 
		else if((quantity==0 ) && (total==0) ) {
			$('.button-next').attr('disabled', true);
			$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).addClass("invalid");
		}else if(total==quantity){
			$('.button-next').attr('disabled', false);
			$.ajax({
				type: 'POST',
				url: base_url+'order/order/updateOrder',
				data: {'item_id': id,'quantity':quantity, 'number_of_cases':number_of_cases, 'unit_per_case':unit_per_case, 'updateCases': true},
				success: function(res) {
					$('#Number_of_cases_o-'+id).css({'border-color': '#ccc'});
					$('#Unit_per_case_o-'+id).css({'border-color': '#ccc'});
					$('#new-o'+id).css({'border-color': '#ccc'});
					$('#new-o'+id).removeClass("invalid");
					
					$('.unit').text("$"+res.unit);
					$('.totalqubicft').text("$"+res.totalqubicft);
					$('.tataloutbound').text("$"+res.tataloutbound);
					//$('#item_unit-'+id).text("$"+res.outBound);
					
					var unitCalculation	=	parseFloat(res.item_dimension*res.Item_quantity*res.Item_charge).toFixed(2);
					//$('#item_unit-'+id).html('');
					$('#item_unit-'+id).text(res.item_dimension+"*"+res.Item_quantity+"*$"+res.Item_charge+" = $"+unitCalculation);
				}
			});
		}
		else{
			$('.button-next').attr('disabled', true);
			$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
            $('#err_div1').show();
            $("#errrMsg1").html("Failure! Number of cases can not be greater than product quantity");
            setTimeout(function() {
                $('#err_div1').hide();
            }, 3000);
		}
	}
}





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

function changeorderQuantity(id) {
	var quantity	=	$('#order_'+id).val(); 
	
		$.ajax({
			type: 'POST',
			url: base_url+'order/order/updateOrder',
			data: {'item_id': id,'quantity':quantity, 'updateQuantity': true},
			success: function(res) {
				$('.unit').text("$"+res.unit);
				$('.totalqubicft').text("$"+res.totalqubicft);
				$('.tataloutbound').text("$"+res.tataloutbound);
				//$('#item_unit-'+id).text("$"+res.outBound);
				//$('#item_unit-'+id).html('');
				var unitCalculation	=	parseFloat(res.item_dimension*res.Item_quantity*res.Item_charge).toFixed(2);
				$('#item_unit-'+id).text(res.item_dimension+"*"+res.Item_quantity+"*$"+res.Item_charge+" = $"+unitCalculation);
			}
		});
	
}




	$(document).ready(function() { 
		$('input[type=radio][name=order_type]').change(function() {
			$.ajax({
				url: base_url + 'order/order/getOrder',
				beforeSend: function(){
					$.LoadingOverlay("show");
				},
				success: function(data) { 
					$.LoadingOverlay("hide");
					var step =	data.step;
					if(data.step  ==  4 &&  data.packing_types == 1){  
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
						url: base_url+'order/order/updateOrder',
						data: {'changePackingtypes': true},
						beforeSend: function(){
							$.LoadingOverlay("show");
						},
						success: function(result) {
							if(result.order_id){
								$.LoadingOverlay("hide");
								if(step==3){
									getOrderTable(3);
								}
							}else{
								
							}
						}
					});

					} else if (data.step  ==  5 &&  data.packing_types==1) {
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
							url: base_url+'order/order/updateOrder',
							data: {'changePackingtypes': true},
							beforeSend: function(){
								$.LoadingOverlay("show");
							},
							success: function(result) {
								if(result.order_id){
									$.LoadingOverlay("hide");
									if(result.step==3){
										getOrderTable(3);
									}
								}else{}
							}
						});
					}else{
						$.ajax({
							type: 'POST',
							url: base_url+'order/order/updateOrder',
							data: {'changePackingtypes': true},
							beforeSend: function(){
								$.LoadingOverlay("show");
							},
							success: function(result) {
								if(result){
									$.LoadingOverlay("hide");
									if(result.step==3){
										getOrderTable(3);
									}else if (result.step==4){
										getOrderTable(4);
										
									}else if(result.step==5){
										
										getOrderTable(5);
									}

								}else{
									
								}
							}
						});
					}
				}
			});
		});
		
		$("#no_of_pallets").keyup(function(){
			var pallat = $('#no_of_pallets').val();
			if((pallat!=null) && (pallat!=0)){
				$.ajax({
					type: 'POST',
					url: base_url+'order/order/updateOrder',
					data: {'no_of_pallets': pallat,'updatePallet': true},
					success: function(res) {
						$("#palletmsg").show();
						var total	=	pallat*8;
						$("#palletmsg").html(pallat+'*'+"$8= $"+total+" palleting cost");
					}
				});
			}
		});
		
	});
	

$(function () {
	$('[data-toggle="popover"]').popover('hide');
	$('[data-toggle="popover"]').popover();
	alert("loaded");
})

	
</script> 

<link href="http://hubway.upworkdevelopers.com/assets/css/bootstrap-popover-x.css" media="all" rel="stylesheet" type="text/css">
<script src="http://hubway.upworkdevelopers.com/assets/js/bootstrap-popover-x.js" type="text/javascript"></script>

	<style>
.popover-title {
    background-color: #2A4053;
	color:white;
	border-radius: 0px 0px 0px 0px;
}


.popover-text{
	border-right: 1px solid #ebebeb;
	border-left: 1px solid #ebebeb;
    border-radius: 0px 0px 0px 0px;
    font-size: 12px;
    font-weight: normal;
    line-height: 24px;
    margin: 0;
    padding: 8px 14px;
}

.togglediv{
	padding-left:10px;
}

.popover-title2{
    font-size: 12px;
    font-weight: normal;
    line-height: 13px;
    margin: 0;
    padding: 8px 14px;
	border: 1px solid #ebebeb;
    border-radius: 0px 0px 0px 0px;
	background-color:lightgrey;
	color:black;
	
}

.popover-footer1{
	border-top: 0 solid #ebebeb;
    padding: 0px;
}
.showmenu{
	 color: blue;
    cursor: pointer;
    text-decoration: underline;
}

.menu {
    padding-left: 29px;
}

.close{
    color: white;
    float: right;
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    opacity: 1;
    text-shadow: 0 0 0 white;
}

.close:hover{
    color: white;
	opacity: 1;
	text-shadow: 0 0 0 white;
}

.popover12 {
    border-bottom-color: #b3b3b3;
    border-radius: 0;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
}
.popover12 {
    background-clip: padding-box;
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 6px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    left: 0;
    max-width: 276px;
    padding: 1px;
    position: absolute;
    text-align: left;
    top: 0;
    white-space: normal;
    z-index: 1010;
}
</style>
<script type="text/javascript">
	$( document ).ready(function() { 
		localStorage.clear();
		//$("#sample_form")[0].reset();
	});
	
	 $(document).ready(function() {
        $('.showmenu').click(function() {
             $('.menu').toggle();
        });
    });
</script>