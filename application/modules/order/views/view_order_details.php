<?php  if(isset($orders)) { ?>
	<div id="content">
		<div class="container">
			<div class="crumbs">
				<ul id="breadcrumbsorder" class="breadcrumb">
					<li>
						<i class="icon-home"></i>
						<a href="<?php echo base_url(); ?>dashboard"><?php echo $this->lang->line('Dashboard_Title'); ?></a>
					</li>
					<li class="current">
						<a href="#" title="">View Order</a>
					</li>
				</ul>
			</div>  
			<div class="row">
				<div class="col-md-12 page-header">
					<div class="page-title">
						<h3>Summary</h3>
						<h5><?php if(isset($orders)) { echo $orders->order_name; } ?></h5>
					</div>
				</div>
			</div>
			<div class="row">
			<?php if(isset($orders) && ($orders->order_status==0 )){ ?>		
				<div class="col-md-6 col-md-offset-3">
					<div class="alert alert-danger fade in">
						<strong>Cancelled Order!</strong> This Order is Cancelled.
					</div>
				</div>
			<?php } ?>
			</div>

			<hr style="border-width: 4px 0 0;margin-top: 42px;" />

			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3"> 
						<div><b>Order View</b></div><hr />
						<div>Order Number:   <?php  echo $orders->order_number; ?> </div>
						<div>Created Date:   <?php  echo $orders->createdate; ?>   </div>
						<div>Ship By:        <?php  echo date('Y-m-d',strtotime($orders->order_shipby));?></div>
						<div>Order Type:     <b><?php  if($orders->order_type==1){
																		echo "Shipment Order";
														}else if($orders->order_type==2){
															echo "FBA Order";
														}else if($orders->order_type==3){
															echo "Local Fullfillment";
														}else if($orders->order_type==4){
															echo "Disposal Order";
														}else{
															echo "Shipment Order";
												}?>
											</b>
						</div>
					</div>
					<div class="col-md-3">
						<div><b>Ship To</b></div><hr />
						<div><?php  echo $orders->shipto_recipientname .",".$orders->shipto_companyname; ?></div>
						<div><?php  echo $orders->shipto_addressline1 .','. $orders->shipto_addressline2; ?></div>
						<div><?php  echo $orders->shipto_zip; ?></div>
						<div><?php  echo $orders->shipto_city .','.$orders->shipto_state .','. $orders->shipto_country;  ?></div>
					</div>
					<div class="col-md-3">
						<?php if($orders->order_type==3) { ?>
							<div><b>Buyer Details</b></div><hr />
							<div><?php  echo $orders->buyer_recipientname; ?></div>
							<div><?php  echo $orders->buyer_companyname; ?>,
								<?php  	echo $orders->buyer_addressline1; ?></div>
							<div><?php  echo $orders->buyer_zip; ?></div>
							<div><?php  echo $orders->buyer_city .",". $orders->buyer_state .",". $orders->buyer_country; ?></div>
						<?php } ?>
						<?php if($orders->order_type==2) { ?>
							<div><b>Contents</b></div><hr />
							<div>  <?php  echo count($products); ?>  msku</div>
							<div>  <?php  echo $orders->unit; ?> unit</div>
							<?php if($orders->carton!=''){ ?>
							<div>  <?php  echo $orders->carton; ?> carton</div>
							<?php } ?>
							<?php if($orders->track_order!=''){ ?>
							<div>Tracking Number:   <?php  echo $orders->track_order; ?>   </div>
							<?php } ?>
						<?php } ?>
					</div>	
					<div class="col-md-3">
						<div><b>Payment Details</b>
						</div><hr />
						<table class = "table">
							<tr>
								<th>Item Total</th>
								<th>Plateform Fees</th>
							</tr>
							<tr>
								<td>
									<span class="" data-toggle="popover-x" data-target="#order_pop123" data-placement="left" style="cursor: pointer;">
										$<?php echo $orders->order_total; ?>
									</span>							
								</td>
								<td>
									<span class="" data-toggle="popover-x" data-target="#order_pop124" data-placement="left" style="cursor: pointer;">
										$<?php echo $orders->order_total; ?>
									</span>
								</td>
							</tr>
							<tr>
								<td>
									<?php if(isset($orders) && ($orders->order_status==0 )){ ?>		
										<input class="btn btn-info btn-block" value="Cancelled" type="submit">
									<?php } else{ ?>
										<?php if(isset($orders) && ($orders->order_status!=4 )){ ?>	
											<input onclick="cancel_Order('<?php echo $orders->order_id;?>')" class="btn btn-info btn-block" value="Cancel Order" type="submit">
										<?php }  ?>
									<?php }  ?>
								</td>
								<td>
									<input  onclick="printOrder()" class="btn btn-info btn-block" value="Print Slip" type="submit">
								</td>
							</tr>
						</table>	
					</div>
				</div>
			</div>	
			<div class="row">
				<hr />	

				<div class="row">
					<div class="col-md-12">
						<!-- Tabs-->
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#order_tab_overview" data-toggle="tab">
										Order Content
									</a>
								</li>
							</ul>
							<div class="tab-content row">
								<!--=== Edit Account ===-->
								<div class="tab-pane active" id="order_tab_overview">
									<div class="col-md-12">
										<div class="row" >
											<div class="col-md-12">
												<div class="alert alert-success">
													We recommend not packing and sealing your boxes until you have provided box content information in the <strong>Prepare Order</strong> step of the workflow. 
												</div>	
											</div>	
										</div>	

										<br/>

										<table class="table table-hover table-bordered">
										<?php if(isset($orders) && ($orders->packing_types==2)) { ?>
											<thead>
												<tr style="border-color:white;">
													<th>MSKUs</th>
													<th>Title</th>
													<th>Condition</th>
													<th>UPC</th>
													<th>Number of Cases</th>
													<?php if($orders->order_type==2) { ?>
													<th>LabelS to be printed</th>
													<?php } ?>
													<th>Status</th>
												</tr>
											</thead>
											<?php if(!empty($products)){ ?>	
												<tbody>	
													<?php foreach($products as $key=> $row) { ?>
														<tr>
															<td><a href="#"><?php echo $row->sku; ?></a></td>
															<td style="width:300px">
																<?php echo $row->item_name; ?>
																</br>
																<img src="<?php echo $row->item_image; ?>" class="img-fluid text-center" alt="Responsive image">
															</td>
															<td><?php echo $row->condition; ?></td>
															<td><?php echo $row->upc; ?></td>
															<td><?php echo $row->number_of_cases; ?></td>
															<?php if($orders->order_type==2) { ?>
															<?php if($row->item_label!=null){ ?>
															
															<td><?php echo $row->item_label; ?></td>
															<?php } else{  ?>
															<td><?php echo "N/A"; ?></td>
															<?php } ?>
															<?php } ?>
															<?php if(isset($orders) && ($orders->order_status==0)){ ?>
																<td>Deleted</td>
															<?php }else{ ?>
																<td>Pending</td>
															<?php } ?>
															
														</tr>
													<?php } ?>
													<tr>
														<td><b>Total</b></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td> 
														<td>
															<?php  
																if($orders->order_status==0){
																	echo "Cancelled";
																}else if($orders->order_status==1){
																	echo "Draft";
																}else if($orders->order_status==2){
																	echo "Pending";
																}else if($orders->order_status==3){
																	echo "Complete";
																}else if($orders->order_status==4){
																	echo "Shipped";
																}else{
																	echo "Pending";
																}
															?> 
														</td>
														<td>
															<b>N/A</b>
														</td>
													</tr>
													<?php if(isset($orders->order_total)) { ?>
													<tr class="text-right">
														<td colspan="7" >
															<label>Total Charged to coustomer: <span class="" data-toggle="popover-x" data-target="#order_pop125" data-placement="left" style="cursor: pointer;"><?php echo '$'.$orders->order_total; ?></span></label>
														</td>
													</tr>
													<?php }  ?>
												</tbody>
											<?php }else{ ?>
											<tbody>
												<tr>
													<td colspan="5" align="center">
														<div class="col-md-4 col-md-offset-4">
															<div class="alert alert-warning fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Warning!</strong> No record Inventory. </div>
														</div>
													</td>
												</tr>	
											</tbody>
											<?php } ?>											
										<?php } else { ?>
											<thead>
												<tr style="border-color:white;">
													<th>MSKUs</th>
													<th>Title</th>
													<th>Condition</th>
													<th>Price</th>
													<th>UPC</th>
													<?php if($orders->order_type==2) { ?>
													<th>Lebels to be Printed</th>
													<?php } ?>
													<th>Status</th>
												</tr>
											</thead>
												<?php if(!empty($products)){ ?>	
											<tbody>	
												<?php foreach($products as $key=> $row) { ?>
													<tr>
														<td><a href="#"><?php echo $row->sku; ?></a></td>
														<td style="width:300px">
															<?php echo $row->item_name; ?>
															</br>
															<img src="<?php echo $row->item_image; ?>" class="img-fluid text-center" alt="Responsive image">
														</td>
														<td><?php echo $row->condition; ?></td>
														<td>$<?php echo $row->unitPrice; ?></td>
														<td><?php echo $row->upc; ?></td>
														<?php if($orders->order_type==2) { ?>
															<?php if($row->item_label!=null){ ?>
															
															<td><?php echo $row->item_label; ?></td>
															<?php } else{  ?>
															<td><?php echo "N/A"; ?></td>
															<?php } ?>
														<?php } ?>
														
														<td>
														<?php  
																	if($orders->order_status==0){
																		echo "Cancelled";
																	}else if($orders->order_status==1){
																		echo "Draft";
																	}else if($orders->order_status==2){
																		echo "Pending";
																	}else if($orders->order_status==3){
																		echo "Complete";
																	}else if($orders->order_status==4){
																		echo "Shipped";
																	}else{
																		echo "Pending";
																	}
															?> 
															</td>
													</tr>
												<?php } ?>
												<?php if(isset($orders->order_total)) { ?>
													<tr class="text-right"> 
														<td colspan="7" >
															<label>Total Charged to coustomer: <span class="" data-toggle="popover-x" data-target="#order_pop125" data-placement="left" style="cursor: pointer;"><?php echo '$'.$orders->order_total; ?></span></label>
														</td>
													</tr>
													<?php } ?>
											</tbody>
												<?php } else{ ?>
											<tbody>
												<tr>
													<td colspan="5" align="center">
														<div class="col-md-4 col-md-offset-4">
															<div class="alert alert-warning fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Warning!</strong> No record Inventory. </div>
														</div>
													</td>
												</tr>	
											</tbody>
											<?php } ?>	
											<?php } ?>
										</table>
									</div> <!-- /.col-md-12 -->
									<!--<div class="col-md-12" >
										<h3 class="block padding-bottom-10px title_bar">Shipping Notes</h3>
										<div class="col-md-6 col-md-offset-12" style="border:2px solid lightgrey;padding:41px;">
										
										</div>
									</div>-->
								</div>
								<!-- /Edit Account -->
							</div> <!-- /.tab-content -->
						</div>
						<br /><br /><br /><br />
					</div>
				</div> <!-- /.row -->
				<?php if($orders->order_type==2) { ?>
				<div class="row">
					<div class="col-md-4 text-center">	
						<?php if(!empty($orders &&  ($orders->label_images!=null))){ ?>					
						<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#download_Label">
							<i class="icol-doc-pdf"></i>
							Download Label
						</button>
						<?php } ?>
					</div>
					<div class="col-md-4 text-center">
					<?php if(!empty($orders &&  ($orders->carton_images!=null))){ ?>
						<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#download_carton">
							<i class="icol-doc-pdf"></i>
							Download Carton
						</button>
					<?php } ?>
					</div>
					<div class="col-md-4 text-center">
					<?php if(!empty($orders &&  ($orders->shipping_label_images!=null))){ ?> 
						<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#download_sh_Label">
							<i class="icol-doc-pdf"></i>
							Download Shipping Label
						</button>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
				
				</br>
				</br>
				
			</div>
			<!-- /.container -->
		</div>
		<!-- Trigger the modal with a button -->
	</div>
	
	<!-- Modal -->
	<div id="download_Label" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Label</h4>
		  </div>
		  <div class="modal-body">
			<div class="row">
				<?php if(!empty($orders &&  ($orders->label_images!=null))){ ?>
				<?php $label_images = explode(",", $orders->label_images); ?>
				<?php $count =0; foreach($label_images as  $image) { ?>
				<?php $count++;?>
				<div id="image_label_images<?php echo $count;?>" class="alert alert-success fade in col-md-5">
					<a href="<?php echo site_url("uploads/label/$image");?>" download><?php  echo $count.')'.$image;?></a> 
				</div>
				<div class="col-md-1">
				</div>
				<?php } ?>
				<?php } ?>
			</div>
		  </div>
		  <div class="modal-footer">
			<a type="button" class="btn btn-lg" href="<?php echo base_url("order/order/download/$orders->order_id/1");?>">
				<i class="icol-doc-pdf"></i>
				Download Label
			</a>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>

	  </div>
	</div>
	
	<!-- Modal -->
	<div id="download_carton" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Carton</h4>
		  </div>
		  <div class="modal-body">
			<div class="row">
			<?php if(!empty($orders &&  ($orders->carton_images!=null))){ ?>
			<?php $carton_images = explode(",", $orders->carton_images); ?>
				<?php $count =0; foreach($carton_images as  $image) { ?>
				<?php $count++;?>
				<div id="image_carton_images<?php echo $count;?>" class="alert alert-success fade in col-md-5">
					<a href="<?php echo site_url("uploads/carton/$image");?>" download ><?php  echo $count.')'.$image;?></a> 
				</div>
				<div class="col-md-1">
				</div>
				<?php } ?>
			<?php } ?>
			</div>
		  </div>
		  <div class="modal-footer">
			<a type="button" class="btn btn-lg" href="<?php echo base_url("order/order/download/$orders->order_id/2");?>">
				<i class="icol-doc-pdf"></i>
				Download Carton
			</a>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>

	  </div>
	</div>
	
	<!-- Modal -->
	<div id="download_sh_Label" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Shipping Label</h4>
		  </div>
		  <div class="modal-body">
			<div class="row">
				<?php if(!empty($orders &&  ($orders->shipping_label_images!=null))){ ?> 
				<?php $shipping_label_images = explode(",", $orders->shipping_label_images); ?>
					<?php $count =0; foreach($shipping_label_images as  $image) { ?>
					<?php $count++;?>
					<div id="image_shipping_label_images<?php echo $count;?>" class="alert alert-success fade in col-md-5">
						<a href="<?php echo site_url("uploads/shipping_label/$image");?>" download><?php  echo $count.')'.$image;?></a> 
					</div>
					<div class="col-md-1">
					</div>
					<?php } ?>
				<?php } ?>
			</div>
		  </div>
		  <div class="modal-footer">
			<a type="button" href="<?php echo base_url("order/order/download/$orders->order_id/3");?>" class="btn btn-lg">
				<i class="icol-doc-pdf"></i>
				Download Shipping Label
			</a>
			<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>

	  </div>
	</div>

<?php  }  ?> 
    <div id="order_pop123" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
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

	<div id="order_pop124" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
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
	
	<div id="order_pop125" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
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

<style>
#removeDiv {
	display:none;
}
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
<?php   //$shipment_id 		=	$_GET['shipment_id'];  ?>
<script type="text/javascript">

	function printOrder() {
		window.print();
	}
	
	function download(order_id, filetype) {
		$.ajax({
				type: 'POST',
				url: base_url+'order/order/download',
				data: {'order_id':order_id, 'type': filetype},
				beforeSend: function(){
					//$.LoadingOverlay("show");
				},
				success: function(res) {
				},
				complete: function() {},
				error: function() {}
			});
	}
	
	
	function cancel_Order(order_id){ 
		$('#cancel_Order_model').modal({
			backdrop: 'static',
			keyboard: false
		})
		.one('click', '#cancel_order_btn', function(e) { 
			$.ajax({
				type: 'POST',
				url: base_url+'order/order/updateOrder',
				data: {'order_id':order_id, 'cancelOrder': true},
				beforeSend: function(){
					$.LoadingOverlay("show");
				},
				success: function(res) {
					if(res.Order=="deleted"){
						$('#cancel_Order_model').modal('hide');
						$.LoadingOverlay("hide");
						window.location.href = base_url + 'order/order/view_order';
					}
				},
				complete: function() {$('#cancel_Order_model').modal('hide');},
				error: function() {}
			});
		});
	}
	
	
	function downloadAll(files){  
        if(files.length == 0) return;  
			file = files.pop();  
			var theAnchor = $('<a />')  
            .attr('href', file[1])  
            .attr('download',file[0]);  
			theAnchor[0].click();   
			theAnchor.remove();  
			downloadAll(files);  
    }  
</script>