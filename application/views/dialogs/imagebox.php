<div data-type = "imagebox" class = "imagebox dialog" style="display:none" title="Create Imagebox">

	<form>
		<fieldset>
			<label for="name">Title</label>
			<input type="text"  data-send = "field2" value = "" class="text ui-widget-content ui-corner-all" />
		
			<label for="name">Image</label>
			<input class = "file_upload" id="file_upload<?php echo uniqid();?>" name="file_upload" type="file" />
			
			<label for="name">Need comments?</label>
			<input data-send = "field3" type="checkbox" name="comments" > 
			
			<input type="hidden" name="name" data-send = "field1" class="text ui-widget-content ui-corner-all" />
		</fieldset>
	</form>

</div>