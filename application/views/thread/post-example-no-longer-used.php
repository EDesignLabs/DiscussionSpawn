<?php $this->load->view('thread/header');?>

<body>
	<?php $this->load->view('thread/menu');?>
    <div id="container">

		<script type="text/javascript">
			$(function(){
				$('.reply-link').click(function(){
					
					var commentform = $('#comment-form');
					
					commentform.find('.parent_id').val($(this).parent().data('id'));
					commentform.find('.parent_username').val($(this).parent().data('username'));
					
					$(this).parent().append($('#comment-form'));
					return false;
				});
			});
			

			
		
		</script>
        
        <div id="content">

            <?php foreach($query as $post):?>
            <div class="post">
                <div class="post meta">
                	<div class="title"><h2><?php echo $post->field1;?></h2></div>
                    <div class="date"><?php echo mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($post->entry_date));?></div>
                </div>
                <br clear="all" />
                <p><?php echo $post->field2;?></p>
                <div style="float:right; font-size:12px; margin:0 5px;"><a>
					<?php if($total_comments > 1)
							{echo $total_comments.' comments';}
							else if($total_comments === 1)
							{echo $total_comments.' comment';}
							else{ echo 'No comment yet!';}?></a></div>
                <hr />
            </div><!-- Close post -->
            <?php endforeach; ?>
            
            <div id="comment">
            
				<ul>
					<?=$formated_comments?>
				</ul>
            
				<div id="comment-form">

					<?php if(validation_errors()){echo validation_errors('<p class="error">','</p>');} ?>
					<?php if($this->session->flashdata('message')){echo '<p class="success">'.$this->session->flashdata('message').'</p>';}?>
					
					<h3>Leave your comment</h3>
					
					<?php echo form_open('post/'.$post_id);?>

					
					<p>Comment:<br /></p>
					<textarea rows="6" cols="80%" style="resize:none;" name="comment"></textarea>
					<br clear="all" />
					
					<input type="hidden" name="post_id" value="<?php echo $post_id;?>" />
					<input class = "parent_id" type="hidden" name="parent_id" value="0" />
					
					<input type="submit" value="Submit" />
					<?php echo form_close();?>
                </div>
            </div><!-- Close comment -->
            
        </div><!-- Close content -->
    	
        <?php $this->load->view('thread/footer');?>
    
    </div><!-- Close container -->
</body>
</html>