<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
<script type="text/javascript">
 
$( init );
 
function init() {
  $('article').draggable({ axis: 'y' });
  
  $('.save_btn').click(function() {
	$('article').each(function(index) {
		console.log(index + ': ' + $(this).css('top'));
		
		$.ajax({
		  url: "thread/update_top/"+$(this).data('entry_id')+"/"+$(this).css('top'),
		  context: document.body,
		  success: function(){
			$(this).addClass("done");
		  }
		});
	});
  
  });
  
}
 
</script>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/reset.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" />

</head>