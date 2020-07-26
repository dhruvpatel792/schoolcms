@extends('layouts.app')

@section('content')
<div class="container">
<div class="card card-default">
	<div class="card-header">
		Edit Teacher
	</div>
		<div class="card-body">
			@include('partials.error')
	<form action="{{route('teacher.update',$users->id)}}" method="POST">
		@CSRF

			@method('PUT')

		<div class="form-group">
			<label for="role">Role</label>
			<input type="text" id="role" class="form-control" name="role" value="{{$users->role}}" readonly="readonly">
		</div>	 
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" id="name" class="form-control" name="name" value="{{$users->name}}" autofocus="autofocus">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" id="email" class="form-control" name="email" value="{{$users->email}}">
		</div>

		<div class="form-group">
			<label for="contact_no">Contact Number</label>
			<input type="text" id="contact" class="form-control" name="contact" value="{{$users->contact}}">
		</div>
		<div class="form-group">
			<label for="address">Address</label>
			<input type="text" id="address" class="form-control" name="address" value="{{$users->address}}">
		</div>
			<div class="form-group">
				<button class="btn btn-success">
				Update Teacher
				</button>
			</div>
		</form>
		</div>
</div>
</div>
@endsection