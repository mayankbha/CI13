		
		<!--=== Navigation ===-->
				<!--<ul id="nav">
					<li class="current">
						<a href="<?php //echo base_url(); ?>dashboard">
							<i class="icon-dashboard"></i>
							<?php //echo $this->lang->line('Dashboard_Title'); ?>
						</a>
					</li>
					
				</ul>-->
			<!--</div>
			<div id="divider" class="resizeable"></div>
		</div>-->
		<!-- /Sidebar -->

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
							<a href="<?php echo base_url('shipping/shipping_Address_from'); ?>" title=""><?php echo $this->lang->line('Dashboard_Setup'); ?></a>
						</li>
					</ul>
				</div>  
				<!-- /Breadcrumbs line -->

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
							<a href="<?php echo base_url('shipping');?>">Continue with Shipment!</a> 
						</div>
					</div>
					<div class="col-md-2">
					</div>
					<div class="col-md-2">
						<h3 align="right" style="padding-right: 16px ! important;padding-top:16px;">
							<a class="btn btn-primary" id="addaddress" href="#AddAddress">Add Address</a>
						</h3>
					</div>
				
				</div>
				<!-- /Page Header -->
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
									
										<label><?php echo $row->name; ?></label><br />
										<label><?php echo $row->addressline1; ?></label><br />
										<label><?php echo $row->addressline2; ?></label><br />
										<?php 
										
										$this->load->model('common_model', 'common'); /* LOADING MODEL */
										
										$whereid3						=		@array('id'=>$row->country);
										$country 						= 		$this->common->getSingleRecord('countries', $whereid3);

										$whereid						=		@array('country_id'=>$row->state);
										$state 							= 		$this->common->getSingleRecord('states', $whereid);
										
										$whereid1						=		@array('id'=>$row->city);
										$city 							= 		$this->common->getSingleRecord('cities', $whereid1);?>

										<label><?php echo $city->name; ?>  <?php echo $state->name; ?></br>
										<?php echo $country->name; ?>,<?php echo $row->zipcode; ?></label><br />
										<label><?php echo $row->country; ?></label><br />
										<label>Office : <?php echo $row->contactoffice;

										?> </label><br />
										<label>Work : <?php echo $row->contactmobile; ?> </label><br /><br />
										
										<button class="btn btn-primary" class="editaddress" onclick="editAddresswindow(<?php echo $row->address_id; ?>);" href=".EditAddress1" ><?php echo $this->lang->line('Edit'); ?></button>
										
										<button class="btn btn-primary" onclick="showDeletePopup('addinformation', 'address_id', '<?php echo $row->address_id; ?>');"><?php echo $this->lang->line('Delete'); ?></button>
									
									
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
											
														<select name="country" class="form-control required" id="country">
															<option Selected>Select Country</option>
															<option value="Afghanistan">Afghanistan</option>
															<option value="Aland Islands">Aland Islands</option>
															<option value="Albania">Albania</option>
															<option value="Algeria">Algeria</option>
														</select>
												
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-4">City:</label>
												<div class="col-md-8">
													<select name="city" class="form-control required" id="city">
														<option value="">Select City</option>
														<option value="Teaxe">Teaxe</option>
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
		
				<div class="container addaddress1 EditAddress1" style="display:none;" class="">
					<h3 class="block padding-bottom-10px title_bar">Edit Address</h3>
					<!-- email and password Message -->
					<div class="alert fade in alert-danger" id="Edit_error_message" style="display:none;">      
						All field required
					</div>
					<div class="tab-pane" id="tab_edit_account">
						<form class="form-horizontal" method="POST" id="validate-editaddaddress-form" >
		
							<div class="col-md-12 form-vertical no-margin">
								<div class="widget">
									<div class="widget-content">
										<div class="row">
											<div class="col-md-3">
											</div>
											<div class="col-md-6">
												
												<div class="form-group">
													<label class="col-md-4">Name:</label>
													<div class="col-md-8"><input type="text" id="editname" name="name" class="form-control required" ></div>
												</div>
												
												<div class="form-group">
													<label class="col-md-4">Address Line 1:</label>
													<div class="col-md-8"><input type="text" id="editaddressline1" name="addressline1" class="form-control required" ></div>
												</div>

												<div class="form-group">
													<label class="col-md-4">Address Line 2:</label>
													<div class="col-md-8"><input type="text" id="editaddressline2" name="addressline2" class="form-control required" ></div>
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
												
															<select name="country" class="form-control required" id="editcountry">
																<option value="" Selected>Select Country</option>
																<option value="Afghanistan">Afghanistan</option>
																<option value="Aland Islands">Aland Islands</option>
																<option value="Albania">Albania</option>
																<option value="Algeria">Algeria</option>
																
															</select>
													
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4">City:</label>
													<div class="col-md-8">
														<select name="city" class="form-control required" id="editcity">
															<option value="" selected>Select City</option>
															<option value="Teaxe">Teaxe</option>
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
													<div class="col-md-8"><input type="text" name="zipcode" id="editzipcode" class="form-control required" data-mask="99999"></div>
												</div>

												<div class="form-group">
													<label class="col-md-4">Contact - Office:</label>
													<div class="col-md-8"><input type="text" name="contactoffice" id="editofficeno" class="form-control required" ></div>
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
													<div class="col-md-8"><input type="text" id="editmobileno" name="contactmobile" data-mask="(999) 999-9999" class="form-control required"></div>
												</div>
											</div>
											<div class="col-md-3">
											</div>
										</div> <!-- /.row -->
									</div> <!-- /.widget-content -->
								</div> <!-- /.widget -->

								
								<div class="form-actions">
									<input type="hidden" name="address_id" id="address_id">
									<input type="submit" value="Edit Information" name="Edit Information" class="btn btn-primary pull-right">
								</div>
							</div> <!-- /.col-md-12 -->
						</form>
					</div>
				</div>
				<!-- Landing elements -->
				

		</div>
		<!-- Trigger the modal with a button -->
	</div>
	<style>
	.addaddress {
		height: 200px;
	}
	.addaddress1 {
		height: 200px;
	}
	#EditAddress1{
		width: 100%;
		height: 1000px;
		background: #999;
	}
	</style>

<script type="text/javascript">

$(document).ready(function() {
	$("#addaddress").on("click", function( e ) {

		e.preventDefault();
		$('#AddAddress').show();
		$("body, html").animate({ 
			scrollTop: $( $(this).attr('href') ).offset().top 
		}, 600);
	});
});

</script>