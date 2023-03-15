<style>
table.fixed { table-layout:fixed; }
table.fixed td { overflow: hidden; }
 
</style>

<?php // print_r($address);?>
<?php  //print_r($products);?><?php //print_r($shipments); die; ?>
<?php 
if(isset($shipments)){
	$where1							=		array('address_id'=>$shipments->address_id);
	$saveaddressDetails				=		$this->common->getSingleRecord('addresses',$where1);
	
	$whereid3						=		@array('id'=>$saveaddressDetails->country);
	$country 						= 		$this->common->getSingleRecord('countries', $whereid3);
	
	$whereid						=		@array('id'=>$saveaddressDetails->state);
	$state 							= 		$this->common->getSingleRecord('states', $whereid);

	$whereid1						=		@array('id'=>$saveaddressDetails->city);
	$city 							= 		$this->common->getSingleRecord('cities', $whereid1);
}
?>
			
		<input type="hidden" name="shipment_id" id="shipment_id" value="<?php echo $shipments->shipment_id; ?>" />
		<div id="content">
			<div class="container">

				<!-- Breadcrumbs line -->
				<div class="crumbs">
					<ul id="breadcrumbs" class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="<?php echo base_url('administrator/dashboard'); ?>"><?php echo $this->lang->line('Dashboard_Title'); ?></a>
						</li>
						<li>
							<a href="<?php echo base_url('administrator/ViewController'); ?>" title=""><?php echo $this->lang->line('ViewShipping'); ?></a>
						</li>
						<li >
							<a href="<?php echo base_url('administrator/ViewController/shipmentViewDetails');?>" title="">Shipment Queue</a>
						</li>
						<li class="current">
							<a href="<?php echo base_url('administrator/ViewController/viewShipment?shipment_id='.$_GET['shipment_id']);?>" title="">View Shipment</a>
						</li>
					</ul>
				</div>  
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-12 page-header">
						<div class="page-title">
							<h3>Summary</h3>
							<h5><?php if(isset($shipments)) { echo $shipments->shipment_name; } ?></h5>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<?php if(isset($shipments) && ($shipments->status==0 )){ ?>			
							<div class="alert alert-danger fade in">
								Deleted Shipment! This Shipment is Deleted , and can not be restored.
							</div>				
						<?php } ?>
					</div>
				</div>
				<div class="col-md-12">
					<?php //if(isset($shipments) && ($shipments->status!=0 )){ ?>			
						<!--<a href="javascript:void(0);" onclick="removeShipment('<?php// echo $shipments->shipment_id; ?>');"class="btn btn-primary pull-right" align="right"> Delete Shipment </a> 		-->		
					<?php //} ?>
				</div>
				<hr style="border-width: 4px 0 0;margin-top: 42px;" />
				<div class="row">
                    <div class="col-md-12">
						<div class="col-md-3">
							<div><b>Ship from</b></div><hr />
							<div><?php  echo $address->name; ?></div>
							<div><?php  echo $address->addressline1; ?>,<?php  echo $address->addressline2; ?></div>
							<div><?php  echo $address->zipcode; ?></div>
							<div><?php if(isset($country) && ($state)  && ($city)) { echo $state->name .','.$city->name .','. $country->name; } ?></div>
						</div>
						 
						<div class="col-md-3"> 
							<div><b>Shipment Name ID</b></div><hr />
							<div><?php  echo $shipments->shipment_name; ?></div>
							<div>ID:<?php  echo $shipments->shipping_id; ?></div>
						</div>
						
						<div class="col-md-3">
							<div><b>Ship To</b></div><hr />
							<div>Amazon.com</div>
							<div>550 Oak Ridge Rd</div>
							<div>Hazleton, PA 18202</div>
							<div>US(AVP1)</div>
						</div>
						
						<div class="col-md-3">
						<div><b>Shipment Contents</b></div><hr />
							<div><?php if(isset($shipments)) { echo $shipments->shipping_plan_type; }?></div>
							<div><?php echo count($products); ?> Msku</div>
							
							<div><?php if(isset($shipments)) { echo $shipments->unit; }?> Unit
							</div>
							<div>
								<?php if(isset($shipments) && ($shipments->shipped_status==0) && ($shipments->status!=0)) { ?>
									<a href="javascript:void(0);" onclick="markusShipment(<?php echo $shipments->shipment_id; ?>,<?php echo $shipments->shipment_id; ?>); "class="btn btn-primary" >  Marked as Shipped </a>
								<?  }  ?>
							</div>
							<div></div>
						</div>
                    </div>
                </div>	
				<hr />
				<div class="row">
					<div class="col-md-12">
						<!-- Tabs-->
						
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_overview" data-toggle="tab">Track shipment</a></li>
							
								<li ><a href="#tab_open_account" data-toggle="tab">Shipment contents</a></li>
								<li><a href="#tab_open_account2" data-toggle="tab">Print Labels</a></li>
							</ul>
							<div class="tab-content row" style="overflow: hidden ! important;">
								<!--=== Overview ===-->
								<div class="tab-pane active" id="tab_overview">
								<?php if(isset($shipments) && ($shipments->shipped_status==1) && ($shipments->status!=0)) {  ?>
								
								<?php if(isset($shipments)  &&   ($shipments->ship_or_vendor_code=="Flight")) { ?>
								<div class="col-md-12">	
									<form name="trackingShipmentForm2" id="trackingShipmentForm1" method="post" action="">	
										<div class="row" >
											<div class="col-md-12">
												<div class="alert alert-success">
													<strong>To !</strong> change the number of boxes,please go back to the previous page
												</div>	
											</div>
											<div class="col-md-1"></div>
											<div class="col-md-9"><h4>Box</h4></div>
											<div class="col-md-1"></div>		
											<div class="col-md-1"></div><br />
										</div>	
										<div class="row" >
											<div class="col-md-1"></div>
											<div class="col-md-1">#</div>
											<div class="col-md-3">Tracking#</div>
											<div class="col-md-2">Carrier</div>
											<div class="col-md-1"></div>
											<div class="col-md-2"></div>											
											<div class="col-md-1"></div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<hr />
											</div>
										</div>
										<div class="row" >
												<div class="col-md-1"></div>
												<div class="col-md-1">1</div>
												<div class="col-md-3"><input type="text" name="tracking" class="form-control" placeholder="Enter tracking number"></div>
												<div class="col-md-2"><select class="form-control">
												<option>UPS</option>
												<option>USPS</option>
												<option>FEDEX</option>
												</select></div>
												<div class="col-md-2"><button class="btn btn-primary">Submit</button></div>
												<div class="col-md-1"><span ></div>
												<div class="col-md-1"></div>
										</div><hr />
									</form>
								</div> <!-- /.col-md-12 --><br /><br />
								<?php } else { ?>
									<div class="col-md-12">	
										<form name="trackingShipmentForm1" id="trackingShipmentForm1" method="post" action="">
											<div class="row" >
												<div class="col-md-12">
													<div class="alert alert-success">
														<strong>To !</strong> change the number of boxes,please go back to the previous page
													</div>	
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-9"><h4>Box</h4></div>
												<div class="col-md-1"></div>		
												<div class="col-md-1"></div><br />
											</div>	
											<div class="row" >
												<div class="col-md-1">#</div>
												<div class="col-md-2">Tracking#</div>
												<div class="col-md-2">Carrier</div>
												<div class="col-md-2">Departure Date</div>
												<div class="col-md-2">Arrival Date</div>
												<div class="col-md-1"></div>											
												<div class="col-md-2"></div>
											</div>

											<div class="row">
												<div class="col-md-12">
													<hr />
												</div>
											</div>

											<span id="showDivTracking">	
												<div class="row input_fields_wrap" id="tracking_div">
													<input type="hidden" name="total_record_count" id="total_record_count" value="<?php echo $total_record_count ?>" />

													<?php if(!empty($tracking_data)) { $cnt = 1; ?>
														<?php foreach($tracking_data as $tracking)  { ?>
															<div class="row" id="hide-custom-<?php echo $cnt; ?>">
																<input type="hidden" name="validate_add_more" class="form-control" id="validate_add_more_<?php echo $cnt; ?>" value="1" />

																<div class="col-md-1"><?php echo $cnt; ?></div>

																<div class="col-md-2">
																	<input type="text" name="tracking" id="tracking_number_<?php echo $cnt; ?>" class="form-control" placeholder="Enter tracking number" value="<?php echo $tracking->tracking_number; ?>" disabled="disabled" />
																</div>

																<div class="col-md-2">
																	<select class="form-control" name="carrier" id="carrier_<?php echo $cnt; ?>" onchange="showOtherOption(<?php echo $cnt; ?>, this.value);" disabled="disabled">
																		<?php foreach($user_carriers as $user_carrier) { ?>
																			<option value="<?php echo $user_carrier->carrier_name; ?>" <?php if($tracking->carrier == $user_carrier->carrier_name) { ?>selected="selected"<?php } ?>><?php echo $user_carrier->carrier_name; ?></option>
																		<?php } ?>

																		<option value="others">Others</option>
																	</select>
																</div>

																<div class="col-md-2">
																	<input type="text" name="departure_date" id="departure_date_<?php echo $cnt; ?>" class="form-control datepicker" value="<?php echo date('d-m-Y', strtotime($tracking->departure_date)); ?>" disabled="disabled" /> 
																</div>

																<div class="col-md-2">
																	<input type="text" name="arrival_date" id="arrival_date_<?php echo $cnt; ?>" class="form-control datepicker" value="<?php echo date('d-m-Y', strtotime($tracking->arrival_date)); ?>" disabled="disabled" /> 
																</div>

																<div class="col-md-1"><button type="button" class="btn btn-primary" onclick="addTracking(<?php echo $cnt; ?>);">Submit</button></div>

																<div class="col-md-2"></span></div>
															</div>
														<?php $cnt++; } ?>
													<?php } else { ?>
														<div class="row" id="hide-custom-1">
															<input type="hidden" name="validate_add_more" class="form-control" id="validate_add_more_1" value="0" />

															<div class="col-md-1">1</div>

															<div class="col-md-2">
																<input type="text" name="tracking" id="tracking_number_1" class="form-control" placeholder="Enter tracking number" />
															</div>

															<div class="col-md-2">
																<select class="form-control" name="carrier" id="carrier_1" onchange="showOtherOption(1, this.value);">
																	<?php foreach($user_carriers as $user_carrier) { ?>
																		<option value="<?php echo $user_carrier->carrier_name; ?>"><?php echo $user_carrier->carrier_name; ?></option>
																	<?php } ?>
																	
																	<option value="others">Others</option>
																</select>
															</div>

															<div class="col-md-2">
																<input type="text" name="departure_date" id="departure_date_1" class="form-control datepicker"  placeholder="DD-MM-YYYY" /> 
															</div>

															<div class="col-md-2">
																<input type="text" name="arrival_date" id="arrival_date_1" class="form-control datepicker"  placeholder="DD-MM-YYYY" /> 
															</div>

															<div class="col-md-1"><button type="button" class="btn btn-primary" onclick="addTracking(1);">Submit</button></div>

															<div class="col-md-2"></span></div>
														</div>
													<?php } ?>
												</div>
												
												<div class="row">
													<div class="col-md-12" id="validate_tracking_error" style="text-align: center; color: red; display: none;">
														Field can not be left blank
													</div>
												</div>

												<div class="row">
													<div class="col-md-12" id="validate_add_more_error" style="text-align: center; color: red; display: none;">
														Looks like you have already added one row, please input data in it
													</div>
												</div>
												
												<hr />
											</span>
											
											<div class="row">
												<div class="col-md-8"></div>
												<div class="col-md-2"><a href="javascript: void(0)"  class="add_field_button" id="addMore" onclick="addMoreRows();">Add More</a></div>
												<div class="col-md-2"></div>
											</div>
										</form>	
									</div> <!-- /.col-md-12 --><br /><br />
								<?php } ?>	
									
								<?php } else { ?>	
									<div class="col-md-4 col-md-offset-4" align="center">
										<div class="alert alert-warning fade in">
											This is not Trackable
										</div>		
									</div>
								<?php } ?>	
								</div>
								<!-- /Overview -->

								<!--=== Edit Account ===-->
								<div class="tab-pane" id="tab_open_account">
									<div class="col-md-12">
										<div class="row" >
											<div class="col-md-12">
												<div class="alert alert-success">
													We recommend not packing and sealing your boxes until you have provided box content information in the <strong>Prepare Shipment</strong> step of the workflow. 
												</div>	
											</div>	
										</div>	<br />
										
										<table class="table table-hover table-bordered">
										<?php if(isset($shipments) && ($shipments->shipping_plan_type=='Casepacked Products')) { ?>
											<thead>
												<tr style="border-color:white;">
													<th>MSKUs</th>
													<th>Title</th>
													<th>Condition</th>
													<th>UPC</th>
													<th>Number of Cases</th>
													<th>Shipped</th>
													<th>Received</th>
												</tr>
											</thead>
											<?php if(!empty($products)){ ?>	
												<tbody>	
													<?php foreach($products as $key=> $row) { ?>
														<tr>
															<td><a href="#"><?php echo $row->merchant_SKU; ?></a></td>
															<td style="width:300px"><?php echo $row->title; ?></td>
															<td><?php echo $row->condition; ?></td>
															<td><?php echo $row->UPC; ?></td>
															<td><?php echo $row->number_of_cases; ?></td>
															<?php if(isset($shipments) && ($shipments->shipped_status==1)){ ?>
																<td><?php echo $row->shipment_quantity; ?></td>
																<td>N/A</td>
															<?php }else{ ?>
																<td>N/A</td>
																<td>N/A</td>
															<?php } ?>
															
														</tr>
													<?php } ?>
													<tr>
														<td><b>Total</b></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td> 
														<td><b><?php if(isset($shipments) && ($shipments->shipped_status==1) && ($shipments->status!=0)){ echo $shipments->unit; }else{ echo "N/A"; } ?> </b></td>
														<td><b>N/A</b>
														</td>
													</tr>
												</tbody>
											<?php }else{ ?>
											<tbody>
												<tr>
													<td colspan="5" align="center">
														<div class="col-md-4 col-md-offset-4">
															<div class="alert alert-warning fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Warning!</strong> No record Inventory. </div>
														</div>
													</td>
												</tr>	
											</tbody>
											<?php } ?>	
											
											
											
											
										<?php } else { ?>
											<thead>
												<tr style="border-color:white;">
													<th>MSKUs</th>
													<th>Title</th>
													<th>Condition</th>
													<th>Price</th>
													<th>UPC</th>
													<th>Shipped</th>
													<th>Received</th>
												</tr>
											</thead>
												<?php if(!empty($products)){ ?>	
											<tbody>	
												<?php foreach($products as $key=> $row) { ?>
													<tr>
														<td><a href="#"><?php echo $row->merchant_SKU; ?></a></td>
														<td style="width:300px"><?php echo $row->title; ?></td>
														<td><?php echo $row->condition; ?></td>
														<td>$<?php echo $row->price; ?></td>
														<td><?php echo $row->UPC; ?></td>
														<?php if(isset($shipments) && ($shipments->shipped_status==1)){ ?>
																<td><?php echo $row->shipment_quantity; ?></td>
																<td>N/A</td>
														<?php }else{ ?>
																<td>N/A</td>
																<td>N/A</td>
														<?php } ?>
													</tr>
												<?php } ?>
											</tbody>
												<?php } else{ ?>
											<tbody>
												<tr>
													<td colspan="5" align="center">
														<div class="col-md-4 col-md-offset-4">
															<div class="alert alert-warning fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Warning!</strong> No record Inventory. </div>
														</div>
													</td>
												</tr>	
											</tbody>
												<?php } ?>	
												<?php } ?>
											
												
												
										</table>
									</div> <!-- /.col-md-12 -->
									<div class="col-md-12" >
										<h3 class="block padding-bottom-10px title_bar">Shipping Notes</h3>
										<div class="col-md-6 col-md-offset-12" style="border:2px solid lightgrey;padding:41px;">
										
										</div>
									</div>
								</div>
								<!-- /Edit Account -->
								
								
								<!--=== Edit Account ===-->
								<div class="tab-pane" id="tab_open_account2">
									<div class="col-md-12">
										<div class="row" >
											<div class="col-md-12">
												<div class="alert alert-success">
													We recommend not packing and sealing your boxes until you have provided box content information in the <strong>Prepare Shipment</strong> step of the workflow. 
												</div>	
											</div>	
										</div>	<br />
										<table class="table table-bordered table-hover">
											<?php if(isset($shipments) && ($shipments->shipping_plan_type=='Casepacked Products')) { ?>
											<thead>
												<tr style="border-color:white;">
													<th>MSKUs</th>
													<th>Title</th>
													<th>Condition</th>
													<th>UPC</th>
													<th>Number of Cases</th>
													<th>Shipped</th>
													<th>Received</th>
													<th>Product Label to print</th>
												</tr>
											</thead>
											<?php if(!empty($products)){ ?>	
												<tbody>	
													<?php foreach($products as $key=> $row) { ?>
														<tr>
															<td><a href="#"><?php echo $row->merchant_SKU; ?></a></td>
															<td style="width:300px"><?php echo $row->title; ?></td>
															<td><?php echo $row->condition; ?></td>
															<td><?php echo $row->UPC; ?></td>
															<td><?php echo $row->number_of_cases; ?></td>
															<?php if(isset($shipments) && ($shipments->shipped_status==1)){ ?>
																<td><?php echo $row->shipment_quantity; ?></td>
																<td>N/A</td>
															<?php }else{ ?>
																<td>N/A</td>
																<td>N/A</td>
															<?php } ?>
															<td><input name="qnty" type="text" class="form-control qty label_generate"  id="label-<?php echo $row->product_id; ?>" onblur="changeLabel('<?php echo $row->product_id; ?>');" value="" style="width:82px;">
															</td>
														</tr>
													<?php } ?>
													<tr>
														<td><b>Total</b></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td> 
														<td><b><?php if(isset($shipments) && ($shipments->shipped_status==1) && ($shipments->status!=0)){ echo $shipments->unit; }else{ echo "N/A"; } ?> </b></td>
														<td><b>N/A</b>
														</td>
													</tr>
												</tbody>
											<?php }else{ ?>
											<tbody>
												<tr>
													<td colspan="5" align="center">
														<div class="col-md-4 col-md-offset-4">
															<div class="alert alert-warning fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Warning!</strong> No record Inventory. </div>
														</div>
													</td>
												</tr>	
											</tbody>
											<?php } ?>	
											
											
											
											
										<?php } else { ?>
											<thead>
												<tr style="border-color:white;">
													<th>MSKUs</th>
													<th>Title</th>
													<th>Condition</th>
													<th>Price</th>
													<th>UPC</th>
													<th>Shipped</th>
													<th>Received</th>
													<th>Product Label to print</th>
												</tr>
											</thead>
												<?php if(!empty($products)){ ?>	
											<tbody>	
												<?php foreach($products as $key=> $row) { ?>
													<tr>
														<td><a href="#"><?php echo $row->merchant_SKU; ?></a></td>
														<td style="width:300px"><?php echo $row->title; ?></td>
														<td><?php echo $row->condition; ?></td>
														<td>$<?php echo $row->price; ?></td>
														<td><?php echo $row->UPC; ?></td>
														<?php if(isset($shipments) && ($shipments->shipped_status==1)){ ?>
																<td><?php echo $row->shipment_quantity; ?></td>
																<td>N/A</td>
															<?php }else{ ?>
																<td>N/A</td>
																<td>N/A</td>
														<?php } ?>
														<td><input name="qnty" type="text" class="form-control qty label_generate"  id="label-<?php echo $row->product_id; ?>" onblur="changeLabel('<?php echo $row->product_id; ?>');" value="" style="width:82px;"></td>
													</tr>
												<?php } ?>
											</tbody>
												<?php } else{ ?>
											<tbody>
												<tr>
													<td colspan="5" align="center">
														<div class="col-md-4 col-md-offset-4">
															<div class="alert alert-warning fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Warning!</strong> No record Inventory. </div>
														</div>
													</td>
												</tr>	
											</tbody>
												<?php } ?>	
												<?php } ?>
										</table>
										<br /><br />
										<div class="col-md-8 col-md-offset-1">
											<div class="alert alert-info fade in">Each unit of Shipment must be labeled with a UPC barcode, print it from here if you don't have it, you can print it from here>></div>
										</div>
									
										<div class="col-md-2" style="padding-top:10px;">
												<button class="btn btn-success printLabel"><?php echo $this->lang->line('Printlabelforthispage'); ?></button>
										</div>
									
										  
										<br /><br />
											
										<div class="col-md-1"></div>
										<div class="col-md-4" style="padding-left:126px;">
											<label><?php echo $this->lang->line('How_Many_Cartons'); ?></label>
										</div>
										<?php if(isset($shipments) && ($shipments->shipping_plan_type=='Casepacked Products')) { ?> 
											<div class="col-md-3">
												<input type="text"  disabled  name="cartonCasepacked" value="<?php if(isset($shipments)) { echo $shipments->unit; }?>" class="form-control qty carton"> 
											</div>
											<div class="col-md-4" style="padding-left:226px;">
												<button onclick="cartonCasepacked()"  class="btn btn-success pull-left">Print Label for Carton</button>
											</div>
										
										<?php } else { ?>
											<div class="col-md-3">
												<input type="text"   name="carton" class="form-control qty carton"> 
											</div>
											<div class="col-md-4" style="padding-left:226px;">
												<button onclick="cartonGenerate()" class="btn btn-success pull-left print_carton">Print Label for Carton</button>
											</div>
										<?php } ?>
										
										
									</div> <!-- /.col-md-12 -->
									<hr/>
									<?php if(isset($shipments)  &&  ($shipments->step > 6)) { ?>
									<div class="row" style="padding-top:100px">
										<div class="col-md-8"></div>
										<div class="col-sm-2">
											<a href="<?php echo base_url("shipping/Shipping/download/1/$shipments->shipment_id"); ?>"   class="btn btn-success button-submit pull-right"> <?php echo $this->lang->line('download_invoice'); ?> <i class="icon-fixed-width"></i></a>
										</div>
										<div  class="col-sm-2">
											<a href="<?php echo base_url("shipping/Shipping/download/2/$shipments->shipment_id"); ?>"   class="btn btn-success button-submit pull-left" > <?php echo $this->lang->line('download_Packingg_List'); ?> <i class="icon-fixed-width"></i></a>
										</div>		
									</div>
									<?php } ?>
								</div>
								<!-- /Edit Account -->
								
							</div> <!-- /.tab-content -->
						</div><br /><br /><br /><br />
						
						<!--END TABS-->
					</div>
					
					
				</div> <!-- /.row -->
				
				
				
			</div>
			<!-- /.container -->
		</div>
		<!-- Trigger the modal with a button -->
	</div>
	
<style>
#removeDiv {
	display:none;
}
</style>
<?php   $shipment_id 		=	$_GET['shipment_id'];  ?>
<script>
	var x = $('#total_record_count').val(); //initlal text box count
	function addMoreRows() {
		//alert('Hi');

		//alert(x);

		x++; //text box increment

		$('#validate_add_more_error').hide();

		var prev_carrier_field_val = x - 1;

		//alert(prev_carrier_field_val);

		$(".input_fields_wrap").append('<div class="row" id="hide-custom-'+x+'"><input type="hidden" name="validate_add_more" class="form-control" id="validate_add_more_'+x+'" value="0" /><from id="form-custom-'+x+'" method="POST"><div class="col-md-1">'+x+'</div><div class="col-md-2"><input type="text" name="tracking" id="tracking_number_'+x+'" class="form-control" placeholder="Enter tracking number"></div><div class="col-md-2"><select class="form-control" name="carrier" id="carrier_'+x+'" onchange="showOtherOption('+x+', this.value);"></select></div><div class="col-md-2"><input type="text" name="departure_date" id="departure_date_'+x+'" class="form-control datepicker" placeholder="DD-MM-YYYY" /></div><div class="col-md-2"><input type="text" name="arrival_date" id="arrival_date_'+x+'" class="form-control datepicker" placeholder="DD-MM-YYYY" /></div><div class="col-md-1"><button type="button" class="btn btn-primary" onclick="addTracking('+x+');">Submit</button></div><div class="col-md-2"><span><a href="javascript: void(0)" onclick="removeField('+x+')" class="remove_field" id='+x+'>Remove</a></span></div></form><br /></div><br id="extraBr"/>'); //add input box

		//alert('#carrier_'+prev_carrier_field_val);

		var options = '';

		$.each($('#carrier_'+prev_carrier_field_val).prop('options'), function() {
			//alert(this.value);

			options += '<option value="'+this.value+'">'+this.value+'</option>';
		});

		//alert(options);

		$('#carrier_'+x).append(options);

		$('.datepicker').datepicker({
			format: "dd-mm-yyyy"
		});

		//alert('Hi2');

		$(".add_field_button").hide();

		$('#total_record_count').val(x);
	}

	function showOtherOption(field_id, val) {
		//alert(val);

		if(val == 'others') {
			//alert('In If');

			$('#carrier_'+field_id).after('<div id="other_carrier_div_'+field_id+'"><br><input type="text" name="others_carrier_name" id="others_carrier_name_'+field_id+'" class="form-control" placeholder="Enter Carrier Name" /><br><input type="button" class="btn btn-primary" onclick="addOtherCarrier('+field_id+');" value="Add" /><br><br></div>');
		}
	}

	function addOtherCarrier(field_id) {
		//alert('others_carrier_name_'+field_id);

		var field_val = $('#others_carrier_name_'+field_id).val();

		//alert(field_val);

		if(field_val != '') {
			$('#others_carrier_name_'+field_id).css('border-color', '#ccc');
			$('#others_carrier_name_error_'+field_id).hide();

			$.ajax({
				type: 'POST',
				url: base_url+'shipment/Shipment/addOtherCarrier',
				data : {'field_val' : field_val},
				success: function(res) {
					if(res == 1) {
						//alert(field_id);

						$('#others_carrier_name_'+field_id).val('');
						$('#others_carrier_name_'+field_id).after('<span id="others_carrier_name_error_'+field_id+'" style="color: red;">'+field_val+' Already Exists</span>');
					} else if(res != '') {
						$('#others_carrier_name_error_'+field_id).hide();
						$('#other_carrier_div_'+field_id).hide();
						$('#carrier_'+field_id).html(res);
					}
				}
			});
		} else {
			$('#others_carrier_name_'+field_id).css('border-color', 'red');
			$('#others_carrier_name_'+field_id).after('<span id="others_carrier_name_error_'+field_id+'" style="color: red;">Field can not be left blank</span>');
		}
	}

	function addTracking(field_id) {
		var shipment_id = $('#shipment_id').val();

		var tracking_number = $('#tracking_number_'+field_id).val();
		var carrier = $('#carrier_'+field_id).val();
		var departure_date = $('#departure_date_'+field_id).val();
		var arrival_date = $('#arrival_date_'+field_id).val();

		if(tracking_number != '' && departure_date != '' && arrival_date != '') {
			$('#validate_tracking_error').hide();

			$.ajax({
				type: 'POST',
				url: base_url+'shipment/Shipment/addTracking',
				data : {'shipment_id' : shipment_id, 'tracking_number' : tracking_number, 'carrier' : carrier, 'departure_date' : departure_date, 'arrival_date' : arrival_date},
				success: function(res) {
					if(res != '') {
						$('#tracking_div').html(res);

						$('#validate_tracking_error').hide();
						$('#validate_add_more_error').hide();

						$(".add_field_button").show();
					}
				}
			});
		} else {
			$('#validate_tracking_error').show();
		}
	}

	function cartonGenerate() {
		var carton		=	$("input[name=carton]").val();
		if(carton!=''){
			window.location=  base_url + 'shipping/Shipping/printCarton/'+carton+'/<?php echo $shipment_id; ?>';
		}
	}
	function cartonCasepacked() {
		var carton		=	$("input[name=cartonCasepacked]").val();
		if(carton!=''){
			window.location=  base_url + 'shipping/Shipping/printCarton/'+carton+'/<?php echo $shipment_id; ?>';
		}
	}

	function removeField(ID) {
		$('#hide-custom-'+ID).remove();
		$('#extraBr').remove();
		$(".add_field_button").show();
		x--;
	}
	
	$(document).ready(function() {

		$('#trackingShipmentForm').submit(function(event) {
			$.ajax({
				type: 'POST',
				url: base_url+'trackingshipment/Trackingshipment/changeStatus',
				data : $('#trackingShipmentForm2').serialize(),
				success: function(res) {
					if(res=='UPS'){
						var url =  'https://www.ups.com/WebTracking/track?loc=en_gb';
						window.open(url,'_blank');
					}else if(res=='USPS'){
						var url =  'https://www.aftership.com/en/courier/usps';
						window.open(url,'_blank');
					}else if(res=='FEDEX'){
						var url = 'http://www.fedex.com/us/fedextracking/';
						window.open(url,'_blank');
					}
				}
			});
			event.preventDefault();
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
	
		$("#removeDiv").click(function () {
			$("#showDivTracking").hide(); 
		});
		$(".printLabel").on("click", function( e ) { 
			var i = 0;
			$.each($('.label_generate'), function(index, value) { 
				 i += parseInt($(this).val());
			});
			if(i==0){	
			}else{
				window.location=  base_url + 'shipping/Shipping/printLabel/'+i+'/<?php echo $shipment_id; ?>';
			}
		});	
	
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
		});		
	});
</script>
	 