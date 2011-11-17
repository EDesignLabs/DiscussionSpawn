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
				
					//intialize variables
					var mousePosX = 0;
					var mouseStartDragPos = 0;
					var isAnimating = false;
					var nodeOptions = { 
						grid: [ 5,5 ],
						axis: 'y' ,
						start:function(event, ui) {
							mouseStartDragPos = mousePosX;
							
							if ($(this).data('status') != "added")
								$(this).data('status' , "moved");
						},
						stop: function(event, ui) { 
										var pageHeight = 0;
									
										$('.node').each(function(index) {						
											if ($(this).offset().top > pageHeight )
												pageHeight = $(this).offset().top;
										});
									
									   $('#content-wrapper').css('height', pageHeight+"px" );
						}
					}
					
					//intialize functions
					setNodeContainerHeight(); 
					$('.node').draggable(nodeOptions);
					
					
					$('#add_btn').draggable({ revert: 'invalid', grid: [ 5,5 ] });
					
					
					initializeToolbox();
				  
					function setNodeContainerHeight() {
						var pageHeight = 100;

						$('.node').each(function(index) {						
							if ($(this).offset().top > pageHeight )
								pageHeight = $(this).offset().top;
						});

						$('#content-wrapper').animate({
						height: pageHeight
						}, 0, function() {
						// Animation complete.
						});
					}
				

					function initializeToolbox (){
						$('.add_btn').click(function(){
							var newNode = $('<div style="top: 195px; display: block;" data-position="left" class="node ui-draggable align-left"><article></article></div>');
							$('#nodes').append(newNode);
							newNode.draggable(nodeOptions);

							return false;
						});
						
						$('.save_btn').click(function() {
							$('.node').each(function(index) {	
								var node = $(this);
								
								if (node.data('status') == "moved"){
									node.css("border","5px solid red");
									
	
									$.ajax({
										url: "thread/update_location/"+$(this).data('entry_id')+"/"+$(this).css('top')+"/"+$(this).data('position'),
										context: document.body,
										success: function(){
											node.css("border","none");
											node.data("status" , "current")
										}
									});
								}else if (node.data('status') == "added"){
									node.css("border","5px solid red");
									$.ajax({
										url: "thread/add_new_entry/tester/anothertest/"+node.data("position")+"/"+node.css("top"),
										context: document.body,
										success: function(data){
											node.css("border","none");
											node.data("status" , "current")
											node.data("entry_id", data)
										}
									});
								
								}else if (node.data('status') == "deleted"){
					
								  $.ajax({
								  	url: "thread/delete_entry/"+node.data('entry_id'),
								  	context: document.body,
								  	success: function(){}
								  	
								  });
								}
							
								
								
							});
							
							return false;
						});
						
						$('#trash').droppable({
							tolerance: 'pointer',
							hoverClass: 'drophover',
							over: function(event, ui) { 
								$(ui.draggable).fadeOut();
							},
							out: function(event, ui) { 
								$(ui.draggable).fadeIn();
							},
							drop: function( event, ui ) {
								$(ui.draggable).data('status','deleted')
							}
						});
						
						$( "#content-wrapper .section" ).droppable({
							tolerance: 'pointer',
							over: function( event, ui ) {
							
								var node = $(ui.draggable);
								
								var position = "";
								if ($(this).hasClass("left"))
									position = "left"
								if ($(this).hasClass("middle"))
									position = "full"
								if ($(this).hasClass("right"))
									position = "right"
								
								if ($(ui.draggable).hasClass('node')){		
									if (node.data('position') != position){
										node.removeClass('align-left');
										node.removeClass('align-full');
										node.removeClass('align-right');
										
										node.addClass('align-'+position);
										node.data('position',position);
									}
								}else{
									if (position == "left")
										$(ui.draggable).css('background-color','lightBlue');
									if (position == "full")
										$(ui.draggable).css('background-color','lightGreen');
									if (position == "right")
										$(ui.draggable).css('background-color','purple');
								}
									
								
								

							},
							drop:function( event, ui ){
								if (!($(ui.draggable).hasClass('node'))){	
									
									var position = "";
									if ($(this).hasClass("left"))
										position = "left"
									if ($(this).hasClass("middle"))
										position = "full"
									if ($(this).hasClass("right"))
										position = "right"
									
									
									nodeOffset = $(ui.draggable).offset().top - $('#content-wrapper').offset().top;
									console.log(nodeOffset);
									$(ui.draggable).remove();
									
									
									
									var newNode = '<div style="position:absolute;top: '+nodeOffset+'px;" class="node align-'+position+'"><article>testtter</article></div>';
									var nodeElement = $(newNode);
									nodeElement.data("status", "added");
									nodeElement.data("position", position);
									
									nodeElement.draggable(nodeOptions);
									
									$('#nodes').append(nodeElement);
									
									$('#toolbox').append();
									
									var newAddBox = '<li id="add_btn" style=" " class="ui-draggable"><p>Drag to add</p></li>'
									var ele = $(newAddBox);
									ele.draggable({ revert: 'invalid', grid: [ 5,5 ] });
									
									$('#toolbox ul').append(ele);
									
								}
							
							}
						});
					}
				 
					$(document).mousemove(function(e){
						mousePosX = e.pageX-$('#content-wrapper').position().left;
				    }); 			  
				}
				
			</script>
			<div id = "content-wrapper">
				<div class = "left section"></div>
				<div class = "middle section"></div>
				<div class = "right section"></div>
			
				<div id="nodes">
					<?php if($query): foreach($query as $post):?>
					<div class = "node align-<?=$post->position;?>" data-entry_id = "<?=$post->entry_id;?>" data-status = "current" data-position = "<?=$post->position;?>" style = "top:<?=$post->top;?>px">
						<article>
							<div class="post meta">
								<div class="title"><h2><?php echo $post->entry_name;?></h2></div>
								<div class="date"><?php echo mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($post->entry_date));?></div>
							</div>
							
							<p><?=$post->entry_body;?></p>
							<div style="float:right; font-size:12px; margin:0 5px;">
								<a href="<?php echo base_url().'post/'.$post->entry_id;?>">Leave comments</a></div>
							<hr />
						</article><!-- Close post -->
					</div>
					<?php endforeach; else: ?>
						<h1>no entry yet!</h1>
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
			
			<div style="display:none">
				<div id="data">
					<?php $this->load->view('thread/add_new_text');?>
				</div>
				<div id="dialog-confirm" title="Delete Entry?">
					<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This entry will be permanently deleted and cannot be recovered. Are you sure?</p>
				</div>
			</div>
			
			
        <?php //$this->load->view('thread/footer');?>
    	
    </div><!-- Close container -->
</body>
</html>