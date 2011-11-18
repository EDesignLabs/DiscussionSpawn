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

					
					$('.entry-types a').live("click", function(){
						$( "#dialog-form-text" ).dialog( "open" );
						return false;
					});
				
	

					$( "#dialog-form-text" ).dialog({
						autoOpen: false,
						height: 300,
						width: 350,
						modal: true,
						buttons: {
							"Create an account": function() {
								var bValid = true;
								allFields.removeClass( "ui-state-error" );

								bValid = bValid && checkLength( name, "username", 3, 16 );
								bValid = bValid && checkLength( email, "email", 6, 80 );
								bValid = bValid && checkLength( password, "password", 5, 16 );

								bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
								// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
								bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
								bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );

								if ( bValid ) {
									$( "#users tbody" ).append( "<tr>" +
										"<td>" + name.val() + "</td>" + 
										"<td>" + email.val() + "</td>" + 
										"<td>" + password.val() + "</td>" +
									"</tr>" ); 
									$( this ).dialog( "close" );
								}
							},
							Cancel: function() {
								$( this ).dialog( "close" );
							}
						},
						close: function() {
							allFields.val( "" ).removeClass( "ui-state-error" );
						}
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
				<div id="dialog-form-text" title="Create new textbox">

					<form>
						<fieldset>
							<label for="name">Name</label>
							<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
							<label for="email">Email</label>
							<input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all" />
							<label for="password">Password</label>
							<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
						</fieldset>
					</form>
				</div>
			</div>
			
			
        <?php //$this->load->view('thread/footer');?>
    	
    </div><!-- Close container -->
</body>
</html>