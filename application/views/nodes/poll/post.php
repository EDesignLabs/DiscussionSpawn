<?php $this->load->view('thread/header');?>

<body>
	<?php $this->load->view('thread/menu');?>
    <div id="container">

		<script type="text/javascript" src="<?=base_url()?>assets/js/comments.js"></script>
		
        <div id="content">

            <?php foreach($query as $post):?>
				<div class="post">
					<div class="post meta">
						<div class="title"><h2><?php echo $post->field1;?></h2></div>
						<div class="date"><?php echo mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($post->entry_date));?></div>
					</div>
					<br clear="all" />
					
					<?php
					
						$votes = json_decode( $post->field2,true);
						if (isset($votes[$this->tank_auth->get_username()])){
							$dontdisplayForm = true;
						}else{
							$dontdisplayForm = false;
						}
						
					?>
					
					<form <?=($dontdisplayForm ? 'style = "display:none"' : '')?> data-entry_id = "<?=$post->entry_id?>" data-radio_name = "<?=base64_encode($post->field3)?>" class = "submit-form">
					<?php
						$questions = explode(",",$post->field3);
						foreach ($questions as $key => $value) {
					?>
							<input type="radio" name="<?=base64_encode($post->field3)?>" value="<?=base64_encode($value)?>" /> <?=$value?><br />
					<?php } ?>
					
					
						<a href = "#submit">Vote</a>

					</form>
					
					<div <?=($dontdisplayForm ? '' : 'style = "display:none"')?> class = "poll-results">
						<h2>Other people have voted:</h2>
						<?php 
						
							if ($votes != null){ 
								$tab = array_count_values($votes);
							
							?>
							
								<span class="inlinebar">
									 <?php foreach ($tab as $key => $value) { ?>
										<?=$value?>,
									<?php } ?>
								</span>
								
								<div class="bar-item">
									<?php foreach ($tab as $key => $value) { ?>
										<span><?=base64_decode($key);?><br><?=$value?> votes</span>
									<?php } ?></div>
								</div>
							
							<?php
	
							}else{
								echo "You are the first person to vote on this. Check back later to see what others said.";
							
							}
						?>
						

					

					
					
					<p style = "clear:both"></p>
					<div style="float:right; font-size:12px; margin:0 5px;">
						<?php if($total_comments > 1)
								{echo $total_comments.' comments';}
								else if($total_comments === 1)
								{echo $total_comments.' comment';}
								else{ echo 'No comment yet!';}?></div>
					<hr />
				</div><!-- Close post -->
            <?php endforeach; ?>
             <?php $this->load->view('thread/comments', array("formated_comments" => $formated_comments));?>

        </div><!-- Close content -->
    	
        <?php $this->load->view('thread/footer');?>
    
    </div><!-- Close container -->
</body>
</html>