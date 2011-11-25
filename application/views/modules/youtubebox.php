<div class = "youtubebox" title = "Youtube Box" > 
	<article >
		
		<iframe width="400" height="300" src="http://www.youtube.com/embed/<?=$post->field1;?>" frameborder="0" allowfullscreen></iframe>

		<a class = "" href="<?php echo base_url().'post/'.$post->entry_id;?>">Leave comments</a>
	</article>
</div>
