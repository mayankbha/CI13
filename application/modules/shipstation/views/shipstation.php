				<!--=== Navigation ===-->
				<!--<ul id="nav">
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
							<a href="<?php echo base_url(); ?>dashboard"><?php echo $this->lang->line('Dashboard_Title'); ?></a>
						</li>
						<li class="current">
							<a href="<?php echo base_url(); ?>payment" title=""><?php echo $this->lang->line('Payment_Title'); ?></a>
						</li>
					</ul>

				</div>
				<!-- /Breadcrumbs line -->

				
				<!--=== Page Content ===-->
				<!--=== Statboxes ===-->
				<div class="row row-bg" style="padding-top: 0 !important;height:425px;"> <!-- .row-bg -->
					<div class="col-sm-12 col-md-12">
						<div class="statbox widget setup_box">
							<h2><?php echo $this->lang->line('Shipstation_Title'); ?></h2>
							<h5><?php echo $this->lang->line('Shipstation_Link_Account_Message'); ?></h5>

							<hr />

							<div id="shipstation">
								<?php if($this->session->flashdata('error_msg')) { ?>
									<div class="alert alert-danger">
										<?php echo $this->session->flashdata('error_msg'); ?>
									</div>
								<?php } ?>

								<?php if($this->session->flashdata('success_msg')) { ?>
									<div class="alert alert-success">
										<?php echo $this->session->flashdata('success_msg'); ?>
									</div>
								<?php } ?>
							
								<?php echo $this->data['shipstationInfo']; ?>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
				<!-- /Statboxes -->
			</div>
			<!-- /.container -->
		</div>
		<!-- Trigger the modal with a button -->
	</div>