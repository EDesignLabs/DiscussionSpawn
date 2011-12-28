<?php $this->load->view('thread/header');?>

<body>
	<?php $this->load->view('thread/menu');?>
    <div id="container">        	
				<ul class = "replies" >
					<?php if($query): foreach($query as $post):?>
						<li><a class = "<?=$post->status ?>" href = "<?=base_url()?>post/<?=$post->post_id ?>/<?=$post->id?>#comment-<?=$post->comment_id ?>" ><?=$post->message ?></a></li>
					
					<?php endforeach; else: ?>
						<!--NO Users :( -->
					<?php endif; ?>
				</ul>
        <?php //$this->load->view('thread/footer');?>
    	
    </div><!-- Close container -->
</body>
</html>