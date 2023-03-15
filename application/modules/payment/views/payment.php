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
							<a href="<?php echo base_url('payment/Payment'); ?>" title=""><?php echo $this->lang->line('Payment_Title'); ?></a>
						</li>
					</ul>

					
				</div>
				<!-- /Breadcrumbs line -->

				
				<!--=== Page Content ===-->
				<!--=== Statboxes ===-->
				<div class="row row-bg" style="min-height:750px ! important;padding-top: 0 !important;"> <!-- .row-bg -->
					<div class="col-sm-12 col-md-12">
						<div class="statbox widget setup_box">
							<div class="col-md-12">
								<h2><?php echo $this->lang->line('Payment_Title'); ?></h2>
								<div class="our_billing"><button data-toggle="modal" class="btn btn-success" style="background-color: #94B86E ! important; font-size: 14px !important;padding: 10px !important;" data-target="#paymentdetails"><?php echo $this->lang->line('Payment_Billing_Rule_Button'); ?></button></div>
							</div>

							<hr />

							<div id="paymentform">
								
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
								<?php echo $this->data['paymentform']; ?>
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

	<!-- Modal -->
	<div id="paymentdetails" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header model_color_header">
					<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
					<h4 class="modal-title model_color_title">Modal Header</h4>
				</div>
				<div class="modal-body">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
					Why do we use it?
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->