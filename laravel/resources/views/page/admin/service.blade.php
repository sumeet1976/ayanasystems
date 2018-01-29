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
			<h4><?php echo $data_service[0]->title ?></h4>
		</div>
		<div class="form-body">
			<form action="{{ url('/'.'admin/service') }}" method="post" enctype="multipart/form-data"> 
			<input type="hidden" name="txt_id" value="{{ $data_service[0]->id }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group"> 
				<label for="">Title</label> 
				<input type="text" class="form-control" name="txt_title" value="<?php echo $data_service[0]->title ?>" required> 
			</div> 
			<div class="form-group"> 
				<label for="">Tag Line</label> 
				<input type="text" class="form-control" name="txt_tag_line" value="<?php echo $data_service[0]->tag_line ?>" required> 
			</div> 
			<div class="form-group"> 
				<label for="">Description</label> 
				<textarea class="form-control" name="txt_description" id="txt_description">
					<?php echo $data_service[0]->description ?>
				</textarea> 
			</div>
			<div class="form-group"> 
				<label for="">Status</label> 
				<select class="" name="txt_status">
					<option value="1" <?php if($data_service[0]->status == 1) echo 'selected' ?>>Active</option>
					<option value="0" <?php if($data_service[0]->status == 0) echo 'selected' ?>>De-Active</option>
				</select> 
			</div>
			<div class="form-group"> 
				<img class="img-responsive" src="{{ asset('images/'.$data_service[0]->image) }}">
				<label for=""><input type="file" name="image"></label>  
			</div>
			<hr> 
			<button type="submit" class="btn btn-default">Update</button>
			<button type="reset" class="btn btn-primary">Reset</button> </form> 
		</div>
	</div>
</div>
@endsection


