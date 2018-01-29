<?php #echo "<pre>"; print_r($data_service); die; ?>
@extends ('layout.admin')

@section('wrapper')
<div class="forms">
<h3 class="title1">Leader
<a href="{{ url('/'.'admin/leaders') }}" class="pull-right" style="margin-right: 10px">
	<span class="label label-warning">View All Leaders</span>
</a>
</h3>

	<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
		<div class="form-title">
			<h4><i class="fa fa-plus-circle"></i> Add New Leader</h4>
		</div>
		<div class="form-body">
			<form action="{{ url('/'.'admin/add/leader') }}" method="post" enctype="multipart/form-data"> 
			
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group"> 
				<label for="">Name</label> 
				<input type="text" class="form-control" name="txt_name" placeholder="Enter Leader Name" required> 
			</div> 
			<div class="form-group"> 
				<label for="">Desination</label> 
				<input type="text" class="form-control" name="txt_designation" placeholder="Enter Designation" required> 
			</div> 
			<div class="form-group"> 
				<label for="">Education 1</label> 
				<input type="text" class="form-control" name="txt_education1" placeholder="Enter Higher Education" required>  
			</div>
			<div class="form-group"> 
				<label for="">Education 2</label> 
				<input type="text" class="form-control" name="txt_education2" placeholder="Optional">  
			</div>
			<div class="form-group"> 
				<label for="">Introducation</label> 
				<input type="text" class="form-control" name="txt_intro" placeholder="Describe Yourself" required> 
			</div>
			<div class="form-group"> 
				<label for="">Status</label> 
				<select class="" name="txt_status" required="">
					<option value="1">Active</option>
					<option value="0" selected="">De-Active</option>
				</select> 
			</div>
			<div class="form-group"> 
				<label for="">Upload Image</label>
				<input type="file" name="image">  
			</div>
			<hr> 
			<button type="submit" class="btn btn-default">Add Now</button>
			<button type="reset" class="btn btn-primary">Reset</button> </form> 
		</div>
	</div>
</div>
@endsection


