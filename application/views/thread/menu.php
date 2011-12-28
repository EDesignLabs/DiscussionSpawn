<div id="header">
	
	
	<nav id="menu">
		<div class="user" > Welcome <?=$this->tank_auth->get_username();?>,  <?=anchor('/auth/logout/', 'Logout'); ?></div>
	
	    <ol>
	        <li><a href="<?php echo base_url();?>">Home</a></li>
			<li><a href="<?php echo base_url();?>user">Users</a></li>
			
	        <li  ><a class = "new-replies" href="<?php echo base_url();?>user/replies">Replies</a></li>
			
	    </ol>
	</nav>
</div><!-- Close header -->


