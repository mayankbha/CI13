
<div id="content">
	<div class="container">
		<!-- Breadcrumbs line -->
		<div class="crumbs">
			<ul id="breadcrumbs" class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url('dashboard/Dashboard');?>">Dashboard</a>
				</li>
				<li class="current">
					<a href="<?php echo base_url('ticketdetails/TicketdetailsController');?>" title="">Cases</a>
				</li>
			</ul>
		</div>
		<!-- /Breadcrumbs line -->

		<!--=== Page Header ===-->
		<div class="page-header">
			<div class="row">
				<div class="col-md-9">
					<div class="page-title">
						<h3>User Cases</h3>
						<span>Hello, <?php echo $this->session->userdata("user_session")["firstname"]; ?></span>
					</div>
				</div>	
				<div class="col-md-3">
					<a href="<?php echo base_url('ticketdetails/TicketdetailsController/addTicket');?>"><button class="btn btn-primary createTicket">Create Cases</button></a>
				</div>	
			</div>	
		</div>
		<!-- /Page Header -->

		<!--=== Page Content ===-->
		<!--=== Inline Tabs ===-->
		<div class="row">
			<div class="col-md-12">
				<!-- Tabs-->
				<div class="tabbable tabbable-custom tabbable-full-width">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_overview" data-toggle="tab">ALL</a></li>
						<li><a href="#tab_open_account" data-toggle="tab">Open</a></li>
						<li><a href="#tab_close_account" data-toggle="tab">Close</a></li>
					</ul>
					<div class="tab-content row">
						<!--=== Overview ===-->
						<div class="tab-pane active" id="tab_overview">
							<div class="col-md-12">		
								<div class="widget box">
									<div class="widget-header">
									</div>
									<div class="widget-content no-padding table-responsive" >
										<table class="table table-striped table-bordered table-hover table-checkable datatable">
											<thead>
												<tr>
													<th class="checkbox-column">
														<input type="checkbox" class="uniform" style="visibility: hidden;">
													</th>
													<th>Sno</th>
													<th>Status</th>
													<th>Subject</th>
													<th>Category</th>
													<th>Priority</th>
													<th>Updated</th>
												</tr>
											</thead>
											<tbody>
												<?php if(is_array($result) && array_key_exists(0,$result)){ ?>	
													<?php $sno=1; foreach($result as $row){?>
														<?php $encoded = urlencode( base64_encode( $row['ticket_system_id'] ) );?>
															<tr>
																<td class="checkbox-column">
																		<input type="checkbox" class="uniform">
																	</td>
																	<td><a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><?php echo $sno; ?></a></td>
																	<td>
																		<?php if($row['status'] == '0'){?>
																			<a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><span class="label label-warning">Open</span></a>
																		<?php }else if($row['status'] == '1'){?>
																			<a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><span class="label label-success">Closed</span></a>
																		<?php }?>
																	</td>
																	<td><a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><?php echo $row['subject']; ?></a></td>
																	<td><a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><?php echo $row['category_id']; ?></a></td>
																	<td><a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><?php echo $row['priority_id']; ?></a></td>
																	<td>
																	<a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" >
																	<?php 
																	
																	$then1 = $row['date_time_entered'];;
																	$then2 = new DateTime($then1);
																	 
																	$now = new DateTime();
																	$sinceThen = $then2->diff($now);
																	if($sinceThen->y > 0){
																		echo $sinceThen->y . " years ago";
																	}
																	else if($sinceThen->m > 0){
																		echo $sinceThen->m . " months ago";
																	} 
																	else if($sinceThen->d > 0){
																		if($sinceThen->d <= 7) {
																			echo $sinceThen->d . " days ago";
																		}
																		else if($sinceThen->d > 7 && $sinceThen->d <= 14) {
																			echo 1 . " week ago";
																		}
																		else if($sinceThen->d > 14 && $sinceThen->d <= 21) {
																			echo 2 . " week ago";
																		}
																		else if($sinceThen->d > 21 && $sinceThen->d <= 28) {
																			echo 3 . " week ago";
																		}
																		else if($sinceThen->d > 28 && $sinceThen->d <= 31) {
																			echo 4 . " week ago";
																		}
																	}
																	else if($sinceThen->h > 0){
																		echo $sinceThen->h . " hours ago";
																	}
																	else if($sinceThen->i > 0){
																		echo $sinceThen->i . " minutes ago";
																	}
																	else if($sinceThen->s > 0){
																		echo $sinceThen->s . " seconds ago";
																	}
																	?>
																	</a>
																	</td>
																	
																
															</tr>
													<?php $sno++; }?>
												
												<?php } else { ?>
														<tr>
															<td class="checkbox-column">
																<input type="checkbox" class="uniform" style="visibility: hidden;">
															</td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															
														</tr>
												<?php }?>
											</tbody>
										</table>
									</div>
								</div>
							</div> <!-- /.col-md-12 -->
						</div>
						<!-- /Overview -->

						<!--=== Edit Account ===-->
						<div class="tab-pane" id="tab_open_account">
							<form class="form-horizontal" action="#">
								<div class="col-md-12">
									<div class="widget box">
										<div class="widget-header">
										</div>
										<div class="widget-content no-padding table-responsive" >
											<table class="table table-striped table-bordered table-hover table-checkable datatable">
												<thead>
													<tr>
														<th class="checkbox-column">
															<input type="checkbox" class="uniform" style="visibility: hidden;">
														</th>
														<th>Sno</th>
														<th>Status</th>
														<th>Subject</th>
														<th>Category</th>
														<th>Priority</th>
														<th>Updated</th>
													</tr>
												</thead>
												<tbody>
													
													<?php if(is_array($result) && array_key_exists(0,$result)){ ?>	
														<?php $sno=1; foreach($result as $row){?>
															<?php $encoded = urlencode( base64_encode( $row['ticket_system_id'] ) );?>
															<?php if($row['status'] == '0'){?>
																<tr>
																	<td class="checkbox-column">
																		<input type="checkbox" class="uniform">
																	</td>
																	<td><a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><?php echo $sno; ?></a></td>
																	<td><a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><span class="label label-warning">Open</span></a></td>
																	<td><a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><?php echo $row['subject']; ?></a></td>
																	<td><a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><?php echo $row['category_id']; ?></a></td>
																	<td><a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><?php echo $row['priority_id']; ?></a></td>
																	<td>
																		<a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" >
																		<?php 
																		
																		$then1 = $row['date_time_entered'];;
																		$then2 = new DateTime($then1);
																		 
																		$now = new DateTime();
																		$sinceThen = $then2->diff($now);
																		if($sinceThen->y > 0){
																			echo $sinceThen->y . " years ago";
																		}
																		else if($sinceThen->m > 0){
																			echo $sinceThen->m . " months ago";
																		} 
																		else if($sinceThen->d > 0){
																			if($sinceThen->d <= 7) {
																				echo $sinceThen->d . " days ago";
																			}
																			else if($sinceThen->d > 7 && $sinceThen->d <= 14) {
																				echo 1 . " week ago";
																			}
																			else if($sinceThen->d > 14 && $sinceThen->d <= 21) {
																				echo 2 . " week ago";
																			}
																			else if($sinceThen->d > 21 && $sinceThen->d <= 28) {
																				echo 3 . " week ago";
																			}
																			else if($sinceThen->d > 28 && $sinceThen->d <= 31) {
																				echo 4 . " week ago";
																			}
																		}
																		else if($sinceThen->h > 0){
																			echo $sinceThen->h . " hours ago";
																		}
																		else if($sinceThen->i > 0){
																			echo $sinceThen->i . " minutes ago";
																		}
																		else if($sinceThen->s > 0){
																			echo $sinceThen->s . " seconds ago";
																		}
																		?>
																		</a>
																	</td>
																</tr>
															<?php }?>	
														<?php $sno++; }?>
													
													<?php } else { ?>
															<tr>
																<td class="checkbox-column">
																	<input type="checkbox" class="uniform" style="visibility: hidden;">
																</td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																
															</tr>
													<?php }?>
													
													
												</tbody>
											</table>
										</div>
									</div>
								</div> <!-- /.col-md-12 -->
							</form>
						</div>
						<!-- /Edit Account -->
						
						<!--=== Edit Account ===-->
						<div class="tab-pane" id="tab_close_account">
							<form class="form-horizontal" action="#">
								<div class="col-md-12">
									<div class="widget">	
										<div class="widget box">
											<div class="widget-header">
											</div>
											<div class="widget-content no-padding table-responsive" >
												<table class="table table-striped table-bordered table-hover table-checkable datatable">
													<thead>
														<tr>
															<th class="checkbox-column">
																<input type="checkbox" class="uniform" style="visibility: hidden;">
															</th>
															<th>Sno</th>
															<th>Status</th>
															<th>Subject</th>
															<th>Category</th>
															<th>Priority</th>
															<th>Updated</th>
														</tr>
													</thead>
													<tbody>
														<?php if(is_array($result) && array_key_exists(0,$result)){ ?>	
															<?php $sno=1; foreach($result as $row){?>
																<?php $encoded = urlencode( base64_encode( $row['ticket_system_id'] ) );?>
																<?php if($row['status'] == '1'){?>
																	<tr>
																		<td class="checkbox-column">
																			<input type="checkbox" class="uniform">
																		</td>
																		<td><a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><?php echo $sno; ?></a></td>
																		
																		<td><a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><span class="label label-success">Closed</span></a></td>
																		
																		<td><a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><?php echo $row['subject']; ?></a></td>
																		
																		<td><a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><?php echo $row['category_id']; ?></a></td>
																		
																		<td><a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" ><?php echo $row['priority_id']; ?></a></td>
																		<td>
																		<a href="<?php echo base_url('ticketdetails/TicketdetailsController/supportThreads/'.$encoded)?>" >
																		<?php 
																			$then1 = $row['date_time_entered'];;
																			$then2 = new DateTime($then1);
																			 
																			$now = new DateTime();
																			$sinceThen = $then2->diff($now);
																			if($sinceThen->y > 0){
																				echo $sinceThen->y . " years ago";
																			}
																			else if($sinceThen->m > 0){
																				echo $sinceThen->m . " months ago";
																			} 
																			else if($sinceThen->d > 0){
																				if($sinceThen->d <= 7) {
																					echo $sinceThen->d . " days ago";
																				}
																				else if($sinceThen->d > 7 && $sinceThen->d <= 14) {
																					echo 1 . " week ago";
																				}
																				else if($sinceThen->d > 14 && $sinceThen->d <= 21) {
																					echo 2 . " week ago";
																				}
																				else if($sinceThen->d > 21 && $sinceThen->d <= 28) {
																					echo 3 . " week ago";
																				}
																				else if($sinceThen->d > 28 && $sinceThen->d <= 31) {
																					echo 4 . " week ago";
																				}
																			}
																			else if($sinceThen->h > 0){
																				echo $sinceThen->h . " hours ago";
																			}
																			else if($sinceThen->i > 0){
																				echo $sinceThen->i . " minutes ago";
																			}
																			else if($sinceThen->s > 0){
																				echo $sinceThen->s . " seconds ago";
																			}
																		?>																		
																		</a>
																		</td>
																		
																	</tr>
																<?php }?>	
															<?php $sno++; }?>
														
														<?php } else { ?>
																<tr>
																	<td class="checkbox-column">
																		<input type="checkbox" class="uniform" style="visibility: hidden;">
																	</td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	
																</tr>
														<?php }?>
														
													</tbody>
												</table>
											</div>
										</div>
									
									</div> <!-- /.widget -->
								</div> <!-- /.col-md-12 -->
							</form>
						</div>
						<!-- /Edit Account -->	
						
					</div> <!-- /.tab-content -->
				</div>
				<!--END TABS-->
			</div>
		</div> <!-- /.row -->
		<!-- /Page Content -->
	</div>
	<!-- /.container -->

</div>