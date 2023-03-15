
<div class="row">
	<div class="col-md-12">
		<div class="widget box" id="form_wizard">
			<div class="widget-content">
				<form class="form-horizontal" id="disposal_form" action="#" method="post" enctype="multipart/form-data">
					<div class="form-wizard">
						<div class="form-body" id="tabs">
							<ul class="nav nav-pills nav-justified steps">
								<li>
									<a href="#tab1" data-toggle="tab" class="step" disabled> <span class="number">1</span> <br />
										<span class="desc"><i class="icon-ok"></i> Create Order</span> 
									</a>
								</li>
								<li>
									<a href="#tab2" data-toggle="tab" id="dsp_stp2" class="step" > <span class="number">2</span><br />
										<span class="desc"><i class="icon-ok"></i> <?php echo $this->lang->line('Inventory'); ?></span>
									</a>
								</li>
								<li>
									<a href="#tab3" data-toggle="tab" id="dsp_stp3"class="step" > <span class="number">3</span><br /> <span class="desc"><i class="icon-ok"></i> <?php echo $this->lang->line('Set_Quarity'); ?></span> </a>
								</li>
								<li>
									<a href="#tab4" data-toggle="tab" id="dsp_stp4" class="step"> <span class="number">5</span><br /> <span class="desc"><i class="icon-ok"></i> Review Order</span> </a>
								</li>
							</ul>
							<div id="bar" class="progress progress-striped" role="progressbar">
								<div class="progress-bar progress-bar-success"></div>
							</div>
							<div class="tab-content">
								<input type="hidden" name="disposal_id" id="disposal_id">
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
												<input type="radio" id="neworder" class="uniform"  name="create_disposal_order" value="create_disposal_order" required/>
											</label>
											<div style="padding-left: 32px; margin-top: -20px;">Create Disposal Order</div>
										
											<?php if(!empty($exist_orders)) { ?>
											<label class="radio-inline" style="margin-bottom:10px;">
												<input type="radio" class="uniform" name="create_disposal_order" id="existingdisposal_order" value="existingdisposal_order" >.
											</label>
											<div style="padding-left: 32px; margin-top: -30px;">Add existing Order</div>
											</br>
											<div style="padding-left:23px ! important;">
												<select class="form-control" name="exist_disposalorder" id="exist_disposalorder" style="width:47%; display:none">
													<option  value="" selected>Select Order</option>
													<?php foreach($exist_orders as $order){  ?>
														<option value="<?php echo  $order->order_id; ?>"><?php echo  $order->order_name; ?></option>
													<?php } ?>
												</select>
											</div>
											<?php } ?>
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
									<div id="dispose_order_step2_table"> 
										
									</div>
								</div>

								<div class="tab-pane" id="tab3">
									<div id="dispose_order_step3_table"> 
										
									</div>
								</div>
								
								<div class="tab-pane" id="tab4">
									<div id="dispose_order_step4_table"> 
									
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

									<a href="javascript:void(0);" id="btn-sub"  class="btn btn-primary btn-sub pull-right" > Process Order  <i class="icon-fixed-width"></i></a>
									
									<a href="javascript:void(0);"  id="nxt-btn" class="btn btn-primary button-next pull-right" > <?php echo $this->lang->line('Continue'); ?> <i class="icon-angle-right"></i> </a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	

<!-- Modal -->
<div id="confirmDeleteItem" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header model_color_header">
				<button type="button" class="close model_color_title" data-dismiss="modal">&times;</button>
				<h4 class="modal-title model_color_title">Delete product</h4>
			</div>
			<div class="modal-body">
				<p >Do you really want to delete this product ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="deleteitem"><?php echo $this->lang->line('Yes'); ?></button>
				<button type="button" class="btn" data-dismiss="modal"><?php echo $this->lang->line('No'); ?></button>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript" defer="defer">
"use strict";
$(document).ready(function() {
	
	$(".ordertype").html('Disposal');
	$("#orderDiv1").show();
	$(".datatable").DataTable({
            "bDestroy": true,
    });
	$(".datatable").DataTable();
	$('.datepicker').datepicker({ minDate: new Date()});
	//$('#shipby').datepicker().datepicker({ minDate: 0});
	setTimeout(function() {
	var  flag			=		0;
	
	var c = $("#disposal_form");
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

		if (m == 4) {
            $(".selectedorderDiv").hide();
        }
		
        if (m == 2) {
            d.find(".button-previous").hide()
        } else {
            d.find(".button-previous").show()
        }
        if (m >= l) {  
			
            d.find(".button-next").hide();
            d.find(".btn-sub").show();
            e()
        } else {
            d.find(".button-next").show();
            d.find(".btn-sub").hide()
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
    $("#form_wizard .btn-sub").click(function() {
        
    }).hide()
	
	
});
	});
var isOpen = false;
function saveOrdername(){
    $("html, body").animate({
        scrollTop: 0
    }, "slow");
    $("#order_number").focus();

    if (isOpen) {

        var isValid = /\s/;
        var order_name = $("#order_name").val();
        if (order_name == '') {
            //$('#fname').css({'border-color' : '#d3d3d3'});
            $('#order_name').css({
                'border-color': '#ea4335'
            });
            $('#err_div').show();
            $("#errrMsg").html("Please enter order name");
            setTimeout(function() {
                $('#err_div').hide();
            }, 3000);
        } else if (order_name.length < 6) {
            $('#order_name').css({
                'border-color': '#ea4335'
            });
            $('#err_div').show();
            $("#errrMsg").html("Your order name must be at least 6 characters");
            setTimeout(function() {
                $('#err_div').hide();
            }, 3000);
        } else if (order_name.length > 50) {
            $('#order_name').css({
                'border-color': '#ea4335'
            });
            $('#err_div').show();
            $("#errrMsg").html("Your order name must be less than 50 characters");
            setTimeout(function() {
                $('#err_div').hide();
            }, 3000);
        } else if (isValid.test(order_name)) {
            $('#order_name').css({
                'border-color': '#ea4335'
            });
            $('#err_div').show();
            $("#errrMsg").html("Your order name in whitespace  not allowed");
            setTimeout(function() {
                $('#err_div').hide();
            }, 3000);
        } else {
            $('#order_name').css({
                'border-color': '#d3d3d3'
            });

            $('#editshippingdate').show();

            $('#addeditshippingdat1e').hide();

            $.ajax({
                type: 'POST',
                url: base_url + 'order/order/checkOrderName',
                data: {
                    'order_name': order_name,
                    'checkOrderName': true
                },
                success: function(res) {
                    if (res.check == 1) {
                        var datetime = $('#order_name').val();
                        $(".answer").slideDown();
                        isOpen = true;

                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                        $('#order_name').css({
                            'border-color': '#ea4335'
                        });
                        $('#err_div').show();
                        $("#errrMsg").html("Your order name " + order_name + " already exist!");
                        setTimeout(function() {
                            $('#err_div').hide();
                        }, 3000);

                    } else {
						$("#orderDiv1").show();
						$("#orderDiv2").hide();
                        isOpen = false;
						var order_name = $("#order_name").val();
						$("#show_order").text(order_name); 
                        $('#scc_div').show();
                        $("#successMsg").html("Your order name has been updated successfully.");
                        setTimeout(function() {
                            $('#scc_div').hide();
                        }, 3000);
                    }
                },
                error: function() {
                    alert('request failed');
					var order_name = $("#order_name").val();
					$("#show_order").text(order_name); 
					$("#orderDiv1").hide();
					$("#orderDiv2").show();
					isOpen = true;
                }
            });
        }
    } else {
        var datetime = $('#order_name').val();
        isOpen = true;
    }
}

function getdisposalStep(step){ 
	
	if((step==2) && (flag!=1)){
		if ($('#neworder').is(':checked')) { 
		var dispose_by  =  $('#dispose_by').val();
		var order_name  =  $("#order_name").val();
			$.ajax({
				type: 'POST',
				url: base_url + 'order/order/create_disposalOrder',
				data: {
					'dispose_by': dispose_by,
					'order_name': order_name,
					'create_order': true
				},
				beforeSend: function(){
					$.LoadingOverlay("show");
				},
				success: function(data) {
					flag			=		1;
					$('#disposal_id').val(data.order_id);
					getstepTable(step);
					$.LoadingOverlay("hide");
				},
				complete: function(){ 
				},
				error: function() {
						alert('request failed');
				}
			});
		}
		if ($('#existingdisposal_order').is(':checked')) { 
			var order_name 			= 	$("#order_name").val();
			var dispose_by  		=   $('#dispose_by').val();
			var exist_order_id 		=   $('#exist_disposalorder').val();

			$.ajax({
				type: 'POST',
				url: base_url + 'order/order/update_disposalOrder',
				data: {
					'order_name': order_name,
					'dispose_by':dispose_by,
					'order_id':exist_order_id,
					'updateExistingOrder': true
				},
				beforeSend: function() {
					//.createShipment();
				},
				success: function(res) {
					//$('#continue_btn').attr('disabled', false);
					//$("#order_step1_table").html(res);
					//getAddress(exist_shipment);
				},
				complete: function(){
					getstepTable(2)
				},
				error: function() {
					alert('request failed');
				}
			});
		};
		
		
		
		
		
		
		
		
		
	}else{
		getstepTable(step);
	}
}

	function getstepTable(step){
		var order_id	=	$('#disposal_id').val();
		$.ajax({
			type: 'GET',
			url: base_url + 'order/order/getDisposalorderStep/'+step+"/"+order_id,
			beforeSend: function() {
				$.LoadingOverlay("show");
			},
			success: function(res) {
				
				if(step!=''){
					$("#dispose_order_step"+step+"_table").html('');
					$("#dispose_order_step"+step+"_table").html(res);
				}
			},
			complete: function(){
				$.LoadingOverlay("hide");  
				if(step==2){
					$('.datatable').dataTable();
				}
			},
			error: function() {
				alert('request failed');
			}
		});
	}

	function add_dispose(id) {
		var disposal_id  =  $('#disposal_id').val();
		if ($("#"+id).is(':checked')) {
			$.ajax({
				type: 'POST',
				url: base_url + 'order/order/update_disposalOrder',
				data: {
					'product_id': id,
					'order_id': disposal_id,
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
					url: base_url + 'order/order/update_disposalOrder',
					data: {
						'product_id': id,
						'order_id': disposal_id,
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

	$(".btn-sub").click(function() {
		var dispose_by  =  $('#dispose_by').val();
		var order_name  =  $("#order_name").val();
		var order_id	=  $('#disposal_id').val();
		$.ajax({
            type: 'POST',
            url: base_url + 'order/order/update_disposalOrder',
            data: {
				'order_status'	: 2,
				'order_id' 		: order_id,
				'dispose_by'	: dispose_by,
				'order_name'	: order_name,				
                'saveOrder'		: true
            },
			beforeSend: function() {
				$.LoadingOverlay("show");
			},
            success: function(res) {
				$.LoadingOverlay("show");
				window.location.href = base_url + 'order/order/view_order';
            },
            error: function() {
				$.LoadingOverlay("hide");
                alert('request failed');
            }
        });
	});
	
	if(localStorage.getItem('step')){ 
		var step	=	localStorage.getItem('step');
		$("#dsp_stp"+step).trigger("click");
		$(".nav-pills a[data-toggle=tab]").on("click", function(e) {
			if(e.originalEvent && $(this).attr("class") == "step"){
				e.preventDefault();
				e.stopImmediatePropagation();
				return true;
			}
		});	
		$("#dsp_stp"+step).trigger("click");
		$('#tab'+step).tab('show');
		setTimeout(function() {
		if(step > 3){ 
			$(".button-next").hide();
			$(".btn-sub").show();
			$(".button-previous").show();			
		}else{
			$(".button-previous").show();			
			$(".button-next").show();
			$(".button-next").disable(false);
			$(".btn-sub").hide();	
		}
		}, 1000);
		var order_id	=	localStorage.getItem('order_id');
		$('#disposal_id').val(order_id);
		$.ajax({
			type: 'GET',
			url: base_url + 'order/order/getDisposalorderStep/'+step+"/"+order_id,
			beforeSend: function() {
				$.LoadingOverlay("show");
			},
			success: function(result) {
				
				if(step!=''){
					$("#dispose_order_step"+step+"_table").html('');
					$("#dispose_order_step"+step+"_table").html(result);
				}
				
			},
			complete: function(){
				$.LoadingOverlay("hide");  
				if(step==2){
					$('.datatable').dataTable();
				}
			},
			error: function() {
				alert('request failed');
			}
		});
	}	


	$('#exist_disposalorder').on("change",function() {
		 if ($('#exist_disposalorder').val() != '') {
			 $("#order_step1_table").show();
			var exist_order_id = $('#exist_disposalorder').val();
			$.ajax({
				type: 'POST',
				url: base_url + 'order/order/add_to_an_existing_disposalOrder',
				data: {
					'exist_order_id': exist_order_id,
					'add_exist_exist_order': true
				},
				beforeSend: function() {
					//.createShipment();
				},
				success: function(res) {
					$('#nxt-btn').attr('disabled', false);
					$("#disposal_order_step1_table").show();
					$("#disposal_order_step1_table").html('');
					$("#disposal_order_step1_table").html(res);
					
				},complete: function(){
					$('#disposal_id').val(exist_order_id);
					getOrder(exist_order_id);
				},
				error: function() {
					alert('request failed');
				}
			});
		 }
	});
	
	$('input:radio[name="create_disposal_order"]').change(
		function(){
			if ($(this).is(':checked') && $(this).val() == 'create_disposal_order') {
				$("#exist_disposalorder").hide();
				$("#disposal_order_step1_table").hide();
			}else{
				$("#exist_disposalorder").show();
				$("#disposal_order_step1_table").hide();
			}
		});

setTimeout(function() {
    localStorage.clear();
}, 3000);


</script>
		
	