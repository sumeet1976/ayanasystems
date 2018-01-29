<?php #echo "<pre>"; print_r($data_about); die; ?>
@extends ('layout.admin')

@section('wrapper')
<div class="forms">
<h3 class="title1">About Us</h3>
	
	<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
		<div class="form-title">
			<h4><?php echo $data_about[0]->title ?></h4>
		</div>
		<div class="form-body">
			<form action="{{ url('/'.'admin/about') }}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="txt_id" value="{{ $data_about[0]->id }}"> 
			<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
			<div class="form-group"> 
				<label for="">Title</label> 
				<input type="text" class="form-control" name="txt_title" value="<?php echo $data_about[0]->title ?>" required=""> 
			</div> 
			<div class="form-group"> 
				<label for="">Description</label> 
				<textarea class="form-control" name="txt_description" id="txt_description" required="">
					<?php echo $data_about[0]->description ?>
				</textarea> 
			</div>
			<div class="form-group"> 
				<img class="img-responsive" src="{{ asset('images/'.$data_about[0]->image) }}">
				<label for=""><input type="file" name="image"></label>  
			</div>
			<hr> 
			<button type="submit" class="btn btn-default">Update</button>
			<button type="reset" class="btn btn-primary">Reset</button> </form> 
		</div>
	</div>
</div>
@endsection