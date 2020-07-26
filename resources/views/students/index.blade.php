@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
	 <a href="{{route('studentregister')}}" class="btn btn-warning" style="color:white;">Add Student</a>
</div>

	<div class="card card-default">
		<div class="card-header text">
		Students Info
		</div>
			<div class="card-body">
				<table class="table">
					<thead>
					<th>Id</th>
					<th>Name</th>
					<th>Enrollment</th>
					<th>Class</th>
					<th>Division</th>
					<th>Action</th>
				</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<td>
									{{$user->id}}
								</td>
								<td>
									{{$user->name}}
								</td>
								<td>
									{{$user->enrollment}}
								</td>
								<td>
									{{$user->studentsclass}}
								</td>
								<td>
									{{$user->div}}
								</td>
							
								<td>
									<a href="{{route('students.show',$user->id)}}" class="btn btn-info btn-sm">Details</a>
									<a href="{{route('students.edit',$user->id)}}" class="btn btn-info btn-sm">Edit</a>
									<button class="btn btn-danger btn-sm" onclick="handleDeleteStudent({{$user->id}})">Delete</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					
				</table>
				{{ $users->links() }}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="" method="POST" id="deleteStudent">
    @CSRF
    @method('DELETE')

    	<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center text-bold">
        	Are you sure you want to delete this Student?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No,Go back</button>
        <button type="submit" class="btn btn-primary btn-danger">Yes,Delete</button>
      </div>
    </div>
    </form>
  </div>
</div>

			</div>
	</div>
@endsection

@section('scripts')
<script type="text/javascript">
	function handleDeleteStudent(id){
		
		var form=document.getElementById('deleteStudent')
		form.action='/students/' + id
		console.log('deleting',form)
		$('#deleteModal').modal('show')
	}
</script>
@endsection