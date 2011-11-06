<?php $this->load->view('blog/header');?>

<body>
    <div id="container">
    	<div id="header">
        
        </div><!-- Close header -->
        
        <div id="content">
        	
            <?php $this->load->view('blog/menu');?>
            <?php foreach($query as $post):?>
            <div class="post">
                <div class="post meta">
                	<div class="title"><h2><?php echo $post->entry_name;?></h2></div>
                    <div class="date"><?php echo mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($post->entry_date));?></div>
                </div>
                <br clear="all" />
                <p><?php echo $post->entry_body;?></p>
                <div style="float:right; font-size:12px; margin:0 5px;"><a>
					<?php if($total_comments > 1)
							{echo $total_comments.' comments';}
							else if($total_comments === 1)
							{echo $total_comments.' comment';}
							else{ echo 'No comment yet!';}?></a></div>
                <hr />
            </div><!-- Close post -->
            <?php endforeach; ?>
            
            <div id="comment">
            
            <?php $this->load->view('blog/comment');?>
            
			<?php if(validation_errors()){echo validation_errors('<p class="error">','</p>');} ?>
            <?php if($this->session->flashdata('message')){echo '<p class="success">'.$this->session->flashdata('message').'</p>';}?>
            
            	<h3>Leave your comment</h3>
                
                <?php echo form_open('post/'.$post_id);?>
            	<p>Name:<br />
                <input type="text" name="commentor" size="60" /></p>
                <br clear="all" />
                
                <p>Email:<br />
                <input type="text" name="email" size="60" /></p>
                <br clear="all" />
                
                <p>Comment:<br /></p>
                <textarea rows="6" cols="80%" style="resize:none;" name="comment"></textarea>
                <br clear="all" />
                
                <input type="hidden" name="post_id" value="<?php echo $post_id;?>" />
                <input type="submit" value="Submit" />
                <?php echo form_close();?>
                <hr />
            </div><!-- Close comment -->
            
        </div><!-- Close content -->
    	
        <?php $this->load->view('blog/footer');?>
    
    </div><!-- Close container -->
</body>
</html>