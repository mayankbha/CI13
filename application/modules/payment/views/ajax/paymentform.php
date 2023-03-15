<?php if(isset($this->data['error'])) { ?>
	<div class="alert alert-danger">
		<i class="icon-remove close" data-dismiss="alert"></i>

		<?php echo $this->data['error']; ?>
	</div>
<?php } ?>

<?php if(isset($this->data['success'])) { ?>
	<div class="alert alert-success">
		<i class="icon-remove close" data-dismiss="alert"></i>

		<?php echo $this->data['success']; ?>
	</div>
<?php } ?>

<br />

<div class="col-md-12">
	<!-- Tabs-->
	<div class="tabbable tabbable-custom">
		<ul class="nav nav-tabs">
			<li class="<?php if(!$this->session->flashdata('active_alipay_tab')) { echo "active"; }?>"><a href="#tab_1_1" data-toggle="tab"><img src="<?php echo base_url(); ?>assets/img/paypal.png" width="155px"/></a></li>
			<li class="<?php if($this->session->flashdata('active_alipay_tab')) { echo "active"; }?>"><a href="#tab_1_2" data-toggle="tab"><img src="<?php echo base_url(); ?>assets/img/alipay.png" width="170px"/></a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane <?php if(!$this->session->flashdata('active_alipay_tab')) { echo "active"; }?>" id="tab_1_1">
				<p>
					<div class="col-md-9">
						<div class="widget-content" id="paypal">
							<?php if(isset($this->data['paypalInfo']) && $this->data['paypalInfo'] != '') { ?>
								<?php echo $this->data['paypalInfo']; ?>
							<?php } ?>
						</div>
						
						<!-- /Validation Example 1 -->
					</div>
				</p>
			</div>
			<div class="tab-pane <?php if($this->session->flashdata('active_alipay_tab')) { echo "active"; }?>" id="tab_1_2">
				<p>
					<div class="col-md-9">
						<div class="widget-content" id="alipay">
							<?php if(isset($this->data['alipayInfo']) && $this->data['alipayInfo'] != '') { ?>
								<?php echo $this->data['alipayInfo']; ?>
							<?php } ?>
						</div>

						<!-- /Validation Example 1 -->
					</div>
				</p>
			</div>
		</div>
	</div>
	<!--END TABS-->
</div>