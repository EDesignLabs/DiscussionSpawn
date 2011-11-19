<div class = "type-basic-textbox" title = "Basic Text Box (No Comments)" >
	<article>
		<div class="post meta">
			<div class="entry_title"><?php echo $post->entry_name;?></div>
			<div class="entry_date"><?php echo mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($post->entry_date));?></div>
		</div>
		
		<p class = "entry_body" ><?=$post->entry_body;?></p>
		<div style="float:right; font-size:12px; margin:0 5px;">
			<a class = "entry_id post-link" href="<?php echo base_url().'post/'.$post->entry_id;?>">Leave comments</a></div>
		<hr />
	</article>
	
	<?php if (isset($hasDialog) && $hasDialog == true): ?>
		<div class = "dialog" style="display:none" title="Create new textbox">

			<form>
				<fieldset>
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
					<label for="email">Email</label>
					<input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all" />
					<label for="password">Password</label>
					<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
				</fieldset>
			</form>

		</div>
	<?php endif ?>
</div>
