<?php $this->load->view('thread/header');?>

<body>
	<?php $this->load->view('thread/menu');?>
    <div id="container">   
		<div>
		
		
		The tool reported that this text contained <?=$sentence_count?> sentences, with <?=$word_count?> words (average <?=$average_words_per_sentence?> words per sentence). The average words per entry was <?=$average_words_per_entry?>
			<br>	<br>
			<table cellspacing="0" cellpadding="0" border="0" class="readability_results">
			
			    <tbody><tr>
			        <td>Readability Formula</th>
			        <td>Grade</th>
			    </tr>
			    <tr>
			        <td>Flesch-Kincaid Grade Level (<a href="http://en.wikipedia.org/wiki/Flesch-Kincaid#Flesch.E2.80.93Kincaid_Grade_Level">Wikipedia</a>)</td>
			        <td><?=$flesch_kincaid?></td>
			    </tr>
			
			    <tr>
			        <td>Gunning-Fog Score (<a href="http://en.wikipedia.org/wiki/Gunning-Fog_Index">Wikipedia</a>)</td>
			        <td><?=$gunning_fog_score?></td>
			    </tr>
			
			    <tr>
			        <td>Coleman-Liau Index (<a href="http://en.wikipedia.org/wiki/Coleman-Liau_Index">Wikipedia</a>)</td>
			        <td><?=$coleman_liau_index?></td>
			    </tr>
			
			    <tr>
			        <td>SMOG Index (<a href="http://en.wikipedia.org/wiki/SMOG_Index">Wikipedia</a>)</td>
			        <td><?=$smog_index?></td>
			    </tr>
			
			    <tr>
			        <td>Automated Readability Index (<a href="http://en.wikipedia.org/wiki/Automated_Readability_Index">Wikipedia</a>)</td>
			        <td><?=$automated_readability_index?></td>
			    </tr>
			
			    <tr>
			        <td><strong>Average Grade Level</strong></td>
			        <td><strong><?=$average?></strong></td>
			    </tr>
			
			</tbody></table>
		</div>
<br>	<br>	
         				
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