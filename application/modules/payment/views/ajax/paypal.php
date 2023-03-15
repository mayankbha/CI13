

<?php if(isset($this->data['paypalInfoHtml']) && !empty($this->data['paypalInfoHtml'])) { ?>
	<form class="form-horizontal row-border" id="validate-1" action="#">
		<div class="form-group">
			<div class="col-md-6">
				<div class="alert alert-success fade in">
					<i class="icon-remove close" data-dismiss="alert"></i>
					<?php echo $this->lang->line('Payment_Account_Linked_Message'); ?>
				</div><br />
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-4"><?php echo $this->lang->line('Payment_First_Name'); ?></label>
			<div class="col-md-8">
				<label><?php echo $this->data['paypalInfoHtml']->first_name; ?></label>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4"><?php echo $this->lang->line('Payment_Last_Name'); ?></label>
			<div class="col-md-8">
				<label><?php echo $this->data['paypalInfoHtml']->last_name; ?></label>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 "><?php echo $this->lang->line('Payment_Card_Type'); ?></label>
			<div class="col-md-8">
				<?php if($this->data['paypalInfoHtml']->card_type == 'visa') { ?>
					<img src='<?php echo base_url(); ?>assets/img/visa.png' width="50" />
				<?php } else if($this->data['paypalInfoHtml']->card_type == 'mastercard') { ?>
					<img src='<?php echo base_url(); ?>assets/img/mastercard.png' width="50" />
				<?php } else if($this->data['paypalInfoHtml']->card_type == 'discover') { ?>
					<img src='<?php echo base_url(); ?>assets/img/discover.png' width="50" />
				<?php } else if($this->data['paypalInfoHtml']->card_type == 'amex') { ?>
					<img src='<?php echo base_url(); ?>assets/img/american_express.png' width="50" />
				<?php } else if($this->data['paypalInfoHtml']->card_type == 'jcb') { ?>
					<img src='<?php echo base_url(); ?>assets/img/jcb.png' width="50" />
				<?php } else if($this->data['paypalInfoHtml']->card_type == 'maestro') { ?>
					<img src='<?php echo base_url(); ?>assets/img/maestro.png' width="50" />
				<?php }?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4"><?php echo $this->lang->line('Payment_Card_Number'); ?></label>
			<div class="col-md-8">
				<label><?php echo $this->data['paypalInfoHtml']->card_number; ?></label>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-10">
			</div>
			<div class="col-md-2">
				<input type="button" value="<?php echo $this->lang->line('Payment_Delete_Account'); ?>" data-toggle="modal" class="btn btn-primary pull-right" onclick="showDeletePopup('paypal', 'id', <?php echo $this->data['paypalInfoHtml']->id; ?>);" />
			</div>
		</div>	
	</form>
<?php } else { ?>						
	<form class="form-horizontal row-border" id="validate-paypal-form" action="<?php echo base_url(); ?>payment/paypal" method="post">
		<!-- Error Message -->
		<div class="alert fade in alert-danger" style="display: none;">
			<i class="icon-remove close" data-dismiss="alert"></i>
			<?php echo $this->lang->line('Username_Password_Error'); ?>
		</div>

		<div class="form-group" style="border:0px;">
			<label class="col-md-4" style="padding-top:10px;"><?php echo $this->lang->line('Payment_Card_Type_View'); ?></label>
			<div class="col-md-8">
				<img src="<?php echo base_url(); ?>assets/img/credit-cards.png" width="300px"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4"><?php echo $this->lang->line('Payment_First_Name'); ?> <span class="required">*</span></label>
			<div class="col-md-8">
				<input type="text" name="PaypalCreditCardInfo[firstname]" id="paypal_firstname" class="form-control required" placeholder="<?php echo $this->lang->line('Payment_First_Name'); ?>" value="<?php echo $this->session->flashdata('paypal_firstname'); ?>"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4"><?php echo $this->lang->line('Payment_Last_Name'); ?><span class="required">*</span></label>
			<div class="col-md-8">
				<input type="text" name="PaypalCreditCardInfo[lastname]" id="paypal_lastname" class="form-control required" placeholder="<?php echo $this->lang->line('Payment_Last_Name'); ?>" value="<?php echo $this->session->flashdata('paypal_lastname'); ?>"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 "><?php echo $this->lang->line('Payment_Card_Type'); ?> <span class="required">*</span></label>
			<div class="col-md-8">
				<div class="input-icon">
					<i class="icon-credit-card"></i>
					<select name="PaypalCreditCardInfo[type]" id="paypal_credit_card_type" class="form-control required selectbox iconsetting">
					
						<option value="visa" <?php if($this->session->flashdata('paypal_credit_card_type') == 'visa'){ echo 'selected="selected"'; } ?>>VISA</option>
						<option value="mastercard" <?php if($this->session->flashdata('paypal_credit_card_type') == 'mastercard'){ echo 'selected="selected"'; } ?>>Master Card</option>
						<option value="amex" <?php if($this->session->flashdata('paypal_credit_card_type') == 'amex'){ echo 'selected="selected"'; } ?>>American Express</option>
						<option value="discover" <?php if($this->session->flashdata('paypal_credit_card_type') == 'discover'){ echo 'selected="selected"'; } ?>>Discover Network</option>
						<option value="maestro" <?php if($this->session->flashdata('paypal_credit_card_type') == 'maestro'){ echo 'selected="selected"'; } ?>>Maestor</option>
						<option value="jcb" <?php if($this->session->flashdata('paypal_credit_card_type') == 'jcb'){ echo 'selected="selected"'; } ?>>JCB Card</option>																			
					</select>
				</div>	
			</div> 
		</div>

		<div class="form-group">
			<label class="col-md-4"><?php echo $this->lang->line('Payment_Card_Number'); ?> <span class="required">*</span></label>
			<div class="col-md-8">
				<input type="text" name="PaypalCreditCardInfo[number]" id="paypal_cc_number" class="form-control required" placeholder="0000 0000 0000 0000" value="<?php echo $this->session->flashdata('paypal_cc_number'); ?>"/>
			</div>
		</div> 

		<div class="form-group">
			<label class="col-md-4"><?php echo $this->lang->line('Payment_Card_Expiration'); ?> <span class="required">*</span></label>
			<div class="col-md-4">
				<input type="text" name="PaypalCreditCardInfo[expirymonth]"  id="paypal_expiry_month" class="form-control required" data-mask="99" placeholder="<?php echo $this->lang->line('Payment_Month'); ?>" value="<?php echo $this->session->flashdata('paypal_expiry_month'); ?>" />
			</div>
			<div class="col-md-4">
				<input type="text" name="PaypalCreditCardInfo[expiryyear]" id="paypal_expiry_year" class="form-control required" data-mask="9999" placeholder="<?php echo $this->lang->line('Payment_Year'); ?>" value="<?php echo $this->session->flashdata('paypal_expiry_year'); ?>"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4"><?php echo $this->lang->line('Payment_CVV'); ?> <span class="required">*</span></label>
			<div class="col-md-8">
				<input type="text" name="PaypalCreditCardInfo[cvv]" id="paypal_cvv"  class="form-control required" data-mask="999" placeholder="<?php echo $this->lang->line('Payment_CVV'); ?>" value="<?php echo $this->session->flashdata('paypal_cvv'); ?>" />
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-md-10">
			</div> 
			<div class="col-md-2">
				<input type="submit" id="paypal_form_btn" value="<?php echo $this->lang->line('Payment_Validate_Me'); ?>" class="btn btn-primary pull-right" />
			</div>
		</div>	
	</form>
<?php } ?>

