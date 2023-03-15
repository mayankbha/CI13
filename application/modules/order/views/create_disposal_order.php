<style>
.tab-pane{
	min-height:100px;
}
</style>

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
					<a href="#" title="">Create Order</a>
				</li>
			</ul>
		</div>  			
		<div class="row">
			<div class="col-md-3 page-header">
				<div class="page-title">
					<h3>Order</h3>
					<h5>Create a new order</h5>
				</div>
			</div>
			<div class="col-md-6" style="padding-top: 28px;">
				<div class="alert alert-danger text-center" style="display:none" id="err_div">
					<button class="close" data-dismiss="alert">
					</button> <span id="errrMsg">You missed some fields. They have been highlighted.</span> 
				</div>	
				<div class="alert alert-success text-center" style="display:none" id="scc_div">
					<button class="close" data-dismiss="alert">
					</button> <span id="successMsg">You missed some fields. They have been highlighted.</span> 
				</div>
			</div>
			<div class="col-md-1">
			</div>
			<div class="col-md-2">
				
				<div class="page-title" id="orderDiv1">
					<h3 align="right">Order Name</h3>
					<h5 align="right">
						<span id="show_disposal_order_name" style="font-size:16px;padding-bottom:4px ! important;"></span>&nbsp;&nbsp;
						<a href="javascript:void(0);" class="editshippingtitle" onclick="changeorderNumber();" >
							Rename
						</a>
					</h5>
				</div>

				<div class="page-title"  style="display:none;" id="orderDiv2">
					<h3 align="right" style="padding-right: 16px ! important;">Order Nmae</h3>
					<span  style="font-size:16px;padding-bottom:4px ! important">
						<input type="text" id="disposal_order_name" name="disposal_order_name" value="<?php echo 'HUB-ORDR-'.(rand(10,10001000)); ?>" class="form-control">
							<a href="javascript:void(0);" class="editshippingtitle" onclick="saveOrdername();">
								Save
							</a>
					</span> 
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<hr style="margin-top:0px ! important;"/>
			</div>	
		</div>
		
		<div class="row selectorderDiv">
			<label class="col-md-12 control-label"><h5>Selected Order Type :</h5></label>
			<div class="col-md-3"> 
				<select class="form-control selectboxit-btn" name="selectedorderType11" id="selectedorderType">  
					<option selected value="3">create a Disposal Order</option>
				</select> 
			</div>
		</div><br /><br /><br />

		<div class="row selectedorderDiv" style="display:none">
			<label class="col-md-2 control-label">Selected Order Type:</label>
			<div class="col-md-2"> 
				<label>FBA Order<label>&nbsp;&nbsp;&nbsp;
				<a href="javascript:void(0);" onclick="chengedisposalOrder();">
					Edit
				</a>
			</div>
		</div>

		<div style="min-height:30px;">
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="widget box" id="form_wizard">
					<div class="widget-content">
						<form class="form-horizontal" id="sample_form" action="<?php echo base_url('order/order/updateOrder');?>" method="post" enctype="multipart/form-data">
							<div class="form-wizard">
								<div class="form-body" id="tabs">
									<ul class="nav nav-pills nav-justified steps">
										<li>
											<a href="#tab1" data-toggle="tab" class="step" disabled> <span class="number">1</span> <br />
												<span class="desc"><i class="icon-ok"></i> Create Order</span> 
											</a>
										</li>
										<li>
											<a href="#tab2" data-toggle="tab" id="t2" class="step" > <span class="number">2</span><br />
												<span class="desc"><i class="icon-ok"></i> <?php echo $this->lang->line('Inventory'); ?></span>
											</a>
										</li>
										<li>
											<a href="#tab3" data-toggle="tab" id="t3"class="step" > <span class="number">3</span><br /> <span class="desc"><i class="icon-ok"></i> <?php echo $this->lang->line('Set_Quarity'); ?></span> </a>
										</li>
										<li>
											<a href="#tab4" data-toggle="tab" class="step"> <span class="number">5</span><br /> <span class="desc"><i class="icon-ok"></i> Review Order</span> </a>
										</li>
									</ul>
									<div id="bar" class="progress progress-striped" role="progressbar">
										<div class="progress-bar progress-bar-success"></div>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="tab1">
											<h3 class="block padding-bottom-10px title_bar">Order</h3>
											
											
											<div class="row spacing_shipping">
											<!--<h3 class="block padding-bottom-10px title_bar">Create Order</h3>-->
												<div class="col-md-1">

												</div>
												<div class="col-md-3">
													<label class="labelsize">Create Order</label>
													<hr class="hr_margin"/>
													<label class="radio-inline" >
														<input type="radio" class="uniform"  name="create_disposal_order" value="create_disposal_order" required/>
													</label>
													<div style="padding-left: 32px; margin-top: -20px;">Create Disposal Order</div>
												</div>

												<div class="col-md-2">
													<label class="labelsize">Dispose By</label>
														<hr class="hr_margin"/>
														<input name="dispose_by" id="dispose_by" class="form-control datepicker" value="" type="text" required />
												</div>
											</div>
											<div class="row">
												<div id="disposal_order_step1_table">
												</div>
											</div>
											<br /><br />
												<!-- /Page Content -->	
										</div>
										<div class="tab-pane" id="tab2">
											<table  class="table table-striped table-bordered table-hover table-checkable datatable" >
												<thead>
													<tr>
														<th class="checkbox-column">
															<input  type="checkbox" class="uniform">
														</th>
														<th style="width: 81px !important;"><?php echo $this->lang->line('Merchant_SKU'); ?></th>
														<th style="width: 141px !important;"><?php echo $this->lang->line('Title'); ?></th>
														<th style="width: 141px !important;"><?php echo $this->lang->line('Condition'); ?></th>
														<th style="width: 141px !important;"><?php echo $this->lang->line('EAN'); ?></th>
														<th style="width: 141px !important;"><?php echo $this->lang->line('UPS'); ?></th>
														<th style="width: 141px !important;"><?php echo $this->lang->line('Price'); ?></th>
													</tr>
												</thead>
												<tbody>
													
													<?php foreach($inventoryData as $row){ ?>
														<tr>
															<td class="checkbox-column">
																<input type="checkbox" name="item_inventory" class="uniform customCheck" onclick="add_diispose('<?php echo $row->inventory_id; ?>')" id="<?php echo $row->inventory_id; ?>"  value="<?php echo $row->inventory_id; ?>" required />
															</td>
															<td>
																<a href="#"><?php echo $row->merchant_SKU; ?></a>
															</td>
															<td >
																<?php 
																	echo $row->title;
																?>
															</td>
															<td><?php echo $row->condition; ?></td>
															<td><?php echo $row->EAN; ?></td>
															<td><?php echo $row->UPC; ?></td>
															<td>$<?php echo $row->price; ?></td>
														</tr>
													<?php }?>	
													
												</tbody>
											</table>
										</div>

										<div class="tab-pane" id="tab3">
											<div id="order_step3_table"> 
												
											</div>
										</div>
										
										<div class="tab-pane" id="tab4">
											<div id="order_step4_table"> 
											
											</div>
										</div>
										<div class="tab-pane" id="tab5">
											<div id="order_step5_table"> 
												
											</div>
										</div>
									</div>
								</div>
								
								<div class="form-actions fluid">
									<div class="row">
										<div class="col-md-12">
											<center>
												<span class="alert alert-danger custom-alert" align="text-center" style="display:none">
													<button class="close" data-dismiss="alert">
													</button> You missed some fields.
												</span><br/ >
												<span id="err_div1" class="alert alert-danger" align="text-center" style="display:none">
													<button class="close" data-dismiss="alert">
													</button> <span id="errrMsg1"></span>
												</span><br/ >
											</center>
										
											<a href="javascript:void(0);" class="btn button-previous" align="right"> <i class="icon-angle-left"></i> <?php echo $this->lang->line('Back'); ?> </a>

											<a href="javascript:void(0);"  class="btn btn-primary button-submit pull-right" > Process Order  <i class="icon-fixed-width"></i></a>
											
											<a href="javascript:void(0);"  class="btn btn-primary button-next pull-right" > <?php echo $this->lang->line('Continue'); ?> <i class="icon-angle-right"></i> </a>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>

</div>

<script type="text/javascript" defer="defer">
"use strict";
$(document).ready(function() {
	$('.datepicker').datepicker({ minDate: new Date()});
	//$('#shipby').datepicker().datepicker({ minDate: 0});
	setTimeout(function() {
	var  flag			=		0;
	
	var c = $("#sample_form");
    var d = $("#form_wizard");

	
    var a = $(".custom-alert", c);
    var f = $(".alert-success", c);
	$.validator.messages.required = '';

	c.validate({
		doNotHideMessage: true,
		focusInvalid: false,
		invalidHandler: function(h, g) {
			//$("html, body").animate({ scrollTop: 0 }, "slow");
			f.hide();
			a.show()
			
		},
		submitHandler: function(g) {
			//$("html, body").animate({ scrollTop: 0 }, "slow");
			f.show();
			a.hide()
			
		}
	});
	var e = function() { 
        $("#tab4 .form-control-static", c).each(function() {
            var g = $('[name="' + $(this).attr("data-display") + '"]', c);
            if (g.is(":text") || g.is("textarea")) {
                $(this).html(g.val())
            } else {
                if (g.is("select")) {
                    $(this).html(g.find("option:selected").text())
                } else {
                    if (g.is(":radio") && g.is(":checked")) {
                        $(this).html(g.attr("data-title"))
                    }
                }
            }
        })
    };
   
    var b = function(k, g, h) { 

        var l = g.find("li").length;

        var m = h + 1;


        $(".step-title", d).text("Step " + (h + 1) + " of " + l);
        $("li", d).removeClass("done");
        var n = g.find("li");
		
        for (var j = 0; j < h; j++) {
            $(n[j]).addClass("done")
        }
		getdisposalStep(m);
		if (m > 1) {
			$(".selectedorderDiv").show();
			$(".selectorderDiv").hide();
		}

        if (m == 2) {
            d.find(".button-previous").hide()
        } else {
            d.find(".button-previous").show()
        }
        if (m >= l) {  
			
            d.find(".button-next").hide();
            d.find(".button-submit").show();
            e()
        } else {
            d.find(".button-next").show();
            d.find(".button-submit").hide()
        }
    };
    d.bootstrapWizard({ 
        nextSelector: ".button-next",
        previousSelector: ".button-previous",
		onTabClick: function(i, g, h, j) {  
		
		  f.hide();
		  a.hide();
			if (j >= h && c.valid() == false) {
				return false
			}
			b(i, g, j)
		},
        onNext: function(i, g, h) {
            f.hide();
            a.hide();
            if (c.valid() == false) {
                return false
            }
            b(i, g, h)
        },
        onPrevious: function(i, g, h) {
            f.hide();
            a.hide();
            b(i, g, h)
        },
        onTabShow: function(j, g, i) {
            var k = g.find("li").length;
            var l = i + 1;
            var h = (l / k) * 100;
            d.find(".progress-bar").css({
                width: h + "%"
            })
        }
    });
    d.find(".button-previous").hide();
    $("#form_wizard .button-submit").click(function() {
        
    }).hide()
});
	});


function getdisposalStep(step){

	if(step==2){
		var dispose_by  =  $('#dispose_by').val();
		var order_name  =  $('#disposal_order_name').val();
		$.ajax({
			type: 'POST',
			url: base_url + 'order/disposalorder/create_dispodeOrder',
			data: {
				'dispose_by': dispose_by,
				'order_name': order_name,
				'create_order': true
			},
			beforeSend: function(){
				$.LoadingOverlay("show");
			},
			success: function(data) {
				$.LoadingOverlay("hide");
			},
			complete: function(){ 
			},
			error: function() {
					alert('request failed');
			}
		});
	}
}

	function add_diispose(id) {
		if ($("#"+id).is(':checked')) {
			$.ajax({
				type: 'POST',
				url: base_url + 'order/disposalorder/updateOrder/',
				data: {
					'product_id': id,
					'addProduct': true
				},
				beforeSend: function() {
					$.LoadingOverlay("show");
				},
				success: function(data) {
					$.LoadingOverlay("hide");
					
					if(data==null){
						$('.button-next').attr('disabled', true);
					}else{
						$('.button-next').attr('disabled', false);
					}
				},
				error: function() {
					alert('request failed');
				}
			});
			} else {
				$.ajax({
					type: 'POST',
					url: base_url + 'shipping/Shipping/updateShiping',
					data: {
						'product_id': id,
						'deleteProduct': true
					},
					beforeSend: function() {
						$.LoadingOverlay("show");
					},
					success: function(data) {
						$.LoadingOverlay("hide");
						if(data==null){
							$('#continue_btn').attr('disabled', true);
						}else{
							$('#continue_btn').attr('disabled', false);
						}
					},
					error: function() {
						alert('request failed');
					}
				});
		}
	}
</script>
		
	