<?php $this->load->view('thread/header');?>

<body>
	<?php $this->load->view('thread/menu');?>
    <div id="container">        				
		<?php foreach($query as $post):?>
		<div class="post">
				<div class="title"><h2><?php echo $post->username;?></h2></div>


		</div><!-- Close post -->
		<?php endforeach; ?>
			
        <?php //$this->load->view('thread/footer');?>
    	
    </div><!-- Close container -->
</body>
</html>