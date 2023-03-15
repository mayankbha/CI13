<?php //print_r($user_address); ?>

<?php $str = $this->uri->segment(4);
$decoded = base64_decode( urldecode( $str ) );
?>
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
							<a href="<?php echo base_url('administrator/ViewShipmentAll/shipmentDetail/'.$this->uri->segment(4));?>">Shipment Details</a>
						</li>
					</ul>
				</div><br /><br />
				<!-- /Breadcrumbs line -->
				<div class="row">
					<div class="col-md-6">	
						<div class="widget-header">
							<div class="pull-left">
								
								<h5><p class="invoice-nr"><strong>Shipment</strong> #</p></h5>
								<h5><p class="invoice-date"><?php if(isset($shipment)) echo $shipment->shipment_name; ?></p></h5>
							</div>
						</div>
					</div>
					<div class="col-md-6">	
						<div class="pull-right">
							<h5><p class="invoice-nr"><strong>Invoice:</strong> <?php if(isset($shipment)) echo $shipment->invoice_no; ?></p></h5>
							<h5><p class="invoice-date">Created: <?php if(isset($shipment)) echo $shipment->booking_created; ?></p></h5>
						</div>
					</div>
				</div><hr style="margin-top:2px;"/>				
				<!--=== Page Content ===-->
				<div class="row">
					<!--=== Invoice ===-->
					<div class="col-md-12">
						<div class="widget invoice">
							<?php //echo "<pre>"; print_r($shipmentProductsDetail); ?>

							<div class="widget-content">
								<div class="row">
									<!--=== Adresses ===-->
									<!--<div class="col-md-6">
										<h3>Company Information</h3>

										<address>
											<strong>Twitter, Inc.</strong><br>
											795 Folsom Ave, Suite 600<br>
											San Francisco, CA 94107<br>
											<abbr title="Phone">P:</abbr> (123) 456-7890
										</address>
									</div>
									<div class="col-md-6 align-right">
										<h3>Client Information</h3>

										<address>
											<strong><?php //echo $user_address->name; ?></strong><br>
											<?php //echo $user_address->addressline1.' '.$user_address->addressline2; ?><br>
											<?php //echo $user_address->city.', '.$user_address->country.', '.$user_address->zipcode; ?><br>
											<abbr title="Phone">P:</abbr> <?php //echo $user_address->contactmobile; ?>
										</address>
									</div>-->
									<!-- /Adresses -->
									
									
									
									<div class="col-md-12" style="margin-bottom:10px;">
										<div class="col-md-2">
											<div><b>Ship from</b></div><hr />
											<div><?php if(isset($user_address)) echo $user_address->name; ?></div>
											<div><?php if(isset($user_address)) echo $user_address->addressline1 .''.$user_address->addressline2 .'</br>'.$user_address->city; ?></div>
											<div>Philadelphia, PA 19136</div>
											<div>US</div>
										</div>
										
										<div class="col-md-3">
											<div><b>Shipment Name ID</b></div><hr />
											<div>Name:<?php if(isset($shipment)) echo $shipment->shipment_name; ?></div>
											<div>ID:<?php if(isset($shipment)) echo $shipment->shipping_id; ?></div>
											
										</div>
										
										<div class="col-md-2">
											<div><b>Ship To</b></div><hr />
											<div>Amazon.com</div>
											<div>550 Oak Ridge Rd</div>
											<div>Hazleton, PA 18202</div>
											<div>US(AVP1)</div>
										</div>
										
										<div class="col-md-3">
											<div><b>Shipment Contents</b></div><hr />
											<div><?php if(isset($shipmentProductsDetail)) echo count($shipmentProductsDetail); ?> MSKU</div>
											<div><?php if(isset($unit)) echo $unit; ?> Units</div>
											<div></div>
											<div></div>
										</div>
										
										<div class="col-md-2">
											<div><b>Shipment Status</b></div><hr />
											<div>
												RECEIVING 
												<?php //echo $shipped.' :: '.$shipment_total_received_product; ?>
											</div>
											<div>Created:May 1,2017</div>
											<div>Updated:May 5,2017</div>
											<div></div>
										</div>
										
									
									</div>
										
									<br /><br /><br /><br /><br /><br /><br /><br />

									<!--=== Table ===-->
									<div class="col-md-12">
										<table class="table table-striped table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>MSKU</th>
													<th class="hidden-xs">Title</th>
													<th class="hidden-xs">Condition</th>
													<th class="hidden-xs">UPC</th>
													<!--<th class="hidden-xs">Item Quanity</th>-->
													<th class="hidden-xs">Number of Cases</th>
													<th class="hidden-xs">Shipped</th>
													<th class="hidden-xs">Received</th>
													<td class="hidden-xs">&nbsp;</td>
												</tr><br />
											</thead>
											<tbody>
												<?php if(is_array($shipmentProductsDetail)) { ?>
													<?php $sno = '1'; foreach($shipmentProductsDetail as $row) { ?>
														<?php $encoded = urlencode(base64_encode($row['id']));?>

														<tr>
															<td class="shipment_detailsadmin"><?php echo $sno; ?></td>
															<td class="shipment_detailsadmin"><?php echo $row['merchant_SKU']; ?></td>
															<td class="hidden-xs shipment_detailsadmin"><?php echo $row['title']; ?></td>
															<td class="hidden-xs shipment_detailsadmin"><?php echo $row['condition']; ?></td>
															<td class="hidden-xs shipment_detailsadmin"><?php echo $row['UPC']; ?></td>
															<td class="shipment_detailsadmin"><?php echo $row['number_of_cases']; ?></td>
															<td class="shipment_detailsadmin"><?php echo $row['shipped']; ?></td>
															<td class="shipment_detailsadmin"><?php echo $row['received']; ?></td>
															<td class="shipment_detailsadmin">
																<a id="edit_link_<?php echo $row['id']; ?>" href="javascript: void(0);" onclick="showEditProductSection('<?php echo $shipment_id; ?>', '<?php echo $encoded; ?>', <?php echo $row['id']; ?>);" class="common_class m_show">Edit</a></td>
														</tr>
													<?php $sno++; } ?>
												<?php } ?>
											</tbody>
										</table>
									</div>
									<br />
									<!--=== Invoice ===-->
									<div class="col-md-12">
										<div class="col-md-10">			
										</div>
										<div class="col-md-2">			
											<a href="javascript: void(0);" onclick="showEditProductSection(<?php echo $row['id']; ?>);" class="btn btn-primary">Back to Previous Page</a>
										</div>
									</div>
									
									<br /><br />

									
									<!--=== Invoice ===-->
									<div class="col-md-12">
										<div class="widget invoice">
											<div class="widget-header">
												<div class="pull-left">
													<h2><?php echo $shipment_name; ?></h2>
												</div>
												<div class="pull-right">
												</div>
											</div>
										</div>
									</div>
									
								</div>

								<div id="edit_product_section">
									
								</div>
							</div>
						</div> <!-- /.widget box -->
					</div> <!-- /.col-md-12 -->
					<!-- /Invoice -->
				</div> <!-- /.row -->
				<!-- /Page Content -->

			</div>
			<!-- /.container -->
		</div>
	</div>