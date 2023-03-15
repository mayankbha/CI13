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
							<a href="<?php echo base_url('dashboard/Dashboard'); ?>" title=""><?php echo $this->lang->line('Dashboard_Setup'); ?></a>
						</li>
					</ul>
				</div>  
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				<div class="page-header">
					<div class="page-title">
						<h3><?php echo $this->lang->line('Dashboard_Title'); ?></h3>
						<span>Hello, <?php echo $this->session->userdata('user_session')['firstname']; ?> </span><br />
						
						<h5><?php echo $this->lang->line('Dashboard_Title_Instrctions'); ?> -</h5>			
					</div>
				<!-- /Page Header -->
				
				<!-- Page Stats -->
					<ul class="page-stats">
						<li>
							<div class="summary">
								<span>New orders</span>
								<h3>17,561</h3>
							</div>
							<div id="sparkline-bar" class="graph sparkline hidden-xs">20,15,8,50,20,40,20,30,20,15,30,20,25,20</div>
							<!-- Use instead of sparkline e.g. this:
							<div class="graph circular-chart" data-percent="73">73%</div>
							-->
						</li>
						<li>
							<div class="summary">
								<span>My balance</span>
								
								<a href="<?php echo base_url('financial/FinancialController');?>"><h3>$21,561.21</h3></a>
							</div>
							<div id="sparkline-bar2" class="graph sparkline hidden-xs">20,15,8,50,20,40,20,30,20,15,30,20,25,20</div>
						</li>
					</ul>
					<!-- /Page Stats -->
				</div>
			

				<!--=== Page Content ===-->
				<!--=== Statboxes ===-->
				<div class="row row-bg"> <!-- .row-bg -->
					<div class="col-sm-6 col-md-4">
						<div class="statbox widget box box-shadow setup_box">
							<div class="widget-content">
								
								<div class="ribbon-wrapper ribbon-top-left"> 
									<?php if(isset($this->data['warehouseModuleStatus']) && $this->data['warehouseModuleStatus'] == 1) { ?>
										<div class="ribbon blue"><?php echo $this->lang->line('Dashboard_Done_Label'); ?></div>
									<?php } else { ?>
										<div class="ribbon red"><?php echo $this->lang->line('Dashboard_Pending_Label'); ?></div>
									<?php } ?>
								</div>
									
								
								<div class="visual cyan setup_visual">
									<div class="setup_div">
										<label class="step_div_text">
											<a href="<?php echo base_url(); ?>warehouse" class="text_warehouse">
												<?php if($this->session->userdata('site_lang') && $this->session->userdata('site_lang') == "chinese"){ ?>
													<img src="<?php echo base_url('assets/img/china/warehouse1.png');?>" />
												<?php } else { ?>
													<img src="<?php echo base_url('assets/img/english/warehouse1.png');?>" />
												<?php } ?>
											</a>
										</label>
									</div>
								</div>
								<div class="title setup_visual"></div>
								<div class="value" style="font-size:25px;color:#4D7496;"></div>
								<span class="setup_more">Lorem Ipsum is simply dummy text of the printing.     <a class="" href="javascript:void(0);" data-toggle="modal" data-target="#WAREHOUSE"><?php echo $this->lang->line('Dashboard_Read_More'); ?></a> <i class="pull-right icon-angle-right"></i></span>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->

					<div class="col-sm-6 col-md-4">
						<div class="statbox widget box box-shadow setup_box">
							<div class="widget-content">
							
								
								<div class="ribbon-wrapper ribbon-top-left">
									<?php if(isset($this->data['paypalModuleStatus']) && $this->data['paypalModuleStatus'] == 1) { ?>
										<div class="ribbon blue"><?php echo $this->lang->line('Dashboard_Done_Label'); ?></div>
									<?php } else { ?>
										<div class="ribbon red"><?php echo $this->lang->line('Dashboard_Pending_Label'); ?></div>
									<?php } ?>
								</div>
									
								
								<div class="visual green setup_visual">
									<div class="setup_div">
										<label class="step_div_text">
											<a href="<?php echo base_url('payment/Payment'); ?>" class="text_warehouse">
										
												<?php if($this->session->userdata('site_lang') && $this->session->userdata('site_lang') == "chinese"){ ?>
													<img src="<?php echo base_url('assets/img/china/payment1.png');?>" />
												<?php } else { ?>
													<img src="<?php echo base_url('assets/img/english/payment1.png');?>" />
												<?php } ?>
										
											</a>
										</label>
									</div>
								</div>
								<div class="title setup_visual"></div>
								<div class="value"></div>
								<span class="setup_more">Lorem Ipsum is simply dummy text of the printing.     <a class="" href="javascript:void(0);" data-toggle="modal" data-target="#PAYMENTDETAILS"><?php echo $this->lang->line('Dashboard_Read_More'); ?> </a> <i class="pull-right icon-angle-right"></i></span>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->

					<div class="col-sm-6 col-md-4 hidden-xs">
						<div class="statbox widget box box-shadow setup_box">
							<div class="widget-content">
									
									
									
								<div class="ribbon-wrapper ribbon-top-left">
									<?php if(isset($this->data['amazonconfig']) && $this->data['amazonconfig'] == 1) { ?>
										<div class="ribbon blue"><?php echo $this->lang->line('Dashboard_Done_Label'); ?></div>
									<?php } else { ?>
										<div class="ribbon red"><?php echo $this->lang->line('Dashboard_Pending_Label'); ?></div>
									<?php } ?>
								</div>
									
								<div class="visual yellow setup_visual">
									<div class="setup_div">
										<label class="step_div_text">
											<a href="<?php echo base_url('amazon/Amazon'); ?>" class="text_warehouse">
												<?php if($this->session->userdata('site_lang') && $this->session->userdata('site_lang') == "chinese"){ ?>
													<img src="<?php echo base_url('assets/img/china/marketplace1.png');?>" />
												<?php } else { ?>
													<img src="<?php echo base_url('assets/img/english/marketplace1.png');?>" />
												<?php } ?>
											</a>	
										</label>
									</div>
								</div>
								<div class="title setup_visual"></div>
								<div class="value"></div>
								<span class="setup_more">Lorem Ipsum is simply dummy text of the printing.     <a class="" href="javascript:void(0);" data-toggle="modal" data-target="#MARKETPLACE"><?php echo $this->lang->line('Dashboard_Read_More'); ?> </a> <i class="pull-right icon-angle-right"></i></span>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->



					<div class="col-sm-6 col-md-4">
						<div class="statbox widget box box-shadow setup_box">
							<div class="widget-content">
								
								<div class="ribbon-wrapper ribbon-top-left">
									<div class="ribbon yellow"><?php echo $this->lang->line('coming_soon'); ?></div>
								</div>
							
								<div class="visual green setup_visual">
									<div class="setup_div">
										<label class="step_div_text">
											<a href="<?php echo base_url('shipstation/Shipstation'); ?>" class="text_warehouse">
												<?php if($this->session->userdata('site_lang') && $this->session->userdata('site_lang') == "chinese"){ ?>
													<img src="<?php echo base_url('assets/img/china/labels1.png');?>" />
												<?php } else { ?>
													<img src="<?php echo base_url('assets/img/english/labels1.png');?>" />
												<?php } ?>
											</a>
										</label>
									</div>
								</div>
								<div class="title setup_visual"></div>
								<div class="value"></div>
								<span class="setup_more">Lorem Ipsum is simply dummy text of the printing.     <a class="" href="javascript:void(0);" data-toggle="modal" data-target="#LABELS"><?php echo $this->lang->line('Dashboard_Read_More'); ?> </a> <i class="pull-right icon-angle-right"></i></span>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->

					<div class="col-sm-6 col-md-4 hidden-xs">
						<div class="statbox widget box box-shadow setup_box">
							<div class="widget-content">
									<div class="ribbon-wrapper ribbon-top-left">
										<div class="ribbon yellow"><?php echo $this->lang->line('coming_soon'); ?></div>
									</div>
								
								<div class="visual yellow setup_visual">
									<div class="setup_div">
										<label class="step_div_text">
											<?php if($this->session->userdata('site_lang') && $this->session->userdata('site_lang') == "chinese"){ ?>
												<img src="<?php echo base_url('assets/img/china/marketplace1.png');?>" />
											<?php } else { ?>
												<img src="<?php echo base_url('assets/img/english/marketplace1.png');?>" />
											<?php } ?>
										</label>
									</div>
								</div>
								<div class="title setup_visual"></div>
								<div class="value"></div>
								<span class="setup_more">Lorem Ipsum is simply dummy text of the printing.     <a class="" href="javascript:void(0);" data-toggle="modal" data-target="#MARKETPLACE"><?php echo $this->lang->line('Dashboard_Read_More'); ?> </a> <i class="pull-right icon-angle-right"></i></span>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
					
					<div class="col-sm-6 col-md-4">
						<div class="statbox widget box box-shadow setup_box">
							<div class="widget-content">
									<div class="ribbon-wrapper ribbon-top-left">
										<div class="ribbon yellow"><?php echo $this->lang->line('coming_soon'); ?></div>
									</div>
								<div class="visual cyan setup_visual">
									<div class="setup_div">
										<label class="step_div_text">
											<?php if($this->session->userdata('site_lang') && $this->session->userdata('site_lang') == "chinese"){ ?>
												<img src="<?php echo base_url('assets/img/china/carrier1.png');?>" />
											<?php } else { ?>
												<img src="<?php echo base_url('assets/img/english/carrier1.png');?>" />
											<?php } ?>
										</label>
									</div>
								</div>
								<div class="title setup_visual"></div>
								<div class="value"></div>
								<span class="setup_more">Lorem Ipsum is simply dummy text of the printing.     <a class="" href="javascript:void(0);" data-toggle="modal" data-target="#CARRIER"><?php echo $this->lang->line('Dashboard_Read_More'); ?> </a> <i class="pull-right icon-angle-right"></i></span>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
					
				</div> <!-- /.row -->
				<!-- /Statboxes -->
			</div>
			<!-- /.container -->


		</div>
		<!-- Trigger the modal with a button -->
	</div>

	
	<!-- Modal -->
	<div id="WAREHOUSE" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header model_color_header">
					<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
					<h4 class="modal-title model_color_title">Modal Header</h4>
				</div>
				<div class="modal-body">
					<p>Some text in the modal.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	
	<!-- Modal -->
	<div id="PAYMENTDETAILS" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header model_color_header">
					<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
					<h4 class="modal-title model_color_title">Modal Header</h4>
				</div>
				<div class="modal-body">
					<p>Some text in the modal.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	
	<!-- Modal -->
	<div id="SHIPSTATION" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content ">
				<div class="modal-header model_color_header">
					<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
					<h4 class="modal-title model_color_title">Modal Header</h4>
				</div>
				<div class="modal-body">
					<p>Some text in the modal.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	
	<!-- Modal -->
	<div id="CARRIER" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header model_color_header">
					<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
					<h4 class="modal-title model_color_title">Modal Header</h4>
				</div>
				<div class="modal-body">
					<p>Some text in the modal.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	
	<!-- Modal -->
	<div id="LABELS" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header model_color_header">
					<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
					<h4 class="modal-title model_color_title">Modal Header</h4>
				</div>
				<div class="modal-body">
					<p>Some text in the modal.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	
	<!-- Modal -->
	<div id="MARKETPLACE" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header model_color_header">
					<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
					<h4 class="modal-title model_color_title">Modal Header</h4>
				</div>
				<div class="modal-body">
					<p>Some text in the modal.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
