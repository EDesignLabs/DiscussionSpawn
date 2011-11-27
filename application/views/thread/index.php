<?php $this->load->view('thread/header');?>

<body>
	<?php $this->load->view('thread/menu');?>
    <div id="container">        				
			<script type="text/javascript">

				
			</script>
			<div id = "content-wrapper">
				<div class = "left section"></div>
				<div class = "middle section"></div>
				<div class = "right section"></div>
			    

				<div id="nodes">
					<?php if($query): foreach($query as $post):?>
					<div class = "node align-<?=$post->position;?>" data-entry_type = "<?=$post->entry_type;?>" data-entry_id = "<?=$post->entry_id;?>" data-status = "current" data-position = "<?=$post->position;?>" style = "top:<?=$post->top;?>px">
						<? $this->load->view('modules/'.$post->entry_type , array('post' => $post)); ?>
					</div>
					<?php endforeach; else: ?>
						<!--NO NODEs -->
					<?php endif; ?>
				</div><!-- Close nodes -->
				
				<?php if (in_array("can_edit_line", $this->tank_auth->get_permissions())): ?>
					<aside id = "toolbox">
						<ul>
							<li><a class = "save_btn" href="#"></a></li>
							<li id="trash" >
								
							</li>
							
							<li id="add_btn">
								
							</li>

						</ul>
					</aside>
				<?php endif; ?>
			</div>
			
			<div id = "type-examples" style="display:none">				
				<!-- Start adding different modules here -->
				<? $this->load->view('dialogs/basic-textbox'); ?>
				<? $this->load->view('dialogs/title-textbox'); ?>
				<? $this->load->view('dialogs/imagebox'); ?>
				<? $this->load->view('dialogs/youtubebox'); ?>

			</div>
			
        <?php //$this->load->view('thread/footer');?>
    	
    </div><!-- Close container -->
</body>
</html>