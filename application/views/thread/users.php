<?php $this->load->view('thread/header');?>

<body>
	<?php $this->load->view('thread/menu');?>
    <div id="container">        	
				<ul>
					<?php if($query): foreach($query as $post):?>
						<li><a href = "<?=base_url()?>user/profile/<?=$post->username ?>" ><?=$post->username ?></a></li>
					
					<?php endforeach; else: ?>
						<!--NO Users :( -->
					<?php endif; ?>
				</ul>
        <?php //$this->load->view('thread/footer');?>
    	
    </div><!-- Close container -->
</body>
</html>