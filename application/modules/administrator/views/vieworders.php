<?php print_r($orders);?>
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
						<img src="<?php echo base_url('assets/img/amazontitle.png');?>" width="100" />
					</div>
				</div>
			</div>	
			<div class="col-md-5" style="margin-left: -39px;">	
				<div class="widget-header">
					<div class="pull-left">
						<h5>
							<p class="invoice-nr"><strong>Order # :</strong> 111-9055921-4595222 &nbsp;&nbsp;&nbsp;&nbsp;<a href=""><i class="icon-pencil" ></i></a>
							</p>
								
							<p class="invoice-nr"><strong>Status :</strong> Shipped</p>
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
						<div class="col-md-3 col-md-offset-1 viewOrdertext"><b>Order Date:</b></div>
						<div class="col-md-2 viewOrdertext">5/11/17</div>
						<div class="col-md-3 viewOrdertext"><b>Product Total:</b></div>
						<div class="col-md-2 viewOrdertext">$13.88</div>
					</div><br /><br />
					
					<div class="col-md-12">
						<div class="col-md-3 col-md-offset-1 viewOrdertext"><b>Paid Date :</b></div>
						<div class="col-md-2 viewOrdertext">5/11/17</div>
						<div class="col-md-3 viewOrdertext"><b>Shipping Paid:</b></div>
						<div class="col-md-2 viewOrdertext">$0.00</div>
					</div><br /><br />
					
					<div class="col-md-12">
						<div class="col-md-3 col-md-offset-1 viewOrdertext"><b>Hold Untll :</b></div>
						<div class="col-md-2 viewOrdertext"><input type="text" name="holduntll" class="form-control datepicker"/></div>
						<div class="col-md-3 viewOrdertext"><b>Tax Paid:</b></div>
						<div class="col-md-2 viewOrdertext">$0.00</div>
					</div>
					
					<div class="col-md-6 col-md-offset-6">
						<hr class="ruler" style="margin-top:12px;margin-bottom: 12px;"/>
					</div>
					
					<div class="col-md-12">
						<div class="col-md-3 col-md-offset-1 viewOrdertext"><b>Ship Date:</b></div>
						<div class="col-md-2 viewOrdertext">5/12/17</div>
						<div class="col-md-3 viewOrdertext"><b>Total Order:</b></div>
						<div class="col-md-2 viewOrdertext">$13.88</div>
					</div><br />
					
					<div class="col-md-6 col-md-offset-6">
						<hr class="ruler" style="margin-top:12px;margin-bottom: 12px;"/>
					</div>
					
					<div class="col-md-12">
						<div class="col-md-3 col-md-offset-1 viewOrdertext"><b></b></div>
						<div class="col-md-2 viewOrdertext"></div>
						<div class="col-md-3 viewOrdertext"><b>Total Paid:</b></div>
						<div class="col-md-2 viewOrdertext">$13.88</div>
					</div><br /><br /><br />
				</div>
				
				<div class="col-md-5">
					<h3 class="block padding-bottom-10px title_bar">Buyer / Recipient Info</h3><br />
				
					<div class="col-md-12" style="padding-bottom:30px;">
						<div class="col-md-3 col-md-offset-1 viewOrdertext"><b>Sold To :</b></div>
						<div class="col-md-5 viewOrdertext">CD Light<br />
						230 N Tranquil Path Dr<br />
						The Woodlands, TX 77380</div>
						
						<div class="col-md-2  viewOrdertext"></div>
					</div>
					<br /><br /><br />
					<div class="col-md-12"  >
						<div class="col-md-3 col-md-offset-1 viewOrdertext"><b>Ship To :</b></div>
						<div class="col-md-5 viewOrdertext">CD Light<br />
						230 N Tranquil Path Dr<br />
						The Woodlands, TX 77380</div>
						
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
					<div class="col-md-1 viewOrdertext"><b>Units $</b></div>
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
			
			
			
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="col-md-2">
						<img src="<?php echo base_url('assets/img/test.jpg');?>" width="100"/>
					</div>
					<div class="col-md-4 viewOrdertext">
						<span class="textColor">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </span><br />
						<span>SKU:10061FBA</span>
					</div>
					<div class="col-md-1 viewOrdertext">$13.88</div>
					<div class="col-md-1 viewOrdertext"><b>1</b></div>
					<div class="col-md-2 viewOrdertext">
						Total Stock&nbsp;&nbsp;2
						Avaliable&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2
					</div>
					<div class="col-md-1 viewOrdertext">$13.88</div>
				</div>
				<div class="col-md-1"></div>
			</div>
			
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
					<div class="col-md-6 viewOrdertext textColor" >None</div>
				</div><div class="col-md-1"></div>	<br /><br />
			</div>	
				
			<div class="row">	
				<div class="col-md-1">
				</div>	
				<div class="col-md-10">
					<div class="col-md-1"></div>
					<div class="col-md-3 viewOrdertext"><b>To Buyer :</b></div>
					<div class="col-md-6 viewOrdertext textColor">None</div>
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
					<div class="col-md-6 viewOrdertext textColor">None</div>
					
				</div><div class="col-md-1">
				</div>	<br /><br />
			</div>	
				
			<div class="row">	
				<div class="col-md-1">
				</div>	
				<div class="col-md-10">
					<div class="col-md-1"></div>
					<div class="col-md-3 viewOrdertext"><b><input type="checkbox" name="checkbox" class="uniform"/>This is gift :</b></div>
					<div class="col-md-6 viewOrdertext textColor">No Gift Message</div>
				</div><div class="col-md-1">
				</div>	<br /><br />
			</div>	
				
			
			<div class="row" style="margin-left:10px;">	
				<div class="col-md-1">
				</div>	
				<div class="col-md-10">
					<div class="col-md-1"></div>
					<div class="col-md-3 viewOrdertext"><b>Customer Field 1 :</b></div>
					<div class="col-md-6 viewOrdertext textColor">None</div>
				</div><div class="col-md-1">
				</div>	<br /><br />	
			</div>	
				
			<div class="row" style="margin-left:10px;">	
				<div class="col-md-1">
				</div>	
				<div class="col-md-10">	
					<div class="col-md-1"></div>
					<div class="col-md-3 viewOrdertext"><b>Customer Field 2 :</b></div>
					<div class="col-md-6 viewOrdertext textColor">None</div>
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