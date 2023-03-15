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
		<div style="height:700px;">
			<div align="center">
					<img src="<?php echo base_url('assets/img/logo.png');?>" width="250px" style="padding-top:34px;padding-right: 15px;">
			</div>
			
			
			<div style="height:763px;margin-left: 15px; margin-right: 15px;background-color:#F0F0F0;">
				<div style="border:1px solid #6A737B;height: 93px;background-color:#4D7496;">	
					<h1 style="margin-top: 25px;font-family:Raleway;color:white;" align="center">
						<?php //echo $this->lang->line('WELCOME_ABOARD'); ?>Issue # <?php echo $HUB; ?>
					</h1>
					<span style="color:white;font-family:Raleway;font-size:12px;padding-left:162px;" align="center">
						
						<?php //echo //$this->lang->line('WELCOME_Thanks_Business'); ?>
					</span>
				</div>
				
				<br /><br />
				<span style="margin-top: 35px;margin-left: 30px;font-family:Raleway;font-size:20px;color:black;">
					<?php //echo //$this->lang->line('WELCOME_Before_Starting'); ?>
					<div style="margin-top: 0px;margin-left: 32px;font-family:Raleway;font-size:16px;color:black;">Hello Admin ,</div>
					<div style="margin-top: 9px;margin-left: 32px;font-family:Raleway;font-size:16px;color:black;">
						<?php echo $this->session->userdata("user_session")["firstname"]; ?> <?php echo $this->session->userdata("user_session")["lastname"]; ?> has been reopened the Case #<?php echo $HUB; ?>
					</div>
					<div style="margin-top: 9px;margin-left: 32px;font-family:Raleway;font-size:16px;color:black;">
						<a href="<?php echo base_url('administrator');?>">Please Login</a> Hubway to View
					</div>
					
				</span><br /><br />
			
				<div >
					<div style="padding-left:99px;">	
						
						<?php //if($this->session->userdata('site_lang') && $this->session->userdata('site_lang') == "chinese"){ ?>
							<img src="<?php //echo base_url('assets/img/email_logo_chinese.png'); ?>" width="650"/>
						<?php //	} else { ?>
							<img src="<?php //echo base_url('assets/img/email_logo_english.png'); ?>" width="650"/>
						<?php //} ?>
					</div>
				</div>
				
				<span style="margin-top: 35px;margin-left: 30px;font-family:Raleway;font-size:16px;color:black;">
					<?php echo $this->lang->line('Thanks'); ?>,
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
