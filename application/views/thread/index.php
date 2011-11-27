<?php $this->load->view('thread/header');?>

<body>
	<?php $this->load->view('thread/menu');?>
    <div id="container">        				
			<script type="text/javascript">
				$( init );

				function init() {
				
				
				
					$('.node').draggable(nodeSettings);
					$('#add_btn').draggable({ revert: 'invalid', grid: [ 5,5 ] });
					
					
					initializeToolbox();
					setNodeContainerHeight(); 

					$('a.post-link').live("click", function(){
						if ($(this).closest('.node').data("status") == "added"){
							alert("Cannot veiw this page until saved");
							return false;
						}
					});
					
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
								  var myDialog = $(this);
								  var fileUpload = $(this).find('.file_upload');
								  
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
								      //console.log(response);
									  //console.log( myDialog);
									  myDialog.find('.field1').val(response);
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
										if ($(this).attr("type") == "checkbox"){
											sendData[$(this).attr('data-send')] = $(this).is(':checked');
											node.data($(this).attr('data-send'), $(this).is(':checked'));

										}else{
											sendData[$(this).attr('data-send')] = $(this).val();
											node.data($(this).attr('data-send'), $(this).val());
										}
									

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
						<!--NO NODEs -->
					<?php endif; ?>
				</div><!-- Close nodes -->
				
				<?php if (in_array("can_edit_line", $permissions)): ?>
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