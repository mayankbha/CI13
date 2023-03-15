<script type="text/javascript">
	$(document).ready(function(){
		$("[data-toggle='popover-x']").popover();
		$('[data-toggle="popover"]').popover(); 
	});
	$(function(){
    $('[rel="popover"]').popover({
        container: 'body',
        html: true,
        content: function () {
            var clone = $($(this).data('popover-content')).clone(true).removeClass('hide');
            return clone;
        }
    }).click(function(e) {
        e.preventDefault();
    });
});
</script>
<script type="text/javascript">
	$( document ).ready(function() { 
		localStorage.clear();
		//$("#sample_form")[0].reset();
	});
	
	 $(document).ready(function() {
		 
        $('.showmenu').click(function() {
             $('.menu').toggle();
        });
		
		$('.popoverxDismiss').click(function(){
			$('.popover').hide();
		});
		
		
		$('#totalpopover').popover({ trigger: "hover" , html: true, animation:false}).on("mouseenter",function () { 
			var _this = this;
			$(this).popover("show");
		});
		$('#totalpopover').popover({ trigger: "hover" , html: true, animation:false}).on("mouseleave",function () { 
			var _this = this;
			$(this).popover("hide");
		});
		
		$('.popover1').popover({ trigger: "hover" , html: true, animation:false}).on("mouseenter",function () { 
			var _this = this;
			$(this).popover("show");
		});
		$('.popover1').popover({ trigger: "hover" , html: true, animation:false}).on("mouseleave",function () { 
			var _this = this;
			$(this).popover("hide");
		});
		
		
		$('.custompop').popover({ trigger: "hover" , html: true, animation:false}).on("mouseenter",function () { 
			var _this = this;
			$(this).popover("show");
		});
		$('.custompop').popover({ trigger: "hover" , html: true, animation:false}).on("mouseleave",function () { 
			var _this = this;
			$(this).popover("hide");
		});
		
    });
</script>
<style>
.custm_display{
	display:<?php  if(isset($order)  && ($order->tataloutbound)) { echo "block";  }else{ echo "none"; } ?>
}
/*!
 * @copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2017
 * @version 1.4.3
 *
 * Bootstrap Popover Extended - Popover with modal behavior, styling enhancements and more.
 *
 * For more JQuery/Bootstrap plugins and demos visit http://plugins.krajee.com
 * For more Yii related demos visit http://demos.krajee.com
 */
.popover {
    padding: 0;
}

.popover-lg {
    min-width: 480px;
}

.popover-md {
    min-width: 350px;
}

.popover > .close {
    float: right;
    margin: 7px 9px 7px 7px;
}

.popover.top-right > .arrow, .popover.bottom-right > .arrow {
    left: 90%;
}

.popover.top-left > .arrow, .popover.bottom-left > .arrow {
    left: 10%;
}

.popover.left-top > .arrow, .popover.right-top > .arrow {
    top: 10%;
}

.popover.left-bottom > .arrow, .popover.right-bottom > .arrow {
    top: 90%;
}

.popover-default.bottom > .arrow:after {
    border-bottom-color: #f7f7f7;
}

.popover-primary.bottom > .arrow:after {
    border-bottom-color: #428bca;
}

.popover-success.bottom > .arrow:after {
    border-bottom-color: #dff0d8;
}

.popover-danger.bottom > .arrow:after {
    border-bottom-color: #f2dede;
}

.popover-warning.bottom > .arrow:after {
    border-bottom-color: #fcf8e3;
}

.popover-info.bottom > .arrow:after {
    border-bottom-color: #d9edf7;
}

.popover-default.left-top > .arrow:after {
    border-left-color: #f7f7f7;
}

.popover-default.right-top > .arrow:after {
    border-right-color: #f7f7f7;
}

.popover-primary.left-top > .arrow:after {
    border-left-color: #428bca;
}

.popover-primary.right-top > .arrow:after {
    border-right-color: #428bca;
}

.popover-success.left-top > .arrow:after {
    border-left-color: #dff0d8;
}

.popover-success.right-top > .arrow:after {
    border-right-color: #dff0d8;
}

.popover-danger.left-top > .arrow:after {
    border-left-color: #f2dede;
}

.popover-danger.right-top > .arrow:after {
    border-right-color: #f2dede;
}

.popover-warning.left-top > .arrow:after {
    border-left-color: #fcf8e3;
}

.popover-warning.right-top > .arrow:after {
    border-right-color: #fcf8e3;
}

.popover-info.left-top > .arrow:after {
    border-left-color: #d9edf7;
}

.popover-info.right-top > .arrow:after {
    border-right-color: #d9edf7;
} 

.popover-default > .popover-title {
    color: #333;
    background-color: #f7f7f7;
}

.popover-primary > .popover-title {
    color: #fff;
    background-color: #428bca;
    border: 2px solid #428bca;
}

.popover-success > .popover-title {
    color: #3c763d;
    background-color: #dff0d8;
    border-bottom: 1px solid #d6e9c6;
}

.popover-info > .popover-title {
    color: #31708f;
    background-color: #d9edf7;
    border-bottom: 1px solid #bce8f1;
}

.popover-warning > .popover-title {
    color: #8a6d3b;
    background-color: #fcf8e3;
    border-bottom: 1px solid #faebcc;
}

.popover-danger > .popover-title {
    color: #a94442;
    background-color: #f2dede;
    border-bottom: 1px solid #ebccd1;
}

.popover-footer {
    padding: 4px;
    background-color: #fbfbfb;
    text-align: right;
    border-top: 1px solid #ebebeb;
    border-radius: 0 0 5px 5px;
}

.popover-footer .btn + .btn {
    margin-bottom: 0;
    margin-left: 4px;
}

.popover-footer .btn-group .btn + .btn {
    margin-left: -1px;
}

.popover-footer .btn-block + .btn-block {
    margin-left: 0;
}

.popover.has-footer.top > .arrow:after, .has-footer.popover.top > .arrow:after {
    border-top-color: #fbfbfb;
}

.popover.has-footer.left-bottom > .arrow:after {
    border-top-color: transparent;
    border-left-color: #fbfbfb;
}

.popover.has-footer.right-bottom > .arrow:after {
    border-top-color: transparent;
    border-right-color: #fbfbfb;
}

.popover-loading {
    padding: 30px;
    background: url('../img/loading.gif') center center;
}

.popover-x-body.modal-open {
    overflow-y: auto;
}

 /* popover must be behind bootstrap navbar when scrolled */
.popover-x-body .navbar {
    z-index:1051;
}

.popover-title {
    background-color: #2A4053;
	color:white;
	border-radius: 0px 0px 0px 0px;
	display:block !important;
}

.popover-text{
	border-right: 1px solid #ebebeb;
	border-left: 1px solid #ebebeb;
    border-radius: 0px 0px 0px 0px;
    font-size: 12px;
    font-weight: normal;
    line-height: 24px;
    margin: 0;
     padding: 10px 6px ! important;
}

.togglediv{
	padding-left:10px;
}

.popover-title2{
    font-size: 12px;
    font-weight: normal;
    line-height: 13px;
    margin: 0;
    padding: 8px 14px;
	border: 1px solid #ebebeb;
    border-radius: 0px 0px 0px 0px;
	background-color:lightgrey;
	color:black;
	
}

.popover-footer1{
	border-top: 0 solid #ebebeb;
    padding: 0px;
}
.showmenu{
	 color: blue;
    cursor: pointer;
    text-decoration: underline;
}

.menu {
    padding-left: 29px;
}

.close{
    color: white;
    float: right;
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    opacity: 1;
    text-shadow: 0 0 0 white;
}

.close:hover{
    color: white;
	opacity: 1;
	text-shadow: 0 0 0 white;
}

.popover .fade .right .in{
	width:378px !important;
}
.popover-content .popover.right{
	display: block;
    left: 714px;
    top: 132.25px;
    width: 375px ! important;
    z-index: 1050;
}

/*!
 * @copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2017
 * @version 1.4.3
 *
 * Bootstrap Popover Extended - Popover with modal behavior, styling enhancements and more.
 *
 * For more JQuery/Bootstrap plugins and demos visit http://plugins.krajee.com
 * For more Yii related demos visit http://demos.krajee.com
 */
.popover {
    padding: 0;
}

.popover-lg {
    min-width: 480px;
}

.popover-md {
    min-width: 350px;
}

.popover > .close {
    float: right;
    margin: 7px 9px 7px 7px;
}

.popover.top-right > .arrow, .popover.bottom-right > .arrow {
    left: 90%;
}

.popover.top-left > .arrow, .popover.bottom-left > .arrow {
    left: 10%;
}

.popover.left-top > .arrow, .popover.right-top > .arrow {
    top: 10%;
}

.popover.left-bottom > .arrow, .popover.right-bottom > .arrow {
    top: 90%;
}

.popover-default.bottom > .arrow:after {
    border-bottom-color: #f7f7f7;
}

.popover-primary.bottom > .arrow:after {
    border-bottom-color: #428bca;
}

.popover-success.bottom > .arrow:after {
    border-bottom-color: #dff0d8;
}

.popover-danger.bottom > .arrow:after {
    border-bottom-color: #f2dede;
}

.popover-warning.bottom > .arrow:after {
    border-bottom-color: #fcf8e3;
}

.popover-info.bottom > .arrow:after {
    border-bottom-color: #d9edf7;
}

.popover-default.left-top > .arrow:after {
    border-left-color: #f7f7f7;
}

.popover-default.right-top > .arrow:after {
    border-right-color: #f7f7f7;
}

.popover-primary.left-top > .arrow:after {
    border-left-color: #428bca;
}

.popover-primary.right-top > .arrow:after {
    border-right-color: #428bca;
}

.popover-success.left-top > .arrow:after {
    border-left-color: #dff0d8;
}

.popover-success.right-top > .arrow:after {
    border-right-color: #dff0d8;
}

.popover-danger.left-top > .arrow:after {
    border-left-color: #f2dede;
}

.popover-danger.right-top > .arrow:after {
    border-right-color: #f2dede;
}

.popover-warning.left-top > .arrow:after {
    border-left-color: #fcf8e3;
}

.popover-warning.right-top > .arrow:after {
    border-right-color: #fcf8e3;
}

.popover-info.left-top > .arrow:after {
    border-left-color: #d9edf7;
}

.popover-info.right-top > .arrow:after {
    border-right-color: #d9edf7;
}

.popover-default > .popover-title {
    color: #333;
    background-color: #f7f7f7;
}

.popover-primary > .popover-title {
    color: #fff;
    background-color: #428bca;
    border: 2px solid #428bca;
}

.popover-success > .popover-title {
    color: #3c763d;
    background-color: #dff0d8;
    border-bottom: 1px solid #d6e9c6;
}

.popover-info > .popover-title {
    color: #31708f;
    background-color: #d9edf7;
    border-bottom: 1px solid #bce8f1;
}

.popover-warning > .popover-title {
    color: #8a6d3b;
    background-color: #fcf8e3;
    border-bottom: 1px solid #faebcc;
}

.popover-danger > .popover-title {
    color: #a94442;
    background-color: #f2dede;
    border-bottom: 1px solid #ebccd1;
}

.popover-footer {
    padding: 4px;
    background-color: #fbfbfb;
    text-align: right;
    border-top: 1px solid #ebebeb;
    border-radius: 0 0 5px 5px;
}

.popover-footer .btn + .btn {
    margin-bottom: 0;
    margin-left: 4px;
}

.popover-footer .btn-group .btn + .btn {
    margin-left: -1px;
}

.popover-footer .btn-block + .btn-block {
    margin-left: 0;
}

.popover.has-footer.top > .arrow:after, .has-footer.popover.top > .arrow:after {
    border-top-color: #fbfbfb;
}

.popover.has-footer.left-bottom > .arrow:after {
    border-top-color: transparent;
    border-left-color: #fbfbfb;
}

.popover.has-footer.right-bottom > .arrow:after {
    border-top-color: transparent;
    border-right-color: #fbfbfb;
}

.popover-loading {
    padding: 30px;
    background: url('../img/loading.gif') center center;
}

.popover-x-body.modal-open {
    overflow-y: auto;
}

 /* popover must be behind bootstrap navbar when scrolled */
.popover-x-body .navbar {
    z-index:1051;
}

</style>
<h3 class="block padding-bottom-10px title_bar"><?php echo $this->lang->line('BookingNotes'); ?></h3>
<div class="row spacing_shipping">
	<div class="col-md-1"></div>
	<div class="col-md-3">  
		<label>Ship To </label><br />
		<div class="addressDiv">
			<hr class="hr_margin"/> 
			<?php if(!empty($saveaddressDetails)) { ?>  
			<input type="hidden" name="shipfrom"  value="<?php echo $saveaddressDetails->address_id; ?> ">
			<?php echo $saveaddressDetails->name; ?> 
			<?php echo $saveaddressDetails->addressline1; ?></br>
			<?php echo $saveaddressDetails->addressline2; ?></br>
			<?php echo $saveaddressDetails->country; ?>
			<?php echo $saveaddressDetails->city; ?>
			<?php echo $saveaddressDetails->zipcode; ?></br>
			<?php echo $saveaddressDetails->contactoffice; ?>
			<?php echo $saveaddressDetails->contactmobile; ?>
			</br>
			<a href='#myModalFullscreen' data-toggle='modal' class="spacing_shipping_custom"><?php echo $this->lang->line('Change'); ?></a>
			&nbsp;&nbsp;&nbsp;
			<?php } else{ ?> 
					<a href='#myModalFullscreen' data-toggle='modal'><?php echo $this->lang->line('Add'); ?></a> 
			<?php } ?>
		</div>
	</div>
	<div class="col-md-2">
		<label class="labelsize"><?php echo $this->lang->line('WarehouseLocation'); ?></label>
		<hr class="hr_margin"/>
		795 Lorem Ipsum, Suite 600<br />
		San industry's, CA 94107 <br />
		P: (000) 111-0101 
	</div>
		
	<div class="col-md-2 customrd">
		<label class="labelsize"><?php echo $this->lang->line('Packingtypes'); ?></label>
		<hr class="hr_margin"/>
		<div class="custom_radio_check1">
			<label class="radio rd1">
				<input type="radio" class="uniform" name="order_type" value="1" 
				<?php if(isset($order)    &&  ($order->packing_types==1)) { echo 'checked'; }?>
				>
				.
			</label>
			<div style="padding-left: 32px; margin-top: -20px;"><?php echo $this->lang->line('Individualproducts'); ?></div>
		</div>
		<div class="custom_radio_check2">
			<label class="radio rd2">
				<input type="radio" class="uniform" name="order_type" value="2"
				<?php if(isset($order)    &&  ($order->packing_types==2)) { echo 'checked'; }?>
				>
				.
			</label>
			<div style="padding-left: 32px; margin-top: -20px;"><?php echo $this->lang->line('Caseackedproducts'); ?></div>
		</div>
	</div>
	<div class="col-md-2">
		<label class="labelsize">Ship By</label>
		<hr class="hr_margin"/>
		<input name="shipby3" class="step3databylok form-control datepicker" value="<?php if(isset($order)) echo  date('Y-m-d',strtotime($order->order_shipby)); ?>" type="text" required />
	</div>
	<div class="col-md-2">	
		<label class="labelsize"><?php echo $this->lang->line('Contents'); ?></label>
			<hr class="hr_margin"/>
		<span class="msku"><?php if(isset($items)) echo count($items); ?>Msku</span>
		</br>
		
	</div>
</div>
		
<h3 class="block padding-bottom-10px title_bar">Order</h3>
	<?php if(isset($order) && $order->packing_types	==	1) {  ?>
	<table class="table table-striped table-bordered table-checkable table-highlight-head table-no-inner-border table-hover">
		<thead>
			<tr style="border-color:white;">
				<th>Sku</th>
				<th>Item Name</th>
				<th style="text-align:center;width:11%;">Condition</th>
				<th style="text-align:center;width:11%;">Price</th>
				<th style="text-align:center;width:11%;">In Stock</th>
				<th style="text-align:center;width:11%;">Quantity</th>
				
				<th class="custm_display" style="text-align:center;width:11%;">OutBound Charges</th>
			
				<th style="width:5%;"></th>
			</tr>
		</thead>
		<?php if(!empty($items)){ ?>	
			<tbody>	
		<?php foreach($items as $key=> $item) { ?>
		
			<tr>
				<td><?php echo $item->sku; ?></td>
				<td><?php echo $item->item_name; ?></td>
				<td style="text-align:center;">NEW</td>
				<td style="text-align:center;">$<?php echo $item->unitPrice; ?></td>
				<td style="text-align:center;" ><input type="hidden" id="in_stock_t<?php echo $item->item_id; ?>" value="<?php echo $item->in_stock; ?>"> <?php echo $item->in_stock; ?></td>
				
				<td style="text-align:center;"><input name="<?php echo $item->item_id; ?>" type="text" class="form-control qty"  id="order_<?php echo $item->item_id; ?>" onkeyup="changeorderQuantity('<?php echo $item->item_id; ?>');" value="<?php echo $item->quantity; ?>" style="width:88%;" required></td>
				
				
				<?php if(isset($item->quantity) && ($item->quantity!=null)) {?>
					<td class="custm_display" style="text-align:center;">
						<span  rel="popover" data-popover-content="#myPopover_<?php echo $item->item_id; ?>" data-placement="left" class="custompop"><span id="item_unit-<?php echo $item->item_id; ?>">
						<?php $total =$item->item_dimension*$item->quantity*0.22;  
							echo $total;
						?>
						</span>	</span>	
						<div class="row">
							<div id="myPopover_<?php echo $item->item_id; ?>" class="hide" style="max-width: 387px !important; top: 132.25px; left: 714px; display: block; z-index: 1050; padding: 0px;">
								<div style="margin-left: -14px;margin-right: -14px;margin-top: -25px;">
									<div class="arrow"></div>
									<h3 class="popover-title" style="display: block !important; "><span class="close pull-right" ></span>Fee Preview</h3>
								</div>
								<!--<div class="popover-content">
									
									<div class="popover-title2">
										<span id="popcontentdata_<?php //echo $item->item_id; ?>" >
												<?php //$total =$item->item_dimension*$item->quantity*0.22;  
													//echo $item->quantity ."<i class='icon-fixed-width' style='color:light-gray;'></i>". $item->item_dimension . "<i class='icon-fixed-width'></i> 0.22 =".$total;
												?>
										</span>
										<br />
									</div>
									<div class="">
										<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
									</div>
									
								</div>	-->
								
								
								<div class="popover-content">
									<div class="popover-title">
										<span id="popcontentdata_<?php echo $item->item_id; ?>" style="margin-left:30px;margin-right:30px;">
										<?php $total = $item->item_dimension*$item->quantity*0.22;  
											echo $item->quantity ."&nbsp;<img src='http://hubway.upworkdevelopers.com/assets/img/multiply.png' width='10'>&nbsp;". $item->item_dimension . "&nbsp;<img src='http://hubway.upworkdevelopers.com/assets/img/multiply.png' width='10px'>&nbsp; 0.22 =&nbsp;$".$total;?>
										</span>  
									</div>
									<div class="popover-text">
										<span class="pull-right"><?php echo $item->quantity;?></span>Quantity <br />
										<span class="pull-right"><?php echo "$".$item->item_dimension;?></span>Total Cubic Feet  <br />
										<span class="pull-right">$0.22</span>Outbound Charges  <br />
										
									</div>
									<div class="popover-title2">
										<span class="pull-right"><?php echo "$".$total;?></span>Total <br />
									</div>
									<div class="">
										<p></p>
									</div>
								</div>
							</div>
						</div>
					</td>
									
						
				<?php } else{  ?>
					<td class="custm_display" style="text-align:center;">
						<a type="button"   style="cursor: pointer;" class="custompop" rel="popover" data-popover-content="#popover_content_<?php echo $item->item_id; ?>" data-placement="left">
							<span id="item_unit-<?php echo $item->item_id; ?>">
								<?php $total =$item->item_dimension*$item->quantity*0.22;  
									echo $total;
								?>
							</span>			
						</a>
						<span id="item_unitCalculation-<?php echo $item->item_id; ?>"></span>
						<div class="row">
							<div id="popover_content_<?php echo $item->item_id; ?>" class="hide" style="max-width: 387px !important; top: 132.25px; left: 714px; display: block; z-index: 1050; padding: 0px;">
								
								<div style="margin-left: -30px;margin-right: -30px;margin-top: -30px;">
									<div class="arrow"></div>
									<h3 class="popover-title" style="display: block !important; "><span class="close pull-right popoverxDismiss"></span>Fee Preview</h3>
								</div>
								<div class="popover-content">
									<!--<div class="popover-title2">
										<span id="popcontentdata_<?php //echo $item->item_id; ?>" >
											<?php //$total =$item->item_dimension*$item->quantity*0.22;  
												//echo $item->quantity ."<i class='icon-fixed-width'></i>". $item->item_dimension . "<i class='icon-fixed-width'></i> 0.22 =".$total;
											?>
										<span>
										<br />
									</div>
									<div class="">
										<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
									</div>-->
									
									<div class="popover-content">
										<div class="popover-title">
											<span id="popcontentdata_<?php echo $item->item_id; ?>" style="margin-left:30px;margin-right:30px;">
											<?php $total = $item->item_dimension*$item->quantity*0.22;  
												echo $item->quantity ."&nbsp;<img src='http://hubway.upworkdevelopers.com/assets/img/multiply.png' width='10'>&nbsp;". $item->item_dimension . "&nbsp;<img src='http://hubway.upworkdevelopers.com/assets/img/multiply.png' width='10px'>&nbsp; 0.22 =&nbsp;$".$total;?>
											</span>  
										</div>
										<div class="popover-text">
											<span class="pull-right"><?php echo $item->quantity;?></span>Quantity <br />
											<span class="pull-right"><?php echo "$".$item->item_dimension;?></span>Total Cubic Feet  <br />
											<span class="pull-right">$0.22</span>Outbound Charges  <br />
											
										</div>
										<div class="popover-title2">
											<span class="pull-right"><?php echo "$".$total;?></span>Total <br />
										</div>
										<div class="">
											<p></p>
										</div>
									</div>
								</div>	
							</div>
						</div>
					</td>
				<?php }   ?>
				<td style="text-align:center;">
					<i class="icon-remove" onclick="showDelete_recordPopup('product_to_order', 'item_id', <?php echo $item->item_id; ?>,3);"></i>
				</td>
			</tr>
		<?php } ?>
		</tbody>
		<?php }else{ ?>
		<tbody>
			<tr class="tableShipmenttr">
				<td colspan="10" align="center">
					<div class="col-md-12 col-md-offset-12">
						<div class="alert alert-warning fade in">  <strong>Warning!</strong> Warning! You need to have atleast 1 product to proceed </div>
					</div>
					<p class="introOrderstep3"></p>
				</td> 
			</tr>
		</tbody>
		<?php }  ?>	
	</table>
	<br />
	<div class="row">
			<div class="col-md-3">
				<!--Total Item Quantity&nbsp;&nbsp;<i class="glyphicon glyphicon-arrow-right"></i>$10.00-->
			</div>
			<div class="col-md-2">
				<!--Total Item Quantity&nbsp;&nbsp;<i class="glyphicon glyphicon-arrow-right"></i>$10.00
				<!--Total Qubic Ft&nbsp;&nbsp;<i class="glyphicon glyphicon-arrow-right"></i>$660.00-->
		  </div>
			<div class="col-md-4 custm_display  pull-right">
					Total Outbound Charges&nbsp;&nbsp;<i class="glyphicon glyphicon-arrow-right"></i>&nbsp;&nbsp;<a href="JavaScript:Void(0)" rel="popover" data-popover-content="#myPopover123" data-placement="left" id="totalpopover"><span class="tataloutbound">$<?php if(isset($order) && $order->tataloutbound!=null) { echo $order->tataloutbound; } else { echo 0; } ?></span></a>
					
				<div id="myPopover123" class="hide" style="max-width: 387px !important; top: 132.25px; left: 714px; display: block; z-index: 1050; padding: 0px;">
					<div style="margin-left: -14px;margin-right: -14px;margin-top: -25px;">
						<div class="arrow"></div>
						<h3 class="popover-title" style="display: block !important; "><span class="close pull-right popoverxDismiss"></span>Fee Preview</h3>
					</div>
					<!--<div class="popover-content">
						<div class="popover-title2">
						<span class="tataloutbound">
							<?php //if(isset($order) && $order->tataloutbound!=null) { echo $order->tataloutbound; } else { echo 0; } ?>
						<span>
							<br />
						</div>
						<div class="">
							<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
						</div>
						
					</div>	-->
					
					<div class="popover-content">
						<div class="popover-title">
							<span id="tataloutbound" style="margin-left:30px;margin-right:30px;">
								<?php if(isset($order) && $order->tataloutbound!=null) { echo $order->tataloutbound; } else { echo 0; } ?>
							</span>  
						</div>
						<div class="popover-text">
							
							
						</div>
						<div class="popover-title2">
							<span class="pull-right"><?php echo "$".$order->tataloutbound;?></span>Total <br />
						</div>
						<div class="">
							<p></p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
	<?php } else {  ?>
	
	<table class="table table-striped table-bordered table-checkable table-highlight-head table-no-inner-border table-hover">
		<thead>
			<tr style="border-color:white;">
				<th>Sku</th>
				<th>Item Name</th>
				<th style="text-align:center;">Condition</th>
				<th style="text-align:center;">Price</th>
				<th style="text-align:center;">In Stock</th>
				<th style="text-align:center;">Quantity</th>
				<th class="tableShipmenttr"><?php echo $this->lang->line('Number_of_cases'); ?></th>
				<th class="tableShipmenttr"><?php echo $this->lang->line('Unit_per_case'); ?></th>
				<th style="text-align:center;" class="custm_display">OutBound Charges</th>
				<th></th>
			</tr>
		</thead>
		<?php if(!empty($items)){ ?>	
			<tbody>	
		<?php foreach($items as $key=> $item) { ?>
		
			<tr>
				<td><?php echo $item->sku; ?></td>
				<td><?php echo $item->item_name; ?></td>
				<td style="text-align:center;">NEW</td>
				<td style="text-align:center;">$<?php echo $item->unitPrice; ?></td>
				<td style="text-align:center;" ><input type="hidden" id="in_stock_<?php echo $item->item_id ?>" value="<?php echo $item->in_stock; ?>"> <?php echo $item->in_stock; ?><?php echo $item->in_stock; ?></td>

				<td style="text-align:center;" class="tableShipmenttr"><input name="o-<?php echo $item->item_id ?>" type="text" class="form-control qty"  id="new-o<?php echo $item->item_id ?>" onkeyup="changeQuantityOrder('<?php echo $item->item_id ?>');" value="<?php echo $item->quantity; ?>"  required></td>

				<td style="text-align:center;" class="tableShipmenttr"><input name="number_of_cases_o<?php echo $item->item_id ?>" type="text" class="form-control qty "  id="Number_of_cases_o-<?php echo $item->item_id ?>" onkeyup="changeQuantityOrder('<?php echo $item->item_id; ?>');" value="<?php echo $item->number_of_cases; ?>"  required></td>
				
				<td style="text-align:center;" class="tableShipmenttr"><input name="unit_per_case_o<?php echo $item->item_id ?>" type="text" class="form-control qty "  id="Unit_per_case_o-<?php echo $item->item_id ?>" onkeyup="changeQuantityOrder('<?php echo $item->item_id; ?>');" value="<?php echo $item->unit_per_case; ?>"  required></td>

				<?php if(isset($item->quantity) && ($item->number_of_cases!=null)) {?>
					<td style="text-align:center;" class="custm_display">
					
					<a type="button" rel="popover" data-popover-content="#myPopover<?php echo $item->item_id ?>" data-placement="left" class="custompop">
						<span id="item_unit-<?php echo $item->item_id; ?>">
							<?php $total =$item->item_dimension*$item->number_of_cases*0.22;  
								echo $total;
							?>
						</span>			
					</a>

					<span id="item_unitCalculation-<?php echo $item->item_id; ?>"></span>
					<div class="row">
						<div id="myPopover<?php echo $item->item_id ?>" class="hide" style="max-width: 387px !important; top: 132.25px; left: 714px; display: block; z-index: 1050; padding: 0px;">
							<div style="margin-left: -14px;margin-right: -14px;margin-top: -25px;">
								<div class="arrow"></div>
								<h3 class="popover-title" style="display: block !important; "><span class="close pull-right"></span>Fee Preview</h3>
							</div>
							<!--<div class="popover-content">
								<div class="popover-title2">
									<span id="popcontentdata_<?php //echo $item->item_id; ?>" >
									<?php// $total =$item->item_dimension*$item->number_of_cases*0.22;  
										//echo $item->number_of_cases ."<i class='icon-fixed-width'></i>". $item->item_dimension . "<i class='icon-fixed-width'></i> 0.22 =".$total;
									?>
									<span><br />
								</div>
								<div class="">
									<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
								</div>
							</div>-->
							
							<div class="popover-content">
								<div class="popover-title">
									<span id="popcontentdata_<?php echo $item->item_id; ?>" style="margin-left:30px;margin-right:30px;">
									<?php $total =$item->item_dimension*$item->number_of_cases*0.22;  
										echo $item->number_of_cases ."&nbsp;<img src='http://hubway.upworkdevelopers.com/assets/img/multiply.png' width='10'>&nbsp;". $item->item_dimension . "&nbsp;<img src='http://hubway.upworkdevelopers.com/assets/img/multiply.png' width='10px'>&nbsp; 0.22 =&nbsp;".$total;?>
									</span>  
								</div>
								<div class="popover-text">
									<span class="pull-right"><?php echo $item->number_of_cases;?></span>Number of Cases <br />
									<span class="pull-right"><?php echo $item->item_dimension;?></span>Total Cubic Feet  <br />
									<span class="pull-right">$0.22</span>Outbound Charges  <br />
						
								</div>
								<div class="popover-title2">
									<span class="pull-right"><?php echo "$".$total;?></span>Total <br />
								</div>
								<div class="">
									<p></p>
								</div>
							</div>
							
							
						</div>
					</div>
					
					</td>
				<?php } else{  ?>
					<td class="custm_display" style="text-align:center;">
						<a type="button"  rel="popover" data-popover-content="#myPopover123<?php echo $item->item_id; ?>" data-placement="left" class="custompop">
							<span id="item_unit-<?php echo $item->item_id; ?>">
								<?php $total =$item->item_dimension*$item->number_of_cases*0.22;  
									echo $total;
								?>
							</span>			
						</a>
						<span id="item_unitCalculation-<?php echo $item->item_id; ?>"></span>
					<div class="row">
						<div id="myPopover123<?php echo $item->item_id; ?>" class="hide" style="max-width: 387px !important; top: 132.25px; left: 714px; display: block; z-index: 1050; padding: 0px;">
							<div style="margin-left: -14px;margin-right: -14px;margin-top: -25px;">
								<div class="arrow"></div>
								<h3 class="popover-title" style="display: block !important; "><span class="close pull-right"></span>Fee Preview</h3>
							</div>
							<!--<div class="popover-content">
								
								<div class="popover-title2">
										<span id="totalpopcontentdata_<?php echo $item->item_id; ?>" >
										<?php //$total =$item->item_dimension*$item->number_of_cases*0.22;  
										//echo $item->quantity ."<i class='icon-fixed-width'></i>". $item->item_dimension . "<i class='icon-fixed-width'></i> 0.22 =".$total;
									?>
										</span><br />  
								</div>
								<div class="">
									<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
								</div>
								
							</div>	-->
							
							<div class="popover-content">
								<div class="popover-title">
									<span id="totalpopcontentdata_<?php echo $item->item_id; ?>" style="margin-left:30px;margin-right:30px;">
									<?php $total =$item->item_dimension*$item->number_of_cases*0.22;  
										echo $item->number_of_cases ."&nbsp;<img src='http://hubway.upworkdevelopers.com/assets/img/multiply.png' width='10'>&nbsp;". $item->item_dimension . "&nbsp;<img src='http://hubway.upworkdevelopers.com/assets/img/multiply.png' width='10px'>&nbsp; 0.22 =&nbsp;".$total;?>
									</span>  
								</div>
								<div class="popover-text">
									<span class="pull-right"><?php echo $item->number_of_cases;?></span>Number of Cases <br />
									<span class="pull-right"><?php echo $item->item_dimension;?></span>Total Cubic Feet  <br />
									<span class="pull-right">$0.22</span>Outbound Charges  <br />
									
								</div>
								<div class="popover-title2">
									<span class="pull-right"><?php echo "$".$total;?></span>Total <br />
								</div>
								<div class="">
									<p></p>
								</div>
							</div>
						</div>
					</div>
						
						
					</td>
				
				<?php }   ?>
				<td>
					<i class="icon-remove" style="padding-left: 22px;" onclick="showDelete_recordPopup('product_to_order', 'item_id', <?php echo $item->item_id; ?>,3);"></i>
				</td>
				
			</tr>
		
		<?php } ?>
			</tbody>
		<?php }else{ ?>
		<tbody>
			<tr class="tableShipmenttr">
				<td colspan="10" align="center">
					<div class="col-md-12 col-md-offset-12">
						<div class="alert alert-warning fade in">  <strong>Warning!</strong> Warning! You need to have atleast 1 product to proceed </div>
					</div>
					<p class="introOrderstep3"></p>
				</td> 
			</tr>
		</tbody>
		<?php }  ?>	
	</table>
	<br />
		<div class="row">
		  <div class="col-md-3">
		  </div>
			<div class="col-md-3">
				<!--Total Item Quantity&nbsp;&nbsp;<i class="glyphicon glyphicon-arrow-right"></i>$10.00-->
		  </div>
			<div class="col-md-2">
				<!--Total Item Quantity&nbsp;&nbsp;<i class="glyphicon glyphicon-arrow-right"></i>$10.00
				<!--Total Qubic Ft&nbsp;&nbsp;<i class="glyphicon glyphicon-arrow-right"></i>$660.00-->
		  </div>
		 <div class="col-md-4 custm_display  pull-right">
					Total Outbound Charges&nbsp;&nbsp;<i class="glyphicon glyphicon-arrow-right"></i>&nbsp;&nbsp;<a href="JavaScript:Void(0)" rel="popover" data-popover-content="#myPopover123" data-placement="left" id="totalpopover" ><span class="tataloutbound">$<?php if(isset($order) && $order->tataloutbound!=null) { echo $order->tataloutbound; } else { echo 0; } ?></span></a>
					
				<div id="myPopover123" class="hide" style="max-width: 387px !important; top: 132.25px; left: 714px; display: block; z-index: 1050; padding: 0px;">
					<div style="margin-left: -14px;margin-right: -14px;margin-top: -25px;">
						<div class="arrow"></div>
						<h3 class="popover-title" style="display: block !important; "><span class="close pull-right"></span>Fee Preview</h3>
					</div>
					<!--<div class="popover-content">
						
						<div class="popover-title2">
							<span class="tataloutbound">
								<?php// if(isset($order) && $order->tataloutbound!=null) { echo $order->tataloutbound; } else { echo 0; } ?>
							<span><br />
						</div>
						<div class="">
							<p>1 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
						</div>
						
					</div>-->	
					
					
					<div class="popover-content">
						<div class="popover-title">
							<span id="tataloutbound" style="margin-left:30px;margin-right:30px;">
								<?php if(isset($order) && $order->tataloutbound!=null) { echo $order->tataloutbound; } else { echo 0; } ?>
							</span>  
						</div>
						<div class="popover-text">
							
							
						</div>
						<div class="popover-title2">
							<span class="pull-right"><?php echo "$".$order->tataloutbound;?></span>Total <br />
						</div>
						<div class="">
							<p></p>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php } ?>

<script type="text/javascript"> 


function changeQuantityOrder(id){
	var quantity			=	parseInt($('#new-o'+id).val()); 
	var	in_stock			=	parseInt($('#in_stock_'+id).val());
	var number_of_cases		=	parseInt($('#Number_of_cases_o-'+id).val());	
	var	unit_per_case		=	parseInt($('#Unit_per_case_o-'+id).val());	
	var total				=	number_of_cases*unit_per_case;
	var flag						=		localStorage.getItem('shipmentDisabled');
	if(flag==1){
		$('#err_div1').show();
		$("#errrMsg1").html("Sorry shipment can not edited now");
		setTimeout(function(){ $('#err_div1').hide(); }, 3000);
		$("html, body").animate({ scrollTop: 0 }, "slow");
	}else{
		if(quantity==''){
			$('.button-next').attr('disabled', true);
			$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).addClass("invalid");
		}
		else if(quantity==0){
			$('.button-next').attr('disabled', true);
			$$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).addClass("invalid");
		}
		else if (quantity < total) {
			$('.button-next').attr('disabled', true);
			$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).addClass("invalid");
            $('#err_div1').show();
            $("#errrMsg1").html("Failure! Number of cases can not be greater than product quantity");
            setTimeout(function() {
                $('#err_div1').hide();
            }, 3000);
		} 
		else if (quantity > total) {
			$('.button-next').attr('disabled', true);
			$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).addClass("invalid");
            $('#err_div1').show();
            $("#errrMsg1").html("Failure! Number of cases can not be greater than product quantity");
            setTimeout(function() {
                $('#err_div1').hide();
            }, 3000);
		} 
		else if ((quantity=='' ) && (total=='') ) {
			$('.button-next').attr('disabled', true);
			$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).addClass("invalid");
		} 
		else if((quantity==0 ) && (total==0) ) {
			$('.button-next').attr('disabled', true);
			$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).addClass("invalid");
		}else if(quantity >= in_stock) {
			$('.button-next').attr('disabled', true);
			$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).addClass("invalid");
			$('#err_div1').show();
			$("#errrMsg1").html("Info!  quantity can not be greater than in stock quantity");
			setTimeout(function() {
				$('#err_div1').hide();
			}, 3000);
		}else if(total==quantity){
			$('.button-next').attr('disabled', false);
			$.ajax({
				type: 'POST',
				url: base_url+'order/order/updateOrder',
				data: {'item_id': id,'quantity':quantity, 'number_of_cases':number_of_cases, 'unit_per_case':unit_per_case, 'updateCases': true},
				success: function(res) {
					$('#Number_of_cases_o-'+id).css({'border-color': '#ccc'});
					$('#Unit_per_case_o-'+id).css({'border-color': '#ccc'});
					$('#new-o'+id).css({'border-color': '#ccc'});
					$('#new-o'+id).removeClass("invalid");
					
					//$('.unit').text("$"+res.unit);
					//$('.totalqubicft').text("$"+res.totalqubicft);
					$('.tataloutbound').text("$"+res.tataloutbound);
					$('#item_unit-'+id).text("$"+res.outBound);
					$('.custm_display').show();
					var unitCalculation	=	parseFloat(res.item_dimension*number_of_cases*res.Item_charge).toFixed(2);
					//$('#item_unit-'+id).html('');
					$('#item_unit-'+id).text("$"+unitCalculation);
					$('#popcontentdata_'+id).text(number_of_cases+"*"+res.item_dimension+"*"+res.Item_charge+"="+"$"+unitCalculation);
					$('#totalpopcontentdata_'+id).text(number_of_cases+"*"+res.item_dimension+"*"+res.Item_charge+"="+"$"+unitCalculation);
					$('.custom-alert').hide();
				}
			});
		}
		else{
			$('#new-o'+id).val(''); 
			$('.button-next').attr('disabled', true);
			$('#Number_of_cases_o-'+id).css({'border-color': '#ea4335'});
			$('#Unit_per_case_o-'+id).css({'border-color': '#ea4335'});
			$('#new-o'+id).css({'border-color': '#ea4335'});
            $('#err_div1').show();
            $("#errrMsg1").html("Failure! Number of cases can not be greater than product quantity");
            setTimeout(function() {
                $('#err_div1').hide();
            }, 3000);
		}
	}
}


$(function(){ // this will be called when the DOM is ready
	$('.qty').on('input', function (event) { 
		this.value = this.value.replace(/[^0-9]/g, '');
		var val = $(this).val();
		while (val.substring(0, 1) === '0') {   //First character is a '0'.
			val = val.substring(1);             //Trim the leading '0'
		}
		$(this).val(val);
	});
});

function changeorderQuantity(id) {
	var quantity	=	$('#order_'+id).val();
	var	in_stock	=	$('#in_stock_t'+id).val();
	
	if(parseInt(quantity) <= parseInt(in_stock)){
		$.ajax({
			type: 'POST',
			url: base_url+'order/order/updateOrder',
			data: {'item_id': id,'quantity':quantity, 'updateQuantity': true},
			success: function(res) {
				//$('.unit').text("$"+res.unit);
				//$('.totalqubicft').text("$"+res.totalqubicft);
				$('.tataloutbound').text("$"+res.tataloutbound);
				$('#item_unit-'+id).text("$"+res.outBound);
				//$('#item_unit-'+id).html('');
				$('.custm_display').show();
				if(res.tataloutbound==0){
					$('.custm_display').hide();
				}
				var unitCalculation	=	parseFloat(res.item_dimension*res.Item_quantity*res.Item_charge).toFixed(2);
				$('#item_unit-'+id).text("$"+unitCalculation);
				$('#popcontentdata_'+id).text(res.Item_quantity+"*"+res.item_dimension+"*"+res.Item_charge+"="+"$"+unitCalculation);
				//$('#totalpopcontentdata_'+id).text("$"+unitCalculation);
				$('.custom-alert').hide();					
			}
		});
		$('.button-next').attr('disabled', false);
	}else{
		$('#order_'+id).val('');
		$('.button-next').attr('disabled', true);
		$('#err_div1').show();
        $("#errrMsg1").html("Info!  quantity can not be greater than in stock quantity");
		setTimeout(function() {
			$('#err_div1').hide();
		}, 3000);
	}
}

	$(document).ready(function() {
		$('.datepicker').datepicker({ minDate: new Date()});
		$("#myPopover123").hover(function(){
			$("#myPopover123").toggle();
		});
		 
	
		$.validator.messages.required = "";
		if($("p").hasClass("introOrderstep3")){ 
			$('.button-next').attr('disabled', true);
		}else{
			$('.button-next').attr('disabled', false);
		}

		$('input[type=radio][name=order_type]').change(function() {
			$.ajax({
				type: 'POST',
				url: base_url+'order/order/updateOrder',
				data: {'changePackingtypes': true},
				beforeSend: function(){
					$.LoadingOverlay("show");
				},
				success: function(result) {
					if(result.packing_types){
						$.LoadingOverlay("hide");
						if(result.step==3){
							getOrderTable(3);
						}
					}else{
						
					}
				}
			});
		});

		$("#no_of_pallets").keyup(function(){
			var pallat = $('#no_of_pallets').val();
			if((pallat!=null) && (pallat!=0)){
				$(".palletmsgDiv").show();
				$(".palletmsg").show();
				var total	=	pallat*8;
				$(".palletmsg").html("$"+total);
			}else{
				$(".palletmsgDiv").hide();
				$(".palletmsg").hide();
			}
			$.ajax({
				type: 'POST',
				url: base_url+'order/order/updateOrder',
				data: {'no_of_pallets': pallat,'updatePallet': true},
				success: function(res) {
				}
			});
		});
	});
</script> 

