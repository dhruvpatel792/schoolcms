@extends('layouts.app')

@section('content')


<div class="d-flex justify-content-end mb-2">

		<a href="{{route('register')}}" class="btn btn-success">Add Teacher</a>

</div>
	<div class="card card-default">

		<div class="card-header text">

		Teachers Info

		</div>
			<div class="card-body">
				<table class="table">
					<thead>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Contact</th>
					<th>Address</th>
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
									{{$user->email}}
								</td>
								<td>
									{{$user->contact}}
								</td>
								<td>
									{{$user->address}}
								</td>
								<td>
									<a href="{{route('teacher.edit',$user->id)}}" class="btn btn-info btn-sm">Edit</a>
									<button class="btn btn-danger btn-sm" onclick="handleDelete({{$user->id}})">Delete</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					
				</table>
				{{$users->links() }}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="" method="POST" id="deleteTeacherForm">
    @CSRF
    @method('DELETE')

    	<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Teacher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center text-bold">
        	Are you sure you want to delete this Teacher?
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
	function handleDelete(id){
		
		var form=document.getElementById('deleteTeacherForm')
		form.action='/teachers/' + id
		console.log('deleting',form)
		$('#deleteModal').modal('show')
	}
</script>
@endsection