<style>
.custm_display{
	display:<?php  if(isset($order)  && ($order->tataloutbound)) { echo "block";  }else{ echo "none"; } ?>
}

.popover {
    padding: 0;
}

.popover-lg {
    min-width: 480px;
}

.popover-md {
    min-width: 350px;
}

.popover > .close {
    float: right;
    margin: 7px 9px 7px 7px;
}

.popover.top-right > .arrow, .popover.bottom-right > .arrow {
    left: 90%;
}

.popover.top-left > .arrow, .popover.bottom-left > .arrow {
    left: 10%;
}

.popover.left-top > .arrow, .popover.right-top > .arrow {
    top: 10%;
}

.popover.left-bottom > .arrow, .popover.right-bottom > .arrow {
    top: 90%;
}

.popover-default.bottom > .arrow:after {
    border-bottom-color: #f7f7f7;
}

.popover-primary.bottom > .arrow:after {
    border-bottom-color: #428bca;
}

.popover-success.bottom > .arrow:after {
    border-bottom-color: #dff0d8;
}

.popover-danger.bottom > .arrow:after {
    border-bottom-color: #f2dede;
}

.popover-warning.bottom > .arrow:after {
    border-bottom-color: #fcf8e3;
}

.popover-info.bottom > .arrow:after {
    border-bottom-color: #d9edf7;
}

.popover-default.left-top > .arrow:after {
    border-left-color: #f7f7f7;
}

.popover-default.right-top > .arrow:after {
    border-right-color: #f7f7f7;
}

.popover-primary.left-top > .arrow:after {
    border-left-color: #428bca;
}

.popover-primary.right-top > .arrow:after {
    border-right-color: #428bca;
}

.popover-success.left-top > .arrow:after {
    border-left-color: #dff0d8;
}

.popover-success.right-top > .arrow:after {
    border-right-color: #dff0d8;
}

.popover-danger.left-top > .arrow:after {
    border-left-color: #f2dede;
}

.popover-danger.right-top > .arrow:after {
    border-right-color: #f2dede;
}

.popover-warning.left-top > .arrow:after {
    border-left-color: #fcf8e3;
}

.popover-warning.right-top > .arrow:after {
    border-right-color: #fcf8e3;
}

.popover-info.left-top > .arrow:after {
    border-left-color: #d9edf7;
}

.popover-info.right-top > .arrow:after {
    border-right-color: #d9edf7;
}

.popover-default > .popover-title {
    color: #333;
    background-color: #f7f7f7;
}

.popover-primary > .popover-title {
    color: #fff;
    background-color: #428bca;
    border: 2px solid #428bca;
}

.popover-success > .popover-title {
    color: #3c763d;
    background-color: #dff0d8;
    border-bottom: 1px solid #d6e9c6;
}

.popover-info > .popover-title {
    color: #31708f;
    background-color: #d9edf7;
    border-bottom: 1px solid #bce8f1;
}

.popover-warning > .popover-title {
    color: #8a6d3b;
    background-color: #fcf8e3;
    border-bottom: 1px solid #faebcc;
}

.popover-danger > .popover-title {
    color: #a94442;
    background-color: #f2dede;
    border-bottom: 1px solid #ebccd1;
}

.popover-footer {
    padding: 4px;
    background-color: #fbfbfb;
    text-align: right;
    border-top: 1px solid #ebebeb;
    border-radius: 0 0 5px 5px;
}

.popover-footer .btn + .btn {
    margin-bottom: 0;
    margin-left: 4px;
}

.popover-footer .btn-group .btn + .btn {
    margin-left: -1px;
}

.popover-footer .btn-block + .btn-block {
    margin-left: 0;
}

.popover.has-footer.top > .arrow:after, .has-footer.popover.top > .arrow:after {
    border-top-color: #fbfbfb;
}

.popover.has-footer.left-bottom > .arrow:after {
    border-top-color: transparent;
    border-left-color: #fbfbfb;
}

.popover.has-footer.right-bottom > .arrow:after {
    border-top-color: transparent;
    border-right-color: #fbfbfb;
}

.popover-loading {
    padding: 30px;
    background: url('../img/loading.gif') center center;
}

.popover-x-body.modal-open {
    overflow-y: auto;
}

 /* popover must be behind bootstrap navbar when scrolled */
.popover-x-body .navbar {
    z-index:1051;
}

</style>
<h3 class="block padding-bottom-10px title_bar"><?php echo $this->lang->line('BookingNotes'); ?></h3>
<div class="row spacing_shipping">
	<div class="col-md-1"></div>
	<div class="col-md-3">
		<label>Ship To</label><br />
		<div class="addressDiv">
			<hr class="hr_margin"/> 
			<?php if(!empty($saveaddressDetails)) { ?>  
			<input type="hidden" name="shipfrom"  value="<?php echo $saveaddressDetails->address_id; ?> ">
			<?php echo $saveaddressDetails->name; ?> 
			<?php echo $saveaddressDetails->addressline1; ?></br>
			<?php echo $saveaddressDetails->addressline2; ?></br>
			<?php echo $saveaddressDetails->country; ?>
			<?php echo $saveaddressDetails->city; ?>
			<?php echo $saveaddressDetails->zipcode; ?></br>
			<?php echo $saveaddressDetails->contactoffice; ?>
			<?php echo $saveaddressDetails->contactmobile; ?>
			</br>
			<a href='#myModalFullscreen' data-toggle='modal' class="spacing_shipping_custom"><?php echo $this->lang->line('Change'); ?></a>
			&nbsp;&nbsp;&nbsp;
			<?php } else{ ?> 
					<a href='#myModalFullscreen' data-toggle='modal'><?php echo $this->lang->line('Add'); ?></a> 
			<?php } ?>
		</div>
	</div>
	<div class="col-md-2">
		<label class="labelsize"><?php echo $this->lang->line('WarehouseLocation'); ?></label>
		<hr class="hr_margin"/>
		795 Lorem Ipsum, Suite 600<br />
		San industry's, CA 94107 <br />
		P: (000) 111-0101 
	</div>
		
	<div class="col-md-2 customrd">
		<label class="labelsize"><?php echo $this->lang->line('Packingtypes'); ?></label>
		<hr class="hr_margin"/>
		<div class="custom_radio_check1">
			<label class="radio rd1">
				<input type="radio" class="uniform" name="order_type" value="1" 
				<?php if(isset($order)    &&  ($order->packing_types==1)) { echo 'checked'; }?>
				>
				.
			</label>
			<div style="padding-left: 32px; margin-top: -20px;"><?php echo $this->lang->line('Individualproducts'); ?></div>
		</div>
		<div class="custom_radio_check2">
			<label class="radio rd2">
				<input type="radio" class="uniform" name="order_type" value="2"
				<?php if(isset($order)    &&  ($order->packing_types==2)) { echo 'checked'; }?>
				>
				.
			</label>
			<div style="padding-left: 32px; margin-top: -20px;"><?php echo $this->lang->line('Caseackedproducts'); ?></div>
		</div>
	</div>
	<div class="col-md-2">
		<label class="labelsize">Ship By</label>
		<hr class="hr_margin"/>
		<input name="shipby" class="form-control datepicker" value="<?php if(isset($order)) echo date('Y-m-d',strtotime($order->order_shipby)); ?>" type="text" required />
	</div>
	
	<div class="col-md-2">	
		<label class="labelsize"><?php echo $this->lang->line('Contents'); ?></label>
			<hr class="hr_margin"/>
		<span class="msku"><?php if(isset($items)) echo count($items); ?>Msku</span>
		</br>
		<span class="msku"><?php if(isset($order)) echo ($order->unit); ?>Unit</span>
	</div>
</div>
		
<h3 class="block padding-bottom-10px title_bar">Order</h3>
<table class="table table-striped table-bordered table-checkable table-highlight-head table-no-inner-border table-hover">
	<thead>
		<tr style="border-color:white;">
			<th>Sku</th>
			<th>Item Name</th>
			<th><?php echo $this->lang->line('Condition'); ?></th>
			<th><?php echo $this->lang->line('UPS'); ?></th>
			<th><?php echo $this->lang->line('EAN'); ?></th>
			<th style="width:10%;">Item Charge</th>
			<th>Quantity</th>
		</tr>
	</thead>
	<?php if(!empty($items)){ ?>	
		<tbody>	
	<?php $sum = 0; $totalcharge= 0; foreach($items as $key=> $item) { ?>
	
		<tr><?php $sum+= $item->label_cost; ?>
			<td><?php echo $item->sku; ?></td>
			<td><?php echo $item->item_name; ?></td>
			<td><?php echo $item->condition; ?></td>
			<td><?php echo $item->upc; ?></td>
			<td><?php echo $item->ean; ?></td>
			<td>
				<a  href="JavaScript:Void(0);" style="padding-left: 10px;" rel="popover" data-popover-content="#my<?php echo $item->item_id; ?>" data-placement="left" class="princepopover" id="princepopover">
				
				<?php $price =	$item->quantity*$item->item_dimension*0.22; ?>
				
				<?php echo $totalprice = $item->quantity*$item->item_dimension*0.22+$item->label_cost;
					$totalcharge+= $totalprice;
				?>
				</a>
				
				<div class="row">
					<div id="my<?php echo $item->item_id; ?>" class="hide" style="max-width: 387px !important; top: 132.25px; left: 714px; display: block; z-index: 1050; padding: 0px;">
						
						<div style="margin-left: -14px;margin-right: -14px;margin-top: -25px;">
							<div class="arrow"></div>
							<h3 class="popover-title" style="display: block !important; "><span class="close pull-right popoverxDismiss"  data-dismiss="popover-x">&times;</span>Fee Preview</h3>
						</div>
						
						<!--<div class="popover-content">
							<div class="popover-title" >
								<span class="pull-right">Amount</span>Type  
							</div>
							<div class="popover-text">
								<span class="pull-right"><?php //echo $item->quantity; ?></span>Quantity <br />
								<span class="pull-right"> 
								<?php //echo "$".$price; ?></span>Outbound </br>charges  <br />
								<span class="pull-right"><?php //echo "$".$item->label_cost; ?> </span> Label Cost  <br />
							</div>
							<div class="popover-title2">
								<span class="pull-right">
								<?php //echo "$".$totalprice; ?>
								</span>Order Total <br />
							</div>
						</div>-->	
						
						<div class="popover-content">
							<div class="popover-title">
								<span id="myPopoverlabelcost_<?php echo $item->item_id; ?>" style="margin-left:30px;margin-right:30px;">
								
									<?php echo $price ?>&nbsp;+&nbsp;<?php echo $item->label_cost; ?>&nbsp;=&nbsp;<?php echo "$".$totalprice; ?>
									
									
									
									
								</span>
							</div>
							<div class="popover-text">
								<span class="pull-right"> 
								<?php echo "$".$price; ?></span>Outbound charges  <br />
								<span class="pull-right"><?php echo "$".$item->label_cost; ?> </span> Label Cost  <br />
							</div>
							<div class="popover-title2">
								<span class="pull-right"><?php echo "$".$totalprice;?></span>Total <br />
							</div>
							<div class="">
								<p></p>
							</div>
						</div>
						
						
						
						
						
					</div>
				</div>
			</td>
			<td><?php echo $item->quantity; ?></td>
		</tr>
	
	<?php } ?>
		<tr>
			<td colspan="7">
				<span style="padding-left: 84%;font-size: 15px;">		
					Total Price :<a href="JavaScript:Void(0);" style="padding-left: 10px;" rel="popover" data-popover-content="#myPopover123" data-placement="left" id="princepopover"><?php if(isset($order) && $order->tataloutbound!=null){ echo '$'.$order->tataloutbound; } else { echo '$0'; } ?>
					</a>
				</span>		
			   <div class="row">
					<div id="myPopover123" class="hide" style="max-width: 387px !important; top: 132.25px; left: 714px; display: block; z-index: 1050; padding: 0px;">
						<div style="margin-left: -14px;margin-right: -14px;margin-top: -25px;">
							<div class="arrow"></div>
							<h3 class="popover-title" style="display: block !important; "><span class="close pull-right" ></span>Fee Preview</h3>
						</div>
						<div class="popover-content">
							
							<div class="popover-title2">
								<span class="pull-right palletmsg"><?php echo $totalcharge; ?></span>Fee Estimate  <br />
							</div>
							<div class="">
								<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
							</div>
							
						</div>	
					</div>
				</div>
			
			</td>
			
		</tr>
		</tbody>
	<?php }else{ ?>
	<tbody>
		<tr>
			<td colspan="5" align="center">
				<div class="col-md-4 col-md-offset-4">
					<div class="alert alert-warning fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Warning!</strong> No record in Orders. </div>
				</div>
			</td>
		</tr>	
	</tbody>
	<?php }  ?>	
</table>
 
<h3 class="block padding-bottom-10px title_bar">Charges Breakdown</h3>

<div class="row">
	<div class="col-md-12">
		<div class="widget">
			<div class="widget-content">
					
					<div class="row">
						<div class="col-md-12">
							<img src="<?php echo base_url('assets/img/hubway-bike-carousel.png');?>" />
							<!-- Tabs-->
							<div class="tabbable tabbable-custom">
								<ul class="nav nav-tabs">
									<li class="active chargebreak"><a href="#tab_1_1" data-toggle="tab" style="margin-left: 0px;">Charges BreakDown</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1_1">
										<div class="row">
											<div class="col-md-8 col-md-offset-2">
												<div class="alert alert-info">
													Click to Expand any Row to see further breakdown
												</div>
											</div>	
										</div>
										<hr style="margin-bottom: 8px ! important;margin-top: 8px ! important;" />
										
										<div class="row">
											<div class="col-md-8 col-md-offset-2" style="background-color:#D9EDF7;padding-top:15px;padding-bottom:15px;">
												<a id="displayText" href="javascript:toggle();" style="text-decoration:none;">
													<img src="<?php echo base_url('assets/img/PLUS.png'); ?>" width="25px"/>
												</a>
												<span class="outboundCharges">Outbound Charges</span>
												<i class="glyphicon glyphicon-arrow-right" style="padding-left: 254px;"></i>
												<span class="outboundChargesprice">$<?php if(isset($order) && $order->tataloutbound!=null){ echo $order->tataloutbound; } else { echo 0; } ?></span>
												
											</div>
										</div>
										<div class="row">
											<div class="col-md-8 col-md-offset-2">
												<hr id="hidehr1" style="margin-bottom: 8px ! important;margin-top: 8px ! important;"/>
											</div>
										</div>
										<div class="row" id="toggleText" style="display: none">
											<div class="col-md-8 col-md-offset-2">
												<hr />
												<table class="table table-striped table-hover">
													<thead>
														
														<tr>
															<td class="sku1"><span class="sku2">SKU</span></td>
															<td class="CubicFeet1">
																
																<span class="CubicFeet2">
																	Cubic Feet Dimension<br/>
																	L<img src="<?php echo base_url('assets/img/close_big.png'); ?>" width="10px"/>W<img src="<?php echo base_url('assets/img/close_big.png'); ?>" width="10px"/>H
																</span>
															</td>
															<td class="close1">
																<img src="<?php echo base_url('assets/img/close_big.png'); ?>" width="15px"/>
															</td>
															<td class="quanity1">
																<span class="quanity2">Quanity</span>
															</td>
															<td class="close1">
																<img src="<?php echo base_url('assets/img/close_big.png'); ?>" width="15px"/>
															</td>
															<td class="outboundprince">
																<span class="CubicFeet2">$0.22(outbound charges)</span>
															</td>
															<td class="close1">
																<img src="<?php echo base_url('assets/img/equal_sign1600.png'); ?>" width="25px"/>
															</td>
															<td class="quanity1">
																<span class="sku2">Total OutBound Charges</span>
															</td>
														</tr>
													</thead>
													<tbody>
														<?php $sum = 0; if(!empty($items)){ ?>	
		
														<?php  $obcharge =0; foreach($items as $key=> $item) { ?>
														
															<tr><?php 
															$sum+= $item->label_cost;
															?>
																<td style="width:8%;">
																	<span class="CubicFeet2">
																	<?php echo $item->sku; ?>
																	<i class="glyphicon glyphicon-arrow-right" style="padding-left: 40px;"></i>
																	</span>
																</td>
																<td style="width:7%;">
																	<span class="CubicFeet2">
																	<?php 
																		echo $item->item_dimension; ?>
																	</span>
																</td>
																<td class="close1">
																<img src="<?php echo base_url('assets/img/close_big.png'); ?>" style="margin-left: 0px;" width="15px"/>
																</td>
																<td class="outboundprince">
																	<span class="outboundprince1" ><?php echo $item->quantity; ?></span>
																</td>
																<td class="close1">
																	<img src="<?php echo base_url('assets/img/close_big.png'); ?>" width="15px" style="margin-left: 5px;" />
																</td>
																<td class="outboundprince">
																	<span style="font-size: 15px;margin-left: 63px;" >$0.22 </span>
																</td>
																<td class="close1">
																<img src="<?php echo base_url('assets/img/equal_sign1600.png'); ?>" style="margin-left: 3.7px;" width="25px"/>
															</td>
																<td class="outboundprince">
																	<span style="font-size: 15px;padding-left: 55px;">$<?php $ob = $item->quantity*$item->item_dimension*0.22;
																	echo $ob;
																	$obcharge+= $ob;
																	?></span>
																</td>
															</tr>
														
														<?php } ?>
														<?php } ?>
													
														
													</tbody>
												</table>
												<hr />
												
											</div>
										</div>
										<?php  if($sum>0) {?>
										<div class="row">
											<div class="col-md-8 col-md-offset-2" style="background-color:#D9EDF7;padding-top:15px;padding-bottom:15px;">
												<a id="displayText3" href="javascript:toggle3();" style="text-decoration:none;">
													<img src="<?php echo base_url('assets/img/PLUS.png'); ?>" width="25px"/>
												</a>
												<span style="font-size: 18px;padding-left: 13px;">Labelling Charges</span>
												<i class="glyphicon glyphicon-arrow-right" style="padding-left: 260px;"></i>
												<span style="font-size: 18px;padding-left: 250px;">$<?php echo $sum;?></span>
											</div>
										</div>
										<div class="row">
											<div class="col-md-8 col-md-offset-2">
												<hr id="hidehr3" style="margin-bottom: 8px ! important;margin-top: 8px ! important;"/>
											</div>
										</div>
										<div class="row" id="toggleText3" style="display: none">
											<div class="col-md-8 col-md-offset-2">
												<hr />
												
												<table class="table table-striped table-hover">
													<thead>
														<tr>
															<td style="width:4%;"><span style="font-size: 13px;">SKU</span></td>
															<td style="width:9%;">
																<span class="CubicFeet2">
																	Labels Needed 
																</span>
															</td>
															<td class="close1">
																<img src="<?php echo base_url('assets/img/close_big.png'); ?>" width="15px"/>
															</td>
															<td class="outboundprince">
																<span style="font-size: 13px; margin-left: 34px;">Per Label Cost</span>
															</td>
															<td class="close1">
																<img src="<?php echo base_url('assets/img/equal_sign1600.png'); ?>" width="25px"/>
															</td>
															<td class="outboundprince">
																<span class="CubicFeet2">Labelling Charges for SKU</span>
															</td>
														</tr>
													</thead>
													<tbody>
													<?php if(!empty($items)){ ?>	
		
														<?php foreach($items as $key=> $item) { ?>
														
														<tr>
															<td style="width:4%;"><span style="font-size: 13px;"><?php echo $item->sku; ?></span></td>
															<td style="width:9%;">
																<span style="font-size: 13px;margin-left: 15px;">
																	<?php echo $item->item_label; ?>
																</span>
															</td>
															<td class="close1">
																<img src="<?php echo base_url('assets/img/close_big.png'); ?>" width="15px" style="margin-left:0px;"/>
															</td>
															<td class="outboundprince">
																<span style="font-size: 13px; margin-left: 50px;">0.10</span>
															</td>
															<td class="close1">
																<img src="<?php echo base_url('assets/img/equal_sign1600.png'); ?>" width="25px" style="margin-left:4.3px;"/>
															</td>
															<td class="outboundprince">
																<span class="CubicFeet2">$
																<?php echo $item->item_label*0.10; ?>
																</span>
															</td>
														</tr>										<?php } ?>
														<?php } ?>			
													</tbody>
												</table>
												<hr />
											</div>
										</div>
										
										
										<?php } ?>
										
										<div class="row">
											<div class="col-md-7 col-md-offset-4">
												<span style="font-size: 18px;color:blue;padding-left: 84px;">Total Charges</span>
												<i class="glyphicon glyphicon-arrow-right" style="padding-left: 40px;"></i>
												
												<span class="pull-right" style="font-size: 18px; padding-right: 100px;" rel="popover" data-popover-content="#myPopover123aa" data-placement="left" id="totalCharges123">$<?php echo $obcharge+$sum; ?></span>
												
												<div id="myPopover123aa" class="hide" style="max-width: 387px !important; top: 132.25px; left: 714px; display: block; z-index: 1050; padding: 0px;">
													<div style="margin-left: -14px;margin-right: -14px;margin-top: -25px;">
														<div class="arrow"></div>
														<h3 class="popover-title" style="display: block !important; "><span class="close pull-right popoverxDismiss"  data-dismiss="popover-x">&times;</span>Fee Preview</h3>
													</div>
													<div class="popover-content">
														<div class="popover-title">
															<span class="pull-right">Amount</span>Type  
														</div>
														<div class="popover-text">
															<span class="pull-right"><?php echo $order->quantity;?></span>Total Quantity <br />
															<span class="pull-right"><?php 
															echo "$".$order->tataloutbound;
															?> </span>Total Outbound  <br />
															<span class="pull-right"><?php echo "$".$sum;?></span>Total Label Cost  <br />
															
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
															<span class="pull-right">$
															<?php echo $obcharge+$sum; ?></span>Fee Estimate  <br />
														</div>
														<div class="">
															<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
														</div>
														<div class="popover-footer1">
															To see estimated fees on all your products  <button type="reset" class="btn btn-sm btn-default">Click here</button>
														</div>
													</div>	
												</div>	
											
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--END TABS-->
						</div>
					</div> <!-- /.row -->
			</div> <!-- /.widget-content -->
		</div> <!-- /.widget .box -->
	</div> <!-- /.col-md-12 -->
</div> <!-- /.row -->
<!-- /Inline Tabs -->


</div>
<!-- /.container -->
</div>



<style>
.tabbable-custom > .tab-content{
	overflow: visible ! important;
	padding-bottom:60px;
}

.chargebreak{
	border-top: 1px solid #ddd ! important;
	margin-left: 143px  ! important;
}

.outboundCharges{
	font-size: 18px;
	padding-left: 13px;
}

.outboundChargesprice{
	font-size: 18px;
	padding-left: 246px;
}

.sku1{
	width:4%;
}

.sku2{
	font-size: 13px;
	
}


.CubicFeet1{
	width:9%;
}

.CubicFeet2{
	font-size: 13px;
}

.close1{
	width:3%;
}
.quanity1{
	width:10%;
}
.quanity2{
font-size: 13px; margin-left: 34px;
}

.palletingprice{
font-size: 18px;padding-left: 250px;
}

.outboundprince{
width:10%;
}
.palletingcharges{
font-size: 18px;
padding-left: 13px;
}

.outboundprince1{
	font-size: 13px;
	margin-left: 51px;
}

</style>
<script type="text/javascript">
$(document).ready(function() { 
		$('.datepicker').datepicker({ minDate: new Date()});
		$('input[type=radio][name=order_type]').change(function() {
		$.ajax({
			type: 'POST',
			url: base_url+'order/order/updateOrder',
			data: {'changePackingtypes': true},
			beforeSend: function(){
				
			},
			success: function(result) {
				if((result.step==5) && (result.packing_types==1)){
					getOrderTable(5);
				}else if((result.step==5) && (result.packing_types==2)){
					$("#t3").trigger("click");
					$(".nav-pills a[data-toggle=tab]").on("click", function(e) {
						if(e.originalEvent && $(this).attr("class") == "step"){
							e.preventDefault();
							e.stopImmediatePropagation();
							return true;
						}
					});	
					$("#t3").trigger("click");
					$('#tab3').tab('show');
				}
			}
		});
	});
});

function toggle() {

	var ele = document.getElementById("toggleText");
	var text = document.getElementById("displayText");
	if(ele.style.display == "block") {
    	ele.style.display = "none";
		text.innerHTML = "<img src='<?php echo base_url('assets/img/PLUS.png');?>' width='25px' />";
		$('#hidehr1').show();
  	} else {
		ele.style.display = "block";
		text.innerHTML = "<img src='<?php echo base_url('assets/img/sub.png');?>' width='25px' />";
		$('#hidehr1').hide();
	}
} 


function toggle2() {

	var ele = document.getElementById("toggleText2");
	var text = document.getElementById("displayText2");
	if(ele.style.display == "block") {
    	ele.style.display = "none";
		text.innerHTML = "<img src='<?php echo base_url('assets/img/PLUS.png');?>' width='25px' />";
		$('#hidehr2').show();
  	} else {
		ele.style.display = "block";
		text.innerHTML = "<img src='<?php echo base_url('assets/img/sub.png');?>' width='25px' />";
		$('#hidehr2').hide();
	}
}


function toggle3() {

	var ele = document.getElementById("toggleText3");
	var text = document.getElementById("displayText3");
	if(ele.style.display == "block") {
    	ele.style.display = "none";
		text.innerHTML = "<img src='<?php echo base_url('assets/img/PLUS.png');?>' width='25px' />";
		$('#hidehr3').show();
  	} else {
		ele.style.display = "block";
		text.innerHTML = "<img src='<?php echo base_url('assets/img/sub.png');?>' width='25px' />";
		$('#hidehr3').hide();
	}
}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("[data-toggle='popover-x']").popover();
		$('[data-toggle="popover"]').popover(); 
	});
	$(function(){
		$('[rel="popover"]').popover({
			container: 'body',
			html: true,
			content: function () {
				var clone = $($(this).data('popover-content')).clone(true).removeClass('hide');
				return clone;
			}
		}).click(function(e) {
			e.preventDefault();
		});
	});	
	
	$(document).ready(function() {
		
		 $('.showmenu').click(function() {
             $('.menu').toggle();
        });
		
		$('.popoverxDismiss').click(function(){
			$('.popover').hide();
		});
		
		$('#totalCharges123').popover({ trigger: "hover" , html: true, animation:false}).on("mouseenter",function () { 
			var _this = this;
			$(this).popover("show");
		});
		
		$('.princepopover').popover({ trigger: "hover" , html: true, animation:false}).on("mouseenter",function () { 
			var _this = this;
			$(this).popover("show");
		});
		$('.princepopover').popover({ trigger: "hover" , html: true, animation:false}).on("mouseleave",function () { 
			var _this = this;
			$(this).popover("hide");
		});
		
		$('#Totalpopover').popover({ trigger: "hover" , html: true, animation:false}).on("mouseenter",function () { 
			var _this = this;
			$(this).popover("show");
		});
		$('#Totalpopover').popover({ trigger: "hover" , html: true, animation:false}).on("mouseleave",function () { 
			var _this = this;
			$(this).popover("hide");
		});
		
	
	});
</script>
