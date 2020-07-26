@foreach($users as $user)
<tr>
	<td>{{$user->id}}</td>
	<td>{{$user->name}}</td>
	<td>{{$user->enrollment}}</td>
	<td>
		<input class="attandancecheckbox" type="checkbox" data-id="{{$user->id}}" @if($user->isAttandance) checked="" @endif>	
	</td>
</tr>
@endforeach