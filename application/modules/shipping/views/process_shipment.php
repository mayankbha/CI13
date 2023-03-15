				<!--=== Navigation ===-->
			<!--	<ul id="nav">
					<li class="current">
						<a href="<?php //echo base_url(); ?>dashboard">
							<i class="icon-dashboard"></i>
							<?php //echo $this->lang->line('Dashboard_Title'); ?>
						</a>
					</li>
					
				</ul>
			</div>
			<div id="divider" class="resizeable"></div>
		</div>-->
		<!-- /Sidebar -->

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
							<a href="#" title="">Shipping</a>
						</li>
					</ul>
				</div>  
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3>Shipping</h3>
						<h5>Create your Shipment</h5>
					</div>
				</div>
				<!-- /Page Header -->

				<div class="row">
                    <div class="col-md-12">
                        <div class="widget box" id="form_wizard">
                            
                            <div class="widget-content">
                                <form class="form-horizontal" id="sample_form" action="#">
                                    <div class="form-wizard">
                                        <div class="form-body">
                                            <ul class="nav nav-pills nav-justified steps">
                                                <li>
                                                    <a href="#tab1" data-toggle="tab" class="step"> <span class="number">1</span> <br />
														<span class="desc"><i class="icon-ok"></i> Booking Header</span> 
													</a>
                                                </li>
                                                <li>
                                                    <a href="#tab2" data-toggle="tab" class="step"> <span class="number">2</span><br />
														<span class="desc"><i class="icon-ok"></i> Notes</span>
													</a>
                                                </li>
                                                <li>
                                                    <a href="#tab3" data-toggle="tab" class="step active"> <span class="number">3</span><br /> <span class="desc"><i class="icon-ok"></i> Print Booking Confirmation</span> </a>
                                                </li>
                                                <li>
                                                    <a href="#tab4" data-toggle="tab" class="step"> <span class="number">4</span><br /> <span class="desc"><i class="icon-ok"></i> FAQ & User Guide</span> </a>
                                                </li>
												
                                            </ul>
                                            <div id="bar" class="progress progress-striped" role="progressbar">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                            <div class="tab-content">
                                                
												<div class="alert alert-danger hide-default">
                                                    <button class="close" data-dismiss="alert"></button> You missed some fields. They have been highlighted. </div>
                                                <div class="alert alert-success hide-default">
                                                    
													<button class="close" data-dismiss="alert"></button> Good job! :-) </div>
                                                
												
												
												<div class="tab-pane active" id="tab1">
                                                    <h3 class="block padding-bottom-10px title_bar">Basic Information</h3>
                                                    <div class="row">
														<div class="col-md-1">
														</div>
														<div class="col-md-5">
															<div class="form-group">
																<label class="col-md-5">Booking Number<span class="required">*</span></label>
																<div class="col-md-6">
																	AMU840J000677CNJ
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">Century Code<span class="required">*</span></label>
																<div class="col-md-6">
																	CNJ
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">Company Code<span class="required">*</span></label>
																<div class="col-md-6">
																	
																	AMAZON EUROPE
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">Ship/Vendor Code<span class="required">*</span></label>
																<div class="col-md-6">
																
																	<select name="country" id="country_list" class="select2">
																		<option value="">GFPRW-G& F PRODUCTS</option>
																	</select>
																	
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">Ship Mode<span class="required">*</span></label>
																<div class="col-md-6">
																
																	<select name="country" id="country_list" class="select2">
																		<option value="">GFPRW-G& F PRODUCTS</option>
																	</select>
																	
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">Freight Type<span class="required">*</span></label>
																<div class="col-md-6">
																
																	<select name="country" id="country_list" class="select2">
																		<option value="">GFPRW-G& F PRODUCTS</option>
																	</select>
																	
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">Containers Required<span class="required">*</span></label>
																<div class="col-md-6">
																
																	<select name="country" id="country_list" class="select2">
																		<option value="">GFPRW-G& F PRODUCTS</option>
																	</select>
																	
																</div>
															</div>
														</div>
														<div class="col-md-5">
															<div class="form-group">
																<label class="col-md-6">Status<span class="required">*</span></label>
																<div class="col-md-6">
																	Draft
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">Booking Created<span class="required">*</span></label>
																<div class="col-md-6">
																	02/22/2017 12:46:56 PM
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">Booking Confirm Date<span class="required">*</span></label>
																<div class="col-md-6">
																	<input type="text" placeholder="Booking Confirm Date" class="form-control" name="rpassword" />
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">Vendor Reference Number</label>
																<div class="col-md-6">
																	<input type="text" placeholder="Booking Confirm Date" class="form-control" name="rpassword" />
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">Contant Name</label>
																<div class="col-md-6">
																	<input type="text" placeholder="Contant Name" class="form-control email" name="email" /> 
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">Contant Phone</label>
																<div class="col-md-6">
																	<input type="text" placeholder="Contant Phone" class="form-control email" name="email" /> 
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">Contant Fax</label>
																<div class="col-md-6">
																	<input type="text" placeholder="Contant Fax" class="form-control email" name="email" /> 
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">Contant Email</label>
																<div class="col-md-6">
																	<input type="text" class="form-control required email" name="email" 
																	placeholder="Contant Email"/> 
																</div>
															</div>
														
														</div>
														<div class="col-md-1">
														</div>
													</div>
													
													<h3 class="block padding-bottom-10px title_bar">Cargo</h3>
													<div class="row">
														<div class="col-md-1">
														</div>
														<div class="col-md-5">
															<div class="form-group">
																<label class="col-md-5">Country of Origin<span class="required">*</span></label>
																<div class="col-md-6">
																	<select name="country" id="country_list" class="select2" style="width: 160px;">
																		<option value="">United State</option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">Solid Wood Packing<span class="required">*</span></label>
																<div class="col-md-6">
																	<select name="country" class="select2" style="width: 160px;">
																		<option value="">No</option>
																	</select>	
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">Add/Edit Manufacturer<span class="required">*</span></label>
																<div class="col-md-6">
																	<select name="country" class="select2" style="width: 160px;">
																		<option value="">No</option>
																	</select>	
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">Name</label>
																<div class="col-md-6">
																	John Doe
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">Address 1</label>
																<div class="col-md-6">
																	123 New Road
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">Address 2</label>
																<div class="col-md-6">
																	123 New Road
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">City</label>
																<div class="col-md-6">
																	AZ
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">State</label>
																<div class="col-md-6">
																	AZ
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">Country Code</label>
																<div class="col-md-6">
																	United State
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">Postal Code</label>
																<div class="col-md-6">
																	000000
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">Sipping Mark<span class="required">*</span></label>
																<div class="col-md-6">
																	<select name="country" class="select2" style="width: 160px;">
																		<option value="">No</option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-5">Number of Pallets<span class="required">*</span></label>
																<div class="col-md-6">
																	<input type="text" class="form-control" name="Number of Pallets" 
																	placeholder="Number of Pallets"/> 
																</div>
															</div>
														</div>
														<div class="col-md-5">
															<div class="form-group">
																<label class="col-md-6">Export License Required<span class="required">*</span></label>
																<div class="col-md-6">
																	<select name="country" class="select2" style="width: 160px;">
																		<option value="">No</option>
																	</select>	
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">Containers Dangerous Goods(DG)/Non DG<span class="required">*</span></label>
																<div class="col-md-6">		
																	<select name="country" class="select2" style="width: 160px;">
																		<option value="">Select One</option>
																	</select>	
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">Name</label>
																<div class="col-md-6">
																	Joho Doe
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">Address 1</label>
																<div class="col-md-6">
																	12 New Road
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">Address 2</label>
																<div class="col-md-6">
																	12 New Road
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">City</label>
																<div class="col-md-6">
																	AZ
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">Province/State</label>
																<div class="col-md-6">
																	AZ
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">Country Code</label>
																<div class="col-md-6">
																	United State
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">Postal Code</label>
																<div class="col-md-6">
																	10005
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-6">GSP/Form A/EUR1 Applicable<span class="required">*</span></label>
																<div class="col-md-6">
																	<select name="country" class="select2" style="width: 160px;">
																		<option value="">Select One</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="col-md-1">
														</div>
													</div>
													
                                                </div>
												
												
                                                <div class="tab-pane" id="tab2">
                                                   	<h3 class="block padding-bottom-10px title_bar">Booking Notes</h3>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Please enter booking notes:</label>
                                                        <div class="col-md-8">
															<textarea rows="5" name="wysiwyg" class="form-control wysiwyg"></textarea>
														</div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-5">
                                                           
														</div>
														<div class="col-md-2">
                                                            <button class="btn btn-info">Submit Notes</button>
														</div>
                                                        <div class="col-md-5">
                                                           
														</div>
                                                    </div>
													
													<!--=== no-padding ===-->
													<div class="row">
														<div class="col-md-12">
															<div class="widget box">
																<div class="widget-header">
																	<h4><i class="icon-reorder"></i> Managed Table (<code>no-padding</code>)</h4>
																	<div class="toolbar no-padding">
																		<div class="btn-group">
																			<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
																		</div>
																	</div>
																</div>
																<div class="widget-content no-padding">
																	<table class="table table-striped table-bordered table-hover table-checkable datatable">
																		<thead>
																			<tr>
																				<th class="checkbox-column">
																					<input type="checkbox" class="uniform">
																				</th>
																				<th>First Name</th>
																				<th>Last Name</th>
																				<th class="hidden-xs">Username</th>
																				<th>Status</th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td class="checkbox-column">
																					<input type="checkbox" class="uniform">
																				</td>
																				<td>Joey</td>
																				<td>Greyson</td>
																				<td class="hidden-xs">joey123</td>
																				<td><span class="label label-success">Approved</span></td>
																			</tr>
																			<tr>
																				<td class="checkbox-column">
																					<input type="checkbox" class="uniform">
																				</td>
																				<td>Wolf</td>
																				<td>Bud</td>
																				<td class="hidden-xs">wolfy</td>
																				<td><span class="label label-info">Pending</span></td>
																			</tr>
																			<tr>
																				<td class="checkbox-column">
																					<input type="checkbox" class="uniform">
																				</td>
																				<td>Darin</td>
																				<td>Alec</td>
																				<td class="hidden-xs">alec82</td>
																				<td><span class="label label-warning">Suspended</span></td>
																			</tr>
																			<tr>
																				<td class="checkbox-column">
																					<input type="checkbox" class="uniform">
																				</td>
																				<td>Andrea</td>
																				<td>Brenden</td>
																				<td class="hidden-xs">andry</td>
																				<td><span class="label label-danger">Blocked</span></td>
																			</tr>
																			<tr>
																				<td class="checkbox-column">
																					<input type="checkbox" class="uniform">
																				</td>
																				<td>Joey</td>
																				<td>Greyson</td>
																				<td class="hidden-xs">joey123</td>
																				<td><span class="label label-success">Approved</span></td>
																			</tr>
																			<tr>
																				<td class="checkbox-column">
																					<input type="checkbox" class="uniform">
																				</td>
																				<td>Wolf</td>
																				<td>Bud</td>
																				<td class="hidden-xs">wolfy</td>
																				<td><span class="label label-info">Pending</span></td>
																			</tr>
																			<tr>
																				<td class="checkbox-column">
																					<input type="checkbox" class="uniform">
																				</td>
																				<td>Darin</td>
																				<td>Alec</td>
																				<td class="hidden-xs">alec82</td>
																				<td><span class="label label-warning">Suspended</span></td>
																			</tr>
																			<tr>
																				<td class="checkbox-column">
																					<input type="checkbox" class="uniform">
																				</td>
																				<td>Andrea</td>
																				<td>Brenden</td>
																				<td class="hidden-xs">andry</td>
																				<td><span class="label label-danger">Blocked</span></td>
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
													<!-- /no-padding -->
                                                </div>
												
												
												
												
												
                                                <div class="tab-pane" id="tab3">
                                                    <h3 class="block padding-bottom-10px">Confirm your account</h3>
                                                    <h4 class="form-section">Account</h4>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Username:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="username"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="email"></p>
                                                        </div>
                                                    </div>
                                                    <h4 class="form-section">Profile</h4>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Fullname:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="fullname"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Gender:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="gender"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Country:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="country"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Remarks:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="remarks"></p>
                                                        </div>
                                                    </div>
                                                    <h4 class="form-section">Billing</h4>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Card Holder Name:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="card_name"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Card Number:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="card_number"></p>
                                                        </div>
                                                    </div>
                                                </div>
												
												
												<div class="tab-pane" id="tab4">
                                                    <h3 class="block padding-bottom-10px">Confirm your account</h3>
                                                    <h4 class="form-section">Account</h4>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Username:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="username"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="email"></p>
                                                        </div>
                                                    </div>
                                                    <h4 class="form-section">Profile</h4>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Fullname:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="fullname"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Gender:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="gender"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Country:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="country"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Remarks:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="remarks"></p>
                                                        </div>
                                                    </div>
                                                    <h4 class="form-section">Billing</h4>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Card Holder Name:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="card_name"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Card Number:</label>
                                                        <div class="col-md-4">
                                                            <p class="form-control-static" data-display="card_number"></p>
                                                        </div>
                                                    </div>
                                                </div>
												
												
												
                                            </div>
                                        </div>
										
										
										
										
										
                                        <div class="form-actions fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a href="javascript:void(0);" class="btn button-previous"> <i class="icon-angle-left"></i> Back </a> <a href="javascript:void(0);" class="btn btn-primary button-next"> Continue <i class="icon-angle-right"></i> </a> <a href="javascript:void(0);" class="btn btn-success button-submit"> Submit <i class="icon-angle-right"></i> </a> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>	
				
				
				
			</div>
			<!-- /.container -->
		</div>
		<!-- Trigger the modal with a button -->
	</div>
	<script type="text/javascript">
            if (location.host == "envato.stammtec.de" || location.host == "themes.stammtec.de") {
                var _paq = _paq || [];
                _paq.push(["trackPageView"]);
                _paq.push(["enableLinkTracking"]);
                (function() {
                    var a = (("https:" == document.location.protocol) ? "https" : "http") + "://analytics.stammtec.de/";
                    _paq.push(["setTrackerUrl", a + "piwik.php"]);
                    _paq.push(["setSiteId", "17"]);
                    var e = document,
                        c = e.createElement("script"),
                        b = e.getElementsByTagName("script")[0];
                    c.type = "text/javascript";
                    c.defer = true;
                    c.async = true;
                    c.src = a + "piwik.js";
                    b.parentNode.insertBefore(c, b)
                })()
            };
        </script>
	
	