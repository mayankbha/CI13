<div id="content">
	<div class="container">
		<!-- Breadcrumbs line -->
		<div class="crumbs">
			<ul id="breadcrumbs" class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url('administrator/dashboard');?>">Dashboard</a>
				</li>
				<li class="current">
					<a href="<?php echo base_url('administrator/ViewShipmentAll');?>" title="">View Shipment</a>
				</li>
			</ul>
		</div>
		<!-- /Breadcrumbs line -->

		<!--=== Page Header ===-->
		<div class="page-header">
			<div class="row">
				<div class="col-md-9">
					<div class="page-title">
						<h3>Shipments List</h3>
						<span>Hello , Admin</span>
					</div>
				</div>	
				
			</div>	
		</div>
		<!-- /Page Header -->

		<!--=== Page Content ===-->
		<!--=== Inline Tabs ===-->
		<div class="row">
			<div class="col-md-12">
				<!-- Tabs-->
				<div class="tabbable tabbable-custom tabbable-full-width">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_overview" data-toggle="tab">ALL</a></li>
						<li><a href="#tab_open_account1" data-toggle="tab">Complete</a></li>
						<li><a href="#tab_close_account2" data-toggle="tab">Working</a></li>
						<li><a href="#tab_close_account3" data-toggle="tab">Deleted</a></li>
					</ul>
					<div class="tab-content row">
						<!--=== Overview ===-->
						<div class="tab-pane active" id="tab_overview">
							<div class="col-md-12">		
								<div class="widget box">
									<div class="widget-header">
									</div>
									<div class="widget-content no-padding table-responsive" >
										<table class="table table-striped table-bordered table-hover table-checkable datatable">
											<thead>
												<tr>
													<th>#</th>
													<th>ShippingID</th>
													<th>Booking Number</th>
													<th>Created</th>
													<th>Last Updated</th>
													<th>Unit</th>
													<th>Shipped</th>
													<th>Received</th>
													<th style="width: 10%;">Status</th>
													<th>MSKU</th>
													<th>View</th>
												</tr>
											</thead>
											<tbody>
												<?php if(is_array($result)) { ?>
													<?php $sno = '1'; foreach($result as $row) { ?>
														<?php $encoded = urlencode(base64_encode($row['shipment_id'])); ?>

														<tr>
															<td><?php echo $sno; ?></td>
															<td><?php echo $row['shipping_id']; ?></td>
															<td><?php echo $row['booking_number']; ?></td>
															<td><?php echo date('d-m-Y', strtotime($row['created'])); ?></td>
															<td><?php echo date('d-m-Y', strtotime($row['last_updated'])); ?></td>
															<td><?php echo $row['unit']; ?></td>
															<td><?php echo $row['shipped']; ?></td>
															<td><?php echo $row['received']; ?></td>
															<td>
																<?php if($row['status'] == 0) { ?>
																		<div class="label label-info label2">RECEIVING</div>
																<?php } else if($row['status'] == 1) { ?>
																		<div class="label label-success label2">RECEIVED</div>
																<?php } ?>
															</td>
															<td><?php echo $row['mskus']; ?></td>
															<td><a href="<?php echo base_url(); ?>administrator/ViewShipmentAll/shipmentDetail/<?php echo $encoded; ?>" class="btn btn-primary">View</a></td>
														</tr>
													<?php $sno++; } ?>
												<?php } ?>
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
														<th>#</th>
														<th>Status</th>
														<th>Subject</th>
														<th>Category</th>
														<th>Priority</th>
														<th>Updated</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
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
						<div class="tab-pane" id="tab_close_account2">
							<form class="form-horizontal" action="#">
								<div class="col-md-12">
									<div class="widget">	
										<div class="widget box">
											<div class="widget-header">
											</div>
											<div class="widget-content no-padding table-responsive" >
												<table class="table table-striped table-bordered table-hover table-checkable datatable">
													<thead>
														<tr>
															
															<th>#</th>
															<th>Status</th>
															<th>Subject</th>
															<th>Category</th>
															<th>Priority</th>
															<th>Updated</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									
									</div> <!-- /.widget -->
								</div> <!-- /.col-md-12 -->
							</form>
						</div>
						<!-- /Edit Account -->	
						
						<!--=== Edit Account ===-->
						<div class="tab-pane" id="tab_close_account3">
							<form class="form-horizontal" action="#">
								<div class="col-md-12">
									<div class="widget">	
										<div class="widget box">
											<div class="widget-header">
											</div>
											<div class="widget-content no-padding table-responsive" >
												<table class="table table-striped table-bordered table-hover table-checkable datatable">
													<thead>
														<tr>
															
															<th>#</th>
															<th>Status</th>
															<th>Subject</th>
															<th>Category</th>
															<th>Priority</th>
															<th>Updated</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									
									</div> <!-- /.widget -->
								</div> <!-- /.col-md-12 -->
							</form>
						</div>
						
					</div> <!-- /.tab-content -->
				</div>
				<!--END TABS-->
			</div>
		</div> <!-- /.row -->
		<!-- /Page Content -->
	</div>
	<!-- /.container -->

</div>