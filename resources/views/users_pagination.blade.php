<table class="table" id="users_list">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
				
				@php
				$i=1;
				@endphp

				@foreach($userList as $user)
				<tr class="users" data-value="{{$user->id}}" style="cursor: pointer;">
					<td>{{$i++}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
				</tr>
				@endforeach
				</tbody>
			</table>
			{!! $userList->render() !!}