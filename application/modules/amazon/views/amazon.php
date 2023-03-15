<style>
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #ffffff;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 45px;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 80px;}
  .sidenav a {font-size: 18px;}
}
.viewdetailsTicket {
    background-color: #4d7496;
    border: 1px solid gray;
    border-radius: 15px;
    color: white;
    margin-right: 43px;
    padding-top: 12px;
}

.amazondetails{
	font-size:16px;
	padding-bottom:12px;
}
</style>
<div id="mySidenav1" class="sidenav">
	<img src="<?php echo base_url('assets/img/awsapi.png');?>" style="margin-left:140px;padding-top:10px;" width="220" align="middle">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>
	<div style="padding-top: 32px;padding-left:30px;">
		<div class="amazondetails">
			1. Login Into Amazon MWS Account	
		</div>
		<div class="amazondetails">
			Go to https://developer.amazonservices.com	
		</div>
		<div class="amazondetails">
			Click on the "Sign up for MWS" button.
		</div>
		<div class="amazondetails">
			Log into your "Seller Central" Account
		</div>
		<div class="amazondetails">
			<img src="<?php echo base_url('assets/img/amazonsign.png');?>" width="250" />
		</div>

		<div class="amazondetails">
			2.	Create MWS Auth Token
		</div>
		<div class="amazondetails">
			Select the option "I want to give a developer access to my Amazon seller account with MWS." 
		</div>
		<div class="amazondetails">
			Amazon.com<br />
			Developer's Name: Hubway <br />
			Developer Account Number: 4142-8795-0552

		</div >
		<div class="amazondetails">
			<img src="<?php echo base_url('assets/img/mws.png');?>" width="386" />
		</div>
		<div class="amazondetails">
			Accept the terms and click next
		</div>
		<div class="amazondetails">
			<img src="<?php echo base_url('assets/img/atreams.png');?>" width="386" />
		</div>
		<div class="amazondetails">
			3.	Create MWS Auth Token
			You will be presented with the following screen after you click next
		</div>
		<div class="amazondetails">
			<img src="<?php echo base_url('assets/img/sellerid.png');?>" width="386" />
		</div>
		<div class="amazondetails">
			You will need to provide the Seller ID and the MWS Auth Token from the screenshot above.
		</div>
	</div> 	
</div>

<!--<div id="mySidenav2" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
	<div style="padding-top: 32px;padding-left:30px;">
		<div class="amazondetails">
			1. Login Into Amazon MWS Account	
		</div>
		<div class="amazondetails">
			Go to https://developer.amazonservices.com	
		</div>
		<div class="amazondetails">
			Click on the "Sign up for MWS" button.
		</div>
		<div class="amazondetails">
			Log into your "Seller Central" Account
		</div>
		<div class="amazondetails">
			<img src="<?php echo base_url('assets/img/amazonsign.png');?>" width="250" />
		</div>

		<div class="amazondetails">
			2.	Create MWS Auth Token
		</div>
		<div class="amazondetails">
			Select the option "I want to give a developer access to my Amazon seller account with MWS." 
		</div>
		<div class="amazondetails">
			Amazon.com
			Developer's Name: Hubway 
			Developer Account Number: 4142-8795-0552

		</div >
		<div class="amazondetails">
			<img src="<?php// echo base_url('assets/img/mws.png');?>" width="386" />
		</div>
		<div class="amazondetails">
			Accept the terms and click next
		</div>
		<div class="amazondetails">
			<img src="<?php //echo base_url('assets/img/atreams.png');?>" width="386" />
		</div>
		<div class="amazondetails">
			3.	Create MWS Auth Token
			You will be presented with the following screen after you click next
		</div>
		<div class="amazondetails">
			<img src="<?php //echo base_url('assets/img/sellerid.png');?>" width="386" />
		</div>
		<div class="amazondetails">
			You will need to provide the Seller ID and the MWS Auth Token from the screenshot above.
		</div>
	</div> 	
</div>-->
<?php //print_r($credentials); ?>
<?php //print_r($credentials); ?>
<?php if(empty($credentials)) { ?>
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
						<a href="<?php echo base_url('amazon/Amazon'); ?>" title=""><?php echo $this->lang->line('Amazon'); ?></a>
					</li>
				</ul>
			  
			</div>
			<div class="row row-bg" style="padding-top: 0 !important;height:0px;"> <!-- .row-bg -->
				<div class="col-sm-12 col-md-12"> 
					<div class="statbox widget setup_box" style="height: 0px;">
						<h2><?php echo $this->lang->line('AmozonAddress'); ?></h2>

						<h5><?php echo $this->lang->line('SetupAmozonlocation'); ?></h5>
					</div>
					<br /><br />
					<hr />
					<br />
					<div class="col-sm-12">
							
						<div class="col-md-4 col-md-offset-4 text-center">	
							<div class="alert alert-success successdiv" style="display: none;">
								<i class="icon-remove close" data-dismiss="alert"></i>
								<span class="success"> validate successfull.</span>
								
							</div>
							<div  class="alert alert-danger errordiv" style="display: none;">
								<i class="icon-remove close" data-dismiss="alert"></i>
								<span class="error"></span>
							</div>
						</div>
						
					</div>
						
					
						<form class="form-horizontal" id="validate-amazon-form" method="post">
						<div class="col-xs-5"></div>
							<div class="col-xs-7"><h3 class="block padding-bottom-10px title_bar">Validate your MWS Access Keys</h3></div>
							<div class="col-sm-4 col-md-4" style="padding-top: 77px;">
								<img src="<?php echo base_url(); ?>assets/img/amazon.png" width="450"/>
							</div>
							<div class="col-sm-1 col-md-1">
							</div>
							<div class="col-sm-3 col-md-3">
									<div class="form-group">
										<div class="col-md-12">
											<label class="control-label">
											MWS Access Key :</label><br /><br />
											<input type="text" name="access_key" class="form-control required" placeholder="Enter Access Key" value="<?php //echo $this->session->flashdata('shipstation_api_key');?>"required />
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-12">
											<label class="control-label">
												MWS Secret Key :
											</label><br /><br />
											<input type="text" name="secret_access_key"  class="form-control required" placeholder="Secret Key"  value="<?php //echo $this->session->flashdata('shipstation_api_key_screct');?>" required />
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-md-12"><br />
											<span style="font-size:13px;cursor:pointer;color:blue;text-decoration: underline;" onclick="openNav1()">Learn how to get these credentials</span>
										</div>
									</div>	
									
									<!--<div class="form-group">
										<div class="col-md-12">
											<label class="control-label">
												Application Name :</label><br /><br />
											<input type="text" name="application_name" class="form-control required" placeholder="Application Name"  value="<?php //echo $this->session->flashdata('shipstation_api_key_screct');?>" required/>
										</div>
									</div>-->
									
									<!--<div class="form-group">
										<div class="col-md-12">
											<label class="control-label">Product Advertising Access Key :</label><br /><br />
											<input type="text" name="marketplace_id"  class="form-control required" placeholder="Product Advertising Access Key"  value="<?php //echo $this->session->flashdata('shipstation_api_key_screct');?>"required />
										</div>
									</div>-->
							</div>
							<div class="col-sm-3 col-md-3">
								
									<!--<div class="form-group">
										<div class="col-md-12">
											<label class="control-label">Application Version :</label><br /><br />
											<input type="text" name="application_version"  class="form-control required" placeholder="Application Version" value="<?php //echo $this->session->flashdata('shipstation_api_key');?>" required/>
										</div>
									</div>-->

									<div class="form-group">
										<div class="col-md-12">
											<label class="control-label">Merchant ID :</label><br /><br />
											<input type="text" name="merchant_id"  class="form-control required" placeholder="Merchant ID"  value="<?php //echo $this->session->flashdata('shipstation_api_key_screct');?>" required/>
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-12">
											<label class="control-label">Market Place ID :</label><br /><br />
											<input type="text" name="marketplace_id"  class="form-control required" placeholder="Market Place ID"  value="<?php //echo $this->session->flashdata('shipstation_api_key_screct');?>"required />
										</div>
									</div>
									
									
									<!--<div class="form-group">
										<div class="col-md-12">
											<label class="control-label">Product Advertising Secret Key :</label><br /><br />
											<input type="text" name="marketplace_id"  class="form-control required" placeholder="Product Advertising Secret Key"  value="<?php //echo $this->session->flashdata('shipstation_api_key_screct');?>"required />
										</div>
									</div>-->

									<div class="form-group">
										<div class="col-md-9">
											
										</div>
										<div class="col-md-3">
											<input type="submit" id="submitamazon" value="<?php echo $this->lang->line('Shipstation_Submit_Button'); ?>" class="btn btn-primary" />
										</div>
									</div>	
							</div>
						</form>
						
							    
						
				</div> <!-- /.smallstat -->
			</div> <!-- /.col-md-12 -->
		</div> <!-- /.row -->
	</div> <!-- /.row -->
<?php } else {  ?>
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
						<a href="<?php echo base_url('amazon/Amazon'); ?>" title=""><?php echo $this->lang->line('Amazon'); ?></a>
					</li>
				</ul>
			</div>
			<div class="row row-bg" style="padding-top: 0 !important;height:0px;"> <!-- .row-bg -->
				<div class="col-sm-12 col-md-12">
					<div class="statbox widget setup_box" style="height: 0px;">
						<h2><?php echo $this->lang->line('AmozonAddress'); ?></h2>

						<h5><?php echo $this->lang->line('SetupAmozonlocation'); ?></h5>
					</div>
					<br /><br />
					<hr />
					<br />
					<div class="col-md-12">
							
						<div class="col-md-4 col-md-offset-4 text-center">	
							<div class="alert alert-success successdiv" style="display: none;">
								<i class="icon-remove close" data-dismiss="alert"></i>
								<span class="success"> validate successfull.</span>
								
							</div>
							<div  class="alert alert-danger errordiv" style="display: none;">
								<i class="icon-remove close" data-dismiss="alert"></i>
								<span class="error"></span>
							</div>
						</div>
						
					</div>
								
				
						<form class="form-horizontal" id="validate-amazon-form" method="post">
							<div class="col-xs-5"></div>
							<div class="col-xs-7"><h3 class="block padding-bottom-10px title_bar">Validate your MWS Access Keys</h3></div>
						
							<div class="col-sm-4 col-md-4" style="padding-top: 77px;">
								<img src="<?php echo base_url(); ?>assets/img/amazon.png" width="450"/>
							</div>
							<div class="col-sm-1 col-md-1">
							</div>
							<div class="col-sm-3 col-md-3">
									<div class="form-group">
										<div class="col-md-12">
											<label class="control-label">
											MWS Access Key :</label><br /><br />
											<input type="text" name="access_key"  readonly class="form-control required" placeholder="Enter Access Key" value="<?php echo $credentials->access_key; ?>"required />
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-12">
											<label class="control-label">
											MWS Secret Key :
											</label><br /><br />
											<input type="text" name="secret_access_key"  readonly class="form-control required" placeholder="Secret Key"  value="<?php echo $credentials->secret_access_key; ?>" required />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12"><br />
											<span style="font-size:13px;cursor:pointer;color:blue;text-decoration: underline;" onclick="openNav1()">Learn how to get these credentials</span>
										</div>
									</div>	
								
							</div>
							<div class="col-sm-3 col-md-3">
									<div class="form-group">
										<div class="col-md-12">
											<label class="control-label">Merchant ID :</label><br /><br />
											<input type="text"  readonly name="merchant_id"  class="form-control required" placeholder="Merchant ID"  value="<?php echo $credentials->merchant_id; ?>" required/>
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-12">
											<label class="control-label">Market Place ID :</label><br /><br />
											<input type="text"  readonly name="marketplace_id"  class="form-control required" placeholder="Market Place ID"  value="<?php echo $credentials->marketplace_id; ?>"required />
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-md-9">
											
										</div>
										<div class="col-md-3">
											<input type="button" value="<?php echo $this->lang->line('Payment_Delete_Account'); ?>" data-toggle="modal" class="btn btn-primary pull-right" onclick="showDeletePopup('config', 'id',<?php echo $credentials->id;  ?> );" />
										</div>
									</div>	

							</div>
						</form>
				</div> <!-- /.smallstat -->
			</div> <!-- /.col-md-12 -->
		</div> <!-- /.row -->
		
	</div>
<?php }  ?>
	
<script>
function openNav1() {
    document.getElementById("mySidenav1").style.width = "550px";
}

function closeNav1() {
    document.getElementById("mySidenav1").style.width = "0";
}

/*function openNav2() {
    document.getElementById("mySidenav2").style.width = "550px";
}

function closeNav2() {
    document.getElementById("mySidenav2").style.width = "0";
}*/
</script>