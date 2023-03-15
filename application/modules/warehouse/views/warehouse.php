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
						<a href="<?php echo base_url('dashboard/Dashboard'); ?>"><?php echo $this->lang->line('Dashboard_Title'); ?></a>
					</li>
					<li class="current">
						<a href="<?php echo base_url(); ?>warehouse" title=""><?php echo $this->lang->line('Dashboard_Warhouse_Button'); ?></a>
					</li>
				</ul>

			
			</div>
			<!-- /Breadcrumbs line -->

			
			<!--=== Page Content ===-->
			<!--=== Statboxes ===-->
			<div class="row row-bg" style="padding-top: 0 !important;height:400px;"> <!-- .row-bg -->
				<div class="col-sm-12 col-md-12">
					<div class="statbox widget setup_box">
						<h2><?php echo $this->lang->line('Warehouse_Address_title'); ?></h2>

						<h5><?php echo $this->lang->line('Setup_warehouse_location'); ?></h5>

						<?php if(isset($this->data['error'])) { ?>
							<div class="alert alert-danger">
								<i class="icon-remove close" data-dismiss="alert"></i>

								<?php echo $this->data['error']; ?>
							</div>
						<?php } ?>

						<?php //if(isset($this->data['success'])) { ?>
							<div id="warehouse_success_div" class="alert alert-success" style="display: none;">
								<i class="icon-remove close" data-dismiss="alert"></i>
								<?php echo $this->lang->line('Your_information_has_been_saved_successfully'); ?>
								
							</div>
						<?php //} ?>

						<br />
	
						<?php //echo "<pre>"; print_r($this->data['warehouseInfo']); ?>

						<form class="form-horizontal row-border" id="validate-warehouse-form" method="post" action="">
							<input type="hidden" name="chk_val" id="chk_val" value="<?php if(isset($this->data['warehouseInfo']->status) && $this->data['warehouseInfo']->status == 1) { echo 1; } else { echo 0; } ?>" />

							<div class="col-sm-3 col-md-3" style="margin-top:20px;">
								<input type="checkbox" class="status" id="warehouse_chk" name="status" id="status" <?php if(isset($this->data['warehouseInfo']->status) && $this->data['warehouseInfo']->status == 1) { ?>checked="checked"<?php } ?> value="1" />

								&nbsp;&nbsp;&nbsp;&nbsp;

								<img src="<?php echo base_url(); ?>assets/img/us_flag.png" />
							</div>
							
							<div class="col-sm-9 col-md-9" style="margin-top:20px;">
								<span class="address_warehouse"><?php echo $this->lang->line('Company_Information'); ?></span>

								<address style="line-height:2 !important;"> <strong><?php echo $this->lang->line('warehouse_address'); ?>, <?php echo $this->lang->line('warehouse_Inc'); ?>.</strong>

								<br>

								795 Lorem Ipsum, Suite 600<br> San industry's, CA 94107

								<br>

								<abbr title="Phone">P:</abbr> (000) 111-0101 </address>
							</div>

							<div class="form-group">
								<div class="col-md-6" style="float:right;margin-right: 121px;">
									<?php if(!isset($this->data['warehouseInfo']->status)) { ?>
										<?php $display = ""; ?>
									<?php } else { ?>
										<?php $display = "none"; ?>
									<?php } ?>

									<input type="submit" style="display: <?php echo $display; ?>" id="warehouse_form_btn" value="<?php echo $this->lang->line('warehouse_Save_button'); ?>" class="btn btn-info" style="float: right;" />
								</div>

								<div class="col-md-6">
									
								</div> 
							</div>
						</form>
					</div> <!-- /.smallstat -->
				</div> <!-- /.col-md-12 -->
			</div> <!-- /.row -->
			<!-- /Statboxes -->
		</div>
		<!-- /.container -->


	</div>
	<!-- Trigger the modal with a button -->
</div>