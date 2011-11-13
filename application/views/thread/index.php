<?php $this->load->view('thread/header');?>

<body>
    <div id="container">
    	<div id="header">
			Welcome <?=$username?>
        </div><!-- Close header -->
        
        
        	
            <?php $this->load->view('thread/menu');?>
			
			<script type="text/javascript">
				$(function() {
					var pageHeight = 100;
				
					$('.node').each(function(index) {						
						if ($(this).offset().top > pageHeight )
							pageHeight = $(this).offset().top;
					});
				
				   $('#content').animate({
					height: pageHeight
				  }, 1000, function() {
					// Animation complete.
				  });
				});
				
				$(document).ready(function() {
					
					$("a#inline").fancybox({
						'hideOnContentClick': true
					});
					
				});
			</script>

            <div id="content">
				<?php if($query): foreach($query as $post):?>
				<div class = "node align-<?=$post->position;?>" data-entry_id = "<?=$post->entry_id;?>" style = "top:<?=$post->top;?>px">
					<article>
						<div class="post meta">
							<div class="title"><h2><?php echo $post->entry_name;?></h2></div>
							<div class="date"><?php echo mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($post->entry_date));?></div>
						</div>
						
						<p><?=$post->entry_body;?></p>
						<div style="float:right; font-size:12px; margin:0 5px;">
							<a href="<?php echo base_url().'post/'.$post->entry_id;?>">Leave comments</a></div>
						<hr />
					</article><!-- Close post -->
				</div>
				<?php endforeach; else: ?>
					<h1>no entry yet!</h1>
				<?php endif; ?>
				<aside class = "insert">
					<ul>
						<li><a class = "save_btn" href="#">Save</a></li>
						<li><a id="inline" href="#data" > <img src =  "<?php echo base_url() ?>assets/img/add-left.png"></a></li>

					</ul>
				</aside>
				
			</div><!-- Close content -->
			
			<div style="display:none"><div id="data">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div></div>
			
			
        <?php //$this->load->view('thread/footer');?>
    	
    </div><!-- Close container -->
</body>
</html>