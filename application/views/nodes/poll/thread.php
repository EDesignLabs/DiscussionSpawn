<div class = "title-textbox" title = "Text Box (with Comments)" > 
	<article>
		<h1>
			<?php echo $post->field1;?>
		</h1>
	

		<?php $post_count = $this->thread_model->total_comments($post->entry_id);  ?>
		

		<a class = "post-link" href="<?php echo base_url().'post/'.$post->entry_id;?>">Find out what others said.</a>

	</article>
</div>
