	<!-- /Page Header -->
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
										
										$whereid						=		@array('id'=>$row->state);
										$state 							= 		$this->common->getSingleRecord('states', $whereid);
										
										$whereid1						=		@array('id'=>$row->city);
										$city 							= 		$this->common->getSingleRecord('cities', $whereid1);?>

										<label><?php echo $city->name; ?>  <?php echo $state->name; ?></br>
										,<?php echo $row->zipcode; ?></label><br />
										<label><?php echo $country->name; ?></label><br />
										
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
				