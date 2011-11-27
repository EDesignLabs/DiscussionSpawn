<div id="header">
	
	
	<nav id="menu">
		<div class="user" > Welcome <?=$username?> , Permissions: <?php print_r( $this->tank_auth->get_permissions());?> <?=anchor('/auth/logout/', 'Logout'); ?></div>
	
	    <ol>
	        <li><a href="<?php echo base_url();?>">Home</a></li>

	        
			
	    </ol>
	</nav>
</div><!-- Close header -->


