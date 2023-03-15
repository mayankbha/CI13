 
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />

		<title><?php echo $title_for_layout; ?></title>


		<?php echo $css_for_layout; ?>

		<?php echo $js_for_layout; ?>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="<?php echo base_url(); ?>assets/js/libs/html5shiv.js"></script>
		<![endif]-->

		<script type="text/javascript">var base_url = "<?php echo base_url(); ?>";</script>
		<script type="text/javascript">
		$(document).ready(function() {
			"use strict";	
			Login.init(); // Init login JavaScript
		});		
		</script>
		
	</head>


	<body class="login">
		<nav class="navbar_login navbar_default_login">
			<div class="container">
				<div class="navbar_header_login">
					<img src="<?php echo base_url('assets/img/logo1.svg');?>" alt="logo" width="150"/>
				</div>
				<div id="navbar" class="navbar-collapse collapse">

					<ul class="nav navbar-nav navbar-right">
						<li>
							<div class="btn-group" style="margin:0px 71px 0 0;">
								<button class="btn btn-lg dropdown-toggle" data-toggle="dropdown" style="background: transparent; border: 0px !important;border-left: 0px !important;height: 48px;color: black;margin-right: 88px;margin-top: 7px;">
									<i class="icon-globe"></i> 
									<i class="icon-caret-down small"></i>
								</button>
								<ul class="dropdown-menu selectbox3">
									<li>
										<a href="#" style="color: black ! important;" onclick="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/english'">English</a>
									</li>
									<li>
										<a href="#" style="color: black ! important;" onclick="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/chinese'">中文</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
					
				</div><!--/.nav-collapse -->
			</div>
		</nav>
		
		<!-- Logo -->
		<div class="logo">
			
		</div>
		<!-- /Logo -->
		<?php echo $content_for_layout; ?>
	</body>
	
</html>