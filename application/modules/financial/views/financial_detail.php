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
							<a href="<?php echo base_url('financial/FinancialController/financialDetail'); ?>" title="">Financial Detail</a>
						</li>
					</ul>
				</div>  
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-12 page-header">
						<div class="page-title">
							<h3>Financial Detail</h3>
							<h5>Check your financial Statment</h5>
						</div>
					</div>		
				</div>
			
				<div class="row">
                    <div class="col-md-12">
						<!--<div class="alert alert-success">
							<strong>To !</strong> change the number of boxes,please go back to the previous page
						</div>	-->
                    </div>
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

					<div class="col-md-7" style="padding-left: 21px;">
						<form name="shipment_cost_form" id="shipment_cost_form" method="post" action="<?php echo base_url('financial/FinancialController/financialDetail'); ?>">
							<input type="hidden" name="shipment_id" id="shipment_id" value="<?php echo $shipment_id; ?>" />

							<div class="col-md-3"></div>

							<div class="col-md-3">	
								<?php echo $this->lang->line('From'); ?> :
								
								<input type="text" name="start_date" id="start_date" class="form-control datepicker1" style="margin-left: 48px; margin-top: -24px; width: 80%;" value="<?php echo date('d-m-Y', strtotime($start_date)); ?>" /> 
							</div>

							<div class="col-md-3">	
								<?php echo $this->lang->line('To'); ?> :
								
								<input type="text" name="end_date" id="end_date" class="form-control datepicker1" style="margin-left: 48px; margin-top: -24px; width: 80%;" value="<?php echo date('d-m-Y', strtotime($end_date)); ?>"> 
							</div>

							<div class="col-md-2">	
								<button class="btn btn-primary" style="margin-left: 48px; margin-top: -5px;"><?php echo $this->lang->line('Search'); ?></button>
							</div>

							<div class="col-md-1"></div>
						</form>
					</div>
				</div>

				<br /><br />

				<!--=== Horizontal Scrolling ===-->
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
											<th>Received</th>
											<th>Received Date</th>
											<th>Cubic Ft / Container</th>
											<th>Total Cubic Feet</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($shipment_received_list)) { ?>
											<?php foreach($shipment_received_list as $shipment_received) { ?>
												<tr>
													<td class="checkbox-column">
														<input type="checkbox" class="uniform" />
													</td>
													<td><?php echo $shipment_received['shipment_received']; ?></td>
													<td><?php echo date('d-m-Y', strtotime($shipment_received['shipment_received_date'])); ?></td>
													<td><?php echo $shipment_received['cubic_feet']; ?></td>
													<td><?php echo $shipment_received['total_cubic_feet']; ?></td>
													<td>$<?php echo $shipment_received['shipment_product_total']; ?></td>
												</tr>
											<?php } ?>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.container -->
		</div><br /><br /><br /><br />
		<!-- Trigger the modal with a button -->
	</div>

<script type="text/javascript">
	//When the document is ready
	$(document).ready(function () {
		$('.datepicker1').datepicker({
			format: "dd-mm-yyyy"
		});
	});
</script>