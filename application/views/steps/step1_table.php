
<table class="table">
	<thead>
		<tr style="border-color:white;">
			<th><?php echo $this->lang->line('Merchant_SKU'); ?></th>
			<th><?php echo $this->lang->line('ProductName'); ?></th>
			<th><?php echo $this->lang->line('Condition'); ?></th>
			<th><?php echo $this->lang->line('Unit'); ?></th>
			<th><?php echo $this->lang->line('Remove'); ?></th>
		</tr>
	</thead>
	<?php if(!empty($products)){ ?>	
		<tbody>	
	<?php foreach($products as $key=> $row) { ?>
	
		<tr>
			<td><?php echo $row->merchant_SKU; ?></td>
			<td><?php echo $row->title; ?></td>
			<td><?php echo $row->condition; ?></td>
			<td><?php echo $row->price; ?></td>
			<td>
				<i class="icon-remove" style="padding-left: 22px;" onclick="showDelete_recordPopup('product_to_shipments', 'product_id', <?php echo $row->product_id; ?>,1);"></i>
			</td>
		</tr>
	
	<?php } ?>
		</tbody>
	<?php }else{ ?>
	<tbody>
		<tr>
			<td colspan="5" align="center">
				<div class="col-md-4 col-md-offset-4">
					<div class="alert alert-warning fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Warning!</strong> No record in shiping plan. </div>
				</div>
			</td>
		</tr>	
	</tbody>
	<?php }  ?>	
</table>