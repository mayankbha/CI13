<?php //echo "<pre>"; print_r($shipmentLists); die; ?>

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
							<a href="<?php echo base_url('dashboard/Dashboard'); ?>"><?php echo $this->lang->line('Dashboard_Title'); ?></a>
						</li>
						<li class="current">
							<a href="<?php echo base_url('financial/FinancialController/financialDetail'); ?>" title="">Shipments Details</a>
						</li>
					</ul>
				</div>  
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-12 page-header">
						<div class="page-title">
							<h3>Shipments</h3>
							<h5>Shipments listed for Selected Financial Statement</h5>
						</div>
					</div>		
				</div>
			
				<!--<div class="row">
                    <div class="col-md-12">
						<!--<div class="alert alert-success">
							<strong>To !</strong> change the number of boxes,please go back to the previous page
						</div>	-->
                    <!--</div>
					<hr />
					<div class="col-md-2"><h4 style="margin-top: 1px;">Your Statement for:</h4></div>
					<div class="col-md-3">
						<select class="form-control" style="margin-left: 48px;margin-top: -5px;width: 80%;"> 	
							<option value="" selected>Filter Value By</option>
							<option value="Transaction Type">Transaction Type</option>
							<option value="Order ID">Order ID</option>
							<option value="Product Details">Product Details</option>
							<option value="Total Charges">Total Charges</option>
							<option value="Platform fees">Platform fees</option>
						
						</select>
					</div>
					<div class="col-md-7" style="padding-left:21px;">
						<div class="col-md-3">	
						</div>							
						<div class="col-md-3">	
							<?php //echo $this->lang->line('From'); ?> :
							
								<input type="text" name="form" class="form-control datepicker1" style="margin-left: 48px;margin-top: -24px;width: 80%;" value="12-04-2017"> 
						</div>	
						<div class="col-md-3">	
							<?php //echo $this->lang->line('To'); ?> :
							
								<input type="text" name="form" class="form-control datepicker1" style="margin-left: 48px;margin-top: -24px;width: 80%;" value="31-04-2017"> 
						</div>
						<div class="col-md-2">	
							<button class="btn btn-primary" style="margin-left: 48px;margin-top: -5px;"><?php //echo $this->lang->line('Search'); ?></button>
						</div>	
						<div class="col-md-1">	
						</div>	
						
					</div>
				</div>	<br /><br />-->
				<hr />
				<!--=== Horizontal Scrolling ===-->
				
				<form name="shipment_financial_detail_form" id="shipment_financial_detail_form" method="post" action="<?php echo base_url('financial/FinancialController/financialDetail'); ?>">
					<div class="row">
						<div class="col-md-12">
							<div class="widget box">
								<div class="widget-header">
								</div>
								<div class="widget-content no-padding table-responsive" >
									<table class="table table-striped table-bordered table-hover table-checkable datatable">
										<thead>
											<tr>
												<th class="checkbox-column">
													<input type="checkbox" class="uniform">
												</th>
												<th>Created Date</th>
												<th>Shipment name</th>
												<th>Shipment ID</th>
												<!--<th>MSKUs</th>-->
												<th>Units ( Received)</th>
												<th>Received Date</th>
												<th>Total Charges</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
										
											<?php if(!empty($shipmentLists)) { ?>
												<?php foreach($shipmentLists as $shipmentList) { ?>
													<input type="text" name="shipment_id" id="shipment_id" value="<?php echo $shipmentList['shipment_id']; ?>" style="display: none;" />

													<input type="text" name="start_date" id="start_date" value="<?php echo $start_date; ?>" style="display: none;" />

													<input type="text" name="end_date" id="end_date" value="<?php  echo $end_date; ?>" style="display: none;" />

													<tr>
														<td class="checkbox-column">
															<input type="checkbox" class="uniform">
														</td>
														<td><?php echo date('d-m-Y', strtotime($shipmentList['created_date'])); ?></td>
														<td><?php echo $shipmentList['shipment_name']; ?></td>
														<td><?php echo $shipmentList['shipment_id']; ?></td>
														<!--<td>SHI20121P</td>-->
														<td><?php echo $shipmentList['units_received']; ?></td>
														<td><?php echo date('d-m-Y', strtotime($shipmentList['get_shipment_last_received_date'])); ?></td>
														<td>$<?php echo $shipmentList['total']; ?></td>
														<td><a class="btn btn-primary" href="javascript: void(0);" onclick="$('#shipment_financial_detail_form').submit();">Details</a></td>
													</tr>
												<?php } ?>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- /.container -->
		</div><br /><br /><br /><br />
		<!-- Trigger the modal with a button -->
	</div>
<script type="text/javascript">
	// When the document is ready
	$(document).ready(function () {
		$('.datepicker1').datepicker({
			format: "dd-mm-yyyy"
		});
	});
</script>