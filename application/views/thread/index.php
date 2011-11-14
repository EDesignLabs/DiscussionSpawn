<?php $this->load->view('thread/header');?>

<body>
    <div id="container">
    	<div id="header">
			Welcome <?=$username?>
        </div><!-- Close header -->
        
        
        	
            <?php $this->load->view('thread/menu');?>
			
			<script type="text/javascript">
				$(function() {
					var pageHeight = 100;
				
					$('.node').each(function(index) {						
						if ($(this).offset().top > pageHeight )
							pageHeight = $(this).offset().top;
					});
				
				   $('#content').animate({
					height: pageHeight
				  }, 1000, function() {
					// Animation complete.
				  });
				});
				
				$(document).ready(function() {
					
					$("a#inline").fancybox({
						'hideOnContentClick': false
					});
					
				});
				
				$( init );
				 
				function init() {
				  var mousePos = 0;
				
				  $('.node').draggable({ 
				  grid: [ 5,5 ],
				  axis: 'y' ,
				  stop: function(event, ui) { 
								$(function() {
									var pageHeight = 100;
								
									$('.node').each(function(index) {						
										if ($(this).offset().top > pageHeight )
											pageHeight = $(this).offset().top;
									});
								
								   $('#content').animate({
									height: pageHeight
								  }, 0, function() {
									// Animation complete.
								  });
								});
					},
					
					drag:function(event, ui) {
						//console.log($(this).css(event));
						if (mousePos > 0 &&  mousePos < 475){
							$(this).data('position', 'left');
							$(this).addClass('align-left');
							$(this).removeClass('align-full');
							$(this).removeClass('align-right');
							
						}else if (mousePos > 475 &&  mousePos < 550){ 
							$(this).data('position', 'full');
							$(this).addClass('align-full');
							$(this).removeClass('align-left');
							$(this).removeClass('align-right');
							
						}else if (mousePos > 550 &&  mousePos < 1000){ 
							$(this).data('position', 'right');
							$(this).addClass('align-right');
							$(this).removeClass('align-left');
							$(this).removeClass('align-full');
							
						}
						//console.log	(mousePos);
					}
					
					
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

					$(document).mousemove(function(e){
					
						mousePos = e.pageX-$('#content').position().left;
						
						
				   }); 
				   
					$( "#trash" ).droppable({
						tolerance: 'pointer',
						hoverClass: 'drophover',
						over: function(event, ui) { 
							$(ui.draggable).slideUp();
						},
						out: function(event, ui) { 
							$(ui.draggable).slideDown();
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
								  
				}
				
			</script>

            <div id="content">
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
				<aside class = "insert">
					<ul>
						<li><a class = "save_btn" href="#">Save</a></li>
						<li><a id="inline" href="#data" > <img src =  "<?php echo base_url() ?>assets/img/add-left.png"></a></li>
						<li id="trash" class="ui-widget-header">
							<p>Drop here</p>
						</li>
					</ul>
				</aside>
				
			</div><!-- Close content -->
			
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