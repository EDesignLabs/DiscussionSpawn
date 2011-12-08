<div class = "title-textbox" title = "Text Box (with Comments)" > 
	<article>
		<h1>
			<?php echo $post->field1;?>
		</h1>
	
		<p class = "field2" ><?=$post->field2;?></p>
		<?php if ($post->field3 == "true"):?>
			<a class = "post-link" href="<?php echo base_url().'post/'.$post->entry_id;?>">Leave comments</a>
		<?php endif; ?>
	</article>
</div>
