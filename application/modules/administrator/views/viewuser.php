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
							<a href="<?php echo base_url('administrator/ViewController'); ?>" title="">View User</a>
						</li>
					</ul>
				</div>  
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-6 page-header">
						<div class="page-title">
							<h3>View All User</h3>
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
						<div class="widget box">
							<div class="widget-header">
							</div>
							<div class="widget-content no-padding table-responsive" >
								<table class="table table-striped table-bordered table-hover table-checkable datatable">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Email</th>
											<th>Shippments</th>
											<th>Shippments Sent</th>
											<th>Shippments Received</th>
											<th>Fees</th>
											<th></th>
											
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Gaurav sir</td>
											<td>super@gmail.com</td>
											<td>2</td>
											<td>12</td>
											<td>10</td>
											<td>
												<span class="" data-toggle="popover-x" data-target="#123" data-placement="left" style="cursor: pointer;">$10.00</span>
											
													<div id="123" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
														<div>
															<div class="arrow"></div>
															<h3 class="popover-title"><span class="close pull-right" data-dismiss="popover-x">&times;</span>Fee Preview</h3>
														</div>
														<div class="popover-content">
															<div  class="col-md-12">
																<div class="popover-title">
																	<span class="pull-right">Amount</span>Type  
																</div>
																<div class="popover-text">
																	<span class="pull-right">$0.15</span>Stay  <br />
																	<span class="pull-right">$0.15 </span>Initial Freight in  <br />
																	<span class="pull-right">$0.15</span>Freight out  <br />
																	<span class="pull-right">$.01</span>unit processing fee <br /> 
																	<span class="pull-left togglediv">
																		<div class="showmenu">
																			<i class="icon-sort-down" style="font-size:19px;"></i>     Hide FBA fullfillment fee details
																		</div>
																	</span>  <br />
																		<div class="menu" style="display: none;">
																			<span class="pull-right">$0.00</span>Order Handing <br />
																			<span class="pull-right">$8.41</span>Pick & Pack <br />
																			<span class="pull-right">$0.00</span>Weight Handing <br />
																		</div>	
																</div>
																<div class="popover-title2">
																	<span class="pull-right">$11.26</span>Fee Estimate  <br />
																</div>
																<div class="popover-content">
																	<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
																</div>
															</div>
															<div class="popover-footer1">
																To see estimated fees on all your products  <button type="reset" class="btn btn-sm btn-default">Click here</button>
															</div>
																
														</div>
													</div>	
											
											
											</td>
											<td><a href="<?php echo base_url('administrator/ViewController/shipmentViewDetails');?>" class="btn btn-info">View</a></td>
										</tr>
										<tr>
											<td>1</td>
											<td>Gaurav sir</td>
											<td>super@gmail.com</td>
											<td>20</td>
											<td>4</td>
											<td>10</td>

											<td>
												<span class="" data-toggle="popover-x" data-target="#1234" data-placement="left" style="cursor: pointer;">$12.00</span>
											
													<div id="1234" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
														<div>
															<div class="arrow"></div>
															<h3 class="popover-title"><span class="close pull-right" data-dismiss="popover-x">&times;</span>Fee Preview</h3>
														</div>
														<div class="popover-content">
															<div  class="col-md-12">
																<div class="popover-title">
																	<span class="pull-right">Amount</span>Type  
																</div>
																<div class="popover-text">
																	<span class="pull-right">$0.15</span>Stay  <br />
																	<span class="pull-right">$0.15 </span>Initial Freight in  <br />
																	<span class="pull-right">$0.15</span>Freight out  <br />
																	<span class="pull-right">$.01</span>unit processing fee <br /> 
																	<span class="pull-left togglediv">
																		<div class="showmenu">
																			<i class="icon-sort-down" style="font-size:19px;"></i>     Hide FBA fullfillment fee details
																		</div>
																	</span>  <br />
																		<div class="menu" style="display: none;">
																			<span class="pull-right">$0.00</span>Order Handing <br />
																			<span class="pull-right">$8.41</span>Pick & Pack <br />
																			<span class="pull-right">$0.00</span>Weight Handing <br />
																		</div>	
																</div>
																<div class="popover-title2">
																	<span class="pull-right">$11.26</span>Fee Estimate  <br />
																</div>
																<div class="popover-content">
																	<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
																</div>
															</div>
															<div class="popover-footer1">
																To see estimated fees on all your products  <button type="reset" class="btn btn-sm btn-default">Click here</button>
															</div>
																
														</div>
													</div>	
											
											
											</td>
											
											<td><a href="<?php echo base_url('administrator/ViewController/shipmentViewDetails');?>" class="btn btn-info">View</a></td>
										</tr>
										<tr>
											<td>1</td>
											<td>Gaurav sir</td>
											<td>super@gmail.com</td>
											<td>60</td>
											<td>2</td>
											<td>8</td>

											<td>
												<span class="" data-toggle="popover-x" data-target="#12345" data-placement="left" style="cursor: pointer;">$30.00</span>
											
													<div id="12345" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
														<div>
															<div class="arrow"></div>
															<h3 class="popover-title"><span class="close pull-right" data-dismiss="popover-x">&times;</span>Fee Preview</h3>
														</div>
														<div class="popover-content">
															<div  class="col-md-12">
																<div class="popover-title">
																	<span class="pull-right">Amount</span>Type  
																</div>
																<div class="popover-text">
																	<span class="pull-right">$0.15</span>Stay  <br />
																	<span class="pull-right">$0.15 </span>Initial Freight in  <br />
																	<span class="pull-right">$0.15</span>Freight out  <br />
																	<span class="pull-right">$.01</span>unit processing fee <br /> 
																	<span class="pull-left togglediv">
																		<div class="showmenu">
																			<i class="icon-sort-down" style="font-size:19px;"></i>     Hide FBA fullfillment fee details
																		</div>
																	</span>  <br />
																		<div class="menu" style="display: none;">
																			<span class="pull-right">$0.00</span>Order Handing <br />
																			<span class="pull-right">$8.41</span>Pick & Pack <br />
																			<span class="pull-right">$0.00</span>Weight Handing <br />
																		</div>	
																</div>
																<div class="popover-title2">
																	<span class="pull-right">$11.26</span>Fee Estimate  <br />
																</div>
																<div class="popover-content">
																	<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
																</div>
															</div>
															<div class="popover-footer1">
																To see estimated fees on all your products  <button type="reset" class="btn btn-sm btn-default">Click here</button>
															</div>
																
														</div>
													</div>	
											
											
											</td>
											<td><a href="<?php echo base_url('administrator/ViewController/shipmentViewDetails');?>" class="btn btn-info">View</a></td>
										</tr>
										
										<tr>
											<td>1</td>
											<td>Gaurav sir</td>
											<td>super@gmail.com</td>
											<td>2</td>
											<td>1</td>
											<td>10</td>
											<td>
												<span class="" data-toggle="popover-x" data-target="#123456" data-placement="left" style="cursor: pointer;">$20.00</span>
											
													<div id="123456" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
														<div>
															<div class="arrow"></div>
															<h3 class="popover-title"><span class="close pull-right" data-dismiss="popover-x">&times;</span>Fee Preview</h3>
														</div>
														<div class="popover-content">
															<div  class="col-md-12">
																<div class="popover-title">
																	<span class="pull-right">Amount</span>Type  
																</div>
																<div class="popover-text">
																	<span class="pull-right">$0.15</span>Stay  <br />
																	<span class="pull-right">$0.15 </span>Initial Freight in  <br />
																	<span class="pull-right">$0.15</span>Freight out  <br />
																	<span class="pull-right">$.01</span>unit processing fee <br /> 
																	<span class="pull-left togglediv">
																		<div class="showmenu">
																			<i class="icon-sort-down" style="font-size:19px;"></i>     Hide FBA fullfillment fee details
																		</div>
																	</span>  <br />
																		<div class="menu" style="display: none;">
																			<span class="pull-right">$0.00</span>Order Handing <br />
																			<span class="pull-right">$8.41</span>Pick & Pack <br />
																			<span class="pull-right">$0.00</span>Weight Handing <br />
																		</div>	
																</div>
																<div class="popover-title2">
																	<span class="pull-right">$11.26</span>Fee Estimate  <br />
																</div>
																<div class="popover-content">
																	<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
																</div>
															</div>
															<div class="popover-footer1">
																To see estimated fees on all your products  <button type="reset" class="btn btn-sm btn-default">Click here</button>
															</div>
																
														</div>
													</div>	
											
											
											</td>
											
											<td><a href="<?php echo base_url('administrator/ViewController/shipmentViewDetails');?>" class="btn btn-info">View</a></td>
										</tr>
										
										<tr>
											<td>1</td>
											<td>Gaurav sir</td>
											<td>super@gmail.com</td>
											<td>41</td>
											<td>32</td>
											<td>8</td>
											<td>
												<span class="" data-toggle="popover-x" data-target="#1234567" data-placement="left" style="cursor: pointer;">$60.00</span>
											
													<div id="1234567" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
														<div>
															<div class="arrow"></div>
															<h3 class="popover-title"><span class="close pull-right" data-dismiss="popover-x">&times;</span>Fee Preview</h3>
														</div>
														<div class="popover-content">
															<div  class="col-md-12">
																<div class="popover-title">
																	<span class="pull-right">Amount</span>Type  
																</div>
																<div class="popover-text">
																	<span class="pull-right">$0.15</span>Stay  <br />
																	<span class="pull-right">$0.15 </span>Initial Freight in  <br />
																	<span class="pull-right">$0.15</span>Freight out  <br />
																	<span class="pull-right">$.01</span>unit processing fee <br /> 
																	<span class="pull-left togglediv">
																		<div class="showmenu">
																			<i class="icon-sort-down" style="font-size:19px;"></i>     Hide FBA fullfillment fee details
																		</div>
																	</span>  <br />
																		<div class="menu" style="display: none;">
																			<span class="pull-right">$0.00</span>Order Handing <br />
																			<span class="pull-right">$8.41</span>Pick & Pack <br />
																			<span class="pull-right">$0.00</span>Weight Handing <br />
																		</div>	
																</div>
																<div class="popover-title2">
																	<span class="pull-right">$11.26</span>Fee Estimate  <br />
																</div>
																<div class="popover-content">
																	<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
																</div>
															</div>
															<div class="popover-footer1">
																To see estimated fees on all your products  <button type="reset" class="btn btn-sm btn-default">Click here</button>
															</div>
																
														</div>
													</div>	
											
											
											</td>
											<td><a href="<?php echo base_url('administrator/ViewController/shipmentViewDetails');?>" class="btn btn-info">View</a></td>
										</tr>
										
										<tr>
											<td>1</td>
											<td>Gaurav sir</td>
											<td>super@gmail.com</td>
											<td>50</td>
											<td>23</td>
											<td>81</td>
											<td>
												<span class="" data-toggle="popover-x" data-target="#1234568" data-placement="left" style="cursor: pointer;">$30</span>
											
													<div id="1234568" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
														<div>
															<div class="arrow"></div>
															<h3 class="popover-title"><span class="close pull-right" data-dismiss="popover-x">&times;</span>Fee Preview</h3>
														</div>
														<div class="popover-content">
															<div  class="col-md-12">
																<div class="popover-title">
																	<span class="pull-right">Amount</span>Type  
																</div>
																<div class="popover-text">
																	<span class="pull-right">$0.15</span>Stay  <br />
																	<span class="pull-right">$0.15 </span>Initial Freight in  <br />
																	<span class="pull-right">$0.15</span>Freight out  <br />
																	<span class="pull-right">$.01</span>unit processing fee <br /> 
																	<span class="pull-left togglediv">
																		<div class="showmenu">
																			<i class="icon-sort-down" style="font-size:19px;"></i>     Hide FBA fullfillment fee details
																		</div>
																	</span>  <br />
																		<div class="menu" style="display: none;">
																			<span class="pull-right">$0.00</span>Order Handing <br />
																			<span class="pull-right">$8.41</span>Pick & Pack <br />
																			<span class="pull-right">$0.00</span>Weight Handing <br />
																		</div>	
																</div>
																<div class="popover-title2">
																	<span class="pull-right">$11.26</span>Fee Estimate  <br />
																</div>
																<div class="popover-content">
																	<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
																</div>
															</div>
															<div class="popover-footer1">
																To see estimated fees on all your products  <button type="reset" class="btn btn-sm btn-default">Click here</button>
															</div>
																
														</div>
													</div>	
											
											
											</td>
											<td><a href="<?php echo base_url('administrator/ViewController/shipmentViewDetails');?>" class="btn btn-info">View</a></td>
										</tr>
										
										<tr>
											<td>1</td>
											<td>Gaurav sir</td>
											<td>super@gmail.com</td>
											<td>90</td>
											<td>32</td>
											<td>8</td>
											<td>
												<span class="" data-toggle="popover-x" data-target="#1234569" data-placement="left" style="cursor: pointer;">$90.00</span>
											
													<div id="1234569" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
														<div>
															<div class="arrow"></div>
															<h3 class="popover-title"><span class="close pull-right" data-dismiss="popover-x">&times;</span>Fee Preview</h3>
														</div>
														<div class="popover-content">
															<div  class="col-md-12">
																<div class="popover-title">
																	<span class="pull-right">Amount</span>Type  
																</div>
																<div class="popover-text">
																	<span class="pull-right">$0.15</span>Stay  <br />
																	<span class="pull-right">$0.15 </span>Initial Freight in  <br />
																	<span class="pull-right">$0.15</span>Freight out  <br />
																	<span class="pull-right">$.01</span>unit processing fee <br /> 
																	<span class="pull-left togglediv">
																		<div class="showmenu">
																			<i class="icon-sort-down" style="font-size:19px;"></i>     Hide FBA fullfillment fee details
																		</div>
																	</span>  <br />
																		<div class="menu" style="display: none;">
																			<span class="pull-right">$0.00</span>Order Handing <br />
																			<span class="pull-right">$8.41</span>Pick & Pack <br />
																			<span class="pull-right">$0.00</span>Weight Handing <br />
																		</div>	
																</div>
																<div class="popover-title2">
																	<span class="pull-right">$11.26</span>Fee Estimate  <br />
																</div>
																<div class="popover-content">
																	<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
																</div>
															</div>
															<div class="popover-footer1">
																To see estimated fees on all your products  <button type="reset" class="btn btn-sm btn-default">Click here</button>
															</div>
																
														</div>
													</div>	
											
											
											</td>
											<td><a href="<?php echo base_url('administrator/ViewController/shipmentViewDetails');?>" class="btn btn-info">View</a></td>
										</tr>
										
										<tr>
											<td>1</td>
											<td>Gaurav sir</td>
											<td>super@gmail.com</td>
											<td>20</td>
											<td>21</td>
											<td>81</td>
											<td>
												<span class="" data-toggle="popover-x" data-target="#12345610" data-placement="left" style="cursor: pointer;">$60.00</span>
											
													<div id="12345610" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
														<div>
															<div class="arrow"></div>
															<h3 class="popover-title"><span class="close pull-right" data-dismiss="popover-x">&times;</span>Fee Preview</h3>
														</div>
														<div class="popover-content">
															<div  class="col-md-12">
																<div class="popover-title">
																	<span class="pull-right">Amount</span>Type  
																</div>
																<div class="popover-text">
																	<span class="pull-right">$0.15</span>Stay  <br />
																	<span class="pull-right">$0.15 </span>Initial Freight in  <br />
																	<span class="pull-right">$0.15</span>Freight out  <br />
																	<span class="pull-right">$.01</span>unit processing fee <br /> 
																	<span class="pull-left togglediv">
																		<div class="showmenu">
																			<i class="icon-sort-down" style="font-size:19px;"></i>     Hide FBA fullfillment fee details
																		</div>
																	</span>  <br />
																		<div class="menu" style="display: none;">
																			<span class="pull-right">$0.00</span>Order Handing <br />
																			<span class="pull-right">$8.41</span>Pick & Pack <br />
																			<span class="pull-right">$0.00</span>Weight Handing <br />
																		</div>	
																</div>
																<div class="popover-title2">
																	<span class="pull-right">$11.26</span>Fee Estimate  <br />
																</div>
																<div class="popover-content">
																	<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
																</div>
															</div>
															<div class="popover-footer1">
																To see estimated fees on all your products  <button type="reset" class="btn btn-sm btn-default">Click here</button>
															</div>
																
														</div>
													</div>	
											
											
											</td>
											<td><a href="<?php echo base_url('administrator/ViewController/shipmentViewDetails');?>" class="btn btn-info">View</a></td>
										</tr>
										
										
										
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.container -->
		</div>
		<!-- Trigger the modal with a button -->
	</div>
	<style>
.popover-title {
    background-color: #2A4053;
	color:white;
	border-radius: 0px 0px 0px 0px;
}


.popover-text{
	border-right: 1px solid #ebebeb;
	border-left: 1px solid #ebebeb;
    border-radius: 0px 0px 0px 0px;
    font-size: 12px;
    font-weight: normal;
    line-height: 24px;
    margin: 0;
    padding: 8px 14px;
}

.togglediv{
	padding-left:10px;
}

.popover-title2{
    font-size: 12px;
    font-weight: normal;
    line-height: 13px;
    margin: 0;
    padding: 8px 14px;
	border: 1px solid #ebebeb;
    border-radius: 0px 0px 0px 0px;
	background-color:lightgrey;
	color:black;
	
}

.popover-footer1{
	border-top: 0 solid #ebebeb;
    padding: 0px;
}
.showmenu{
	 color: blue;
    cursor: pointer;
    text-decoration: underline;
}

.menu {
    padding-left: 29px;
}

.close{
    color: white;
    float: right;
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    opacity: 1;
    text-shadow: 0 0 0 white;
}

.close:hover{
    color: white;
	opacity: 1;
	text-shadow: 0 0 0 white;
}
</style>
	
<script type="text/javascript">
	$( document ).ready(function() { 
		localStorage.clear();
		//$("#sample_form")[0].reset();
	});
	
	 $(document).ready(function() {
        $('.showmenu').click(function() {
             $('.menu').toggle();
        });
    });
</script>