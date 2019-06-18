	/*
	* Script : Fetch User Information
	* Created Date : 8-Jun-2019
	* Developed By : Sandip Sanghani
	* Description : This script is used for Managing user Module
	*/
	
	$(document).ready(function()
	{
		$.ajaxSetup({
			headers: 
			{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		
		// Description : When user is click on user listing row on left side this user information is display.
		$(document).on("click",".users",function()
		{
			//for get user id
			var id = $(this).attr("data-value");
			//AJAX call for fetch single user detail and display on left side
			$.ajax({
						type:'GET',
						url:'users/'+id,
						success:function(data)
						{
							$("#user_id").text(data.id);
							$("#user_name").text(data.name);
							$("#user_email").text(data.email);
							$("#user_created").text(data.created_at);
							$("#user_updated").text(data.updated_at	);
						},
						error: function() {
							alert('Error occurs!');
					    }
				});
		});
		
		//Description : This function is used for getting updated record
		function getUpdatedRecords()
		{
			//get first user id from list
			var id = $("#users_list").find('tbody tr:first').attr('data-value');
			//AJAX call for fetching user information
			$.ajax({
						type:'GET',
						url:'/users',
						success:function(data)
						{
							//Compare first user id on page and response first user id is same or not.If both id is not same updated record set first.
							if(data.data[0].id != id){
								var tableData = "";
								for (var i=0;i<data.data.length;i++)
								{
									tableData += '<tr class="users" data-value="'+data.data[i].id+'" style="cursor: pointer;">'+
									'<td>'+(i+1)+'</td>'+
									'<td>'+data.data[i].name+'</td>'+
									'<td>'+data.data[i].email+'</td></tr>';
								}
							
								$("#users_list").find('tbody').html(tableData);	
							}
						},
						error: function() {
							alert('Error occurs!');
					    }
					});
		}
		//This is used to get query string from URL.
		var getUrlParameter = function getUrlParameter(sParam) {
			var sPageURL = window.location.search.substring(1),
				sURLVariables = sPageURL.split('&'),
				sParameterName,
				i;

			for (i = 0; i < sURLVariables.length; i++) {
				sParameterName = sURLVariables[i].split('=');

				if (sParameterName[0] === sParam) {
					return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
				}
			}
		};

		var page = getUrlParameter('page');
		
		//Condition for check user on first page or not.
		if (page == 1 || page == undefined) {
			//This method is used for call getUpdatedRecords() every 5 seconds
			setInterval(function(){getUpdatedRecords();}, 5000);
		}
	});