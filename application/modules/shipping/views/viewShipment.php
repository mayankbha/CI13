
		<div id="content">
			<div class="container">
				<div class="crumbs">
					<ul id="breadcrumbs" class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="<?php echo base_url('dashboard/Dashboard'); ?>"><?php echo $this->lang->line('Dashboard_Title'); ?></a>
						</li>
						<li class="current">
							<a href="<?php echo base_url('shipping/Shipping/view_shipment'); ?>" title=""><?php echo $this->lang->line('ViewShipping'); ?></a>
						</li>
					</ul>
				</div>  
			
				<div class="row">
					<div class="col-md-6 page-header">
						<div class="page-title">
							<h3><?php echo $this->lang->line('ShippingQueue'); ?></h3>
							<h5><?php echo $this->lang->line('Learnmore'); ?></h5>
						</div>
					</div>
					<div class="col-md-4">
					</div>
					<div class="col-md-2 page-header">
						
					</div>
				
				</div>
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="<?php if(isset($plan_type) && ($plan_type)==1){ echo 'active';}else{ echo ''; } ?>"><a href="#shipments" data-toggle="tab">Shipments</a></li>
							<li class="<?php if(isset($plan_type) && ($plan_type)==0){ echo 'active';} ?>"><a href="#shipping_plans" data-toggle="tab">Shipping Plans</a></li>
						</ul>
						<div class="tab-content row">
							<div class="tab-pane <?php if(isset($plan_type) && ($plan_type)==1){ echo 'active';} ?>" id="shipments">
								<form  method="POST"  id="searchShpimemet" action="<?php echo base_url('shipping/Shipping/search'); ?>">
								<div class="row">
									<div class="col-md-1">
										<label><?php echo $this->lang->line('DateRange'); ?> </label>
									</div>
									<div class="col-md-1">
										<select name="daterange" id="daterange" class="form-control">
											<option value="all" <?php if(isset($daterange) && ($daterange == 'all')){ echo 'selected'; } ?>> <?php echo $this->lang->line('All'); ?></option>
											<option value="1"  <?php if(isset($daterange) && ($daterange == 1)){ echo 'selected'; } ?> > Last1Day</option>
											<option value="5"  <?php if(isset($daterange) && ($daterange == 5)){ echo 'selected'; } ?>><?php echo $this->lang->line('Last5Days'); ?></option>
											<option value="15" <?php if(isset($daterange) && ($daterange == 15)){ echo 'selected'; } ?>><?php echo $this->lang->line('Last15Days'); ?></option>
											<option value="30" <?php if(isset($daterange) && ($daterange == 30)){ echo 'selected'; } ?>><?php echo $this->lang->line('Last30Days'); ?></option>
											<option value="60" <?php if(isset($daterange) && ($daterange == 60)){ echo 'selected'; } ?>><?php echo $this->lang->line('Last60Days'); ?></option>
											<option value="90" <?php if(isset($daterange) && ($daterange == 90)){  echo 'selected'; } ?>><?php echo $this->lang->line('Last90Days'); ?></option>
											<option value="other" <?php if(isset($daterange) && ($daterange == 'other')){  echo 'selected'; } ?>>Other</option>
										</select>
									</div>
									<div class="col-md-9">
										<div id="date_div" style="disply:"<?php if(isset($daterange) && ($daterange == 'block')){  echo 'selected'; } ?> >
											<div class="col-md-3">	
												<label ><?php echo $this->lang->line('From'); ?> :
												</label>
													<input type="text" id="from" name="from" class="form-control datepicker" style="margin-left: 48px;margin-top: -23px;width: 80%;" value="<?php if(isset($from) && ($from != '')){ echo $from; } ?>"> 
											</div>	
											<div class="col-md-3">	
												<label><?php echo $this->lang->line('To'); ?> :
												</label>
													<input type="text" name="to" id="to" class="form-control datepicker" style="margin-left: 48px;margin-top: -23px;width: 80%;" value="<?php if(isset($to) && ($to != '')){ echo $to; } ?>"> 
											</div>
											<div class="col-md-2">	
												<input type="submit" class="btn btn-primary search-btn" value="<?php echo $this->lang->line('Search'); ?>">
											</div>	
										</div>
									</div>
								</div><br /><br />
								<div class="row">
									<div class="col-md-1">
										<input type="hidden" name="plan_type" value="1">
										<label><?php echo $this->lang->line('Show'); ?> : </label> 
									</div>
									<div class="col-md-1">
										<label class="radio-inline">
											<input type="radio"   class="uniform" name="search_type" value="All"  <?php if($search_type=='All'){ echo 'checked'; }?>>
											<?php echo $this->lang->line('All'); ?>
										</label>
									</div>
									<div class="col-md-1">
										<label class="radio-inline">
											<input type="radio" class="uniform" name="search_type" value="4" <?php if($search_type==4){ echo 'checked';} ?>>
											<?php echo $this->lang->line('Intransit'); ?>
									</div>
									<div class="col-md-2">
										<label class="radio-inline">
											<input type="radio" class="uniform" name="search_type" value="1" <?php if($search_type==1){ echo 'checked';} ?>>
											In Complete
										</label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline">
											<input type="radio" class="uniform" name="search_type" value="3" <?php if($search_type==3){ echo 'checked'; }?>>Complete
										</label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline">
											<input type="radio" class="uniform" name="search_type" value="0" <?php if($search_type=='0'){ echo 'checked'; } ?>>
											<?php echo $this->lang->line('Deletecanceled'); ?>
										</label>
									</div>
								</div><br /><br />
								</form>
							
							<div class="row">
								<div class="col-md-12"  >
									<div class="widget box">
										<div class="widget-header">
										</div>
										<div class="widget-content no-padding table-responsive" id="ajaxviewTable" >
											<table class="table table-striped table-bordered table-hover table-checkable datatable">
												<thead>
													<tr>
														<th class="checkbox-column" style="width: 61px !important;">
															Return Shipment
														</th>
														<th style="width: 200px !important;"><?php echo $this->lang->line('ShipmentID'); ?></th>
														<th style="width: 200px !important;">Shipment Name</th>
														<th style="width: 200px !important;"> <?php echo $this->lang->line('BookingNumber'); ?></th>
														<th style="width: 200px !important;">Last Updated</th>
														<th style="width: 200px !important;"><?php echo $this->lang->line('MSKUs'); ?></th>
														<th style="width: 200px !important;"><?php echo $this->lang->line('Shipped'); ?></th>
														<th style="width: 200px !important;"><?php echo $this->lang->line('Received'); ?></th>
														<th style="width: 200px !important;"><?php echo $this->lang->line('Destination'); ?></th>
														<th style="width: 200px !important;"><?php echo $this->lang->line('Status'); ?></th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<?php if(!empty($shipments)) { ?> 
													<?php foreach($shipments as $i => $item) { ?> 
													<tr>
														<td class="checkbox-column">
													<?php if(isset($item->return_shipment) && ($item->return_shipment==1)){
													echo "yes";} else { echo "No"; }
														?>
														</td>
														<td><?php echo $item->shipping_id; ?></td>
														<td><?php echo $item->shipment_name; ?></td>
														<td><?php if($item->booking_number!=''){ echo $item->booking_number; }else{echo 'N/A'; } ?> </td>
														
														<td><?php if($item->created!='') { echo $item->created; } else{ echo 'N/A'; } ?></td>
														<td><?php echo $item->num_of_pro; ?></td>
														<td><?php echo $item->unit; ?></td><td>
														<td>San industry's, CA</td>
														<td><?php if($item->status==0){
																  echo 'DELETED';
																}else if($item->status==1){
																	echo 'INCOMPLETE';
																}else if($item->status==2){
																	echo 'WORKING ';
																}else if($item->status==3){
																	echo 'COMPLETE';
																}else if($item->status==4){
																	echo 'IN TRANSIT';
																}else if($item->status==5){
																	echo 'CANCELLED';
																}else if($item->status==6){
																	echo 'COMPLETE';
																}else{
																	echo 'CLOSED';
																}; ?></td>
														<td>
														<?php if($item->status==0){ ?>
															<a  href="<?php echo base_url('shipment/Shipment/viewShipment?shipment_id='.$item->shipment_id); ?>" class="btn btn-primary btntrack Shipment viewShipment" >View Shipment  </a>  
															</button>
															
														<?php } else if($item->step < 5){ ?>
															<button onclick="newDoc('<?php echo $item->shipment_id; ?>','<?php echo $item->step; ?>')" class="btn btn-primary btntrack Shipment" >Complete Shipment   
															</button>
															
														<?php } else if($item->step==7){ ?>
															<a  href="<?php echo base_url('shipment/Shipment/viewShipment?shipment_id='.$item->shipment_id); ?>" class="btn btn-primary btntrack Shipment trackshipment1" >Track Shipment</a> 
														<?php } else if($item->step==6){ ?>
															<button onclick="newDoc('<?php echo $item->shipment_id; ?>','<?php echo $item->step; ?>')" class="btn btn-primary btntrack Shipment" >Work on Shipment  
															</button
														<?php } else { ?>
															<button onclick="newDoc('<?php echo $item->shipment_id; ?>','<?php echo $item->step; ?>')" class="btn btn-primary btntrack Shipment" >Work On Shipment   
															</button>

														<?php } ?>
														</td>
													</tr>
													<?php } ?>
													<?php }else { ?>
														<tbody>
															<tr>
																<td colspan="10" align="center">
																	<div class="col-md-4 col-md-offset-4">
																		<div class="alert alert-warning fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Result!</strong> No Shipment found. </div>
																	</div>
																</td>
															</tr>	
														</tbody>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>	
							</div>	
							</div>
							
							<div class="tab-pane <?php if(isset($plan_type) && ($plan_type)==0){ echo 'active';} ?>" id="shipping_plans">
								<form  method="POST" id="searchShpimemetForm"   action="<?php echo base_url('shipping/Shipping/search_in_plan_type'); ?>">
									<div class="row">
										<div class="col-md-1">
											<input type="hidden" name="plan_type" value="0">
											<label><?php echo $this->lang->line('Show'); ?> : </label> 
										</div>
										<div class="col-md-1">
											<label class="radio-inline">
												<input type="radio" class="uniform" name="radio_search" value="All"  <?php if($radio_search=='All'){ echo 'checked'; }?>>
												<?php echo $this->lang->line('All'); ?>
											</label>
										</div>
										<div class="col-md-1">
											<label class="radio-inline">
												<input type="radio" class="uniform" name="radio_search" value="2" <?php if($radio_search==2){ echo 'checked';} ?>>
												<?php echo $this->lang->line('Working'); ?>
											</label>
										</div>
									</div><br /><br />
								</form>
								<div class="row">
									<div class="col-md-12"  id="ajaxview" >
										<div class="widget box">
											<div class="widget-header">
											</div>
											<div class="widget-content no-padding table-responsive"  id="ajaxviewTable1">
												<table class="table table-striped table-bordered table-hover table-checkable datatable">
													<thead>
														<tr>
															<th class="checkbox-column" style="width: 61px !important;">
																Return Shipping 
															</th>
															
															<th style="width: 200px !important;"><?php echo $this->lang->line('ShipmentID'); ?></th>
															<th style="width: 200px !important;">Shipment Name</th>
															<th style="width: 200px !important;"> <?php echo $this->lang->line('BookingNumber'); ?></th>
															<th style="width: 200px !important;">Created Date</th>
															<th style="width: 200px !important;">Last Updated</th>
															<th style="width: 200px !important;">Unit</th>
															<th style="width: 200px !important;">Msku</th>
															<th style="width: 200px !important;"><?php echo $this->lang->line('Status'); ?></th>
															<th></th>
														</tr>
													</thead>
													<tbody>
														<?php if(!empty($shipping_plans)) { ?> 
														<?php foreach($shipping_plans as $i => $item) { ?> 
														<tr>
															<td class="checkbox-column">
																<?php if(isset($item->return_shipment) && ($item->return_shipment==1)){
																echo "yes";} else { echo "No"; }
																?>
															</td>
															<td><?php echo $item->shipping_id; ?></td>
															<td><?php echo $item->shipment_name; ?></td>
															<td><?php if($item->booking_number!=''){ echo $item->booking_number; }else{echo 'N/A'; } ?> </td>
															<td><?php if($item->created!='') { echo $item->created; } else{ echo 'N/A'; } ?></td>
															<td><?php if($item->last_updated!='') { echo $item->last_updated; } else{ echo 'N/A'; } ?></td>
															<td><?php echo $item->unit; ?></td>
															<td><?php echo $item->num_of_pro; ?></td>
															<td><?php if($item->status==0){
																	  echo 'DELETED';
																	}else if($item->status==1){
																		echo 'INCOMPLETE';
																	}else if($item->status==2){
																		echo 'WORKING '; 
																	}else if($item->status==3){
																		echo 'COMPLETE';
																	}else if($item->status==4){
																		echo 'IN TRANSIT';
																	}else if($item->status==5){
																		echo 'CANCELLED';
																	}else if($item->status==6){
																		echo 'COMPLETE';
																	}else{
																		echo 'CLOSED';
																	}; ?></td>
															<td>
															<?php if($item->status==0){ ?>
																<a  href="<?php echo base_url('shipment/Shipment/viewShipment?shipment_id='.$item->shipment_id); ?>" class="btn btn-primary btntrack Shipment viewShipment" >View Shipment   </a>
																
															<?php } else if($item->step <= 6){ ?>
																<button onclick="newDoc('<?php echo $item->shipment_id; ?>','<?php echo $item->step; ?>')" class="btn btn-primary btntrack Shipment" >Work on Shipping Plan 
																</button>
															<?php } else if($item->step > 6){ ?>
																<a  href="<?php echo base_url('shipment/Shipment/viewShipment?shipment_id='.$item->shipment_id); ?>" class="btn btn-primary btntrack Shipment viewShipment" >View Shipment   
																</a>

															<?php } ?>
															</td>
														</tr>
														<?php } ?>
														<?php }else { ?>
															<tbody>
																<tr>
																	<td colspan="10" align="center">
																		<div class="col-md-4 col-md-offset-4">
																			<div class="alert alert-warning fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Result!</strong> No Shipment found. </div>
																		</div>
																	</td>
																</tr>	
															</tbody>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>	
								</div>	
						</div>
						</div>
					</div>
			</div>
			<!-- /.container -->
		</div>
		<!-- Trigger the modal with a button -->
	</div>

<script>
	$(document ).ready(function() { 
		
		if($('#daterange').val() == 'other') { 
			$('#date_div').show();
		} else {
			$('#date_div').hide();
			$('#from').val('');
			$('#to').val('');
		} 
		$( "#daterange" ).change(function() {
			if($('#daterange').val() == 'other') { 
				$('#date_div').show();
			} else {
				$('#date_div').hide();
				$('#from').val('');
				$('#to').val('');
			} 
		});
		
		
		localStorage.clear();
		
		$('input[type=radio][name=search_type]').change(function() { 
			$( ".search-btn" ).trigger( "click" );
		});
		
		$('input[type=radio][name=radio_search]').change(function() { 
			$( "#searchShpimemetForm" ).submit();
		});
		
		$('input[type=radio][name=search_type]').change(function() { 
			$( "#searchShpimemet" ).submit();
		});
		
		$('#searchShpimemetForm').submit(function(event) {
		});

	});
</script>