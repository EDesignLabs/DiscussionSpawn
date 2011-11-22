<div data-type = "imagebox" class = "imagebox dialog" style="display:none" title="Create Imagebox">

	<form>
		<fieldset>
			<label for="name">Title</label>
			<input type="text"  class="field2" value = "" class="text ui-widget-content ui-corner-all" />
		
			<label for="name">Image</label>
			<input class = "file_upload" id="file_upload<?php echo uniqid();?>" name="file_upload" type="file" />
			
			<input type="hidden" name="name" class="field1" class="text ui-widget-content ui-corner-all" />
		</fieldset>
	</form>

</div>