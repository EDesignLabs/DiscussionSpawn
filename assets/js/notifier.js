$( function(){
	setInterval(function(){
		$.ajax({
			url: CI.base_url + "user/get_notices",
			success: function(data){
				
				//console.log(jQuery.parseJSON(data).length);
				$("a.new-replies").text("You have "+jQuery.parseJSON(data).length+" unread replies");
				
				if (jQuery.parseJSON(data).length > 0){
					$("a.new-replies").addClass("full");
	
				
				}else{
					$("a.new-replies").removeClass("full");
				
				}
				
				jQuery.each(jQuery.parseJSON(data), function(index, itemData) {
					console.log(itemData.message);
				});
				
				
			}
		});
	},10000);
	

	$.ajax({
		url: CI.base_url + "user/get_notices",
		success: function(data){
			
			//console.log(jQuery.parseJSON(data).length);
			$("a.new-replies").text("You have "+jQuery.parseJSON(data).length+" unread replies");
				if (jQuery.parseJSON(data).length > 0){
					$("a.new-replies").addClass("full");
	
				
				}else{
					$("a.new-replies").removeClass("full");
				
				}
				
			
			jQuery.each(jQuery.parseJSON(data), function(index, itemData) {
				console.log(itemData.message);
			});
			
			
		}
	});
	
});