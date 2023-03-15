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
						<a href="<?php echo base_url('order/Createorder/vieworder');?>" title="">View Order</a>
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
							<li class="active"><a href="#all_order_view" data-toggle="tab">All Order</a></li>
							<li><a href="#fba_order" data-toggle="tab">FBA Order</a></li>
							<li><a href="#local_fullfill_order" data-toggle="tab">Local fullfill Order</a></li>
							<li><a href="#disposal_order" data-toggle="tab">Disposal Order</a></li>
							<li><a href="#shipstation_order" data-toggle="tab">Shipstation Order</a></li>
						</ul>
					<div class="tab-content row">
						<!--=== Overview ===-->
						<div class="tab-pane active" id="all_order_view">
							<div class="col-md-12">		
								<div class="widget box">
									<div class="widget-header"></div>
										<div class="widget-content no-padding table-responsive" >
											<table class="table table-striped table-bordered table-hover table-checkable datatable">
												<thead>
													<tr>
														<th style="width: 101px !important;"> Sr.No</th>
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
												<?php if(!empty($all_orders)){   ?>
												<?php $count=1; ?>
												<?php  foreach ($all_orders as $value) {?>
													<tr>
														<td><?php echo $count; ?></td>
														
														<td><?php echo $value->order_number; ?> </td>
														<td><?php echo $value->createdate; ?> </td>
														<td>
															<?php if(isset($value->sku) && ($value->sku!=null)) {
																echo $value->sku;
																}else { echo "N/A"; } 
															?> 
														</td>
														<td>
															<?php if(isset($value->order_total) && ($value->order_total!=null)) {
																echo "$".$value->order_total;
																}else { echo "N/A"; } 
															?> 
														</td>
														<td>
															<?php if(isset($value->quantity) && ($value->quantity!=null)) {
																echo $value->quantity;
																}else { echo "N/A"; } 
															?> 
														</td>
														<td><?php echo $value->customer_name; ?> </td>
														<td>
															<?php  
																	if($value->order_type==1){
																		echo "Shipstation  Order";
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
																	<a href="<?php echo base_url("order/order/edit_order/$value->order_id"); ?>" class="btn btn-primary">Work on order</a>
															<?php } else if(isset($value->order_status) && ($value->order_status==1)  && ($value->order_type==2 || 4)){ ?>
																<button  onclick="completeOrder('<?php echo $value->order_id; ?>');" class="btn btn-primary">Work on order</button>
															<?php }else if(isset($value->order_status) && ($value->order_status==0 || 2 )  && ($value->order_type==4)){ ?>
																<a href="<?php echo base_url("order/order/disposalorderView/$value->order_id"); ?>" class="btn btn-primary">View</a>
															<?php }else { ?>
															<a href="<?php echo base_url("order/order/view_order_details/$value->order_id"); ?>" class="btn btn-primary">View</a>
															<?php } ?>
														</td>
													</tr>
												<?php  } ?>
												<?php  } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div> <!-- /.col-md-12 -->
							</div>
							<!-- /Overview -->

							<!--=== Edit Account ===-->
							<div class="tab-pane" id="fba_order">
								<div class="col-md-12">		
									<div class="widget box">
										<div class="widget-header"></div>
											<div class="widget-content no-padding table-responsive" >
												<table class="table table-striped table-bordered table-hover table-checkable datatable">
													<thead>
														<tr>
															<th style="width: 101px !important;"> Sr.No</th>
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
													<?php $count=1;  ?>
													<?php  foreach ($fba_orders as $key => $value) {?>
														<tr>
															<td><?php echo $count; ?></td>
															
															<td><?php echo $value->order_number; ?> </td>
															<td><?php echo $value->createdate; ?> </td>
															<td>
																<?php if(isset($value->sku) && ($value->sku!=null)) {
																	echo $value->sku;
																	}else { echo "N/A";} 
																?> 
															</td>
															<td>
																<?php if(isset($value->order_total) && ($value->order_total!=null)) {
																	echo "$".$value->order_total;
																	}else { echo "N/A";} 
																?> 
															</td>
															<td>
																<?php if(isset($value->quantity) && ($value->quantity!=null)) {
																	echo $value->quantity;
																	}else { echo "N/A";} 
																?> 
															</td>
															<td><?php echo $value->customer_name; ?> </td>
															<td>
																<?php  
																		if($value->order_type==1){
																			echo "Shipstation  Order";
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
																		<a href="<?php echo base_url("order/order/edit_order/$value->order_id"); ?>" class="btn btn-primary">Work on order</a>
																<?php } else if(isset($value->order_status) && ($value->order_status==1)  && ($value->order_type==2)){ ?>
																	<button  onclick="completeOrder('<?php echo $value->order_id; ?>');" class="btn btn-primary">Work on order</button>
																<?php }else { ?>
																<a href="<?php echo base_url("order/order/view_order_details/$value->order_id"); ?>" class="btn btn-primary">View</a>
																<?php } ?>
															</td>
														</tr>
													<?php  } ?>
													<?php  } ?>
													</tbody>
												</table>
											</div>
									</div>
								</div> <!-- /.col-md-12 -->
							</div>
							<!-- /Edit Account -->
							<!--=== Edit Account ===-->
							<div class="tab-pane" id="local_fullfill_order">
								<form class="form-horizontal" action="#">
									<div class="col-md-12">
										<div class="widget box">
											<div class="widget-header">
											</div>
											<div class="widget-content no-padding table-responsive" >
												<table class="table table-striped table-bordered table-hover table-checkable datatable">
													<thead>
														<tr>
															<th style="width: 101px !important;">Sr.No</th>
															<th style="width: 164px !important;">Order #</th>
															<th style="width: 235px !important;">Date Created</th>
															
														
															<th style="width: 188px !important;">Order Total</th>
															<th style="width: 105px !important;">Quantity</th>
															<th style="width: 141px !important;">Recipient</th>
															<th style="width: 141px !important;">Order Status</th>
															<th style="width: 141px !important;"></th>
														</tr>
													</thead>
													<tbody>
													<?php if(!empty($local_fullfill_order)){ ?>
													<?php $count=1; ?>
													<?php  foreach ($local_fullfill_order as $key => $value) {?>
														<tr>
														
															<td><?php echo $count; ?></td>
															<td><?php echo $value->order_number; ?> </td>
															<td><?php echo $value->createdate; ?></td>
															<td>
																<?php if(isset($value->order_total) && ($value->order_total!=null)) {
																	echo "$".$value->order_total;
																	}else { echo "N/A";} 
																?> 
															</td>
															<td>
																<?php if(isset($value->quantity) && ($value->quantity!=null)) {
																	echo $value->quantity;
																	}else { echo "N/A";} 
																?> 
															</td>
															<td><?php echo $value->shipto_recipientname; ?></td>
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
																	<a href="<?php echo base_url("order/order/edit_order/$value->order_id"); ?>" class="btn btn-primary">Work on order</a>
															<?php } else if(isset($value->order_status) && ($value->order_status==1)  && ($value->order_type==2)){ ?>
																<button  onclick="completeOrder('<?php echo $value->order_id; ?>');" class="btn btn-primary">Work on order</button>
															<?php }else { ?>
															<a href="<?php echo base_url("order/order/view_order_details/$value->order_id"); ?>" class="btn btn-primary">View</a>
															<?php } ?>
														</td>
															
														</tr>
													<?php  } ?>
													<?php  } ?>	
													</tbody>
												</table>
											</div>
										</div>
									</div> <!-- /.col-md-12 -->
								</form>
							</div>
							<div class="tab-pane" id="disposal_order">
									<div class="col-md-12">
										<div class="widget box">
											<div class="widget-header">
											</div>
											<div class="widget-content no-padding table-responsive" >
												<table class="table table-striped table-bordered table-hover table-checkable datatable">
													<thead>
														<tr>
															<th style="width: 101px !important;">Sr.No</th>
															<th style="width: 164px !important;">Order #</th>
															<th style="width: 235px !important;">Date Created</th>
															<th style="width: 235px !important;">Dispose By</th>
															<th style="width: 235px !important;">Image Proof</th>
															<th style="width: 188px !important;">Order Total</th>
															<th style="width: 105px !important;">Quantity</th>
															<th style="width: 141px !important;">Order Status</th>
															<th style="width: 141px !important;"></th>
														</tr>
													</thead>
													<tbody>
													<?php if(!empty($disposal_orders)){ ?>
													<?php $count =1; ?>
													<?php foreach ($disposal_orders as $key => $value) { ?>
														<tr>
														
															<td><?php echo $count; ?></td>
															<td><?php echo $value->order_number; ?> </td>
															<td><?php echo $value->createdate; ?></td>
															<td><?php echo $value->dispose_by; ?></td>
															<td><?php  
																if($value->order_total!=null){ 
																	echo "Yes";
																} else{ 
																	echo  "N/A"; 
																} 
																?>
															</td>
															<td>
																<?php if($value->order_total!=null){
																	echo $value->order_total;
																}else{
																	echo "N/A";
																}
																?>
															</td>
															<td><?php if($value->unit != null) { echo $value->unit; } else { echo "N/A"; } ?></td>
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
															<?php if(isset($value->order_status) && ($value->order_status==1)  && ($value->order_type==4)){ ?>
																<button  onclick="completeOrder('<?php echo $value->order_id; ?>');" class="btn btn-primary">Work on order</button>
															<?php } else { ?>
															<a href="<?php echo base_url("order/order/disposalorderView/$value->order_id"); ?>" class="btn btn-primary">View</a>
															<?php } ?>
														</td>
															
														</tr>
													<?php } ?>
													<?php  } ?>	
													</tbody>
												</table>
											</div>
										</div>
									</div> <!-- /.col-md-12 -->
							</div>
							<div class="tab-pane" id="shipstation_order">
									<div class="col-md-12">
										<div class="widget box">
											<div class="widget-header">
											</div>
											<div class="widget-content no-padding table-responsive" >
												<table class="table table-striped table-bordered table-hover table-checkable datatable">
													<thead>
														<tr>
															<th style="width: 101px !important;">Sr.No</th>
															<th style="width: 164px !important;">Order #</th>
															<th style="width: 235px !important;">Date Created</th>
															<th style="width: 188px !important;">Order Total</th>
															<th style="width: 105px !important;">Quantity</th>
															<th style="width: 141px !important;">Recipient</th>
															<th style="width: 141px !important;">Order Status</th>
															<th style="width: 141px !important;"></th>
														</tr>
													</thead>
													<tbody>
													<?php if(!empty($shipstation_orders)){ ?>
													<?php $count=1; ?>
													<?php  foreach ($shipstation_orders as $key => $value) { ?>
														<tr>
															<td><?php echo $count; ?></td>
															<td><?php echo $value->order_number; ?> </td>
															<td><?php echo $value->createdate; ?></td>
															<td>$<?php echo $value->order_total; ?></td>
															<td><?php echo $value->quantity; ?></td>
															<td><?php echo $value->shipto_recipientname; ?></td>
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
																	<a href="<?php echo base_url("order/order/edit_order/$value->order_id"); ?>" class="btn btn-primary">Work on order</a>
															<?php } else if(isset($value->order_status) && ($value->order_status==1)  && ($value->order_type==2)){ ?>
																<button  onclick="completeOrder('<?php echo $value->order_id; ?>');" class="btn btn-primary">Work on order</button>
															<?php }else { ?>
															<a href="<?php echo base_url("order/order/view_order_details/$value->order_id"); ?>" class="btn btn-primary">View</a>
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
		
<script>
	$( document ).ready(function() { 
		
		localStorage.clear();
	});
</script>