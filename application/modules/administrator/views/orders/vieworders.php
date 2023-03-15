
<div id="content">
	<div class="container">
			<!-- Breadcrumbs line -->
		<div class="crumbs">
			<ul id="breadcrumbs" class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#"><?php echo $this->lang->line('Dashboard_Title'); ?></a>
				</li>
				<li class="current">
					<a href="#" title="">View Order</a>
				</li>
			</ul>
		</div>  
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
						<li class="active"><a href="#all_tabs" data-toggle="tab">All Order</a></li>
						<li><a href="#tab_1" data-toggle="tab">FBA Order</a></li>
						<li><a href="#tab_2" data-toggle="tab">Local Fullfill Order</a></li>
						<li><a href="#tab_3" data-toggle="tab">Disposal Order</a></li>
						<li><a href="#tab_4" data-toggle="tab">Shipstation Order</a></li>
					</ul>
					<div class="tab-content row">
						<!--=== Overview ===-->
						<div class="tab-pane active" id="all_tabs">
							<div class="col-md-12">		
								<div class="widget box">
									<div class="widget-header"></div>
										<div class="widget-content no-padding table-responsive" >
											<table class="table table-striped table-bordered table-hover table-checkable datatable">
												<thead>
													<tr>
														<th style="width: 101px !important;"> Sr. no</th>
														<th style="width: 164px !important;">Order #</th>
														<th style="width: 235px !important;">Date Created</th>
														<th style="width: 79px !important;">SKU</th>
														<th style="width: 188px !important;">Order Total</th>
														<th style="width: 105px !important;">Quantity</th>
														<th style="width: 141px !important;">Recipient</th>
														<th style="width: 141px !important;">Order Type</th>
														<th style="width: 141px !important;">Status</th>
														<th style="width: 141px !important;"></th>
													</tr>
												</thead>
												<tbody>
												<?php if(!empty($all_orders)){ ?>
												<?php $count=1; ?>
												<?php  foreach ($all_orders as $key => $value) {?>
												<?php  if(($value->order_status==2) || ($value->order_status==4)) { ?>
													<tr>
														
														<td><?php echo $value->order_id; ?> </td>
														<td><?php echo $value->order_number; ?> </td>
														<td><?php echo $value->createdate; ?> </td>
														<td><?php echo $value->sku; ?> </td>
														<td><?php echo "$".$value->order_total; ?> </td>
														<td><?php echo $value->quantity; ?> </td>
														<td><?php echo $value->customer_name; ?> </td>
														<td>
															<?php  
																	if($value->order_type==1){
																		echo "Shipstation Order";
																	}else if($value->order_type==2){
																		echo "FBA Order";
																	}else if($value->order_type==3){
																		echo "Local Fullfillment";
																	}else if($value->order_type==4){
																		echo "Disposal Order";
																	}else{
																		echo "Shipment Order";
																	}
																	$count++;
															?> 
															</td>
														<td>
															<?php  
																	if($value->order_status==0){
																		echo "Cancelled";
																	}else if($value->order_status==1){
																		echo "Draft";
																	}else if($value->order_status==2){
																		echo "Pending";
																	}else if($value->order_status==3){
																		echo "Complete";
																	}else if($value->order_status==4){
																		echo "Shipped";
																	}else{
																		echo "Pending";
																	}
															?> 
														</td>
														<td> 
															<?php if(isset($value->order_status) && ($value->order_status==1)  && ($value->order_type==3)){ ?>
																<a href="<?php echo base_url("administrator/Order/edit_order/$value->order_id"); ?>" class="btn btn-primary">View</a>
														<?php } else { ?>
														
														<a href="<?php echo base_url("administrator/Order/view_order_details/$value->order_id"); ?>" class="btn btn-primary">View</a>													
														
														<?php } ?>
														</td>
													</tr>
												<?php  } ?>
												<?php  } ?>
												<?php  } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div> <!-- /.col-md-12 -->
						</div>
						
						<div class="tab-pane" id="tab_1">
							<div class="col-md-12">		
								<div class="widget box">
									<div class="widget-header"></div>
										<div class="widget-content no-padding table-responsive" >
											<table class="table table-striped table-bordered table-hover table-checkable datatable">
												<thead>
													<tr>
														<th style="width: 101px !important;"> Sr. no</th>
														<th style="width: 164px !important;">Order #</th>
														<th style="width: 235px !important;">Date Created</th>
														<th style="width: 79px !important;">SKU</th>
														<th style="width: 188px !important;">Order Total</th>
														<th style="width: 105px !important;">Quantity</th>
														<th style="width: 141px !important;">Recipient</th>
														<th style="width: 141px !important;">Order Type</th>
														<th style="width: 141px !important;">Status</th>
														<th style="width: 141px !important;"></th>
													</tr>
												</thead>
												<tbody>
												<?php if(!empty($fba_orders)){ ?>
												<?php $count = 1; ?>
												<?php  foreach ($fba_orders as $key => $value) {?>
												<?php  if(($value->order_status==2) || ($value->order_status==4)) {   ?>
													<tr>
														
														<td><?php echo $value->order_id; ?> </td>
														<td><?php echo $value->order_number; ?> </td>
														<td><?php echo $value->createdate; ?> </td>
														<td><?php echo $value->sku; ?> </td>
														<td><?php echo "$".$value->order_total; ?> </td>
														<td><?php echo $value->quantity; ?> </td>
														<td><?php echo $value->customer_name; ?> </td>
														<td>
															<?php  
																	if($value->order_type==1){
																		echo "Shipstation Order";
																	}else if($value->order_type==2){
																		echo "FBA Order";
																	}else if($value->order_type==3){
																		echo "Local Fullfillment";
																	}else if($value->order_type==4){
																		echo "Disposal Order";
																	}else{
																		echo "Shipment Order";
																	}
																	$count++;
															?> 
															</td>
														<td>
															<?php  
																	if($value->order_status==0){
																		echo "Cancelled";
																	}else if($value->order_status==1){
																		echo "Draft";
																	}else if($value->order_status==2){
																		echo "Pending";
																	}else if($value->order_status==3){
																		echo "Complete";
																	}else if($value->order_status==4){
																		echo "Shipped";
																	}else{
																		echo "Pending";
																	}
															?> 
														</td>
														<td> 
															<?php if(isset($value->order_status) && ($value->order_status==1)  && ($value->order_type==3)){ ?>
																<a href="<?php echo base_url("administrator/Order/edit_order/$value->order_id"); ?>" class="btn btn-primary">View</a>
														<?php } else { ?>
														
														<a href="<?php echo base_url("administrator/Order/view_order_details/$value->order_id"); ?>" class="btn btn-primary">View</a>													
														
														<?php } ?>
														</td>
													</tr>
												<?php  } ?>
												<?php  } ?>
												<?php  } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div> <!-- /.col-md-12 -->
						</div>
						
						
						<div class="tab-pane" id="tab_2">
							<div class="col-md-12">		
								<div class="widget box">
									<div class="widget-header"></div>
										<div class="widget-content no-padding table-responsive" >
											<table class="table table-striped table-bordered table-hover table-checkable datatable">
												<thead>
													<tr>
														<th style="width: 101px !important;"> Sr. no</th>
														<th style="width: 164px !important;">Order #</th>
														<th style="width: 235px !important;">Date Created</th>
														<th style="width: 79px !important;">SKU</th>
														<th style="width: 188px !important;">Order Total</th>
														<th style="width: 105px !important;">Quantity</th>
														<th style="width: 141px !important;">Recipient</th>
														<th style="width: 141px !important;">Order Type</th>
														<th style="width: 141px !important;">Status</th>
														<th style="width: 141px !important;"></th>
													</tr>
												</thead>
												<tbody>
												<?php if(!empty($local_orders)){ ?>
												<?php $count=1; ?>
												<?php  foreach ($local_orders as $key => $value) {?>
												<?php  if(($value->order_status==2) || ($value->order_status==4)) {   ?>
													<tr>
														
														<td><?php echo $value->order_id; ?> </td>
														<td><?php echo $value->order_number; ?> </td>
														<td><?php echo $value->createdate; ?> </td>
														<td><?php echo $value->sku; ?> </td>
														<td><?php echo "$".$value->order_total; ?> </td>
														<td><?php echo $value->quantity; ?> </td>
														<td><?php echo $value->customer_name; ?> </td>
														<td>
															<?php  
																	if($value->order_type==1){
																		echo "Shipstation Order";
																	}else if($value->order_type==2){
																		echo "FBA Order";
																	}else if($value->order_type==3){
																		echo "Local Fullfillment";
																	}else if($value->order_type==4){
																		echo "Disposal Order";
																	}else{
																		echo "Shipment Order";
																	}
															?> 
															</td>
														<td>
															<?php  
																	if($value->order_status==0){
																		echo "Cancelled";
																	}else if($value->order_status==1){
																		echo "Draft";
																	}else if($value->order_status==2){
																		echo "Pending";
																	}else if($value->order_status==3){
																		echo "Complete";
																	}else if($value->order_status==4){
																		echo "Shipped";
																	}else{
																		echo "Pending";
																	}
																	$count++;
															?> 
														</td>
														<td> 
															<?php if(isset($value->order_status) && ($value->order_status==1)  && ($value->order_type==3)){ ?>
																<a href="<?php echo base_url("administrator/Order/edit_order/$value->order_id"); ?>" class="btn btn-primary">View</a>
														<?php } else { ?>
														
														<a href="<?php echo base_url("administrator/Order/view_order_details/$value->order_id"); ?>" class="btn btn-primary">View</a>													
														
														<?php } ?>
														</td>
													</tr>
												<?php  } ?>
												<?php  } ?>
												<?php  } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div> <!-- /.col-md-12 -->
						</div>
						
						<div class="tab-pane" id="tab_3">
							<div class="col-md-12">		
								<div class="widget box">
									<div class="widget-header"></div>
										<div class="widget-content no-padding table-responsive" >
											<table class="table table-striped table-bordered table-hover table-checkable datatable">
												<thead>
													<tr>
														<th style="width: 101px !important;">Sr.No</th>
															<th style="width: 164px !important;">Order #</th>
															<th style="width: 235px !important;">Date Created</th>
															<th style="width: 235px !important;">Dispose By</th>
															<th style="width: 188px !important;">Order Total</th>
															<th style="width: 105px !important;">Quantity</th>
															<th style="width: 141px !important;">Order Status</th>
													</tr>
												</thead>
												<tbody>
												<?php if(!empty($disposal_orders)){ $count = 1; ?>
												<?php  foreach ($disposal_orders as $key => $value) {  ?>
													<tr>
														<td><?php echo $count; ?></td>
														<td><?php echo $value->order_number; ?> </td>
														<td><?php echo $value->createdate; ?> </td>
														<td><?php echo $value->dispose_by; ?> </td>
														<td><?php if($value->order_total != null) echo $value->order_total; else echo "N/A"; ?> </td>
														<td><?php if($value->quantity != null) echo $value->quantity; else echo "N/A"; ?> </td>
														<td> 
															<?php if(isset($value->order_status) && ($value->order_status==1)  && ($value->order_type==3)){ ?>
																<a href="<?php echo base_url("administrator/Order/edit_order/$value->order_id"); ?>" class="btn btn-primary">View</a>
														<?php } else { ?>
														
														<a href="<?php echo base_url("administrator/Order/view_order_details/$value->order_id"); ?>" class="btn btn-primary">View</a>
														<?php } ?>
														</td>
													</tr>
												<?php $count++; } ?>
												<?php  } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div> <!-- /.col-md-12 -->
						</div>
						
						<div class="tab-pane" id="tab_4">
							<div class="col-md-12">		
								<div class="widget box">
									<div class="widget-header"></div>
										<div class="widget-content no-padding table-responsive" >
											<table class="table table-striped table-bordered table-hover table-checkable datatable">
												<thead>
													<tr>
														<th style="width: 101px !important;"> Sr. no</th>
														<th style="width: 164px !important;">Order #</th>
														<th style="width: 235px !important;">Date Created</th>
														<th style="width: 188px !important;">Order Total</th>
														<th style="width: 105px !important;">Quantity</th>
														<th style="width: 141px !important;">Recipient</th>
														<th style="width: 141px !important;">Order Type</th>
														<th style="width: 141px !important;">Status</th>
														<th style="width: 141px !important;"></th>
													</tr>
												</thead>
												<tbody>
												<?php if(!empty($shipstation_orders)){ $count = 1; ?>
												<?php  foreach ($shipstation_orders as $key => $value) {  ?>
													<tr>
														<td><?php echo $count; ?></td>
														<td><?php echo $value->order_number; ?> </td>
														<td><?php echo $value->createdate; ?> </td>
														<td><?php echo $value->order_total; ?> </td>
														<td><?php echo $value->quantity; ?> </td>
														<td><?php echo $value->shipto_recipientname; ?> </td>
														<td>
															<?php  
																	if($value->order_type==1){
																		echo "Shipstation Order";
																	}else if($value->order_type==2){
																		echo "FBA Order";
																	}else if($value->order_type==3){
																		echo "Local Fullfillment";
																	}else if($value->order_type==4){
																		echo "Disposal Order";
																	}else{
																		echo "Shipment Order";
																	}
																	//$count++;
															?> 
															</td>
														<td>
															<?php  
																	if($value->order_status==0){
																		echo "Cancelled";
																	}else if($value->order_status==1){
																		echo "Draft";
																	}else if($value->order_status==2){
																		echo "Pending";
																	}else if($value->order_status==3){
																		echo "Complete";
																	}else if($value->order_status==4){
																		echo "Shipped";
																	}else{
																		echo "Pending";
																	}
															?> 
														</td>
														<td> 
															<?php if(isset($value->order_status) && ($value->order_status==1)  && ($value->order_type==3)){ ?>
																<a href="<?php echo base_url("administrator/Order/edit_order/$value->order_id"); ?>" class="btn btn-primary">View</a>
														<?php } else { ?>
														
														<a href="<?php echo base_url("administrator/Order/view_order_details/$value->order_id"); ?>" class="btn btn-primary">View</a>													
														
														<?php } ?>
														</td>
													</tr>
												<?php $count++; } ?>
												<?php  } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div> <!-- /.col-md-12 -->
						</div>
						
					</div> <!-- /.tab-content -->
				</div>
			</div>
		</div>
	</div>
	<!-- /.container -->
</div>
		
