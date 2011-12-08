$(function(){
	$('.reply-link').click(function(){
		
		var commentform = $('#comment-form');
		
		commentform.find('.parent_id').val($(this).parent().data('id'));
		commentform.find('.parent_username').val($(this).parent().data('username'));

		$(this).parent().append($('#comment-form'));
		return false;
	});
});