// Login and signup js
$(document).ready(function() {
    "use strict";

    $("#validate-paypal-form").validate();
    $("#validate-alipay-form").validate();
    $("#verify-shipstation-account-form").validate();
    $("#validate-myprofile1-form").validate();
    $("#validate-myprofile2-form").validate();
    $("#validate-shipping-form").validate();
    $('#validate-addaddress-form').validate();
    $('#validate-editaddaddress-form').validate();

    $("input:checkbox.status").click(function() {
        if ($(this).prop("checked") == true) {
            $('#chk_val').val(1);
        } else if ($(this).prop("checked") == false) {
            $('#chk_val').val(0);
        }

        $('#warehouse_form_btn').show();
    });

	$(".nav-pills a[data-toggle=tab]").on("click", function(e) {
		if(e.originalEvent && $(this).attr("class") == "step"){
			e.preventDefault();
			e.stopImmediatePropagation();
			return false;
		}
	});	
	
	$("#addaddress").click(function(e) { 
		$(".Editaddress1").hide();
		$('#name').val('');
		$('#addressline1').val('');
		$('#addressline2').val('');
		$('#country').val('');
		$('#city').val('');
		$('#zipcode').val('');
		$('#contactoffice').val('');
		$('#contactmobile').val('');
		$("#AddAddress").css("display", "block");		
			
	});
	
    $('#validate-myprofile2-form').submit(function(event) {
        event.preventDefault();
        if ($("#validate-myprofile2-form").valid()) {
            if ($("#validate-myprofile1-form").valid()) {
                var myprofile1_form = $('#validate-myprofile2-form').serialize();
                $.ajax({
                    type: 'POST',
                    url: base_url + 'dashboard/MyProfileController/saveMyProfile',
                    data: myprofile1_form,
                    success: function(res) {
                        if (res.updated) {
                            $("html, body").animate({
                                scrollTop: 0
                            }, "slow");
                            $('.scc_div').show();
                            $(".successMsg").html("Your profile has been updated successfully.");
                            setTimeout(function() {
                                $('.scc_div').hide();
                            }, 3000);
                        } else if (res.save) {
                            $("html, body").animate({
                                scrollTop: 0
                            }, "slow");
                            $('.err_div').show();
                            $(".successMsg").html("Your profile has been saved successfully.");
                            setTimeout(function() {
                                $('.scc_div').hide();
                            }, 3000);
                        } else {
                            $("html, body").animate({
                                scrollTop: 0
                            }, "slow");
                            $('.err_div').show();
                            $(".errrMsg").html('Error occured!!! Please try again later.');
                            setTimeout(function() {
                                $('.err_div').hide();
                            }, 3000);
                        }
                    }
                });
            }
        }
    });

    $('#validate-myprofile1-form').submit(function(event) {
        event.preventDefault();
        if ($("#validate-myprofile1-form").valid()) {
            var myprofile1_form = $('#validate-myprofile1-form').serialize();
            $.ajax({
                type: 'POST',
                url: base_url + 'dashboard/MyProfileController/saveMyProfile',
                data: myprofile1_form,
                success: function(res) {
                    if (res.success) {
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                        $('.scc_div').show();
                        $(".successMsg").html("Your profile has been updated successfully.");
                        setTimeout(function() {
                            $('.scc_div').hide();
                        }, 3000);
						$('#tab_edit_account').hide();
						
                    } else if (res.error) {
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                        $('.err_div').show();
                        $(".errrMsg").html("Error occured!!! Please try again later.");
                        setTimeout(function() {
                            $('.err_div').hide();
                        }, 3000);
                    }
                }
            });
        }
    });


    $('#validate-paypal-form').submit(function(event) {
        event.preventDefault();
        if ($('#paypal_firstname').val().length > 0 && $('#paypal_lastname').val().length > 0 && $('#paypal_credit_card_type').val().length > 0 && $('#paypal_cc_number').val().length > 0 && $('#paypal_expiry_month').val().length > 0 && $('#paypal_expiry_year').val().length > 0 && $('#paypal_cvv').val().length > 0) {
            //$('#paypal_form_btn').hide();
            $('#paypal_form_btn').after('<div style="width: 300px;" id="loading"><img src="' + base_url + 'assets/img/default.gif" /> Authorizing your Details...</div>');
            $.ajax({
                type: 'POST',
                url: base_url + 'payment/PaypalController/paypal',
                data: $('#validate-paypal-form').serialize(),
                success: function(res) {
                    if (res != '') {
                        window.location.href = base_url + 'payment';
                        //$('#loading').remove();
                        //$("html, body").animate({ scrollTop: 0 }, "slow");
                        //$('#paymentform').html(res);
                    } else {
                        alert('Error occured!!! Please try again later.');
                    }
                }
            });
        }
    });

    $('#validate-alipay-form').submit(function(event) {
        event.preventDefault();

        if ($('#alipay_firstname').val().length > 0 && $('#alipay_lastname').val().length > 0 && $('#alipay_card_type').val().length > 0 && $('#alipay_cc_number').val().length > 0 && $('#alipay_month').val().length > 0 && $('#alipay_year').val().length > 0 && $('#alipay_cvv').val().length > 0) {
            $('#alipay_form_btn').after('<div style="width: 300px;" id="loading"><img src="' + base_url + 'assets/img/default.gif" /> Authorizing your Details...</div>');

            $.ajax({
                type: 'POST',
                url: base_url + 'payment/AlipayController/alipay',
                data: $('#validate-alipay-form').serialize(),
                success: function(res) {
                    //alert(res);

                    if (res != '') {
                        //$('#loading').remove();
                        //$("html, body").animate({ scrollTop: 0 }, "slow");
                        //$('#paymentform').html(res);
                        window.location.href = base_url + 'payment';
                    } else {
                        alert('Error occured!!! Please try again later.');
                    }
                }
            });
        }
    });

    $('#verify-shipstation-account-form').submit(function(event) {
        event.preventDefault();

        if ($('#shipstation_api_key').val().length > 0 && $('#shipstation_api_key_screct').val().length > 0) {

            $('#shipstation_form_btn').after('<div style="width: 300px;" id="loading"><img src="' + base_url + 'assets/img/default.gif" /> Authorizing your Details...</div>');

            $.ajax({
                type: 'POST',
                url: base_url + 'Shipstation/validateShipstationAccount',
                data: $('#verify-shipstation-account-form').serialize(),
                success: function(res) {
                    //alert(res);

                    if (res != '') {
                        //$('#loading').remove();

                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");

                        //$('#shipstation').html(res);
                        window.location.href = base_url + 'shipstation/shipstation';
                        setTimeout(function() {
                            $('#product_count').html('');
                            $('#warning_div').hide();
                        }, 4000)
                    } else {
                        alert('Error occured!!! Please try again later.');
                    }
                },
                /*error: function(XMLHttpRequest, textStatus, errorThrown) {
					alert("Status: " + textStatus); alert("Error: " + errorThrown);
				}*/
            });
        }
    });

    $('#validate-warehouse-form').submit(function(event) {
        event.preventDefault();

        $('#warehouse_form_btn').hide();

        $('#warehouse_form_btn').after('<div style="width: 300px;" id="loading"><img src="' + base_url + 'assets/img/default.gif" /> Saving Please wait...</div>');

        $.ajax({
            type: 'POST',
            url: base_url + 'warehouse',
            data: $('#validate-warehouse-form').serialize(),
            success: function(res) {
                $('#warehouse_success_div').show();

                $('#loading').remove();
            }
        });
    });
$('#validate-amazon-form').submit(function(event) { 
	if ($("#validate-amazon-form").valid()) {
		$('#submitamazon').attr('disabled', true);
		
		$.ajax({
			type : 'POST',
			url : base_url+'amazon/Amazon/validatAmazon',
			data : $('#validate-amazon-form').serialize(),
			success: function(res) {
				if(res==''){
					$('#submitamazon').attr('disabled', false);
					$('.successdiv').show();
					setTimeout(function() {
						$('.successdiv').hide();
						window.location.href = window.location.href;
					}, 5000);
				}else{ 
					$('#submitamazon').attr('disabled', false);
					$('.errordiv').show();
					$('.errordiv').html(res);
					setTimeout(function() {
						$('.errordiv').hide();
					}, 5000);
				}
            },
		});
	}
	event.preventDefault();
});

$('#searchShpimemet').submit(function(event) {
	$(".datatable").DataTable({
            "bDestroy": true,
    });
	$.ajax({
			type : 'POST',
			url : base_url+'shipping/Shipping/search',
			data : $('#searchShpimemet').serialize(),
			success: function(res) {
				if(res!=''){
					$('.datatable').dataTable();
					$("#ajaxview").html(res);
					  
				}else{ 
			
				}
            },
	});	
	event.preventDefault();
});

    $('#validate-warehouse-form').submit(function(event) {

        event.preventDefault();
    });

	$('#validate-ticket-form').submit(function(event) {
		event.preventDefault();
	
		var priority 	= $('#priority').val();
		var category 	= $('#category').val();
		var subject 	= $('#subject').val();
		var body 		= $('#body').val();
		var hubwayvalue 		= $('#hubwayvalue').val();
		
		$.ajax({
			type: 'POST',
			url: base_url+'ticketdetails/TicketdetailsController/addTicketSave',
			data: { 'priority':priority,'category':category ,'subject':subject ,'body':body ,'hubwayvalue':hubwayvalue},
			success: function(res) {
				
				if(res == 1){
					$('#error_message').show();
					setTimeout(function() {
						$('#error_message').hide();
					}, 5000);
				} else {
					
					window.location.href = base_url+'ticketdetails/TicketdetailsController/supportThreads/'+res;
					
				}
			}
		});
		
	});


	$('#validate-addmessage-form').submit(function(event) {
	  var ticket_system_id = $('#ticket_system_id').val();
	  var ticketID = $('#ticketID').val();
	  var body = $('#body').val();
	  var user_id = $('#user_id').val();
	  event.preventDefault();
			$.ajax({
				type: 'POST',
				url: base_url+'ticketdetails/TicketdetailsController/addChatTicketSave',
				data: { 'ticket_system_id':ticket_system_id,'body':body,'ticketID':ticketID,'user_id':user_id},
				success: function(res) {
					if(res == 1){
						$('#error_message').show();
						setTimeout(function() {
						$('#error_message').hide();
					}, 5000);
					} else if(res == 0){
						window.location.href = window.location.href;
					}
				}
		  });
	});

 $('#validate-addmessage-formAdmin').submit(function(event) {
  var ticket_system_id = $('#ticket_system_id').val();
  var ticketID = $('#ticketID').val();
  var body = $('#body').val();
  var user_id = $('#user_id').val();
  event.preventDefault();
  $.ajax({
   type: 'POST',
   url: base_url+'administrator/cases/addChatTicketSave',
   data: { 'ticket_system_id':ticket_system_id,'body':body,'ticketID':ticketID,'user_id':user_id},
   success: function(res) {
    if(res == 1){
     $('#error_message').show();
     setTimeout(function() {
      $('#error_message').hide();
     }, 5000);
    } else if(res == 0){
     
     window.location.href = window.location.href;
    }
   }
  });
 });


    $('#validate-addaddress-form').submit(function(event) {  
		//setTimeout(function(){ getUserAddress(); }, 5000);

		if ($("#validate-addaddress-form").valid()) { 

			var name = $('#name').val();
			var addressline1 = $('#addressline1').val();
			var addressline2 = $('#addressline2').val();
			var country = $('#country').val();
			var city = $('#city').val();
			var zipcode = $('#zipcode').val();
			var contactoffice = $('#contactoffice').val();
			var contactmobile = $('#contactmobile').val();
			
			$.ajax({
				type: 'POST',
				url: base_url + 'shipping/AddressController/saveAddress',
				data: {
					'name': name,
					'addressline1': addressline1,
					'addressline2': addressline2,
					'country': country,
					'city': city,
					'zipcode': zipcode,
					'contactoffice': contactoffice,
					'contactmobile': contactmobile
				},
				success: function(res) {
					if(res){
						getUserAddress();
						$('#AddAddress').hide();
					}
					
				}
			});
		}
		event.preventDefault();
    });

    $('#validate-editaddaddress-form').submit(function(event) {
		
		if ($("#validate-editaddaddress-form").valid()) { 
		  var editname 			= 		$('#editname').val();
        var editaddressline1 	= 		$('#editaddressline1').val();
        var editaddressline2 	= 		$('#editaddressline2').val();
        var editcountry 		= 		$('#editcountry').val();
        var editcity 			= 		$('#editcity').val();
        var editzipcode 		= 		$('#editzipcode').val();
        var editofficeno 		= 		$('#editofficeno').val();
        var editmobileno 		= 		$('#editmobileno').val();
        var address_id 			= 		$('#address_id').val();
        $.ajax({
            type: 'POST',
            url: base_url + 'shipping/AddressController/saveEditInformation',
            data: {
                'editname': editname,
                'editaddressline1': editaddressline1,
                'editaddressline2': editaddressline2,
                'editcountry': editcountry,
                'editcity': editcity,
                'editzipcode': editzipcode,
                'editofficeno': editofficeno,
                'editmobileno': editmobileno,
                'address_id': address_id
            },
            success: function(res) {
                if (res.address_id) {
					getUserAddress();
					$(".Editaddress1").hide();
                } else if (res == 0) {
                    $('#Edit_error_message').show();
                    setTimeout(function() {
                        $('#Edit_error_message').hide();
                    }, 1000)
                }

            },
            error: function() {
                alert('request failed');
            }
        });
		}
      event.preventDefault();
    });
});

// signup error and suceess msg hide 
setTimeout(function() {
    $('#success_signup_Message').fadeOut('fast');
}, 10000); // <-- time in milliseconds

function showDeletePopup(table, column, id) {
    $('#remove-yes-button').attr('onClick', 'deleteAccount(\'' + table + '\', \'' + column + '\', ' + id + ')');
    $('#accountremove').modal('show');
}

function deleteAccount(table, column, id) { 
    if (table == 'alipay' || table == 'paypal') {

        $.ajax({
            type: 'POST',
            url: base_url + 'Payment/deleteRecord',
            data: {
                'table': table,
                'column': column,
                'value': id
            },
            success: function(res) {
                if (res == 1) {
                    window.location.href = window.location.href;
                } else if (res == 0) {
                    alert('Error occured!!! Please try again later.');
                }
            },
            error: function() {
                alert('request failed');
            }
        });

    } else if (table == 'Shipping') {
        $.ajax({
            type: 'POST',
            url: base_url + 'Payment/deleteRecord',
            data: {
                'table': table,
                'column': column,
                'value': id
            },
            success: function(res) {
                if (res == 1) {
                    window.location.href = window.location.href;
                } else if (res == 0) {
                    alert('Error occured!!! Please try again later.');
                }
            },
            error: function() {
                alert('request failed');
            }
        });
    } else if (table == 'addresses') {
        $.ajax({
            type: 'POST',
            url: base_url + 'shipping/AddressController/deleteAddress',
            data: {
                'table': table,
                'column': column,
                'value': id
            },
            success: function(res) {
				$('#accountremove').modal('hide');
                getUserAddress();
				checkUserAddress();
            },
            error: function() {
                alert('request failed');
            }
        });
    }else if (table == 'config') {
        $.ajax({
            type: 'POST',
            url: base_url + 'amazon/Amazon/deleteAccount',
            data: {
                'table': table,
                'column': column,
                'value': id
            },
            success: function(res) {
				window.location.href = window.location.href;
            },
            error: function() {
                alert('request failed');
            }
        });
    }
}

function editAddresswindow(formId) { 
	$("#myModalFullscreen").animate({ scrollTop: 700 }, "slow");
	
    $('#AddAddress').hide();
    var address_id = formId;

    $.ajax({
        type: 'POST',
        url: base_url + 'shipping/AddressController/editAddress/' + formId,
        data: {
            'address_id': address_id
        },
        success: function(res) {
            $(".Editaddress1").show();
            var obj = jQuery.parseJSON(res);

            $('#editname').val(obj.name);
            $('#editaddressline1').val(obj.addressline1);
            $('#editaddressline2').val(obj.addressline2);
            $('#editcountry').val(obj.country);
            $('#editcity').val(obj.city);
            $('#editzipcode').val(obj.zipcode);
            $('#editofficeno').val(obj.contactoffice);
            $('#editmobileno').val(obj.contactmobile);
            $('#address_id').val(obj.address_id);

            $('html,body').animate({
                    scrollTop: $(".Editaddress1").offset().top
                },
                'slow');

        },
        error: function() {
            alert('request failed');
        }
    });
}

$("#addeditshippingdat1e").hide();
var isOpen = false;

function editshippingdate() {
    $("html, body").animate({
        scrollTop: 0
    }, "slow");
    $("#editshippingdate").focus();

    if (isOpen) {

        var isValid = /\s/;
        var getvalueShipping = $('#getvalueShipping').val();
        if (getvalueShipping == '') {
            //$('#fname').css({'border-color' : '#d3d3d3'});
            $('#getvalueShipping').css({
                'border-color': '#ea4335'
            });
            $('#err_div').show();
            $("#errrMsg").html("Please enter shipment name");
            setTimeout(function() {
                $('#err_div').hide();
            }, 3000);
        } else if (getvalueShipping.length < 6) {
            $('#getvalueShipping').css({
                'border-color': '#ea4335'
            });
            $('#err_div').show();
            $("#errrMsg").html("Your shipment name must be at least 6 characters");
            setTimeout(function() {
                $('#err_div').hide();
            }, 3000);
        } else if (getvalueShipping.length > 18) {
            $('#getvalueShipping').css({
                'border-color': '#ea4335'
            });
            $('#err_div').show();
            $("#errrMsg").html("Your shipment name must be less than 18 characters");
            setTimeout(function() {
                $('#err_div').hide();
            }, 3000);
        } else if (isValid.test(getvalueShipping)) {
            $('#getvalueShipping').css({
                'border-color': '#ea4335'
            });
            $('#err_div').show();
            $("#errrMsg").html("Your shipment name in whitespace  not allowed");
            setTimeout(function() {
                $('#err_div').hide();
            }, 3000);
        } else {
            $('#getvalueShipping').css({
                'border-color': '#d3d3d3'
            });

            $('#editshippingdate').show();

            $('#addeditshippingdat1e').hide();


            var shipmentName = $('#getvalueShipping').val();
            var address_id = $("input[name=shipfrom]").val();
            var shipping_plan_type = $("input[name=shipping_plan_type]").val();

            $.ajax({
                type: 'POST',
                url: base_url + 'shipping/Shipping/checkShipmentName',
                data: {
                    'shipment_name': shipmentName,
                    'checkShipmentName': true
                },
                success: function(res) {
                    if (res.check == 1) {
                        var datetime = $('#getvalueShipping').val();
                        $('#addeditshippingdat1e').show();
                        $('#editshippingdate').hide();
                        $('#showvalue').hide();
                        $('#hideStatic').hide();
                        $(".answer").slideDown();
                        isOpen = true;

                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                        $('#getvalueShipping').css({
                            'border-color': '#ea4335'
                        });
                        $('#err_div').show();
                        $("#errrMsg").html("Your shipment name " + shipmentName + " already exist!");
                        setTimeout(function() {
                            $('#err_div').hide();
                        }, 3000);

                    } else {
                        localStorage.setItem('shippingName', shipmentName);
                        $('.shiplabel').hide();
                        $('.shiplabelshow').show();
                        $('.shiplabelval').html(getvalueShipping);
                        var datetime = $('#getvalueShipping').val();
                        $('#showvalue').show(datetime);
                        $('#showvalue').text(datetime);
                        $(".answer").slideUp();
                        isOpen = false;

                        $('#scc_div').show();
                        $("#successMsg").html("Your shipment name has been updated successfully.");
                        setTimeout(function() {
                            $('#scc_div').hide();
                        }, 3000);
                    }
                },
                error: function() {
                    alert('request failed');
                }
            });
        }
    } else {
        var datetime = $('#getvalueShipping').val();
        $('#addeditshippingdat1e').show();
        $('#editshippingdate').hide();
        $('#showvalue').hide();
        $('#hideStatic').hide();
        $(".answer").slideDown();
        isOpen = true;
    }
}

var flag = localStorage.getItem('shipmentDisabled');
//My work start here
$(document).ready(function() {
	if (localStorage.getItem('currentStep')) { 
        var sh_id = localStorage.getItem('shipment_id');
        createSession(sh_id);
    }
	
var flag2	=	localStorage.getItem('shipmentCustom');
	if(flag2==1){
		setTimeout(function() {
		$(".checked").hide();
		$(".checked").hide();
        $('.spacing_shipping_custom').hide();
		$('.spacing_shipping').attr('disabled', true);
		$('.customrd').attr('disabled', true);
		$('.change_btn').hide();
		$('.editshippingtitle').hide();
		$('.add_product_btn').hide();
		$("#form_actions1").hide();
		$("#form_actions2").show();
        }, 1000);
		
	}else{
		$("#form_actions2").hide();
		$("#form_actions1").show();
	}

	$(".button-state").hide();
	//checkUserAddress();
    if ($("#createplan").is(":checked")) { 
        $('#continue_btn').attr('disabled', false);
        $(".hide-default").hide();
    } else if ($("#add_shipping_plan").is(":checked")) {
        $('#continue_btn').attr('disabled', false);
        $(".hide-default").hide();
    } else {
        $('#continue_btn').attr('disabled', true);
        $(".hide-default").show();
    }

    $("input:radio").change(function() { 
        if ($("#createplan").is(":checked")) {
			createShipment();
            $('#continue_btn').attr('disabled', false);
            $(".hide-default").hide();
        } else if ($("#add_shipping_plan").is(":checked")) {
            $('#continue_btn').attr('disabled', false);
            $(".hide-default").hide();
        } else {
            $('#continue_btn').attr('disabled', true);
            $(".hide-default").show();
        }
    });

    $(".hide-default").hide();
    $('#continue_btn').click(function() {

        if ($("#createplan").is(":checked")) {
            $('#continue_btn').attr('disabled', false);
            //$(".hide-default").hide();
        } else if ($("#add_shipping_plan").is(":checked")) {
            $('#continue_btn').attr('disabled', false);
            //$(".hide-default").hide();
        } else {
            $('#continue_btn').attr('disabled', true);
            //$(".hide-default").show();
        }
    });


    $('#save_works_btn').hide();
    $('#selectbox_shipping_plan').hide();
    $('.existShip_plan').hide();
    //setTimeout(function(){ $('#continue_btn').attr('disabled' , false); }, 3000);	

   


    if ($('#createplan').is(':checked')) {
        $('.existShip_plan').hide();
    }

    if ($(".case:checked").length == 0) {
        $('#continue_btn').attr('disabled', true);
    } else {
        $('#continue_btn').attr('disabled', false);
    }

    $("input:radio").change(function() {
        if ($("#add_shipping_plan").is(":checked")) {
            $('#selectbox_shipping_plan').show();
            //$('.existShip_plan').show();
        } else {
            $('.existShip_plan').hide();
            $('#selectbox_shipping_plan').hide();
            //$('.existShip_plan').show();
        }
    });

    $('input:checkbox').change(function() {
        if ($(".custonCheck:checked").length == 0) {
            $('#continue_btn').attr('disabled', true);
        } else {
            $('#continue_btn').attr('disabled', false);
        }
    });

    $("input:radio").change(function() {
        if ($("#createplan").is(":checked")) {
            $('#newshipplanDiv').show();
        } else {
            $('#newshipplanDiv').hide();
        }
    });

    //Select existing shipment plan function
    $("#selectbox_shipping_plan").change(function() {
        $('.existShip_plan').show();
        var exist_shipment = $('#selectbox_shipping_plan').val();
        $.ajax({
            type: 'POST',
            url: base_url + 'shipping/Shipping/add_to_an_existing_shipping_plan',
            data: {
                'exist_shipment_plan': exist_shipment,
                'add_exist_shipment': true
            },
            success: function(res) {
				$('#continue_btn').attr('disabled', false);
                $("#step1_table").html(res);
                getAddress(exist_shipment);
            },
            error: function() {
                alert('request failed');
            }
        });
    });
	

    //Logout And clear session
    $(".logout").click(function() {
        $.ajax({
            type: 'GET',
            url: base_url + 'user/LogedController/logout',
            success: function(res) {
                localStorage.clear();
                location.reload();
            },
            error: function() {
                alert('request failed');
            }
        });
    });

    //Logout And clear session
    $(".Create_Shipment").click(function() {
        $.ajax({
            type: 'GET',
            url: base_url + 'shipping/Shipping',
            success: function(res) {
                localStorage.clear();
                window.location.href = base_url + 'shipping/Shipping';
            },
            error: function() {
                alert('request failed');
            }
        });
    });

	
	
	$("#reconfirm-button").click(function() {
		if (flag == 1) {
            $('#err_div').show();
            $("#errrMsg").html("Sorry shipment can not edited now");
            setTimeout(function() {
                $('#err_div').hide();
            }, 3000);
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
        } else {

            localStorage.clear();
            var shipmentName = $('#getvalueShipping').val();
            $.ajax({
                type: 'POST',
                url: base_url + 'shipping/Shipping/saveShiping',
                data: {
                    'shipment_name': shipmentName,
                    'saveShiping5step': true
                },
                success: function(res) {
                    if (res.success) {
                        $("#sample_form")[0].reset();
                        localStorage.clear();
                        window.location.href = base_url + 'shipping/Shipping/view_shipment';
                    } else {
                        alert('error found');
                    }
                },
                error: function() {
                    alert('request failed');
                }
            });
        }
	});
	
	$("#reconfirm-button_1").click(function() {
		var shipmentName = $('#getvalueShipping').val();
        $.ajax({
            type: 'POST',
            url: base_url + 'shipping/Shipping/saveShiping',
            data: {
                'shipment_name': shipmentName,
                'saveShiping_workonShiping': true
            },
            success: function(res) {
                if (res) {
					 $('#reconfirmModel_1').modal('hide');
					$("#t6").trigger("click");
						$(".nav-pills a[data-toggle=tab]").on("click", function(e) {
							if(e.originalEvent && $(this).attr("class") == "step"){
								e.preventDefault();
								e.stopImmediatePropagation();
								return true;
							}
						});	
					$("#t6").trigger("click");
					$('#tab6').tab('show');
					
					
				} else {

                }
            },
            error: function() {
                alert('request failed');
            }
        });
	});
	
    $(".save_works_btn").click(function() {
		$('#reconfirmModel').modal('show');
    });

    $(".save_works_btn1").click(function() {
        $('#reconfirmModel_1').modal('show');
    });
	$(".button-state").click(function() {
        checkshipmentCost();
    });

    var shipment_name = localStorage.getItem('shippingName');
    if (shipment_name == null) {
        var tempshipment_name = $('#getvalueShipping').val();
        $('#showvalue').html(tempshipment_name);
        $('#showvalue').text(tempshipment_name);
    } else {
        $('#continue_btn').attr('disabled', false);
        $("#add_shipping_plan").attr('checked', true);
        $('#showvalue').html(shipment_name);
        $('#showvalue').text(shipment_name);
        $('#getvalueShipping').val(shipment_name);
    }

});


//Get address function
function getAddress(ship_id) {
    $.ajax({
        type: 'POST',
        url: base_url + 'shipping/Shipping/getAddress',
        data: {
            'shipment_id': ship_id,
            'getAddress': true
        },
        success: function(response) {
            if (response != '') {
				var addressinfo		=	"<hr class='hr_margin'><input type='hidden' name='shipfrom'  value='"+response.address_id+"' > "+response.name+" "+response.addressline1+" "+response.addressline2+"</br>"+response.country+" "+response.city+" "+response.zipcode+"</br>"+response.contactoffice+" "+response.contactmobile+"</br><a href='#myModalFullscreen' data-toggle='modal' class='spacing_shipping_custom'>Change</a>";
				$(".addressDiv").html(addressinfo);
            } else if (response == 0) {
                alert('Error occured!!! Please try again later.');
            }
        },
        error: function() {
            alert('request failed');
        }
    });
}

//DELETE record of table
function deleteRecord(table, column, id, step) {
    if (flag == 1) {
		 $('#deleteRecordModel').modal('hide');
        $('#err_div').show();
        $("#errrMsg").html("Sorry shipment can not edited now");
        setTimeout(function() {
            $('#err_div').hide();
        }, 1000);
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
    } else {
        if (table == 'product_to_shipments') {
            $.ajax({
                type: 'POST',
                url: base_url + 'shipping/Shipping/deleteRecord',
                data: {
                    'table': table,
                    'column': column,
                    'value': id
                },
                success: function(res) {
                    if (res == 1) {
                        gettableData(step);
                    } else if (res == 0) {
                        alert('Error occured!!! Please try again later.');
                    }
                }
            });
        }
    }
}


function changeLabel(Lid) { 
	var label_to_print	=	$('#label-'+Lid).val();	
	//var	price			=	parseFloat(0.20);
	var label_to_cost	=	parseFloat(label_to_print*0.20).toFixed(2);
	var flag						=		localStorage.getItem('shipmentDisabled');
	var flag2			=	localStorage.getItem('shipmentCustom');
	if(flag==1 && flag2==1){ 
		$.ajax({
			type: 'POST',
			url: base_url+'shipping/Shipping/updateShiping',
			data: {'product_id': Lid,'label_to_print':label_to_print,'label_cost': label_to_cost, 'updateLabel': true},
			success: function(res) {
				$("#lc-"+Lid).text('$'+label_to_cost);
				
			}
		});
	}else if(flag==1){
		$('#err_div').show();
		$("#errrMsg").html("Sorry shipment can not edited now");
		setTimeout(function(){ $('#err_div').hide(); }, 1000);
		$("html, body").animate({ scrollTop: 0 }, "slow");
	}else{		
		$.ajax({
			type: 'POST',
			url: base_url+'shipping/Shipping/updateShiping',
			data: {'product_id': Lid,'label_to_print':label_to_print,'label_cost': label_to_cost, 'updateLabel': true},
			success: function(res) {
				$("#lc-"+Lid).text('$'+label_to_cost);
				
			}
		});
	}
	
	var j = 0;
	$.each($('.label_generate'), function(index, value) { 
		j += parseInt($(this).val());
	});
	
	if(j>0){
		$('.printLabel').attr('disabled', false);
	}else{
		$('.printLabel').attr('disabled', true);
	}
}

function changeQuantity(id) {
	var quantity	=	$('#new'+id).val(); 
	var flag						=		localStorage.getItem('shipmentDisabled');
	if(flag==1){
		$('#err_div').show();
		$("#errrMsg").html("Sorry shipment can not edited now");
		setTimeout(function(){ $('#err_div').hide(); }, 1000);
		$("html, body").animate({ scrollTop: 0 }, "slow");
	}else{
		$.ajax({
			type: 'POST',
			url: base_url+'shipping/Shipping/updateShiping',
			data: {'product_id': id,'quantity':quantity, 'updateQuantity': true},
			success: function(res) {
				
			}
		});
	}
}
		
function changeQuantity_1(id) {
	var quantity	=	$('#new'+id).val(); 
	var number_of_cases	=	$('#Number_of_cases-'+id).val();	
	var	unit_per_case	=	$('#Unit_per_case-'+id).val();	
	var total			=	number_of_cases*unit_per_case;
	var flag						=		localStorage.getItem('shipmentDisabled');
	if(flag==1){
		$('#err_div1').show();
		$("#errrMsg1").html("Sorry shipment can not edited now");
		setTimeout(function(){ $('#err_div1').hide(); }, 3000);
		$("html, body").animate({ scrollTop: 0 }, "slow");
	}else{
		if(quantity==''){
			$('#continue_btn').attr('disabled', true);
			$('#Number_of_cases-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case-'+id).css({'border-color': '#ea4335'});
			$('#new'+id).css({'border-color': '#ea4335'});
			$('#new'+id).addClass("invalid");
		}
		else if(quantity==0){
			$('#continue_btn').attr('disabled', true);
			$('#Number_of_cases-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case-'+id).css({'border-color': '#ea4335'});
			$('#new'+id).css({'border-color': '#ea4335'});
			$('#new'+id).addClass("invalid");
		}
		else if (quantity < total) {
			$('#continue_btn').attr('disabled', true);
			$('#Number_of_cases-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case-'+id).css({'border-color': '#ea4335'});
			$('#new'+id).css({'border-color': '#ea4335'});
			$('#new'+id).addClass("invalid");
            $('#err_div1').show();
            $("#errrMsg1").html("Failure! Number of cases can not be greater than product quantity");
            setTimeout(function() {
                $('#err_div1').hide();
            }, 3000);
		} 
		else if (quantity > total) {
			$('#continue_btn').attr('disabled', true);
			$('#Number_of_cases-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case-'+id).css({'border-color': '#ea4335'});
			$('#new'+id).css({'border-color': '#ea4335'});
			$('#new'+id).addClass("invalid");
            $('#err_div1').show();
            $("#errrMsg1").html("Failure! Number of cases can not be greater than product quantity");
            setTimeout(function() {
                $('#err_div1').hide();
            }, 3000);
		} 
		else if ((quantity=='' ) && (total=='') ) {
			$('#continue_btn').attr('disabled', true);
			$('#Number_of_cases-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case-'+id).css({'border-color': '#ea4335'});
			$('#new'+id).css({'border-color': '#ea4335'});
			$('#new'+id).addClass("invalid");
		} 
		else if((quantity==0 ) && (total==0) ) {
			$('#continue_btn').attr('disabled', true);
			$('#Number_of_cases-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case-'+id).css({'border-color': '#ea4335'});
			$('#new'+id).css({'border-color': '#ea4335'});
			$('#new'+id).addClass("invalid");
		}else if(total==quantity){
			$('#continue_btn').attr('disabled', false);
			$.ajax({
				type: 'POST',
				url: base_url+'shipping/Shipping/updateShiping',
				data: {'product_id': id,'quantity':quantity, 'number_of_cases':number_of_cases, 'unit_per_case':unit_per_case, 'updateCases': true},
				success: function(res) {
					$('#Number_of_cases-'+id).css({'border-color': '#ccc'});
					$('#Unit_per_case-'+id).css({'border-color': '#ccc'});
					$('#new'+id).css({'border-color': '#ccc'});
					$('#new'+id).removeClass("invalid");
				}
			});
		}
		else{
			$('#continue_btn').attr('disabled', true);
			$('#Number_of_cases-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case-'+id).css({'border-color': '#ea4335'});
			$('#new'+id).css({'border-color': '#ea4335'});
            $('#err_div1').show();
            $("#errrMsg1").html("Failure! Number of cases can not be greater than product quantity");
            setTimeout(function() {
                $('#err_div1').hide();
            }, 3000);
		}
	}
}

function newDoc(shipment_id, step) {
	localStorage.setItem('shipment_id', shipment_id);
	localStorage.setItem('currentStep', step);
	if(step > 5){ 
		localStorage.setItem('shipmentDisabled', 1); 
	}
	window.location.href =  base_url+'shipping/Shipping#tab'+step+'';
}

function redirectPage(sh_id, step){ 
	step	=	5;
	localStorage.setItem('shipment_id', sh_id);

	localStorage.setItem('currentStep', step);
	localStorage.setItem('shipmentDisabled', 1);
	localStorage.setItem('shipmentCustom', 1);
	var url = base_url+'shipping/Shipping#tab'+step+'';
	window.open(url);	
	//window.location.href =  base_url+'shipping/Shipping#tab'+step+'';
}

function saveaddressDetails(id) { 
	$.ajax( {
	  type: "POST",
	  url: base_url + 'shipping/AddressController/saveaddressDetails',
	  data: {'id': id },
	  success: function( response ) {
		if(response){ 
			var addressinfo		=	"<hr class='hr_margin'><input type='hidden' name='shipfrom'  value='"+response.address_id+"' > "+response.name+" "+response.addressline1+" "+response.addressline2+"</br>"+response.country+" "+response.city+" "+response.zipcode+"</br>"+response.contactoffice+" "+response.contactmobile+"</br><a href='#myModalFullscreen' data-toggle='modal' class='spacing_shipping_custom'>Change</a>";
			$(".addressDiv").html(addressinfo);
			$("#myModalFullscreen").modal('hide');
		} 
	  }
	});
}

 
//Get step table 
function gettableData(step) {

    $.ajax({
        url: base_url + 'shipping/Shipping/getShiping/' + step,
        success: function(data) {
            $('#deleteRecordModel').modal('hide');
            if (step == 1) {
                $("#step1_table").html(data);
            }
            if (step == 2) {
                $("#step2_table").html(data);
            }
            if (step == 3) {
                $("#step3_table").html(data);
            }
            if (step == 4) {
                $("#step4_table").html(data);
            }
            if (step == 5) {
                $("#step5_table").html(data);
            }
        },
        error: function() {
            alert('request failed');
        }
    });
}

function showDelete_recordPopup(table, column, id, step) {
    $('#yes-button').attr('onClick', 'deleteRecord(\'' + table + '\', \'' + column + '\', \'' + id + '\', ' + step + ')');
    $('#deleteRecordModel').modal('show');
}



//Get Shipment
function getShipment(){
	$.ajax({
		url: base_url + 'shipping/Shipping/getShipment',
		success: function(data) {
			if(data.shipping_plan_type){
				$('#showvalue').html(data.shipment_name);
				$('#showvalue').text(data.shipment_name);
				$('#getvalueShipping').val(data.shipment_name);
				if(data.shipping_plan_type=='Individual Products'){ 
					$('.custom_radio_check1').show();
					$('.custom_radio_check2').hide();
					$('.custom_radio_check1 span').addClass('checked');
					$(".sh_plan_type1").prop("checked", true);
				}else{ 
					$('.custom_radio_check2').show();
					$('.custom_radio_check1').hide();
					$('.custom_radio_check2 span').addClass('checked');
					$(".sh_plan_type2").prop("checked", true);
					
				}
			}
			
		},
		error: function() {
			//alert('request failed');
		}
    });
}
		

//Create a new session
function createSession(s_id) {
    $.ajax({
        type: 'POST',
        url: base_url + 'shipping/Shipping/createSession',
        data: {
            'shipment_id': s_id,
            'createSession': true
        },
        success: function(res) {
            localStorage.removeItem('shippingName');
			var flag2	=	localStorage.getItem('shipmentCustom');
			if(flag2==1){}else{
				localStorage.removeItem('currentStep');
			}
            
            localStorage.setItem('shippingName', res.shipment_name);
            $(".Packingtypes").text(res.shipping_plan_type);

            $('#continue_btn').attr('disabled', false);
            
			if(res.shipping_plan_type=='Individual Products'){ 
				$('.custom_radio_check1').show();
				$('.custom_radio_check2').hide();
				$('.custom_radio_check1 span').addClass('checked');
				$(".sh_plan_type1").prop("checked", true);
					
			}else{ 
				$('.custom_radio_check2').show();
				$('.custom_radio_check1').hide();
				$('.custom_radio_check2 span').addClass('checked');
				$(".sh_plan_type2").prop("checked", true);
				
			}//if(res.status==0){
				//localStorage.setItem('shipmentDisabled', 1); 
			//}
            if (res.shipment_name) {
				var flag2	=	localStorage.getItem('shipmentCustom');
				if(flag2==1){
					getStep(5);
				}else{
					getStep(res.step);
				}
				if(res.step<5){
					$('.btn-previous').show();
				}
                $('#uniform-createplan span').addClass('checked');
                $("#createplan").prop("checked", true);
            }
            $("#createplan").attr("disabled", true);
            $("#add_shipping_plan").attr("disabled", true);
            $('.existShip_plan').show();
            $("#selectbox_shipping_plan").val(res.shipment_name);
            $("#add_shipping_plan").attr('checked', true);
            $('#showvalue').html(res.shipment_name);
            $('#showvalue').text(res.shipment_name);
            $('#getvalueShipping').val(res.shipment_name);
        },
        error: function() {
            alert('request failed');
        }
    });
}

function getStep(step) { 
    var shipment_name = localStorage.getItem('shippingName');
    var flag = localStorage.getItem('shipmentDisabled');
    if (shipment_name == null) {
        var tempshipment_name = $('#getvalueShipping').val();
        $('#showvalue').html(tempshipment_name);
        $('#showvalue').text(tempshipment_name);
    } else {
        $('#continue_btn').attr('disabled', false);
        $("#add_shipping_plan").attr('checked', true);
        $('#showvalue').html(shipment_name);
        $('#showvalue').text(shipment_name);
        $('#getvalueShipping').val(shipment_name);
    }
    if (step == 1) {
        get_firstStepData();
		var shipment_name = localStorage.getItem('shippingName');
		 if (shipment_name != null) {
			getShipment();
		 }
		
    }
    if (step == 2) {
        var shipment_name = localStorage.getItem('shippingName');
        if (shipment_name == null) {
            if (flag == 1) {} else {
                first_stepSave(step);
            }
        } else {
            get_secoundStepData(step);
        }
    }
    if (step == 3) {
        //update_secoundStep();
		getShipment();
        get_thirdStepData(step);
        if (flag == 1) {} else {
            updateShipingState(step);
        }
    }

    if (step == 4) {
        if (flag == 1) {} else {
            updateShipingState(step);
        }
        get_fourthStepData(step);
    }

    if (step == 5) {
        setTimeout(function() {
            $(".button-previous").show();
            $('#save_works_btn').show();
            $('#continue_btn_div').hide();
        }, 1000);
    } else {
        setTimeout(function() {
            $('#save_works_btn').hide();
            $('#continue_btn_div').show();
        }, 1000);
    }

    if (step == 5) {
        if (flag == 1) {} else {
            updateShipingState(step);
        }
        get_fifthStepData(step);
    }

    if (step == 6) {
        $('.editshippingtitle').hide();
		$('.button-previous').hide();
        get_sixthStepData(step);
		localStorage.setItem('shipmentDisabled', 1);

    }
    if (step == 7) {
		$(".button-state").hide();
		localStorage.setItem('shipmentDisabled', 1);
		var flag2	=	localStorage.getItem('shipmentCustom');
		if(flag2==1){
			
		}else{
			save_sixthStepData();
		}

        setTimeout(function() {
			$('.button-previous').hide();
            $('.editshippingtitle').hide();
            $('.button-submit').show();
            $('#continue_btn').hide();
        }, 1000);
    }
}


function first_stepSave(step) { 
    if ($("#add_shipping_plan").is(":checked")) {

        var exist_shipment 				= 		$('#selectbox_shipping_plan').val();
        var address_id 					= 		$("input[name=shipfrom]").val();
		var shipping_plan_type 			= 		$("input[name='shipping_plan_type']:checked").val();

        $.ajax({
            type: 'POST',
            url: base_url + 'shipping/Shipping/updatexistingShipping',
            data: {
                'shipment_id': exist_shipment,
                'address_id': address_id,
                'shipping_plan_type': shipping_plan_type,
                'updatexistingShipping': true
            },
            success: function(res) {
                if (res.shipment_name) {
					get_secoundStepData(step);
                    localStorage.setItem('shippingName', res.shipment_name);
                    if(res.shipping_plan_type=='Individual Products'){ 
						$('.custom_radio_check1').show();
						$('.custom_radio_check2').hide();
						$('.custom_radio_check1 span').addClass('checked');
						$(".sh_plan_type1").prop("checked", true);
					}else{ 
						$('.custom_radio_check2').show();
						$('.custom_radio_check1').hide();
						$('.custom_radio_check2 span').addClass('checked');
						$(".sh_plan_type2").prop("checked", true);
					}
                } else {
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");
                    $('#err_div').show();
                    $("#errrMsg").html(res);
                    setTimeout(function() {
                        $('#err_div').hide();
                    }, 1000);
                }
				
            },
            error: function() {
                alert('request failed');
            }
        });

    }

    if ($("#createplan").is(":checked")) {
        var shipmentName				= 		$('#getvalueShipping').val();
        var address_id 					= 		$("input[name=shipfrom]").val();
        var shipping_plan_type 			= 		$("input[name='shipping_plan_type']:checked").val();

        $.ajax({
            type: 'POST',
            url: base_url + 'shipping/Shipping/createShiping',
            data: {
                'shipment_name': shipmentName,
                'address_id': address_id,
                'shipping_plan_type': shipping_plan_type,
                'createShiping': true
            },
            success: function(res) {
				
                if (res.shipment_id > 0) {
                    localStorage.setItem('shippingName', res.shipment_name);
					get_secoundStepData(step);
					if(res.shipping_plan_type=='Individual Products'){ 
						$('.custom_radio_check1').show();
						$('.custom_radio_check2').hide();
						$('.custom_radio_check1 span').addClass('checked');
						$(".sh_plan_type1").prop("checked", true);
					}else{ 
						$('.custom_radio_check2').show();
						$('.custom_radio_check1').hide();
						$('.custom_radio_check2 span').addClass('checked');
						$(".sh_plan_type2").prop("checked", true);
					}
                } else {
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");
                    $('#err_div').show();
                    $("#errrMsg").html(res);
                    setTimeout(function() {
                        $('#err_div').hide();
                    }, 1000);
                }
            },
            error: function() {
                alert('request failed');
            }
        });
    }
}

function get_firstStepData(step) {
    $("#step2_table").html("<div class='jumbotron text-center' style='background-color: transparent; padding-bottom: 100px;padding-top: 100px;'><img id='loading-image' src=" + base_url + "loader.gif></div>");
    setTimeout(function() {
        $(".datatable").DataTable({
            "bDestroy": true,
        });

        $.ajax({
            url: base_url + 'shipping/Shipping/getShiping/'+step,
            success: function(data) {
                $("#step1_table").html(data);
                $('.datatable').dataTable();
            },
            error: function() {
                alert('request failed');
            }
        });
    }, 1000);
}


function get_secoundStepData(step) {
    $("#step2_table").html("<div class='jumbotron text-center' style='background-color: transparent; padding-bottom: 100px;padding-top: 100px;'><img id='loading-image' src=" + base_url + "loader.gif></div>");
    setTimeout(function() {
        $(".datatable").DataTable({
            "bDestroy": true,
        });

        $.ajax({
            url: base_url + 'shipping/Shipping/getShiping/2',
            success: function(data) {
                $("#step2_table").html(data);
                $('.datatable').dataTable();
            },
            error: function() {
                alert('request failed');
            }
        });
    }, 1000);
}



//------------------------------second Step------------------------------------------

/*$(function(){
	$('input:checkbox').change(function() { alert('jj');
		if($(".custonCheck").is(':checked')){
			var id	=	$(this).val();
			$.ajax({
				type: 'POST',
				url: base_url+'shipping/updateShiping',
				data : {'product_id':id, 'addProdcut': true},
				success: function(res) {
				}
			});
		}else{
			var id	=	$(this).val();
			$.ajax({
				type: 'POST',
				url: base_url+'shipping/updateShiping',
				data : {'product_id':id, 'deleteProduct': true},
				success: function(res) {
				}
			});
		}
	});
	});*/



function checkFunction(id) {

    if (flag == 1) {
        $('#err_div').show();
        $("#errrMsg").html("Sorry shipment can not edited now");
        setTimeout(function() {
            $('#err_div').hide();
        }, 1000);
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
    } else {
        if ($("#"+id).is(':checked')) {
			
			$.ajax({
				type: 'GET',
				url: base_url+'shipping/Shipping/checkshipmentCost/'+id,
				success: function(res) {
					if(res!=null){
						 $.ajax({
							type: 'POST',
							url: base_url + 'shipping/Shipping/updateShiping',
							data: {
								'product_id': id,
								'addProdcut': true
							},
							success: function(data) {
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
					}else{
						$("#"+id).attr('checked', false);
						$("#"+id).prop('checked', false); 
						$("#uniform-"+id+"  > span").removeClass ( 'checked' );
						// Unchecks it
						$('#'+id).show();
						$('#err_div1').show();
						$('#errrMsg1').html('You need to enter the cost of the Product Before selecting it');
						setTimeout(function() {
							$('#err_div1').hide();
						}, 5000);
					}
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
                success: function(data) {
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
}


	function checkshipmentCost(){
		$.ajax({
			type: 'GET',
			url: base_url+'shipping/Shipping/checkshipmentCost',
			success: function(res) {
				if(res.cost==0){
					 $("#continue_btn").click();
				}else{
					$('#confirmCostModel').modal('show');
				}
			}
		});
	}



function get_thirdStepData(step) {
    $("#step3_table").html("<div class='jumbotron text-center' style='background-color: transparent; padding-bottom: 100px;padding-top: 100px;'><img id='loading-image' src=" + base_url + "loader.gif></div>");
    setTimeout(function() {
        $.ajax({
            url: base_url + 'shipping/Shipping/getShiping/'+step,
            success: function(data) {

                $("#step3_table").html(data);
            },
            error: function() {
                alert('request failed');
            }
        });
    }, 1000);
}


function updateShipingState(step) {
        var shipmentName = localStorage.getItem('shippingName');
        $.ajax({
            type: 'POST',
            url: base_url + 'shipping/Shipping/updateShiping',
            data: {
                'shipmentName': shipmentName,
                'step': step,
                'updateShipingState': true
            },
            success: function(res) {},
            error: function() {
                alert('request failed');
            }
        });
    }
    //------------------------------Third Step------------------------------------------


function get_fourthStepData(step) {
    $("#step4_table").html("<div class='jumbotron text-center' style='background-color: transparent; padding-bottom: 100px;padding-top: 100px;'><img id='loading-image' src=" + base_url + "loader.gif></div>");
    setTimeout(function() {
        $.ajax({
            url: base_url + 'shipping/Shipping/getShiping/'+step,
            success: function(data) {
                $("#step4_table").html(data);
            },
            error: function() {
                alert('request failed');
            }
        });
    }, 1000);
}


//------------------------------Fourth Step------------------------------------------


function update_fourthStep() {

}

function get_fifthStepData(step) {
    $("#step5_table").html("<div class='jumbotron text-center' style='background-color: transparent; padding-bottom: 100px;padding-top: 100px;'><img id='loading-image' src=" + base_url + "loader.gif></div>");
    setTimeout(function() {
        $.ajax({
            url: base_url + 'shipping/Shipping/getShiping/'+step,
            success: function(data) {
                $("#step5_table").html(data);
				var flag2	=	localStorage.getItem('shipmentCustom');
				if(flag2==1){
					setTimeout(function() {
					$(".checked").hide();
					$(".checked").hide();
					$('.spacing_shipping_custom').hide();
					$('.spacing_shipping').attr('disabled', true);
					$('.customrd').attr('disabled', true);
					$('.change_btn').hide();
					$('.editshippingtitle').hide();
					$('.add_product_btn').hide();
					$("#form_actions1").hide();
					$("#form_actions2").show();
					}, 1000);
				}
            },
            error: function() {
                alert('request failed');
            }
        });
    }, 1000);
}


//------------------------------Fifth Step------------------------------------------
function save_fifthStep() {

}

function get_sixthStepData(step) {
    $("#step6_table").html("<div class='jumbotron text-center' style='background-color: transparent; padding-bottom: 100px;padding-top: 100px;'><img id='loading-image' src=" + base_url + "loader.gif></div>");
    setTimeout(function() {
        $.ajax({
            url: base_url + 'shipping/Shipping/getShiping/'+step,
            success: function(data) {
                $("#step6_table").html(data);
            },
            error: function() {
                alert('request failed');
            }
        });
    }, 1000);
}

function save_sixthStepData() {
    var formData = $('#sample_form').serialize();
    $.ajax({
        type: "POST",
        url: base_url + 'shipping/Shipping/save_workonShipment',
        data: formData,
        beforeSend: function() {},
        success: function(res) {
			get_sevenStepData(7);
        },
        error: function() {
            alert('request failed');
        }
    });

}

function get_sevenStepData(step){
	$("#step7_table").html("<div class='jumbotron text-center' style='background-color: transparent; padding-bottom: 100px;padding-top: 100px;'><img id='loading-image' src=" + base_url + "loader.gif></div>");
   
	$.ajax({
		url: base_url + 'shipping/Shipping/getShiping/'+step,
		success: function(data) {
			$("#step7_table").html(data);
		},
		error: function() {
			alert('request failed');
		}
	});
}

$(document).ready(function() {
	$('#country').on('change',function(){
		
		var countryID = $(this).val();

		if(countryID){
			$.ajax({
				type:'POST',
				url:base_url + 'shipping/Shipping/selectState',
				data:'country_id='+countryID,
				success:function(html){
					$('#state').html(html);
					$('#city').html('<option value="">Select state first</option>'); 
				}
			}); 
		}else{
			$('#state').html('<option value="">Select country first</option>');
			$('#city').html('<option value="">Select state first</option>'); 
		}
	});
	
	$('#state').on('change',function(){
        var stateID = $(this).val();
		
        if(stateID){
            $.ajax({
                type:'POST',
                url:base_url + 'shipping/Shipping/selectCity',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select City first</option>'); 
        }
    });
	
	$('#country1').on('change',function(){
		
		var countryID = $(this).val();

		if(countryID){
			$.ajax({
				type:'POST',
				url:base_url + 'shipping/Shipping/selectState',
				data:'country_id='+countryID,
				success:function(html){
					$('#state1').html(html);
					$('#city1').html('<option value="">Select city first</option>'); 
				}
			}); 
		}else{
			$('#state1').html('<option value="">Select country first</option>');
			$('#city1').html('<option value="">Select state first</option>'); 
		}
	});
	
	$('#state1').on('change',function(){
        var stateID = $(this).val();
		
        if(stateID){
            $.ajax({
                type:'POST',
                url:base_url + 'shipping/Shipping/selectCity',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city1').html(html);
                }
            }); 
        }else{
            $('#city1').html('<option value="">Select City first</option>'); 
        }
    });
		
		$('.print_carton').attr('disabled', true);
		$('input[type=radio][name=shipping_plan_type]').change(function() {
			
			$.ajax({
			url: base_url + 'shipping/Shipping/getShipment',
			success: function(data) {
				if(data.step  ==  4 &&  data.shipping_plan_type=="Individual Products"){ 
					$("#t2").trigger("click");
				$(".nav-pills a[data-toggle=tab]").on("click", function(e) {
					if(e.originalEvent && $(this).attr("class") == "step"){
						e.preventDefault();
						e.stopImmediatePropagation();
						return true;
					}
				});	
				$("#t3").trigger("click");
				$('#tab3').tab('show');
				$.ajax({
					type: 'POST',
					url: base_url+'shipping/Shipping/updateShiping',
					data: {'changePackingtypes': true},
					success: function(result) {
						if(result.shipment_id){
							if(result.shipping_plan_type=='Individual Products'){ 
								$('.custom_radio_check1').show();
								$('.custom_radio_check2').hide();
								setTimeout(function() {
									$('.custom_radio_check1 span').addClass('checked');
									$(".sh_plan_type1").prop("checked", true);
								}, 1000);
							}else{ 
								$('.custom_radio_check2').show();
								$('.custom_radio_check1').hide();
								setTimeout(function() {
									$('.custom_radio_check2 span').addClass('checked');
									$(".sh_plan_type2").prop("checked", true);
								}, 1000);
							}
							get_thirdStepData(3);
						}else{
							
						}
					}
				});
				
				} else if (data.step  ==  5 &&  data.shipping_plan_type=="Individual Products") {
					$("#t2").trigger("click");
				$(".nav-pills a[data-toggle=tab]").on("click", function(e) {
					if(e.originalEvent && $(this).attr("class") == "step"){
						e.preventDefault();
						e.stopImmediatePropagation();
						return true;
					}
				});	
				$("#t3").trigger("click");
				$('#tab3').tab('show');
				$.ajax({
					type: 'POST',
					url: base_url+'shipping/Shipping/updateShiping',
					data: {'changePackingtypes': true},
					success: function(result) {
						if(result.shipment_id){
							if(result.shipping_plan_type=='Individual Products'){ 
								$('.custom_radio_check1').show();
								$('.custom_radio_check2').hide();
								$('.change_btn').show();
								setTimeout(function() {
									$('.custom_radio_check1 span').addClass('checked');
									$(".sh_plan_type1").prop("checked", true);
								}, 1000);
							}else{ 
								$('.custom_radio_check2').show();
								$('.custom_radio_check1').hide();
								$('.change_btn').show();
								setTimeout(function() {
								$('.custom_radio_check2 span').addClass('checked');
								$(".sh_plan_type2").prop("checked", true);
								}, 1000);
							}
							get_thirdStepData(3);
						}else{
							
						}
					}
				});
				}else{
					$.ajax({
						type: 'POST',
						url: base_url+'shipping/Shipping/updateShiping',
						data: {'changePackingtypes': true},
						success: function(result) {
							if(result.shipment_id){
								if(result.shipping_plan_type=='Individual Products'){ 
									$('.custom_radio_check1').show();
									$('.custom_radio_check2').hide();
									$('.change_btn').show();
									setTimeout(function() {
										
										$('.custom_radio_check1 span').addClass('checked');
										$(".sh_plan_type1").prop("checked", true);
									}, 1000);	
								}else{ 
									$('.custom_radio_check2').show();
									$('.custom_radio_check1').hide();
									$('.change_btn').show();
									setTimeout(function() {
										$('.custom_radio_check2 span').addClass('checked');
										$(".sh_plan_type2").prop("checked", true);
									}, 1000);
								}
								get_thirdStepData(3);
							}else{
								
							}
						}
					});
				}
			}
			
		});

		
		
	});
	
	$('input[type=radio][name=shiping_plan]').change(function() { 
		if ($("#add_shipping_plan").is(":checked")) { 
			 $('#continue_btn').attr('disabled', true);
		}
	
	});
	
	$(".add_product_btn").click(function(e) { 
		$("#t2").trigger("click");
			$(".nav-pills a[data-toggle=tab]").on("click", function(e) {
				if(e.originalEvent && $(this).attr("class") == "step"){
					e.preventDefault();
					e.stopImmediatePropagation();
					return true;
				}
			});	
		$("#t2").trigger("click");
		$('#tab2').tab('show');
    })
	
	
	$(".generatelabelshow").click(function(e) { 
		$("#t4").trigger("click");
			$(".nav-pills a[data-toggle=tab]").on("click", function(e) {
				if(e.originalEvent && $(this).attr("class") == "step"){
					e.preventDefault();
					e.stopImmediatePropagation();
					return true;
				}
			});	
		$("#t4").trigger("click");
		$('#tab4').tab('show');
    })
	
	
	
	$(".generateinvoiceshow").click(function(e) { 
		$("#t7").trigger("click");
			$(".nav-pills a[data-toggle=tab]").on("click", function(e) {
				if(e.originalEvent && $(this).attr("class") == "step"){
					e.preventDefault();
					e.stopImmediatePropagation();
					return true;
				}
			});	
		$("#t7").trigger("click");
		$('#tab7').tab('show');
    })
	
	
	
	
	
	$(".carton").keyup(function(){
		var j = parseInt($(this).val());
		if(isNaN(j)) {
			$('.print_carton').attr('disabled', true);
		}else if(j==0){ 
			$('.print_carton').attr('disabled', true);
		}else if(j==''){ 
			$('.print_carton').attr('disabled', true);
		}else{
			$('.print_carton').attr('disabled', false);
		}
	})	
	
});


function change_Packingtypes(){ 
	$('.custom_radio_check1').show();
	$('.custom_radio_check2').show();
	$('.change_btn').hide();
}

function myFunction() {
	var carton		=	$("input[name=carton]").val();
	if(carton!=''){
		window.location=  base_url + 'shipping/Shipping/printCarton/'+carton
	}
}

function synData(){
	$.ajax({
		url: base_url + 'shipping/InventoryController/synData',
		 beforeSend: function(){
			var $btn = $('#synbtn');
			$('#synbtn').button('loading');
		},
		success: function(data) {
			//$('#synbtn').button('reset');
		},
		error: function() {
			$.ajax({
				url: base_url + 'shipping/InventoryController/updateItems1',
				beforeSend: function(){
					var $btn = $('#synbtn');
					$('#synbtn').button('loading...');
				},
				success: function(data) {
						$('#synbtn').button('reset');
						window.location.href = base_url + 'shipping/InventoryController/inventoryView';
				},
				error: function() {
					window.location.href = base_url + 'shipping/InventoryController/inventoryView';
				}
			});
		}
	});
}

function getUserAddress(){ 
	$.ajax({ 
		url: base_url + 'shipping/AddressController/getAddresses',
		success: function(data) {
			$(".custom_address_by_ajax").html('');
			$(".custom_address_by_ajax").html(data);
		},
		error: function() {
			//alert('request failed');
		}
	});
}

function checkUserAddress(){ 
	$.ajax({ 
		url: base_url + 'shipping/Shipping/checkshippingAddresses',
		success: function(response) {
			if(response.address_id){ 
				var addressinfo		=	"<hr class='hr_margin'><input type='hidden' name='shipfrom'  value='"+response.address_id+"' > "+response.name+" "+response.addressline1+" "+response.addressline2+"</br>"+response.country+" "+response.city+" "+response.zipcode+"</br>"+response.contactoffice+" "+response.contactmobile+"</br><a href='#myModalFullscreen' data-toggle='modal' class='spacing_shipping_custom'>Change</a>";
				$(".addressDiv").html(addressinfo);
				//$('#continue_btn').attr('disabled', false);
			}else{
				//$('#continue_btn').attr('disabled', true);
				var addressinfo		=	"<hr class='hr_margin'><label class='radio'><a href='#myModalFullscreen' data-toggle='modal' class='spacing_shipping_custom'>Add<input type='radio'  style='visibility:hidden;' name='shiping_planjm' value='option1' required></a></label>"; 
				$(".addressDiv").html(addressinfo);
				
			}
		},
		error: function() {
			//alert('request failed');
		}
	});
}


function changeShippedstatus(sh_id, shipped){
	
	shipped		=		$('#item_condition-'+sh_id+'').val();

	if(shipped == 0){
		$('#item_condition-'+sh_id+'').val(1).prop('selected', true);
		var shipped1 = 0;
		var msg		=	'Are you sure you want to mark NO';
	} else { 
		$('#item_condition-'+sh_id+'').val(0).prop('selected', true);
		var shipped1 = 1;
		var msg		=	'Are you sure you want to mark YES';
	}
	$('.msg').html(msg);
	
	$('#confirm').modal({
		backdrop: 'static',
		keyboard: false
	})
	.one('click', '#delete', function(e) {
		$.ajax({
			type: 'POST',
			url: base_url+'shipping/Shipping/updateShiping',
			data: {'shipment_id': sh_id, 'shipped':shipped1, 'Shippedstatus': true},
			success: function(res) {
				if(shipped==0){ 
					$('#item_condition-'+sh_id+'').val(0).prop('selected', true);
				}else{
					$('#item_condition-'+sh_id+'').val(1).prop('selected', true);
				}
				$('#confirm').modal('hide');
			}
		});
	});
}
function removeShipment(){ 
	$('#confirmDeleteShipment').modal({
		backdrop: 'static',
		keyboard: false
	})
	.one('click', '#deleteshipment', function(e) { 
		
		$.ajax({
			type: 'POST',
			url: base_url+'shipping/Shipping/deleteShipment',
			data: {'removeShipment': true},
			success: function(res) {
				window.location.href = base_url + 'shipping/Shipping/view_shipment';
			}
		});
	});
}

function createShipment(){ 
	$.ajax({
		type: 'POST',
		url: base_url+'shipping/Shipping/sessionDestroy',
		data: {'removeShipment': true},
		success: function(res) {
			localStorage.clear();
		}
	});
}

	function changeCostShipment(id){
		var cost	=	$('#costSh-'+id).val(); 
		
		$.ajax({
			type: 'POST',
			url: base_url+'shipping/InventoryController/updateInventoryCost',
			data: {'inventory_id': id, 'cost':cost, 'updateInventoryCost': true},
			success: function(res) {
				
			}
		});
	}
