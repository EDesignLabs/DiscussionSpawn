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
								$(this).css("border","5px solid red");
								var that = this;

								$.ajax({
									url: "thread/update_location/"+$(this).data('entry_id')+"/"+$(this).css('top')+"/"+$(this).data('position'),
									context: document.body,
									success: function(){
									$(that).css("border","none");
									}
								});
							});
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
								$( "#dialog-confirm" ).dialog({
									resizable: false,
									height:240,
									width:540,
									modal: true,
									buttons: {
										"Delete this entry": function() {
										
											$.ajax({
											  url: "thread/delete_entry/"+$(ui.draggable).data('entry_id'),
											  context: document.body,
											  success: function(){
												
											  }
											});
											$( this ).dialog( "close" );
										},
										Cancel: function() {
											$( this ).dialog( "close" );
										}
									}
								});
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
									
								if (node.data('position') != position){
								
									node.fadeOut(300);
									
									node.removeClass('align-left');
									node.removeClass('align-full');
									node.removeClass('align-right');
									
									node.addClass('align-'+position);
									node.data('position',position);
									
									node.fadeIn(300);
								}
									
								
								console.log(position);

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
					<div class = "node align-<?=$post->position;?>" data-entry_id = "<?=$post->entry_id;?>" data-position = "<?=$post->position;?>" style = "top:<?=$post->top;?>px">
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
						<li><a class = "add_btn" href="#" > <img src =  "<?php echo base_url() ?>assets/img/add-left.png"></a></li>
						<li id="trash" class="ui-widget-header">
							<p>Drop here</p>
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