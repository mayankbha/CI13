
<?php 
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);
$segments = explode('/', rtrim($path, '/'));

?>

	<!-- Change password Box -->
	<div class="box">
		<div class="content">
			<!-- Change password -->
			<form class="form-vertical login-form" action="<?php echo base_url('user/LogedController/update_change_password/'.end($segments));?>" method="post">
				<!-- Title -->
				<h3 class="form-title"><?php echo $this->lang->line('Change_Password'); ?></h3>

				<!-- Error Message -->
				<div class="alert fade in alert-danger" style="display: none;">
					<i class="icon-remove close" data-dismiss="alert"></i>
					<?php echo $this->lang->line('Enter_your_password'); ?>
				</div>

				<!-- Input Fields -->
				<div class="form-group">
					<!--<label for="username">Username:</label>-->
					<div class="input-icon">
						<i class="icon-lock"></i>
						<input type="password" name="password" id="register_password" class="form-control" placeholder="<?php echo $this->lang->line('Password_Heading'); ?>" autofocus="autofocus" data-rule-required="true" data-msg-required="Please enter your password." />
					</div>
				</div>
				
				<div class="form-group">
					<!--<label for="password">Password:</label>-->
					<div class="input-icon">
						<i class="icon-lock"></i>
						<input type="password" name="password_confirm" class="form-control" placeholder="<?php echo $this->lang->line('Confirm_Password_Heading'); ?>" data-rule-required="true" data-rule-equalTo="#register_password" data-msg-required="Please enter your confirm password." />
					</div>
				</div>
				<!-- /Input Fields -->

				<!-- Form Actions -->
				<div class="form-actions">
					<button type="submit" class="submit btn btn-primary pull-right">
						<?php echo $this->lang->line('Submit'); ?> <i class="icon-angle-right"></i>
					</button>
				</div>
			</form>
			<!-- /Change password -->
		</div> <!-- /.content -->
	</div>


