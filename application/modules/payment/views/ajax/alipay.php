<?php if(isset($this->data['alipayInfoHtml']) && !empty($this->data['alipayInfoHtml'])) { ?>
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
				<label><?php echo $this->data['alipayInfoHtml']->first_name; ?></label>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4"><?php echo $this->lang->line('Payment_Last_Name'); ?></label>
			<div class="col-md-8">
				<label><?php echo $this->data['alipayInfoHtml']->last_name; ?></label>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 "><?php echo $this->lang->line('Payment_Card_Type'); ?> </label>
			<div class="col-md-8">
		
				<?php if($this->data['alipayInfoHtml']->card_type == 'visa') { ?>
					<img src='<?php echo base_url(); ?>assets/img/visa.png' width="50" />
				<?php } else if($this->data['alipayInfoHtml']->card_type == 'mastercard') { ?>
					<img src='<?php echo base_url(); ?>assets/img/mastercard.png' width="50" />
				<?php } else if($this->data['alipayInfoHtml']->card_type == 'discover') { ?>
					<img src='<?php echo base_url(); ?>assets/img/discover.png' width="50" />
				<?php } else if($this->data['alipayInfoHtml']->card_type == 'amex') { ?>
					<img src='<?php echo base_url(); ?>assets/img/american_express.png' width="50" />
				<?php } else if($this->data['alipayInfoHtml']->card_type == 'jcb') { ?>
					<img src='<?php echo base_url(); ?>assets/img/jcb.png' width="50" />
				<?php } else if($this->data['alipayInfoHtml']->card_type == 'maestro') { ?>
					<img src='<?php echo base_url(); ?>assets/img/maestro.png' width="50" />
				<?php }?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4"><?php echo $this->lang->line('Payment_Card_Number'); ?></label>
			<div class="col-md-8">
				<label><?php echo $this->data['alipayInfoHtml']->card_number; ?></label>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-10">
			</div>
			<div class="col-md-2">
				<input type="button" value="<?php echo $this->lang->line('Payment_Delete_Account'); ?>" data-toggle="modal" class="btn btn-primary pull-right" onclick="showDeletePopup('alipay', 'id', <?php echo $this->data['alipayInfoHtml']->id; ?>);" />
			</div>
		</div>	
	</form>
<?php } else { ?>
	<form class="form-horizontal row-border" id="validate-alipay-form" action="<?php echo base_url(); ?>payment/alipay" method="post">
		<div class="form-group">
			<label class="col-md-4" style="padding-top:10px;"><?php echo $this->lang->line('Payment_Card_Type_View'); ?> </label>
			<div class="col-md-8">
				<img src="<?php echo base_url(); ?>assets/img/credit-cards.png" width="300px"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4"><?php echo $this->lang->line('Payment_First_Name'); ?> <span class="required">*</span></label>
			<div class="col-md-8">
				<input type="text" name="AlipayCreditCardInfo[firstname]" id="alipay_firstname" class="form-control required" placeholder="<?php echo $this->lang->line('Payment_First_Name'); ?>" value="<?php echo $this->session->flashdata('alipay_firstname'); ?>"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4"><?php echo $this->lang->line('Payment_Last_Name'); ?> <span class="required">*</span></label>
			<div class="col-md-8">
				<input type="text" name="AlipayCreditCardInfo[lastname]" id="alipay_lastname" class="form-control required" placeholder="<?php echo $this->lang->line('Payment_Last_Name'); ?>" value="<?php echo $this->session->flashdata('alipay_lastname'); ?>"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 "><?php echo $this->lang->line('Payment_Card_Type'); ?> <span class="required">*</span></label>
			<div class="col-md-8">
				<div class="input-icon">
					<i class="icon-credit-card"></i> 
					<select name="AlipayCreditCardInfo[type]" id="alipay_card_type" class="form-control required selectbox iconsetting">
						<option value="visa" <?php if($this->session->flashdata('alipay_card_type') == 'visa'){ echo 'selected="selected"'; } ?>>VISA</option>
						<option value="mastercard" <?php if($this->session->flashdata('alipay_card_type') == 'mastercard'){ echo 'selected="selected"'; } ?>>Master Card</option>
						<option value="amex" <?php if($this->session->flashdata('alipay_card_type') == 'amex'){ echo 'selected="selected"'; } ?>>American Express</option>
						<option value="discover" <?php if($this->session->flashdata('alipay_card_type') == 'discover'){ echo 'selected="selected"'; } ?>>Discover Network</option>
						<option value="maestro" <?php if($this->session->flashdata('alipay_card_type') == 'maestro'){ echo 'selected="selected"'; } ?>>Maestor</option>
						<option value="jcb" <?php if($this->session->flashdata('alipay_card_type') == 'jcb'){ echo 'selected="selected"'; } ?>>JCB Card</option>	
					</select>
				</div>	
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 "><?php echo $this->lang->line('Payment_Card_Number'); ?> <span class="required">*</span></label>
			<div class="col-md-8">
				<input type="text" name="AlipayCreditCardInfo[number]" id="alipay_cc_number" class="form-control required" placeholder="0000 0000 0000 0000" value="<?php echo $this->session->flashdata('alipay_cc_number'); ?>"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4"><?php echo $this->lang->line('Payment_Card_Expiration'); ?><span class="required">*</span></label>
			<div class="col-md-4">
				<input type="text" name="AlipayCreditCardInfo[expirymonth]" id="alipay_month" class="form-control required" data-mask="99" placeholder="<?php echo $this->lang->line('Payment_Month'); ?>" value="<?php echo $this->session->flashdata('alipay_month'); ?>"/>
			</div>
			<div class="col-md-4">
				<input type="text" name="AlipayCreditCardInfo[expiryyear]" id="alipay_year" class="form-control required" data-mask="9999" placeholder="<?php echo $this->lang->line('Payment_Year'); ?>" value="<?php echo $this->session->flashdata('alipay_year'); ?>" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4"><?php echo $this->lang->line('Payment_CVV'); ?> <span class="required">*</span></label>
			<div class="col-md-8">
				<input type="text" name="AlipayCreditCardInfo[cvv]" id="alipay_cvv" class="form-control required" data-mask="999" placeholder="<?php echo $this->lang->line('Payment_CVV'); ?>" value="<?php echo $this->session->flashdata('alipay_cvv'); ?>" />
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-10">
			</div>
			<div class="col-md-2">
				<input type="submit" id="alipay_form_btn" value="<?php echo $this->lang->line('Payment_Validate_Me'); ?>" class="btn btn-primary pull-right" />
			</div>
		</div>	
	</form>
<?php } ?>