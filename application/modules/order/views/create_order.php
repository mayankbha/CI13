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
					<a href="#" title="">Create Order</a>
				</li>
			</ul>
		</div>  			
		<div class="row">
			<div class="col-md-3 page-header">
				<div class="page-title">
					<h3>Order</h3>
					<h5>Create a new order</h5>
				</div>
			</div>
			<div class="col-md-6" style="padding-top: 28px;">
				<div class="alert alert-danger text-center" style="display:none" id="err_div">
					<button class="close" data-dismiss="alert">
					</button> <span id="errrMsg">You missed some fields. They have been highlighted.</span> 
				</div>	
				<div class="alert alert-success text-center" style="display:none" id="scc_div">
					<button class="close" data-dismiss="alert">
					</button> <span id="successMsg">You missed some fields. They have been highlighted.</span> 
				</div>
			</div>
			<div class="col-md-1">
			</div>
			<div class="col-md-2">
				
				<div class="page-title" id="orderDiv1">
					<h3 align="right">Order Name</h3>
					<h5 align="right">
						<span id="show_order" style="font-size:16px;padding-bottom:4px ! important;"></span>&nbsp;&nbsp;
						<a href="javascript:void(0);" class="editshippingtitle" onclick="changeorderNumber();" >
							Rename
						</a>
					</h5>
				</div>

				<div class="page-title"  style="display:none;" id="orderDiv2">
					<h3 align="right" style="padding-right: 16px ! important;">Order Nmae</h3>
					<span  style="font-size:16px;padding-bottom:4px ! important">
						<input type="text" id="order_name" name="order_name" value="<?php echo 'HUB-ORDR-'.(rand(10,10001000)); ?>" class="form-control">
							<a href="javascript:void(0);" class="editshippingtitle" onclick="saveOrdername();">
								Save
							</a>
					</span> 
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<hr style="margin-top:0px ! important;"/>
			</div>	
		</div>
		
		<div class="row selectorderDiv">
			<label class="col-md-12 control-label"><h5>Select an Order Type :</h5></label>
			<div class="col-md-3"> 
				<select class="form-control selectboxit-btn" name="selectedorderType11" id="selectedorderType"> 
				<option value="" selected>Select One</option> 
				<option value="1">Create a FBA Order</option> 
				<option value="2">Create a Local Fulfill Order</option> 
				<option value="3">create a Disposal Order</option>
				</select> 
			</div>
		</div><br /><br /><br />

	<!--=== Accordion ===-->
		<div class="row" id="accordionText">
			<div class="col-md-12">
				<div class="widget">
					<div class="widget-header">
						<h4><i class="icon-reorder"></i> What These Order Names Stands for</h4>
						<div class="toolbar">
							<div class="btn-group">
								<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
							</div>
						</div>
					</div>
					<div class="widget-content">
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="color:#fff;text-decoration: none;">
									FBA Order  </a>
									</h3>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in">
									<div class="panel-body">
										 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="color:#fff;text-decoration: none;">
									Local FulFill Order  </a>
									</h3>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse">
									<div class="panel-body">
										 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="color:#fff;text-decoration: none;">
									Disposal Order  </a>
									</h3>
								</div>
								<div id="collapseThree" class="panel-collapse collapse">
									<div class="panel-body">
										 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
									</div>
								</div>
							</div>
						</div>
					</div> <!-- /.widget-content -->
				</div> <!-- /.widget .box -->
			</div> <!-- /.col-md-12 -->
		</div> <!-- /.row -->

		<div class="row selectedorderDiv" style="display:none">
			<label class="col-md-2 control-label">Selected Order Type:</label>
			<div class="col-md-2"> 
				<label class="ordertype">FBA Order<label>&nbsp;&nbsp;&nbsp;
				<a href="javascript:void(0);" onclick="chengeOrder();">
					Edit
				</a>
			</div>
		</div>

		<div style="min-height:30px;">
		</div>
		<div class="row secoundStep" >
			<div class="col-md-12">
				<!-- Tabs-->
				<div class="tabbable tabbable-custom tabbable-full-width">
						<!--=== Edit Account ===-->
					<div class="tab-pane" >
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
																						<input type="text" name="buyer_recipientname" class="form-control required" value="" placeholder="Recipient Name">
																					<br /></div>
																				</div>
																				<div class="form-group">
																					<label class="col-md-4 control-label">Company Name:</label>
																					<div class="col-md-8"><input type="text" name="buyer_companyname" class="form-control required" value="" placeholder="Company Name"></div>
																				</div>
																			</div>
																			
																		</div> <!-- /.row -->
																	
																		<div class="row">
																			<div class="col-md-12 answer">
																				<div class="form-group">
																					<label class="col-md-4 control-label">Address Line 1:</label>
																					<div class="col-md-8"><input type="text" name="buyer_addressline1" class="form-control required" value="" placeholder="Address Line 1"><br /></div>
																				</div>

																				<div class="form-group">
																					<label class="col-md-4 control-label">Address Line 2:</label>
																					<div class="col-md-8"><input type="text" name="buyer_addressline2" class="form-control" value="" placeholder="Address Line 2"></div>
																				</div>
																			</div>
																			
																		</div> <!-- /.row -->
																		
																		<div class="row">
																			<div class="col-md-12 answer">
																			
																				<div class="form-group">
																					<label class="col-md-4 control-label">Country:</label>
																					<div class="col-md-8">
																						<select name="buyer_country" class="form-control required" id="country">
																							<option value="" Selected>Select Country</option>
																							<?php foreach($allcountry as $Crow){?>
																							
																								<option value="<?php echo $Crow->id; ?>" <?php if(@$user_bussiness_info->country == $Crow->id){ echo 'selected="selected"';}else{ echo ""; } ?> ><?php echo $Crow->name; ?></option>
																								
																							<?php }?>	
																						</select><br />
																					</div>
																				</div>

																				<div class="form-group">
																					<label class="col-md-4 control-label">State:</label>
																					<div class="col-md-8">
																					<?php if(!empty($state)){ ?>
											
																						<select name="buyer_state" class="form-control required" id="state">
																								<option value="<?php echo $state ?>" <?php if (!empty($state)){ echo 'selected="selected"'; }else{echo '';} ?>><?php echo $state ?></option>
																						</select>	
																					
																					<?php }else{ ?>
																					
																							
																						<select name="buyer_state" class="form-control required" id="state">
																								<option value="" selected>Select State</option>
																						</select>	
																					<?php } ?>
																					
																					</div>
																				</div>
																				
																				<div class="form-group">
																					<label class="col-md-4 control-label"><?php echo $this->lang->line('City'); ?>:</label>
																					<div class="col-md-8">
																					<?php if(!empty($city)){ ?>
											
																							<select name="buyer_city" class="form-control required" id="city">
																									<option value="<?php echo $city ?>" <?php if (!empty($city)){ echo 'selected="selected"';}else{echo '';} ?>><?php echo $city ?></option>
																							</select>	
																						
																						<?php }else{ ?>
																						
																								
																							<select name="buyer_city" class="form-control required" id="city">
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
																						<input type="text" name="buyer_zip" class="form-control required" value="" data-mask="99999" placeholder="Zipcode"><br />
																					</div>
																				</div>

																				<div class="form-group">
																					<label class="col-md-4 control-label">Contact - Office:</label>
																					<div class="col-md-8"><input type="text" name="buyer_contactoffice" class="form-control required" value="" placeholder="Contact - Office"></div>
																				</div>
																			</div>
																		</div> <!-- /.row -->
																		
																		<div class="row">
																			<div class="col-md-12 answer" >
																				<div class="form-group">
																					<label class="col-md-4 control-label">Contact - Mobile:</label>
																					<div class="col-md-8">
																						<input type="text" name="buyer_contactphone" data-mask="(999) 999-9999" class="form-control required" value="" placeholder="Contact - Mobile"><br />
																					</div>
																				</div>
																				
																				<div class="form-group">
																					<label class="col-md-4 control-label">Email:</label>
																					<div class="col-md-8"><input type="email" name="buyer_email" class="form-control required" value="" placeholder="Email"></div>
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
														
															<div id="collapse_add" class="panel-collapse collapse">
																<div class="panel-body recipientNameaddress">
																	 <div class="row">
																		<div class="col-md-12" >
																			<div class="form-group">
																				<label class="col-md-4 control-label">Recipient Name:</label>
																				<div class="col-md-8">
																					<input type="text" name="shipto_recipientname" class="form-control required" value="" placeholder="Recipient Name">
																				<br /></div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-4 control-label">Company Name:</label>
																				<div class="col-md-8"><input type="text" name="shipto_companyname" class="form-control required" value="" placeholder="Company Name"></div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-4 control-label">Address Line 1:</label>
																				<div class="col-md-8"><input type="text" name="shipto_addressline1" class="form-control required" value="" placeholder="Address Line 1"><br /></div>
																			</div>

																			<div class="form-group">
																				<label class="col-md-4 control-label">Address Line 2:</label>
																				<div class="col-md-8"><input type="text" name="shipto_addressline2" class="form-control" value="" placeholder="Address Line 2"></div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-4 control-label">Country:</label>
																				<div class="col-md-8">
																					<select name="shipto_country" class="form-control required" id="country1">
																						<option value="" Selected>Select Country</option>
																						<?php foreach($allcountry as $Crow){?>
																						
																							<option value="<?php echo $Crow->id; ?>" <?php if(@$user_bussiness_info->country == $Crow->id){ echo 'selected="selected"';}else{ echo ""; } ?> ><?php echo $Crow->name; ?></option>
																							
																						<?php }?>	
																					</select>
																				</div>
																			</div>
																		
																			<div class="form-group">
																				<label class="col-md-4 control-label">State:</label>
																				<div class="col-md-8">
																				<?php if(!empty($state)){ ?>
										
																					<select name="shipto_state" class="form-control required" id="state1">
																							<option value="<?php echo $state ?>" <?php if (!empty($state)){ echo 'selected="selected"'; }else{echo '';} ?>><?php echo $state ?></option>
																					</select>	
																				
																				<?php } else { ?>
																				
																						
																					<select name="shipto_state" class="form-control required" id="state1">
																							<option value="" selected>Select State</option>
																					</select>	
																				<?php } ?>
																				
																				</div>
																			</div>
																				
																			<div class="form-group">
																				<label class="col-md-4 control-label"><?php echo $this->lang->line('City'); ?>:</label>
																				<div class="col-md-8">
																				<?php if(!empty($city)){ ?>
										
																						<select name="shipto_city" class="form-control required" id="city1">
																								<option value="<?php echo $city ?>" <?php if (!empty($city)){ echo 'selected="selected"';}else{echo '';} ?>><?php echo $city ?></option>
																						</select>	
																					
																					<?php }else{ ?>
																					
																							
																						<select name="shipto_city" class="form-control required" id="city1">
																								<option value="" selected>Select City</option>
																						</select>	
																					<?php } ?>
																				</div>
																			</div>
																			
																			<div class="form-group">
																				<label class="col-md-4 control-label">Zipcode:</label>
																				
																				<div class="col-md-8">
																				
																				<input type="text" name="shipto_zip" class="form-control required" value="" data-mask="99999" placeholder="Zipcode"><br />
																				
																				</div>
																			</div>

																			<div class="form-group">
																				<label class="col-md-4 control-label">Contact - Office:</label>
																				<div class="col-md-8"><input type="text" name="shipto_contactoffice" class="form-control required" value="" placeholder="Contact - Office"></div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-4 control-label">Contact - Mobile:</label>
																				<div class="col-md-8">
																					<input type="text" name="shipto_contactphone" data-mask="(999) 999-9999" class="form-control required" value="" placeholder="Contact - Mobile"><br />
																				</div>
																			</div>
																				
																			<div class="form-group">
																				<label class="col-md-4 control-label">Email:</label>
																				<div class="col-md-8"><input type="email_1" name="shipto_email" class="form-control required" value="" placeholder="Email"></div>
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
														<div class="col-md-8"><input type="text" name="order_number" class="form-control required" value="<?php echo 'HUB-ORDR-'.(rand(10,10001000)); ?>" placeholder="Order #"></div>
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
														<label class="col-md-4 control-label">Amount Paid:$</label>
														<div class="col-md-8"><input type="text" name="amount_paid" class="form-control required qty" value="" placeholder="Amount Paid"></div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-4 control-label">Shipping Paid:$</label>
														<div class="col-md-8"><input type="text" name="shipping_paid" class="form-control required qty" value="" placeholder="Shipping Paid"></div>
													</div>

													<div class="form-group">
														<label class="col-md-4 control-label">Tax Paid:$</label>
														<div class="col-md-8"><input type="text" name="tax_paid" class="form-control required qty" value="" placeholder="Tax Paid" ></div>
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
														<div class="col-md-8"><input type="text" name="gift_note" class="form-control " value="" placeholder="This is gift" ></div>
													</div>
												</div>
												
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-4 control-label">Customer Field 1:</label>
														<div class="col-md-8"><input type="text" name="customer_field_1" class="form-control " value="" placeholder="Customer Field "></div>
													</div>

													<div class="form-group">
														<label class="col-md-4 control-label">Customer Field 2:</label>
														<div class="col-md-8"><input type="text" name="customer_field_2" class="form-control " value="" placeholder="Customer Field 2" ></div>
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
									
									<input type="hidden" name="add_more_line_items_count" id="add_more_line_items_count" value="1" />
									
									<div class="widget-content">
										<div class="row" id="product">
											<div class="col-md-2">
												<div class="form-group">
													
													<div class="col-md-12">
														<label class="control-label">SKU</label>
														<input type="text" name="item_sku[]" class="form-control required sss item_sku1" placeholder="SKU" style="width: 70%;" value="" id="1" onkeyup="checkSku(this.id);" />
													</div>
													
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													
													<div class="col-md-12" style="margin-left: -72px;">
														<label class="control-label">Name:</label>
														<input type="text" name="item_title[]" class="form-control required item_name1" value="" id="1" placeholder="Name" style="width: 151%;">
													</div>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<div class="col-md-12" style="margin-left: 148px;">
														<label class="control-label">QTY:</label>
														<input type="text"  name="item_quantity[]"  class="form-control required quantity" placeholder="Quantity" value="" style="width: 70%;" onkeyup="getItemCharges();" />
													</div>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<div class="col-md-12" style="margin-left:113px;">
														<label class="control-label">Price:</label>
														<input type="text"  name="item_price[]" class="form-control required qty item_price1" id="1" value="" placeholder="Price" style="width: 70%;">
													</div>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<div class="col-md-12" style="margin-left:113px;">
														<label class="control-label">Charges:</label>
														
														<span class="form-control item_charges1" data-toggle="popover-x" data-target="#order_line_item_charge1"></span>
													</div>
												</div>
											</div>
											
											<div id="order_line_item_charge1" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
												<div>
													<div class="arrow"></div>
													<h3 class="popover-title"><span class="close pull-right" data-dismiss="popover-x">&times;</span>Fee Preview</h3>
												</div>
												<div class="popover-content">
													<div class="col-md-12">
														<div class="popover-text">
															<span class="pull-right popup_per_unit_charge1"></span>Per Unit Charge  <br />
															<span class="pull-right popup_quantity1"> </span>Quantity  <br /> 
														</div>
														<div class="popover-title2">
															<span class="pull-right popup_total_charges1"></span>Fee Estimate  <br />
														</div>
													</div>    
												</div>
											</div>
											
										</div><br />
										
										<div class="btn-action" style="margin-top: -7px;">
											<input type="button" name="add_item" value="Add Info" class="btn btn-info" onClick="addMore();" />
										</div>
									</div>
								</div>
							</div>	
							<div class="form-actions">
								<center><p class="testsku" style="display:none; color:red;">Sku does'nt matched.</p></center>
								<input type="hidden" name="check_process" value="0" />
								<button  class="btn btn-primary pull-right" id="save_localfullfill" type="button">Save</button>
								<button  class="btn btn-primary pull-right" id="save__process_localfullfill" type="button"> save_&_process </button>
							</div>										
						</form>
					</div>
				</div> <!-- /.tab-content -->
			</div>
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6">
					<div class="alert alert-danger text-center order_error" style="display:none">
						<button class="close" data-dismiss="alert">
						</button> <span >Error Found .</span> 
					</div>	
					<div class="alert alert-success text-center order_success" style="display:none">
						<button class="close" data-dismiss="alert">
						</button> <span>Your Are created order Successfully.</span> 
					</div>
					
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
		
		<div class="row thirdStep" >
			<div id="disposal_order">
				
			</div>
		</div>

		<div class="row firstStep" id="newtert">
			<div class="col-md-12">
				<div class="widget box" id="form_wizard">
					<div class="widget-content">
						<form class="form-horizontal" id="sample_form" action="<?php echo base_url('order/order/updateOrder');?>" method="post" enctype="multipart/form-data">
							<div class="form-wizard">
								<div class="form-body" id="tabs">
									<ul class="nav nav-pills nav-justified steps">
										<li>
											<a href="#tab1" data-toggle="tab" class="step" disabled> <span class="number">1</span> <br />
												<span class="desc"><i class="icon-ok"></i> Create Order</span> 
											</a>
										</li>
										<li>
											<a href="#tab2" data-toggle="tab" id="order_t2" class="step" > <span class="number">2</span><br />
												<span class="desc"><i class="icon-ok"></i> <?php echo $this->lang->line('Inventory'); ?></span>
											</a>
										</li>
										<li>
											<a href="#tab3" data-toggle="tab" id="order_t3"class="step" > <span class="number">3</span><br /> <span class="desc"><i class="icon-ok"></i> <?php echo $this->lang->line('Set_Quarity'); ?></span> </a>
										</li>
										<li>
											<a href="#tab4" data-toggle="tab" id="order_t4" class="step"> <span class="number">4</span><br /> <span class="desc"><i class="icon-ok"></i> <?php echo $this->lang->line('Label_Products'); ?></span> </a>
										</li>
										<li>
											<a href="#tab5" data-toggle="tab" id="order_t5" class="step"> <span class="number">5</span><br /> <span class="desc"><i class="icon-ok"></i> <?php echo $this->lang->line('Review_Shipment'); ?></span> </a>
										</li>
									</ul>
									<div id="bar" class="progress progress-striped" role="progressbar">
										<div class="progress-bar progress-bar-success"></div>
									</div>
									<div class="tab-content">
										
										<div class="tab-pane active" id="tab1">
											<h3 class="block padding-bottom-10px title_bar">Order</h3>
											
											
											<div class="row spacing_shipping">
											<!--<h3 class="block padding-bottom-10px title_bar">Create Order</h3>-->
												<div class="col-md-1">

												</div>
												<div class="col-md-3">
													<label class="labelsize">Create Order</label>
													<hr class="hr_margin"/>
													<label class="radio-inline" >
														<input type="radio" class="uniform" id="createOrder" name="create_order" value="create_order" required>
													</label>
													<div style="padding-left: 32px; margin-top: -20px;">Create a new Order</div>
														
													<?php if(!empty($exist_orders)) { ?>
													<label class="radio-inline" style="margin-bottom:10px;">
														<input type="radio" class="uniform" name="create_order" id="existing_Order" value="existing_Order">.
													</label>
													<div style="padding-left: 32px; margin-top: -30px;">Add existing Order</div>
													<div style="padding-left:23px ! important;">
														<select class="form-control" name="exist_order" id="exist_order" style="width:47%; display:none">
															<option  value="" selected>Select Order</option>
															<?php foreach($exist_orders as $order){  ?>
																<option value="<?php echo  $order->order_id; ?>"><?php echo  $order->order_name; ?></option>
															<?php } ?>
														</select>
													</div>
													<?php } ?>
												</div>
												
												<div class="col-md-3">
													<label class="labelsize">Ship To</label>
													<div class="addressDiv">
														<hr class="hr_margin"/>
														<?php if(!empty($saveaddressDetails)) { ?>
																<input type="hidden" name="shipfrom"  value="<?php echo $saveaddressDetails->address_id; ?> ">
																<?php 
																	$this->load->model('common_model', 'common'); /* LOADING MODEL */
															
																	$whereid3						=		@array('id'=>$saveaddressDetails->country);
																	$country 						= 		$this->common->getSingleRecord('countries', $whereid3);
															
																	$whereid						=		@array('id'=>$saveaddressDetails->state);
																	$state 							= 		$this->common->getSingleRecord('states', $whereid);
															
																	$whereid1						=		@array('id'=>$saveaddressDetails->city);
																	$city 							= 		$this->common->getSingleRecord('cities', $whereid1);
																?>
																<?php echo $saveaddressDetails->name; ?> 
																<?php echo $saveaddressDetails->addressline1; ?></br>
																<?php echo $saveaddressDetails->addressline2; ?></br>
																<?php echo $city->name; ?>
																<?php echo $state->name; ?>
																<?php echo $country->name; ?>
																<?php echo $saveaddressDetails->zipcode; ?></br>
																<?php echo $saveaddressDetails->contactoffice; ?>
																<?php echo $saveaddressDetails->contactmobile; ?>
																</br>
																<a href='#myModalFullscreen' data-toggle='modal' class="spacing_shipping_custom"><?php echo $this->lang->line('Change'); ?></a>
															&nbsp;&nbsp;&nbsp;
															<?php } else{ ?> 
																	<input type="radio"  style=' visibility: hidden;' name="shiping_planjm" value="option1" required>
																	<a href='#myModalFullscreen' data-toggle='modal'><?php echo $this->lang->line('Add'); ?></a> 
															<?php } ?>
													</div>
												</div>
												
												<!--test code--> 
												<div class="col-md-2">
													<label class="labelsize">Order Type</label>
														<hr class="hr_margin"/>
														<label class="radio-inline">
															<input type="radio" class="uniform order_type"  name="order_type" value="1" required />
														</label>
														<label>Individual Products</label>	
														</br>
														<label class="radio-inline">
															<input type="radio" class="uniform order_type" id="" name="order_type" value="2"  />
														</label>
														<label>CasePacked  Products</label>	
												</div>
												<div class="col-md-2">
													<label class="labelsize">Ship By</label>
														<hr class="hr_margin"/>
														<input name="shipby" id="shipby" class="form-control datepicker" value="" type="text" required />
												</div>
											</div>
											<div class="row">
												<div id="order_step1_table">
												</div>
											</div>
											<br /><br />
												<!-- /Page Content -->	
										</div>
										<div class="tab-pane" id="tab2">
											<h3 class="block padding-bottom-10px title_bar"><?php echo $this->lang->line('Inventory'); ?></h3>
											<!--=== Horizontal Scrolling ===-->
											<div class="row">
												<div class="col-md-12">
													<div class="widget box">
														<div class="widget-header">
															
														</div>
														<div class="widget-content no-padding table-responsive" id="order_step2_table">
														
														</div>
													</div>
												</div>
											</div>
											<!--=== no-padding ===-->
										</div>

										<div class="tab-pane" id="tab3">
											<div id="order_step3_table"> 
												
											</div>
										</div>
										
										<div class="tab-pane" id="tab4">
											<div id="order_step4_table"> 
											
											</div>
										</div>
										<div class="tab-pane" id="tab5">
											<div id="order_step5_table"> 
												
											</div>
										</div>
									</div>
									
								</div>
								
								<div class="form-actions fluid">
									<div class="row">
										<div class="col-md-12">
											<center>
												<span class="alert alert-danger custom-alert" align="text-center" style="display:none">
													<button class="close" data-dismiss="alert">
													</button> You missed some fields.
												</span><br/ >
												<span id="err_div1" class="alert alert-danger" align="text-center" style="display:none">
													<button class="close" data-dismiss="alert">
													</button> <span id="errrMsg1"></span>
												</span><br/ >
												
											</center>
											
											
										
											<a href="javascript:void(0);" class="btn button-previous" align="right"> <i class="icon-angle-left"></i> <?php echo $this->lang->line('Back'); ?> </a>

											<a href="javascript:void(0);"  class="btn btn-primary button-submit pull-right" > Process Order  <i class="icon-fixed-width"></i></a>
											
											<a href="javascript:void(0);"  class="btn btn-primary button-next pull-right" > <?php echo $this->lang->line('Continue'); ?> <i class="icon-angle-right"></i> </a>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<!-- /.container -->
	<div class="modal fade modal-fullscreen  footer-to-bottom" id="myModalFullscreen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog animated zoomInLeft">
			<div class="modal-content">
				<div class="modal-header" style=" border-bottom:none;">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<div class="crumbs">
							<ul id="breadcrumbs" class="breadcrumb">
								<li>
									<i class="icon-home"></i>
									<a href="<?php echo base_url(); ?>dashboard"><?php echo $this->lang->line('Dashboard_Title'); ?></a>
								</li>
								<li class="current">
									<a href="<?php echo base_url('shipping/shipping_Address_from'); ?>" title=""><?php echo $this->lang->line('Dashboard_Setup'); ?></a>
								</li>
							</ul>
						</div>  
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4 page-header">
							<div class="page-title">
								<h3>Ship To</h3>
								<span>Choose a address as a 'ship to location'</span><br />
							</div>
						</div>
						<div class="col-md-4" style="padding-top:31px;">
							<div class="alert alert-info" align="center">
								<a href="#" data-dismiss="modal">Continue with Order!</a> 
							</div>
							<span class="alert alert-danger text-center" style="display:none" id="err_div1">
								<button class="close" data-dismiss="alert">
								</button> <span id="errrMsg1">Error.</span> 
							</span>	
							<span class="alert alert-success text-center" style="display:none" id="success_div1">
								<button class="close" data-dismiss="alert">
								</button> <span id="successMsg1">Success.</span> 
							</span>
						</div>
						<div class="col-md-2">
						</div>
						<div class="col-md-2">
							<h3 align="right" style="padding-right: 16px ! important;padding-top:16px;">
								<button class="btn btn-primary" id="AddAddress_order" href="#">Add Address</button>
							</h3>
						</div>
					</div>
					
					
					<div class="row">
						<div class="custom_address_by_ajax">  
							<?php if(is_array($addAddressDetails) && array_key_exists(0,$addAddressDetails)){ ?>
							<div class="row">
								<?php foreach($addAddressDetails as $row){ ?>
								<!-- /Basic -->
								<div class="col-md-4">
									<div class="widget">
										<div class="widget-header">
											<h4><i class="icon-reorder"></i> <?php echo $row->city; ?>,<?php echo $row->country; ?></h4>

										</div>
										<div class="row">
											<div class="col-md-1">
										
											</div>										
											<div class="col-md-2">
												<label class="radio-inline">
												<?php  $a =	$row->address_id; $b =  $saveaddressDetails_id; ?>
													<input type="radio" class="uniform" onclick="saveaddressDetailsOrder('<?php echo $row->address_id; ?>')" value="<?php echo $row->address_id; ?>" name="optionsRadios2" value="option1" <?php if($a == $b){ echo "checked"; } ?> >
												</label>
											</div>										
											<div class="col-md-9">
												<?php 
													$this->load->model('common_model', 'common'); /* LOADING MODEL */
											
													$whereid3						=		@array('id'=>$row->country);
													$country 						= 		$this->common->getSingleRecord('countries', $whereid3);
											
													$whereid						=		@array('id'=>$row->state);
													$state 							= 		$this->common->getSingleRecord('states', $whereid);
											
													$whereid1						=		@array('id'=>$row->city);
													$city 							= 		$this->common->getSingleRecord('cities', $whereid1);
												?>
													<label><?php echo $row->name; ?></label><br />
													<label><?php echo $row->addressline1; ?></label><br />
													<label><?php echo $row->addressline2; ?></label><br />
													<label><?php echo $city->name .','.$state->name .','. $country->name; ?></label><br />
													<label><?php echo $row->zipcode; ?></label></br>
													<label>Office : <?php echo $row->contactoffice; ?> </label><br />
													<label>Work : <?php echo $row->contactmobile; ?> </label><br /><br />
													<button class="btn btn-primary" class="editaddress" onclick="editAddress_order(<?php echo $row->address_id; ?>);" ><?php echo $this->lang->line('Edit'); ?></button>
													<button class="btn btn-primary" onclick="showDeletePopupOrder('addresses', 'address_id', '<?php echo $row->address_id; ?>');"><?php echo $this->lang->line('Delete'); ?></button>
											</div>
										</div>		
									</div>
								</div>
								<?php } ?>
							</div>
							<?php } else { ?>	
								<div class="row">
									<!-- /Basic -->
									<div class="col-md-12">
										<div class="widget">
											<div class="row">
												<div class="col-md-12">
													<div class="widget-header">
													</div>
												</div>					
											</div>		
											<div class="row">
												<div class="col-md-4">
												</div>					
												<div class="col-md-4">
													<div class="alert fade in alert-danger">      
														<h5 align="center">No Record Found</h5> 
													</div>
												</div>					
												<div class="col-md-4">
												</div>					
											</div>
										</div>
									</div>
								</div>
								<?php }?>		
						</div>
					</div>
					
					
					<div class="row">
							<!-- /.container -->
						<div class="container" style="display:none;" id="AddAddress_orderDiv">
							<h3 class="block padding-bottom-10px title_bar">Add Address</h3>
							<!-- email and password Message -->

							<div class="alert fade in alert-danger" id="error_message" style="display:none;">      
								All field required
							</div>
						
							<div class="tab-pane" id="tab_edit_accountc">
								<form class="form-horizontal" method="POST" id="addAddressOrderForm" >
									<div class="col-md-12 form-vertical no-margin">
										<div class="widget">
											<div class="widget-content">
												<div class="row">
													<div class="col-md-3">
													</div>
													<div class="col-md-6">
														
														<div class="form-group">
															<label class="col-md-4">Name:</label>
															<div class="col-md-8">
																<input type="text"  id="name_order" name="name" class="form-control required" >
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-4">Address Line 1:</label>
															<div class="col-md-8"><input type="text" id="addressline1_order" name="addressline1" class="form-control required" ></div>
														</div>

														<div class="form-group">
															<label class="col-md-4">Address Line 2:</label>
															<div class="col-md-8"><input type="text" id="addressline2_order" name="addressline2" class="form-control" ></div>
														</div>
													</div>
													<div class="col-md-3">
													</div>
												</div> <!-- /.row -->
												<div class="row">
													<div class="col-md-3">
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4">Country:</label>
															<div class="col-md-8">
																<select name="country" class="form-control country required" id="countryorder">
																	<option value="" Selected>Select Country</option>
																	<?php foreach($allcountry as $Crow){?>
																		<option value="<?php echo $Crow->id; ?>"><?php echo $Crow->name; ?></option>
																	<?php }?>															
																</select>
															</div>
														</div>
													<div class="form-group">
															<label class="col-md-4">State:</label>
															<div class="col-md-8">
																	<select name="state" class="form-control state required" id="stateorder">
																		<option value="" Selected>Select State</option>
																												
																	</select>
											
															</div>
													</div>
														
													
														<div class="form-group">
															<label class="col-md-4">City:</label>
															<div class="col-md-8">
														
																	<select name="city" class="form-control required" id="cityorder">
																		<option value="" Selected>Select City</option>
																			
																	</select>
															
															</div>
														</div>

												
														
													</div>
													<div class="col-md-3">
													</div>
												</div> <!-- /.row -->
												<div class="row">
													<div class="col-md-3">
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4">Zipcode:</label>
															<div class="col-md-8"><input type="text" id="zipcode_order" name="zipcode" class="form-control required" data-mask="99999"></div>
														</div>

														<div class="form-group">
															<label class="col-md-4">Contact - Office:</label>
															<div class="col-md-8"><input id="contactoffice_order" type="text" name="contactoffice"  data-mask="9999-9999999"  class="form-control required" ></div>
														</div>
													</div>
													<div class="col-md-3">
													</div>
												</div> <!-- /.row -->
												<div class="row">
													<div class="col-md-3">
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4">Contact - Mobile:</label>
															<div class="col-md-8"><input type="text" id="contactmobile_order"  name="contactmobile" data-mask="(999) 999-9999" class="form-control required"></div>
														</div>
													</div>
													<div class="col-md-3">
													</div>
												</div> <!-- /.row -->
											</div> <!-- /.widget-content -->
										</div> <!-- /.widget -->

										<div class="form-actions">
											<input type="submit" value="Save Information" name="Save Information" class="btn btn-primary pull-right">
										</div>
									</div> <!-- /.col-md-12 -->
								</form>
							</div>
						</div>
						
						
						<!-- Landing elements -->
						<div class="container"  id="EditAddress_order" >
							<h3 class="block padding-bottom-10px title_bar">Edit Address</h3>
							<!-- email and password Message -->
							<div class="alert fade in alert-danger"  style="display:none;">      
								All field required
							</div>
							<div class="tab-pane" id="tab_edit_account">
							</div>
						</div>
					</div>
					
				</div>
				<!-- Trigger the modal with a button -->
			</div>
		</div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
	<div id="accountremoveorder" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header model_color_header">
					<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
					<h4 class="modal-title model_color_title"><?php echo $this->lang->line('Payment_Delete_Account'); ?></h4>
				</div>
				<div class="modal-body">
					<p><?php echo $this->lang->line('deletemsg'); ?></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="remove-yes-buttonOrder"><?php echo $this->lang->line('Yes'); ?></button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('No'); ?></button>
				</div>
			</div>
		</div>
	</div>
	
</div>

<style>
#removeDiv {
	display:none;
}
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
</style>

<style>
.radio-inline{
	color:white ! important;
}

.selectboxit-btn {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none; 
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #f5f5f5;
    background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) #b3b3b3;
    border-image: none;
    border-style: solid;
    border-width: 1px;
	font-size: 15px !important;

}

#selectedorderType > option {
    font-size: 15px;
}

.panel-default > .panel-heading {
    background-color: #4d7496 !important;
    border-color: #4d7496 !important;
    color: #fff !important;
}
.has-error{
	border-color: rgb(234, 67, 53);
}
</style>

<script type="text/javascript">
	function getItemCharges() {
		var item_sku = $('.sss').val();
		var quantity = $('.quantity').val();

		var add_more_line_items_count = $('#add_more_line_items_count').val();

		//alert(item_sku);

		$.ajax({
			type:'POST',
			url:base_url + 'order/order/getItemCharges',
			data: {'item_sku' : item_sku, 'quantity' : quantity},
			beforeSend: function() { },
			success:function(res) {
					//alert(res);

					if(res != '') {
						$('.popup_quantity'+add_more_line_items_count).html(quantity);

						var val = res.split('&&&&');

						$('.popup_per_unit_charge'+add_more_line_items_count).html('$'+val[0]);
						$('.popup_total_charges'+add_more_line_items_count).html('$'+val[1]);
						
						$('.item_charges'+add_more_line_items_count).html('$'+val[1]);
					}
			},
			complete: function() { },
			error: function() { }
			}); 
	}
	
	function addMore() {
		var add_more_line_items_count = $('#add_more_line_items_count').val();

		add_more_line_items_count++;

		$('#add_more_line_items_count').val(add_more_line_items_count);
		
		$("<div>").load("<?php echo base_url(); ?>order/order/input_roll/"+add_more_line_items_count, function() {
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
		
		setTimeout(function() {
			$(".item_charges"+add_more_line_items_count).mouseover(function (e) {
				//alert('Mouse Hover');

				$('.item_charges'+add_more_line_items_count).popoverButton({
					target: '#order_line_item_charge'+add_more_line_items_count,
					trigger: 'hover focus'
				});
			});
		}, 2000);
		
		/*$(function () {
			$('.item_charges2').popoverButton({
				target: '#order_line_item_charge2',
				trigger: 'hover focus'
			});

			$(".item_charges2").mouseover(function (e) {
				alert('Mouse Hover');

				$('#order_line_item_charge2').popoverX("show");
			});
		});*/
			
		/*$.getScript("<?php echo base_url() ?>assets/js/libs/jquery-1.10.2.min.js", function(data, textStatus, jqxhr) {
			console.log("JS Loaded Successfully");

			$.getScript("<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js", function(data, textStatus, jqxhr) {
				console.log("JS Loaded Successfully");
			});

			$.getScript("<?php echo base_url() ?>assets/js/bootstrap-popover-x.js", function(data, textStatus, jqxhr) {
				console.log("JS Loaded Successfully");
			});
			
			$.getScript("<?php echo base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js", function(data, textStatus, jqxhr) {
				console.log("JS Loaded Successfully");
			});
			
			$(function () {
				$('.item_charges2').popoverButton({
					target: '#order_line_item_charge2',
					trigger: 'hover focus'
				});
			});
		});*/
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
		$("#collapse_add").show();		
		$("html, body").animate({ scrollTop: 100 }, 1500);
		$("#collapsefirst").click(function() {
			//$(".answer").show();
		});
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

<script type="text/javascript">
function checkSku(field_id) {
	//alert('In checkSku Function');
	//alert(field_id);

	var item_sku = $('.item_sku'+field_id).val();

	$.ajax({
		type:'POST',
		url:base_url + 'order/order/checkSku',
		data: {
			'sku': item_sku,
			'getSku': true
		},
		beforeSend: function(){
		},
		success:function(data){
			//console.log(data);

			if(data.inventory_id){
				$('.item_sku'+field_id).addClass("has-success");
				$('.item_sku'+field_id).css("border-color", "#fff");
				
				$('.testsku').hide();
				
				$('.item_name'+field_id).val(data.title);
				$('.item_price'+field_id).val(data.price);
			}else{
				$('.item_sku'+field_id).addClass("has-error");
				$('.item_sku'+field_id).css("border-color", "red");
				
				$('.testsku').show();
				
				$('.item_name'+field_id).val();
				$('.item_price'+field_id).val();
			}
		},
		complete: function() {},
		error: function() {}
	});
}

"use strict";
$(document).ready(function() {
	$('.datepicker').datepicker({ minDate: new Date()});
	//$('#shipby').datepicker().datepicker({ minDate: 0});
	$("#EditAddress_order").hide();
	setTimeout(function() {
	var  flag			=		0;
	var order_name = $("#order_name").val();
	$("#show_order").text(order_name); 
	
	var c = $("#sample_form");
    var d = $("#form_wizard");

	
    var a = $(".custom-alert", c);
    var f = $(".alert-success", c);
	$.validator.messages.required = '';

	c.validate({
		doNotHideMessage: false,
		focusInvalid: true,
		invalidHandler: function(h, g) {
			var validatecarton 					= 		$('#validatecarton').val();	
			var validateshipping_label_file 	= 		$('#validateshipping_label_file').val();
			var validateshipping_label_images 	= 		$('#validateshipping_label_images').val();
			
			
			if($('#validateshipping_label_images').is(':disabled')){
				
			}else{
				$('.validateshipping_label_images').css("border-color", "red");
			}

			if(validatecarton == ""){

				$('.validatecarton').css("border-color", "red");
			}else if(validateshipping_label_file==""){
				
				$('.validateshipping_label_file').css("border-color", "red");
			}else{
				$('.validatecarton').css("border-color", "#fff");
				$('.validateshipping_label_file').css("border-color", "#fff");
			}
			//$("html, body").animate({ scrollTop: 0 }, "slow");
			
			f.hide();
			a.show()
			
		},
		submitHandler: function(g) {
			//$("html, body").animate({ scrollTop: 0 }, "slow");
			f.show();
			a.hide()
			
		}
	});
	var e = function() { 
        $("#tab4 .form-control-static", c).each(function() {
            var g = $('[name="' + $(this).attr("data-display") + '"]', c);
            if (g.is(":text") || g.is("textarea")) {
                $(this).html(g.val())
            } else {
                if (g.is("select")) {
                    $(this).html(g.find("option:selected").text())
                } else {
                    if (g.is(":radio") && g.is(":checked")) {
                        $(this).html(g.attr("data-title"))
                    }
                }
            }
        })
    };
    
    var b = function(k, g, h) { 

        var l = g.find("li").length;

        var m = h + 1;


        $(".step-title", d).text("Step " + (h + 1) + " of " + l);
        $("li", d).removeClass("done");
        var n = g.find("li");
		
        for (var j = 0; j < h; j++) {
            $(n[j]).addClass("done")
        }

		if (m > 1) {
			$(".selectedorderDiv").show();
			$(".selectorderDiv").hide();
			getorderStep(m);
		}

        if (m == 2) {
            d.find(".button-previous").hide()
        } else {
            d.find(".button-previous").show()
        }
		
		if(m == 5){ 
			$(".selectedorderDiv").hide();
		}
        if (m >= l) {  
			
            d.find(".button-next").hide();
            d.find(".button-submit").show();
            e()
        } else {
            d.find(".button-next").show();
            d.find(".button-submit").hide()
        }
    };
    d.bootstrapWizard({ 
        nextSelector: ".button-next",
        previousSelector: ".button-previous",
		onTabClick: function(i, g, h, j) {  
		
		  f.hide();
		  a.hide();
			if (j >= h && c.valid() == false) {
				return false
			}
			b(i, g, j)
		},
        onNext: function(i, g, h) {
            f.hide();
            a.hide();
            if (c.valid() == false) {
                return false
            }
            b(i, g, h)
        },
        onPrevious: function(i, g, h) {
            f.hide();
            a.hide();
            b(i, g, h)
        },
        onTabShow: function(j, g, i) {
            var k = g.find("li").length;
            var l = i + 1;
            var h = (l / k) * 100;
            d.find(".progress-bar").css({
                width: h + "%"
            })
        }
    });
    d.find(".button-previous").hide();
    $("#form_wizard .button-submit").click(function() {
        
    }).hide()

	$('#exist_order').on("change",function() {
		 if ($('#exist_order').val() != '') {
			 $("#order_step1_table").show();
			var exist_order_id = $('#exist_order').val();
			$.ajax({
				type: 'POST',
				url: base_url + 'order/order/add_to_an_existing_order',
				data: {
					'exist_order_id': exist_order_id,
					'add_exist_exist_order': true
				},
				beforeSend: function() {
					//.createShipment();
				},
				success: function(res) {
					$('#continue_btn').attr('disabled', false);
					$("#order_step1_table").html(res);
					
				},complete: function(){
					getOrder(exist_order_id);
				},
				error: function() {
					alert('request failed');
				}
			});
		 }
	});
	
	$(".button-submit").click(function() {
		var shipby 		= $("input[name=shipby]").val();	
		var track_order = $("input[name=track_order]").val();	
		$.ajax({
            type: 'POST',
            url: base_url + 'order/order/updateOrder',
            data: {
				'order_status': 2,
				'track_order': track_order,
				'order_shipby':shipby,
                'saveOrder': true
            },
			beforeSend: function() {
				
			},
            success: function(res) {
				window.location.href = base_url + 'order/order/view_order';
            },
            error: function() {
                alert('request failed');
            }
        });
		
	});
	
	
	$("#orderDiv1").hide();
	$(".button-next").hide();
	$(".firstStep").hide();
	$(".secoundStep").hide();
	$(".thirdStep").hide(); 
	
	
	
	$('#selectedorderType').on("change",function() {
			$('#form_wizard').bootstrapWizard();
		 if ($('#selectedorderType').val() == 1) {
			$(".secoundStep").hide();
			$(".thirdStep").hide();
			$(".firstStep").show();
			$("#orderDiv1").show();
			$(".button-next").show();
			$("#accordionText").hide();
			
				/*$('select[name="selectedorderType11"] option:selected').change(function(){
					$('html, body').animate({ scrollTop: 300 }, 1000);
					return false;
				}); 
				  $('#selectedorderType option[value=1]').on("click", function () {
						
						$('html, body').animate({ scrollTop: 300 }, 1000);
						
				});*/
				
				$(document).on("change", "#selectedorderType", function() {
					if($(this).find("option:selected").text() == 'Create a FBA Order'){
						$('html, body').animate({ scrollTop: 300 }, 1000);
						return false;
					}
				});
							
			
		 }else if($('#selectedorderType').val() == 2){
			 
			
			$(".firstStep").hide();
			$(".thirdStep").hide();
			$(".secoundStep").show();
			$("#orderDiv1").hide();
			$(".button-next").show();
			$("#accordionText").hide();
				
					
				/* $('select[name="selectedorderType11"] option:selected').change(function(){
					$('html, body').animate({ scrollTop: 300 }, 1000);
					return false;
				}); */
				
				$(document).on("change", "#selectedorderType", function() {
					if($(this).find("option:selected").text() == 'Create a Local Fulfill Order'){
						$('html, body').animate({ scrollTop: 300 }, 1000);
						return false;
					}
				});
				
				
		 }else if($('#selectedorderType').val() == 3){
			$(".secoundStep").hide();
			$(".firstStep").hide();
			$(".thirdStep").show(); 
			$(".button-next").show();
			$("#accordionText").hide();
			$.ajax({
                type:'GET',
                url:base_url + 'order/order/getDisposalorder',
				beforeSend: function(){
					$.LoadingOverlay("show");
				},
                success:function(html){
                    $('#disposal_order').html(html);
					$.LoadingOverlay("hide");
                },
				complete: function() {$.LoadingOverlay("hide");},
				error: function() {$.LoadingOverlay("hide");}
            }); 
		 }else{
			$(".firstStep").hide();
			$(".secoundStep").hide();
			$(".thirdStep").hide();
			$("#orderDiv1").hide();
			$(".button-next").hide();
			$("#accordionText").show();
			
		 }
	});
	

	$('#countryorder').on('change',function(){
		
		var countryID = $(this).val();

		if(countryID){
			$.ajax({
				type:'POST',
				url:base_url + 'shipping/Shipping/selectState',
				data:'country_id='+countryID,
				beforeSend: function(){
				},
				success:function(html){
					$('#stateorder').html(html);
					$('#cityorder').html('<option value="">Select state first</option>'); 
				},
				complete: function() {},
				error: function() {}
			}); 
		}else{
			$('#stateorder').html('<option value="">Select country first</option>');
			$('#cityorder').html('<option value="">Select state first</option>'); 
		}
	});
	
	$('#stateorder').on('change',function(){
        var stateID = $(this).val();
		
        if(stateID){
            $.ajax({
                type:'POST',
                url:base_url + 'shipping/Shipping/selectCity',
                data:'state_id='+stateID,
				beforeSend: function(){
				},
                success:function(html){
                    $('#cityorder').html(html);
                },
				complete: function() {},
				error: function() {}
            }); 
        }else{
            $('#cityorder').html('<option value="">Select City first</option>'); 
        }
    });
	
	
	$('#countryorder1').on('change',function(){
		
		var countryID = $(this).val();

		if(countryID){
			$.ajax({
				type:'POST',
				url:base_url + 'shipping/Shipping/selectState',
				data:'country_id='+countryID,
				beforeSend: function(){
				},
				success:function(html){
					$('#stateorder1').html(html);
					$('#cityorder1').html('<option value="">Select state first</option>'); 
				},
				complete: function() {},
				error: function() {}
			}); 
		}else{
			$('#stateorder1').html('<option value="">Select country first</option>');
			$('#cityorder1').html('<option value="">Select state first</option>'); 
		}
	});
	
	$('#stateorder1').on('change',function(){
        var stateID = $(this).val();
		
        if(stateID){
            $.ajax({
                type:'POST',
                url:base_url + 'shipping/Shipping/selectCity',
                data:'state_id='+stateID,
				beforeSend: function(){
				},
                success:function(html){
                    $('#cityorder1').html(html);
                },
				complete: function() {},
				error: function() {}
            }); 
        }else{
            $('#cityorder1').html('<option value="">Select City first</option>'); 
        }
    });
	}, 1000);


/*$(".sss").keyup(function(){
			//alert('The option with value ' + $(this).val() + ' and text ' + $(this).text() + ' was selected.');
			
			$.ajax({
				type:'POST',
				url:base_url + 'order/order/checkSku',
				data: {
					'sku': $(this).val(),
					'getSku': true
				},
				beforeSend: function(){
				},
				success:function(data){
					if(data.inventory_id){
						$(this).css("border-color", "#fff");
						$('.sss').addClass("has-success");
						$('.testsku').hide();
					}else{
						
						$('.sss').addClass("has-error");
						$(this).addClass("has-error");
						$(this).css("border-color", "red");
						$('.testsku').show();
					}
				},
				complete: function() {},
				error: function() {}
			});
		});*/
});

$('input:radio[name="create_order"]').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 'create_order') {
			$("#order_selectDiv").show();
			$("#exist_order").hide();
			$("#order_step1_table").hide();
        }else{
			$("#order_selectDiv").hide();
			$("#exist_order").show();
			$("#order_step1_table").hide();
		}
});



function changeorderNumber(){ 
	$("#orderDiv1").hide();
	$("#orderDiv2").show();
}
function saveaddressDetailsOrder(id) { 
	$.ajax( {
	  type: "POST",
	  url: base_url + 'order/order/saveaddressDetails',
	  data: {'id': id },
	  beforeSend: function() {$.LoadingOverlay("show");},
	  success: function( response ) {
		if(response){ 
			$.LoadingOverlay("hide");
			var addressinfo		=	"<hr class='hr_margin'><input type='hidden' name='shipfrom'  value='"+response.address_id+"' > "+response.name+" "+response.addressline1+" "+response.addressline2+"</br>"+response.country+" "+response.city+" "+response.zipcode+"</br>"+response.contactoffice+" "+response.contactmobile+"</br><a href='#myModalFullscreen' data-toggle='modal' class='spacing_shipping_custom'>Change</a>";
			$(".addressDiv").html(addressinfo);
			$("#myModalFullscreen").modal('hide');
		}  
	  }
	});
}


var isOpen = false;
function saveOrdername(){
    $("html, body").animate({
        scrollTop: 0
    }, "slow");
    $("#order_number").focus();

    if (isOpen) {

        var isValid = /\s/;
        var order_name = $("#order_name").val();
        if (order_name == '') {
            //$('#fname').css({'border-color' : '#d3d3d3'});
            $('#order_name').css({
                'border-color': '#ea4335'
            });
            $('#err_div').show();
            $("#errrMsg").html("Please enter order name");
            setTimeout(function() {
                $('#err_div').hide();
            }, 3000);
        } else if (order_name.length < 6) {
            $('#order_name').css({
                'border-color': '#ea4335'
            });
            $('#err_div').show();
            $("#errrMsg").html("Your order name must be at least 6 characters");
            setTimeout(function() {
                $('#err_div').hide();
            }, 3000);
        } else if (order_name.length > 50) {
            $('#order_name').css({
                'border-color': '#ea4335'
            });
            $('#err_div').show();
            $("#errrMsg").html("Your order name must be less than 50 characters");
            setTimeout(function() {
                $('#err_div').hide();
            }, 3000);
        } else if (isValid.test(order_name)) {
            $('#order_name').css({
                'border-color': '#ea4335'
            });
            $('#err_div').show();
            $("#errrMsg").html("Your order name in whitespace  not allowed");
            setTimeout(function() {
                $('#err_div').hide();
            }, 3000);
        } else {
            $('#order_name').css({
                'border-color': '#d3d3d3'
            });

            $('#editshippingdate').show();

            $('#addeditshippingdat1e').hide();

            $.ajax({
                type: 'POST',
                url: base_url + 'order/order/checkOrderName',
                data: {
                    'order_name': order_name,
                    'checkOrderName': true
                },
                success: function(res) {
                    if (res.check == 1) {
                        var datetime = $('#order_name').val();
                        $(".answer").slideDown();
                        isOpen = true;

                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                        $('#order_name').css({
                            'border-color': '#ea4335'
                        });
                        $('#err_div').show();
                        $("#errrMsg").html("Your order name " + order_name + " already exist!");
                        setTimeout(function() {
                            $('#err_div').hide();
                        }, 3000);

                    } else {
						$("#orderDiv1").show();
						$("#orderDiv2").hide();
                        isOpen = false;
						var order_name = $("#order_name").val();
						$("#show_order").text(order_name); 
                        $('#scc_div').show();
                        $("#successMsg").html("Your order name has been updated successfully.");
                        setTimeout(function() {
                            $('#scc_div').hide();
                        }, 3000);
                    }
                },
                error: function() {
                    alert('request failed');
					var order_name = $("#order_name").val();
					$("#show_order").text(order_name); 
					$("#orderDiv1").hide();
					$("#orderDiv2").show();
					isOpen = true;
                }
            });
        }
    } else {
        var datetime = $('#order_name').val();
        isOpen = true;
    }
}




function getorderStep(step) {
	
	

	if((step==2) && (flag!=1)){ 
		flag=1;
		$(".datatable").DataTable({
            "bDestroy": true,
        });
		
		if ($('#createOrder').is(':checked')) { 
			var order_name = $("#order_name").val();
			var order_type = $("input:radio.order_type:checked").val();
			var address_id = $("input[name=shipfrom]").val();
			var shipby = $("input[name=shipby]").val();			
			$.ajax({
				type: 'POST',
				url: base_url + 'order/order/create_order',
				data: {
					'order_name': order_name,
					'address_id':address_id,
					'packing_types':order_type,
					'order_shipby':shipby,
					'crete_order': true
				},
				beforeSend: function() {
					//.createShipment();
				},
				success: function(res) {
					//$('#continue_btn').attr('disabled', false);
					//$("#order_step1_table").html(res);
					//getAddress(exist_shipment);
				},
				complete: function(){
					getOrderTable(2);
				},
				error: function() {
					alert('request failed');
				}
			});
		};

		if ($('#existing_Order').is(':checked')) { 
			var order_name = $("#order_name").val();
			var order_type = $('input:radio[name="order_type"]').val();
			var exist_order_id = $('#exist_order').val();
			var shipby = $("input[name=shipby]").val();	
			$.ajax({
				type: 'POST',
				url: base_url + 'order/order/updateOrder',
				data: {
					'order_name': order_name,
					'order_type':order_type,
					'order_shipby':shipby,
					'order_id':exist_order_id,
					'updateExistingOrder': true
				},
				beforeSend: function() {
					//.createShipment();
				},
				success: function(res) {
					//$('#continue_btn').attr('disabled', false);
					//$("#order_step1_table").html(res);
					//getAddress(exist_shipment);
				},
				complete: function(){
					getOrderTable(2);
				},
				error: function() {
					alert('request failed');
				}
			});
		};
	}else{
		getOrderTable(step);
	}
}

function chengeOrder() {
	$(".selectedorderDiv").hide();
	$(".selectorderDiv").show();
}

function getOrderTable(step) { 
	$.ajax({
		type: 'GET',
		url: base_url + 'order/order/getorderStep/'+step,
		beforeSend: function() {
			$.LoadingOverlay("show");
		},
		success: function(res) {
			
			if(step!=''){
				$("#order_step"+step+"_table").html('');
				$("#order_step"+step+"_table").html(res);
			}
		},
		complete: function(){
			$.LoadingOverlay("hide");  
			if(step==2){
				$('.datatable').dataTable();
			}
		},
		error: function() {
			alert('request failed');
		}
	});
}

function getOrder(order_id){
	$.ajax({
		url: base_url + 'order/order/getOrder/'+order_id,
		beforeSend: function(){
		},
		success: function(data) {
			$("#show_order").text(data.order_name); 
			$('#order_name').val(data.order_name);
			$("#dispose_by").val($.datepicker.formatDate('mm/dd/yy', new Date(data.dispose_by)));
			//$('#dispose_by').datepicker({ minDate: new Date(data.dispose_by)});
		},
		complete: function(){ 
		},
		error: function() {
				alert('request failed');
		}
	});
}

function showDeletePopupOrder(table, column, id) {
    $('#remove-yes-buttonOrder').attr('onClick', 'deleteAccountOrder(\'' + table + '\', \'' + column + '\', ' + id + ')');
    $('#accountremoveorder').modal('show');
}

function deleteAccountOrder(table, column, id) { 
		$.ajax({
            type: 'POST',
            url: base_url + 'shipping/AddressController/deleteAddress',
            data: {
                'table': table,
                'column': column,
                'value': id
            },
            success: function(res) {
				$('#accountremoveorder').modal('hide');
				$('#EditAddress_order').hide();
				$('#AddAddress_orderDiv').hide();
                getUserAddress_order();
				checkUserAddress();
            },
            error: function() {
                alert('request failed');
            }
        });
}

setTimeout(function() {
    localStorage.clear();
}, 10000);

</script>
		
	