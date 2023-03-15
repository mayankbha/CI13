
<style>
.custm_display{
	display:<?php  if(isset($order)  && ($order->totaloutbound > 0 )) { echo "block";  }else{ echo "none"; } ?>
}
.modelcolor .modal-header{
	 background-color: #4D7496 ! improtant;
	 color:white ! improtant;
}
.modal-title{
	color:white ! improtant;
}
.closebutton{
	color:white ! important;
}
.glyphicon {
    display: inline-block;
    font-family: "Glyphicons Halflings";
    font-size: 12px ! improtant;
    font-style: normal;
    font-weight: normal;
    line-height: 1;
    position: relative;
    top: 1px;
}
</style>
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
		
	<div class="col-md-2 customrd">
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
	<div class="col-md-2">
		<label class="labelsize">Ship By</label>
		<hr class="hr_margin"/>
		<input name="shipby3" class="step3databylok form-control datepicker" value="<?php if(isset($order)) echo  date('Y-m-d',strtotime($order->order_shipby)); ?>" type="text" required />
	</div>
	<div class="col-md-2">	
		<label class="labelsize"><?php echo $this->lang->line('Contents'); ?></label>
			<hr class="hr_margin"/>
		<span class="msku"><?php if(isset($items)) echo count($items); ?>Msku</span>
		</br>
		
	</div>
</div>
<a  href="#myModal" class="pull-right" data-toggle="modal" >How we are calculating this</a>
<h3 class="block padding-bottom-10px title_bar">Order</h3>

	<?php if(isset($order) && $order->packing_types	==	1) {  ?>
	<table class="table table-striped table-bordered table-checkable table-highlight-head table-no-inner-border table-hover">
		<thead>
			<tr style="border-color:white;">
				<th>Sku</th>
				<th>Item Name</th>
				<th style="text-align:center;width:11%;">Condition</th>
				<th style="text-align:center;width:11%;">Price</th>
				<th style="text-align:center;width:11%;">In Stock</th>
				<th style="text-align:center;width:11%;">Quantity</th>
				
				<th class="">OutBound Charges</th>
			
				<th style="width:5%;"></th>
			</tr>
		</thead>
		<?php if(!empty($items)){ ?>	
			<tbody>	
		<?php foreach($items as $key=> $item) { ?>
		
			<tr>
				<td><?php echo $item->sku; ?></td>
				<td><?php echo $item->item_name; ?></td>
				<td style="text-align:center;">NEW</td>
				<td style="text-align:center;">$<?php echo $item->unitPrice; ?></td>
				<td style="text-align:center;" ><input type="hidden" id="in_stock_t<?php echo $item->item_id; ?>" value="<?php echo $item->in_stock; ?>"> <?php echo $item->in_stock; ?></td>
				
				<td style="text-align:center;"><input name="<?php echo $item->item_id; ?>" type="text" class="form-control qty"  id="order_<?php echo $item->item_id; ?>" onblur="changeorderQuantity('<?php echo $item->item_id; ?>');" value="<?php echo $item->quantity; ?>" style="width:88%;" required></td>
				
				
				<?php if(isset($item->quantity) && ($item->quantity!=null)) {?>
					<td class="" id="item_unit-<?php echo $item->item_id; ?> "style="text-align:center;">
						<?php $total =$item->item_dimension*$item->quantity*0.22;  
							echo '$'.$total;
						?>
					</td>
				<?php } else{  ?>
					<td class="" id="item_unit-<?php echo $item->item_id; ?>" style="text-align:center;">
					<?php $total =$item->item_dimension*$item->quantity*0.22; 
						echo "$".$total;
					?>	
					</td>
				<?php }   ?>
				<td style="text-align:center;">
					<i class="icon-remove" onclick="showDelete_recordPopup('product_to_order', 'item_id', <?php echo $item->item_id; ?>,3);"></i>
				</td>
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
					<p class="introOrderstep3"></p>
				</td> 
			</tr>
		</tbody>
		<?php }  ?>	
	</table>
	<br />
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-2">
		</div>
		<div class="col-md-4 custm_display  pull-right">
				Total Outbound Charges&nbsp;&nbsp;<i class="glyphicon glyphicon-arrow-right"></i>&nbsp;&nbsp;<span class="totaloutbound">$<?php if(isset($order) && $order->totaloutbound!=null) { echo $order->totaloutbound; } else { echo 0; } ?></span>
		</div>
	</div>
	<?php } else {  ?>
	
	<table class="table table-striped table-bordered table-checkable table-highlight-head table-no-inner-border table-hover">
		<thead>
			<tr style="border-color:white;">
				<th>Sku</th>
				<th>Item Name</th>
				<th style="text-align:center;">Condition</th>
				<th style="text-align:center;">Price</th>
				<th style="text-align:center;">In Stock</th>
				<th style="text-align:center;">Quantity</th>
				<th class="tableShipmenttr"><?php echo $this->lang->line('Number_of_cases'); ?></th>
				<th class="tableShipmenttr"><?php echo $this->lang->line('Unit_per_case'); ?></th>
				<th style="text-align:center;" class="custm_display">OutBound Charges</th>
				<th></th>
			</tr>
		</thead>
		<?php if(!empty($items)){ ?>	
			<tbody>	
		<?php foreach($items as $key=> $item) { ?>
		
			<tr>
				<td><?php echo $item->sku; ?></td>
				<td><?php echo $item->item_name; ?></td>
				<td style="text-align:center;">NEW</td>
				<td style="text-align:center;">$<?php echo $item->unitPrice; ?></td>
				<td style="text-align:center;" ><input type="hidden" id="in_stock_<?php echo $item->item_id ?>" value="<?php echo $item->in_stock; ?>"> <?php echo $item->in_stock; ?><?php echo $item->in_stock; ?></td>

				<td style="text-align:center;" class="tableShipmenttr"><input name="o-<?php echo $item->item_id ?>" type="text" class="form-control qty"  id="new-o<?php echo $item->item_id ?>" onkeyup="changeQuantityOrder('<?php echo $item->item_id ?>');" value="<?php echo $item->quantity; ?>"  required></td>

				<td style="text-align:center;" class="tableShipmenttr"><input name="number_of_cases_o<?php echo $item->item_id ?>" type="text" class="form-control qty "  id="Number_of_cases_o-<?php echo $item->item_id ?>" onkeyup="changeQuantityOrder('<?php echo $item->item_id; ?>');" value="<?php echo $item->number_of_cases; ?>"  required></td>
				
				<td style="text-align:center;" class="tableShipmenttr"><input name="unit_per_case_o<?php echo $item->item_id ?>" type="text" class="form-control qty "  id="Unit_per_case_o-<?php echo $item->item_id ?>" onkeyup="changeQuantityOrder('<?php echo $item->item_id; ?>');" value="<?php echo $item->unit_per_case; ?>"  required></td>

				<?php if(isset($item->quantity) && ($item->number_of_cases!=null)) {?>
					<td style="text-align:center;" id="item_unit-<?php echo $item->item_id; ?>" class="custm_display">
					<?php $total =$item->item_dimension*$item->number_of_cases*0.22;  
						echo "$".$total;
					?>
					</td>
				<?php } else{  ?>
					<td id="item_unit-<?php echo $item->item_id; ?>"style="text-align:center;">
						<?php $total =$item->item_dimension*$item->number_of_cases*0.22;  
							echo "$".$total;
						?>
					</td>
				<?php }   ?>
				<td>
					<i class="icon-remove" style="padding-left: 22px;" onclick="showDelete_recordPopup('product_to_order', 'item_id', <?php echo $item->item_id; ?>,3);"></i>
				</td>
				
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
					<p class="introOrderstep3"></p>
				</td> 
			</tr>
		</tbody>
		<?php }  ?>	
	</table>
	<br />
		<div class="row">
		  <div class="col-md-3">
		  </div>
			<div class="col-md-3">
				<!--Total Item Quantity&nbsp;&nbsp;<i class="glyphicon glyphicon-arrow-right"></i>$10.00-->
		  </div>
			<div class="col-md-2">
				<!--Total Item Quantity&nbsp;&nbsp;<i class="glyphicon glyphicon-arrow-right"></i>$10.00
				<!--Total Qubic Ft&nbsp;&nbsp;<i class="glyphicon glyphicon-arrow-right"></i>$660.00-->
		  </div>
		 <div class="col-md-4 custm_display  pull-right">
				Total Outbound Charges&nbsp;&nbsp;<i class="glyphicon glyphicon-arrow-right"></i>&nbsp;&nbsp;$<?php if(isset($order) && $order->totaloutbound!=null) { echo $order->totaloutbound; } else { echo 0; } ?></span>
			</div>
		</div>

	<?php } ?>

	
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modelcolor" style="background-color:#4D7496;">
        <button type="button" class="close closebutton" data-dismiss="modal">&times;</button>
        <center>
		
			<span class="modal-title" style="color:white;font-size: 18px;font-weight:200;">Item Dimension </span> <i class="glyphicon glyphicon-remove" style="color:white;font-size: 12px ! improtant;"></i> <span style="color:white;font-size: 18px;font-weight:200;"> $0.22 </span> <i class="glyphicon glyphicon-remove" style="color:white;font-size: 12px ! improtant;"></i> <span style="color:white;font-size: 18px;font-weight:200;">Item Quantity </span>
			
		</center>
      </div>
      <div class="modal-body">
        <div class="row" style="font-size: initial;">
			<div class="col-md-12" >
				Item Dimension
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="glyphicon glyphicon-arrow-right"></i>
					&nbsp;&nbsp;&nbsp;&nbsp;
				Total cubic Feet Dimension of product
			</div>
			</br>
			<div class="col-md-12" >
				$0.22&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<i class="glyphicon glyphicon-arrow-right"></i>
					&nbsp;&nbsp;&nbsp;&nbsp;
				Outbound Charge( Fixed )
			</div>
		</div>
      </div>
      <div class="modal-footer" style="padding: 4px 28px 6px;">
        <center>
			<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
		</center>
	  </div>
    </div>

  </div>
</div>
<script type="text/javascript"> 
var image  	=	"<img src='"+base_url+"assets/img/multiply.png' width='10'>";

function changeQuantityOrder(id){
	var quantity			=	parseInt($('#new-o'+id).val()); 
	var	in_stock			=	parseInt($('#in_stock_'+id).val());
	var number_of_cases		=	parseInt($('#Number_of_cases_o-'+id).val());	
	var	unit_per_case		=	parseInt($('#Unit_per_case_o-'+id).val());	
	var total				=	number_of_cases*unit_per_case;
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
		}else if(quantity >= in_stock) {
			$('.button-next').attr('disabled', true);
			$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).addClass("invalid");
			$('#err_div1').show();
			$("#errrMsg1").html("Info!  quantity can not be greater than in stock quantity");
			setTimeout(function() {
				$('#err_div1').hide();
			}, 3000);
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
					
					//$('.unit').text("$"+res.unit);
					//$('.totalqubicft').text("$"+res.totalqubicft);
					$('.totaloutbound').text("$"+res.totaloutbound);
					//$('#item_unit-'+id).html("$"+res.outBound);
					$('.custm_display').show();
					var unitCalculation	=	parseFloat(res.item_dimension*number_of_cases*res.Item_charge).toFixed(2);
					//$('#item_unit-'+id).html('');
					$('#item_unit-'+id).text("$"+unitCalculation);
					$('#popcontentdata_'+id).html('');
					$('#popcontentdata_'+id).html(number_of_cases+ image +res.item_dimension+image+res.Item_charge+"="+"$"+unitCalculation);
					$('#totalpopcontentdata_'+id).html('');
					$('#totalpopcontentdata_'+id).html(number_of_cases+ image +res.item_dimension+image+res.Item_charge+"="+"$"+unitCalculation);
					$('.custom-alert').hide();
				}
			});
		}
		else{
			$('#new-o'+id).val(''); 
			$('.button-next').attr('disabled', true);
			$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
            $('#err_div1').show();
			$('#item_unit-'+id).text('');
			$('#popcontentdata_'+id).html('');
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
	var	in_stock	=	$('#in_stock_t'+id).val();
	
	if(parseInt(quantity) <= parseInt(in_stock)){
		$.ajax({
			type: 'POST',
			url: base_url+'order/order/updateOrder',
			data: {'item_id': id,'quantity':quantity, 'updateQuantity': true},
			success: function(res) {
				//$('.unit').text("$"+res.unit);
				//$('.totalqubicft').text("$"+res.totalqubicft);
				$('.totaloutbound').text("$"+res.totaloutbound);
				//$('#item_unit-'+id).text("$"+res.outBound);
				//$('#item_unit-'+id).html('');
				$('#item_unittotal'+id).text("$"+res.outBound);
				$('.custm_display').show();
				if(res.totaloutbound==0){
					$('.custm_display').hide();
				}
				
				
				var unitCalculation	=	parseFloat(res.item_dimension*res.Item_quantity*res.Item_charge).toFixed(2);
				//$('#item_unit-'+id).text("$"+unitCalculation);
				$('#popcontentdata_'+id).html(res.Item_quantity+image+res.item_dimension+image+res.Item_charge+"="+"$"+unitCalculation);
				//$('#totalpopcontentdata_'+id).text("$"+unitCalculation);
				$('.custom-alert').hide();	
				$('#item_unit-'+id).html('$'+unitCalculation);				
			}
		});
		$('.button-next').attr('disabled', false);
	}else{
		$('#item_unit-'+id).html('');
		$('#order_'+id).val('');
		$('#popcontentdata_'+id).html('');
		$('.button-next').attr('disabled', true);
		$('#err_div1').show();
        $("#errrMsg1").html("Info!  quantity can not be greater than in stock quantity");
		setTimeout(function() {
			$('#err_div1').hide();
		}, 3000);
	}
}

	$(document).ready(function() {
		$('.datepicker').datepicker({ minDate: new Date()});
		$("#myPopover123").hover(function(){
			$("#myPopover123").toggle();
		});
		 
	
		$.validator.messages.required = "";
		if($("p").hasClass("introOrderstep3")){ 
			$('.button-next').attr('disabled', true);
		}else{
			$('.button-next').attr('disabled', false);
		}

		$('input[type=radio][name=order_type]').change(function() {
			$.ajax({
				type: 'POST',
				url: base_url+'order/order/updateOrder',
				data: {'changePackingtypes': true},
				beforeSend: function(){
					$.LoadingOverlay("show");
				},
				success: function(result) {
					if(result.packing_types){
						$.LoadingOverlay("hide");
						if(result.step==3){
							getOrderTable(3);
						}
					}else{
						
					}
				}
			});
		});
	});
</script> 
