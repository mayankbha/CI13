
<div class="row spacing_shipping">
<!--<h3 class="block padding-bottom-10px title_bar">Create Order</h3>-->
	<div class="col-md-1">
	</div>
	<div class="col-md-3">
		<label class="labelsize">Created Order</label>
		<hr class="hr_margin"/>
		Order Number
		<span>
			<?php if(isset($order) && ($order->order_number)) ?>
		</span>						
	</div>
	<div class="col-md-3">
		<label class="labelsize">Dispose By</label>
		<hr class="hr_margin"/>
		<input name="dispose_by" class="form-control input-width-small datepicker" value="<?php if(isset($order) && ($order->dispose_by)) echo date('m/d/Y',strtotime($order->dispose_by)); ?>" type="text"  />
	</div>
	<div class="col-md-3">
		<label class="labelsize">Contents</label>
		<hr class="hr_margin"/>
		<span><?php if(isset($items)) echo count($items);?> Msku</span></br>
		
	</div>
</div>
<h3 class="block padding-bottom-10px title_bar">Set Quantity</h3>
<table class="table">
	<thead>
		<tr style="border-color:white;">
			<th><?php echo $this->lang->line('Merchant_SKU'); ?></th>
			<th><?php echo $this->lang->line('ProductName'); ?></th>
			<th>In Stock</th>
			<th><?php echo $this->lang->line('Quantity'); ?></th>
			<th>Image Proof</th>
			<th>Image Proof Charge</th>
			<th><?php echo $this->lang->line('Remove'); ?></th>
		</tr>
	</thead>
	<?php if(!empty($items)){ ?>	
	<tbody>
	<?php foreach($items as $key=> $row) { ?> 		
		<tr>
			<td><?php echo $row->sku; ?></td>
			<td><?php echo $row->item_name; ?></td>
			<td>
				<?php echo $row->in_stock; ?></td>
			<td>
				<input name="qnty<?php echo $row->item_id; ?>" type="text" class="form-control qty"  id="dspq_<?php echo $row->item_id; ?>" onblur="updateQuantity('<?php echo $row->item_id; ?>','<?php echo $row->in_stock; ?>');" value="<?php echo $row->quantity; ?>" style="width:30%;" required />
			</td>
			<td>
				<input type="checkbox" value="<?php echo $row->item_id; ?>" name="image_proof" id="image_proof<?php echo $row->item_id; ?>"> 
			</td>
			<td class="chargeapply" id="imageproof_<?php echo $row->item_id;?>">$0</td>
			<td>
				<i class="icon-remove" style="padding-left: 22px;" onclick="deleteDisposalItem(<?php echo $row->item_id;?>,3);"></i></i>
			</td>
		</tr>
		<?php } ?>
	</tbody>
		<?php }else{ ?>
		<tbody>
			<tr>
				<td colspan="5" align="center">
					<div class="col-md-4 col-md-offset-4">
						<div class="alert alert-warning fade in"> <i class="icon-remove close" data-dismiss="alert"></i> <strong>Warning!</strong> No record in shiping plan. </div>
					</div>
				</td>
			</tr>	
		</tbody>
	<?php }  ?>	
		
</table>
<script type="text/javascript">
	$(function(){ // this will be called when the DOM is ready
	$('.datepicker').datepicker({ minDate: new Date()});
		$('.qty').on('input', function (event) { 
			this.value = this.value.replace(/[^0-9]/g, '');
			var val = $(this).val();
			while (val.substring(0, 1) === '0') {   //First character is a '0'.
				val = val.substring(1);             //Trim the leading '0'
			}
			$(this).val(val);
		});

		$('input[type="checkbox"]').click(function(){
			var disposal_id  =  $('#disposal_id').val();
			if($(this).is(":checked")){
				var val	=	$(this).val();
				$("#imageproof_"+val).text("$"+1);
				$.ajax({
				type: 'POST',
				url: base_url+'order/order/update_disposalOrder',
				data: {	'item_id': val,
						'image_proff_needed':1,
						'order_id':disposal_id, 
						'updateimageProof': true
					},
				success: function(res) {
					
				}
			});
			}else if($(this).is(":not(:checked)")){
				var val	=	$(this).val();
				$.ajax({
					type: 'POST',
					url: base_url+'order/order/update_disposalOrder',
					data: {	'item_id': val,
							'image_proff_needed':0,
							'order_id':disposal_id, 
							'updateimageProof': true
						},
					success: function(res) {
					
					}
				});
				$("#imageproof_"+val).text("$"+0);
			}
		});
	});
	
	
	function updateQuantity(id, in_stock) {
		var disposal_id  =  $('#disposal_id').val();
		var quantity	=	$('#dspq_'+id).val();
		if(parseInt(quantity) <= parseInt(in_stock)){
			$.ajax({
				type: 'POST',
				url: base_url+'order/order/update_disposalOrder',
				data: {'item_id': id,
						'quantity':quantity, 
						'order_id':disposal_id, 
						'updateQuantity': true
					},
				success: function(res) {
					
				}
			});
			$('.button-next').attr('disabled', false);
		}else{
			$('.button-next').attr('disabled', true);
			$('#err_div1').show();
			var quantity	=	$('#dspq_'+id).val('');
			$("#errrMsg1").html("Info!  quantity can not be greater than in stock quantity");
			setTimeout(function() {
				
				$('#err_div1').hide();
			}, 3000);
		}
}
//Delete Disposal Items
	function deleteDisposalItem(item_id, step){
		var disposal_id  =  $('#disposal_id').val();
		$('#confirmDeleteItem').modal({
			backdrop: 'static',
			keyboard: false
		})
		.one('click', '#deleteitem', function(e) {
			$.ajax({
				type: 'POST',
				url: base_url+'order/order/update_disposalOrder',
				data: {'item_id': item_id, 'order_id':disposal_id, 'deleteItem': true},
				beforeSend: function(){
					$.LoadingOverlay("show");
				},
				success: function(res) {
					$.LoadingOverlay("hide");
					$('#confirmDeleteItem').modal('hide');
					test(step);
				},
				complete: function() {},
				error: function() {}
			});
		});
	}
	
	function test(step){
		var order_id  =  $('#disposal_id').val();
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
</script>