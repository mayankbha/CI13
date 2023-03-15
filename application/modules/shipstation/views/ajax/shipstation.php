<?php if(isset($this->data['shipstationInfoHtml']) && !empty($this->data['shipstationInfoHtml'])) { ?>
	<!--<div class="col-sm-12 col-md-12">
		<div class="alert alert-info fade in">
			<i class="icon-remove close" data-dismiss="alert"></i>
			<?php echo $this->lang->line('Shipstation_Succesgully_msg'); ?>
			
		</div>
	</div>-->

	<div class="col-sm-12 col-md-12">
		<div class="col-sm-4 col-md-4">
			<img src="<?php echo base_url(); ?>assets/img/shipstation.png" width="319px" />
		</div>

		<div class="col-sm-7 col-md-7">
			<form class="form-horizontal row-border" id="verify-shipstation-account-form" method="post" action="">
				<div class="form-group">
					<div class="col-md-12">
						<label class="control-label"><?php echo $this->lang->line('Shipstation_API_KEY'); ?>:</label>

						<br /><br />

						<input type="text" name="ShipStationInfo[api_key]" id="shipstation_api_key" class="form-control required" placeholder="<?php echo $this->lang->line('Shipstation_API_KEY'); ?>" value="<?php echo $this->data['api_key']; ?>" disabled="disabled" />
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12">
						<label class="control-label"><?php echo $this->lang->line('Shipstation_API_SECRET_KEY'); ?>:</label>

						<br /><br />

						<input type="text" name="ShipStationInfo[api_secret]" id="shipstation_api_key_screct" class="form-control required" placeholder="<?php echo $this->lang->line('Shipstation_API_SECRET_KEY'); ?>"  value="<?php echo $this->data['api_secret']; ?>" disabled="disabled" />
					</div>
				</div>	
			</form>
		</div>
	</div>

	<div class="col-sm-12 col-md-12">
		<div align="center">
			<input type="button" value="<?php echo $this->lang->line('Remove_Account'); ?>" data-toggle="modal" class="btn btn-info" onclick="showDeletePopup('shipstation', 'id', <?php echo $this->data['shipstationInfoHtml']->id; ?>);" />
		</div>
	</div>
<?php } else { ?>
	<?php if(isset($this->data['error'])) { ?>
		<div class="alert alert-danger">
			<i class="icon-remove close" data-dismiss="alert"></i>

			<?php echo $this->data['error']; ?>
		</div>
	<?php } ?>

	<?php if(isset($this->data['success'])) { ?>
		<div class="alert alert-success">
			<i class="icon-remove close" data-dismiss="alert"></i>

			<?php echo $this->data['success']; ?>
		</div>
	<?php } ?>

	<br />

	<div class="col-sm-4 col-md-4">
		<img src="<?php echo base_url(); ?>assets/img/shipstation.png" width="319px" />
	</div>

	<div class="col-sm-7 col-md-7">
		<form class="form-horizontal row-border" id="verify-shipstation-account-form" method="post" action="">
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label"><?php echo $this->lang->line('Shipstation_API_KEY'); ?>:</label>

					<br /><br />

					<input type="text" name="ShipStationInfo[api_key]" id="shipstation_api_key" class="form-control required" placeholder="<?php echo $this->lang->line('Shipstation_API_KEY'); ?>" value="<?php echo $this->session->flashdata('shipstation_api_key');?>" />
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label"><?php echo $this->lang->line('Shipstation_API_SECRET_KEY'); ?>:</label>

					<br /><br />

					<input type="text" name="ShipStationInfo[api_secret]" id="shipstation_api_key_screct" class="form-control required" placeholder="<?php echo $this->lang->line('Shipstation_API_SECRET_KEY'); ?>"  value="<?php echo $this->session->flashdata('shipstation_api_key_screct');?>" />
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-9"></div>

				<div class="col-md-3">
					<input type="submit" id="shipstation_form_btn" value="<?php echo $this->lang->line('Shipstation_Submit_Button'); ?>" class="btn btn-info" />
				</div>
			</div>	
		</form>
	</div>
<?php } ?>