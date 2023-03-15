<?php print_r($orders);?>
<?php //print_r($coustomer);?>

<div id="content" style="height:1002px ! important;">
	<div class="container" >
		<!-- Breadcrumbs line -->
		<div class="crumbs">
			<ul id="breadcrumbs" class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url('dashboard/Dashboard'); ?>"><?php echo $this->lang->line('Dashboard_Title'); ?></a>
				</li>
				<li class="current">
					<a href="<?php echo base_url('order/Createorder/vieworderDetails/'.$this->uri->segment(4)); ?>" title="">View Order</a>
				</li>
			</ul>
		</div><br /><br />
		<!-- /Breadcrumbs line -->

		<div class="row">
			<div class="col-md-1" style="margin-top: 5px;margin-left: -24px;">	
				<div class="widget-header">
					<div class="pull-left">
						<?php if($coustomer) { ?> 
						<img src="<?php echo base_url('assets/img/Hubwaylogo2014.png');?>" width="50" />
						<?php } else {  ?>
						<img src="<?php echo base_url('assets/img/amazontitle.png');?>" width="100" />
						<?php } ?>
					</div>
				</div>
			</div>	
			<div class="col-md-5" style="margin-left: -39px;">	
				<div class="widget-header">
					<div class="pull-left">
						<h5>
							<p class="invoice-nr"><strong>Order # :<?php echo $coustomer->order_number;?></strong> <?php if(isset($coustomer->order_number)){  $order_number	=	$coustomer->order_number; } ?> &nbsp;&nbsp;&nbsp;&nbsp;
							<?php if(isset($coustomer)) { ?><a href="<?php echo base_url("order/Createorder/edit_order/$order_number"); ?>"><i class="icon-pencil" ></i></a> <?php } ?>
							</p>
								
							<p class="invoice-nr"><strong>Status : Pending</strong> 

							</p>
						</h5>
					</div>
				</div>
			</div>
		</div><hr style="margin-top:2px;margin-bottom: 2px;"/>			
		<div class="row">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-5">
				
					<h3 class="block padding-bottom-10px title_bar">Order Summary</h3><br />
			
					<div class="col-md-12">
						<div class="col-md-3 viewOrdertext"><b>Order Date:</b></div>
						<div class="col-md-3 viewOrdertext"><?php if(isset($coustomer->order_date)){ echo substr_replace($coustomer->order_date ,"",-8); }else{ } ?></div>
						<div class="col-md-3 viewOrdertext"><b>Product Total:</b></div>
						<div class="col-md-3 viewOrdertext">$<?php echo $coustomer->total_order_amount; ?></div>
					</div><br /><br /><br />
					
					<div class="col-md-12">
						<div class="col-md-3 viewOrdertext"><b>Paid Date :</b></div>
						<div class="col-md-3 viewOrdertext"><?php if(isset($coustomer->paid_date)){ echo substr_replace($coustomer->paid_date ,"",-8); }else{ echo '5/11/17';} ?></div>
						<div class="col-md-3 viewOrdertext"><b>Shipping Paid:</b></div>
						<div class="col-md-3 viewOrdertext">$<?php if(isset($coustomer->shipping_paid)){ echo $coustomer->shipping_paid; } ?></div>
					</div><br /><br /><br />
					
					<div class="col-md-12">
						<div class="col-md-3 viewOrdertext"><b>Hold Untll :</b></div>
						<div class="col-md-3 viewOrdertext"><?php if(isset($coustomer->hold_untill)){ echo substr_replace($coustomer->hold_untill ,"",-8); } ?></div>
						<div class="col-md-3 viewOrdertext"><b>Tax Paid:</b></div>
						<div class="col-md-3 viewOrdertext">$<?php if(isset($coustomer->tax_paid)){ echo $coustomer->tax_paid; }else{ } ?></div>
					</div>
					
					<div class="col-md-9 col-md-offset-7">
						<hr class="ruler" style="margin-top:12px;margin-bottom: 12px;"/>
					</div>
					
					<div class="col-md-12">
						<div class="col-md-3 viewOrdertext"><b>Ship by:</b></div>
						<div class="col-md-3 viewOrdertext"><?php if(isset($coustomer->order_date)){ echo substr_replace($coustomer->order_date ,"",-8); } ?></div>
						<div class="col-md-3 viewOrdertext"><b>Total Order:</b></div>
						<div class="col-md-3 viewOrdertext">$<?php echo $coustomer->total_order_amount + $coustomer->shipping_paid +$coustomer->tax_paid; ?> </div>
					</div><br /><br /><br />
					
					<div class="col-md-9 col-md-offset-7">
						<hr class="ruler" style="margin-top:12px;margin-bottom: 12px;"/>
					</div>
					
					<div class="col-md-12">
						<div class="col-md-3 col-md-offset-1 viewOrdertext"><b></b></div>
						<div class="col-md-2 viewOrdertext"></div>
						<div class="col-md-3 viewOrdertext"><b>Total Paid:</b></div>
						<div class="col-md-2 viewOrdertext">$<?php echo $coustomer->total_order_amount + $coustomer->shipping_paid +$coustomer->tax_paid; ?></div>
					</div><br /><br /><br />
				</div>
				
				<div class="col-md-5">
					<h3 class="block padding-bottom-10px title_bar">Buyer / Recipient Info</h3><br />
				
					<div class="col-md-12" style="padding-bottom:30px;">
						<div class="col-md-3 col-md-offset-1 viewOrdertext"><b>Sold To :</b></div>
						
						<div class="col-md-5 viewOrdertext"><?php if(isset($coustomer->address_line_1)){ echo $coustomer->address_line_1;} ?>  <?php if(isset($coustomer->address_line_2)){ echo $coustomer->address_line_2; } ?><br />
						<?php 
							$whereid3						=		@array('id'=>$coustomer->country);
							$country 					= 		$this->common->getSingleRecord('countries', $whereid3);
							
							
							$whereid						=		@array('id'=>$coustomer->state);
							$state 					= 		$this->common->getSingleRecord('states', $whereid);
						

							$whereid1						=		@array('id'=>$coustomer->city);
							$city 						= 		$this->common->getSingleRecord('cities', $whereid1);		
							
							
						?>
						
						<?php if(isset($country->name)){ echo $country->name; } ?> <?php if(isset($state->name)){ echo $state->name; } ?> <?php if(isset($city->name)){ echo $city->name; } ?><br />
						<?php if(isset($coustomer->zipcode)){ echo $coustomer->zipcode; } ?> <?php if(isset($coustomer->contact_office)){ echo $coustomer->contact_office; } ?> <?php if(isset($coustomer->contact_mobile)){ echo $coustomer->contact_mobile; } ?></div>
						
						<div class="col-md-2  viewOrdertext"></div>
					</div>
					
					<br /><br /><br />
					
					<div class="col-md-12"  >
						<div class="col-md-3 col-md-offset-1 viewOrdertext"><b>Ship To :</b></div>
						<div class="col-md-5 viewOrdertext"><?php if(isset($coustomer)){ echo $coustomer->ship_to_address_line_1 .",".  $coustomer->ship_to_address_line_2 .",". $coustomer->ship_to_zipcode
						.",". $coustomer->ship_to_zipcode .",". $coustomer->ship_to_contact_office; } ?></div>
						
						<div class="col-md-2 viewOrdertext"></div>
					</div>
					
				</div>
				<div class="col-md-1">
				</div>
			</div>
			<br />
			
			
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10" style="margin-top:5px;">
					<h3 class="block padding-bottom-10px title_bar">Order Items</h3>
				</div>
				<div class="col-md-1"></div>
			</div>
			
			
			
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					
					<div class="col-md-6 viewOrdertext"><b>Item :</b></div>
					<div class="col-md-1 viewOrdertext"><b>price $</b></div>
					<div class="col-md-1 viewOrdertext"><b>Qty</b></div>
					<div class="col-md-2 viewOrdertext"><b>Stock Level</b></div>
					<div class="col-md-1 viewOrdertext"><b>Total $</b></div>
			
				</div>
				<div class="col-md-1"></div>
				<br />
			</div>
			
			
			
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10" >
					<hr />
				</div>
				<div class="col-md-1"></div>
				<br />
			</div>
			
			
			<?php foreach ($orders as $key => $item) { ?>
			<div class="row">
			
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="col-md-2">
						<img src="<?php  echo $item->item_image; ?>" width="100"/>
					</div>
					<div class="col-md-4 viewOrdertext">
						<span class="textColor"><?php echo $item->item_name;  ?></span><br />
						<span>SKU:<?php echo $item->sku;  ?></span>
					</div>
					<div class="col-md-1 viewOrdertext"><?php  echo $item->item_price ;  ?></div>
					<div class="col-md-1 viewOrdertext"><b><?php echo $item->quantity;  ?></b></div>
					<div class="col-md-2 viewOrdertext">
						Total Stock&nbsp;&nbsp;2
						Avaliable&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2
					</div>
					<div class="col-md-1 viewOrdertext">$<?php echo $item->item_price*$item->quantity; ?></div>
				</div>
				<div class="col-md-1"></div>
			</div></br>
			<?php  } ?>
			<br />
			
			
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10" style="margin-top:5px;">
					<h3 class="block padding-bottom-10px title_bar">Order Notes</h3>
				</div>	
				<div class="col-md-1"></div>
			</div>	
				
			<div class="row">	
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="col-md-1"></div>
					<div class="col-md-3 viewOrdertext"><b>Customer :</b></div>
					<div class="col-md-6 viewOrdertext textColor" ><?php if(isset($coustomer->customer_note)){ echo $coustomer->customer_note; } ?></div>
				</div><div class="col-md-1"></div>	<br /><br />
			</div>	
				
			<div class="row">	
				<div class="col-md-1">
				</div>	
				<div class="col-md-10">
					<div class="col-md-1"></div>
					<div class="col-md-3 viewOrdertext"><b>To Buyer :</b></div>
					<div class="col-md-6 viewOrdertext textColor"><?php if(isset($coustomer->buyer_note)){ echo $coustomer->buyer_note; } ?></div>
				</div>	
				<div class="col-md-1">
				</div>	
				<br /><br />
			</div>	
				
			<div class="row">	
				<div class="col-md-1">
				</div>	
				<div class="col-md-10">
					<div class="col-md-1"></div>
					<div class="col-md-3 viewOrdertext"><b>Internet :</b></div>
					<div class="col-md-6 viewOrdertext textColor"><?php if(isset($coustomer->internet_note)){ echo $coustomer->internet_note; } ?></div>
					
				</div><div class="col-md-1">
				</div>	<br /><br />
			</div>	
				
			<div class="row">	
				<div class="col-md-1">
				</div>	
				<div class="col-md-10">
					<div class="col-md-1"></div>
					<div class="col-md-3 viewOrdertext"><b><input type="checkbox" name="checkbox" class="uniform"/>This is gift :</b></div>
					<div class="col-md-6 viewOrdertext textColor"><?php if(isset($coustomer->gift_note)){ echo $coustomer->gift_note; } ?></div>
				</div><div class="col-md-1">
				</div>	<br /><br />
			</div>	
				
			
			<div class="row" style="margin-left:10px;">	
				<div class="col-md-1">
				</div>	
				<div class="col-md-10">
					<div class="col-md-1"></div>
					<div class="col-md-3 viewOrdertext"><b>Customer Field 1 :</b></div>
					<div class="col-md-6 viewOrdertext textColor"><?php if(isset($coustomer->customer_field_1)){ echo $coustomer->customer_field_1; } ?></div>
				</div><div class="col-md-1">
				</div>	<br /><br />	
			</div>	
				
			<div class="row" style="margin-left:10px;">	
				<div class="col-md-1">
				</div>	
				<div class="col-md-10">	
					<div class="col-md-1"></div>
					<div class="col-md-3 viewOrdertext"><b>Customer Field 2 :</b></div>
					<div class="col-md-6 viewOrdertext textColor"><?php if(isset($coustomer->customer_field_2)){ echo $coustomer->customer_field_2; } ?></div>
				</div><div class="col-md-1"></div>	
			</div>
			
		</div> 
	</div>
</div>
<style>
.viewOrdertext{
	font-size: 14px;
}
.ruler{
	border-color:black;
}
.textColor{
	color:#6DADBD;
}

</style>