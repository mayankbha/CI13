<?php //echo '<pre>'.print_r($user_info);'.</pre>';?>

<h3 class="block padding-bottom-10px title_bar"><?php echo $this->lang->line('BasicInformation'); ?></h3>
<div class="row">
	<div class="col-md-1">
	</div>
	<div class="col-md-5">
		<div class="form-group">
			<label class="col-md-5"><?php echo $this->lang->line('BookingNumber'); ?><span class="required">*</span></label>
			<div class="col-md-6">
				<input type="hidden" name="booking_number" value="<?php echo $shipments->booking_number; ?>">
				<?php echo $shipments->booking_number; ?>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-5"><?php echo $this->lang->line('Shipping_mode'); ?><span class="required">*</span></label>
			<div class="col-md-6">
			
				<select name="ship_or_vendor_code" class="form-control required" id="shipping_mode" >
					<option value="">Select Ship/Vendor Code</option>
					<?php 
							foreach ($configData['shipping_mode'] as $key => $val) { ?>
								<option value="<?php  echo $key; ?>"><?php  echo $val; ?></option>
					<?php 	} ?>
				</select>
				
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-5"><?php echo $this->lang->line('FreightType'); ?><span class="required">*</span></label>
			<div class="col-md-6">
			
				<select name="freight_type" class="form-control" id="freight_type" disabled>
					<option value="" selected>Select Freight Type</option>
					<?php 
							foreach ($configData['freight_type'] as $key => $val) { ?>
								<option value="<?php  echo $key; ?>"><?php  echo $val; ?></option>
					<?php 	} ?>
				</select>
				
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-5"><?php echo $this->lang->line('ContainersRequired'); ?><span class="required">*</span></label>
			
			<div class="col-md-2">
				<input class="form-control container_form qty" style="width: 93%;" name="container_form1" disabled>
			</div>
			<div class="col-md-4">
				<select name="container_form1_size" class="form-control container_form" disabled>
					<option value="" selected>Select One</option>
					<?php 
							foreach ($configData['containers'] as $key => $val) { ?>
								<option value="<?php  echo $key; ?>"><?php  echo $val; ?></option>
					<?php 	} ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-5"></label>
			<div class="col-md-2">
				<input class="form-control container_form qty" style="width: 93%;" name="container_form2" disabled>
			</div>
			<div class="col-md-4">
				<select name="container_form2_size" class="form-control container_form" disabled>
					<option value="" selected>Select One</option>
					<?php 
							foreach ($configData['containers'] as $key => $val) { ?>
								<option value="<?php  echo $key; ?>"><?php  echo $val; ?></option>
					<?php 	} ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-5"></label>
			<div class="col-md-2">
				<input class="form-control container_form qty" style="width: 93%;" name="container_form3" disabled>
			</div>
			<div class="col-md-4">
				<select name="container_form3_size" class="form-control container_form" disabled>
					<option value="" selected>Select One</option>
					<?php 
							foreach ($configData['containers'] as $key => $val) { ?>
								<option value="<?php  echo $key; ?>"><?php  echo $val; ?></option>
					<?php 	} ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-5"></label>
			<div class="col-md-2">
				<input class="form-control container_form qty" style="width: 93%;" name="container_form4" disabled>
			</div>
			<div class="col-md-4">
				<select name="container_form4_size" class="form-control container_form" disabled>
					<option value="" selected>Select One</option>
					<?php 
							foreach ($configData['containers'] as $key => $val) { ?>
								<option value="<?php  echo $key; ?>"><?php  echo $val; ?></option>
					<?php 	} ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-5"></label>
			<div class="col-md-2">
				<input class="form-control container_form qty" style="width: 93%;" name="container_form5" disabled>
			</div>
			<div class="col-md-4">
				<select name="container_form5_size" class="form-control container_form " disabled>
					<option value="" selected>Select One</option>
					<?php 
							foreach ($configData['containers'] as $key => $val) { ?>
								<option value="<?php  echo $key; ?>"><?php  echo $val; ?></option>
					<?php 	} ?>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('BookingCreated'); ?><span class="required">*</span></label>
			<div class="col-md-6">
			<input type="text" class="form-control" name="booking_created" readonly value="<?php echo $shipments->booking_created; ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('ContantName'); ?></label>
			<div class="col-md-6">
				<input type="text" readonly placeholder="Contact Name" class="form-control" name="contact_name" value="<?php echo $user_info->username; ?>" /> 
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('ContantPhone'); ?></label>
			<div class="col-md-6">
				<input type="text" placeholder="Contant Phone" data-mask="(999) 999-9999" class="form-control" name="contant_phone" value="<?php echo $user_info->phone; ?>"/> 
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('ContantFax'); ?></label>
			<div class="col-md-6">
				<input type="text" placeholder="Contant Fax " class="form-control" name="contant_fax" value="<?php echo $user_info->phone; ?>"/> 
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-6">
			
			<?php echo $this->lang->line('ContantEmail'); ?></label>
			<div class="col-md-6">
				<input type="text" class="form-control required email"  name="contact_email" 
				placeholder="Contant Email" value="<?php echo $user_info->email; ?>"/> 
			</div>
		</div>
	
	</div>
	<div class="col-md-1">
	</div>
</div>

<h3 class="block padding-bottom-10px title_bar"><?php echo $this->lang->line('Cargo'); ?></h3>
<div class="row">
	<div class="col-md-1">
	</div>
	<div class="col-md-5">
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('CountryofOrigin'); ?><span class="required">*</span></label>
			<div class="col-md-6">
				<select name="country_of_origin" class="form-control required" disabled style="width: 160px;">
					<option value="usa">USA</option>
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('Name'); ?></label>
			<div class="col-md-6">
				<input type="text" name="name" readonly class="form-control" value="<?php  if(isset($addressDetails)) echo $addressDetails->name; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('Address1'); ?></label>
			<div class="col-md-6">
				<input type="text" name="address_1" readonly class="form-control" value="<?php if(isset($addressDetails)) echo $addressDetails->addressline1; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('Address2'); ?></label>
			<div class="col-md-6">
				<input type="text" name="address_2" readonly class="form-control" value="<?php if(isset($addressDetails)) echo $addressDetails->addressline2; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('City'); ?></label>
			<div class="col-md-6">
				<input type="text" name="city" class="form-control" readonly value="<?php if(isset($addressDetails)) echo $addressDetails->city; ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('CountryCode'); ?></label>
			<div class="col-md-6">
				<input type="text" name="country_code" readonly class="form-control" value="<?php if(isset($addressDetails)) echo $addressDetails->country; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('PostalCode'); ?></label>
			<div class="col-md-6">
				<input type="text" name="postal_code" readonly class="form-control" value="<?php if(isset($addressDetails)) echo $addressDetails->zipcode; ?>">
			</div>
		</div>
		
	</div>
	<div class="col-md-5">
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('SippingMark'); ?><span class="required">*</span></label>
			<div class="col-md-6">
				<select name="sipping_mark" id="sipping_mark" class="form-control required" style="width: 160px;">
					<option value="">Select One</option>
					<?php 
							foreach ($configData['sipping_mark'] as $key => $val) { ?>
								<option value="<?php  echo $key; ?>"><?php  echo $val; ?></option>
					<?php 	} ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-6"><span></span></label>
			
			<div class="col-md-5" id="add_info">
				<textarea class="form-control" rows="1" cols="30">                               
                </textarea> 
			</div>
			
		</div>
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('SolidWoodPacking'); ?><span class="required">*</span></label>
			<div class="col-md-6">
				<select name="solid_wood_packing" class="form-control required" id="SolidWoodPacking" style="width: 160px;">
					<option value="">Select One</option>
					<?php 
							foreach ($configData['solid_wood_packing'] as $key => $val) { ?>
								<option value="<?php  echo $key; ?>"><?php  echo $val; ?></option>
					<?php 	} ?>
				</select>	
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('NumberofPallets'); ?><span class="required">*</span></label>
			<div class="col-md-6">
				<input type="text" class="form-control required qty" disabled name="number_of_pallets" placeholder="Number of Pallets" id="Nop" value="98563211" style="width: 160px;"/> 
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('AddEditManufacturer'); ?><span class="required">*</span></label>
			<div class="col-md-6">
				<select name="manufacturer" class="form-control required" style="width: 160px;">
					<option value="">Select One</option>
					<?php 
							foreach ($configData['edit_manufacturer'] as $key => $val) { ?>
								<option value="<?php  echo $key; ?>"><?php  echo $val; ?></option>
					<?php 	} ?>
				</select>	
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('LicenseRequired'); ?><span class="required">*</span></label>
			<div class="col-md-6">
				<select name="export_license_required" class="form-control required" style="width: 160px;">
					<option value="">Select One</option>
					<?php 
							foreach ($configData['export_license'] as $key => $val) { ?>
								<option value="<?php  echo $key; ?>"><?php  echo $val; ?></option>
					<?php 	} ?>
				</select>	
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-6"><?php echo $this->lang->line('ContainersDangerous'); ?><span class="required">*</span></label>
			<div class="col-md-6">		
				<select name="container_forms_dangerous" class="form-control required" style="width: 160px;">
					<option value="">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select>	
			</div>
		</div>
	</div>
	<div class="col-md-1">
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$(".button-state").show();
	$('#add_info').hide();
	$("#continue_btn").css("visibility", "hidden");
});
$(function() { 
	
    $('#shipping_mode').change(function(){
        if($('#shipping_mode').val() == 'Sea') {
            $('#freight_type').removeAttr("disabled"); 
			$('.container_form').attr('disabled', true);		
        } else {
			$('.container_form').val('');	
			$('.container_form').attr('disabled', true); 
			$('#freight_type').attr('disabled', true); 
        } 
    });
	$('#freight_type').change(function(){
        if($('#freight_type').val() != '') {
            $('.container_form').removeAttr("disabled"); 
        } else {
			$('.container_form').attr('disabled', true); 
			$('.container_form').val('');	
        } 
    });
	
	$('#sipping_mark').change(function(){ 
        if($('#sipping_mark').val() == 1) { 
			$('#add_info').show();
        } else {
			$('#add_info').hide();
        } 
    });
	
	$('#SolidWoodPacking').change(function(){
        if($('#SolidWoodPacking').val() == 0) {
			$('#Nop').attr('disabled', true); 
			$('#Nop').val('');
        } else {
			$('#Nop').removeAttr("disabled"); 
        } 
    });
});

$(function(){ // this will be called when the DOM is ready
	$('.qty').on('input', function (event) { 
		this.value = this.value.replace(/[^0-9]/g, '');
	});
});
</script>