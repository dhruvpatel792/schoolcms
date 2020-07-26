@extends('layouts.app')

@section('content')
<div class="container">
<div class="card card-default">
	<div class="card-header">
	Edit Student
	</div>
		<div class="card-body">
			@include('partials.error')
	<form action="{{route('students.update',$users->id)}}" method="POST">
		@CSRF

			@method('PUT')

		<div class="form-group">
			<label for="role">Role</label>
			<input type="text" id="role" class="form-control" name="role" value="{{$users->role}}" readonly="readonly">
		</div>

		<div class="form-group">
			<label for="enrollment">Enrollment Number</label>
			<input type="text" id="enrollment" class="form-control" name="enrollment" readonly="readonly"
			value="{{$users->enrollment}}">
		</div>

		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" id="name" class="form-control" name="name" value="{{$users->name}}" autofocus="autofocus">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" id="email" class="form-control" name="email" value="{{$users->email}}" >
		</div>

		
		<div class="form-group">
			<label for="studentsclass">Student's Class</label>
			<input type="text" id="studentsclass" class="form-control" name="studentsclass" 
			value="{{$users->studentsclass}}">
		</div>

		<div class="form-group">
			<label for="div">Division</label>
			<input type="text" id="div" class="form-control" name="div" value="{{$users->div}}">
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
				<button class="btn btn-warning" style="color:white;">
				Update Student
				</button>
			</div>
		</form>
		</div>
</div>
</div>
@endsection