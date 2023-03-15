

	<?php if($this->session->flashdata("expired_token_message")){?>		
		
		<div class="row">
			<div class="col-sm-2" ></div>
			<div class="col-sm-8">
				<div class="box thanks_box" >
					<h1 align="center"><b><?php echo $this->lang->line('Your_Password_Link_has_been_expired'); ?></b></h1><br />
					
					<h4 align="center">
						<?php echo $this->lang->line('Please_Click'); ?><a href="<?php echo base_url();?>"><?php echo $this->lang->line('Login'); ?></a> <?php echo $this->lang->line('to_generate_a_new_link'); ?>
					</h4>
					
				</div>
			</div>
			<div class="col-sm-2"></div>
		</div>
		
	<?php } ?>
	
	<?php if($this->session->flashdata("user_token_message")){?>		
		
		<div class="row">
			<div class="col-sm-2" ></div>
			<div class="col-sm-8">
				<div class="box thanks_box" >
					<h1 align="center"><b><?php echo $this->lang->line('This_Password_reset_link_is_already_used'); ?></b></h1><br />
					
					<h4 align="center">
						<?php echo $this->lang->line('Please_go_to'); ?><a href="<?php echo base_url();?>"><?php echo $this->lang->line('Login'); ?></a> <?php echo $this->lang->line('to_generate_a_new_link'); ?>
					</h4>
					
				</div>
			</div>
			<div class="col-sm-2"></div>
		</div>
		
	<?php } ?>

<style>
.thanks_box{
	width:900px ! important;
	height:232px;
}
</style>