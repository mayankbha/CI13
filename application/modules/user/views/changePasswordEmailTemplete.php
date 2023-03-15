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
		<div style="background-color:#F9F9F9;height:500px;">
			<div align="center">
				<img src="<?php echo base_url('assets/img/logo.png');?>" width="250px" style="padding-top:34px;padding-right: 15px;">
			</div><br />
			
			<div style="height:350px;margin-left: 15px; margin-right: 15px;">
				<h3 style="margin-top: 25px;padding-left: 35px;font-family:Raleway;color:black;">
					<?php echo $this->lang->line('Hello'); ?>
				</h3><br />
				
				<span style="margin-top: 35px;margin-left: 30px;font-family:Raleway;font-size:16px;color:black;">
					<?php echo $this->lang->line('Createnewpasswordmsg'); ?>
				</span><br /><br />
			
				<span style="margin-top: 35px;margin-left: 268px;">
					<a href="<?php echo $change_password_url; ?>" style="background-color: #5cb85c;border-color: #4cae4c;color: #fff; -moz-user-select: none;background-image: none;border: 1px solid transparent;border-radius: 4px;cursor: pointer;display: inline-block;font-size: 17px;font-weight: 400;line-height: 1.42857;margin-bottom: 0;padding: 10px 42px;text-align: center;touch-action: manipulation;vertical-align: middle;white-space: nowrap;font-family:Raleway;text-decoration: none;"><?php echo $this->lang->line('create_password_forget_passord'); ?></a>
			
				</span><br /><br />
			
				<span style="margin-top: 35px;margin-left: 30px;font-family:Raleway;font-size:16px;color:black;">
					<?php echo $this->lang->line('new_password_from_now_onwardsmsg'); ?><br />
					<span style="margin-left: 30px;"><?php echo $this->lang->line('This_link_will_expire_in_24_hours'); ?><span>
				</span><br /><br />
				
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
					Ready to get your Shipping Ph? <a href="#">Hubway.com<a/>
				</span><br />
			</div>		
		</div>
		
	</div>
</div>

</body>
</html>
