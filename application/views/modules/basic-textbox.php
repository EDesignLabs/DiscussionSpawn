<div class = "basic-textbox" title = "Basic Text Box (No Comments)" >
	<article>
		<p class = "field2" ><?=$post->field2;?></p>
	</article>
	
	<?php if (isset($hasDialog) && $hasDialog == true): ?>
		<div class = "dialog" style="display:none" title="Create new textbox">

			<form>
				<fieldset>
					<label for="name">Text</label>
					<input type="text" name="name" class="field2" class="text ui-widget-content ui-corner-all" />
				</fieldset>
			</form>

		</div>
	<?php endif ?>
</div>
