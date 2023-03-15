<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				<div class="crumbs">
					<ul id="breadcrumbs" class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="<?php echo base_url('dashboard/Dashboard'); ?>"><?php echo $this->lang->line('Dashboard_Title'); ?></a>
						</li>
						<li class="current">
							<a href="<?php echo base_url('dashboard/MyProfileController'); ?>" title="">My Profile</a>
						</li>
					</ul>
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3>User Profile</h3>
						<span>Hello, <?php echo $this->session->userdata('user_session')['firstname']; ?>!</span>
					</div>
				</div>
				<!-- /Page Header -->

				<!--=== Page Content ===-->
				<!--=== Inline Tabs ===-->
				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center">
					
						<div class="alert alert-danger text-center err_div" style="display:none">
							<button class="close" data-dismiss="alert">
							</button> <span class="errrMsg" >You missed some fields. They have been highlighted.</span> 
						</div>	
						<div class="alert alert-success text-center scc_div" id="scc_div1" style="display:none">
							<button class="close" data-dismiss="alert">
							</button> <span class="successMsg" ></span> 
						</div>
						
					</div>	
				</div>	
				<div class="row">
					<div class="col-md-12">
						<!-- Tabs-->
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_overview" data-toggle="tab">Personal Information</a></li>
								<li><a href="#tab_edit_account" data-toggle="tab">Business Information</a></li>
							</ul>
							<div class="tab-content row">
								<div class="tab-pane active" id="tab_overview">
									<form class="form-horizontal" id="validate-myprofile1-form" >
										<div class="col-md-12">
											<div class="widget">
												<div class="widget-header">
													<h4>General Information</h4>
												</div>
												<div class="widget-content">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">First name:</label>
																<div class="col-md-8"><input type="text" name="first_name" class="form-control required" value="<?php if(!empty($user)){  echo $user->firstname; } ?>"></div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label">Last name:</label>
																<div class="col-md-8"><input type="text" name="last_name" class="form-control required" value="<?php if(!empty($user)){ echo $user->lastname; } ?>"></div>
															</div>
														</div>


														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Gender:</label>
																<div class="col-md-8">
																	<select name="gender" class="form-control required">
																		<option value="male" selected="selected">Male</option>
																		<option value="female">Female</option>
																	</select>
																</div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label">Age:</label>
																<div class="col-md-8"><input type="text" name="age" class="form-control input-width-small required" value="<?php if(!empty($user)){ echo $user->age; } ?>"></div>
															</div>
														</div>
													</div> <!-- /.row -->
												</div> <!-- /.widget-content -->
											</div> <!-- /.widget -->
										</div> <!-- /.col-md-12 -->

										<div class="col-md-12 form-vertical no-margin">
											<div class="widget">
												<div class="widget-header">
													<h4>Settings</h4>
												</div>
												<div class="widget-content">
													<div class="row">
														<div class="col-md-4 col-lg-2">
															<strong class="subtitle padding-top-10px">Permanent username</strong>
															<p class="text-muted">Dolor sit amet.</p>
														</div>

														<div class="col-md-8 col-lg-10">
															<div class="form-group">
																<label class="control-label padding-top-10px">Email/Username:</label>
																<input type="email" name="username" class="form-control required email" value=" <?php if(!empty($user)){ echo $user->email; } ?>" disabled="disabled">
															</div>
														</div>
													</div> <!-- /.row -->
													<div class="row">
														<div class="col-md-4 col-lg-2">
															<strong class="subtitle">Change password</strong>
															<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
														</div>

														<div class="col-md-8 col-lg-10">
															<div class="form-group">
																<label class="control-label">Old password:</label>
																<input type="password" name="old_password" class="form-control required" placeholder="Leave empty for no password-change">
															</div>

															<div class="form-group">
																<label class="control-label">New password:</label>
																<input type="password" name="new_password" class="form-control required" placeholder="Leave empty for no password-change">
															</div>

															<div class="form-group">
																<label class="control-label">Repeat new password:</label>
																<input type="password" name="new_password_repeat" equalto="[name='new_password']" class="form-control required" placeholder="Leave empty for no password-change">
															</div>
														</div>
													</div> <!-- /.row -->
												</div> <!-- /.widget-content -->
											</div> <!-- /.widget -->

											<div class="form-actions">
												<input type="submit" name="save_myProfile" value="Update Account" class="btn btn-primary pull-right">
											</div>
										</div> <!-- /.col-md-12 -->
									</form>
								</div>
								<!-- /Edit Account -->

								<!--=== Edit Account ===-->
								<div class="tab-pane" id="tab_edit_account">
									<form class="form-horizontal"  id="validate-myprofile2-form">
										<div class="col-md-12">
											<div class="widget">
												<div class="widget-header">
													<div class="alert alert-info">This Information will be used on Invoices</div>
													<h4>Business Information</h4>
												</div>
												<div class="widget-content">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Company Name:</label>
																<div class="col-md-8"><input type="text" name="company_name" class="form-control required" value="<?php if(!empty($user_bussiness_info)){ echo $user_bussiness_info->company_name; }?>"></div>
															</div>
														</div>
														<div class="col-md-6">
														</div>
													</div> <!-- /.row -->
												</div> <!-- /.widget-content -->
											</div> <!-- /.widget -->
										</div> <!-- /.col-md-12 -->

										<div class="col-md-12 form-vertical no-margin">
											<div class="widget">
												<div class="widget-header">
													<h4>Company Address</h4>
												</div>
												<div class="widget-content">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Address Line 1:</label>
																<div class="col-md-8"><input type="text" name="address_line_1" class="form-control required" value="<?php if(!empty($user_bussiness_info)){ echo $user_bussiness_info->address_line_1; } ?>"></div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label">Address Line 2:</label>
																<div class="col-md-8"><input type="text" name="address_line_2" class="form-control" value="<?php if(!empty($user_bussiness_info)){ echo $user_bussiness_info->address_line_2; } ?>"></div>
															</div>
														</div>
														<div class="col-md-6">
														</div>
													</div> <!-- /.row -->
													<!--<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Country:</label>
																<div class="col-md-8">
																	<select name="country" class="form-control required">
																		<option value="">Select Country</option>
																		//<?php //
																				//foreach ($configData['countries'] as $key => $val) { ?>
																					<option value="<?php // echo $key; ?>"><?php  //echo $val; //?></option>
																		<?php //	} ?>
																	</select>
																</div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label">City:</label>
																<div class="col-md-8">
																<input type="city" name="city" class="form-control required" value="<?php //if//(!empty($user_bussiness_info)){ echo $user_bussiness_info->city; } ?>">
																	<!--<select name="city" class="form-control required">
																		<option value="">Select City</option>
																		<option value="0" selected>Teaxe</option>
																	</select>-->
																<!--</div>
															</div>
															
														</div>
														<div class="col-md-6">
												
														</div>
													</div>-->
													<div class="row">
														<div class="col-md-6">
														
															<div class="form-group">
																<label class="col-md-4 control-label">Country:</label>
																<div class="col-md-8">
																	<select name="country" class="form-control required" id="country">
																		<option value="" Selected>Select Country</option>
																		<?php foreach($country as $Crow){?>
																		
																			<option value="<?php echo $Crow->id; ?>" <?php if(@$user_bussiness_info->country == $Crow->id){ echo 'selected="selected"';}else{ echo ""; } ?> ><?php echo $Crow->name; ?></option>
																			
																		<?php }?>	
																	</select>
																</div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label">State:</label>
																<div class="col-md-8">
																<?php if(!empty($state)){ ?>
																	
																	<select name="state" class="form-control required" id="state">
																			<option value="<?php echo $state ?>" <?php if (!empty($state)){ echo 'selected="selected"'; }else{echo '';} ?>><?php echo $state ?></option>
																	</select>	
																
																<?php }else{ ?>
																
																		
																	<select name="state" class="form-control required" id="state">
																			<option value="" selected>Select State</option>
																	</select>	
																<?php } ?>
																
																</div>
															</div>
															
															<div class="form-group">
																<label class="col-md-4 control-label"><?php echo $this->lang->line('City'); ?>:</label>
																<div class="col-md-8">
																<?php if(!empty($city)){ ?>
																	
																	<select name="city" class="form-control required" id="city">
																			<option value="<?php echo $city ?>" <?php if (!empty($city)){ echo 'selected="selected"';}else{echo '';} ?>><?php echo $city ?></option>
																	</select>	
																
																<?php }else{ ?>
																
																		
																	<select name="city" class="form-control required" id="city">
																			<option value="" selected>Select City</option>
																	</select>	
																<?php } ?>	
																</div>
															</div>
															  
														</div>
														<div class="col-md-6">
												
														</div>
													</div> <!-- /.row -->
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Zipcode:</label>
																<div class="col-md-8"><input type="text" name="zipcode" class="form-control required" value="<?php if(!empty($user_bussiness_info)){ echo $user_bussiness_info->zipcode; } ?>" data-mask="99999"></div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label">Contact - Office:</label>
																<div class="col-md-8"><input type="text" name="contact_office" class="form-control required" value="<?php if(!empty($user_bussiness_info)){ echo $user_bussiness_info->contact_office; } ?>"></div>
															</div>
														</div>
														<div class="col-md-6">
														</div>
													</div> <!-- /.row -->
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-4 control-label">Contact - Mobile:</label>
																<div class="col-md-8"><input type="text" name="contact_mobile" data-mask="(999) 999-9999" class="form-control required" value="<?php if(!empty($user_bussiness_info)){ echo $user_bussiness_info->contact_mobile; } ?>"></div>
															</div>
														</div>
														<div class="col-md-6">
															
														</div>
													</div> <!-- /.row -->
												</div> <!-- /.widget-content -->
											</div> <!-- /.widget -->

											<div class="form-actions">
												<input type="submit" name="save_businessInfo" value="Update Information" class="btn btn-primary pull-right">
											</div>
										</div> <!-- /.col-md-12 -->
									</form>
								</div>
								<!-- /Edit Account -->
							</div> <!-- /.tab-content -->
						</div>
						<!--END TABS-->
					</div>
				</div> <!-- /.row -->
				<!-- /Page Content -->
			</div>
			<!-- /.container -->

		</div>
		
		<script type="text/javascript">
$(document).ready(function(){
	$('#country').on('change',function(){
		
		var countryID = $(this).val();

		if(countryID){
			$.ajax({
				type:'POST',
				url:base_url + 'dashboard/MyProfileController/selectState',
				data:'country_id='+countryID,
				success:function(html){
					$('#state').html(html);
					$('#city').html('<option value="">Select city first</option>'); 
				}
			}); 
		}else{
			$('#state').html('<option value="">Select state first</option>');
			$('#city').html('<option value="">Select city first</option>'); 
		}
	});
	
	$('#state').on('change',function(){
        var stateID = $(this).val();
		
        if(stateID){
            $.ajax({
                type:'POST',
                url:base_url + 'dashboard/MyProfileController/selectCity',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select City first</option>'); 
        }
    });
	
	
}); 
</script>		