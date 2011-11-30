<?php $this->load->view('thread/header');?>

<body>
	<?php $this->load->view('thread/menu');?>
    <div id="container">        				
		<?php foreach($query as $post):?>
		<div class="user-posts">
				<div class="title"><h2><?php echo $post->username;?></h2></div>
				<div>
					<?php if($comments): foreach($comments as $comment):?>
						<li><a href = "<?=base_url()?>post/<?=$comment->entry_id ?>" ><?=$comment->comment_body ?></a><div class = "comment-date"><?=$comment->comment_date ?></div></li>
					
					<?php endforeach; else: ?>
						This user has no comments
					<?php endif; ?>
					
				</div>
		</div><!-- Close post -->
		<?php endforeach; ?>
			
        <?php //$this->load->view('thread/footer');?>
    	
    </div><!-- Close container -->
</body>
</html>