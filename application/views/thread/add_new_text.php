<?php echo form_open('');?>
	
    <fieldset class="step step1">
            
            <?php if(validation_errors()){echo validation_errors('<p class="error">','</p>');} ?>
            <?php if($this->session->flashdata('message')){echo '<p class="success">'.$this->session->flashdata('message').'</p>';}?>
            
            
            <p><strong>Title</strong>:<br />
			<input type="text" name="field1" size="60" /></p>
            <br clear="all" />
            
            <p><strong>Body</strong>: (HTML mode)</p>
            <textarea rows="6" cols="80%" name="field2" style="resize:none;"></textarea>
            <br clear="all" />

            
            
        <button class="continue">Continue</button>
    </fieldset>
    <fieldset class="step step2">
        field1s ...
        <button class="back">Back</button>
        <button class="continue">Continue</button>
    </fieldset>
    <fieldset class="step step3">
        field2s ...
        <button class="back">Back</button>
        <p><input type="submit" value="Submit" /></p>
    </fieldset>
</form>

		