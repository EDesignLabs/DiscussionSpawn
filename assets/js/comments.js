$(function(){
	$('.reply-link').click(function(){
		
		var commentform = $('#comment-form');
		
		commentform.find('.parent_id').val($(this).parent().data('id'));
		commentform.find('.parent_username').val($(this).parent().data('username'));
		commentform.find('.parent_comment').val($(this).parent().find('.comment-body').text());
console.log($(this).parent().find('.comment-body').text());
		$(this).parent().append($('#comment-form'));
		return false;
	});
});