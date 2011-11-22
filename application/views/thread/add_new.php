<?php $this->load->view('thread/header');?>

<body>
    <div id="container">
    	<div id="header">
        
        </div><!-- Close header -->
        
        <div id="content">
        	
            <?php $this->load->view('thread/menu');?>
            
            <?php if(validation_errors()){echo validation_errors('<p class="error">','</p>');} ?>
            <?php if($this->session->flashdata('message')){echo '<p class="success">'.$this->session->flashdata('message').'</p>';}?>
            
            <?php echo form_open('new-post');?>
            <p><strong>Title</strong>:<br />
			<input type="text" name="field1" size="60" /></p>
            <br clear="all" />
            
            <p><strong>Body</strong>: (HTML mode)</p>
            <textarea rows="6" cols="80%" name="field2" style="resize:none;"></textarea>
            <br clear="all" />
			
            <p><strong>Position</strong>:</p>
			<input type="radio" name="position" value="left" Checked>Left<br>
			<input type="radio" name="position" value="right">Right<br>
			<input type="radio" name="position" value="full">Full<br> 
            <br clear="all" />
			

            
            <p><input type="submit" value="Submit" /></p>
            <?php echo form_close(); ?>
            
            <hr />
        </div><!-- Close content -->
    	
        <?php $this->load->view('thread/footer');?>
    
    </div><!-- Close container -->
</body>
</html>