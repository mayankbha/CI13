<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container-fluid" >
	<div class="row">		
		<div style="background-color:#F9F9F9;height:575px;">
			<div style="float:right;">
				<img src="<?php echo base_url('assets/img/alipay.png');?>" width="250px" style="padding-top:34px;padding-right: 15px;">
			</div><br /><br /><br /><br /><br /><br /><br /><br />
			<div style="background-color: #dff0d8;border-color: #d6e9c6;color: #3c763d; border-radius: 4px; margin-bottom: 20px;padding: 15px;margin-left: 15px; margin-right: 15px;">
				<i class="icon-ok-sign"></i> <span style="font-family:Raleway;color: #3c763d;"><?php echo $this->lang->line('account_verfication_emailT'); ?> !!<span>
			</div>
			<div style="border:1px solid #D9D9D9;height:350px;margin-left: 15px; margin-right: 15px;">
				<h3 style="margin-top: 25px;padding-left: 35px;font-family:Raleway;color:black;">
					<?php echo $this->lang->line('Hello'); ?> <?php echo $this->session->userdata('user_session')['firstname']; ?> <?php echo $this->session->userdata('user_session')['lastname']; ?>,
				</h3><br />
				<span style="margin-top: 35px;margin-left: 30px;font-family:Raleway;font-size:16px;color:black;">
					<?php echo $this->lang->line('Alipay_succes_emailT'); ?>
				</span><br /><br /><br /><br />
			
				<span style="margin-top: 35px;margin-left: 30px;font-family:Raleway;font-size:16px;color:black;">
					<?php echo $this->lang->line('Thanks'); ?>
				</span><br />
				<span style="margin-top: 35px;margin-left: 30px;font-family:Raleway;font-size:16px;color:black;">
					Hubway Team
				</span><br />
				<span style="margin-top: 35px;margin-left: 30px;font-family:Raleway;font-size:16px;color:black;">
					<a href="#">www.hubway.com<a/>
				</span><br />
				<span style="margin-top: 35px;margin-left: 30px;font-family:Raleway;font-size:16px;color:black;">
					0000 ABC Address, Warminster, PA, United States
				</span><br />
				<span style="margin-top: 35px;margin-left: 30px;font-family:Raleway;font-size:16px;color:black;">
					Ready to get your Shipping Ph?<a href="#">Hubway.com<a/>
				</span><br />
			</div>	
		</div>
		
	</div>
</div>

</body>
</html>
