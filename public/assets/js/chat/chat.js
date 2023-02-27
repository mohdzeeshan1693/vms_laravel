$(document).ready(function() {

	//Chat User Click
	$('.chatting > .chat_user_click').click(function(){
		
		//Active user 
		$('.chatting').find('.chat_user_click').removeClass('active_chat');
		$(this).addClass('active_chat');

		//Assign 
		var name = $(this).find('.chat_user_name').text();
		var email = $(this).find('.chat_user_email').text();
		var from_user = $('#current_user_id').val();
		var to_user = $(this).find('.chat_user_id').val();
		var tender_id = $('#select_tender').val();
		var _token = $('input[name="_token"]').val();
		
		$('#selected_user_name').text(name);
		$('#selected_user_email').text(email);
		$('#selected_user_id').val(to_user);

		//Fetch 
		fetch_chat(from_user, to_user, tender_id, _token);
	});

	//Onchange Tender
	$('#select_tender').change(function(){
		var from_user = $('#current_user_id').val();
		var to_user = $('#selected_user_id').val();
		var tender_id = $(this).val();
		var _token = $('input[name="_token"]').val();

		//Fetch
		fetch_chat(from_user, to_user, tender_id, _token);
	});

	//Refresh Chat
	$('#chat-refresh').click(function(){
		var from_user = $('#current_user_id').val();
		var to_user = $('#selected_user_id').val();
		var tender_id = $('#select_tender').val();
		var _token = $('input[name="_token"]').val();

		if($.trim(tender_id) == ''){
			swal("Attention!", "Please select a tender to send!", "error");
			return false;
		}

		if($.trim(to_user) == ''){
			swal("Attention!", "Please select a user to send!", "error");
			return false;
		}

		//Fetch
		fetch_chat(from_user, to_user, tender_id, _token);
	});

	/* //Chat Send
	$('#chat_sendx').click(function(){
		var message = $('#chat_message').val();
		var from_user = $('#current_user_id').val();
		var to_user = $('#selected_user_id').val();
		var tender_id = $('#select_tender').val();
		var _token = $('input[name="_token"]').val();
		var file = $('#file')[0].files[0];

		//Send
		send_message(message, from_user, to_user, tender_id, _token, file);
	}); */

	$('#chat_form').submit(function(e) {
		e.preventDefault();

		var message = $('#chat_message').val();
		var from_user = $('#current_user_id').val();
		var to_user = $('#selected_user_id').val();
		var tender_id = $('#select_tender').val();
		var _token = $('input[name="_token"]').val();
		var files = $('#files').val();

		if($.trim(message) == '' && $.trim(files) == ''){
			swal("Attention!", "Either message or file can not be empty!", "error");
			return false;
		}
		
		if($.trim(to_user) == ''){
			swal("Attention!", "Select a user to chat !", "error");
			return false;
		}

		if($.trim(tender_id) == ''){
			swal("Attention!", "Select a tender to chat !", "error");
			return false;
		}

		var formData = new FormData($('#chat_form')[0]);
		$.ajax({
			type: "POST",
			url: "../chat",
			contentType: false,
			processData: false,
			data: formData,
			beforeSend: function(){
				$('#chat_send').attr('disabled','disabled');
			},
		}).done(function(data){
			$('#chat_send').removeAttr('disabled');
			if(data['status'] == 'success'){
				$('#files').val('');
				$('#chat_message').val('');
				
				//Fetch
				fetch_chat(from_user, to_user, tender_id, _token);
			}else{
				alert(data['message']);
			}
		});
	});

	/* //Onclick Enter to send message
	$('inputx').on('keypress', function(e) {
		var code = e.keyCode || e.which;
		if(code==13){ //Enter key code 
			var message = $('#chat_message').val();
			var from_user = $('#current_user_id').val();
			var to_user = $('#selected_user_id').val();
			var tender_id = $('#select_tender').val();
			var _token = $('input[name="_token"]').val();
			var file = $('#file')[0].files[0];

			//Send
			send_message(message, from_user, to_user, tender_id, _token, file);
		}
	}); */

	//Initilize Pusher
	// Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;
	var pusher = new Pusher('cba8890acb60d76da770', {
		cluster: 'ap2',
	});
  
	//fetch from pusher
	var channel = pusher.subscribe('chat');
	channel.bind('message', function(data) {
		var message = $('#chat_message').val();
		var from_user = $('#current_user_id').val();
		var to_user = $('#selected_user_id').val();
		var tender_id = $('#select_tender').val();
		var _token = $('input[name="_token"]').val();

		//Send
		if((from_user == data["chat"]["to_id"] || from_user == data["chat"]["from_id"]) && tender_id == data["chat"]["tender_id"]){
			fetch_chat(from_user, to_user, tender_id, _token);
		}

		//unseen message function
		unseenMessages();
	}); 

	//Seen event for chat
	channel.bind('seen', function(data) {
		var current_user = $('#current_user_id').val();
		var tender_id = $('#select_tender').val();
		
		if((current_user == data["seenInfo"]["user_id"])){
			unseenMessages();
		}
	});

	//notification message click
	$('#unseen_messages').on('click','li',function(){
		var tender_id = $(this).find('.tender_id').val();
		var user_id = $(this).find('.from_id').val();

		window.location.href = "chat?tender_id="+tender_id+"&user_id="+user_id;
	});
	
	/******************** Functions  ***********************/
	function fetch_chat (from_user, to_user, tender_id, _token){
		var chat_fetch_data = new FormData();
		chat_fetch_data.append('chat_to', to_user);
		chat_fetch_data.append('chat_tender_id', tender_id);
		chat_fetch_data.append('_token', _token); 

		$.ajax({
			type: "POST",
			url: "../chat/exist-chat",
			contentType: false,
			processData: false,
			data: chat_fetch_data,
		}).done(function(data){
			//refresh unseen message
			unseenMessages();

			$('#chat_append_area').empty();
			if(data.length > 0){
				$.each(data, function(index, itemData) {
					
					var chat_files = '';
					if(itemData["chat_files"].length > 0){
						$.each(itemData["chat_files"], function(index, file) {
							
							if(extensinFile(file["file_name"].toLowerCase()) =='image'){
								chat_files += '<a href="'+file["chat_file_url"]+'" target="_blank" style="background: transparent;border-color: transparent;display: contents;"><img src="'+file["chat_file_url"]+'" class="w150 img-thumbnail" style="margin:2px;height:100px;"></a>';
							}else if(extensinFile(file["file_name"].toLowerCase()) =='zip'){
								chat_files += '<a href="'+file["chat_file_url"]+'" target="_blank">'+
										'<div class="icon"><i class="fa fa-file-archive-o text-primary"></i></div>'+
										'<div class="file-name">'+
											'<p class="mb-0 text-muted" title="'+file["file_name"]+'">'+file["file_name"].substr(-12)+'</p>'+
										'</div>'+
									'</a>';
							}else if(extensinFile(file["file_name"].toLowerCase()) =='pdf'){
								chat_files += '<a href="'+file["chat_file_url"]+'" target="_blank">'+
										'<div class="icon"><i class="fa fa-file-pdf-o text-primary"></i></div>'+
										'<div class="file-name">'+
											'<p class="mb-0 text-muted" title="'+file["file_name"]+'">'+file["file_name"].substr(-12)+'</p>'+
										'</div>'+
									'</a>';
							}else if(extensinFile(file["file_name"].toLowerCase()) =='word'){
								chat_files += '<a href="'+file["chat_file_url"]+'" target="_blank">'+
										'<div class="icon"><i class="fa fa-file-word-o text-primary"></i></div>'+
										'<div class="file-name">'+
											'<p class="mb-0 text-muted" title="'+file["file_name"]+'">'+file["file_name"].substr(-12)+'</p>'+
										'</div>'+
									'</a>';
							}else if(extensinFile(file["file_name"].toLowerCase()) =='excel'){
								chat_files += '<a href="'+file["chat_file_url"]+'" target="_blank">'+
										'<div class="icon"><i class="fa fa-file-excel-o text-primary"></i></div>'+
										'<div class="file-name">'+
											'<p class="mb-0 text-muted" title="'+file["file_name"]+'">'+file["file_name"].substr(-12)+'</p>'+
										'</div>'+
									'</a>';
							}else if(extensinFile(file["file_name"].toLowerCase()) =='excel'){
								chat_files += '<a href="'+file["chat_file_url"]+'" target="_blank">'+
										'<div class="icon"><i class="fa fa-file-video-o text-primary"></i></div>'+
										'<div class="file-name">'+
											'<p class="mb-0 text-muted" title="'+file["file_name"]+'">'+file["file_name"].substr(-12)+'</p>'+
										'</div>'+
									'</a>';
							}else{
								chat_files += '<a href="'+file["chat_file_url"]+'" target="_blank">'+
										'<div class="icon"><i class="fa fa-file-o text-primary"></i></div>'+
										'<div class="file-name">'+
											'<p class="mb-0 text-muted" title="'+file["file_name"]+'">'+file["file_name"].substr(-12)+'</p>'+
										'</div>'+
									'</a>';
							}
						});
					}

					//if message
					var message = '';
					if(itemData["message"] != null){
						message = '<p class="bg-light-gray">'+itemData["message"]+'</p>';
					} 

					if(itemData['from_id'] == from_user){
						if(itemData["seen"] == 1){
							var seen = '&nbsp;<i class="fa fa-check"></i><i class="fa fa-check"></i>';
						}else{
							var seen = '&nbsp;<i class="fa fa-check"></i>';
						}

						$('#chat_append_area').append(
							'<li class="my-message">'+
								'<div class="message">'+message+
									'<div class="file_folder">'+chat_files+'</div>'+
									'<span class="time">'+itemData["date"]+seen+'</span>'+
								'</div>'+
							'</li>'
						);
					}else{	
						$('#chat_append_area').append(
							'<li class="other-message">'+
								'<img class="avatar mr-3" src="'+itemData["get_from_user"]["profile_photo_url"]+'">'+
								'<div class="message">'+message+
									'<div class="file_folder">'+chat_files+'</div>'+
									'<span class="time" >'+itemData["date"]+' </span>'+
								'</div>'+
							'</li>'
						);
					}
				});

				//Scroll Top
				setTimeout(function() { 
					$("#chat_append_area").animate({ scrollTop: 20000000 }, "slow");
				}, 1000);
			}
		});
	}

	//fetch unseen messages
	unseenMessages();
	function unseenMessages(){
		var unseen_chat_data = new FormData();
		unseen_chat_data.append('_token', $('meta[name="csrf-token"]').attr('content')); 
		
		$.ajax({
			type: "POST",
			url: "chat/unseen-message",
			contentType: false,
			processData: false,
			data: unseen_chat_data,
		}).done(function(data){
			$('#unseen_messages').empty();
			$('#unseen_message_count').text(data.length);
			
			if(data.length > 0){
				$.each(data, function(index, itemData) {
					$('#unseen_messages').append(
						'<li>'+
							'<div class="feeds-left">'+
								'<div class="media">'+
									'<img class="media-object" src="'+itemData["get_from_user"]["profile_photo_url"]+'" alt="'+itemData["get_from_user"]["name"]+'" style="border-radius: 40px;">'+
								'</div>'+
							'</div>'+
							'<div class="feeds-body" style="padding-left: 10px;">'+
								'<h4 class="title text-danger">'+itemData["get_from_user"]["name"]+' <small class="float-right text-muted">'+itemData["date"]+'</small></h4>'+
								'<small style="min-width:200px;"><span class="badge badge-default">Tender</span>&nbsp;'+itemData["get_tender"]["number"]+' - '+itemData["get_tender"]["name"]+'</small>'+
								'<small style="min-width:200px;"><span class="badge badge-info">Message</span>&nbsp;'+itemData["message"]+'</small>'+
								'<input type="hidden" name="tender_id" class="tender_id" value="'+itemData["get_tender"]["id"]+'" />'+
								'<input type="hidden" name="from_id" class="from_id" value="'+itemData["from_id"]+'" />'+
							'</div>'+
						'</li>'
					);
				});
			}else{
				$('#unseen_messages').append(
					'<li>'+
						'<div class="feeds-body" style="padding-left: 10px;">'+
							'<small style="min-width:260px;">No unread messages found..</small>'+
						'</div>'+
					'</li>'
				);
			}
		});
	}

	//click from the header notification 
	autoselect();
	function autoselect(){
		const queryString = window.location.search;
		const urlParams = new URLSearchParams(queryString);
		var tender_id = urlParams.get('tender_id');
		var user_id = urlParams.get('user_id');

		if(tender_id != null){
			$('#select_tender').val(tender_id).trigger('change'); 
			$('.chatting').find('[data-user-id="'+user_id+'"]').click();
		}
	}

	//get file extension
	function extensinFile(file) {
		var extension = file.substr( (file.lastIndexOf('.') +1) );
		switch(extension) {
			case 'jpg':
			case 'jpeg':
			case 'png':
			case 'gif':
			case 'tif':
			case 'webp':
				return 'image';
				break;
			case 'flv':
			case 'mp4':
			case 'mov':
			case 'avi':
			case 'wmv':
				return 'video';
				break;
			case 'zip':
			case 'rar':
			case 'tgz':
			case 'gz':
				return 'zip';
				break;
			case 'pdf':
				return 'pdf';
				break;
			case 'doc':
			case 'docx':
				return 'word';
				break;
			case 'xlx':
			case 'xlsx':
			case 'csv':
				return 'excel';
				break;
			default:
				return 'unknown';
				break;
		}
	};

	//Create Group 
	$('#create_group_modal_form').submit(function(e) {
		e.preventDefault();
		
		var _token = $('input[name="_token"]').val();
		var group_name = $('#create_group_name').val();
		
		var group_users = [];
		$('#create_group_table tbody tr').each(function(){
			var userid = $(this).find('.group_user').val();
			group_users.push(userid);
		});

		if($.trim(group_name) == ''){
			swal("Attention!", "Please enter group name!", "error");
			return false;
		}

		if (findDublicatesNumbersFromArray(group_users) > 0) {
			swal("Attention!", "Group users can be duplicate!", "error");
			return false;
		}

		if ($.inArray('', group_users) > -1) {
			swal("Attention!", "Please choose an users!", "error");
			return false;
		}

		var create_group_data = new FormData();
		create_group_data.append('group_name', group_name);
		create_group_data.append('group_users', group_users);
		create_group_data.append('_token', _token);

		$.ajax({
			type: "POST",
			url: "../chat/create-group",
			contentType: false,
			processData: false,
			data: create_group_data,
			beforeSend: function(){ $('#submit').attr('disabled','disabled'); },
		}).done(function(data){
			$('#submit').removeAttr('disabled');
			if(data['status'] == 'error'){
				swal("Attention!", data['message']);
				return false;
			}else{
				location.reload(true);
			}
		});
	});

	//Check duplicate user selection
	function findDublicatesNumbersFromArray(a) {
		var d = [];
		for (let i = 0; i < a.length; i++) {
			var ct = a[i];
			var cmt = 0;
			for(var x = 0; x<a.length;++x) {
				if(ct === a[x]) {
					cmt++
					if(cmt > 1) {
						d.push(a[i])
					}
				}
			}
		}

		return (d.filter((i, ix)=> d.indexOf(i) === ix)).length;
	}



	//Send Message
	/* function send_message(message, from_user, to_user, tender_id, _token, file){
		if($.trim(message) == ''){
			swal("Attention!", "Message can not be empty!", "error");
			return false;
		}
		
		if($.trim(to_user) == ''){
			swal("Attention!", "Select a user to chat !", "error");
			return false;
		}

		if($.trim(tender_id) == ''){
			swal("Attention!", "Select a tender to chat !", "error");
			return false;
		}
	
		//form data
		var chat_form_data = new FormData();
		chat_form_data.append('chat_message', message);
		chat_form_data.append('chat_to', to_user);
		chat_form_data.append('chat_tender_id', tender_id);
		chat_form_data.append('_token', _token);
		chat_form_data.append('file', file);

		$.ajax({
			type: "POST",
			url: "../chat",
			contentType: false,
			processData: false,
			data: chat_form_data,
		}).done(function(data){
			if(data['status'] == 'success'){
				$('#chat_message').val('');
				
				//Fetch
				fetch_chat(from_user, to_user, tender_id, _token);
			}else{
				alert(data['message']);
			}
		});
	} */
});