<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.sparkline.min.js"></script>
	
<script type="text/javascript">
    var CI = {
      'base_url': '<?php echo base_url(); ?>'
    };
</script>


<?php if (in_array("can_edit_line", $this->tank_auth->get_permissions())): ?>
	<script type="text/javascript" src="<?=base_url()?>assets/js/toolbox.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/notifier.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/functions.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/globals.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/uploadify/swfobject.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/uploadify/jquery.uploadify.v2.1.4.min.js"></script>

<?php endif; ?>

<script type="text/javascript" >
	$(function(){setNodeContainerHeight(); });

	function setNodeContainerHeight() {
		var pageHeight = 100;

		$('.node').each(function(index) {						
			if ($(this).offset().top > pageHeight )
				pageHeight = $(this).offset().top+300;
		});

		$('#content-wrapper').animate({
		height: pageHeight
		}, 0, function() {
		// Animation complete.
		});
	}
</script>

<link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>

<link media="all" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/reset.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/modules.css" type="text/css" />



</head>