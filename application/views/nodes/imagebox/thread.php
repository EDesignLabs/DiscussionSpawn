<div class = "imagebox" title = "Image Box" > 
	<article >
		
		<img src = "assets/uploads/<?=$post->field1;?>" />
		
		<div class="post meta">
			<div class="field1"><?php echo $post->field2;?></div>
		</div>

		<?php if ($post->field3 == "true"):?>
			<a class = "post-link" href="<?php echo base_url().'post/'.$post->entry_id;?>">Leave comments</a>
		<?php endif; ?>
	</article>
</div>
