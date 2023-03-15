<h3 class="block padding-bottom-10px title_bar">Order</h3>
<table class="table">
	<thead>
		<tr style="border-color:white;">
			<th>Sku</th>
			<th>Item Name</th>
			<th>Condition</th>
			<th>Price</th>
			<th>Quantity</th>
			<th><?php echo $this->lang->line('Remove'); ?></th>
		</tr>
	</thead>
	<?php if(!empty($items)){ ?>	
		<tbody>	
	<?php foreach($items as $key=> $item) { ?>
		<tr>
			<td><?php echo $item->sku; ?></td>
			<td><?php echo $item->item_name; ?></td>
			<td><?php echo $item->condition; ?></td>
			<td><?php echo $item->unitPrice; ?></td>
			<td><?php echo $item->quantity; ?></td>
			<td>
				<i class="icon-remove" style="padding-left: 22px;" onclick="showDelete_recordPopup('product_to_order', 'item_id', <?php echo $item->item_id; ?>,1);"></i>
			</td>
		</tr>
	
	<?php } ?>
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