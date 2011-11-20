
<body>
    <div id="container">
    	<div id="header">
			Welcome <?=$username?>
        </div><!-- Close header -->
        
        
        	
            <?php $this->load->view('thread/menu');?>
			
			<script type="text/javascript">
				$( init );

				function init() {
				
					$('.node').draggable(nodeSettings);
					$('#add_btn').draggable({ revert: 'invalid', grid: [ 5,5 ] });
					
					
					initializeToolbox();
					setNodeContainerHeight(); 

					
					$('.node .type-container a').live("click", function(){
						
						var node = $(this).closest('.node');
						var nodeType = $(this).attr("href");
						
						var dialogSelector = "#type-examples ." + nodeType + " .dialog";
						
						$(dialogSelector).clone().dialog({
							autoOpen: true,
							height: 300,
							width: 350,
							modal: true,
							buttons: {
								"Create": function() {
								
									node.empty();
									node.append($("#type-examples ." + nodeType).clone());
									
									$(this).find('input').each(function(){

										node.find("."+$(this).attr('class')).text($(this).val());
										
										node.data($(this).attr('class'), $(this).val());
										node.data("status", "added");
										node.data("entry_type", nodeType);
										node.removeClass("empty");
									});
									
									$( this ).dialog( "destroy" );
								},
								Cancel: function() {
									
									$( this ).dialog( "destroy" );
								}
							},
						});
						return false;
					});
				
	


					
				}
				
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
						<h1>no nodes yet!</h1>
					<?php endif; ?>
				</div><!-- Close nodes -->
				<aside id = "toolbox">
					<ul>
						<li><a class = "save_btn" href="#">Save</a></li>
						<li id="trash" >
							<p>Drop here to delete</p>
						</li>
						
						<li id="add_btn">
							<p>Drag to add</p>
						</li>

					</ul>
				</aside>
			</div>
			
			<div id = "type-examples" style="display:none">
				<?php $post->entry_name = "Error: Missing Content: ENTRY_NAME"; ?>
				<?php $post->entry_date = "Error: Missing Content: ENTRY_DATE"; ?>
				<?php $post->entry_body = "Error: Missing Content: entry_body"; ?>
				<?php $post->entry_date = 1; ?>
				
				<!-- Start adding different modules here -->
				<? $this->load->view('modules/basic-textbox', array('post' => $post, 'hasDialog' => true)); ?>
				<? $this->load->view('modules/title-textbox', array('post' => $post, 'hasDialog' => true)); ?>

			</div>
			
        <?php //$this->load->view('thread/footer');?>
    	
    </div><!-- Close container -->
</body>
</html>