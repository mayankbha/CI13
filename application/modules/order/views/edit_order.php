<style>
.tab-pane{
	min-height:100px;
}
</style>

<div id="content">
	<div class="container">
		<!-- Breadcrumbs line -->
		<div class="crumbs">
			<ul id="breadcrumbs" class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url('dashboard/Dashboard'); ?>"><?php echo $this->lang->line('Dashboard_Title'); ?></a>
				</li>
				<li class="current">
					<a href="#" title="">Update Order</a>
				</li>
			</ul>
		</div>  
</br>
</br>
</br>
</br>
			
		
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable tabbable-custom tabbable-full-width">
					<div class="tab-pane" >
						<form id="order_menual_form" class="form-horizontal" >
							<input type="hidden" name="order_id" value="<?php if(isset($order)) echo $order->order_id; ?>">
							<div class="col-md-12 form-vertical no-margin">
								<div class="widget">
									<div class="widget-content">
										<div class="row">
											<div class="col-md-6">
												<div class="widget-content">
													<div class="panel-group" id="accordion">
														<div class="panel panel-default ">
															<div class="panel-title block padding-bottom-10px title_bar">
																<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" id="collapsefirst" style="color:white ! important;text-decoration:none ! important;">Buyer Address
																</a>
															</div>
															<div id="collapseOne" class="panel-collapse collapse in">
																<div class="panel-body answer">
																	<div class="col-md-12">
																		<div class="row">
																			<div class="col-md-12 answer">
																				<div class="form-group">
																					<label class="col-md-4 control-label">Recipient Name:</label>
																					<div class="col-md-8">
																						<input type="text" name="buyer_recipientname" class="form-control required" value="<?php if(isset($order)) echo $order->buyer_recipientname; ?>" placeholder="Recipient Name">
																					<br /></div>
																				</div>
																				<div class="form-group">
																					<label class="col-md-4 control-label">Company Name:</label>
																					<div class="col-md-8"><input type="text" name="buyer_companyname" class="form-control required" value="<?php if(isset($order)) echo $order->buyer_companyname; ?>" placeholder="Company Name"></div>
																				</div>
																			</div>
																			
																		</div> <!-- /.row -->
																	
																		<div class="row">
																			<div class="col-md-12 answer">
																				<div class="form-group">
																					<label class="col-md-4 control-label">Address Line 1:</label>
																					<div class="col-md-8"><input type="text" name="buyer_addressline1" class="form-control required" value="<?php if(isset($order)) echo $order->buyer_addressline1; ?>" placeholder="Address Line 1"><br /></div>
																				</div>

																				<div class="form-group">
																					<label class="col-md-4 control-label">Address Line 2:</label>
																					<div class="col-md-8"><input type="text" name="buyer_addressline2" class="form-control" value="<?php if(isset($order)) echo $order->buyer_addressline2; ?>" placeholder="Address Line 2"></div>
																				</div>
																			</div>
																			
																		</div> <!-- /.row -->
																		
																		<div class="row">
																			<div class="col-md-12 answer">
																			
																				<div class="form-group">
																					<label class="col-md-4 control-label">Country:</label>
																					<div class="col-md-8">
																						<select name="buyer_country" class="form-control required" id="country">
																					<?php foreach($allcountry as $Crow){?>
																					<option value="<?php echo $Crow->id; ?>" <?php if(isset($order) && ($order->buyer_country == $Crow->id)){ echo 'selected="selected"';} ?>><?php echo $Crow->name; ?></option>
																					<?php }?>
																					</select>
																					</div>
																				</div>

																				<div class="form-group">
																					<label class="col-md-4 control-label">State:</label>
																					<div class="col-md-8">
																					
																					<select name="buyer_state" class="form-control required" id="state">
									<option value="" Selected>Select State</option>	
									<option value="<?php echo $state->id; ?>" <?php if (!empty($order->buyer_state)){ echo 'selected="selected"'; }else{echo '';} ?>><?php echo $state->name; ?></option>									
								</select>
																						
																					
																					</div>
																				</div>
																				
																				<div class="form-group">
																					<label class="col-md-4 control-label"><?php echo $this->lang->line('City'); ?>:</label>
																					<div class="col-md-8">
																					
																				<select name="buyer_city" class="form-control required" id="city">
									<option value="" Selected>Select City</option>
									<option value="<?php echo $city->id; ?>" <?php if (!empty($city)){ echo 'selected="selected"';}else{echo '';} ?>><?php echo $city->name; ?></option>	
								</select>
																						
																						
																					</div>
																				</div>
																				  
																			</div>
																			
																		</div> <!-- /.row -->
																		
																		
																		
																		<div class="row">
																			<div class="col-md-12 answer">
																				<div class="form-group">
																					<label class="col-md-4 control-label">Zipcode:</label>
																					<div class="col-md-8">
																						<input type="text" name="buyer_zip" class="form-control required" value="<?php if(isset($order)) echo $order->buyer_zip; ?>" data-mask="99999" placeholder="Zipcode"><br />
																					</div>
																				</div>

																				<div class="form-group">
																					<label class="col-md-4 control-label">Contact - Office:</label>
																					<div class="col-md-8"><input type="text" name="buyer_contactoffice" class="form-control required" value="<?php if(isset($order)) echo $order->buyer_contactoffice; ?>" placeholder="Contact - Office"></div>
																				</div>
																			</div>
																		</div> <!-- /.row -->
																		
																		<div class="row">
																			<div class="col-md-12 answer" >
																				<div class="form-group">
																					<label class="col-md-4 control-label">Contact - Mobile:</label>
																					<div class="col-md-8">
																						<input type="text" name="buyer_contactphone" data-mask="(999) 999-9999" class="form-control required" value="<?php if(isset($order)) echo $order->buyer_contactphone; ?>" placeholder="Contact - Mobile"><br />
																					</div>
																				</div>
																				
																				<div class="form-group">
																					<label class="col-md-4 control-label">Email:</label>
																					<div class="col-md-8"><input type="email" name="buyer_email" class="form-control required" value="<?php if(isset($order)) echo $order->buyer_email; ?>" placeholder="Email"></div>
																				</div>
																			</div>
																			
																		</div> <!-- /.row -->
																		
																		
																	</div>	
														
																</div>
															</div>
														</div>
														
														<div class="panel panel-default">
															
															<div class="panel-title block padding-bottom-10px title_bar">
																<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse_add" style="color:white ! important;text-decoration:none ! important;">
																</a>
																<span class="accordion-toggle">
																	Ship To Address
																</span>
																<input class="coupon_question" type="checkbox" name="coupon_question" checked />
															</h3> 
															</div>
														
															<div  class="" id="collapse_add" class="panel-collapse collapse">
																<div class="panel-body recipientNameaddress">
																	 <div class="row">
																		<div class="col-md-12" >
																			<div class="form-group">
																				<label class="col-md-4 control-label">Recipient Name:</label>
																				<div class="col-md-8">
																					<input type="text" name="shipto_recipientname" class="form-control required" value="<?php if(isset($order)) echo $order->shipto_recipientname; ?>" placeholder="Recipient Name">
																				<br /></div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-4 control-label">Company Name:</label>
																				<div class="col-md-8"><input type="text" name="shipto_companyname" class="form-control required" value="<?php if(isset($order)) echo $order->shipto_companyname; ?>" placeholder="Company Name"></div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-4 control-label">Address Line 1:</label>
																				<div class="col-md-8"><input type="text" name="shipto_addressline1" class="form-control required" value="<?php if(isset($order)) echo $order->shipto_addressline1; ?>" placeholder="Address Line 1"><br /></div>
																			</div>

																			<div class="form-group">
																				<label class="col-md-4 control-label">Address Line 2:</label>
																				<div class="col-md-8"><input type="text" name="shipto_addressline2" class="form-control" value="<?php if(isset($order)) echo $order->shipto_addressline2; ?>" placeholder="Address Line 2"></div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-4 control-label">Country:</label>
																				<div class="col-md-8">
																				<select name="shipto_country" class="form-control required" id="country1">
																					<?php foreach($allcountry as $Crow){?>
																					<option value="<?php echo $Crow->id; ?>" <?php if(isset($order) && ($order->shipto_country == $Crow->id)){ echo 'selected="selected"';} ?>><?php echo $Crow->name; ?></option>
																					<?php }?>
																					</select>
																				</div>
																			</div>
																		
																			<div class="form-group">
																				<label class="col-md-4 control-label">State:</label>
																				<div class="col-md-8">
																					<select name="shipto_state" class="form-control required" id="state1">
																				<option value="" Selected>Select State</option>	
																		<option value="<?php echo $ship_state->id; ?>" <?php if (!empty($ship_state)){ echo 'selected="selected"'; }else{echo '';} ?>><?php echo $ship_state->name; ?></option>									
																		</select>
																				
																						
																					
																				</div>
																			</div>
																				
																			<div class="form-group">
																				<label class="col-md-4 control-label"><?php echo $this->lang->line('City'); ?>:</label>
																				<div class="col-md-8">
																				<select name="shipto_city" class="form-control required" id="city1">
									<option value="" Selected>Select City</option>
									<option value="<?php echo $ship_city->id; ?>" <?php if (!empty($ship_city)){ echo 'selected="selected"';}else{echo '';} ?>><?php echo $ship_city->name; ?></option>	
								</select>
																				</div>
																			</div>
																			
																			<div class="form-group">
																				<label class="col-md-4 control-label">Zipcode:</label>
																				
																				<div class="col-md-8">
																				
																				<input type="text" name="shipto_zip" class="form-control required" value="<?php if(isset($order)) echo $order->shipto_zip; ?>" data-mask="99999" placeholder="Zipcode"><br />
																				
																				</div>
																			</div>

																			<div class="form-group">
																				<label class="col-md-4 control-label">Contact - Office:</label>
																				<div class="col-md-8"><input type="text" name="shipto_contactoffice" class="form-control required" value="<?php if(isset($order)) echo $order->shipto_contactoffice; ?>" placeholder="Contact - Office"></div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-4 control-label">Contact - Mobile:</label>
																				<div class="col-md-8">
																					<input type="text" name="shipto_contactphone" data-mask="(999) 999-9999" class="form-control required" value="<?php if(isset($order)) echo $order->shipto_contactphone; ?>" placeholder="Contact - Mobile"><br />
																				</div>
																			</div>
																				
																			<div class="form-group">
																				<label class="col-md-4 control-label">Email:</label>
																				<div class="col-md-8"><input type="email_1" name="shipto_email" class="form-control required" value="<?php if(isset($order)) echo $order->shipto_email; ?>" placeholder="Email"></div>
																			</div>
																			</br></br>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div> <!-- /.widget-content -->
												
											</div>	
											
											
											<div class="col-md-6" style="margin-top: -19px;">
												<h3 class="block padding-bottom-10px title_bar">Order Details</h3>
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-4 control-label">Order #:</label>
														<div class="col-md-8"><input type="text" name="order_number" class="form-control required" value="<?php if(isset($order)) echo $order->order_number; ?>" placeholder="Order #"></div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Order Date:</label>
														<div class="col-md-8"><input type="text" name="order_date" class="form-control required datepicker" value="<?php if(isset($order)) echo date('Y-m-d',strtotime($order->order_date)); ?>" placeholder="Order Date"></div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-4 control-label">Paid Date:</label>
														<div class="col-md-8"><input type="text" name="paid_date" class="form-control required datepicker" value="<?php if(isset($order)) echo date('Y-m-d',strtotime($order->paid_date)); ?>" placeholder="Paid Date"></div>
													</div>

													<div class="form-group">
														<label class="col-md-4 control-label">Amount Paid:$</label>
														<div class="col-md-8"><input type="text" name="amount_paid" class="form-control required price" value="<?php if(isset($order)) echo $order->amount_paid; ?>" placeholder="Amount Paid"></div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-4 control-label">Shipping Paid:$</label>
														<div class="col-md-8"><input type="text" name="shipping_paid" class="form-control required price" value="<?php if(isset($order)) echo $order->shipping_paid; ?>" placeholder="Shipping Paid"></div>
													</div>

													<div class="form-group">
														<label class="col-md-4 control-label">Tax Paid:$</label>
														<div class="col-md-8"><input type="text" name="tax_paid" class="form-control required price" value="<?php if(isset($order)) echo $order->tax_paid; ?>" placeholder="Tax Paid" ></div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Hold Untill:</label>
														<div class="col-md-8"><input type="text" name="hold_untill" class="form-control required datepicker" value="<?php if(isset($order)) echo date('Y-m-d',strtotime($order->hold_untill)); ?>" placeholder="Hold Untill" ></div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Ship by:</label>
														<div class="col-md-8"><input type="text" name="ship_by" class="form-control required datepicker" value="<?php if(isset($order)) echo date('Y-m-d',strtotime($order->order_shipby)); ?>" placeholder="Ship By" ></div>
													</div>
												</div>
												<h3 class="block padding-bottom-10px title_bar">Order Notes</h3>
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-4 control-label">Customer:</label>
														<div class="col-md-8"><input type="text" name="customer_note" class="form-control " value="<?php if(isset($order)) echo $order->customer_note; ?>" placeholder="Customer" ></div>
													</div>

													<div class="form-group">
														<label class="col-md-4 control-label">To Buyer:</label>
														<div class="col-md-8"><input type="text" name="buyer_note" class="form-control " value="<?php if(isset($order)) echo $order->buyer_note; ?>" placeholder="To Buyer" ></div>
													</div>
												</div>
												
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-4 control-label">Internet:</label>
														<div class="col-md-8"><input type="text" name="internet_note" class="form-control " value="<?php if(isset($order)) echo $order->internet_note; ?>" placeholder="Internet"></div>
													</div>

													<div class="form-group">
														<label class="col-md-4 control-label">This is gift:</label>
														<div class="col-md-8"><input type="text" name="gift_note" class="form-control " value="<?php if(isset($order)) echo $order->gift_note; ?>" placeholder="This is gift" ></div>
													</div>
												</div>
												
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-4 control-label">Customer Field 1:</label>
														<div class="col-md-8"><input type="text" name="customer_field_1" class="form-control " value="<?php if(isset($order)) echo $order->customer_field_1; ?>" placeholder="Customer Field "></div>
													</div>

													<div class="form-group">
														<label class="col-md-4 control-label">Customer Field 2:</label>
														<div class="col-md-8"><input type="text" name="customer_field_2" class="form-control " value="<?php if(isset($order)) echo $order->customer_field_2; ?>" placeholder="Customer Field 2" ></div>
													</div>
												</div>
											</div>	
											
										</div>		
									</div> <!-- /.widget-content -->
								</div> <!-- /.widget -->
								
							</div> <!-- /.col-md-12 -->
							
							<div class="col-md-12 form-vertical no-margin">
								<div class="widget">
									<h3 class="block padding-bottom-10px title_bar">Order Line Items</h3>
									
									<div class="widget-content" >
									<?php $count=0; ?>
									<?php  foreach ($products as $product) { ?>
									<?php $count++; ?>
										<div class="row" id="<?php echo $product->item_id; ?>">
											<div class="col-md-2">
												<div class="form-group">
													
													<div class="col-md-12">
														<label class="control-label">SKU</label>
														<input type="text" name="item_sku[]" class="form-control required" value="<?php if(($product)) echo $product->sku; ?>" placeholder="SKU" style="width: 70%;">
													</div>
													
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													
													<div class="col-md-12" style="margin-left: -72px;">
														<label class="control-label">Name:</label>
														<input type="text" name="item_title[]" class="form-control required" value="<?php if(($product)) echo $product->item_name; ?>" placeholder="Name" style="width: 151%;">
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<div class="col-md-12" style="margin-left: 148px;">
														<label class="control-label">QTY:</label>
														<input type="text"  name="item_quantity[]"  class="form-control required qty" value="<?php if(($product)) echo $product->quantity; ?>" placeholder="Quantity" style="width: 70%;">
													</div>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<div class="col-md-12" style="margin-left:113px;">
														<label class="control-label">Price:</label>
														<input type="text"  name="item_price[]" class="form-control required price" value="<?php if(($product)) echo $product->unitPrice; ?>" placeholder="Price" style="width: 70%;">
													</div>
												</div>
											</div>
											<div class="col-md-1">
												<div class="form-group">
													<div class="col-md-8">
													<?php if($count!=1) { ?>
														<a class="text-danger" style="margin-left: 15px;" onclick="deleteorderProduct(<?php echo $product->item_id; ?>)">
															<i class="glyphicon glyphicon-remove" style="padding-left: 48px;top: 27px;cursor: pointer;"></i>
														</a>
													<?php } ?>
													</div>
												</div>
											</div>
											
										</div><br />
									<?php } ?>
										<div id="product" class="row"></div><br />
										<div class="btn-action" style="margin-top: -7px;">
											<input type="button" name="add_item" value="Add Info" class="btn btn-info" onClick="addMore();" />
										</div>
									</div>
								</div>
							</div>	
							<div class="form-actions">
								<input type="hidden" name="check_process" value="0" />
								<button  class="btn btn-primary pull-right" id="save_localfullfill" type="button">Save</button>
								<button  class="btn btn-primary pull-right" id="save__process_localfullfill" type="button"> save_&_process </button>
							</div>										
						</form>
						<div class="row">
							<div class="col-md-3">
							</div>
							<div class="col-md-6">
								<div class="alert alert-danger text-center order_error" style="display:none">
									<button class="close" data-dismiss="alert">
									</button> <span >Error Found .</span> 
								</div>	
								<div class="alert alert-success order_success text-center" style="display:none">
									<button class="close" data-dismiss="alert">
									</button> <span>Your Are Updated order Successfully.</span> 
								</div>
							</div>
							<div class="col-md-3">
							</div>
						</div>
					</div>
				</div> <!-- /.tab-content -->
			</div>
		</div>
	</div>
</div>
<div id="confirmdeleteorderProduct" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header model_color_header">
						<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
						<h4 class="modal-title model_color_title">Confirm</h4>
					</div>
					<div class="modal-body">
						<p class="msg2">Do you really want to Delete this item </p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" id="deleteorderProduct_btn"><?php echo $this->lang->line('Yes'); ?></button>
						<button type="button" class="btn" data-dismiss="modal"><?php echo $this->lang->line('No'); ?></button>
					</div>
				</div>
			</div>
		</div>

<script type="text/javascript">
function addMore() {
		
		$("<div>").load("<?php echo base_url(); ?>order/order/input_roll", function() {
				$("#product").append($(this).html());						
		});	
		var i=0;
		$('div.product-item').each(function(index, item)
		{
			i++;
		});
	
		if(i == 1) 
		{
			$(".text-danger").show();
		}

		$(".text-danger").show();

		setTimeout(hidedel,2000);
	}
		
	function hidedel()
	{
		var i=0;
		$('div.product-item').each(function(index, item)
		{
			i++;
		});
	}
	
	function deleteme(element)
	{
		var i=0;
		$('div.product-item').each(function(index, item)
		{
			i++;
		});
		
		if(i > 0) 
		{
			$(element).parent().remove();
		}

		if(i == 2) 
		{
			$(".text-danger").show();
		}
		if(i == 1) 
		{
			$(".text-danger").show();
		}
	}
		
		
	function deleteRow() {
		var i=1;
		$('div.product-item').each(function(index, item){
			jQuery(':checkbox', this).each(function () {
				if ($(this).is(':checked')) {
					if(i>1){
					$(item).remove();
					}
				}
			});
			i++;
		});
	}
		  
	function hidedel()
	{
		var i=0;
		$('div.product-item').each(function(index, item)
		{
			i++;
		});
		
		if(i == 1) 
		{
		$(".text-danger").show();
		}
	}
	
	
	function deleteorderProduct(item_id){ 
		$('#confirmdeleteorderProduct').modal({
			backdrop: 'static',
			keyboard: false
		})
		.one('click', '#deleteorderProduct_btn', function(e) { 
			
			$.ajax({
				type: 'POST',
				url: base_url+'order/order/deleteRecordOrder',
				data: {'table':'product_to_order', 'column':'item_id','value': item_id},
				beforeSend: function(){
					$.LoadingOverlay("show");
				},
				success: function(res) {
					$.LoadingOverlay("hide");
					
						$("#"+item_id).remove();
						$('#confirmdeleteorderProduct').modal('hide');
					
				},
				complete: function() {},
				error: function() {$('#confirmdeleteorderProduct').modal('hide');}
			});
		});
	}
	
	
	
	

	
$(document).ready(function(){
	$(".answer").show();
	$(".recipientNameaddress").hide();
	$(".coupon_question").click(function() {
    if($(this).is(":checked")) { 
		$(".answer").show();
		$(".recipientNameaddress").hide();
		} else { 
		$(".answer").hide();
		$(".recipientNameaddress").show();		
		$("#collapse_add").show();		
		$("html, body").animate({ scrollTop: 100 }, 1500);
		$("#collapsefirst").click(function() {
			//$(".answer").show();
		});
    }
	});
	
	
	
	
	

}); 

</script>		