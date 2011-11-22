<div class = "imagebox" title = "Image Box" > 
	<article>
		<div class="post meta">
			<div class="field1"><?php echo $post->field1;?></div>
		</div>
	
		<p class = "field2" ><?=$post->field2;?></p>
		<a class = "dead_link" href="<?php echo base_url().'post/'.$post->entry_id;?>">Leave comments</a>
	</article>
	
	<?php if (isset($hasDialog) && $hasDialog == true): ?>
		<div class = "dialog" style="display:none" title="Create Imagebox">

			<form>
				<fieldset>
					<label for="name">Title</label>
					<input type="text" name="name" class="field1" class="text ui-widget-content ui-corner-all" />
				
					<label for="name">Image</label>
					<input class = "file_upload" id="file_upload<?php echo uniqid();?>" name="file_upload" type="file" />
				</fieldset>
			</form>

		</div>
	<?php endif ?>
</div>
