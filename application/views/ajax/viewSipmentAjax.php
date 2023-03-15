<table class="table table-striped table-bordered table-hover table-checkable datatable">
	<thead>
		<tr>
			<th class="checkbox-column" style="width: 61px !important;">
				<input type="checkbox" class="uniform">
			</th>
			<th style="width: 141px !important;"><?php echo $this->lang->line('ShipmentID'); ?></th>
			<th style="width: 200px !important;"> <?php echo $this->lang->line('BookingNumber'); ?></th>
			<th style="width: 141px !important;"><?php echo $this->lang->line('Created'); ?></th>
			<th style="width: 141px !important;"><?php echo $this->lang->line('MSKUs'); ?></th>
			<th style="width: 141px !important;"><?php echo $this->lang->line('Shipped'); ?></th>
			<th style="width: 141px !important;"><?php echo $this->lang->line('Received'); ?></th>
			<th style="width: 141px !important;"><?php echo $this->lang->line('Destination'); ?></th>
			<th style="width: 141px !important;"><?php echo $this->lang->line('Status'); ?></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php if(!empty($shipments)) { ?> 
		<?php foreach($shipments as $i => $item) { ?> 
		<tr>
			<td class="checkbox-column">
				<input type="checkbox" class="uniform">
			</td>
			<td><a href="#"  onclick="redirectPage('<?php echo $item->shipment_id; ?>','<?php echo $item->step; ?>');"><?php echo $item->shipping_id; ?></a></td>
			<td><?php if($item->booking_number!=''){ echo $item->booking_number; }else{echo 'N/A'; } ?> </td>
			<td><?php if($item->created!='') { echo $item->created; } else{ echo 'N/A'; } ?></td>
			<td><?php echo $item->num_of_pro; ?></td>
			<td>N/A</td>
			<td class="text-center">N/A</td>
			<td>San industry's, CA</td>
			<td><?php if($item->status==0){
					  echo 'DELETED';
					}else if($item->status==1){
						echo 'INCOMPLETE';
					}else if($item->status==2){
						echo 'WORKING ';
					}else if($item->status==3){
						echo 'COMPLETE';
					}else if($item->status==4){
						echo 'IN TRANSIT';
					}else if($item->status==5){
						echo 'CANCELLED';
					}else if($item->status==6){
						echo 'COMPLETE';
					}else{
						echo 'CLOSED';
					}; ?></td>
			<td>
			<?php if($item->status==0){ ?>
				<button onclick="redirectPage('<?php echo $item->shipment_id; ?>','<?php echo $item->step; ?>');" class="btn btn-primary btntrackShipment" >View Shipment   
				</button>
				
			<?php } else if($item->step < 5){ ?>
				<button onclick="newDoc('<?php echo $item->shipment_id; ?>','<?php echo $item->step; ?>')" class="btn btn-primary btntrackShipment" >Complete Shipment   
				</button>
				
			<?php } else if($item->step==7){ ?>
				<a  href="<?php echo base_url('shipment/Shipment/viewShipment?shipment_id='.$item->shipment_id); ?>" class="btn btn-primary btntrackShipment" >Track Shipment</a> 
			<?php } else if($item->step==6){ ?>
				<button onclick="newDoc('<?php echo $item->shipment_id; ?>','<?php echo $item->step; ?>')" class="btn btn-primary btntrackShipment" >Work on Shipment  
				</button
			<?php } else { ?>
				<button onclick="newDoc('<?php echo $item->shipment_id; ?>','<?php echo $item->step; ?>')" class="btn btn-primary btntrackShipment" >Work On Shipment   
				</button>

			<?php } ?>
			</td>
		</tr>
		<?php } ?>
		<?php }else { ?>
			<tbody>
				<tr>
					<td colspan="10" align="center">
						<div class="col-md-4 col-md-offset-4">
							<div class="alert alert-warning fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Result!</strong> No Shipment found. </div>
						</div>
					</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>	
			</tbody>
		<?php } ?>
	</tbody>
</table>