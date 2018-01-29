<?php #echo "<pre>"; print_r($data_service); die; ?>
@extends ('layout.admin')

@section('wrapper')
<div class="forms">
<h3 class="title1">Service
<a href="{{ url('/'.'admin/add/service') }}" class="pull-right">
	<span class="label label-primary">Add New Service</span>
</a>
<a href="{{ url('/'.'admin/services') }}" class="pull-right" style="margin-right: 10px">
	<span class="label label-warning">View All Services</span>
</a>
</h3>

	<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
		<div class="form-title">
			<h4><i class="fa fa-plus-circle"></i> Add New Service</h4>
		</div>
		<div class="form-body">
			<form action="{{ url('/'.'admin/add/service') }}" method="post" enctype="multipart/form-data"> 
			
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group"> 
				<label for="">Title</label> 
				<input type="text" class="form-control" name="txt_title" placeholder="Enter Service Title" required> 
			</div> 
			<div class="form-group"> 
				<label for="">Tag Line</label> 
				<input type="text" class="form-control" name="txt_tag_line" placeholder="Enter Tag Line" required> 
			</div> 
			<div class="form-group"> 
				<label for="">Description</label> 
				<textarea class="form-control" name="txt_description" id="txt_description">
				</textarea> 
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


