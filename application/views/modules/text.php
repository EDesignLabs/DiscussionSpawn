<div class = "type-text">
	<article>
		<div class="post meta">
			<div class="entry_title"><?php echo $post->entry_name;?></div>
			<div class="entry_date"><?php echo mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($post->entry_date));?></div>
		</div>
		
		<p class = "entry_body" ><?=$post->entry_body;?></p>
		<div style="float:right; font-size:12px; margin:0 5px;">
			<a class = "entry_id post-link" href="<?php echo base_url().'post/'.$post->entry_id;?>">Leave comments</a></div>
		<hr />
	</article><!-- Close post -->
</div>
