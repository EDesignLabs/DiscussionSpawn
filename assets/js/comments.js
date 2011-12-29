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
	
	var source = [
		"In my opinion…",
		"There is a lot of evidence for…",
		"Given what we know about_______, the",
		"One point that was not clear to me was",
		"Are you saying that",
		"Can you please clarify?",
		"I see your point, but what about",
		"Another way of looking at it is",
		"I'm still not convinced that",
		"I don’t entirely agree with",
		"I would argue instead",
		"I agree with ______ because",
		"This makes sense because",
		"I also thought this was the case",
		"I agree with ________, and I would like to clarify by adding",
		"My opinion is similar, but I would add",
		"True.  Another way to look at it is",
		"Based on the data, it is reasonable to conclude",
	];
	
	$( "#comment-box" ).autocomplete({
		source: function (request, response) {
					request.term = request.term.split(" ").pop();
					
					console.log("test:"+request.term);
					
			        var term = $.ui.autocomplete.escapeRegex(request.term)
			            , startsWithMatcher = new RegExp("^" + term, "i")
			            , startsWith = $.grep(source, function(value) {
			                return startsWithMatcher.test(value.label || value.value || value);
			            })
			            , containsMatcher = new RegExp(term, "i")
			            , contains = $.grep(source, function (value) {
			                return $.inArray(value, startsWith) < 0 &&
			                    containsMatcher.test(value.label || value.value || value);
			            });
			
			        response(startsWith.concat(contains));
			    },
			    
			    select: function( event, ui ) {

					return false;
				},
				
			position: { my : "left bottom", at: "left top",  collision: "fit" }
	});
	
});


//for polls
$(function(){
	$('.submit-form a').click(function(){	
	
		var sendData = {};
		sendData['entry_id'] = $('.submit-form').data('entry_id');
		sendData['input'] = $('form input[type=radio]:checked').val()
	
		$.ajax({
			url: CI.base_url + "user/submit_poll/",
			type: 'POST',
			data: sendData,
			success: function(data){
				console.log(data);
				
				
				
			}
		});
		
		return false;
	
	});

});