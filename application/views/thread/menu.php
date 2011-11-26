<div id="header">
	
	
	<nav id="menu">
		<div class="user" > Welcome <?=$username?> , Permissions: <?php print_r($permissions);?> <?php echo anchor('/auth/logout/', 'Logout'); ?></div>
	
	    <ol>
	        <li><a href="<?php echo base_url();?>">Home</a></li>
	        <li><a href="<?php echo base_url();?>/stats">Student Stats</a></li>
	        <li><a href="<?php echo base_url();?>/thread/flat">Flat</a></li>
	        
			
	    </ol>
	</nav>
</div><!-- Close header -->


