<style>
#progress-bar {width:0%;-webkit-transition: width .3s;-moz-transition: width .3s;transition: width .3s; display:none;}
#progress-div {border:#0FA015 1px solid;padding: 5px 0px;margin:30px 0px;border-radius:4px;text-align:center;}
#targetLayer{width:100%;text-align:center;}
.alertpadding {
    padding-bottom: 2px;
}
.checkboxStyle{
	margin-top: -27px !important;
	margin-left: 512px !important;
}
.has-error{
	border-color: rgb(234, 67, 53);
}
.hidedefault{
	display:none;
}
.manycartons{
	margin-left:-14px;
}

.outputalert1 {
	margin-bottom: 45px;
    margin-top: -34px;
	margin-left: 72px;
} 

.output2alert{
   margin-bottom: 45px;
    margin-left: 72px;
    margin-top: 84px;
}
</style>

<?php  if(isset($orders)) { ?>
<link rel="stylesheet" type="text/css"  href="http://hubway.upworkdevelopers.com/assets/css/icons.css" />
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
						<div><b>Order View</b></div>
						<hr />
						<div>Order Number:   <?php  echo $orders->order_number; ?> </div>
						<div>Created Date:   <?php  echo $orders->createdate; ?>   </div>
						<div>Ship By:        <?php  echo date('Y-m-d',strtotime($orders->order_shipby));?></div>
						<div>Order Type:     
							<b> 
							<?php  if($orders->order_type==1){
								echo "Shipstation Order";
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
						<?php if($orders->track_order!=''){ ?>
							<div>Tracking Number:   <?php  echo $orders->track_order; ?>   </div>
						<?php } ?>
					</div>
					<div class="col-md-3">
						<?php if($orders->order_type != 4) { ?>
							<div><b>Ship To</b></div>
							<hr />
							<div><?php  echo $orders->shipto_recipientname .",".$orders->shipto_companyname; ?></div>
							<div><?php  echo $orders->shipto_addressline1 .','. $orders->shipto_addressline2; ?></div>
							<div><?php  echo $orders->shipto_zip; ?></div>
							<div><?php  echo $orders->shipto_city .','.$orders->shipto_state .','. $orders->shipto_country;  ?></div>
						<?php } ?>
					</div>
					<div class="col-md-3">
						<?php if($orders->order_type==3) { ?>
							<div><b>Buyer Details</b></div><hr />
							<div><?php  echo $orders->buyer_recipientname; ?> </div>
							<div><?php  echo $orders->buyer_companyname; ?>,
								 <?php  echo $orders->buyer_addressline1; ?>  </div>
							<div><?php  echo $orders->buyer_zip; ?>           </div>
							<div><?php  echo $orders->buyer_city .",". $orders->buyer_state .",". $orders->buyer_country; ?>
							</div>
						<?php } ?>
						<?php if($orders->order_type==2) { ?>
							<div><b>Contents</b></div><hr />
							<div>  <?php  echo count($products); ?>  msku</div>
							<div>  <?php  echo $orders->unit; ?>     unit</div>
							<?php if($orders->carton!=''){ ?>
							<div>  <?php  echo $orders->carton; ?>   carton</div>
							<?php } ?>
							
							<div> pallet nedded<input type="text" name="no_of_pallets" id="no_of_pallets" placeholder="Enter Number Of pallets" class="form-control input-width-mini"></div>
							
							<div><a href="#" class="order_total" data-toggle="popover-x" data-target="#order_pop125" data-placement="left" style="cursor: pointer;"><b class="pallet"><?php echo "$".$orders->no_of_pallets*8;?></b></a></div>
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
									<!--<span class="" data-toggle="popover-x" data-target="#order_pop12" data-placement="left" style="cursor: pointer;">
										$<?php echo $orders->order_total; ?>
									</span>-->

									<span class="order_total" style="cursor: pointer;">
										$<?php echo $orders->order_total; ?>
									</span>
								</td>
								<td>
									<!--<span class="" data-toggle="popover-x" data-target="#order_pop13" data-placement="left" style="cursor: pointer;">
										$<?php echo $orders->order_total; ?>
									</span>-->
									
									<span class="order_total" style="cursor: pointer;">
										$<?php echo $orders->order_total; ?>
									</span>
								</td>
							</tr>
							<tr>
								<td>
									<?php if(isset($orders) && ($orders->order_status==2) && ($orders->order_type==4)) { ?>
										<input onclick="mark_us_disposed_order('<?php echo $orders->order_id;?>')" class="btn btn-info btn-block" value="mark as disposed" type="submit">
									<?php } else if(isset($orders) && ($orders->order_status==2 )){ ?>
										<input onclick="mark_us_shipped('<?php echo $orders->order_id;?>')" class="btn btn-info btn-block" value="mark as shipped Order" type="submit">
									<?php } else { ?>
										<input class="btn btn-info btn-block" value="Shipped" type="submit">
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
												<th>Labels to be Printed</th>
												<?php } ?>
												<th>Status</th>
											</tr>
										</thead>
										<?php if(!empty($products)){ ?>	
											<tbody>	
												<?php foreach($products as $key=> $row) { ?>
													<tr>
														<td>
															<a href="#"><?php echo $row->sku; ?></a>
														</td>
														<td style="width:300px">
															<?php echo $row->item_name; ?>
															</br>
															<img src="<?php echo $row->item_image; ?>" class="img-fluid text-center" alt="Responsive image">
														</td>
														<td>
															<?php echo $row->condition; ?>
														</td>
														<td>
															<?php echo $row->upc; ?>
														</td>
														<td><?php echo $row->number_of_cases; ?></td>
														<td>
															<?php if($orders->order_type==2) { ?>
																<?php if($row->item_label!=null){ ?>
																	<?php echo $row->item_label; ?>
																<?php } else{  ?>
																<?php echo "N/A"; ?>
																<?php } ?>
															<?php } ?>
														</td>
														<td><?php
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
														} ?>
														</td>
													</tr>
												<?php } ?>
												<?php if(isset($orders->order_total)) { ?>
												<tr class="text-right">
													<td colspan="7" >
														<label>Total Charged to coustomer: <?php echo '$'.$orders->order_total; ?></label>
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
												<th>Labels to be Printed</th>
												<?php } ?>
												<?php if($orders->order_type==4) { ?>
													<th>Image Proof Needed</th>
												<?php } ?>
												<th>Status</th>
											</tr>
										</thead>
											<?php if(!empty($products)) { $cnt = 1; ?>	
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
													<?php if($orders->order_type!=4) { ?>
														<td>
															<?php if($orders->order_type==2) { ?>
																<?php if($row->item_label!=null){ ?>
																<?php 	echo $row->item_label; ?>
																<?php } else{  ?>
																	<?php echo "N/A"; ?>
																<?php } ?>
															<?php } ?>
														</td>
													<?php } ?>
													<?php if($orders->order_type==4) { ?>
														<td id="image_proof_needed_col<?php echo $cnt; ?>">
															<?php if($row->image_proff_needed == 1) { ?>
																<?php if($row->image_proof != '') { ?>
																	<?php $image = $row->image_proof; ?>

																	<a href="<?php echo site_url("uploads/image_proof/$image"); ?>" download ><?php echo $image; ?><?php //echo $cnt.')'.$image; ?></a>
																<?php } else { ?>
																	<input name="image_proof_textbox" class="image_proof_textbox validate_image_proof_textbox<?php echo $cnt; ?>" id="<?php echo $cnt; ?>" type="text" style="visibility: hidden" value="0" />

																	<div class="fileinput-holder input-group input-width-xlarge">
																		<div class="fileinput-preview uneditable-input form-control" id="validate_image_proof_div<?php echo $cnt; ?>" style="cursor: text; text-overflow: ellipsis; ">No file selected...
																		</div>
																		<div class="input-group-btn">
																			<span class="fileinput-btn btn" style="overflow: hidden; position: relative; cursor: pointer; ">Browse...
																				<input name="image_proof[]" data-style="fileinput" style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 99px; opacity: 0;" type="file" id="image_proof<?php echo $cnt; ?>" accept="image/* , .pdf" type="file"  onchange="uploadImageProof(<?php echo $cnt; ?>, <?php echo $row->item_id ?>);" />
																			</span>
																		</div>
																	</div>
																	
																	<div class="progress fileprocess<?php echo $cnt; ?> hidedefault">
																		<div id="progress-bar_file<?php echo $cnt; ?>" class="progress-bar bg-success image_proof_needed" style="width: 0%"></div>
																	</div><br>
																	
																	<div class="alert alert-success outputalert1" id="output<?php echo $cnt; ?>" style="display:none">
																		<i class="icon-remove close" data-dismiss="alert"></i><span class="output1">File Has Been Uploaded!</span>  
																	</div>
																<?php } ?>
															<?php } else { ?>
																Not Needed
															<?php } ?>
														</td>
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
												
											<?php $cnt++; } ?>
											<?php if(isset($orders->order_total)) { ?>
												<tr class="text-right">
													<td colspan="7" >
														<label>Total Charged to coustomer: <span class="order_total" data-toggle="popover-x" data-target="#order_pop125" data-placement="left" style="cursor: pointer;"><?php echo '$'.$orders->order_total; ?></span></label>
													</td>
												</tr>
												<?php }  ?>
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
		<!-- Trigger the modal with a button -->
	</div>
	
	<!-- /.modal-dialog -->
	<div id="mark_us_shipped_order" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header model_color_header">
					<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
					<h4 class="modal-title model_color_title">Confirm</h4>
				</div>
				<div class="modal-body">
					<p>Do you really want to this mark us shipped order.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="mark_us_shipped_order_btn"><?php echo $this->lang->line('Yes'); ?></button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('No'); ?></button>
				</div>
			</div>
		</div>
	</div>
	
	 <div id="order_pop13" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
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

	<div id="order_pop12" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
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

                </div>
                <div class="popover-title2">
					<span class="pull-right pallet"></span>Fee Estimate  <br />
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
	
	<div id="mark_us_disposed_order" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header model_color_header">
					<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
					<h4 class="modal-title model_color_title">Confirm</h4>
				</div>
				<div class="modal-body">
					<p>Do you really want to this mark us disposed order.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="mark_us_disposed_order_btn"><?php echo $this->lang->line('Yes'); ?></button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('No'); ?></button>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
	
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
	function mark_us_disposed_order(order_id) {
		showmodal = 0;

		$(".image_proof_textbox").each(function() {
			//alert($(this).val());

			var id = $(this).attr('id');

			//alert(id);

			if($(this).val() == 0) {
				$('html, body').animate({
					scrollTop: $("#image_proof"+id).offset().top
				}, 2000);

				$('#validate_image_proof_div'+id).css('border-color', 'red');

				showmodal = 1;
			} else {
				shomodal = 0;
			}
		});

		if(showmodal == 0) {
			$('#mark_us_disposed_order').modal({
				backdrop: 'static',
				keyboard: false
			})
			.one('click', '#mark_us_disposed_order_btn', function(e) {
				$.ajax({
					type: 'POST',
					url: base_url+'administrator/Order/updateOrder',
					data: {'order_id':order_id, 'mark_us_disposed_order': true},
					beforeSend: function(){
						$('.btn-block').attr("disabled", true);
					},
					success: function(res) {
						if(res.Order=="Disposed") {
							$('.btn-block').attr("disabled", false);
							$('#mark_us_disposed_order').modal('hide');
							location.reload();
						}
					},
					complete: function() {$('#mark_us_disposed_order').modal('hide'); $('.btn-block').attr("disabled", false);},
					error: function() {$('.btn-block').attr("disabled", false);}
				});
			});
		}
	}

	function uploadImageProof(field_cnt, item_id) {
		var inputElement = document.querySelector("#image_proof"+field_cnt);
		var fileLength = inputElement.files.length;
		var form_data = new FormData();

		for(var i = 0; i < fileLength; i++) {
			var file = inputElement.files[i];
			form_data.append("image_proof[]", file);
		}

		form_data.append("item_id", item_id);

		$.ajax({
			type: 'POST',
			dataType: 'script',
			cache: false,
			contentType: false,
			processData: false,
			url: base_url + 'administrator/Order/uploadImageProof',
			data: form_data,
			beforeSend: function() {
				$(".fileprocess"+field_cnt).show();
				$("#progress-bar_file"+field_cnt).show();
				$("#progress-bar_file"+field_cnt).width('10%');
				$("#progress-bar_file"+field_cnt).html('<div id="progress-status">' + 0 +' %</div>'); 
			},
			xhr: function() {
			var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function(evt) {
				  if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					percentComplete = parseInt(percentComplete * 100);

					if (percentComplete) {
						$("#progress-bar_file"+field_cnt).width(percentComplete + '%');
						$("#progress-bar_file"+field_cnt).html('<div id="progress-status">' + percentComplete +' %</div>');
					}
				  }
				}, false);
				return xhr;
			}, 
			success: function(res) {
				//$("#image_proof"+field_cnt).val('');
				//$("#progress-bar_file"+field_cnt).hide();
				//$("#validate_image_proof_textbox"+field_cnt).val(1);

				$('#image_proof_needed_col'+field_cnt).html('fdgdfggdgdd');
			},
			complete: function(res) {
				$("#progress-bar_file"+field_cnt).width('100%');
				$("#progress-bar_file"+field_cnt).html('<div id="progress-status">' + 100 +' %</div>');

				setTimeout(function() {
					$('#image_proof_needed_col'+field_cnt).html('<input name="image_proof_textbox" class="image_proof_textbox validate_image_proof_textbox'+field_cnt+'" id="'+field_cnt+'" type="text" style="visibility: hidden" value="1" /><a href="<?php echo site_url("uploads/image_proof"); ?>/'+file.name+'" download>'+file.name+'</a>');

					//$('#output'+field_cnt).hide();
					//$("#progress-bar_file"+field_cnt).hide();
					//$("#validate_image_proof_textbox"+field_cnt).val(1);
				}, 2000);

				$('#output'+field_cnt).show();
			},
		});
	}

	function printOrder() {
		window.print();
	}
	
	function mark_us_shipped(order_id){ 
		$('#mark_us_shipped_order').modal({
			backdrop: 'static',
			keyboard: false
		})
		.one('click', '#mark_us_shipped_order_btn', function(e) { 
			$.ajax({
				type: 'POST',
				url: base_url+'administrator/Order/updateOrder',
				data: {'order_id':order_id, 'mark_us_shipped_order': true},
				beforeSend: function(){
					$('.btn-block').attr("disabled", true);
				},
				success: function(res) {
					if(res.Order=="Shipped"){
						$('.btn-block').attr("disabled", false);
						$('#mark_us_shipped_order').modal('hide');
						location.reload();
					}
				},
				complete: function() {$('#mark_us_shipped_order').modal('hide'); $('.btn-block').attr("disabled", false);},
				error: function() {$('.btn-block').attr("disabled", false);}
			});
		});
	}
$(function(){ // this will be called when the DOM is ready
	$("#no_of_pallets").blur(function(){
			var pallat = $('#no_of_pallets').val();
			if((pallat!=null) && (pallat!=0)){
				$(".palletmsgDiv").show();
				$(".palletmsg").show();
				var total	=	pallat*8;
				$(".palletmsg").html("$"+total);
			}else{
				$(".palletmsgDiv").hide();
				$(".palletmsg").hide();
			}
			$.ajax({
				type: 'POST',
				url: base_url+'administrator/Order/updatepallets',
				data: {'no_of_pallets': pallat,'order_id': <?php echo $orders->order_id; ?>,'updatePallet': true},
				success: function(res) {
					if(res.order_total){
						$(".pallet").html("$"+total);
						$(".order_total").html('');
						$(".order_total").html("$"+res.order_total);
					}
				}
			});
	});
});
</script>