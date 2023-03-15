
<div id="content">
	<div class="container">
		<!-- Breadcrumbs line -->
		<div class="crumbs">
			<ul id="breadcrumbs" class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url('administrator/dashboard');?>">Dashboard</a>
				</li>
				<li class="current">
					<a href="<?php echo base_url('administrator/Viewinventoryall');?>" title="">View Inventroy All</a>
				</li>
			</ul>
		</div>
		<!-- /Breadcrumbs line -->

		<!--=== Page Header ===-->
		<div class="page-header">
			<div class="row">
				<div class="col-md-9">
					<div class="page-title">
						<h3>Inventroy List</h3>
						<span>Hello , Admin</span>
					</div>
				</div>	
				
			</div>	
		</div>
		<!-- /Page Header -->

		<!--=== Page Content ===-->
		<!--=== Inline Tabs ===-->
		<div class="row">
			<div class="col-md-12">
				<div class="widget box">
					<div class="widget-content no-padding table-responsive" >
						<table class="table table-striped table-bordered table-hover table-checkable datatable" >
							<thead>
								<tr>
									<th class="checkbox-column">
										<input type="checkbox" class="uniform">
									</th>
									<th>Name</th>
									<th>Email</th>
									<th>Total SKU Shipped</th>
									<th>In Inventroy</th>
									<th></th>	
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="checkbox-column">
										<input type="checkbox" class="uniform">
									</td>
									<td>Johon Dea</td>
									<td>Johon@gmail.com</td>
									<td>10</td>
									<td>10</td>
									<td><a href="<?php echo base_url('administrator/Viewinventoryall/viewinventoryuser'); ?>" class="btn btn-primary">View</a></td>
								</tr>
								<tr>
									<td class="checkbox-column">
										<input type="checkbox" class="uniform">
									</td>
									<td>Johon Dea</td>
									<td>Johon@gmail.com</td>
									<td>10</td>
									<td>10</td>
									<td><a href="<?php echo base_url('administrator/Viewinventoryall/viewinventoryuser'); ?>" class="btn btn-primary">View</a></td>
								</tr>
								<tr>
									<td class="checkbox-column">
										<input type="checkbox" class="uniform">
									</td>
									<td>Johon Dea</td>
									<td>Johon@gmail.com</td>
									<td>10</td>
									<td>10</td>
									<td><a href="<?php echo base_url('administrator/viewwarehouser'); ?>" class="btn btn-primary">View</a></td>
								</tr>
								<tr>
									<td class="checkbox-column">
										<input type="checkbox" class="uniform">
									</td>
									<td>Johon Dea</td>
									<td>Johon@gmail.com</td>
									<td>10</td>
									<td>10</td>
									<td><a href="<?php echo base_url('administrator/viewwarehouser'); ?>" class="btn btn-primary">View</a></td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container -->

</div>