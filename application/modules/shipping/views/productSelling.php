
		<div id="content">
			<div class="container">

				<!-- Breadcrumbs line -->
				<div class="crumbs">
					<ul id="breadcrumbs" class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="<?php echo base_url('dashboard/Dashboard'); ?>"><?php echo $this->lang->line('Dashboard_Title'); ?></a>
						</li>
						<li>
							<i class=" icon-shopping-cart"></i>
							<a href="<?php echo base_url('shipping/InventoryController/inventoryView '); ?>"><?php echo $this->lang->line('ViewInventory'); ?></a>
						</li>
						<li class="current">
							<a href="<?php echo base_url('shipping/InventoryController/sellingProduct'); ?>" title=""><?php echo $this->lang->line('ViewyoursellingInventory'); ?></a>
						</li>
					</ul>
				</div>  
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-6 page-header">
						<div class="page-title">
							<h3><?php echo $this->lang->line('Inventory'); ?></h3>
							<h5><?php echo $this->lang->line('ViewyoursellingInventory'); ?></h5>
							
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
								<table class="table table-striped table-bordered table-hover table-checkable datatable" >
									<thead>
										<tr>
											<th class="checkbox-column" style="width: 61px !important;">
												<input type="checkbox" class="uniform">
											</th>
											<th style="width: 61px !important;"><?php echo $this->lang->line('Merchant_SKU'); ?></th>
											<th style="width: 600px !important;"><?php echo $this->lang->line('Title'); ?></th>
											<th style="width: 141px !important;"><?php echo $this->lang->line('Condition'); ?></th>
											<th style="width: 141px !important;"><?php echo $this->lang->line('Cost'); ?>(USD)</th>
											<th style="width: 141px !important;"><?php echo $this->lang->line('Price'); ?>(USD)</th>
											<th style="width: 141px !important;"><?php echo $this->lang->line('Quantity'); ?></th>
											
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
											<td><?php  echo $row->title;?>
											<td><?php echo $row->condition ?></td>
											<td> <input type="text" id="cost-<?php echo $row->inventory_id; ?>" onblur="changeCost('<?php echo $row->inventory_id; ?>');" class="form-control input-width-mini qty" value="<?php echo $row->cost; ?>"></td>
											<td>$<?php echo $row->price; ?></td>
											<td>$<?php echo $row->quantity; ?></td>
										</tr>
									<?php } ?>
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
	$(function(){ // this will be called when the DOM is ready
		$('.qty').on('input', function (event) { 
			
			var valid = /^\d{0,4}(\.\d{0,2})?$/.test(this.value),
				val = this.value;
    
			if(!valid){
				console.log("Invalid input!");
				this.value = val.substring(0, val.length - 1);
			}
		});
				
	});
	function changeCost(id) { 
		var cost	=	$('#cost-'+id).val(); 
		
		$.ajax({
			type: 'POST',
			url: base_url+'shipping/InventoryController/updateInventoryCost',
			data: {'inventory_id': id, 'cost':cost, 'updateInventoryCost': true},
			success: function(res) {
				
			}
		});
	}
	function change_mainQuantity(i_id) {  
		var mainQuantity	=	$('#mainQuantity-'+i_id).val(); 
		
		$.ajax({
			type: 'POST',
			url: base_url+'shipping/InventoryController/updateInventoryQuantity',
			data: {'inventory_id': i_id, 'quantity':mainQuantity, 'updateInventoryQuantity': true},
			success: function(res) {
			}
		});
	}
	
	function changeCondition(i_id) {  
		var item_condition	=	$('#item_condition-'+i_id).val(); 
		if(item_condition!=''){ 
			$.ajax({
				type: 'POST',
				url: base_url+'shipping/InventoryController/changeCondition',
				data: {'inventory_id': i_id, 'item_condition':item_condition, 'changeCondition': true},
				success: function(res) {
				}
			});
		}
	}
</script>