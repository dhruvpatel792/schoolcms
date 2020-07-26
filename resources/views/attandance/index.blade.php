@extends('layouts.app')

@section('content')
<div class="card card-default ">
		<div class="card-header text">
		Attandance Table
		</div>
		<form method="GET">
		@csrf
		<div class="card-body">
			<div class="row">
				<div class="col-md-4">
               		<div class="form-group">
                      <label for="date">Select Date</label>
                      <input type="date" name="date" class="date" id="date" value="<?php echo date('Y-m-d'); ?>">
               		</div>
              	</div>

				<div class="col-md-4">
              			<div class="form-group">
                            <label for="studentsclass">Select Class</label>
                            <select class="stdDiv form-control" id="std" name="studentsclass">
                                @foreach($studentsAllClass as $class)
								<option>
								{{$class->studentsclass}}
								</option>
								@endforeach
                            </select>
               			</div>
           		</div>

           		<div class="col-md-4">
               		<div class="form-group">
                            <label for="div">Select Division</label>
                            <select class="stdDiv form-control" id="div" name="div">
                                @foreach($div as $divs)
								<option>
								{{$divs->div}}
								</option>
								@endforeach
                            </select>
               		</div>
              	</div>
        	</div>
        	</div>
        </form>
		<div class="card-body">
			<table class="table">
					<thead>
					<th>Id</th>
					<th>Name</th>
					<th>Enrollment</th>
					<th>Present</th>
					</thead>
					<tbody class="studivdata">
						
					</tbody>
					
				</table>

		</div>

</div>
@endsection

@section('scripts')

<script src="js/jquery.js"></script>

<script type="text/javascript">

$(document).ready(function(){

	$(".stdDiv").on("change", function(){
		var data={
			std: $("#std").val(),
			div: $("#div").val(),
			date: $("#date").val()
		};
		$.ajax({
			url:"{{route('getstudents')}}",
			method:"GET",
			data:data,
  			success: function(response) {
  	    		$(".studivdata").html(response);
 			}
		});
	});
	$(document).on("change",".attandancecheckbox", function(){
		var id=$(this).data('id');
		var data = {
			id: id,
			std: $("#std").val(),
			div: $("#div").val(),
			date: $("#date").val(),
			isAttandance: $(this).prop('checked'),
			_token:$('meta[name="csrf-token"]').attr('content')
		};

		$.ajax({
			url:"{{route('attandance')}}",
			method:"post",
			data:data,
		});
	});
});
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script type="text/javascript">
    $(".stdDiv").select2({
  tags: true
});
</script>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection