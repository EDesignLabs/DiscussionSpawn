<div class = "title-textbox" title = "Text Box (with Comments)" > 
	<article>
		<h1>
			<?php echo $post->field1;?>
		</h1>
	
		<p class = "field2" ><?=$post->field2;?></p>
		<?php $post_count = $this->thread_model->total_comments($post->entry_id);  ?>
		
		<?php if ($post->field3 == "true"):?>
			<?php if (isset($post_count) && $post_count > 0):?>
				<a class = "post-link" href="<?php echo base_url().'post/'.$post->entry_id;?>"> <?=$post_count;?> comments</a>
			<?php else: ?>
				<a class = "post-link" href="<?php echo base_url().'post/'.$post->entry_id;?>">Leave a comment</a>
			<?php endif; ?>
		<?php endif; ?>
	</article>
</div>
