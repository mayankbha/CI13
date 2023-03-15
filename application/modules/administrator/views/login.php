
<!-- Login Box -->
<div class="box">
	<div class="content">
	
		<!-- Login Formular -->
		<form class="form-vertical login-form" action="<?php echo base_url('administrator/index/adminLogin'); ?>" method="post">
			<!-- Title -->
			<h3 class="form-title"><?php echo $this->lang->line('Sign_In_Title'); ?></h3>

			<!-- Error Message -->
			<div class="alert fade in alert-danger" style="display: none;">
				<i class="icon-remove close" data-dismiss="alert"></i>
				<?php echo $this->lang->line('Username_Password_Error'); ?>
			</div>
			
			<!-- email and password Message -->
			<?php if($this->session->flashdata("email_password_check")){?>
				<div class="alert fade in alert-danger" id="success_signup_Message">      
					<?php echo $this->session->flashdata("email_password_check")?>
				</div>
			<?php } ?>
			
			<!-- Password Message -->
			<?php if($this->session->flashdata("password_check")){?>
				<div class="alert fade in alert-danger" id="success_signup_Message">      
					<?php echo $this->session->flashdata("password_check")?>
				</div>
			<?php } ?>
			   
			<!-- Password Message -->
			<?php if($this->session->flashdata("user_token_message")){?>
				<div class="alert alert-success" id="success_signup_Message">      
					<?php echo $this->session->flashdata("user_token_message")?>
				</div>
			<?php } ?>
			
			<!-- Input Fields -->
			<div class="form-group">
				<!--<label for="username">Username:</label>-->
				<div class="input-icon">
					<i class="icon-user"></i>
					<input type="text" name="email" class="form-control" placeholder="<?php echo $this->lang->line('Email_Heading'); ?>" autofocus="autofocus" data-rule-required="true" data-rule-email="true data-msg-required="<?php echo $this->lang->line('Required_Email_Validation'); ?>" />
				</div>
			</div>
			
			<div class="form-group">
				<!--<label for="password">Password:</label>-->
				<div class="input-icon">
					<i class="icon-lock"></i>
					<input type="password" name="password" class="form-control" placeholder="<?php echo $this->lang->line('Password_Heading'); ?>" data-rule-required="true" data-msg-required="<?php echo $this->lang->line('Required_Field_Validation_Message'); ?>" />
				</div>
			</div>
			<!-- /Input Fields -->

			<!-- Form Actions -->
			<div class="form-actions">
				<label class="checkbox pull-left"><input type="checkbox" class="" name="remember"><?php echo $this->lang->line('Remember_Me'); ?></label>
				<button type="submit" class="submit btn btn-primary pull-right">
					<?php echo $this->lang->line('Sign_In_Heading'); ?> <i class="icon-angle-right"></i>
				</button>
			</div>
		</form>
		<!-- /Login Formular -->
	</div> <!-- /.content -->
</div>
<!-- /Login Box -->


