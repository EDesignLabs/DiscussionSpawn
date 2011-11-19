<div class = "title-textbox" title = "Text Box (with Comments)" > 
	<article>
		<div class="post meta">
			<div class="entry_title"><?php echo $post->entry_name;?></div>
		</div>
	
		<p class = "entry_body" ><?=$post->entry_body;?></p>
		<a class = " post-link" href="<?php echo base_url().'post/'.$post->entry_id;?>">Leave comments</a>
	</article>
	
	<?php if (isset($hasDialog) && $hasDialog == true): ?>
		<div class = "dialog" style="display:none" title="Create new textbox with comments">

			<form>
				<fieldset>
					<label for="name">Title</label>
					<input type="text" name="name" class="entry_title" class="text ui-widget-content ui-corner-all" />
				
					<label for="name">Text</label>
					<input type="text" name="name" class="entry_body" class="text ui-widget-content ui-corner-all" />
				</fieldset>
			</form>

		</div>
	<?php endif ?>
</div>
