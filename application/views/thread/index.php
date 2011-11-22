<?php $this->load->view('thread/header');?>

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

					//$('a.dead_link').live("click", function(){alert("You will be able comments once leavings the editing veiw.");return false;});
					
					$('.node .type-container a').live("click", function(){
						
						var node = $(this).closest('.node');
						var nodeType = $(this).attr("href");
						
						var dialogSelector = "#type-examples ." + nodeType;
						
						$(dialogSelector).clone().dialog({
							autoOpen: true,
							height: 300,
							width: 350,
							modal: true,
							create: function(event, ui) {
					
								  var fileUpload = $(this).find('.file_upload');
								   console.log( fileUpload);
								  
								  var uniqueId = Math.floor(Math.random()*999999);
								  
								  fileUpload.attr('id', "file"+uniqueId );
					
								
					
								  $(this).find('#file'+uniqueId).uploadify({
									'uploader'  : 'assets/uploadify/uploadify.swf',
									'script'    : 'assets/uploadify/uploadify.php',
									'cancelImg' : 'assets/uploadify/cancel.png',
									'folder'    : 'assets/uploads',
									'auto'      : true,
									'fileExt'     : '*.jpg;*.gif;*.png',
									'onComplete': function(event, ID, fileObj, response, data) {
								      console.log(response);
								    }
								  });
							
							},
							buttons: {
								"Create": function() {
								
									node.empty();
									node.append('<img src = "assets/img/loader.gif">');
									var sendData = {};
									sendData['template'] = nodeType;
									
									$(this).find('input').each(function(){
										sendData[$(this).attr('class')] = $(this).val();
										node.data($(this).attr('class'), $(this).val());
										node.data("status", "added");
										node.data("entry_type", nodeType);
										node.removeClass("empty");
									});
																		
									$.ajax({
										url: "thread/get_template",
										type: 'POST',
										data: sendData,
										success: function(data){
											node.empty();
											node.append(data);
										}
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
				<!-- Start adding different modules here -->
				<? $this->load->view('dialogs/basic-textbox'); ?>
				<? $this->load->view('dialogs/title-textbox'); ?>
				<? $this->load->view('dialogs/imagebox'); ?>

			</div>
			
        <?php //$this->load->view('thread/footer');?>
    	
    </div><!-- Close container -->
</body>
</html>