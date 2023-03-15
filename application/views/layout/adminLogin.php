<?php $scheme = $_SERVER['REQUEST_SCHEME']. '://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];  ?>
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

					<img src="<?php echo base_url('/assets/img/Logo2.svg'); ?>" alt="logo" width="150" class="logoclass"/>


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
						<li <?php if($scheme == site_url("administrator/dashboard")){ echo "class='activeAdmin'"; } ?>>
							<a href="<?php echo base_url('administrator/dashboard'); ?>" >
								Dashboard
							</a>
						</li>
						<li <?php if($scheme == site_url("administrator/cases")){ echo "class='activeAdmin'"; } ?>>
							<a href="<?php echo base_url('administrator/cases'); ?>" >
								Cases
							</a>
						</li>
						<li <?php if($scheme == site_url("administrator/ViewShipmentAll")){ echo "class='activeAdmin'"; } ?>>
							<a href="<?php echo base_url('administrator/ViewShipmentAll'); ?>" >
								Shipment
							</a>
						</li>
						
						<li <?php if($scheme == site_url("administrator/ViewController")){ echo "class='activeAdmin'";} ?>>
							<a href="<?php echo base_url('administrator/ViewController'); ?>" >
								User
							</a>
						</li>
						
						<li <?php if($scheme == site_url("administrator/Order")){ echo "class='activeAdmin'"; } ?>>
							<a href="<?php echo base_url('administrator/Order'); ?>" >
								Order
							</a>
						</li>
					</ul>
				</nav>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown hidden-xs hidden-sm"></li>
					<li>
						<div class="btn-group">
							<button class="btn btn-lg dropdown-toggle" data-toggle="dropdown" style="background: transparent; border: 0px !important;border-left: 0px !important;height: 48px;color: white;margin-top: 2px;">
								<i class="icon-globe"></i> 
								<i class="icon-caret-down small" style="font-size: 17px;"></i>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#" onclick="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/english'">English</a></li>
								<li><a href="#" onclick="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/chinese'">??</a></li>
							</ul>
						</div>
					</li>	

					<li class="dropdown user">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

							<!--<img alt="" src="<?php echo base_url(); ?>/assets/img/avatar1_small.jpg" />-->

							<i class="icon-male"></i>

							<span class="username">
								
								<?php echo $this->lang->line('Dashboard_Welcome_User'); ?>, Admin
								
							</span>

							<i class="icon-caret-down small"></i>

						</a>    

						
						<ul class="dropdown-menu">
						
							<li><a href="#"><i class="icon-user"></i><?php echo $this->lang->line('MyProfile'); ?></a></li>
							<li>
								<a href="<?php echo base_url(); ?>administrator/index/logout"><i class="icon-key"></i><?php echo $this->lang->line('Log_Out'); ?></a>
							</li>

						</ul>

					</li>

					<!-- /user login dropdown -->

				</ul>

				<!-- /Top Right Menu -->

			</div>

			<!-- /top navigation bar -->



		</header> <!-- /.header -->



		<div id="container">

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

	</body>

</html>
<style>
.activeAdmin{
	background-color: #2a4053 ! important;
    color: #ffffff ! important;
}
</style>