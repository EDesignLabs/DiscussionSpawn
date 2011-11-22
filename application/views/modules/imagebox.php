<div class = "imagebox" title = "Image Box" > 
	<article>
		<div class="post meta">
			<div class="field1"><?php echo $post->field1;?></div>
		</div>
	
		<p class = "field2" ><?=$post->field2;?></p>
		<a class = "dead_link" href="<?php echo base_url().'post/'.$post->entry_id;?>">Leave comments</a>
	</article>
</div>
