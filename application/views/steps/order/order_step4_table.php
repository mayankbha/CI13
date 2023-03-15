<style>
.custm_display{
	display:<?php  if(isset($order)  && ($order->totaloutbound!=null)) { echo "block";  }else{ echo "none"; } ?>
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


#progress-bar_file1 {width:0%;-webkit-transition: width .3s;-moz-transition: width .3s;transition: width .3s; display:none;}
#progress-bar_file2 {width:0%;-webkit-transition: width .3s;-moz-transition: width .3s;transition: width .3s;display:none;}
#progress-bar_file3 {width:0%;-webkit-transition: width .3s;-moz-transition: width .3s;transition: width .3s;display:none;}
#progress-div {border:#0FA015 1px solid;padding: 5px 0px;margin:30px 0px;border-radius:4px;text-align:center;}
#targetLayer{width:100%;text-align:center;}
.alertpadding {
    padding-bottom: 2px;
}
.checkboxStyle{
	margin-top: -27px !important;
	margin-left: 512px !important;
}
.has-error{
	border-color: rgb(234, 67, 53);
}
.hidedefault{
	display:none;
}
.manycartons{
	margin-left:-14px;
}

.outputalert1 {
	margin-bottom: 45px;
    margin-top: -34px;
	margin-left: 72px;
} 

.output2alert{
   margin-bottom: 45px;
    margin-left: 72px;
    margin-top: 84px;
}

.modelcolor .modal-header{
	 background-color: #4D7496 ! improtant;
	 color:white ! improtant;
}
.modal-title{
	color:white ! improtant;
}
.closebutton{
	color:white ! important;
}
.glyphicon {
    display: inline-block;
    font-family: "Glyphicons Halflings";
    font-size: 12px ! improtant;
    font-style: normal;
    font-weight: normal;
    line-height: 1;
    position: relative;
    top: 1px;
}
</style>
<h3 class="block padding-bottom-10px title_bar"><?php echo $this->lang->line('BookingNotes'); ?></h3>
<div class="row spacing_shipping">
	<div class="col-md-1"></div>
	<div class="col-md-3">
		<label>Ship To</label><br />
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
		<input name="shipby" class="form-control datepicker" value="<?php if(isset($order)) echo  date('Y-m-d',strtotime($order->order_shipby)); ?>" type="text"  />
	</div>
	<div class="col-md-2">	
		<label class="labelsize"><?php echo $this->lang->line('Contents'); ?></label>
			<hr class="hr_margin"/>
		<span class="msku"><?php if(isset($items)) echo count($items); ?>Msku</span>
		</br>
		<span class="msku"><?php if(isset($order)) echo ($order->unit); ?>Unit</span>
	</div>
</div>
<a  href="#label_modal" class="pull-right" data-toggle="modal">How we are calculating this</a>		
<h3 class="block padding-bottom-10px title_bar">Order</h3>
<table class="table table-striped table-bordered table-checkable table-highlight-head table-no-inner-border table-hover">
	<thead>
		<tr style="border-color:white;">
			<th>Sku</th>
			<th>Item Name</th>
			<th>Condition</th>
			<th>Price</th>
			<th>Item Quantity</th>
			<th>Labels to be Printed</th>
			<th class="">Label Cost</th>
			<th></th>
		</tr>
	</thead>
	<?php if(!empty($items)){ ?>	
		<tbody>	
	<?php foreach($items as $key=> $item) { ?>
	<style>
		.label_cost{
			display:<?php if(isset($item->item_label) && ($item->item_label>0)){ echo "block";}else{  echo "none"; } ?>
		}
	</style>
		<tr>
			<td><?php echo $item->sku; ?></td>
			<td><?php echo $item->item_name; ?></td>
			<td>NEW</td>
			<td>$<?php echo $item->unitPrice; ?></td>
			<?php if(isset($order)    &&  ($order->packing_types==2)) {?>
			<td><?php echo $item->number_of_cases; ?></td>
			<?php }else { ?>
			<td><?php echo $item->quantity; ?></td> 
			<?php } ?>
			
			<td ><input name="<?php echo $item->item_id; ?>" type="text"  disabled class="form-control qty dislabel"  id="order_label<?php echo $item->item_id; ?>" onkeyup="updateorderLabel('<?php echo $item->item_id; ?>');" value="<?php echo $item->item_label; ?>" style="width:84%;"  /></td>
			
			<td class="">
				<span id="lcost-<?php echo $item->item_id; ?>"><?php echo $item->label_cost; ?></span>
			</td>
			
			<td>
				<i class="icon-remove" style="padding-left: 22px;" onclick="showDelete_recordPopup('product_to_order', 'item_id', <?php echo $item->item_id; ?>,4);"></i>
			</td>
		</tr>
	
	<?php } ?>
		</tbody>
	<?php } else{ ?>
		<tr>
		<td colspan="8" align="center">
			<div class="col-md-12 col-md-offset-12">
				<div class="alert alert-warning fade in">  <strong>Warning!</strong> Warning! You need to have atleast 1 product to proceed </div>
			</div>
			<p class="intro_orderstep4"></p>
		</td>
		</tr>	
	<?php }  ?>	
</table>
<br />
<h3 class=""></h3>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="alert alert-info fade in alertpadding">Make sure, Each Unit of Shipment is Labelled with a UPC Barcode, if Not, Check this.
	
			<?php if(isset($order) && ($order->label_images==null)) { ?>
			
				<div class="form-group checkboxStyle"> 		
					<label class="checkbox">
						<input type="checkbox" class="uniform control-form" id="check" value=""> 
					</label>
				</div> 
				
			<?php } else { ?>
				<div class="form-group checkboxStyle"> 		
					<label class="checkbox">
						<input class="uniform control-form" value="1" id="check" type="checkbox" checked> 
					</label>
				</div> 
				
			<?php } ?>
		</div>	
	</div> 
</div>	
</br>
</br>

	<div  class="row" id="displaylabel" style="display:none">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-4 "><label>Upload the Labels</label>
				</div>
				<div class="col-md-4 fileinput-preview uneditable-input ">
					<div class="fileinput-holder input-group input-width-xlarge">
						<div class="fileinput-preview uneditable-input form-control validateshipping_label_images" style="cursor: text; text-overflow: ellipsis; ">No file selected...
						</div>
						<div class="input-group-btn">
							<span class="fileinput-btn btn" style="overflow: hidden; position: relative; cursor: pointer; ">Browse...
								<input name="label[]" data-style="fileinput" style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 99px; opacity: 0;" type="file" id="file_label"  accept="image/* , .pdf" type="file" multiple />
								
							</span>
						</div>
					</div>
					<input name="labelimage" class="dislabel" id="validateshipping_label_images" type="text" style="visibility: hidden" value="<?php echo $order->label_images?>"  required/>
					<br /><br />
					<div class="progress fileprocess hidedefault">
						<div id="progress-bar_file1" class="progress-bar bg-success" style="width: 0%"   ></div>
					</div>
					
				</div>
				<div class="col-md-3">
				</div>
				
				<br />
				<div class="alert alert-success output2alert" id="output" style="display:none">
					<i class="icon-remove close" data-dismiss="alert"></i><span class="output">File Has Been Uploaded!</span> 
				</div>
			</div>
		</div>

		<div class="col-md-6 " >
		<?php if(!empty($order &&  ($order->label_images!=null))){ ?>
			<?php $label_images = explode(",", $order->label_images); ?>
				<?php $count =0; foreach($label_images as  $image) { ?>
				<?php $count++;?>
				<div id="image_label_images<?php echo $count;?>" class="alert alert-success fade in col-md-5">
					<i  onclick="deleteImage('label_images','<?php echo $image; ?>','<?php echo $count; ?>');"class="icon-remove close" data-dismiss="alert"></i>
					<a href="<?php echo site_url("uploads/label/$image");?>" download><?php  echo $count.')'.$image;?></a> 
				</div>
				<div class="col-md-1">
				</div>
				<?php } ?>
		<?php } ?>
		</div>
	</div>

<h3 class="block padding-bottom-10px title_bar"><?php echo $this->lang->line('need_to_ask'); ?></h3>	</br>
<div class="row">
	<div class="col-md-6">
		<div class="col-md-1"></div>
		<div class="col-md-5">
			<label class="manycartons"><?php echo $this->lang->line('How_Many_Cartons'); ?></label>
		</div>
		<div class="col-md-6">
			<input type="text" name="carton" class="form-control qty order_carton" value="<?php echo $order->carton;  ?>" placeholder="Enter Units"> 
		</div>
	</div>
	<div class="col-md-6">
	</div>
</div>
</br>
</br>
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-4"><label>Upload the Carton Label</label>
				</div>
				<div class="col-md-4 fileinput-preview uneditable-input ">
					<div class="fileinput-holder input-group input-width-xlarge">
						<div class="fileinput-preview uneditable-input form-control validatecarton" style="cursor: text; text-overflow: ellipsis; ">No file selected...
						</div>
						<div class="input-group-btn">
							<span class="fileinput-btn btn" style="overflow: hidden; position: relative; cursor: pointer; ">Browse...
								<input name="carton[]" data-style="fileinput" style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 99px; opacity: 0;" type="file"  id="carton_file" accept="image/* , .pdf" type="file" multiple />
								
							</span>
						</div>
					</div>
					<input name="cartonimage"  type="text" id="validatecarton"  style="visibility: hidden" value="<?php echo $order->carton_images; ?>" required />
					</br>
					<div class="progress fileprocess1 hidedefault">
						<div id="progress-bar_file2" class="progress-bar bg-success" style="width: 0%"   ></div>
					</div></br>
					
				</div>				
				<div class="col-md-3">
				</div>
			</div>
	</br>
			</br>
			<div class="alert alert-success outputalert1" id="output1" style="display:none">
				<i class="icon-remove close" data-dismiss="alert"></i><span class="output1">File Has Been Uploaded!</span>  
			</div>
		</div>

		<div class="col-md-6 " >
		<?php if(!empty($order &&  ($order->carton_images!=null))){ ?>
			<?php $carton_images = explode(",", $order->carton_images); ?>
				<?php $count =0; foreach($carton_images as  $image) { ?>
				<?php $count++;?>
				<div id="image_carton_images<?php echo $count;?>" class="alert alert-success fade in col-md-5">
					<i  onclick="deleteImage('carton_images','<?php echo $image; ?>','<?php echo $count; ?>');"class="icon-remove close" data-dismiss="alert"></i>
					<a href="<?php echo site_url("uploads/carton/$image");?>" download ><?php  echo $count.')'.$image;?></a> 
				</div>
				<div class="col-md-1">
				</div>
				<?php } ?>
		<?php } ?>
		</div>
	</div>

<h3 class="block padding-bottom-10px title_bar" >Upload Your Shipping Label</h3>
	<div class="row">
		</br>
		</br>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-4 "><label>Upload the Shipping Labels</label>
				</div>
				<div class="col-md-4 fileinput-preview uneditable-input ">
					<div class="fileinput-holder input-group input-width-xlarge">
						<div class="fileinput-preview uneditable-input form-control validateshipping_label_file" style="cursor: text; text-overflow: ellipsis; ">No file selected...
						</div>
						<div class="input-group-btn">
							<span class="fileinput-btn btn" style="overflow: hidden; position: relative; cursor: pointer; ">Browse...
								<input name="shipping_label[]" data-style="fileinput" style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 99px; opacity: 0;" type="file" id="shipping_label_file" accept="image/*, .pdf" type="file" multiple />
							</span>
						</div>
					</div>
					<input name="shipping_labelimage"  id="validateshipping_label_file" type="text" style="visibility: hidden" value="<?php echo $order->shipping_label_images?>"  required/>
					</br>
					<div class="progress fileprocess2 hidedefault">
						<div id="progress-bar_file3" class="progress-bar bg-success" style="width: 0%"   ></div>
					</div></br>
				</div>
				<div class="col-md-3">
				</div>
			</div>
			</br>
			</br>
			<div class="alert alert-success outputalert1" id="output2" style="display:none" >
				<i class="icon-remove close" data-dismiss="alert"></i> <span class="output2">File Has Been Uploaded!</span>  
			</div>
		</div>	

		<div class="col-md-6 " >
		<?php if(!empty($order &&  ($order->shipping_label_images!=null))){ ?> 
			<?php $shipping_label_images = explode(",", $order->shipping_label_images); ?>
				<?php $count =0; foreach($shipping_label_images as  $image) { ?>
				<?php $count++;?>
				
				<div id="image_shipping_label_images<?php echo $count;?>" class="alert alert-success fade in col-md-5">
					<i  onclick="deleteImage('shipping_label_images','<?php echo $image; ?>','<?php echo $count; ?>');"class="icon-remove close" data-dismiss="alert"></i>
					<a href="<?php echo site_url("uploads/shipping_label/$image");?>" download><?php  echo $count.')'.$image;?></a> 
				</div>
				<div class="col-md-1">
				</div>
				
				<?php } ?>
		<?php } ?>
		</div>
	</div>
	<h3 class="block padding-bottom-10px title_bar">Tracking Order</h3>	</br>
	<div class="row">
		<div class="col-md-6">
			<div class="col-md-1"></div>
			<div class="col-md-6">
				<label>Enter Your Tracking Number</label>
			</div>
			<div class="col-md-2">
			</div>
			<div class="col-md-4">
				<input type="text" name="track_order"  value="<?php echo $order->track_order;  ?>" class="form-control track_order"  placeholder="Enter Units" required /> 
			</div>
		</div>
		<div class="col-md-6">
		</div>
	</div>
	</div>
<!-- Modal -->
<div id="label_modal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 443px ! important;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4D7496;">
        <button type="button" class="close closebutton" data-dismiss="modal">&times;</button>
        <center>
			<span class="modal-title" style="color:white;font-size: 18px;font-weight:200;">Label quantity  </span> <i class="glyphicon glyphicon-remove" style="color:white;font-size: 12px ! improtant;"></i>  <span style="color:white;font-size: 18px;font-weight:200;"> $0.10  </span>
		</center>

		
      </div>
      <div class="modal-body">
        <div class="row" style="font-size: initial;">
			<div class="col-md-12" >
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$0.10 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-arrow-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Per label printing charges
			</div>
			</br>
		</div>
      </div>
      <div class="modal-footer" style="padding: 4px 28px 6px;">
		<center>
			<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
		</center>	
      </div>
    </div>
 
  </div> 
</div> 
   

<script type="text/javascript">
var image  	=	"<img src='"+base_url+"assets/img/multiply.png' width='10'>"; 
function updateorderLabel(id) {
	var label	=	$('#order_label'+id).val(); 
	var label_to_cost	=	parseFloat(label*0.10).toFixed(2);
	$('#myPopoverlabelcost_'+id).html('');
	$('#label_print'+id).html(label);
	$('#label_print-cost'+id).html(label_to_cost);
	$('#myPopoverlabelcost_'+id).html(label+image+0.10+"="+label_to_cost);
	$.ajax({
		type: 'POST',
		url: base_url+'order/order/updateOrder',
		data: {'item_id': id,'label':label, 'label_cost': label_to_cost,'updateLabel': true},
		success: function(res) {
			$("#lcost-"+id).text('$'+label_to_cost);
			$("#lcosttotal-"+id).text('$'+label_to_cost);
			$('.custom-alert').hide();
			if(res.total>0){
				$(".label_cost").show();
			}else{
				$(".label_cost").hide();
			}
		}
	});
}

function downloadImage(colunmname, imagename) {
	$.ajax({
		type: 'POST',
		url: base_url+'order/order/updateOrder',
		data: {'colunmname': colunmname,'imagename':imagename, 'downloadImage': true},
		success: function(res) {
			
		}
	});
}

function deleteImage(colunmname, imagename, count) {
	$.ajax({
		type: 'POST',
		url: base_url+'order/order/updateOrder',
		data: {'colunmname': colunmname,'imagename':imagename, 'deleteImage': true},
		success: function(res) {
			if(res==1){ 
				$("div#image_"+colunmname+count).css('display', 'none');
				$("div#image_"+colunmname+count).hide();
				getOrderTable(4);
			}else{
				
			}
		}
	});
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

$(document).ready(function() {
	//$('.datepicker').datepicker();
	$('.datepicker').datepicker({ minDate: new Date()});
	$.validator.messages.required = "";
	if($("#check").is(':checked')){
		$('.dislabel').prop("disabled", false);
		$("#displaylabel").show();
	}else{
		$('.dislabel').prop("disabled", true);
		$("#displaylabel").hide();
	}
	$('#validateshipping_label_images').prop("disabled", true);
	$('input[type="checkbox"]').click(function(){
		if($(this).is(":checked")){
			$('.dislabel').prop("disabled", false);
			$('#validateshipping_label_images').prop("disabled", false);
			$("#displaylabel").show();
		}else if($(this).is(":not(:checked)")){
			$('.dislabel').prop("disabled", true);
			$('#validateshipping_label_images').prop("disabled", true);
			$("#displaylabel").hide();
		}
    });

	$("#file_label").on("change", function() {
		var inputElement = document.querySelector("#file_label");
		var fileLength = inputElement.files.length;
		var form_data = new FormData();

		for(var i = 0; i < fileLength; i++) {
			var file = inputElement.files[i];

			form_data.append("label[]", file);
		}
		$.ajax({
			type: 'POST',
			dataType: 'script',
			cache: false,
			contentType: false,
			processData: false,
			url: base_url + 'order/order/updateOrder',
			data: form_data,
			beforeSend: function(XMLHttpRequest) {
				$(".fileprocess").show();
				$('.button-next').attr('disabled', true);
				$("#progress-bar_file1").show();
			},
			xhr: function() {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function(evt) {
				  if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					percentComplete = parseInt(percentComplete * 100);
					console.log(percentComplete);
						//$("#progress-bar_file1").width(percentComplete + '%');
						//$("#progress-bar_file1").html('<div id="progress-status">' + percentComplete +' %</div>');
					if (percentComplete) {
						//return true;						
						$("#progress-bar_file1").width(percentComplete + '%');
						$("#progress-bar_file1").html('<div id="progress-status">' + percentComplete +' %</div>');
					}
				  }
				}, false);
				return xhr;
			},
			success: function(res) { 
				$("#file_label").val('');
			},
			complete: function(){ getOrderTable(4);
			$('.button-next').attr('disabled', false);
				$("#file_label").val('');
				$("#progress-bar_file1").width(100 + '%');
				$("#progress-bar_file1").html('<div id="progress-status">' + 100 +' %</div>');
				setTimeout(function(){ $('#output').hide();  }, 3000);
				$('#output').show();
			},
		});
	});

	$("#carton_file").on("change", function() {
		var inputElement = document.querySelector("#carton_file");
		var fileLength = inputElement.files.length;
		var form_data = new FormData();

		for(var i = 0; i < fileLength; i++) {
			var file = inputElement.files[i];
			form_data.append("carton[]", file);
		}
		$.ajax({
			type: 'POST',
			dataType: 'script',
			cache: false,
			contentType: false,
			processData: false,
			url: base_url + 'order/order/updateOrder',
			data: form_data,
			beforeSend: function() {
				$(".fileprocess1").show();
				$("#progress-bar_file2").show();
				$('.button-next').attr('disabled', true);
				$("#progress-bar_file2").width('10%');
				$("#progress-bar_file2").html('<div id="progress-status">' + 0 +' %</div>'); 
			},
			xhr: function() {
			var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function(evt) {
				  if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					percentComplete = parseInt(percentComplete * 100);
					console.log(percentComplete);
					if (percentComplete) {
						$("#progress-bar_file2").width(percentComplete + '%');
						$("#progress-bar_file2").html('<div id="progress-status">' + percentComplete +' %</div>');
					}
				  }
				}, false);
				return xhr;
			}, 
			success: function(res) {
				$("#carton_file").val('');
			},
			complete: function(){
				$('.button-next').attr('disabled', false);
				$("#progress-bar_file2").width('100%');
				$("#progress-bar_file2").html('<div id="progress-status">' + 100 +' %</div>'); 
				getOrderTable(4);
				setTimeout(function(){ $('#output1').hide();  }, 3000);
				$('#output1').show();
			},
		});
	});

	$("#shipping_label_file").on("change", function() {
		var inputElement = document.querySelector("#shipping_label_file");
		var fileLength = inputElement.files.length;
		var form_data = new FormData();

		for(var i = 0; i < fileLength; i++) {
			var file = inputElement.files[i];

			form_data.append("shipping_label[]", file);
		}
		$.ajax({
			type: 'POST',
			dataType: 'script',
			cache: false,
			contentType: false,
			processData: false,
			url: base_url + 'order/order/updateOrder',
			data: form_data,
			beforeSend: function() {
				
				$(".fileprocess2").show();
				$("#progress-bar_file3").show();
				$('.button-next').attr('disabled', true);
				$("#progress-bar_file3").width('10%');
				$("#progress-bar_file3").html('<div id="progress-status">' + 0 +' %</div>'); 
			},
			xhr: function() {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function(evt) {
				  if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					percentComplete = parseInt(percentComplete * 100);
					console.log(percentComplete);
						//$("#progress-bar_file3").width(percentComplete + '%');
						//$("#progress-bar_file3").html('<div id="progress-status">' + percentComplete +' %</div>');
						if (percentComplete) {
							$("#progress-bar_file3").width(percentComplete + '%');
							$("#progress-bar_file3").html('<div id="progress-status">' + percentComplete +' %</div>');
						}
				  }
				}, false);
				return xhr;
			},
			success: function(res) {
				$("#shipping_label_file").val('');
			},
			complete: function(){
				$('.button-next').attr('disabled', false);
				$("#progress-bar_file3").width('100%');
				$("#progress-bar_file3").html('<div id="progress-status">' + 100 +' %</div>'); 
				getOrderTable(4);
				setTimeout(function(){ $('#output2').hide();  }, 3000);
				$('#output2').show();
			},
		});
	});

	if($("p").hasClass("intro_orderstep4")){ 
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
				
			},
			success: function(result) {
				if((result.step==4) && (result.packing_types==1)){
					getOrderTable(4);
				}else if((result.step==4) && (result.packing_types==2)){
					$("#order_t3").trigger("click");
					$(".nav-pills a[data-toggle=tab]").on("click", function(e) {
						if(e.originalEvent && $(this).attr("class") == "step"){
							e.preventDefault();
							e.stopImmediatePropagation();
							return true;
						}
					});	
					$("#order_t3").trigger("click");
					$('#tab3').tab('show');
				}
			}
		});
	});
	
	$(".order_carton").blur(function(){
		var	carton	=		$(".order_carton").val();
		$.ajax({
			type: 'POST',
			url: base_url + 'order/order/updateOrder',
			data: {
				'carton': carton,
				'cartonUpdate': true
			},
			beforeSend: function() {
				$.LoadingOverlay("show");},
			success: function(data) {  
				$.LoadingOverlay("hide");
				$('.custom-alert').hide();
			},
			error: function() {
				$.LoadingOverlay("hide");
			}
		});
	});
	
	$(".track_order").blur(function(){
		var	track_order	=		$(".track_order").val();
		$.ajax({
			type: 'POST',
			url: base_url + 'order/order/updateOrder',
			data: {
				'track_order': track_order,
				'track_orderUpdate': true
			},
			beforeSend: function() {
				$.LoadingOverlay("show");},
			success: function(data) {  
				$.LoadingOverlay("hide");
				$('.custom-alert').hide();
			},
			error: function() {
				$.LoadingOverlay("hide");
			}
		});
	});
});
</script>
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
	$(document).ready(function() {
		
		$('.labelcostpopover').popover({ trigger: "hover" , html: true, animation:false}).on("mouseenter",function () { 
			var _this = this;
			$(this).popover("show");
		});
		$('.labelcostpopover').popover({ trigger: "hover" , html: true, animation:false}).on("mouseleave",function () { 
			var _this = this;
			$(this).popover("hide");
		});
	});
</script>