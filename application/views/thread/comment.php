<?php if($comments): foreach($comments as $row):?>
<div class="commentor">
    <div>
    	<strong>
			<?php echo $row->comment_name;?></strong> says on <span style="font-size:10px;"><?php echo mdate("%h:%i %a, %d.%m.%Y",mysql_to_unix($row->comment_date));?></span>
    </div>
    <div><?php echo $row->comment_body;?></div>
</div>
<?php endforeach; else: ?>
<h3>No comment yet!</h3>
<?php endif;?>