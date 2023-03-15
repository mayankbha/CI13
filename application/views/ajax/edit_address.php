<?php if(isset($address)) { ?>
<form class="form-horizontal" method="POST" id="edit_addressForm" >
	<div class="col-md-12 form-vertical no-margin">
		<div class="widget">
			<div class="widget-content">
				<div class="row">
					<div class="col-md-3">
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-4">Name:</label>
							<div class="col-md-8"><input type="text"  name="name"  value="<?php if(isset($address)) echo $address->name; ?>" class="form-control required" ></div>
						</div>
						<div class="form-group">
							<label class="col-md-4">Address Line 1:</label>
							<div class="col-md-8"><input type="text"  name="addressline1" class="form-control required" value="<?php if(isset($address)) echo $address->addressline1; ?>"></div>
						</div>
						<div class="form-group">
							<label class="col-md-4">Address Line 2:</label>
							<div class="col-md-8"><input type="text" name="addressline2" class="form-control required" value="<?php if(isset($address)) echo $address->addressline2; ?>"></div>
						</div>
					</div>
					<div class="col-md-3">
					</div>
				</div> <!-- /.row -->
				
				<div class="row">
					<div class="col-md-3">
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-4">Country:<?php print_r($country->id); ?> </label>
							<div class="col-md-8">
								<select name="country" class="form-control required" id="allcountory">
									<option value="" Selected>Select Country </option>
									<?php foreach($allcountry as $Crow){?>
										<option value="<?php echo $Crow->id; ?>" <?php if(isset($country) && ($country->id == $Crow->id)){ echo 'selected="selected"';} ?>><?php echo $Crow->name; ?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4">State:</label>
							<div class="col-md-8">
								<select name="state" class="form-control required" id="allstate">
									<option value="" Selected>Select State</option>	
									<option value="<?php echo $state->id; ?>" <?php if (!empty($state)){ echo 'selected="selected"'; }else{echo '';} ?>><?php echo $state->name; ?></option>									
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4">City:</label>
							<div class="col-md-8">
								<select name="city" class="form-control required" id="allcity">
									<option value="" Selected>Select City</option>
									<option value="<?php echo $city->id; ?>" <?php if (!empty($city)){ echo 'selected="selected"';}else{echo '';} ?>><?php echo $city->name; ?></option>	
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-3">
					</div>
				</div> <!-- /.row -->
				<div class="row">
					<div class="col-md-3">
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-4">Zipcode:</label>
							<div class="col-md-8"><input type="text" name="zipcode"  class="form-control required" data-mask="99999" value="<?php if(isset($address)) echo $address->zipcode; ?>"></div>
						</div>

						<div class="form-group">
							<label class="col-md-4">Contact - Office:</label>
							<div class="col-md-8"><input type="text" name="contactoffice"  class="form-control required" value="<?php if(isset($address)) echo $address->contactoffice; ?>"></div>
						</div>
					</div>
					<div class="col-md-3">
					</div>
				</div> <!-- /.row -->
				<div class="row">
					<div class="col-md-3">
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-4">Contact - Mobile:</label>
							<div class="col-md-8"><input type="text"  name="contactmobile" data-mask="(999) 999-9999" class="form-control required" value="<?php if(isset($address)) echo $address->contactmobile; ?>"></div>
						</div>
					</div>
					<div class="col-md-3">
					</div>
				</div> <!-- /.row -->
			</div> <!-- /.widget-content -->
		</div> <!-- /.widget -->
		<div class="form-actions">
				<div class="col-md-6 col-md-offset-3">
					<center>
						<div class="alert alert-success text-center" style="display:none" id="scc_div1">
							<button class="close" data-dismiss="alert">
							</button> <span >Your address inforamtion has been updated.</span> 
						</div>
						<div class="alert alert-danger text-center" style="display:none" id="error_div1">
							<button class="close" data-dismiss="alert">
							</button> <span >You missed some fields. They have been highlighted.</span> 
						</div>
					</center>
				</div>
			<input type="hidden" name="address_id" value="<?php if(isset($address)) echo $address->address_id; ?>">
			<input type="submit" value="updateInformation" name="Update Information" class="btn btn-primary pull-right">
		</div>
	</div> <!-- /.col-md-12 -->
</form>

<script type="text/javascript">

$(document).ready(function() {
$('#edit_addressForm').validate();

	$('#edit_addressForm').submit(function(event) { 
        event.preventDefault(); 
		if ($("#edit_addressForm").valid()) {
			$.ajax({
				type : 'POST',
				url : base_url+'shipping/AddressController/saveEditInformation',
				data : $('#edit_addressForm').serialize(),
				beforeSend: function(){
					$.LoadingOverlay("show");
				},
				success: function(res) {
					if(res!=0){
						$.LoadingOverlay("hide");
						$('#scc_div1').show();
						setTimeout(function() {
							$('.alert alert-success').hide();
							$("#EditAddress_order").hide();
							getUserAddress_order();
						}, 3000);
						
					}else{
						$.LoadingOverlay("hide");
						$('#error_div1').show();
							setTimeout(function() {
							$('.alert alert-danger').hide();
						}, 3000);
					}
				},
			});
		}
	});




$('#allcountory').on('change',function(){
		
		var countryID = $(this).val();

		if(countryID){
			$.ajax({
				type:'POST',
				url:base_url + 'shipping/Shipping/selectState',
				data:'country_id='+countryID,
				beforeSend: function(){
				},
				success:function(html){
					$('#allstate').html(html);
					$('#allcity').html('<option value="">Select state first</option>'); 
				},
				complete: function() {},
				error: function() {}
			}); 
		}else{
			$('#allstate').html('<option value="">Select country first</option>');
			$('#allcity').html('<option value="">Select state first</option>'); 
		}
	});
	
	$('#allstate').on('change',function(){
        var stateID = $(this).val();
		
        if(stateID){
            $.ajax({
                type:'POST',
                url:base_url + 'shipping/Shipping/selectCity',
                data:'state_id='+stateID,
				beforeSend: function(){
				},
                success:function(html){
                    $('#allcity').html(html);
                },
				complete: function() {},
				error: function() {}
            }); 
        }else{
            $('#allcity').html('<option value="">Select City first</option>'); 
        }
    });
});
</script>
<?php } ?>