<!-- Thanak page -->
		
<div class="row">
	<div class="col-sm-2" ></div>
	<div class="col-sm-8">
		<div class="box thanks_box" >
			<h1 align="center"><b><?php echo $this->lang->line('Thank_You'); ?> !</b></h1><br />
			<div align="center">
				<img src="<?php echo base_url('assets/img/right_tick.png');?>" width="150px"/>
			</div><br />
			<h4 align="center">
				<?php echo $this->lang->line('Thank_You_registere_msg'); ?><br /><br />
				<?php echo $this->lang->line('Click'); ?> <a href="<?php echo base_url();?>"><?php echo $this->lang->line('Login'); ?></a>
			</h4>
		</div>
	</div>
	<div class="col-sm-2"></div>
</div>

<style>
.thanks_box{
	width:900px ! important;
	height:450px;
}
</style>