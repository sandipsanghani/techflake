<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<style>
		.information-table{margin-top:40px;position: fixed;width: 46%;}
		</style>
    </head>
    <body>
	<div class="container-fluid">
	<div class="col-md-6">
		<table class="table information-table" width="100%">
			<thead>
			  <tr>
				<td colspan="2"><center><h2>User Information</h2></center></td>
			  </tr>
			</thead>
			<tbody>
				<tr>
					<th>ID</th>
					<td id="user_id"></td>
				</tr>
				<tr>
					<th>Name</th>
					<td id="user_name"></td>
				</tr>
				<tr>
					<th>Email</th>
					<td id="user_email"></td>
				</tr>
				<tr>
					<th>Created Date</th>
					<td id="user_created"></td>
				</tr>
				<tr>
					<th>Updated Date</th>
					<td id="user_updated"></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-6">
				<div class="input-group">
					<input type="text" class="form-control" value="" name="q" placeholder="Search users"> 
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default" id="src_btn">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
			<div id="users_table">
				@include('users_pagination')
			</div>
			<input type="hidden" value="1" id="hidden_page" />
		</div>
	</div>
    </body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<!-- 
	* users.js file is used for define custom js
	* js file is created in public/js folder
	-->
	<script type="text/javascript" src="{{asset('js/users.js')}}"></script>
</html>
