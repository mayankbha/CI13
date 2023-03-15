<?php 
	
		$where1							=		array('address_id'=>$shipments->address_id);
		$saveaddressDetails				=		$this->common->getSingleRecord('addresses',$where1);
		
		$whereid3						=		@array('id'=>$saveaddressDetails->country);
		$country 						= 		$this->common->getSingleRecord('countries', $whereid3);
		
		$whereid						=		@array('id'=>$saveaddressDetails->state);
		$state 							= 		$this->common->getSingleRecord('states', $whereid);

		$whereid1						=		@array('id'=>$saveaddressDetails->city);
		$city 							= 		$this->common->getSingleRecord('cities', $whereid1);
		
	?>

<h3 class="block padding-bottom-10px title_bar">INVOICE</h3>
	<div class="table-responsive">   
		<table style="border:1px solid #000;border-collapse: collapse;border-spacing: 0;width:100%;"> 	
			<tr style="border:1px solid #000;"> 
				<td style="border:1px solid #000;text-align:center;" colspan="7"><span style="font-size: 25px;font-weight: bold;"><?php 
				echo $business_information->company_name; ?></span></td>  
			</tr> 
			
			<tr style="border:1px solid #000;"> 
				<td style="border:1px solid #000;text-align:center;" colspan="7"><span style="font-size: 15px;">
				<?php echo $business_information->address_line_1 .','. $business_information->address_line_2 .','.
				$business_information->city .','. $business_information->country .','. $business_information->contact_office .','. $business_information->country; ?></span></td>  
			</tr> 
	
			<tr style="border:1px solid #000;"> 
				<td style="border:1px solid #000;text-align:center;" colspan="7"><span style="font-size: 22px;">INVOICE</span></td>  
			</tr> 
			
			<tr style="border:1px solid #000;"> 
				<td style="border:1px solid #000;" colspan="5"><span style="font-size: 22px;"></span></td>  
				<td style="border:1px solid #000;" colspan="2">
					<span style="font-size: 15px;">Invoice No.:<?php echo $shipments->invoice_no; ?></span><br />
					<span style="font-size: 15px;">Date:<?php echo date("Y/m/d");  ?></span>
				</td>  
			</tr> 
			
			<tr style="border:1px solid #000;"> 
				<td style="border:1px solid #000;" colspan="1">
					<span style="font-size: 22px;">To:</span>
				</td>  
				<td style="border:1px solid #000;padding: 8px;" colspan="6">
					<span style="font-size: 16px;">G & F Products, Inc. </span><br />
					<span style="font-size: 16px;">7926 State Road,</span><br />
					<span style="font-size: 16px;">Philadelphia, PA ,</span><br />
					<span style="font-size: 16px;">USA</span><br />
					<span style="font-size: 16px;">19136</span><br />
					<span style="font-size: 16px;">Phone: 215-781-6222</span>
				</td>  
			</tr> 
			
			<tr style="border:1px solid #000;"> 
				<td style="border:1px solid #000;" colspan="1">
				</td>  
				
				
				<td style="border:1px solid #000;padding: 10px;" colspan="6">
					<span style="font-size: 18px;">Shipment from <?php echo $country->name; ?>,<?php echo $city->name; ?>  by <?php echo $shipments->ship_or_vendor_code; ?> to Philadeiphia, USA</span>
				</td>  
			</tr>
			
			<tr style="border:1px solid #000;"> 
				<td style="border:1px solid #000;padding: 5px;"></td> 
				<td style="border:1px solid #000;padding: 5px;">Item No.</td> 
				<td style="border:1px solid #000;padding: 5px;">Description </td> 
				<td style="border:1px solid #000;padding: 5px;">Qty</td> 
				<td style="border:1px solid #000;padding: 5px;">Unit Cost</td> 
				<td style="border:1px solid #000;padding: 5px;">Amount</td> 
			</tr> 
			<?php if(!empty($product_to_shipments)) { $count=1; $sum = 0;	?>
			<?php foreach ($product_to_shipments as $val) { ?>
				<tr style="border:1px solid #000;"> 
					<td style="border:1px solid #000;padding: 10px;"></td> 
					<td style="border:1px solid #000;padding: 10px;"><?php echo $val->product_id; ?></td> 
					<td style="border:1px solid #000;padding: 10px;"><?php echo $val->title; ?></td> 
					<td style="border:1px solid #000;padding: 10px;"><?php echo $val->shipment_quantity; ?></td> 
					<td style="border:1px solid #000;padding: 10px;">$<?php echo $val->cost; ?></td> 
					<td style="border:1px solid #000;padding: 10px;">$<?php echo $total = $val->shipment_quantity * $val->cost; $sum+= $total; ?></td> 
				</tr>
						
			<?php $count++; } ?>
			<?php } ?>
			<tr style="border:1px solid #000;"> 
				<td style="border:1px solid #000;padding: 10px;" colspan="7">
					<span style="font-size: 16px;font-weight:bold;">Total: $<?php  echo $sum;?></span>
				</td>  
			</tr>
			
			<tr style="border:1px solid #000;"> 
				<td style="border:1px solid #000;padding: 10px;" colspan="7">
					<span style="font-size: 14px;">SAY TOTAL: USDOLLARS</span>
				</td>  
			</tr>
			
			<tr style="border:1px solid #000;"> 
				<td style="border:1px solid #000;padding: 10px;" colspan="7">
					<span style="font-size: 14px;"><?php if($shipments->solid_wood_packing==1){ ?> THIS SHIPMENT CONTAIN SOLID WOOD PACKING MATERIAL.
					<?php } else { ?> THIS SHIPMENT DOES NOT CONTAIN SOLID WOOD PACKING MATERIAL. <?php } ?></span>
				</td>  
			</tr>
		</table>
	</div>