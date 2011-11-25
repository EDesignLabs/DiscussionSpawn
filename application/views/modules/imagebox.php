<div class = "imagebox" title = "Image Box" > 
	<article >
		
		<img src = "assets/uploads/<?=$post->field1;?>" />
		
		<div class="post meta">
			<div class="field1"><?php echo $post->field2;?></div>
		</div>

		<a class = "" href="<?php echo base_url().'post/'.$post->entry_id;?>">Leave comments</a>
	</article>
</div>
