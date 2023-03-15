<?php if(!empty($tracking_data)) { $cnt = 1; ?>
	<?php foreach($tracking_data as $tracking)  { ?>
		<div class="row" id="hide-custom-<?php echo $cnt; ?>">
			<input type="hidden" name="validate_add_more" class="form-control" id="validate_add_more_<?php echo $cnt; ?>" value="1" />

			<div class="col-md-1"><?php echo $cnt; ?></div>

			<div class="col-md-2">
				<input type="text" name="tracking" id="tracking_number_<?php echo $cnt; ?>" class="form-control" placeholder="Enter tracking number" value="<?php echo $tracking->tracking_number; ?>" disabled="disabled" />
			</div>

			<div class="col-md-2">
				<select class="form-control" name="carrier" id="carrier_<?php echo $cnt; ?>" onchange="showOtherOption(<?php echo $cnt; ?>, this.value);" disabled="disabled">
					<?php foreach($user_carriers as $user_carrier) { ?>
						<option value="<?php echo $user_carrier->carrier_name; ?>" <?php if($tracking->carrier == $user_carrier->carrier_name) { ?>selected="selected"<?php } ?>><?php echo $user_carrier->carrier_name; ?></option>
					<?php } ?>

					<option value="others">Others</option>
				</select>
			</div>

			<div class="col-md-2">
				<input type="text" name="departure_date" id="departure_date_<?php echo $cnt; ?>" class="form-control datepicker" value="<?php echo date('d-m-Y', strtotime($tracking->departure_date)); ?>" disabled="disabled" /> 
			</div>

			<div class="col-md-2">
				<input type="text" name="arrival_date" id="arrival_date_<?php echo $cnt; ?>" class="form-control datepicker" value="<?php echo date('d-m-Y', strtotime($tracking->arrival_date)); ?>" disabled="disabled" /> 
			</div>

			<div class="col-md-1"><button type="button" class="btn btn-primary" onclick="addTracking(<?php echo $cnt; ?>);">Submit</button></div>

			<div class="col-md-2"></span></div>
		</div>
		
		<br>
	<?php $cnt++; } ?>
<?php } ?>