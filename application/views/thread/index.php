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

				<div id="nodes">
					<?php if($query): foreach($query as $post):?>
					<div class = "node align-<?=$post->position;?>" data-entry_type = "<?=$post->entry_type;?>" data-entry_id = "<?=$post->entry_id;?>" data-status = "current" data-position = "<?=$post->position;?>" style = "top:<?=$post->top;?>px">
						<? $this->load->view('nodes/'.$post->entry_type."/thread" , array('post' => $post)); ?>
					</div>
					<?php endforeach; else: ?>
						<!--NO NODEs -->
					<?php endif; ?>
				</div><!-- Close nodes -->
				

			</div>
			
			<div id = "type-examples" style="display:none">				
				<!-- Start adding different modules here -->
				<? $this->load->view('nodes/basic-textbox/dialog'); ?>
				<? $this->load->view('nodes/title-textbox/dialog'); ?>
				<? $this->load->view('nodes/imagebox/dialog'); ?>
				<? $this->load->view('nodes/youtubebox/dialog'); ?>
				<? $this->load->view('nodes/promptbox/dialog'); ?>
				<? $this->load->view('nodes/poll/dialog'); ?>
			</div>
			
        <?php //$this->load->view('thread/footer');?>
    	
    </div><!-- Close container -->
</body>
</html>