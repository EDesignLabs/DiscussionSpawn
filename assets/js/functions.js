
// Save Function
function save(){
		$('.node').each(function(index) {	
			var node = $(this);
			
			if (node.data('status') == "moved"){
				node.css("border","5px solid red");
				

				$.ajax({
					url: "thread/update_location/"+$(this).data('entry_id')+"/"+$(this).css('top')+"/"+$(this).data('position'),
					context: document.body,
					success: function(){
						node.css("border","none");
						node.data("status" , "current")
					}
				});
			}else if (node.data('status') == "added"){
				node.css("border","5px solid red");
				$.ajax({
					url: "thread/add_new_entry/tester/anothertest/"+node.data("position")+"/"+node.css("top"),
					context: document.body,
					success: function(data){
						node.css("border","none");
						node.data("status" , "current")
						node.data("entry_id", data)
					}
				});
			
			}else if (node.data('status') == "deleted"){

			  $.ajax({
				url: "thread/delete_entry/"+node.data('entry_id'),
				context: document.body,
				success: function(){}
				
			  });
			}
		
			
			
		});
		
		return false;
}

function setNodeContainerHeight() {
	var pageHeight = 100;

	$('.node').each(function(index) {						
		if ($(this).offset().top > pageHeight )
			pageHeight = $(this).offset().top;
	});

	$('#content-wrapper').animate({
	height: pageHeight
	}, 0, function() {
	// Animation complete.
	});
}