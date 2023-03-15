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
					<a href="<?php echo base_url('order/Createorder'); ?>" title="">Create Manual Order</a>
				</li>
			</ul>
		</div>
			
		<div class="page-header">
			<div class="page-title">
				<h3>Create Order</h3>
				<span>Hello, <?php echo $this->session->userdata('user_session')['firstname']; ?>!</span>
			</div>
		</div>
				
		<div class="row">
			<div class="col-md-4 col-md-offset-4 text-center">
			
				<div class="alert alert-danger text-center err_div" style="display:none">
					<button class="close" data-dismiss="alert">
					</button> <span class="errrMsg" >Error found.</span> 
				</div>	
				<div class="alert alert-success text-center scc_div" id="scc_div1" style="display:none">
					<button class="close" data-dismiss="alert">
					</button> <span class="successMsg" >Your order is successfully saved.</span> 
				</div>
				
			</div>	
		</div>	
		<div class="row">
			<div class="col-md-12">
				<!-- Tabs-->
				<div class="tabbable tabbable-custom tabbable-full-width">
						<!--=== Edit Account ===-->
					<div class="tab-pane" id="tab_edit_account">
						<form id="order_menual_form" class="form-horizontal" >
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
																						<input type="text" name="recipient_name" class="form-control required" value="" placeholder="Recipient Name">
																					<br /></div>
																				</div>
																				<div class="form-group">
																					<label class="col-md-4 control-label">Company Name:</label>
																					<div class="col-md-8"><input type="text" name="company_name" class="form-control required" value="" placeholder="Company Name"></div>
																				</div>
																			</div>
																			
																		</div> <!-- /.row -->
																	
																		<div class="row">
																			<div class="col-md-12 answer">
																				<div class="form-group">
																					<label class="col-md-4 control-label">Address Line 1:</label>
																					<div class="col-md-8"><input type="text" name="address_line_1" class="form-control required" value="" placeholder="Address Line 1"><br /></div>
																				</div>

																				<div class="form-group">
																					<label class="col-md-4 control-label">Address Line 2:</label>
																					<div class="col-md-8"><input type="text" name="address_line_2" class="form-control" value="" placeholder="Address Line 2"></div>
																				</div>
																			</div>
																			
																		</div> <!-- /.row -->
																		
																		<div class="row">
																			<div class="col-md-12 answer">
																			
																				<div class="form-group">
																					<label class="col-md-4 control-label">Country:</label>
																					<div class="col-md-8">
																						<select name="country" class="form-control required" id="country">
																							<option value="" Selected>Select Country</option>
																							<?php foreach($country as $Crow){?>
																							
																								<option value="<?php echo $Crow->id; ?>" <?php if(@$user_bussiness_info->country == $Crow->id){ echo 'selected="selected"';}else{ echo ""; } ?> ><?php echo $Crow->name; ?></option>
																								
																							<?php }?>	
																						</select><br />
																					</div>
																				</div>

																				<div class="form-group">
																					<label class="col-md-4 control-label">State:</label>
																					<div class="col-md-8">
																					<?php if(!empty($state)){ ?>
											
																						<select name="state" class="form-control required" id="state">
																								<option value="<?php echo $state ?>" <?php if (!empty($state)){ echo 'selected="selected"'; }else{echo '';} ?>><?php echo $state ?></option>
																						</select>	
																					
																					<?php }else{ ?>
																					
																							
																						<select name="state" class="form-control required" id="state">
																								<option value="" selected>Select State</option>
																						</select>	
																					<?php } ?>
																					
																					</div>
																				</div>
																				
																				<div class="form-group">
																					<label class="col-md-4 control-label"><?php echo $this->lang->line('City'); ?>:</label>
																					<div class="col-md-8">
																					<?php if(!empty($city)){ ?>
											
																							<select name="city" class="form-control required" id="city">
																									<option value="<?php echo $city ?>" <?php if (!empty($city)){ echo 'selected="selected"';}else{echo '';} ?>><?php echo $city ?></option>
																							</select>	
																						
																						<?php }else{ ?>
																						
																								
																							<select name="city" class="form-control required" id="city">
																									<option value="" selected>Select City</option>
																							</select>	
																						<?php } ?>
																					</div>
																				</div>
																				  
																			</div>
																			
																		</div> <!-- /.row -->
																		
																		
																		
																		<div class="row">
																			<div class="col-md-12 answer">
																				<div class="form-group">
																					<label class="col-md-4 control-label">Zipcode:</label>
																					<div class="col-md-8">
																						<input type="text" name="zipcode" class="form-control required" value="" data-mask="99999" placeholder="Zipcode"><br />
																					</div>
																				</div>

																				<div class="form-group">
																					<label class="col-md-4 control-label">Contact - Office:</label>
																					<div class="col-md-8"><input type="text" name="contact_office" class="form-control required" value="" placeholder="Contact - Office"></div>
																				</div>
																			</div>
																		</div> <!-- /.row -->
																		
																		<div class="row">
																			<div class="col-md-12 answer" >
																				<div class="form-group">
																					<label class="col-md-4 control-label">Contact - Mobile:</label>
																					<div class="col-md-8">
																						<input type="text" name="contact_mobile" data-mask="(999) 999-9999" class="form-control required" value="" placeholder="Contact - Mobile"><br />
																					</div>
																				</div>
																				
																				<div class="form-group">
																					<label class="col-md-4 control-label">Email:</label>
																					<div class="col-md-8"><input type="email" name="email" class="form-control required" value="" placeholder="Email"></div>
																				</div>
																			</div>
																			
																		</div> <!-- /.row -->
																		
																		
																	</div>	
														
																</div>
															</div>
														</div>
														
														<div class="panel panel-default">
															
															<div class="panel-title block padding-bottom-10px title_bar">
																<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="color:white ! important;text-decoration:none ! important;">
																	<input class="coupon_question" type="checkbox" name="coupon_question" checked="checked"/>
																</a>
																<span class="accordion-toggle">Ship To Address (Uncheck If ShipTo Address is different from Buyer Address)</span>
															</h3> 
															</div>
														
															<div id="collapseTwo" class="panel-collapse collapse">
																<div class="panel-body recipientNameaddress">
																	 <div class="row">
																		<div class="col-md-12" >
																			<div class="form-group">
																				<label class="col-md-4 control-label">Recipient Name:</label>
																				<div class="col-md-8">
																					<input type="text" name="ship_to_recipient_name" class="form-control required" value="" placeholder="Recipient Name">
																				<br /></div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-4 control-label">Company Name:</label>
																				<div class="col-md-8"><input type="text" name="ship_to_company_name" class="form-control required" value="" placeholder="Company Name"></div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-4 control-label">Address Line 1:</label>
																				<div class="col-md-8"><input type="text" name="ship_to_address_line_1" class="form-control required" value="" placeholder="Address Line 1"><br /></div>
																			</div>

																			<div class="form-group">
																				<label class="col-md-4 control-label">Address Line 2:</label>
																				<div class="col-md-8"><input type="text" name="ship_to_address_line_2" class="form-control" value="" placeholder="Address Line 2"></div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-4 control-label">Country:</label>
																				<div class="col-md-8">
																					<select name="ship_to_country" class="form-control required" id="country1">
																						<option value="" Selected>Select Country</option>
																						<?php foreach($country as $Crow){?>
																						
																							<option value="<?php echo $Crow->id; ?>" <?php if(@$user_bussiness_info->country == $Crow->id){ echo 'selected="selected"';}else{ echo ""; } ?> ><?php echo $Crow->name; ?></option>
																							
																						<?php }?>	
																					</select>
																				</div>
																			</div>
																		
																			<div class="form-group">
																				<label class="col-md-4 control-label">State:</label>
																				<div class="col-md-8">
																				<?php if(!empty($state)){ ?>
										
																					<select name="ship_to_state" class="form-control required" id="state1">
																							<option value="<?php echo $state ?>" <?php if (!empty($state)){ echo 'selected="selected"'; }else{echo '';} ?>><?php echo $state ?></option>
																					</select>	
																				
																				<?php } else { ?>
																				
																						
																					<select name="ship_to_state" class="form-control required" id="state1">
																							<option value="" selected>Select State</option>
																					</select>	
																				<?php } ?>
																				
																				</div>
																			</div>
																				
																			<div class="form-group">
																				<label class="col-md-4 control-label"><?php echo $this->lang->line('City'); ?>:</label>
																				<div class="col-md-8">
																				<?php if(!empty($city)){ ?>
										
																						<select name="ship_to_city" class="form-control required" id="city1">
																								<option value="<?php echo $city ?>" <?php if (!empty($city)){ echo 'selected="selected"';}else{echo '';} ?>><?php echo $city ?></option>
																						</select>	
																					
																					<?php }else{ ?>
																					
																							
																						<select name="ship_to_city" class="form-control required" id="city1">
																								<option value="" selected>Select City</option>
																						</select>	
																					<?php } ?>
																				</div>
																			</div>
																			
																			<div class="form-group">
																				<label class="col-md-4 control-label">Zipcode:</label>
																				
																				<div class="col-md-8">
																				
																				<input type="text" name="ship_to_zipcode" class="form-control required" value="" data-mask="99999" placeholder="Zipcode"><br />
																				
																				</div>
																			</div>

																			<div class="form-group">
																				<label class="col-md-4 control-label">Contact - Office:</label>
																				<div class="col-md-8"><input type="text" name="ship_to_contact_office" class="form-control required" value="" placeholder="Contact - Office"></div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-4 control-label">Contact - Mobile:</label>
																				<div class="col-md-8">
																					<input type="text" name="ship_to_contact_mobile" data-mask="(999) 999-9999" class="form-control required" value="" placeholder="Contact - Mobile"><br />
																				</div>
																			</div>
																				
																			<div class="form-group">
																				<label class="col-md-4 control-label">Email:</label>
																				<div class="col-md-8"><input type="email_1" name="ship_to_email" class="form-control required" value="" placeholder="Email"></div>
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
														<div class="col-md-8"><input type="text" name="order_number" class="form-control required" value="<?php echo $random; ?>" placeholder="Order #"></div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Order Date:</label>
														<div class="col-md-8"><input type="text" name="order_date" class="form-control required datepicker" value="" placeholder="Order Date"></div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-4 control-label">Paid Date:</label>
														<div class="col-md-8"><input type="text" name="paid_date" class="form-control required datepicker" value="" placeholder="Paid Date"></div>
													</div>

													<div class="form-group">
														<label class="col-md-4 control-label">Amount Paid:</label>
														<div class="col-md-8"><input type="text" name="amount_paid" class="form-control required" value="" placeholder="Amount Paid"></div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-4 control-label">Shipping Paid:</label>
														<div class="col-md-8"><input type="text" name="shipping_paid" class="form-control required" value="" placeholder="Shipping Paid"></div>
													</div>

													<div class="form-group">
														<label class="col-md-4 control-label">Tax Paid:</label>
														<div class="col-md-8"><input type="text" name="tax_paid" class="form-control required" value="" placeholder="Tax Paid" ></div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Hold Untill:</label>
														<div class="col-md-8"><input type="text" name="hold_untill" class="form-control required datepicker" value="" placeholder="Hold Untill" ></div>
													</div>
													<div class="form-group">
														<label class="col-md-4 control-label">Ship by:</label>
														<div class="col-md-8"><input type="text" name="ship_by" class="form-control required datepicker" value="" placeholder="Ship By" ></div>
													</div>
												</div>
												<h3 class="block padding-bottom-10px title_bar">Order Notes</h3>
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-4 control-label">Customer:</label>
														<div class="col-md-8"><input type="text" name="customer_note" class="form-control " value="" placeholder="Customer" ></div>
													</div>

													<div class="form-group">
														<label class="col-md-4 control-label">To Buyer:</label>
														<div class="col-md-8"><input type="text" name="buyer_note" class="form-control " value="" placeholder="To Buyer" ></div>
													</div>
												</div>
												
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-4 control-label">Internet:</label>
														<div class="col-md-8"><input type="text" name="internet_note" class="form-control " value="" placeholder="Internet"></div>
													</div>

													<div class="form-group">
														<label class="col-md-4 control-label">This is gift:</label>
														<div class="col-md-1">
															
															<input type="checkbox" name="gift_note" class="form-control uniform" value="0" id="mycheckbox">
														
														</div>
													</div>
												</div> 
												
												
												<div class="col-md-12">
													<div class="form-group" id="mycheckboxdiv" style="display:none">
														<label class="col-md-4 control-label"></label>
														<div class="col-md-8">
															<textarea type="text" name="customer_field_2" class="form-control" placeholder="Enter order notes hear"></textarea>
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-md-4 control-label">Customer Field :</label>
														<div class="col-md-8"><input type="text" name="customer_field_1" class="form-control " value="" placeholder="Customer Field "></div>
													</div>

													<!--<div class="form-group">
														<label class="col-md-4 control-label">Customer Field 2:</label>
														<div class="col-md-8"><input type="text" name="customer_field_2" class="form-control " value="" placeholder="Customer Field 2" ></div>
													</div>-->
												</div>
												
												
											</div>	
											
										</div>		
									</div> <!-- /.widget-content -->
								</div> <!-- /.widget -->
								
							</div> <!-- /.col-md-12 -->
							
							<div class="col-md-12 form-vertical no-margin">
								<div class="widget">
									<h3 class="block padding-bottom-10px title_bar">Order Line Items</h3>
									
									<div class="widget-content">
										<div class="row" id="product">
											<div class="col-md-2">
												<div class="form-group">
													
													<div class="col-md-12">
														<label class="control-label">SKU</label>
														<input type="text" name="item_sku[]" class="form-control required" value="" placeholder="SKU" style="width: 70%;">
													</div>
													
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													
													<div class="col-md-12" style="margin-left: -72px;">
														<label class="control-label">Name:</label>
														<input type="text" name="item_title[]" class="form-control required" value="" placeholder="Name" style="width: 151%;">
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<div class="col-md-12" style="margin-left: 148px;">
														<label class="control-label">QTY:</label>
														<input type="text"  name="item_quantity[]"  class="form-control required qty" value="" placeholder="Quantity" style="width: 70%;">
													</div>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<div class="col-md-12" style="margin-left:113px;">
														<label class="control-label">Price:</label>
														<input type="text"  name="item_price[]" class="form-control required qty" value="" placeholder="Price" style="width: 70%;">
													</div>
												</div>
											</div>
											<div class="col-md-1">
												<div class="form-group">
													<div class="col-md-8">
														<label class="control-label" style="margin-bottom: 35px !important;"></label>
													</div>
												</div>
											</div>
											
										</div><br />
										
										<div class="btn-action" style="margin-top: -7px;">
											<input type="button" name="add_item" value="Add Info One Row" class="btn btn-info" onClick="addMore();" />
										</div>
									</div>
								</div>
							</div>	
							<div class="form-actions">
								<input value="Save" name="Save" class="btn btn-primary pull-right" type="submit">
								<input value="Save & Process" name="save_&_process" class="btn btn-primary pull-right" type="submit">
							</div>										
						</form>
					</div>
				</div> <!-- /.tab-content -->
			</div>
		</div>
	</div> <!-- /.row -->
</div>
<style>
.accordion-toggle {
    font-size: 15px;
    font-weight: initial;
}


</style>
<script type="text/javascript">
	$(document).ready(function() {
		$('#mycheckbox').change(function() {
			$('#mycheckboxdiv').toggle();
		});
	});
		
		
	function addMore() {
		
		$("<div>").load("<?php echo base_url(); ?>order/Createorder/input_roll", function() {
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
		
$(document).ready(function(){
	$('#country').on('change',function(){
		
		var countryID = $(this).val();

		if(countryID){
			$.ajax({
				type:'POST',
				url:base_url + 'dashboard/MyProfileController/selectState',
				data:'country_id='+countryID,
				success:function(html){
					$('#state').html(html);
					$('#city').html('<option value="">Select city first</option>'); 
				}
			}); 
		}else{
			$('#state').html('<option value="">Select state first</option>');
			$('#city').html('<option value="">Select city first</option>'); 
		}
	});
	
	$('#state').on('change',function(){
        var stateID = $(this).val();
		
        if(stateID){
            $.ajax({
                type:'POST',
                url:base_url + 'dashboard/MyProfileController/selectCity',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{ 
            $('#city').html('<option value="">Select City first</option>'); 
        }
    });
	
	
}); 


$(document).ready(function(){
	$('#country1').on('change',function(){
		
		var countryID = $(this).val();

		if(countryID){
			$.ajax({
				type:'POST',
				url:base_url + 'dashboard/MyProfileController/selectState',
				data:'country_id='+countryID,
				success:function(html){
					$('#state1').html(html);
					$('#city1').html('<option value="">Select city first</option>'); 
				}
			}); 
		}else{
			$('#state1').html('<option value="">Select state first</option>');
			$('#city1').html('<option value="">Select city first</option>'); 
		}
	});
	
	$('#state1').on('change',function(){
        var stateID = $(this).val();
		
        if(stateID){
            $.ajax({
                type:'POST',
                url:base_url + 'dashboard/MyProfileController/selectCity',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city1').html(html);
                }
            }); 
        }else{ 
            $('#city1').html('<option value="">Select City first</option>'); 
        }
    });
	
	
}); 

$(".answer").show();
$(".recipientNameaddress").hide();
$(".coupon_question").click(function() {
    if($(this).is(":checked")) {
       
		$(".answer").show();
		$(".recipientNameaddress").hide();		
    } else {
		
        $(".answer").hide();
		$(".recipientNameaddress").show();		
		$("#collapseTwo").show();		
		$("html, body").animate({ scrollTop: 100 }, 1500);
		$("#collapsefirst").click(function() {
			$(".answer").show();
		});
		$('.coupon_question').prop('checked', ''); // Unchecks it
    }
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
