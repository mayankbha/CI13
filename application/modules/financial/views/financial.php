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
							<a href="<?php echo base_url('financial/FinancialController'); ?>" title="">Financial</a>
						</li>
					</ul>
				</div>  
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-12 page-header">
						<div class="page-title">
							<h3>Financial</h3>
							<h5>Check your financial Statment</h5>
						</div>
					</div>		
				</div>
			
				<form name="shipment_cost_form" id="shipment_cost_form" method="post" action="<?php echo base_url('financial/FinancialController/shipmentFinancialDetail'); ?>">
					<div class="row">
						<div class="col-md-12">
							<!--<div class="alert alert-success">
								<strong>To !</strong> change the number of boxes,please go back to the previous page
							</div>	-->
						</div>

						<hr />

						<div class="col-md-3"><h4>Financial Year:</h4></div>

						<div class="col-md-6">
							<select class="form-control" name="financial_year" onchange="showSelectedDateRange(this.value);">
								<?php foreach($year_range as $year) { ?>
									<option value="<?php echo $year; ?>" <?php if($year == $current_financial_year) { ?>selected="selected"<?php } ?>><?php echo $year; ?></option>
								<?php } ?>
							</select>
						</div>

						<br><br><br>

						<div class="col-md-3"><h4>Your Statement for:</h4></div>

						<div class="col-md-6">
							<select class="form-control" name="date_range" id="date_range" onchange="calculateTotalCost(this.value);">
								<?php foreach($date_range as $date) { ?>
									<option value="<?php echo $date['start_date'].'--'.$date['next_date']; ?>" <?php if($date['current_date'] == 1) { ?>selected="selected"<?php } ?>><?php echo '('.date('j M', strtotime($date['start_date'])).' - '.date('j M', strtotime($date['next_date'])).') '.date('Y', strtotime($date['next_date'])); ?></option>
								<?php } ?>
							</select>
						</div>

						<div class="col-md-3">
						</div>
					</div>	<br /><br />
					
					
					
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-4">
							<b>Charges</b>
						</div>
						<div class="col-md-4">
							<div class="productCharges">Initial Freight in</div>
							<div class="productCharges">Stay</div>
							<div class="productCharges">Freight out</div>
							<div class="productCharges">Processing fee</div>
						</div>
						<div class="col-md-3">
							<div class="productCharges" id="freight_in">$<?php echo $total_freight_in; ?></div>
							<div class="productCharges" id="stay">$<?php echo $total_stay; ?></div>
							<div class="productCharges" id="freight_out">$<?php echo $total_freight_out; ?></div>
							<div class="productCharges" id="unit_processing_fee">$<?php echo $total_unit_processing_fee; ?></div>
							<hr class="ruler" />
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-1">
							<a href="javascript: void(0);" onclick="$('#shipment_cost_form').submit();"><span class="subtotal">Subtotal</span><span id="subtotal">$<?php echo $subtotal; ?><span></a>
						</div>
						<div class="col-md-3">
						</div>
					</div>
				</form>
				
				
				<hr class="rulerfull"/>
				
				<!--<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-4">
						<b>Refunds</b>
					</div>
					<div class="col-md-4">
						<div class="productCharges">Product Charges</div>
					</div>
					<div class="col-md-3">
						<div class="productCharges">$2000.00</div>
						<hr class="ruler" />
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-8"></div>
					<div class="col-md-1">
						<span class="subtotal">Subtotal</span>$20.00	
					</div>
					<div class="col-md-3">
					</div>
				</div>
				<hr class="rulerfull"/>
				
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-4">
						<b>Other Transactions</b>
					</div>
					<div class="col-md-4">
						<div class="productCharges">Other</div>
					</div>
					<div class="col-md-3">
						<div class="productCharges">$2000.00</div>
						<hr class="ruler" />
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-8"></div>
					<div class="col-md-1">
						<span class="subtotal">Subtotal</span>$20.00	
					</div>
					<div class="col-md-3">
					</div>
				</div>
				<hr class="rulerfull"/>
				
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-4">
						<b>Closing Balance</b>
					</div>
					<div class="col-md-4">
						<div class="productCharges">Total Balance</div>
					</div>
					<div class="col-md-3">
						<div class="productCharges">$2000.00</div>
					</div>
				</div>
				<hr class="rulerfull"/>
				
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-4">
						<b>Final Amount on 25-5-2017</b>
					</div>
					<div class="col-md-4">
						
					</div>
					<div class="col-md-3">
						<div >$53000.00</div>
					</div>
				</div>-->
				
			</div>
			<!-- /.container -->
		</div><br /><br /><br /><br />
		<!-- Trigger the modal with a button -->
	</div>
