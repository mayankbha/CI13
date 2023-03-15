

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
							<a href="<?php echo base_url('financial/FinancialController/financialDetail'); ?>" title="">Track Shipment</a>
						</li>
					</ul>
				</div>  
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<!-- /Page Header -->
				<div class="row">
					<div class="col-md-12 page-header">
						<div class="page-title">
							<h3>Track Shipment</h3>
							<h5>View Track Shipment</h5>
						</div>
					</div>		
				</div>
			
				<div class="row" >
       
					<div class="col-md-3"></div>
					<div class="col-md-6"><div class="alert alert-success text-center">
							<a href="<?php echo base_url('shipping/Shipping/view_shipment'); ?>"><strong>To !</strong> change the number of boxes,please go back to the previous page</a>
						</div></div>
					<div class="col-md-3"></div><br />
				</div>	
				
				<div class="row" >
					<div class="col-md-2"></div>
					<div class="col-md-1">#</div>
					<div class="col-md-3">Tracking#</div>
					<div class="col-md-3"></div>
					<div class="col-md-3"></div>
                </div>

				<div class="row">
					<div class="col-md-12">
						<hr />
                    </div>
                </div>
					<?php if(isset($tracking_shipment)){ ?>
					<?php foreach($tracking_shipment as $key=> $tracking) { ?>
					<div class="row">
						<form  method="POST" >
							<div class="col-md-2"></div>
							<div class="col-md-1">1</div>
							<div class="col-md-3">
								<input type="hidden" name="shipment_id" value="<?php  echo $tracking->shipment_id; ?>" class="form-control">
								<input type="text" readonly name="tracking" class="form-control" value="<?php  echo $tracking->tracking_number; ?>"  placeholder="Enter tracking number" >
							</div>
							<div class="col-md-3">
								<select class="form-control" readonly name="carrier" >
									<option value="UPS" <?php if($tracking->carrier=='UPS'){ echo 'selected';} ?> ><a href="https://www.ups.com/WebTracking/track?loc=en_gb" target="_blank" >UPS </a></option>
									<option value="USPS" <?php if($tracking->carrier=='USPS'){ echo 'selected';} ?>><a href="https://www.aftership.com/en/courier/usps" target="_blank" > USPS  </a></option>
									<option value="FEDEX" <?php if($tracking->carrier=='FEDEX'){ echo 'selected';} ?>> <a href="http://www.fedex.com/us/fedextracking/" target="_blank" >FEDEX  </a></option>
								</select>
							</div>
							<div class="col-md-3">
								<a  target="_blank"  href="<?php if($tracking->carrier=='UPS'){ echo 'https://www.ups.com/WebTracking/track?loc=en_gb';} if($tracking->carrier=='FEDEX'){ echo 'http://www.fedex.com/us/fedextracking/';}   if($tracking->carrier=='USPS'){ echo 'https://www.aftership.com/en/courier/usps';} ?>" class="btn btn-primary btntrackShipment">Track Shipment</a>
							</div>
							<div class="col-md-1">
							</div>
						</form>	
					</div>
					</br>
					<?php }	?>
					<?php }	?>
					<div class="row" >
						<form  method="POST" id="trackform1" >
							<div class="col-md-2"></div>
							<div class="col-md-1">1</div>
							<div class="col-md-3">
								<input type="hidden" name="shipment_id" value="<?php  echo $shipment_id; ?>" class="form-control">
								<input type="text" name="tracking" class="form-control" placeholder="Enter tracking number" required>
							</div>
							<div class="col-md-3">
								<select class="form-control" name="carrier" >
									<option value="UPS" ><a href="https://www.ups.com/WebTracking/track?loc=en_gb" target="_blank" >UPS </a></option>
									<option value="USPS"><a href="https://www.aftership.com/en/courier/usps" target="_blank" > USPS  </a></option>
									<option value="FEDEX"> <a href="http://www.fedex.com/us/fedextracking/" target="_blank" >FEDEX  </a></option>
								</select>
							</div>
							<div class="col-md-3">
								<input type="submit" class="btn btn-primary btntrackShipment" value="Track Shipment ">
							</div>
							<div class="col-md-1">
								<a href="#" id="removeDiv">Remove</a>
							</div>
						</form>	
					</div>
					</br>
					<div class="row" >
						<form  method="POST" id="trackform2" >
							<div class="col-md-2"></div>
							<div class="col-md-1">2</div>
							<div class="col-md-3">
								<input type="hidden" name="shipment_id" value="<?php  echo $shipment_id; ?>" class="form-control">
								<input type="text" name="tracking" class="form-control" placeholder="Enter tracking number" required>
							</div>
							<div class="col-md-3">
								<select class="form-control" name="carrier">
									<option value="UPS" ><a href="https://www.ups.com/WebTracking/track?loc=en_gb" target="_blank" >UPS </a></option>
									<option value="USPS"><a href="https://www.aftership.com/en/courier/usps" target="_blank" > USPS  </a></option>
									<option value="FEDEX"> <a href="http://www.fedex.com/us/fedextracking/" target="_blank" >FEDEX  </a></option>
								</select>
							</div>
							<div class="col-md-3">
								<input type="submit" class="btn btn-primary btntrackShipment" value="Track Shipment ">
							</div>
							<div class="col-md-1">
								<a href="#" id="removeDiv">Remove</a>
							</div>
						</form>	
					</div>
					</br>
					<div class="row" >
						<form  method="POST" id="trackform3">
							<div class="col-md-2"></div>
							<div class="col-md-1">3</div>
							<div class="col-md-3">
								<input type="hidden" name="shipment_id" value="<?php  echo $shipment_id; ?>" class="form-control" >
								<input type="text" name="tracking" class="form-control" placeholder="Enter tracking number" required>
							</div>
							<div class="col-md-3">
								<select class="form-control"name="carrier">
									<option value="UPS" ><a href="https://www.ups.com/WebTracking/track?loc=en_gb" target="_blank" >UPS </a></option>
									<option value="USPS"><a href="https://www.aftership.com/en/courier/usps" target="_blank" > USPS  </a></option>
									<option value="FEDEX"> <a href="http://www.fedex.com/us/fedextracking/" target="_blank" >FEDEX  </a></option>
								</select>
							</div>
							<div class="col-md-3">
								<input type="submit" class="btn btn-primary btntrackShipment" value="Track Shipment ">
							</div>
							<div class="col-md-1">
								<a href="#" id="removeDiv">Remove</a>
							</div>
						</form>	
					</div>
					</br>
					<div class="row" >
						<form  method="POST" id="trackform4" >
							<div class="col-md-2"></div>
							<div class="col-md-1">4</div>
							<div class="col-md-3">
								<input type="hidden" name="shipment_id" value="<?php  echo $shipment_id; ?>" class="form-control" >
								<input type="text" name="tracking" class="form-control" placeholder="Enter tracking number" required>
							</div>
							<div class="col-md-3">
								<select class="form-control" name="carrier">
									<option value="UPS" ><a href="https://www.ups.com/WebTracking/track?loc=en_gb" target="_blank" >UPS </a></option>
									<option value="USPS"><a href="https://www.aftership.com/en/courier/usps" target="_blank" > USPS  </a></option>
									<option value="FEDEX"> <a href="http://www.fedex.com/us/fedextracking/" target="_blank" >FEDEX  </a></option>
								</select>
							</div>
							<div class="col-md-3">
								<input type="submit" class="btn btn-primary btntrackShipment" value="Track Shipment ">
							</div>
							<div class="col-md-1">
								<a href="#" id="removeDiv">Remove</a>
							</div>
						</form>	
					</div>
					</br>
					<div class="row" >
						<form  method="POST" id="trackform5" >
							<div class="col-md-2"></div>
							<div class="col-md-1">5</div>
							<div class="col-md-3">
								<input type="hidden" name="shipment_id" value="<?php  echo $shipment_id; ?>" class="form-control">
								<input type="text" name="tracking" class="form-control" placeholder="Enter tracking number" required>
							</div>
							<div class="col-md-3">
								<select class="form-control" name="carrier">
									<option value="UPS" ><a href="https://www.ups.com/WebTracking/track?loc=en_gb" target="_blank" >UPS </a></option>
									<option value="USPS"><a href="https://www.aftership.com/en/courier/usps" target="_blank" > USPS  </a></option>
									<option value="FEDEX"> <a href="http://www.fedex.com/us/fedextracking/" target="_blank" >FEDEX  </a></option>
								</select>
							</div>
							<div class="col-md-3">
								<input type="submit" class="btn btn-primary btntrackShipment" value="Track Shipment ">
							</div>
							<div class="col-md-1">
								<a href="#" id="removeDiv">Remove</a>
							</div>
						</form>		
					</div>
					</br>
			</div>
				

				
		</div>
			<!-- /.container -->
		</div>
		<!-- Trigger the modal with a button -->
	</div>
	<hr />
				</br>
				</br>
				</br>
				</br>
				<p></p>
<style>
#removeDiv {
	display:none;
}


</style>
<script>
	$(document).ready(function(){ 
		$("#addMore").click(function () {
			$('#removeDiv').show();
			$("#showDivTracking:first").clone().appendTo("#form"); 
		});
		
	});
	
	$(document).ready(function(){
		$("#removeDiv").click(function () {
			$("#showDivTracking").hide(); 
		});
	});

	$('#trackform1').submit(function(event) { 
		
		$.ajax({
			type: 'POST',
			url: base_url+'trackingshipment/Trackingshipment/changeStatus',
			data : $('#trackform1').serialize(),
			success: function(res) {
				if(res=='UPS'){
					var url =  'https://www.ups.com/WebTracking/track?loc=en_gb';
					window.open(url,'_blank');
				}else if(res=='USPS'){
					var url =  'https://www.aftership.com/en/courier/usps';
					window.open(url,'_blank');
				}else if(res=='FEDEX'){
					var url = 'http://www.fedex.com/us/fedextracking/';
					window.open(url,'_blank');
				}
				
			}
		});
		event.preventDefault();
	});
	
	$('#trackform2').submit(function(event) { 
		
		$.ajax({
			type: 'POST',
			url: base_url+'trackingshipment/Trackingshipment/changeStatus',
			data : $('#trackform2').serialize(),
			success: function(res) {
				if(res=='UPS'){
					var url =  'https://www.ups.com/WebTracking/track?loc=en_gb';
					window.open(url,'_blank');
				}else if(res=='USPS'){
					var url =  'https://www.aftership.com/en/courier/usps';
					window.open(url,'_blank');
				}else if(res=='FEDEX'){
					var url = 'http://www.fedex.com/us/fedextracking/';
					window.open(url,'_blank');
				}
				
			}
		});
		event.preventDefault();
	});
	$('#trackform3').submit(function(event) { 
		
		$.ajax({
			type: 'POST',
			url: base_url+'trackingshipment/Trackingshipment/changeStatus',
			data : $('#trackform3').serialize(),
			success: function(res) {
				if(res=='UPS'){
					var url =  'https://www.ups.com/WebTracking/track?loc=en_gb';
					window.open(url,'_blank');
				}else if(res=='USPS'){
					var url =  'https://www.aftership.com/en/courier/usps';
					window.open(url,'_blank');
				}else if(res=='FEDEX'){
					var url = 'http://www.fedex.com/us/fedextracking/';
					window.open(url,'_blank');
				}
				
			}
		});
		event.preventDefault();
	});
	$('#trackform4').submit(function(event) { 
		
		$.ajax({
			type: 'POST',
			url: base_url+'trackingshipment/Trackingshipment/changeStatus',
			data : $('#trackform4').serialize(),
			success: function(res) {
				if(res=='UPS'){
					var url =  'https://www.ups.com/WebTracking/track?loc=en_gb';
					window.open(url,'_blank');
				}else if(res=='USPS'){
					var url =  'https://www.aftership.com/en/courier/usps';
					window.open(url,'_blank');
				}else if(res=='FEDEX'){
					var url = 'http://www.fedex.com/us/fedextracking/';
					window.open(url,'_blank');
				}
				
			}
		});
		event.preventDefault();
	});
	$('#trackform5').submit(function(event) { 
		
		$.ajax({
			type: 'POST',
			url: base_url+'trackingshipment/Trackingshipment/changeStatus',
			data : $('#trackform5').serialize(),
			success: function(res) {
				if(res=='UPS'){
					var url =  'https://www.ups.com/WebTracking/track?loc=en_gb';
					window.open(url,'_blank');
				}else if(res=='USPS'){
					var url =  'https://www.aftership.com/en/courier/usps';
					window.open(url,'_blank');
				}else if(res=='FEDEX'){
					var url = 'http://www.fedex.com/us/fedextracking/';
					window.open(url,'_blank');
				}
				
			}
		});
		event.preventDefault();
	});
			
</script>
	