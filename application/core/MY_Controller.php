<?php
	
	
	class Login_Controller extends CI_Controller {
		//Site global layout
		public $layout_view = 'layout/login_default';

		function __construct() {
			parent::__construct();

			//Layout library loaded site wide
			$this->load->library('layout');

			$this->layout->css(base_url().'assets/bootstrap/css/bootstrap.min.css');
			$this->layout->css(base_url().'assets/css/main.css');
			$this->layout->css(base_url().'assets/css/plugins.css');
			$this->layout->css(base_url().'assets/css/responsive.css');
			$this->layout->css(base_url().'assets/css/icons.css');
			$this->layout->css(base_url().'assets/css/login.css');
			$this->layout->css(base_url().'assets/css/fontawesome/font-awesome.min.css');
			$this->layout->css(base_url().'assets/css/plugins/uniform.css');
			$this->layout->css('http://fonts.googleapis.com/css?family=Raleway');
			
			//safari css check
			$ua = $_SERVER["HTTP_USER_AGENT"];      // Get user-agent of browser

			$safariorchrome = strpos($ua, 'Safari') ? true : false;     // Browser is either Safari or Chrome (since Chrome User-Agent includes the word 'Safari')
			$chrome = strpos($ua, 'Chrome') ? true : false;             // Browser is Chrome

			if($safariorchrome == true AND $chrome == false){ $safari = true; }     // Browser should be Safari, because there is no 'Chrome' in the User-Agent

			// Check for version numbers 
			$v1 = strpos($ua, 'Version/1.') ? true : false;
			$v2 = strpos($ua, 'Version/2.') ? true : false;
			$v3 = strpos($ua, 'Version/3.') ? true : false;
			$v4 = strpos($ua, 'Version/4.') ? true : false;
			$v5 = strpos($ua, 'Version/5.') ? true : false;
			$v6 = strpos($ua, 'Version/6.') ? true : false;
					// Test versions of Safari
			if((@$safari AND $v1) || (@$safari AND $v2) || (@$safari AND $v3) || (@$safari AND $v4) || (@$safari AND $v5) || (@$safari AND $v6) || (@$safari)){ 
				$this->layout->css(base_url().'assets/css/safariCss.css');
			}else{ 
			
			}
			
			
			$this->layout->js(base_url().'assets/js/libs/jquery-1.10.2.min.js');
			$this->layout->js(base_url().'assets/bootstrap/js/bootstrap.min.js');
			$this->layout->js(base_url().'assets/js/libs/lodash.compat.min.js');
			$this->layout->js(base_url().'assets/plugins/uniform/jquery.uniform.min.js');
			$this->layout->js(base_url().'assets/plugins/bootstrap-inputmask/jquery.inputmask.min.js');

			if($this->session->userdata('site_lang') && $this->session->userdata('site_lang') == "chinese"){
				$this->layout->js(base_url().'assets/plugins/validation/jquery.validate.chinese.js');
			}
			else {
				$this->layout->js(base_url().'assets/plugins/validation/jquery.validate.english.js');
			}

			$this->layout->js(base_url().'assets/plugins/nprogress/nprogress.js');
			$this->layout->js(base_url().'assets/js/login.js');
			
		}
	}

	class MY_Controller extends CI_Controller {
		//Site global layout
		public $layout_view = 'layout/default';

		function __construct() {
			parent::__construct();

			//Layout library loaded site wide
			$this->load->library('layout');

			$this->layout->css(base_url().'assets/bootstrap/css/bootstrap.min.css');
			$this->layout->css(base_url().'assets/css/plugins.css');
			$this->layout->css(base_url().'assets/css/responsive.css');
			$this->layout->css(base_url().'assets/css/icons.css');
			$this->layout->css(base_url().'assets/css/fontawesome/font-awesome.min.css');
			$this->layout->css(base_url().'assets/plugins/bootstrap-wizard/bootstrap-wizard.css');
			$this->layout->css(base_url().'assets/css/plugins/uniform.css');
			$this->layout->css(base_url().'assets/css/financial.css');
			$this->layout->css('http://fonts.googleapis.com/css?family=Raleway');
			$this->layout->css(base_url().'assets/css/bootstrap-popover-x.css');
			
			//safari css check
			$ua = $_SERVER["HTTP_USER_AGENT"];      // Get user-agent of browser

			$safariorchrome = strpos($ua, 'Safari') ? true : false;     // Browser is either Safari or Chrome (since Chrome User-Agent includes the word 'Safari')
			$chrome = strpos($ua, 'Chrome') ? true : false;             // Browser is Chrome

			if($safariorchrome == true AND $chrome == false){ $safari = true; }     // Browser should be Safari, because there is no 'Chrome' in the User-Agent

			// Check for version numbers 
			$v1 = strpos($ua, 'Version/1.') ? true : false;
			$v2 = strpos($ua, 'Version/2.') ? true : false;
			$v3 = strpos($ua, 'Version/3.') ? true : false;
			$v4 = strpos($ua, 'Version/4.') ? true : false;
			$v5 = strpos($ua, 'Version/5.') ? true : false;
			$v6 = strpos($ua, 'Version/6.') ? true : false;
			// Test versions of Safari
			if((@$safari AND $v1) || (@$safari AND $v2) || (@$safari AND $v3) || (@$safari AND $v4) || (@$safari AND $v5) || (@$safari AND $v6) || (@$safari)){ 
				$this->layout->css(base_url().'assets/css/safariCss.css');
			}else{ 
			
			}

			$this->layout->js(base_url().'assets/js/libs/jquery.min.js');
			$this->layout->js(base_url().'assets/js/libs/jquery-1.10.2.min.js');
			$this->layout->js(base_url().'assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js');
			$this->layout->js(base_url().'assets/ddmenu/ddmenu.js');

			$this->layout->js(base_url().'assets/bootstrap/js/bootstrap.min.js');
			$this->layout->js(base_url().'assets/js/bootstrap-popover-x.js');

			$this->layout->js(base_url().'assets/js/libs/lodash.compat.min.js');

			//$this->layout->js(base_url().'assets/js/libs/html5shiv.js');

			$this->layout->js(base_url().'assets/plugins/touchpunch/jquery.ui.touch-punch.min.js');
			$this->layout->js(base_url().'assets/plugins/event.swipe/jquery.event.move.js');
			$this->layout->js(base_url().'assets/plugins/event.swipe/jquery.event.swipe.js');
			$this->layout->js(base_url().'assets/js/libs/breakpoints.js');
			$this->layout->js(base_url().'assets/plugins/respond/respond.min.js');
			$this->layout->js(base_url().'assets/plugins/cookie/jquery.cookie.min.js');
			$this->layout->js(base_url().'assets/plugins/slimscroll/jquery.slimscroll.min.js');
			$this->layout->js(base_url().'assets/plugins/slimscroll/jquery.slimscroll.horizontal.min.js');
			$this->layout->js(base_url().'assets/plugins/flot/excanvas.min.js');
			$this->layout->js(base_url().'assets/plugins/sparkline/jquery.sparkline.min.js');
			$this->layout->js(base_url().'assets/plugins/flot/jquery.flot.min.js');
			$this->layout->js(base_url().'assets/plugins/flot/jquery.flot.tooltip.min.js');
			$this->layout->js(base_url().'assets/plugins/flot/jquery.flot.resize.min.js');
			$this->layout->js(base_url().'assets/plugins/flot/jquery.flot.time.min.js');
			$this->layout->js(base_url().'assets/plugins/flot/jquery.flot.growraf.min.js');
			$this->layout->js(base_url().'assets/plugins/easy-pie-chart/jquery.easy-pie-chart.min.js');
			$this->layout->js(base_url().'assets/plugins/daterangepicker/moment.min.js');
			$this->layout->js(base_url().'assets/plugins/daterangepicker/daterangepicker.js');
			$this->layout->js(base_url().'assets/plugins/blockui/jquery.blockUI.min.js');
			$this->layout->js(base_url().'assets/plugins/fullcalendar/fullcalendar.min.js');
			$this->layout->js(base_url().'assets/plugins/noty/jquery.noty.js');
			$this->layout->js(base_url().'assets/plugins/noty/layouts/top.js');
			$this->layout->js(base_url().'assets/plugins/noty/themes/default.js');
			$this->layout->js(base_url().'assets/plugins/uniform/jquery.uniform.min.js');
			$this->layout->js(base_url().'assets/plugins/select2/select2.min.js');
			$this->layout->js(base_url().'assets/plugins/bootstrap-inputmask/jquery.inputmask.min.js');
			$this->layout->js(base_url().'assets/plugins/datatables/jquery.dataTables.min.js');
			$this->layout->js(base_url().'assets/plugins/datatables/tabletools/TableTools.min.js');
			$this->layout->js(base_url().'assets/plugins/datatables/colvis/ColVis.min.js');
			$this->layout->js(base_url().'assets/plugins/datatables/DT_bootstrap.js');
			$this->layout->js(base_url().'assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js');
			//$this->layout->js(base_url().'assets/js/demo/form_wizard.js');
			
			
			$this->layout->js(base_url().'assets/plugins/pickadate/picker.js');
			$this->layout->js(base_url().'assets/plugins/pickadate/picker.date.js');
			$this->layout->js(base_url().'assets/plugins/pickadate/picker.time.js');
			$this->layout->js(base_url().'assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js');
	
	
	

			if($this->session->userdata('site_lang') && $this->session->userdata('site_lang') == "chinese"){
				$this->layout->css(base_url().'assets/css/main.css');
				$this->layout->js(base_url().'assets/plugins/validation/jquery.validate.chinese.js');
				$this->layout->css(base_url().'assets/ddmenu/ddmenuC.css');
			
			} else {
				$this->layout->css(base_url().'assets/css/main.css');
				$this->layout->css(base_url().'assets/ddmenu/ddmenu.css');
				$this->layout->js(base_url().'assets/plugins/validation/jquery.validate.english.js');
			}

			$this->layout->js(base_url().'assets/js/app.js');
			$this->layout->js(base_url().'assets/js/plugins.js');
			$this->layout->js(base_url().'assets/js/plugins.form-components.js');

			if($this->session->userdata('site_lang') && $this->session->userdata('site_lang') == "chinese"){
				$this->layout->js(base_url().'assets/js/top_validation_chinese.js');
			} else {
				$this->layout->js(base_url().'assets/js/top_validation_english.js');
			}
			$this->layout->js(base_url().'assets/js/loadingoverlay.min.js');
			$this->layout->js(base_url().'assets/js/loadingoverlay_progress.min.js');
			$this->layout->js(base_url().'assets/js/common.js');
			$this->layout->js(base_url().'assets/js/custom.js');
			$this->layout->js(base_url().'assets/js/demo/ui_general.js');
			
			$this->layout->js(base_url().'assets/plugins/typeahead/typeahead.min.js');
			$this->layout->js(base_url().'assets/plugins/autosize/jquery.autosize.min.js');
			$this->layout->js(base_url().'assets/plugins/inputlimiter/jquery.inputlimiter.min.js');
		}
	}
	
	class Admin_Controller extends CI_Controller {
		//Site global layout
		public $layout_view = 'layout/adminLogin';

		function __construct() {
			parent::__construct();

			//Layout library loaded site wide
			$this->load->library('layout');

			$this->layout->css(base_url().'assets/bootstrap/css/bootstrap.min.css');
			$this->layout->css(base_url().'assets/css/admin/main.css');
			$this->layout->css(base_url().'assets/css/admin/plugins.css');
			$this->layout->css(base_url().'assets/css/admin/responsive.css');
			$this->layout->css(base_url().'assets/css/admin/icons.css');
			$this->layout->css(base_url().'assets/css/fontawesome/font-awesome.min.css');
			$this->layout->css(base_url().'assets/plugins/bootstrap-wizard/bootstrap-wizard.css');
			$this->layout->css(base_url().'assets/css/plugins/uniform.css');
			$this->layout->css(base_url().'assets/css/financial.css');
			$this->layout->css('http://fonts.googleapis.com/css?family=Raleway');
			$this->layout->css(base_url().'assets/css/bootstrap-popover-x.css');
			
			//safari css check
			$ua = $_SERVER["HTTP_USER_AGENT"];      // Get user-agent of browser

			$safariorchrome = strpos($ua, 'Safari') ? true : false;     // Browser is either Safari or Chrome (since Chrome User-Agent includes the word 'Safari')
			$chrome = strpos($ua, 'Chrome') ? true : false;             // Browser is Chrome

			if($safariorchrome == true AND $chrome == false){ $safari = true; }     // Browser should be Safari, because there is no 'Chrome' in the User-Agent

			// Check for version numbers 
			$v1 = strpos($ua, 'Version/1.') ? true : false;
			$v2 = strpos($ua, 'Version/2.') ? true : false;
			$v3 = strpos($ua, 'Version/3.') ? true : false;
			$v4 = strpos($ua, 'Version/4.') ? true : false;
			$v5 = strpos($ua, 'Version/5.') ? true : false;
			$v6 = strpos($ua, 'Version/6.') ? true : false;
			// Test versions of Safari
			if((@$safari AND $v1) || (@$safari AND $v2) || (@$safari AND $v3) || (@$safari AND $v4) || (@$safari AND $v5) || (@$safari AND $v6) || (@$safari)){ 
				$this->layout->css(base_url().'assets/css/safariCss.css');
			}else{ 
			
			}

			$this->layout->js(base_url().'assets/js/libs/jquery.min.js');
			$this->layout->js(base_url().'assets/js/libs/jquery-1.10.2.min.js');
			$this->layout->js(base_url().'assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js');
			$this->layout->js(base_url().'assets/ddmenu/ddmenu.js');
		//	$this->layout->js(base_url().'assets/js/demo/charts/chart_filled_green.js');
			//$this->layout->js(base_url().'assets/js/demo/charts/chart_simple.js');
			$this->layout->js(base_url().'assets/bootstrap/js/bootstrap.min.js');

			$this->layout->js(base_url().'assets/js/libs/lodash.compat.min.js');

			//$this->layout->js(base_url().'assets/js/libs/html5shiv.js');
			$this->layout->js(base_url().'assets/js/bootstrap-popover-x.js');
			$this->layout->js(base_url().'assets/plugins/touchpunch/jquery.ui.touch-punch.min.js');
			$this->layout->js(base_url().'assets/plugins/event.swipe/jquery.event.move.js');
			$this->layout->js(base_url().'assets/plugins/event.swipe/jquery.event.swipe.js');
			$this->layout->js(base_url().'assets/js/libs/breakpoints.js');
			$this->layout->js(base_url().'assets/plugins/respond/respond.min.js');
			$this->layout->js(base_url().'assets/plugins/cookie/jquery.cookie.min.js');
			$this->layout->js(base_url().'assets/plugins/slimscroll/jquery.slimscroll.min.js');
			$this->layout->js(base_url().'assets/plugins/slimscroll/jquery.slimscroll.horizontal.min.js');
			$this->layout->js(base_url().'assets/plugins/flot/excanvas.min.js');
			$this->layout->js(base_url().'assets/plugins/sparkline/jquery.sparkline.min.js');
			$this->layout->js(base_url().'assets/plugins/flot/jquery.flot.min.js');
			$this->layout->js(base_url().'assets/plugins/flot/jquery.flot.tooltip.min.js');
			$this->layout->js(base_url().'assets/plugins/flot/jquery.flot.resize.min.js');
			$this->layout->js(base_url().'assets/plugins/flot/jquery.flot.time.min.js');
			$this->layout->js(base_url().'assets/plugins/flot/jquery.flot.growraf.min.js');
			$this->layout->js(base_url().'assets/plugins/easy-pie-chart/jquery.easy-pie-chart.min.js');
			$this->layout->js(base_url().'assets/plugins/daterangepicker/moment.min.js');
			$this->layout->js(base_url().'assets/plugins/daterangepicker/daterangepicker.js');
			$this->layout->js(base_url().'assets/plugins/blockui/jquery.blockUI.min.js');
			$this->layout->js(base_url().'assets/plugins/fullcalendar/fullcalendar.min.js');
			$this->layout->js(base_url().'assets/plugins/noty/jquery.noty.js');
			$this->layout->js(base_url().'assets/plugins/noty/layouts/top.js');
			$this->layout->js(base_url().'assets/plugins/noty/themes/default.js');
			$this->layout->js(base_url().'assets/plugins/uniform/jquery.uniform.min.js');
			$this->layout->js(base_url().'assets/plugins/select2/select2.min.js');
			$this->layout->js(base_url().'assets/plugins/bootstrap-inputmask/jquery.inputmask.min.js');
			$this->layout->js(base_url().'assets/plugins/datatables/jquery.dataTables.min.js');
			$this->layout->js(base_url().'assets/plugins/datatables/tabletools/TableTools.min.js');
			$this->layout->js(base_url().'assets/plugins/datatables/colvis/ColVis.min.js');
			$this->layout->js(base_url().'assets/plugins/datatables/DT_bootstrap.js');
			$this->layout->js(base_url().'assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js');
			//$this->layout->js(base_url().'assets/js/demo/form_wizard.js');
			
			
			$this->layout->js(base_url().'assets/plugins/pickadate/picker.js');
			$this->layout->js(base_url().'assets/plugins/pickadate/picker.date.js');
			$this->layout->js(base_url().'assets/plugins/pickadate/picker.time.js');
			$this->layout->js(base_url().'assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js');
	
	
	

			if($this->session->userdata('site_lang') && $this->session->userdata('site_lang') == "chinese"){
				$this->layout->css(base_url().'assets/css/main.css');
				$this->layout->js(base_url().'assets/plugins/validation/jquery.validate.chinese.js');
				$this->layout->css(base_url().'assets/ddmenu/ddmenuC.css');
			
			} else {
				$this->layout->css(base_url().'assets/css/main.css');
				$this->layout->css(base_url().'assets/ddmenu/ddmenu.css');
				$this->layout->js(base_url().'assets/plugins/validation/jquery.validate.english.js');
			}

			$this->layout->js(base_url().'assets/js/app.js');
			$this->layout->js(base_url().'assets/js/plugins.js');
			$this->layout->js(base_url().'assets/js/plugins.form-components.js');

			if($this->session->userdata('site_lang') && $this->session->userdata('site_lang') == "chinese"){
				$this->layout->js(base_url().'assets/js/top_validation_chinese.js');
			} else {
				$this->layout->js(base_url().'assets/js/top_validation_english.js');
			}
			
			$this->layout->js(base_url().'assets/js/demo/form_validation.js');
			$this->layout->js(base_url().'assets/js/common.js');
			$this->layout->js(base_url().'assets/js/custom.js');
			$this->layout->js(base_url().'assets/plugins/typeahead/typeahead.min.js');
			$this->layout->js(base_url().'assets/plugins/autosize/jquery.autosize.min.js');
			$this->layout->js(base_url().'assets/plugins/inputlimiter/jquery.inputlimiter.min.js');
	
			$this->layout->js(base_url().'assets/js/demo/pages_calendar.js');
			
	
		}
	}
?>