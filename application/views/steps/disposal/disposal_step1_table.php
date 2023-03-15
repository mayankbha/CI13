
<h3 class="block padding-bottom-10px title_bar">Exist order</h3>
<table class="table">
	<thead>
		<tr style="border-color:white;">
			<th><?php echo $this->lang->line('Merchant_SKU'); ?></th>
			<th><?php echo $this->lang->line('ProductName'); ?></th>
			<th><?php echo $this->lang->line('Quantity'); ?></th>
			<th>Image Proof</th>
		</tr>
	</thead>
	<?php if(!empty($items)){ ?>	
	<tbody>
	<?php foreach($items as $key=> $row) { ?> 		
		<tr>
			<td><?php echo $row->sku; ?></td>
			<td><?php echo $row->item_name; ?></td>
			<td>
				<?php echo $row->quantity; ?>
			</td>
			<td>
				<?php  if($row->image_proff_needed==1){ echo "Yes";}else{ "N/A"; } ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
		<?php }else{ ?>
		<tbody>
			<tr>
				<td colspan="5" align="center">
					<div class="col-md-4 col-md-offset-4">
						<div class="alert alert-warning fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Warning!</strong> No record in order. </div>
					</div>
				</td>
			</tr>	
		</tbody>
	<?php }  ?>	
		
</table>
