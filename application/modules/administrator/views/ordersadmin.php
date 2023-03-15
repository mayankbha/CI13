				<!--=== Navigation ===-->
			<!--	<ul id="nav">
					<li class="current">
						<a href="<?php //echo base_url(); ?>dashboard">
							<i class="icon-dashboard"></i>
							<?php //echo $this->lang->line('Dashboard_Title'); ?>
						</a>
					</li>
					
				</ul>
			</div>
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
							<a href="<?php echo base_url('administrator/dashboard'); ?>"><?php echo $this->lang->line('Dashboard_Title'); ?></a>
						</li>
						<li class="current">
							<a href="<?php echo base_url('administrator/Order');?>" title="">View Order</a>
						</li>
					</ul>
				</div>  
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-6 page-header">
						<div class="page-title">
							<h3>View Order</h3>
							<h5><?php echo $this->lang->line('Learnmore'); ?></h5>
						</div>
					</div>
					<div class="col-md-4">
					</div>
					<div class="col-md-2 page-header">
						
					</div>
				
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab_overview" data-toggle="tab">All Order</a></li>
							<li><a href="#tab_open_account1" data-toggle="tab">Manual Order</a></li>
							<li><a href="#tab_open_account2" data-toggle="tab">Shipstation Order</a></li>
						</ul>
						<div class="tab-content row">
							<div>
								<form  method="POST" action="<?php echo base_url('shipping/Shipping/search'); ?>">
								<div class="row">
									<div class="col-md-1">
										<label><?php echo $this->lang->line('DateRange'); ?> :</label>
									</div>
									<div class="col-md-1">
										<select name="daterange" id="daterange" class="form-control">
											<option value="" selected><?php echo $this->lang->line('All'); ?></option>
											<option value="1"><?php echo $this->lang->line('Last1Day'); ?></option>
											<option value="5"><?php echo $this->lang->line('Last5Days'); ?></option>
											<option value="15"><?php echo $this->lang->line('Last15Days'); ?></option>
											<option value="30"><?php echo $this->lang->line('Last30Days'); ?></option>
											<option value="60"><?php echo $this->lang->line('Last60Days'); ?></option>
											<option value="90"><?php echo $this->lang->line('Last90Days'); ?></option>
										</select>
									</div>
									<div class="col-md-9">
										<div class="col-md-3">	
											<label ><?php echo $this->lang->line('From'); ?> :
											</label>
												<input type="text" name="form" class="form-control datepicker" style="margin-left: 48px;margin-top: -23px;width: 80%;" value="12-04-2017"> 
										</div>	
										<div class="col-md-3">	
											<label><?php echo $this->lang->line('To'); ?> :
											</label>
												<input type="text" name="to" class="form-control datepicker" style="margin-left: 48px;margin-top: -23px;width: 80%;" value="31-04-2017"> 
										</div>
										<div class="col-md-2">	
											<input type="submit" class="btn btn-primary" value="<?php echo $this->lang->line('Search'); ?>">
										</div>	
										
									</div>
								</div><br /><br />
								
								
								<div class="row">
									<div class="col-md-1">
										<label><?php echo $this->lang->line('Show'); ?> : </label> 
									</div>
									<div class="col-md-1">
										<label class="radio-inline">
											<input type="radio" class="uniform" name="search_type" value="All"  <?php //if($search_type=='All'){ echo 'checked'; }?>>
											<?php echo $this->lang->line('All'); ?>
										</label>
									</div>
									<div class="col-md-1">
										<label class="radio-inline">
											<input type="radio" class="uniform" name="search_type" value="1" <?php //if($search_type==1){ echo 'checked';} ?>>
											Shipped
										</label>

									</div>
									<div class="col-md-1">
										<!--<label class="radio-inline">
											<input type="radio" class="uniform" name="search_type" value="2" <?php //if($search_type==2){ echo 'checked';} ?>>
											<?php// echo $this->lang->line('Intransit'); ?>-->
											
										<label class="radio-inline">
											<input type="radio" class="uniform" name="search_type" value="2" <?php //if($search_type==2){ echo 'checked'; }?>>
										  Pending
											
										</label>
									</div>
									
									<div class="col-md-2">
										<!--<label class="radio-inline">
											<input type="radio" class="uniform" name="search_type" value="3" <?php //if($search_type==3){ echo 'checked';} ?>>
											<?php //echo $this->lang->line('fulfillmentcenter'); ?>
										</label>-->
										
										<label class="radio-inline">
											<input type="radio" class="uniform" name="search_type" id="radio21" value="3" <?php //if($search_type==3){ echo 'checked'; }?>>
											Cancelled
											
										</label>
										
										
									</div>
									
									
									
									
									
								</div><br /><br />
								</form>
							</div>
						
							<!--=== Overview ===-->
							<div class="tab-pane active" id="tab_overview">
								<div class="col-md-12">		
									<div class="widget box">
										<div class="widget-header"></div>
											<div class="widget-content no-padding table-responsive" >
												<table class="table table-striped table-bordered table-hover table-checkable datatable">
													<thead>
														<tr>
															
															<th style="width: 101px !important;">Source</th>
															<th style="width: 101px !important;"> Age</th>
															<th style="width: 164px !important;">Order #</th>
															<th style="width: 235px !important;">Order Date</th>
															<th style="width: 188px !important;">Order Total</th>
															<th style="width: 105px !important;">Quantity</th>
															<th style="width: 141px !important;">Recipient</th>
															<th style="width: 141px !important;">Status</th>
															<th style="width: 141px !important;"></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															
															<td>Hubway</td>
															<td>1D 7H</td>
															<td>ODR-522-55121</td>
															<td>2017-05-10</td>
															
															
															<td>$12</td>
															<td>20</td>
															<td>Steven Pan</td>
															<td>Cancelled</td>
															<td><a href="<?php echo base_url('administrator/Order/vieworder');?>" class="btn btn-primary">View</a></td>
															
														</tr>
													
													
														<tr>
															
															<td>Shipstation</td>
															<td>1D 7H</td>
															<td>ODR-522-55121</td>
															<td>2017-05-10</td>
													
															
															<td>$12</td>
															<td>20</td>
															<td>Steven Pan</td>
															<td>Shipped</td>
															<td><a href="<?php echo base_url('administrator/Order/vieworder');?>" class="btn btn-primary">View</a></td>
															
														</tr>
													
														<tr>
															
															<td>Shipstation</td>
															<td>1D 7H</td>
															<td>ODR-522-55121</td>
															<td>2017-05-10</td>
															
															
															<td>$12</td>
															<td>20</td>
															<td>Steven Pan</td>
															<td>Received</td>
															<td><a href="<?php echo base_url('administrator/Order/vieworder');?>" class="btn btn-primary">View</a></td>
															
														</tr>
													
														<tr>
															
															<td>Hubway</td>
															<td>1D 7H</td>
															<td>ODR-522-55121</td>
															<td>2017-05-10</td>
															
															<td>$12</td>
															<td>20</td>
															<td>Steven Pan</td>
															<td>Received</td>
															<td><a href="<?php echo base_url('administrator/Order/vieworder');?>" class="btn btn-primary">View</a></td>
															
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div> <!-- /.col-md-12 -->
								</div>
								<!-- /Overview -->

								<!--=== Edit Account ===-->
								<div class="tab-pane" id="tab_open_account1">
									<form class="form-horizontal" action="#">
										<div class="col-md-12">
											<div class="widget box">
												<div class="widget-header">
												</div>
												<div class="widget-content no-padding table-responsive" >
													<table class="table table-striped table-bordered table-hover table-checkable datatable">
														<thead>
															<tr>
																<th style="width: 101px !important;">Source</th>
																<th style="width: 101px !important;"> Age</th>
																<th style="width: 164px !important;">Order #</th>
																<th style="width: 235px !important;">Date Created</th>
																
																<th style="width: 188px !important;">Order Total</th>
																<th style="width: 105px !important;">Quantity</th>
																<th style="width: 141px !important;">Recipient</th>
																<th style="width: 141px !important;">Status</th>
																<th style="width: 141px !important;"></th>
															</tr>
														</thead>
														<tbody>
															<tr>
															
																<td>Hubway</td>
																<td>1D 7H</td>
																<td>ODR-522-55121</td>
																<td>2017-05-10</td>
																
																
																<td>$12</td>
																<td>20</td>
																<td>Steven Pan</td>
																<td>Received</td>
																<td><a href="<?php echo base_url('administrator/Order/vieworder');?>" class="btn btn-primary">View</a></td>
																
															</tr>
															<tr>
															
																<td>Shipstation</td>
																<td>1D 7H</td>
																<td>ODR-522-55121</td>
																<td>2017-05-10</td>
																
																
																<td>$12</td>
																<td>20</td>
																<td>Steven Pan</td>
																<td>Shipped</td>
																<td><a href="<?php echo base_url('administrator/Order/vieworder');?>" class="btn btn-primary">View</a></td>
																
															</tr>
															<tr>
																<td>Shipstation</td>
																<td>1D 7H</td>
																<td>ODR-522-55121</td>
																<td>2017-05-10</td>
																
																
																<td>$12</td>
																<td>20</td>
																<td>Steven Pan</td>
																<td>Shipped</td>
																<td><a href="<?php echo base_url('administrator/Order/vieworder');?>" class="btn btn-primary">View</a></td>
																
															</tr>
															<tr>
																<td>Hubway</td>
																<td>1D 7H</td>
																<td>ODR-522-55121</td>
																<td>2017-05-10</td>
																
																<td>$12</td>
																<td>20</td>
																<td>Steven Pan</td>
																<td>Cancelled</td>
																<td><a href="<?php echo base_url('administrator/Order/vieworder');?>" class="btn btn-primary">View</a></td>
																
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div> <!-- /.col-md-12 -->
									</form>
								</div>
								<!-- /Edit Account -->
								<!--=== Edit Account ===-->
								<div class="tab-pane" id="tab_open_account2">
									<form class="form-horizontal" action="#">
										<div class="col-md-12">
											<div class="widget box">
												<div class="widget-header">
												</div>
												<div class="widget-content no-padding table-responsive" >
													<table class="table table-striped table-bordered table-hover table-checkable datatable">
														<thead>
															<tr>
																<th style="width: 101px !important;"> Source</th>
																<th style="width: 101px !important;"> Age</th>
																<th style="width: 164px !important;">Order #</th>
																<th style="width: 235px !important;">Date Created</th>
																
																<th style="width: 188px !important;">Order Total</th>
																<th style="width: 105px !important;">Quantity</th>
																<th style="width: 141px !important;">Recipient</th>
																<th style="width: 141px !important;">Status</th>
																<th style="width: 141px !important;"></th>
															</tr>
														</thead>
														<tbody>
															<tr>
															
																<td>Shipstation</td>
																<td>1D 7H</td>
																<td>ODR-522-55121</td>
																<td>2017-05-10</td>
																
																
																<td>$12</td>
																<td>20</td>
																<td>Steven Pan</td>
																<td>Received</td>
																<td><a href="<?php echo base_url('administrator/Order/vieworder');?>" class="btn btn-primary">View</a></td>
																
															</tr>
															<tr>
															<td>Hubway</td>
																<td>1D 7H</td>
																<td>ODR-522-55121</td>
																<td>2017-05-10</td>
																
																<td>$12</td>
																<td>20</td>
																<td>Steven Pan</td>
																<td>Shipped</td>
																<td><a href="<?php echo base_url('administrator/Order/vieworder');?>" class="btn btn-primary">View</a></td>
																
															</tr>
															<tr>
															<td>Shipstation</td>
																<td>1D 7H</td>
																<td>ODR-522-55121</td>
																<td>2017-05-10</td>
															
																
																<td>$12</td>
																<td>20</td>
																<td>Steven Pan</td>
																<td>Cancelled</td>
																<td><a href="<?php echo base_url('administrator/Order/vieworder');?>" class="btn btn-primary">View</a></td>
																
															</tr>
															<tr>
															<td>Hubway</td>
																<td>1D 7H</td>
																<td>ODR-522-55121</td>
																<td>2017-05-10</td>
															
																<td>$12</td>
																<td>20</td>
																<td>Steven Pan</td>
																<td>Cancelled</td>
																<td><a href="<?php echo base_url('administrator/Order/vieworder');?>" class="btn btn-primary">View</a></td>
																
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div> <!-- /.col-md-12 -->
									</form>
								</div>


								
							</div> <!-- /.tab-content -->
						</div>
					</div>
				</div>
			</div>
			<!-- /.container -->
		</div>
		<!-- Trigger the modal with a button -->
	</div>
	
	
<script>
	$( document ).ready(function() { 
		localStorage.clear();
		//$("#sample_form")[0].reset();
	});
</script>