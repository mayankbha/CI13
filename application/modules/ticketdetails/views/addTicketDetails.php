	<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				<div class="crumbs">
					<ul id="breadcrumbs" class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="<?php echo base_url('dashboard/Dashboard');?>"><?php echo $this->lang->line('Dashboard_Title'); ?></a>
						</li>
						<li class="current">
							<a href="<?php echo base_url('ticketdetails/TicketdetailsController/addTicket');?>" title="">Create Ticket</a>
						</li>
					</ul>
				</div>
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3>Create Ticket</h3>
						<span>Hello, <?php echo $this->session->userdata("user_session")["firstname"]; ?></span>
					</div>
				</div>
				<hr />
				<!-- /Page Header -->
				<div class="row">
					<!--=== Validation Example 3 ===-->
					<div class="col-md-3">
					</div>
					<div class="col-md-6">
						<div id="error_message" class="alert alert-danger" style="display:none;">
							Please all field required
						</div>
						<div class="">
							<div class="widget-header">
							</div>
							<div class="widget-content">
								<form class="form-horizontal row-border" id="validate-ticket-form" method="POST" action="#">
								
									<div class="form-group">
										<label class="col-md-3 control-label">Email <span class="required">*</span></label>
										<div class="col-md-9">
											<input type="email" name="email" id="email" class="form-control required PriorityCss">
										</div>
									</div>
								
									<div class="form-group">
										<label class="col-md-3 control-label">Phone <span class="required">*</span></label>
										<div class="col-md-9">
											<input type="text" name="phone" id="phone" class="form-control required PriorityCss" data-mask="(999) 999-9999">
										</div>
									</div>
								
									<div class="form-group">
										<label class="col-md-3 control-label">Choose Priority <span class="required">*</span></label>
										<div class="col-md-9">
											<select name="priority" id="priority" class="form-control required PriorityCss">
												<option value="normal" selected>Normal</option>
												<option value="high">High</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Choose Category <span class="required">*</span></label>
										<div class="col-md-9">
											<select name="category" id="category" class="form-control required PriorityCss" >
												<option value="general" selected>General</option>
												<option value="technical" >Technical</option>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">Subject <span class="required">*</span></label>
										<div class="col-md-9">
											<input type="text" name="subject" id="subject" class="form-control required PriorityCss">
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">Body <span class="required">*</span></label>
										<div class="col-md-9">
											<textarea rows="3" cols="5" name="body" style="height:34px ! improtant;" class="limited form-control required" data-limit="250" id="body" ></textarea>
											<span class="help-block" id="limit-text" style="color:green;"></span>
										</div>
									</div>
									<input type="hidden" name="hubway" id="hubwayvalue" value="1">
									<div class="form-actions">
										<input type="submit" value="Submit" name="Save Information" class="btn btn-primary pull-right">
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3">
					</div>
				</div>
				<!-- /Page Content -->
			</div>
			<!-- /.container -->

		</div>