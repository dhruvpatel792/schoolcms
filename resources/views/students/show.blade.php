@extends('layouts.app')

@section('content')
	<div class="card card-default">
		<div class="card-header text">
		Student Info
		</div>
			<div class="card-body">
				<table class="table">
					<thead>
					<th>Id</th>
					<th>Name</th>
					<th>Enrollment</th>
					<th>Class</th>
					<th>Division</th>
					<th>Email</th>
					<th>Contact</th>
					<th>Address</th>
					</thead>
						<tbody>
							<tr>
								<td>
									{{$users->id}}
								</td>
								<td>
									{{$users->name}}
								</td>
								<td>
									{{$users->enrollment}}
								</td>
								<td>
									{{$users->studentsclass}}
								</td>
								<td>
									{{$users->div}}
								</td>
								<td>
									{{$users->email}}
								</td>
								<td>
									{{$users->contact}}
								</td>
								<td>
									{{$users->address}}
								</td>
							</tr>
						</tbody>
				</table>
			</div>
			<a href="{{ url()->previous() }}" class="btn btn-info">Go Back</a>
	</div>
@endsection

