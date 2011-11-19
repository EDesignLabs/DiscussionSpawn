<div class = "basic-textbox" title = "Basic Text Box (No Comments)" >
	<article>
		<p class = "entry_body" ><?=$post->entry_body;?></p>
	</article>
	
	<?php if (isset($hasDialog) && $hasDialog == true): ?>
		<div class = "dialog" style="display:none" title="Create new textbox">

			<form>
				<fieldset>
					<label for="name">Text</label>
					<input type="text" name="name" class="entry_body" class="text ui-widget-content ui-corner-all" />
				</fieldset>
			</form>

		</div>
	<?php endif ?>
</div>
