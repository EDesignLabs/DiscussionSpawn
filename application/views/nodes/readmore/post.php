<?php $this->load->view('thread/header');?>

<body>
	<?php $this->load->view('thread/menu');?>
    <div id="container">		
        <div id="content">

            <?php foreach($query as $post):?>
				<div class="post">
					<div class="post meta">
						<div class="title"><h2><?php echo $post->field1;?></h2></div>
					</div>
					<br clear="all" />
					<p><?php echo $post->field2;?></p>
					<div style="float:right; font-size:12px; margin:0 5px;">
						<?php if($total_comments > 1)
								{echo $total_comments.' comments';}
								else if($total_comments === 1)
								{echo $total_comments.' comment';}
								else{ echo 'No comment yet!';}?></div>
					<hr />
				</div><!-- Close post -->
            <?php endforeach; ?>
             <?php $this->load->view('thread/comments', array("formated_comments", $formated_comments));?>

        </div><!-- Close content -->
    	
        <?php $this->load->view('thread/footer');?>
    
    </div><!-- Close container -->
</body>
</html>