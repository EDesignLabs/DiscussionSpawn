
// Save Function
function save(){
		
		$('.save_btn').css('background','url("assets/img/save.png") no-repeat scroll center bottom transparent');
		$('.save_btn').data("isSaved", true);
		
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
				console.log(node.data("entry_type"));
				$.ajax({
					url: "thread/add_new_entry/",
					context: document.body,
					type: 'POST',
					data: { entry_type: node.data("entry_type"), 
							position: node.data("position"),
							top: node.css("top"), 
							field1: node.data("field1"), 
							field2: node.data("field2"),  
						  },
					success: function(data){
						node.css("border","none");
						node.data("status" , "current")
						node.data("entry_id", data)
						node.find('.dead_link').attr('href',node.find('.dead_link').attr("href")+data);
						node.find('.dead_link').removeClass('dead_link');
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

function setSaveButtonUnknown(){
	$('.save_btn').css('background','url("assets/img/unsaved.png") no-repeat scroll center bottom transparent');
	$('.save_btn').data("isSaved", false);
}