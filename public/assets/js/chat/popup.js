$(document).ready(function() {

	//chat for respective code
	function openChatForm(code, _token) {
		$('#chat_messages_code').val(code);
		$('#codeChatBox').text(code);
		$('#chat_code').val(code);
		
		//form data
		var chat_form_data = new FormData();
		chat_form_data.append('chat_code', code);
		chat_form_data.append('_token', _token);
		
		$.ajax({
			type: "POST",
			url: "../petty_cash/chat/invoice_chat",
			contentType: false,
			processData: false,
			data: chat_form_data,
		}).done(function(chat_data){
			$('#chat_messages').empty();
			
			//chats
			if(chat_data["chats"].length > 0){
				jQuery.each(chat_data["chats"], function(index, item) {
					if(item["userid"] == chat_data["current_user_id"]){
						//files
						var file_name = item["file"];
						if(file_name!='null' && file_name!=null && file_name!=''){
							var file_str = '<a class="pull-right" href="../storage/chat/'+file_name+'" target="_blank" style="margin-left: 5px;"><i class="fa fa-file-o icon-large"></i></a>';
						}else{
							var file_str = '';
						}
						
						$('#chat_messages').append(
			                '<li class="right clearfix">'+
		                    	'<span class="chat-img pull-right">'+
		                        	'<img src="../assets/images/user.png" alt="User Avatar" class="img-circle" style="width: 50px;height: 50px;" />'+
		                    	'</span>'+
		                        '<div class="chat-body clearfix">'+
		                            '<div class="popup-header">'+
		                                '<small class="text-muted">'+item["timing"]+'</small>'+
		                                '<strong class="pull-right primary-font">'+item["employee_id"] +' - '+ item["employee_name"]+'</strong>'+
		                            '</div>'+
		                            '<p style="text-align:right;">'+file_str+item["message"]+'</span></p>'+
		                        '</div>'+
	                        '</li>'
						);
					}else{
						
						//files
						var file_name = item["file"];
						if(file_name!='null' && file_name!=null && file_name!=''){
							var file_str = '<a href="../storage/chat/'+file_name+'" target="_blank"><i class="fa fa-file-o icon-large"></i></a>&nbsp;';
						}else{
							var file_str = '';
						}
						
						$('#chat_messages').append(
		                    '<li class="left clearfix">'+
	                            '<span class="chat-img pull-left">'+
	                                '<img src="../assets/images/user.png" alt="User Avatar" class="img-circle" style="width: 50px;height: 50px;" />'+
	                            '</span>'+
	                            '<div class="chat-body clearfix">'+
	                                '<div class="popup-header">'+
	                                    '<strong class="primary-font">'+item["employee_id"] +' - '+ item["employee_name"]+'</strong>'+ 
	                                    '<small class="pull-right text-muted">'+item["timing"]+'</small>'+
	                                '</div>'+
	                                '<p>'+file_str+item["message"]+'</p>'+
	                            '</div>'+
		                    '</li>'    
						);
					} 
				});
			}else{//no chats
				$('#chat_messages').append('<li class="left clearfix">no chat avialable.</li>');
			}
		});
	}
	
	//purchaser open chat box
	$('#purchaserTbl > tbody').on('click','.chat-icon',function(){
		var code = $(this).closest('tr').find('.code').text();
		var _token = $('input[name="_token"]').val();
		
		//chatbox
		openChatForm(code, _token);
		document.getElementById("my-chat-form").style.display = "block";
		
		//scroll start from bottom
		$(".panel-body").animate({ scrollTop: 20000000 }, "slow");
	});

	//PM open chat box
	$('#projectManagerTbl > tbody').on('click','.chat-icon',function(){
		var code = $(this).closest('tr').find('.code').text();
		var _token = $('input[name="_token"]').val();
		
		//chatbox
		openChatForm(code, _token);
		document.getElementById("my-chat-form").style.display = "block";
		
		//scroll start from bottom
		$(".panel-body").animate({ scrollTop: 20000000 }, "slow");
	});
	
	//Project accounting open chat box
	$('#projectAccountingTbl > tbody').on('click','.chat-icon',function(){
		var code = $(this).closest('tr').find('.code').text();
		var _token = $('input[name="_token"]').val();
		
		//chatbox
		openChatForm(code, _token);
		document.getElementById("my-chat-form").style.display = "block";
		
		//scroll start from bottom
		$(".panel-body").animate({ scrollTop: 20000000 }, "slow");
	});

	//Main accounting open chat box
	$('#mainAccountingTbl > tbody').on('click','.chat-icon',function(){
		var code = $(this).closest('tr').find('.code').text();
		var _token = $('input[name="_token"]').val();
		
		//chatbox
		openChatForm(code, _token);
		document.getElementById("my-chat-form").style.display = "block";
		
		//scroll start from bottom
		$(".panel-body").animate({ scrollTop: 20000000 }, "slow");
	});
	
	//send chatbox message
	$('#chat_submit').click(function(){
		var _token = $('input[name="_token"]').val();
		var message = $.trim($('#chat_message').val());
		var code = $.trim($('#chat_code').val());
		var file = $('#chat_file')[0].files[0];
		
		if(message!=''){
			//form data
			var chat_send_form_data = new FormData();
			chat_send_form_data.append('_token', _token);
			chat_send_form_data.append('send_chat_code', code);
			chat_send_form_data.append('send_chat_message', message);
			chat_send_form_data.append('send_chat_file', file);
			
			$.ajax({
				type: "POST",
				url: "../petty_cash/chat/add_invoice_chat",
				contentType: false,
				processData: false,
				data: chat_send_form_data,
			}).done(function(data){
				if(data == 'success'){
					//clear field
    				$('#chat_message,#chat_file').val('');
    				
    				//chat refresh
    				openChatForm(code,_token);
    				
    				//scroll start from bottom
    				$(".panel-body").animate({ scrollTop: 20000000 }, "slow");
				}else{
					swal("Something is wrong!", "", "warning");
				}
			});
		}else{
			swal("Enter message!", "", "warning");
		}
	});

	//close chat box
	$('#closeChatBox').click(function(){
		document.getElementById("my-chat-form").style.display = "none";
	});
	
	//refresh chatbox message
	$('#refreshChatBox').click(function(){
		var code = $.trim($('#chat_code').val());
		var _token = $('input[name="_token"]').val();
		
		//chatbox
		openChatForm(code, _token);
		document.getElementById("my-chat-form").style.display = "block";
		
		//scroll start from bottom
		$(".panel-body").animate({ scrollTop: 20000000 }, "slow");
	});
});