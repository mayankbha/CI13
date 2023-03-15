<?php $scheme = $_SERVER['REQUEST_SCHEME']. '://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
ini_set('memory_limit', '-1');
//$sql = 'SELECT * FROM `alipay` WHERE user_id = "$this->session->userdata("user_session")["id"]"';
 //$row = $sql->row_array();
$this->db->select('*');
$this->db->from('alipay');
$this->db->where('user_id', $this->session->userdata("user_session")["id"]);
$query = $this->db->get();
$row = $query->result();
$alipayStatus = @$row[0]->access_token;

$this->db->select('*');
$this->db->from('paypal');
$this->db->where('user_id', $this->session->userdata("user_session")["id"]);
$query = $this->db->get();
$row2 = $query->result();
$paypalStatus = @$row2[0]->access_token;

$this->db->select('*');
$this->db->from('warehouse');
$this->db->where('user_id', $this->session->userdata("user_session")["id"]);
$query = $this->db->get();
$row3 = $query->result();
$warehousestatus = @$row3[0]->status;


$this->db->select('*');
$this->db->from('config');
$this->db->where('user_id', $this->session->userdata("user_session")["id"]);
$query = $this->db->get();
$row4 = $query->result();
$amazonstatus = @$row4[0]->access_key;


?>
<html>

	<head>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />



		<title><?php echo $title_for_layout; ?></title>



		<?php echo $css_for_layout; ?>



		<?php echo $js_for_layout; ?>



		<script type="text/javascript">var base_url = "<?php echo base_url(); ?>";</script>
	</head>



	<body>

		<!-- Header -->

		<header class="header navbar navbar-fixed-top" role="banner">

			<!-- Top Navigation Bar -->

			<div class="container">



				<!-- Only visible on smartphones, menu toggle -->

				 <ul class="nav navbar-nav">

					<li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>

				</ul>



				<!-- Logo -->

				<a class="navbar-brand" href="#">

					<img src="<?php echo base_url('/assets/img/Logo2.svg'); ?>" alt="logo" width="150"  class="logoclass"/>


				</a>

				<!-- /logo -->



				<!-- Sidebar Toggler -->

			<!--	<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">

					<i class="icon-reorder"></i>

				</a>-->

				<!-- /Sidebar Toggler -->


				<!-- Top Left Menu -->
				<nav id="ddmenu">
					<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
						<li class="">

							<a href="<?php echo base_url('dashboard/Dashboard'); ?>" >
								<?php echo $this->lang->line('Dashboard_Setup'); ?>
							</a>
							
							
						</li>
						<?php if(empty($alipayStatus || $paypalStatus && $warehousestatus && $amazonstatus)){?>
				
						<?php } else { ?>
							<li class="">

								<a href="#">
									<?php echo $this->lang->line('Overview'); ?>
									

								</a>

							</li>
							<?php if($this->session->userdata('site_lang') && $this->session->userdata('site_lang') == "chinese"){ ?>
							
							<li class="full-width borderfixied" <?php if($scheme == site_url("shipping/ShippingController") || $scheme == site_url("shipping/view_shipment")){ echo "id='active3'"; } ?>>
							
								<span class="top-heading" >
									<a href="<?php echo base_url('shipping/Shipping');?>" >
										<?php echo $this->lang->line('Shipping'); ?>
									</a>		
								</span>
								
								<div class="dropdown dropdownShip" <?php if($scheme == site_url("shipping/Shipping") || $scheme == site_url("shipping/Shipping/view_shipment")){ echo "id='active2'"; } ?> <?php if($scheme == site_url("shipping/InventoryController/inventoryView") || $scheme == site_url("shipping/InventoryController/sellingProduct")){ echo "style='z-index: 96;'"; } ?>>
									<div class="dd-inner">
										<ul class="column" style="margin-left:-1396px;border:1px solid #2A4053;" <?php if($scheme == site_url("shipping")){ echo "id='select_menu'"; } ?>>
											<li class="current1">
												
												<a href="<?php echo base_url('shipping/Shipping');?>" >
													<h6 style="font-size:13px ! important;" align="center">
														<?php echo $this->lang->line('Create_Shipment'); ?>
													</h6>
												</a>
												
											</li>
										</ul>
										<ul class="column" style="margin-left: -3px;border:1px solid #2A4053;" <?php if($scheme == site_url("shipping/view_shipment")){ echo "id='select_menu1'"; } ?>>
											<li><a href="<?php echo base_url('shipping/Shipping/view_shipment');?>"><h6 style="font-size:13px ! important;" align="center"><?php echo $this->lang->line('View_Shipment'); ?></h6></a></li>
										</ul>
										
									</div>
								</div>
							</li>
							<?php } else { ?>

							<li class="full-width borderfixied" <?php if($scheme == site_url("shipping/Shipping") || $scheme == site_url("shipping/Shipping/view_shipment")){ echo "id='active3'"; } ?> >
							
								<span class="top-heading" ><?php echo $this->lang->line('Shipping'); ?></span>
								
								<div class="dropdown dropdownShip" <?php if($scheme == site_url("shipping/Shipping") || $scheme == site_url("shipping/Shipping/view_shipment")){ echo "id='active2'"; } ?> >


									<div class="dd-inner">
										<ul class="column" style="margin-left:-1396px;border:1px solid #2A4053;" <?php if($scheme == site_url("shipping/Shipping")){ echo "id='select_menu'"; } ?>>
											<li class="current1">
												
												<a href="#" class="Create_Shipment" >
													<h6 style="font-size:13px ! important;" align="center">
														<?php echo $this->lang->line('Create_Shipment'); ?>
													</h6>
												</a>
												
											</li>
										</ul>
										<ul class="column" style="margin-left: -3px;border:1px solid #2A4053;" <?php if($scheme == site_url("shipping/Shipping/view_shipment")){ echo "id='select_menu1'"; } ?>>
											<li><a href="<?php echo base_url('shipping/Shipping/view_shipment');?>"><h6 style="font-size:13px ! important;" align="center"><?php echo $this->lang->line('View_Shipment'); ?></h6></a></li>
										</ul>
										
									</div>
								</div>
							</li>
							<?php } ?>

							<li class="full-width borderfixied" <?php if($scheme == site_url("shipping/InventoryController/inventoryView") || $scheme == site_url("shipping/InventoryController/sellingProduct")){ echo "id='active4'"; } ?>>
							
								<span class="top-heading" ><?php echo $this->lang->line('Inventory'); ?></span>

								<div class="dropdown" <?php if($scheme == site_url("shipping/InventoryController/inventoryView") || $scheme == site_url("shipping/InventoryController/sellingProduct")){ echo "id='activeInventory'"; } ?> >
									
									<div class="dd-inner">
										
										<ul class="column" style="margin-left:-1182px;border:1px solid #2A4053;" <?php if($scheme == site_url("shipping/InventoryController/inventoryView")){ echo "id='select_menuinventory1'"; } ?>>
											<li class="current1">
												
												<a href="<?php echo base_url('shipping/InventoryController/inventoryView');?>" >
													<h6 style="font-size:13px ! important;" align="center">
														<?php echo $this->lang->line('view_inventory'); ?>
													</h6>
												</a>
												
											</li>
										</ul>
										<ul class="column" style="margin-left: -3px;border:1px solid #2A4053;" <?php if($scheme == site_url("shipping/InventoryController/sellingProduct")){ echo "id='select_menuinventory2'"; } ?>>
											<li><a href="<?php echo base_url('shipping/InventoryController/sellingProduct');?>">
												<h6 style="font-size:13px ! important;" align="center"><?php echo $this->lang->line('manage_cost'); ?></h6></a></li>
										</ul>
										
									</div>
								</div>
								 
							</li>
							<li class="full-width borderfixied" <?php if($scheme == site_url("order/Createorder") || $scheme == site_url("order/Createorder/vieworder")){ echo "id='active4'"; } ?>>
       
								<span class="top-heading" >Order</span>
								<div class="dropdown" <?php if($scheme == site_url("order/Createorder") || $scheme == site_url("order/Createorder/vieworder")){ echo "id='activeInventory'"; } ?> >
									<div class="dd-inner">
										<ul class="column" style="margin-left:-974;border:1px solid #2A4053;" <?php if($scheme == site_url("order/Createorder")){ echo "id='orderView1'"; } ?>>
										   <li class="current1">
											<a href="<?php echo base_url('order/order');?>" >
												<h6 style="font-size:13px ! important;" align="center">
												Create Order
												</h6>
											</a>
										   </li>
										</ul>
									  <ul class="column" style="margin-left: -3px;border:1px solid #2A4053;" <?php if($scheme == site_url("order/Createorder/vieworder")){ echo "id='orderView2'"; } ?>>
										<li><a href="<?php echo base_url('order/order/view_order');?>">
											<h6 style="font-size:13px ! important;" align="center">
											View Order
											</h6></a>
										</li>
									  </ul>
									</div>
								</div>
							</li>
						<?php }?>
						
					</ul>
				</nav>



				<!-- Top Right Menu -->

				<ul class="nav navbar-nav navbar-right">
					<!-- Messages -->
					<li class="dropdown hidden-xs hidden-sm"></li>
					<li>
						<div class="btn-group">
							<button class="btn btn-lg dropdown-toggle" data-toggle="dropdown" style="background: transparent; border: 0px !important;border-left: 0px !important;height: 48px;color: white;margin-top: 2px;">
								<i class="icon-globe"></i> 
								<i class="icon-caret-down small" style="font-size: 17px;"></i>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#" onclick="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/english'">English</a></li>
								<li><a href="#" onclick="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/chinese'">中文</a></li>
							</ul>
						</div>
					</li>	



					

					<!-- User Login Dropdown -->

					<li class="dropdown user">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

							<!--<img alt="" src="<?php echo base_url(); ?>/assets/img/avatar1_small.jpg" />-->

							<i class="icon-male"></i>

							<span class="username"><?php echo $this->lang->line('Dashboard_Welcome_User'); ?>, <?php echo $this->session->userdata('user_session')['firstname']; ?> </span>

							<i class="icon-caret-down small"></i>

						</a>    

						
						<ul class="dropdown-menu">
						
							<li><a href="<?php echo base_url(); ?>dashboard/MyProfileController"><i class="icon-user"></i><?php echo $this->lang->line('MyProfile'); ?></a></li>
							<li><a href="<?php echo base_url(); ?>ticketdetails/TicketdetailsController"><i class="icon-ticket"></i>Get Support</a></li>
							
							<li><a href="<?php echo base_url(); ?>user/LogedController/logout" class="logout"><i class="icon-key"></i><?php echo $this->lang->line('Log_Out'); ?></a></li>

						</ul>

					</li>

					<!-- /user login dropdown -->

				</ul>

				<!-- /Top Right Menu -->

			</div>

			<!-- /top navigation bar -->



		</header> <!-- /.header -->



		<div id="container" <?php if($scheme == site_url("shipping/Shipping") || $scheme == site_url("shipping/Shipping/view_shipment")){ echo "style='margin-top: 97px ! important;'"; }else if($scheme == site_url("shipping/InventoryController/inventoryView") || $scheme == site_url("shipping/InventoryController/sellingProduct")){ echo "style='margin-top: 97px ! important;'"; }else if($scheme == site_url("order/Createorder") || $scheme == site_url("order/Createorder/vieworder")){ echo "style='margin-top: 97px ! important;'"; } ?>>

			<!--<div id="sidebar" class="sidebar-fixed">

				<div id="sidebar-content" style="display:none;">

					<!-- Search Results -->

					<!--<div class="sidebar-search-results">

						<i class="icon-remove close"></i>

					</div> <!-- /.sidebar-search-results -->



		<?php echo $content_for_layout; ?>



		<div class="clear"></div>

		<!-- Modal -->
		<div id="accountremove" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header model_color_header">
						<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
						<h4 class="modal-title model_color_title"><?php echo $this->lang->line('Payment_Delete_Account'); ?></h4>
					</div>
					<div class="modal-body">
						<p><?php echo $this->lang->line('deletemsg'); ?></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" id="remove-yes-button"><?php echo $this->lang->line('Yes'); ?></button>
						<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('No'); ?></button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		
		
		<!-- Modal -->
		<div id="deleteRecordModel" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header model_color_header">
						<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
						<h4 class="modal-title model_color_title">Delete product</h4>
					</div>
					<div class="modal-body">
						<p>Do you really want to delete this product ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" id="yes-button"><?php echo $this->lang->line('Yes'); ?></button>
						<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('No'); ?></button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		
		
		<!-- Modal -->
		<div id="reconfirmModel" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header model_color_header">
						<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
						<h4 class="modal-title model_color_title">Re-confirm</h4>
					</div>
					<div class="modal-body">
						<p>Please re-confirm that all the details you provided are correct. As later on you wont be able to Edit any of the data</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" id="reconfirm-button"><?php echo $this->lang->line('Yes'); ?></button>
						<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('No'); ?></button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		
		
		<!-- Modal -->
		<div id="reconfirmModel_1" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header model_color_header">
						<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
						<h4 class="modal-title model_color_title">Re-confirm</h4>
					</div>
					<div class="modal-body">
						<p>Please re-confirm that all the details you provided are correct. As later on you wont be able to Edit any of the data</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" id="reconfirm-button_1"><?php echo $this->lang->line('Yes'); ?></button>
						<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('No'); ?></button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div id="confirm" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header model_color_header">
						<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
						<h4 class="modal-title model_color_title">Re-confirm</h4>
					</div>
					<div class="modal-body">
						<p class="msg"></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" id="delete"><?php echo $this->lang->line('Yes'); ?></button>
						<button type="button" class="btn" data-dismiss="modal"><?php echo $this->lang->line('No'); ?></button>
					</div>
				</div>
			</div>
		</div>
		<div id="confirmCostModel" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header model_color_header">
						<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
						<h4 class="modal-title model_color_title">Unable to Proceed</h4>
					</div>
					<div class="modal-body">
						<p class="msg1">Could'nt find the Cost associated with the items in the Shipment, </br>Please manage the Cost in Manage Inventory tab </p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn" data-dismiss="modal">Ok</button>
					</div>
				</div>
			</div>
		</div>
		
		<div id="confirmDeleteShipment" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header model_color_header">
						<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
						<h4 class="modal-title model_color_title">Confirm</h4>
					</div>
					<div class="modal-body">
						<p class="msg2">Do you really want to Delete this Shipment ? Once deleted, you won't be able to restore it.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" id="deleteshipment"><?php echo $this->lang->line('Yes'); ?></button>
						<button type="button" class="btn" data-dismiss="modal"><?php echo $this->lang->line('No'); ?></button>
					</div>
				</div>
			</div>
		</div>
		<div id="markusShipment" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header model_color_header">
						<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
						<h4 class="modal-title model_color_title">Confirm</h4>
					</div>
					<div class="modal-body">
						<p class="msg2">Do you really want to markusShipment ? </p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" id="markusShipment"><?php echo $this->lang->line('Yes'); ?></button>
						<button type="button" class="btn" data-dismiss="modal"><?php echo $this->lang->line('No'); ?></button>
					</div>
				</div>
			</div>
		</div>
		<div id="cancel_Order_model" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header model_color_header">
						<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
						<h4 class="modal-title model_color_title">Confirm</h4>
					</div>
					<div class="modal-body">
						<p class="msg2">Do you really want to cancel Order ? </p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" id="cancel_order_btn"><?php echo $this->lang->line('Yes'); ?></button>
						<button type="button" class="btn" data-dismiss="modal"><?php echo $this->lang->line('No'); ?></button>
					</div>
				</div>
			</div>
		</div>
	</body>

</html>
<script type="text/javascript" defer="defer" src="http://hubway.upworkdevelopers.com/assets/plugins/pickadate/picker.date.js"></script>
<script type="text/javascript" defer="defer" src="http://hubway.upworkdevelopers.com/assets/js/demo/form_wizard.js"></script>