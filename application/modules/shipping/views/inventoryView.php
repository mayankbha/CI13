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
							<a href="<?php echo base_url('shipping/InventoryController/inventoryView'); ?>" title=""><?php echo $this->lang->line('ViewInventory'); ?></a>
						</li>
					</ul>
				</div>  
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<!-- /Page Header -->
				<div class="row">
					
					<div class="col-md-4 page-header">
						<div class="page-title">
							<h3><?php echo $this->lang->line('Inventory'); ?></h3>
							<h5><?php echo $this->lang->line('ViewyourInventory'); ?></h5>
							
						</div>
					
					</div>
					
					<div class="col-md-4 text-center" style="padding-top:10px">
						<button type="button" data-loading-text="Loading..." onclick ="synData();" id="synbtn" class="btn btn-primary">
							Synchronize
						</button>
					</div>
					
					<div class="col-md-4 page-header">
					</div>
					
				</div>
				
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<span class="alert alert-danger syndiv" style="display:none" align="center">
							<button class="close" data-dismiss="alert">
							</button>Please wait while we are Synchronizing your Product, and please stay on the same Page
						</span>
					</div>
					<div class="col-md-3"></div>
				</div>
					<br /><br />				
				<div class="row">
							<div class="col-md-4">
							</div>
							<div class="col-md-4">
								<div id="loader">
								</div>
							</div>
							<div class="col-md-4">
							</div>
					</div>
				<div class="row">
                    <div class="col-md-12">
                        <div class="widget box">
							<div class="widget-header">
								
							</div>
							<div class="widget-content no-padding table-responsive" >
								<table class="table table-striped table-bordered table-hover table-checkable datatable" >
									<thead>
										<tr>
											<th class="checkbox-column" style="width: 61px !important;">
												<input type="checkbox" class="uniform">
											</th>
											<th style="width: 141px !important;"><?php echo $this->lang->line('Merchant_SKU'); ?></th>
											<th style="width: 350px !important;"><?php echo $this->lang->line('Title'); ?></th>
											<th style="width: 141px !important;"><?php echo $this->lang->line('Condition'); ?></th>
											<th style="width: 141px !important;"><?php echo $this->lang->line('Price'); ?></th>
											<th style="width: 141px !important;">Stock</th>
											<th style="width: 141px !important;"><?php echo $this->lang->line('EAN'); ?></th>
											<th style="width: 141px !important;"><?php echo $this->lang->line('UPC'); ?></th>
											<th style="width: 141px !important;"><?php echo $this->lang->line('Height'); ?></th>
											<th style="width: 141px !important;"><?php echo $this->lang->line('Length'); ?></th>
											<th style="width: 141px !important;"><?php echo $this->lang->line('Width'); ?></th>
											<th style="width: 141px !important;"><?php echo $this->lang->line('Weight'); ?></th>
											<th style="width: 141px !important;">Cubic Feet</th>
										</tr>
	
										
									</thead>
									<?php if(!empty($products)){ ?>	
										<tbody>	
									<?php foreach($products as $key=> $row) { ?>
										<tr>
											<td class="checkbox-column">
												<input type="checkbox" class="uniform">
											</td>
											<td><a href="#"><?php echo $row->merchant_SKU; ?></a></td>
											<td><?php echo $row->title; ?></td>
											<td><?php echo $row->condition; ?></td>
											<td>$<?php echo $row->price; ?>
											<td><?php echo $row->quantity; ?>
											<td><?php echo $row->EAN; ?></td>
											<td><?php echo $row->UPC; ?></td>
											<td><?php echo $row->Height; ?> Inch</td>
											<td><?php echo $row->Length; ?> Inch</td>
											<td><?php echo $row->Width; ?>  Inch</td>
											<td><?php echo $row->Weight; ?> pound</td>
											<td><?php echo $row->cubic_feet; ?></td>
										</tr>
									<?php } ?>
										</tbody>
									<?php } ?>				
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
	
	
<script type="text/javascript">

	$(document).ready(function() {
		$('#synbtn').hide();		
		setTimeout(function() {
			tets();						
		}, 1000);
		
	});
	function tets(){
	
		$.ajax({
			url: base_url + 'shipping/InventoryController/updateItems1',
			beforeSend: function(){
				$('.syndiv').show();	
				$.LoadingOverlay("show");
			},
			success: function(data) {
				$.LoadingOverlay("hide");
					$('.syndiv').hide();
					$("#loader").hide();
					$('#synbtn').show();	
					$('#synbtn').button('reset');
			},
			error: function() {
				tets();
			}
		});
	}
	
</script>

	