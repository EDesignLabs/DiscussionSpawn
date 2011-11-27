
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
				//console.log(node.data("entry_type"));
				$.ajax({
					url: "thread/add_new_entry/",
					context: document.body,
					type: 'POST',
					data: { entry_type: node.data("entry_type"), 
							position: node.data("position"),
							top: node.css("top"), 
							field1: node.data("field1"), 
							field2: node.data("field2"),  
							field3: node.data("field3"), 
						  },
					success: function(data){
						node.css("border","none");
						node.data("status" , "current");
						node.data("entry_id", data);
						node.find('.post-link').attr('href',node.find('.post-link').attr("href")+data);
						
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



function setSaveButtonUnknown(){
	$('.save_btn').css('background','url("assets/img/unsaved.png") no-repeat scroll center bottom transparent');
	$('.save_btn').data("isSaved", false);
}

/////////////////////////////////////


$( init );

function init() {



	$('.node').draggable(nodeSettings);
	$('.node').css("cursor", "move");
	$('#add_btn').draggable({ revert: 'invalid', grid: [ 5,5 ] });
	
	
	initializeToolbox();


	$('a.post-link').live("click", function(){
		if ($(this).closest('.node').data("status") == "added"){
			alert("Cannot veiw this page until saved");
			return false;
		}
	});
	
	$('.node .type-container a').live("click", function(){
		
		var node = $(this).closest('.node');
		var nodeType = $(this).attr("href");
		
		var dialogSelector = "#type-examples ." + nodeType;
		
		$(dialogSelector).clone().dialog({
			autoOpen: true,
			height: 300,
			width: 350,
			modal: true,
			create: function(event, ui) {
				  var myDialog = $(this);
				  var fileUpload = $(this).find('.file_upload');
				  
				  var uniqueId = Math.floor(Math.random()*999999);
				  
				  fileUpload.attr('id', "file"+uniqueId );
	
				
	
				  $(this).find('#file'+uniqueId).uploadify({
					'uploader'  : 'assets/uploadify/uploadify.swf',
					'script'    : 'assets/uploadify/uploadify.php',
					'cancelImg' : 'assets/uploadify/cancel.png',
					'folder'    : 'assets/uploads',
					'auto'      : true,
					'fileExt'     : '*.jpg;*.gif;*.png',
					'onComplete': function(event, ID, fileObj, response, data) {
					  //console.log(response);
					  //console.log( myDialog);
					  myDialog.find('.field1').val(response);
					}
				  });
			
			},
			buttons: {
				"Create": function() {
				
					node.empty();
					node.append('<img src = "assets/img/loader.gif">');
					var sendData = {};
					sendData['template'] = nodeType;
					
					$(this).find('input').each(function(){
						if ($(this).attr("type") == "checkbox"){
							sendData[$(this).attr('data-send')] = $(this).is(':checked');
							node.data($(this).attr('data-send'), $(this).is(':checked'));

						}else{
							sendData[$(this).attr('data-send')] = $(this).val();
							node.data($(this).attr('data-send'), $(this).val());
						}
					

						node.data("status", "added");
						node.data("entry_type", nodeType);
						node.css("cursor","move");
						node.removeClass("empty");
					});
														
					$.ajax({
						url: "thread/get_template",
						type: 'POST',
						data: sendData,
						success: function(data){
							node.empty();
							node.append(data);
						}
					});
					
					$( this ).dialog( "destroy" );
				},
				Cancel: function() {
					$( this ).dialog( "destroy" );
				}
			},
		});

		
		return false;
	});
}