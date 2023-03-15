
<!-- Login Box -->
<div class="box">
	<div class="content">
	
		<!-- Login Formular -->
		<form class="form-vertical login-form" action="<?php echo base_url('user/LogedController/login'); ?>" method="post">
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
		<!-- Register Formular (hidden by default) -->
		<form class="form-vertical register-form" action="<?php echo site_url('user/NonLoged/sign_up');?>" method="POST" style="display: none;">
			<!-- Title -->
			<h3 class="form-title"><?php echo $this->lang->line('Sign_Up_Title'); ?></h3>

			<!-- check signup Message -->
			<?php if($this->session->flashdata("check_signup")){?>
				<div class="alert fade in alert-danger" id="success_signup_Message">      
					<?php echo $this->session->flashdata("check_signup")?>
				</div>
			<?php } ?>
			
			
			<!-- empty data Message -->
			<?php if($this->session->flashdata("empty_data")){?>
				<div class="alert fade in alert-danger" id="success_signup_Message">      
					<?php echo $this->session->flashdata("empty_data")?>
				</div>
			<?php } ?>

			<!-- select box -->
			<div class="form-group">
				<div class="input-icon">
					<i class="icon-map-marker"></i>
					<select name="country" class="form-control selectbox" data-rule-required="true" autofocus="autofocus" >
						<option selected="" value=""><?php echo $this->lang->line('Choose_Country'); ?></option>
						<option value="AF">Afghanistan</option>
						<option value="AX">Åland Islands</option>
						<option value="AL">Albania</option>
						<option value="DZ">Algeria</option>
						<option value="AS">American Samoa</option>
						<option value="AD">Andorra</option>
						<option value="AO">Angola</option>
						<option value="AI">Anguilla</option>
						<option value="AQ">Antarctica</option>
						<option value="AG">Antigua and Barbuda</option>
						<option value="AR">Argentina</option>
						<option value="AM">Armenia</option>
						<option value="AW">Aruba</option>
						<option value="AU">Australia</option>
						<option value="AT">Austria</option>
						<option value="AZ">Azerbaijan</option>
						<option value="BS">Bahamas</option>
						<option value="BH">Bahrain</option>
						<option value="BD">Bangladesh</option>
						<option value="BB">Barbados</option>
						<option value="BY">Belarus</option>
						<option value="BE">Belgium</option>
						<option value="BZ">Belize</option>
						<option value="BJ">Benin</option>
						<option value="BM">Bermuda</option>
						<option value="BT">Bhutan</option>
						<option value="BO">Bolivia, Plurinational State of</option>
						<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
						<option value="BA">Bosnia and Herzegovina</option>
						<option value="BW">Botswana</option>
						<option value="BV">Bouvet Island</option>
						<option value="BR">Brazil</option>
						<option value="IO">British Indian Ocean Territory</option>
						<option value="BN">Brunei Darussalam</option>
						<option value="BG">Bulgaria</option>
						<option value="BF">Burkina Faso</option>
						<option value="BI">Burundi</option>
						<option value="KH">Cambodia</option>
						<option value="CM">Cameroon</option>
						<option value="CA">Canada</option>
						<option value="CV">Cape Verde</option>
						<option value="KY">Cayman Islands</option>
						<option value="CF">Central African Republic</option>
						<option value="TD">Chad</option>
						<option value="CL">Chile</option>
						<option value="CN">China</option>
						<option value="CX">Christmas Island</option>
						<option value="CC">Cocos (Keeling) Islands</option>
						<option value="CO">Colombia</option>
						<option value="KM">Comoros</option>
						<option value="CG">Congo</option>
						<option value="CD">Congo, the Democratic Republic of the</option>
						<option value="CK">Cook Islands</option>
						<option value="CR">Costa Rica</option>
						<option value="CI">Côte d'Ivoire</option>
						<option value="HR">Croatia</option>
						<option value="CU">Cuba</option>
						<option value="CW">Curaçao</option>
						<option value="CY">Cyprus</option>
						<option value="CZ">Czech Republic</option>
						<option value="DK">Denmark</option>
						<option value="DJ">Djibouti</option>
						<option value="DM">Dominica</option>
						<option value="DO">Dominican Republic</option>
						<option value="EC">Ecuador</option>
						<option value="EG">Egypt</option>
						<option value="SV">El Salvador</option>
						<option value="GQ">Equatorial Guinea</option>
						<option value="ER">Eritrea</option>
						<option value="EE">Estonia</option>
						<option value="ET">Ethiopia</option>
						<option value="FK">Falkland Islands (Malvinas)</option>
						<option value="FO">Faroe Islands</option>
						<option value="FJ">Fiji</option>
						<option value="FI">Finland</option>
						<option value="FR">France</option>
						<option value="GF">French Guiana</option>
						<option value="PF">French Polynesia</option>
						<option value="TF">French Southern Territories</option>
						<option value="GA">Gabon</option>
						<option value="GM">Gambia</option>
						<option value="GE">Georgia</option>
						<option value="DE">Germany</option>
						<option value="GH">Ghana</option>
						<option value="GI">Gibraltar</option>
						<option value="GR">Greece</option>
						<option value="GL">Greenland</option>
						<option value="GD">Grenada</option>
						<option value="GP">Guadeloupe</option>
						<option value="GU">Guam</option>
						<option value="GT">Guatemala</option>
						<option value="GG">Guernsey</option>
						<option value="GN">Guinea</option>
						<option value="GW">Guinea-Bissau</option>
						<option value="GY">Guyana</option>
						<option value="HT">Haiti</option>
						<option value="HM">Heard Island and McDonald Islands</option>
						<option value="VA">Holy See (Vatican City State)</option>
						<option value="HN">Honduras</option>
						<option value="HK">Hong Kong</option>
						<option value="HU">Hungary</option>
						<option value="IS">Iceland</option>
						<option value="IN">India</option>
						<option value="ID">Indonesia</option>
						<option value="IR">Iran, Islamic Republic of</option>
						<option value="IQ">Iraq</option>
						<option value="IE">Ireland</option>
						<option value="IM">Isle of Man</option>
						<option value="IL">Israel</option>
						<option value="IT">Italy</option>
						<option value="JM">Jamaica</option>
						<option value="JP">Japan</option>
						<option value="JE">Jersey</option>
						<option value="JO">Jordan</option>
						<option value="KZ">Kazakhstan</option>
						<option value="KE">Kenya</option>
						<option value="KI">Kiribati</option>
						<option value="KP">Korea, Democratic People's Republic of</option>
						<option value="KR">Korea, Republic of</option>
						<option value="KW">Kuwait</option>
						<option value="KG">Kyrgyzstan</option>
						<option value="LA">Lao People's Democratic Republic</option>
						<option value="LV">Latvia</option>
						<option value="LB">Lebanon</option>
						<option value="LS">Lesotho</option>
						<option value="LR">Liberia</option>
						<option value="LY">Libya</option>
						<option value="LI">Liechtenstein</option>
						<option value="LT">Lithuania</option>
						<option value="LU">Luxembourg</option>
						<option value="MO">Macao</option>
						<option value="MK">Macedonia, the former Yugoslav Republic of</option>
						<option value="MG">Madagascar</option>
						<option value="MW">Malawi</option>
						<option value="MY">Malaysia</option>
						<option value="MV">Maldives</option>
						<option value="ML">Mali</option>
						<option value="MT">Malta</option>
						<option value="MH">Marshall Islands</option>
						<option value="MQ">Martinique</option>
						<option value="MR">Mauritania</option>
						<option value="MU">Mauritius</option>
						<option value="YT">Mayotte</option>
						<option value="MX">Mexico</option>
						<option value="FM">Micronesia, Federated States of</option>
						<option value="MD">Moldova, Republic of</option>
						<option value="MC">Monaco</option>
						<option value="MN">Mongolia</option>
						<option value="ME">Montenegro</option>
						<option value="MS">Montserrat</option>
						<option value="MA">Morocco</option>
						<option value="MZ">Mozambique</option>
						<option value="MM">Myanmar</option>
						<option value="NA">Namibia</option>
						<option value="NR">Nauru</option>
						<option value="NP">Nepal</option>
						<option value="NL">Netherlands</option>
						<option value="NC">New Caledonia</option>
						<option value="NZ">New Zealand</option>
						<option value="NI">Nicaragua</option>
						<option value="NE">Niger</option>
						<option value="NG">Nigeria</option>
						<option value="NU">Niue</option>
						<option value="NF">Norfolk Island</option>
						<option value="MP">Northern Mariana Islands</option>
						<option value="NO">Norway</option>
						<option value="OM">Oman</option>
						<option value="PK">Pakistan</option>
						<option value="PW">Palau</option>
						<option value="PS">Palestinian Territory, Occupied</option>
						<option value="PA">Panama</option>
						<option value="PG">Papua New Guinea</option>
						<option value="PY">Paraguay</option>
						<option value="PE">Peru</option>
						<option value="PH">Philippines</option>
						<option value="PN">Pitcairn</option>
						<option value="PL">Poland</option>
						<option value="PT">Portugal</option>
						<option value="PR">Puerto Rico</option>
						<option value="QA">Qatar</option>
						<option value="RE">Réunion</option>
						<option value="RO">Romania</option>
						<option value="RU">Russian Federation</option>
						<option value="RW">Rwanda</option>
						<option value="BL">Saint Barthélemy</option>
						<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
						<option value="KN">Saint Kitts and Nevis</option>
						<option value="LC">Saint Lucia</option>
						<option value="MF">Saint Martin (French part)</option>
						<option value="PM">Saint Pierre and Miquelon</option>
						<option value="VC">Saint Vincent and the Grenadines</option>
						<option value="WS">Samoa</option>
						<option value="SM">San Marino</option>
						<option value="ST">Sao Tome and Principe</option>
						<option value="SA">Saudi Arabia</option>
						<option value="SN">Senegal</option>
						<option value="RS">Serbia</option>
						<option value="SC">Seychelles</option>
						<option value="SL">Sierra Leone</option>
						<option value="SG">Singapore</option>
						<option value="SX">Sint Maarten (Dutch part)</option>
						<option value="SK">Slovakia</option>
						<option value="SI">Slovenia</option>
						<option value="SB">Solomon Islands</option>
						<option value="SO">Somalia</option>
						<option value="ZA">South Africa</option>
						<option value="GS">South Georgia and the South Sandwich Islands</option>
						<option value="SS">South Sudan</option>
						<option value="ES">Spain</option>
						<option value="LK">Sri Lanka</option>
						<option value="SD">Sudan</option>
						<option value="SR">Suriname</option>
						<option value="SJ">Svalbard and Jan Mayen</option>
						<option value="SZ">Swaziland</option>
						<option value="SE">Sweden</option>
						<option value="CH">Switzerland</option>
						<option value="SY">Syrian Arab Republic</option>
						<option value="TW">Taiwan, Province of China</option>
						<option value="TJ">Tajikistan</option>
						<option value="TZ">Tanzania, United Republic of</option>
						<option value="TH">Thailand</option>
						<option value="TL">Timor-Leste</option>
						<option value="TG">Togo</option>
						<option value="TK">Tokelau</option>
						<option value="TO">Tonga</option>
						<option value="TT">Trinidad and Tobago</option>
						<option value="TN">Tunisia</option>
						<option value="TR">Turkey</option>
						<option value="TM">Turkmenistan</option>
						<option value="TC">Turks and Caicos Islands</option>
						<option value="TV">Tuvalu</option>
						<option value="UG">Uganda</option>
						<option value="UA">Ukraine</option>
						<option value="AE">United Arab Emirates</option>
						<option value="GB">United Kingdom</option>
						<option value="US">United States</option>
						<option value="UM">United States Minor Outlying Islands</option>
						<option value="UY">Uruguay</option>
						<option value="UZ">Uzbekistan</option>
						<option value="VU">Vanuatu</option>
						<option value="VE">Venezuela, Bolivarian Republic of</option>
						<option value="VN">Viet Nam</option>
						<option value="VG">Virgin Islands, British</option>
						<option value="VI">Virgin Islands, U.S.</option>
						<option value="WF">Wallis and Futuna</option>
						<option value="EH">Western Sahara</option>
						<option value="YE">Yemen</option>
						<option value="ZM">Zambia</option>
						<option value="ZW">Zimbabwe</option>
					</select>
				</div>
			</div>
			
			<!-- Input Fields -->
			<div class="form-group">
				<div class="input-icon">
					<i class="icon-user"></i>
					<input type="text" name="username" class="form-control" placeholder="<?php echo $this->lang->line('Username_Heading'); ?>" autofocus="autofocus" data-rule-required="true" />
				</div>
			</div>
			<div class="form-group">
				<div class="input-icon">
					<i class="icon-envelope"></i>
					<input type="text" name="email" class="form-control" id="email_address" placeholder="<?php echo $this->lang->line('Email_Address_Heading'); ?>" data-rule-required="true" data-rule-email="true" />
					<label id="exitemail" style="color: #b94a48;display:none;"><?php echo $this->lang->line('Email_Already_Exist'); ?></label>
				</div>
			</div>
			<!-- Input Fields -->
			<div class="form-group">
				<div class="input-icon">
					<i class="icon-user"></i>
					<input type="text" name="firstname" class="form-control" placeholder="<?php echo $this->lang->line('First_Name_Heading'); ?>" autofocus="autofocus" data-rule-required="true" />

				</div>
			</div>
			<div class="form-group">
				<div class="input-icon">
					<i class="icon-user"></i>
					<input type="text" name="lastname" class="form-control" placeholder="<?php echo $this->lang->line('Last_Name_Heading'); ?>" autofocus="autofocus" data-rule-required="true" />
				</div>
			</div>
			<div class="form-group">
				<div class="input-icon">
					<i class="icon-lock"></i>
					<input type="password" name="password" class="form-control" placeholder="<?php echo $this->lang->line('Password_Heading'); ?>" id="register_password" data-rule-required="true" />
				</div>
			</div>
			<div class="form-group">
				<div class="input-icon">
					<i class="icon-ok"></i>
					<input type="password" name="verifyPassword" class="form-control" placeholder="<?php echo $this->lang->line('Confirm_Password_Heading'); ?>" data-rule-required="true" data-rule-equalTo="#register_password" />
				</div>
			</div>
			
			<div class="form-group">
				<div class="input-icon">
					<i class="icon-phone"></i>
					<input type="text" name="phone" class="form-control" placeholder="<?php echo $this->lang->line('Contact_Number_Heading'); ?>" data-rule-required="true" />
				</div>
			</div>
		
			<div class="form-group spacing-top">
				<label class="checkbox">
					<input type="checkbox" class="" name="remember" data-rule-required="true" data-msg-required="<?php echo $this->lang->line('Contact_Number_Heading'); ?>"> <a href="javascript:void(0);"><?php echo $this->lang->line('Accept_Terms_Message'); ?></a>
				</label>
				<label for="remember" class="has-error help-block" generated="true" style="display:none;"></label>
			</div>
			<!-- /Input Fields -->

			<!-- Form Actions -->
			<div class="form-actions">
				<button type="button" class="back btn btn-default pull-left">
					<i class="icon-angle-left"></i> <?php echo $this->lang->line('Back'); ?></i>
				</button>
				<button type="submit" class="submit btn btn-primary pull-right" id="submit_button">
					<?php echo $this->lang->line('Sign_Up_Heading'); ?> <i class="icon-angle-right"></i>
				</button>
			</div>
		</form>
		<!-- /Register Formular -->
	</div> <!-- /.content -->

	<!-- Forgot Password Form -->
	<div class="inner-box">
		<div class="content">
			<!-- Close Button -->
			<i class="icon-remove close hide-default"></i>

			<!-- Link as Toggle Button -->
			<a href="#" class="forgot-password-link"><?php echo $this->lang->line('Forgot_Password'); ?></a>

			<!-- email and password Message -->
			<?php if($this->session->flashdata("email_not_exit")){?>
				<div class="alert fade in alert-danger" id="success_signup_Message">      
					<?php echo $this->session->flashdata("email_not_exit")?>
				</div>
			<?php } ?>
			
			<!-- email and password Message -->
			<?php if($this->session->flashdata("send_link_signup")){?>
				<div class="alert alert-success" id="success_signup_Message">      
					<?php echo $this->session->flashdata("send_link_signup")?>
				</div>
			<?php } ?>
			
			<!-- Forgot Password Formular -->
			<form class="form-vertical" action="<?php echo base_url('user/LogedController/forgetPassword');?>" method="post">
				<!-- Input Fields -->
				<div class="form-group">
					<!--<label for="email">Email:</label>-->
					<div class="input-icon">
						<i class="icon-envelope"></i>
						<input type="text" name="email" class="form-control" placeholder="<?php echo $this->lang->line('Enter_Email_Address'); ?>" data-rule-required="true" data-rule-email="true" data-msg-required="<?php echo $this->lang->line('Enter_Email_Address'); ?>" />
					</div>
				</div>
				<!-- /Input Fields -->

				<button type="submit" class="submit btn btn-default btn-block">
					<?php echo $this->lang->line('Reset_Password'); ?>
				</button>
			</form>
			<!-- /Forgot Password Formular -->

			<!-- Shows up if reset-button was clicked -->
			<div class="forgot-password-done hide-default">
				<i class="icon-ok success-icon"></i> <!-- Error-Alternative: <i class="icon-remove danger-icon"></i> -->
				<span><?php echo $this->lang->line('Forgot_Password_Success_Message'); ?></span>
			</div>
		</div> <!-- /.content -->
	</div>
	<!-- /Forgot Password Form -->
</div>
<!-- /Login Box -->

<!-- Footer -->
<div class="footer">
	<a href="#" class="sign-up"><?php echo $this->lang->line('Sign_Up_Registration_Redirect'); ?> <strong><?php echo $this->lang->line('Sign_Up_Heading'); ?></strong></a>
</div>
<!-- /Footer -->
