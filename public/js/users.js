	/*
	* Script : Fetch User Information
	* Created Date : 8-Jun-2019
	* Developed By : Sandip Sanghani
	* Description : This script is used for Managing user Module
	*/
	
	$(document).ready(function()
	{
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
		
		//This method is used for call fetch_data() every 5 seconds
		setInterval(function(){
			var page = $("#hidden_page").val();
			if (page > 0) {
				fetch_data(page);
			}
		}, 5000);

		//code for pagination
		$(document).on('click','.pagination a', function(event){
			event.preventDefault();
			page = $(this).attr('href').split('page=')[1];
			$("#hidden_page").val(page);
			fetch_data(page);
		});
		
		//code for search users from list
		$(document).on('keyup','input[name="q"]', function(event){
			event.preventDefault();
			$("#hidden_page").val(1);
			fetch_data(1);
		});
		
		//function for fetch data from database
		function fetch_data(page)
		{
			var q = $('input[name="q"]').val();
			$.ajax({
				url:"users?page="+page+"&q="+q,
				success:function(data){
					$("#users_table").html(data);
				},
				error: function(){
					alert('Error occurs!');
				}
			});
		}
	});