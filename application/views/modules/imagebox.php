<div class = "imagebox" title = "Image Box" > 
	<article style = "background:#ffffff url('assets/uploads/<?=$post->field1;?>') no-repeat center center;min-width: 375px; min-height: 275px;">
		<div class="post meta">
			<div class="field1"><?php echo $post->field2;?></div>
		</div>

		<a class = "dead_link" href="<?php echo base_url().'post/'.$post->entry_id;?>">Leave comments</a>
	</article>
</div>