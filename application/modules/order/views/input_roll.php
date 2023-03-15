
<div class="product-item float-clear" style="clear:both;">
	<div class="col-md-2">
		<div class="form-group">
			
			<div class="col-md-12">
				<label class="control-label"></label>
				<input type="text" name="item_sku[]" class="form-control required sss item_sku<?php echo $add_more_line_items_count; ?>" placeholder="SKU" style="width: 70%;" value="" id="<?php echo $add_more_line_items_count; ?>" onkeyup="checkSku(this.id);" />
			</div>
			
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			
			<div class="col-md-12" style="margin-left: -72px;">
				<label class="control-label"></label>
				<input type="text" name="item_title[]" class="form-control required item_name<?php echo $add_more_line_items_count; ?>" id="<?php echo $add_more_line_items_count; ?>" value="" placeholder="Name" style="width: 151%;">
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<div class="col-md-12" style="margin-left: 148px;">
				<label class="control-label"></label>
				<input type="text" name="item_quantity[]"  class="form-control required quantity" value="" placeholder="Quantity" style="width: 70%;" onkeyup="getItemCharges();" />
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<div class="col-md-12" style="margin-left:113px;">
				<label class="control-label"></label>
				<input type="text" name="item_price[]" class="form-control required qty item_price<?php echo $add_more_line_items_count; ?>" id="<?php echo $add_more_line_items_count; ?>" value="" placeholder="Price" style="width: 70%;">
			</div>
		</div>
	</div>
	
	<div class="col-md-2">
		<div class="form-group">
			<div class="col-md-12" style="margin-left:113px;">
				<label class="control-label"></label>
				
				<span class="form-control item_charges<?php echo $add_more_line_items_count; ?>" data-toggle="popover-x" data-target="#order_line_item_charge<?php echo $add_more_line_items_count; ?>" data-placement="left"></span>
			</div>
		</div>
	</div>
											
	<a class="text-danger" style="margin-left:15px;" onclick="deleteme(this)"><i class="glyphicon glyphicon-remove" style="padding-left: 48px;top: 27px;cursor: pointer;"></i></a>
	
	<div id="order_line_item_charge<?php echo $add_more_line_items_count; ?>" class="col-md-12 popover popover-default" style="max-width: 387px ! important;">
		<div>
			<div class="arrow"></div>
			<h3 class="popover-title"><span class="close pull-right" data-dismiss="popover-x">&times;</span>Fee Preview</h3>
		</div>
		<div class="popover-content">
			<div class="col-md-12">
				<div class="popover-text">
					<span class="pull-right popup_per_unit_charge<?php echo $add_more_line_items_count; ?>"></span>Per Unit Charge  <br />
					<span class="pull-right popup_quantity<?php echo $add_more_line_items_count; ?>"> </span>Quantity  <br /> 
				</div>
				<div class="popover-title2">
					<span class="pull-right popup_total_charges<?php echo $add_more_line_items_count; ?>"></span>Fee Estimate  <br />
				</div>
			</div>    
		</div>
	</div>
	
</div>
<script>
$(function(){ // this will be called when the DOM is ready
		$('.qty').on('input', function (event) { 
			this.value = this.value.replace(/[^0-9]/g, '');
			var val = $(this).val();
			while (val.substring(0, 1) === '0') {   //First character is a '0'.
				val = val.substring(1);             //Trim the leading '0'
			}
			$(this).val(val);
		});

		$(".sss").keyup(function(){
			//alert('The option with value ' + $(this).val() + ' and text ' + $(this).text() + ' was selected.');
			
			$.ajax({
				type:'POST',
				url:base_url + 'order/order/checkSku',
				data: {
					'sku': $(this).val(),
					'getSku': true
				},
				beforeSend: function(){
				},
				success:function(data){
					if(data.inventory_id){
						$(this).css("border-color", "#fff");
						$('.sss').addClass("has-success");
						$('.testsku').hide();
					}else{
						
						$('.sss').addClass("has-error");
						$(this).addClass("has-error");
						$(this).css("border-color", "red");
						$('.testsku').show();
					}
				},
				complete: function() {},
				error: function() {}
			}); 
		});
	});
</script>