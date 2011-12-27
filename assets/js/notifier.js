$( function(){
	setInterval(function(){
		$.ajax({
			url: "user/get_notices",
			success: function(data){
				
				
				jQuery.each(jQuery.parseJSON(data), function(index, itemData) {
					console.log(itemData.message);
				});
				
				
			}
		});
	},10000);
});