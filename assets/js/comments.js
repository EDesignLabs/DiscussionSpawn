$(function(){
	$('.reply-link').click(function(){
		
		var commentform = $('#comment-form');
		
		commentform.find('.parent_id').val($(this).parent().data('id'));
		
		$(this).parent().append($('#comment-form'));
		return false;
	});
});