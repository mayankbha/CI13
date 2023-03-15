
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
							<a href="#" title=""><?php echo $this->lang->line('Shipping'); ?></a>
						</li>
					</ul>
				</div>  
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<!-- /Page Header -->
								
				<div class="row">
					<div class="col-md-3 page-header">
						<div class="page-title">
							<h3><?php echo $this->lang->line('Shipping'); ?></h3>
							<h5><?php echo $this->lang->line('Create_your_Shipment'); ?></h5>
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
						
						<div class="alert alert-info fade in"> 
							<i class="icon-remove close" data-dismiss="alert"></i> <strong>Info!		</strong> Reloading/Closing the browser will save your Shipment to Draft 
						</div>
							 
					</div>
					<div class="col-md-1">
					</div>
					<div class="col-md-2">
						
						<div class="page-title" id="editshippingdate">
							<h3 align="right"><?php echo $this->lang->line('Shipment_Name'); ?></h3>
							<h5 align="right">
								<span id="showvalue" style="font-size:16px;padding-bottom:4px ! important;"><?php echo 'HUB-'.date('d-m-y-H-i-s'); ?></span>&nbsp;&nbsp;
									<a href="javascript:void(0);" class="editshippingtitle" onclick="editshippingdate();" >
										Rename
									</a>
							</h5>
						</div>
 
						<div class="page-title" id="addeditshippingdat1e" style="display:none;">
							<h3 align="right" style="padding-right: 16px ! important;"><?php echo $this->lang->line('Shipment_Name'); ?></h3>
							<span id="addeditshippingdat1e" style="font-size:16px;padding-bottom:4px ! important">
								<input type="text" id="getvalueShipping" name="editShippingDate" value="HUB-<?php echo date('d-m-y-H-i-s'); ?>" class="form-control shpname">
									<a href="javascript:void(0);" class="saveshippingtitle" onclick="editshippingdate();">
										Save
									</a>
							</span> 
						</div>
					</div>
				</div>

				<div class="row">
                    <div class="col-md-12">
                        <div class="widget box" id="form_wizard">
                            
                            <div class="widget-content">
                                <form class="form-horizontal" id="sample_form" action="<?php echo base_url(); ?>payment/alipay" action="#">
                                    <div class="form-wizard">
                                        <div class="form-body" id="tabs">
                                            <ul class="nav nav-pills nav-justified steps">
                                                <li>
                                                    <a href="#tab1" data-toggle="tab" class="step" disabled> <span class="number">1</span> <br />
														<span class="desc"><i class="icon-ok"></i> <?php echo $this->lang->line('Shipping_Plan'); ?></span> 
													</a>
                                                </li>
                                                <li>
                                                    <a href="#tab2" data-toggle="tab" id="t2" class="step" > <span class="number">2</span><br />
														<span class="desc"><i class="icon-ok"></i> <?php echo $this->lang->line('Inventory'); ?></span>
													</a>
                                                </li>
                                                <li>
                                                    <a href="#tab3" data-toggle="tab" id="t3"class="step" > <span class="number">3</span><br /> <span class="desc"><i class="icon-ok"></i> <?php echo $this->lang->line('Set_Quarity'); ?></span> </a>
                                                </li>
                                                <li>
                                                    <a href="#tab4" data-toggle="tab" id="t4" class="step"> <span class="number">4</span><br /> <span class="desc"><i class="icon-ok"></i> <?php echo $this->lang->line('Label_Products'); ?></span> </a>
                                                </li>
												<li>
                                                    <a href="#tab5" data-toggle="tab" class="step"> <span class="number">5</span><br /> <span class="desc"><i class="icon-ok"></i> <?php echo $this->lang->line('Review_Shipment'); ?></span> </a>
                                                </li>
												<li>
                                                    <a href="#tab6" data-toggle="tab" id="t6" class="step" > <span class="number">6</span><br /> <span class="desc"><i class="icon-ok"></i> <?php echo $this->lang->line('WorkonShipment'); ?></span> </a>
                                                </li>
												<li >
                                                    <a href="#tab7" data-toggle="tab" class="step"  id="t7" > <span class="number">7</span><br /> <span class="desc"><i class="icon-ok"></i> <?php echo $this->lang->line('Print_Booking_Confirmation'); ?></span> </a>
                                                </li>
                                            </ul>
                                            <div id="bar" class="progress progress-striped" role="progressbar">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="row">
													<div class="col-md-4 col-md-offset-4">
														
													</div>
												</div>
												<div class="tab-pane active" id="tab1">
                                                    <h3 class="block padding-bottom-10px title_bar"><?php echo $this->lang->line('Createshippingplan'); ?></h3>
													<div class="row spacing_shipping">
														
														<div class="col-md-1">
														</div>
														
														
														<div class="col-md-3">
														<hr class="hr_margin"/>
															<label class="labelsize"><?php echo $this->lang->line('CreateShipment'); ?></label>
															<label class="checkbox">
																<input type="checkbox" class="uniform" id="return_shipment" name="return_shipment" value=""> Is return shipment
															</label>
											
															<label class="radio-inline" >
																<input type="radio" class="uniform " id="createplan"  name="shiping_plan" value="option1" required>
																.
															</label>
															<div style="padding-left: 32px; margin-top: -20px;"><?php echo $this->lang->line('Createanewshippingplan'); ?></div>
															
															<?php if(!empty($existing_shipping_plan)) { ?>
															<label class="radio-inline" style="margin-bottom:10px;">
																<input type="radio" class="uniform" id="add_shipping_plan" name="shiping_plan" value="option1">
																.
															</label>
															<div style="padding-left: 32px; margin-top: -30px;"><?php echo $this->lang->line('Addexistingshippingplan'); ?></div>
															
															<div style="padding-left:23px ! important;">
																<select class="form-control" name="exist_shipment" id="selectbox_shipping_plan" style="width:47%;">
																	<option selected >Select Shiping Plan</option>
																	<?php foreach($existing_shipping_plan as $row){  ?>
																	<option value="<?php echo  $row->shipment_id; ?>"><?php echo  $row->shipment_name; ?></option>
																	<?php } ?>
																</select>
															</div>	
															<?php } ?>
															
														</div>
														
														<div class="col-md-3">
															<label class="labelsize"><?php echo $this->lang->line('Shipfrom'); ?></label>
															
															<div class="addressDiv">
																<hr class="hr_margin"/>
																<?php if(!empty($saveaddressDetails)) { ?>
																<input type="hidden" name="shipfrom"  value="<?php echo $saveaddressDetails[0]->address_id; ?> ">
																<?php 
																	$this->load->model('common_model', 'common'); /* LOADING MODEL */
															
																	$whereid3						=		@array('id'=>$saveaddressDetails[0]->country);
																	$country 						= 		$this->common->getSingleRecord('countries', $whereid3);
															
																	$whereid						=		@array('id'=>$saveaddressDetails[0]->state);
																	$state 							= 		$this->common->getSingleRecord('states', $whereid);
															
																	$whereid1						=		@array('id'=>$saveaddressDetails[0]->city);
																	$city 							= 		$this->common->getSingleRecord('cities', $whereid1);
																?>
																<?php echo $saveaddressDetails[0]->name; ?> 
																<?php echo $saveaddressDetails[0]->addressline1; ?></br>
																<?php echo $saveaddressDetails[0]->addressline2; ?></br>
																<?php echo $city->name; ?>
																<?php echo $state->name; ?>
																<?php echo $country->name; ?>
																<?php echo $saveaddressDetails[0]->zipcode; ?></br>
																<?php echo $saveaddressDetails[0]->contactoffice; ?>
																<?php echo $saveaddressDetails[0]->contactmobile; ?>
																</br>
																<a href='#myModalFullscreen' data-toggle='modal' class="spacing_shipping_custom"><?php echo $this->lang->line('Change'); ?></a>
															&nbsp;&nbsp;&nbsp;
															<?php } else{ ?> 
																	<input type="radio"  style=' visibility: hidden;' name="shiping_planjm" value="option1" required>
																	<a href='#myModalFullscreen' data-toggle='modal'><?php echo $this->lang->line('Add'); ?></a> 
															<?php } ?>
															</div>
														</div>
														<!--<div class="col-md-3 customrd">
															<label class="labelsize"><?php echo $this->lang->line('ShippingPlanType'); ?></label>
															<hr class="hr_margin"/>
															<div class="custom_radio_check1 ">
																<label class="radio-inline" >
																<input type="radio" class="uniform sh_plan_type" name="shipping_plan" value="Individual Products" required >
																<?php //echo $this->lang->line('Individualproducts'); ?>
																</label>
															</div>
															<div class="custom_radio_check2 " >
																<label class="radio-inline" >
																<input type="radio" class="uniform sh_plan_type" name="shipping_plan" value="Casepacked Products">
																	<?php //echo $this->lang->line('Caseackedproducts'); ?>
																</label>
															</div>
														</div>-->
														
														<!--test code--> 
														<div class="col-md-3 customrd">
															<label class="labelsize"><?php echo $this->lang->line('ShippingPlanType'); ?></label>
															<hr class="hr_margin"/>
															<div class="custom_radio_check1">
																<label class="radio-inline" >
																<input type="radio" class="uniform sh_plan_type" name="shipping_plan" value="Individual Products" required >
																.
																</label>
																<div style="padding-left: 32px; margin-top: -20px;"><?php echo $this->lang->line('Individualproducts'); ?></div>
															</div>
															<div class="custom_radio_check2">
																<label class="radio-inline" >
																<input type="radio" class="uniform sh_plan_type" name="shipping_plan" value="Casepacked Products">
																	.
																</label>
																<div style="padding-left: 32px; margin-top: -20px;"><?php echo $this->lang->line('Caseackedproducts'); ?></div>
															</div>
														</div>
														
														<div class="col-md-2">
														</div>
													</div>
													<div class="existShip_plan">
														<h3 class="block padding-bottom-10px title_bar">View Items</h3>
														<div class="row">
															<div class="col-md-12 table-responsive" id="step1_table">
																<table class="table">
																	<tr style="border-color:white;">
																		<th><?php echo $this->lang->line('Merchant_SKU'); ?></th>
																		<th><?php echo $this->lang->line('ProductName'); ?></th>
																		<th><?php echo $this->lang->line('Condition'); ?></th>
																		<th><?php echo $this->lang->line('Unit'); ?></th>
																		<th><?php echo $this->lang->line('Remove'); ?></th>
																	</tr>											
																	<tr>
																		<label></label>
																	</tr>
																</table>
															</div>	
														</div>
													</div><br /><br />
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
																<div class="widget-content no-padding table-responsive" id="step2_table">
																	
																</div>
															</div>
														</div>
													</div>
													<!--=== no-padding ===-->
                                                </div>
 
												<div class="tab-pane" id="tab3">
													<div id="step3_table"> 
														
													</div>
												</div>
												
												<div class="tab-pane" id="tab4">
                                                   	<div id="step4_table"> 
														
													</div>
                                                </div>
												<div class="tab-pane" id="tab5">
                                                   		<div id="step5_table"> 
														
													</div>
                                                </div>
												<div class="tab-pane active" id="tab6">
													<div id="step6_table">
													</div>
                                                </div>
												<div class="tab-pane" id="tab7">
                                                   <div id="step7_table">
												   </div>
                                                </div>
										    </div>
											
                                        </div>
										
                                        <div class="form-actions fluid" id="form_actions1">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-1" >
                                                        <a href="javascript:void(0);" class="btn button-previous" align="right"> <i class="icon-angle-left"></i> <?php echo $this->lang->line('Back'); ?> </a> 
													</div>
													 <div class="col-md-1" >
													 </div>
													<div class="col-md-7 text-center">
														<span class="alert alert-danger text-center" style="display:none" id="err_div1">
															<button class="close" data-dismiss="alert">
															</button> <span id="errrMsg1">You missed some fields. They have been highlighted.</span> 
														</span>	
													
														<span class="alert alert-danger custom-alert" style="display:none" >
															<button class="close" data-dismiss="alert">
															</button> You missed some fields.
														</span>
													</div>
                                                    <div class="col-md-1">
														
													</div>
													<div class="col-md-3 pull-right" id="save_works_btn">
														<a href="javascript:void(0);"  class="btn btn-primary save_works_btn" >Save <i class="icon-angle-right"></i> </a>
														<a href="javascript:void(0);"  class="btn btn-primary save_works_btn1" >Save and Work on shipment<i class="icon-angle-right"></i></a> 		
													</div>
                                                    <div class="col-md-1">
														<a href="JavaScript:void(0);" class="btn btn-primary button-state" ><?php echo $this->lang->line('Continue'); ?><i class="icon-angle-right"></i> </a>
													</div>
                                                    <div class="col-md-1" id="continue_btn_div">
														<a href="javascript:void(0);" id="continue_btn" class="btn btn-primary button-next" > <?php echo $this->lang->line('Continue'); ?> <i class="icon-angle-right"></i> </a> 		
													</div>
													
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
		</div>
		<!-- Trigger the modal with a button -->
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
                <div class="container">
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-4 page-header">
							<div class="page-title">
								<h3><?php echo $this->lang->line('ShipFromAddress'); ?></h3>
								<span><?php echo $this->lang->line('Chooseaddress'); ?></span><br />
							</div>
						</div>
						<div class="col-md-4" style="padding-top:31px;">
							<div class="alert alert-info" align="center">
								<a href="#" data-dismiss="modal">Continue with Shipment!</a> 
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
								<button class="btn btn-primary" id="addaddress" href="#">Add Address</button>
							</h3>
						</div>
					
					</div>
					<!-- /Page Header -->
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
											<input type="radio" class="uniform" onclick="saveaddressDetails('<?php echo $row->address_id; ?>')" value="<?php echo $row->address_id; ?>" name="optionsRadios2" value="option1" <?php if($a == $b){ echo "checked"; } ?> >
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
											<button class="btn btn-primary" class="editaddress" onclick="editAddresswindow(<?php echo $row->address_id; ?>);" href=".EditAddress1" ><?php echo $this->lang->line('Edit'); ?></button>
											<button class="btn btn-primary" onclick="showDeletePopup('addresses', 'address_id', '<?php echo $row->address_id; ?>');"><?php echo $this->lang->line('Delete'); ?></button>
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
			
			<!-- /.container -->
			<div class="container addaddress1" style="display:none;" id="AddAddress">
				<h3 class="block padding-bottom-10px title_bar">Add Address</h3>
				<!-- email and password Message -->

				<div class="alert fade in alert-danger" id="error_message" style="display:none;">      
					All field required
				</div>
			
				<div class="tab-pane" id="tab_edit_account">
					<form class="form-horizontal" method="POST" id="validate-addaddress-form" >
	
						<div class="col-md-12 form-vertical no-margin">
							<div class="widget">
								<div class="widget-content">
									<div class="row">
										<div class="col-md-3">
										</div>
										<div class="col-md-6">
											
											<div class="form-group">
												<label class="col-md-4">Name:</label>
												<div class="col-md-8"><input type="text" id="name" name="name" class="form-control required" ></div>
											</div>
											
											<div class="form-group">
												<label class="col-md-4">Address Line 1:</label>
												<div class="col-md-8"><input type="text" id="addressline1" name="addressline1" class="form-control required" ></div>
											</div>

											<div class="form-group">
												<label class="col-md-4">Address Line 2:</label>
												<div class="col-md-8"><input type="text" id="addressline2" name="addressline2" class="form-control" ></div>
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
													<select name="country" class="form-control required" id="country1">
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
														<select name="state" class="form-control required" id="state1">
															<option value="" Selected>Select State</option>
																									
														</select>
								
												</div>
										</div>
											
										
											<div class="form-group">
												<label class="col-md-4">City:</label>
												<div class="col-md-8">
											
														<select name="city" class="form-control required" id="city1">
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
												<div class="col-md-8"><input type="text" name="zipcode" id="zipcode" class="form-control required" data-mask="99999"></div>
											</div>

											<div class="form-group">
												<label class="col-md-4">Contact - Office:</label>
												<div class="col-md-8"><input type="text" name="contactoffice" id="contactoffice" data-mask="9999-9999999"  class="form-control required" ></div>
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
												<div class="col-md-8"><input type="text" id="contactmobile" name="contactmobile" data-mask="(999) 999-9999" class="form-control required"></div>
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
		
				<div class="container edit_address" style="display:none;" >
					<h3 class="block padding-bottom-10px title_bar">Edit Address</h3>
					<!-- email and password Message -->
					<div class="alert fade in alert-danger" id="Edit_error_message" style="display:none;">      
						All field required
					</div>
					<div class="tab-pane" id="tab_edit_address_sh">
						
					</div>
				</div>
				<!-- Landing elements -->
				

		</div>
		<!-- Trigger the modal with a button -->
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<style>
.radio-inline{
	color:white ! important;
}
</style>
<!-- /.modal -->
	<script type="text/javascript">
		$(document).ready(function() {
			// executes when HTML-Document is loaded and DOM is ready
			localStorage.removeItem('shippingName');
		});
		if (location.host == "envato.stammtec.de" || location.host == "themes.stammtec.de") {
			var _paq = _paq || [];
			_paq.push(["trackPageView"]);
			_paq.push(["enableLinkTracking"]);
			(function() {
				var a = (("https:" == document.location.protocol) ? "https" : "http") + "://analytics.stammtec.de/";
				_paq.push(["setTrackerUrl", a + "piwik.php"]);
				_paq.push(["setSiteId", "17"]);
				var e = document,
					c = e.createElement("script"),
					b = e.getElementsByTagName("script")[0];
				c.type = "text/javascript";
				c.defer = true;
				c.async = true;
				c.src = a + "piwik.js";
				b.parentNode.insertBefore(c, b)
			})()
		};
    </script>
	
<script type="text/javascript">
	"use strict";
$(document).ready(function() {

	var c = $("#sample_form");
    var d = $("#form_wizard");
    var a = $(".custom-alert", c);
    var f = $(".alert-success", c);
	$.validator.messages.required = '';

	c.validate({
		doNotHideMessage: true,
		focusInvalid: false,
		invalidHandler: function(h, g) {
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

		getStep(m);

        $(".step-title", d).text("Step " + (h + 1) + " of " + l);
        $("li", d).removeClass("done");
        var n = g.find("li");
		
        for (var j = 0; j < h; j++) {
            $(n[j]).addClass("done")
        }

		if(m == 5){
			setTimeout(function(){ 
				$('#save_works_btn').show(); 
				$('#continue_btn_div').hide(); 
			}, 2000);
		} else {
			setTimeout(function(){ 
				$('#save_works_btn').hide();
				$('#continue_btn_div').show();	
			}, 2000);
		}
        if (m == 2) {
            d.find(".button-previous").hide()
        } else {
            d.find(".button-previous").show()
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
	
	
	
	$('#countrysh').on('change',function(){ 
		
		var countryID = $(this).val();

		if(countryID){
			$.ajax({
				type:'POST',
				url:base_url + 'shipping/Shipping/selectState',
				data:'country_id='+countryID,
				beforeSend: function(){
				},
				success:function(html){
					$('#statesh').html(html);
					$('#citysh').html('<option value="">Select state first</option>'); 
				},
				complete: function() {},
				error: function() {}
			}); 
		}else{
			$('#statesh').html('<option value="">Select country first</option>');
			$('#citysh').html('<option value="">Select state first</option>'); 
		}
	});
	
	$('#statesh').on('change',function(){
        var stateID = $(this).val();
		
        if(stateID){
            $.ajax({
                type:'POST',
                url:base_url + 'shipping/Shipping/selectCity',
                data:'state_id='+stateID,
				beforeSend: function(){
				},
                success:function(html){
                    $('#citysh').html(html);
                },
				complete: function() {},
				error: function() {}
            }); 
        }else{
            $('#citysh').html('<option value="">Select City first</option>'); 
        }
    });
});
	</script>
		
	