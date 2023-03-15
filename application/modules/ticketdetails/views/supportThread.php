<div id="content">
	<div class="container">
	<!-- Breadcrumbs line -->
		<div class="crumbs">
			<ul id="breadcrumbs" class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url('dashboard/Dashboard');?>"><?php echo $this->lang->line('Dashboard_Title'); ?></a>
				</li>
				<li class="current">
					<a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$this->uri->segment(4));?>" title="">Support Threads</a>
				</li>
			</ul>
		</div>  
		<!-- /Breadcrumbs line -->

		<!--=== Page Header ===-->
		<div class="page-header">
			<div class="row">
				<div class="col-md-9">
					<div class="page-title">
						<h3>Support Threads</h5>
						<span>Hello, <?php echo $this->session->userdata("user_session")["firstname"]; ?></span>
	
					</div>
				</div>	
				<div class="col-md-3">
					<label class="markasresolved">Mark As Resolved</label>
					<label class="switch createTicketthreads">
						
						<input id="check1<?php echo $ticketID; ?>" class="copyNewAddrToBilling" type="checkbox" value="<?php echo $ticketID; ?>" checked="" name="copyNewAddrToBilling">
						<div class="slider round"></div>
						
						
					</label>
				</div>	
			</div>	
		</div>
		<!-- /Page Header -->
		<div class="row">
			<div class="col-md-2">
			</div>	
			<div class="col-md-6">
				<div class="alert alert-info fade in"><i class="icon-remove close" data-dismiss="alert"></i> <strong>Info!</strong> Thread ::  #
				<?php if(empty($ticketID)){ ?>
					<?php echo '#'; ?>
				<?php }else{ ?>
					<?php echo $ticketID; ?>
				<?php }?>
				</div>
			</div>	
			<div class="col-md-4">
			</div>	
		</div>	<br />
		
		<div class="row">
			<div class="col-md-1">
			</div>	
			<div class="col-md-8">
				
				<h3>
					<?php if(empty($subject)){ ?>
						<?php echo ''; ?>
					<?php }else{ ?>
						<?php echo $subject; ?>
					<?php }?>
				<//h3>
			</div>	
			<div class="col-md-3">
			</div>	
		</div>
		<hr />
		<div class="row">
			<div class="col-md-8">	
				<form class="form-horizontal" id="validate-addmessage-form" method="POST" action="#">	
						<?php if(is_array($result) && array_key_exists(0,$result)){ ?>
							<?php foreach($result as $row){?>
								
								<?php if($this->session->userdata("user_session")["id"] == $row->user_id){ ?>
									
											<div class="row">
												<div class="col-md-1">
												</div>
												<div class="col-md-2">
													<span class="userIcon">
														<i class="icon-smile" style="font-size: 29px"></i> 
													</span>
												</div>
												<div class="col-md-6">
													<span class="userTextname"> 
														<b><?php echo $this->session->userdata("user_session")["firstname"]; ?>&nbsp;&nbsp;<?php echo $this->session->userdata("user_session")["lastname"];?></b>
													</span><br /><br />
													<span >
														<?php echo $row->ticket_txt; ?>
													</span><br />
													<div align="right"><?php echo $row->date_time_entered; ?></div>
												</div>	
												<div class="col-md-3"></div>	
											
											</div>
											<hr /><br />
										
									
									<input type="hidden" name="ticket_system_id" id="ticket_system_id" value="<?php echo $row->ticket_system_id; ?>">
									<input type="hidden" name="user_id" id="user_id" value="<?php echo $row->user_id; ?>">
									<input type="hidden" name="ticketID" id="ticketID" value="<?php echo $row->ticketID; ?>">
								<?php }?>
							
								<?php if($row->user_id == '1'){ ?>
								
									
									<div class="row">
										<div class="col-md-1"></div>
										<div class="col-md-2">
											<span class="userIcon">
												<i class="icon-user" style="font-size: 29px"></i> 
											</span>
											
										</div>
										<div class="col-md-6">
											<span class="userTextname"> 
												<b>Admin</b>
											</span><br /><br />
											<span>
												<?php echo $row->ticket_txt; ?>
											</span><br />
											<div align="right"><?php echo $row->date_time_entered; ?></div>
										</div>	
										<div class="col-md-3"></div>	
									</div><hr /><br />
										
									
								<?php } ?>
							
							
							<?php } ?>	
							
							<div class="form-group" id="hideTextarea1" style="display:none;">
								<label class="col-md-3 control-label"></label>
								
								<div class="col-md-6">
									<textarea rows="3" cols="5" name="body" id="body" style="height:34px ! improtant;" class="limited form-control required" data-limit="250" id="body" ></textarea>
									<span class="help-block" id="limit-text" style="color:green;"></span>
								</div>
								
								<label class="col-md-3 control-label" ></label>
							</div>
							
							
							<div class="form-group" id="hideTextarea2" style="display:none;">
								<label class="col-md-6 control-label" style="color:green;"></label>
								
								<div class="col-md-3">
									<input type="submit" value="Submit" name="Save Information" class="btn btn-primary pull-right">
								</div>
								
								<label class="col-md-3 control-label">
								
								</label>
							</div>
						<?php } else {?>
							<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<?php echo 'No Record Found'?>
							</div>	
							<div class="col-md-2"></div>	
						</div><hr /> <br />	
						<?php }?>
					
				</form>
			</div>
			<div class="col-md-3">
				<div class="viewdetailsTicket"> 
					<div style="padding-left: 20px;"><b>Name :</b>
					<?php echo $this->session->userdata("user_session")["firstname"]; ?>&nbsp;&nbsp;<?php echo $this->session->userdata("user_session")["lastname"];?></div><br />
					
					<div style="padding-left: 20px;"><b>Status :</b>
					<?php 
						if($status == '1'){
							echo ' <span class="label label-success">Closed</span>';
						} elseif($status == '0'){
							echo ' <span class="label label-warning">Open</span>';
						}
					?>
					</div><br />
					
					<div style="padding-left: 20px;"><b>Email :</b>
					
						<?php if(empty($email)){echo 'N/A';}else{echo $email;}?>
					
					</div><br />
					
					<div style="padding-left: 20px;"><b>Phone :</b>
						<?php if(empty($phone)){echo 'N/A';}else{echo $phone;}?>
					</div><br />
					
					<div style="padding-left: 20px;"><b>Assigned to :</b>
						Steven Pan
					</div><br />
					
					<div style="padding-left: 20px;"><b>Ticket Priority :</b> <?php if(empty($category_id)){
							echo 'N/A';
						}else{
							if($category_id == 'technical'){
								echo ' Technical';
							}elseif($category_id == 'general'){
								echo ' General';
							}
						}?></div><br />
					
					<div style="padding-left: 20px;"><b>Ticket Category :</b> <?php if(empty($priority_id)){
							echo 'N/A';
						}else{
							if($priority_id == 'high'){
								echo ' High';
							}elseif($priority_id == 'normal'){
								echo ' Normal';
							}
						}?></div><br />
				</div>
			</div>
			
			<div class="col-md-1">
			</div>
		</div>
	<!-- /.container -->

</div>

<?php if($status == '1'){ ?>

<!-- Modal -->
<script type="text/javascript">
    $(document).ready(function(){
		$('#hideTextarea1').hide();
		$('#hideTextarea2').hide();
		$("input[type='checkbox']").prop("checked", false);
		
        $('input[type="checkbox"]').click(function(){
            if($(this).is(":checked")){
				
				var ticketid = $('.copyNewAddrToBilling').val();
				$.ajax({
					type: 'POST',
					url: base_url+'ticketdetails/TicketdetailsController/updateStatusTicketActive',
					data: { 'ticketid':ticketid },
					success: function(res) {
						if(res == 1){
							//window.location.href = base_url+'ticketdetails';
						}
					}
				});
				$('#hideTextarea1').show();
                $('#hideTextarea2').show();
				
            } else if($(this).is(":not(:checked)")){
				
                $('#hideTextarea1').hide();
                $('#hideTextarea2').hide();
				var ticketid = $('.copyNewAddrToBilling').val();
				$.ajax({
					type: 'POST',
					url: base_url+'ticketdetails/TicketdetailsController/updateStatusTicket',
					data: { 'ticketid':ticketid },
					success: function(res) {
						if(res == 1){
							window.location.href = base_url+'ticketdetails/TicketdetailsController';
						}
					}
				});
            }
			
        });
    });
</script>
<?php }else if($status == '0'){ ?>
<script type="text/javascript">
    $(document).ready(function(){
		$('#hideTextarea1').show();
		$('#hideTextarea2').show();
		$("input[type='checkbox']").prop("checked", true);
		
        $('input[type="checkbox"]').click(function(){
            if($(this).is(":checked")){
				var ticketid = $('.copyNewAddrToBilling').val();
				$.ajax({
					type: 'POST',
					url: base_url+'ticketdetails/TicketdetailsController/updateStatusTicketActive',
					data: { 'ticketid':ticketid },
					success: function(res) {
						if(res == 1){
							//window.location.href = base_url+'ticketdetails';
						}
					}
				});
			   
				$('#hideTextarea1').show();
                $('#hideTextarea2').show();
				
            } else if($(this).is(":not(:checked)")){
				var ticketid = $('.copyNewAddrToBilling').val();
				$.ajax({
					type: 'POST',
					url: base_url+'ticketdetails/TicketdetailsController/updateStatusTicket',
					data: { 'ticketid':ticketid },
					success: function(res) {
						if(res == 1){
							window.location.href = base_url+'ticketdetails/TicketdetailsController';
						}
					}
				});
                $('#hideTextarea1').hide();
                $('#hideTextarea2').hide();
				
            }
			
        });
    });
</script>
<?php } ?>

