<div id="comments">

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
		<input class = "parent_username" type="hidden" name="parent_username" value="" />

		<input type="submit" value="Submit" />
		<?php echo form_close();?>
	</div>
</div><!-- Close comment -->