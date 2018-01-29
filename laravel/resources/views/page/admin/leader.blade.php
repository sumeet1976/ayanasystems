<?php #echo "<pre>"; print_r($data_leader); die; ?>
@extends ('layout.admin')

@section('wrapper')
<div class="forms">
<h3 class="title1">Leadership
<a href="{{ url('/'.'admin/add/leader') }}" class="pull-right">
	<span class="label label-primary">Add New Leader</span>
</a>
<a href="{{ url('/'.'admin/leaders') }}" class="pull-right" style="margin-right: 10px">
	<span class="label label-warning">View All Leaders</span>
</a>
</h3>

	<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
		<div class="form-title">
			<h4><?php echo $data_leader[0]->name ?></h4>
		</div>
		<div class="form-body">
			<form action="{{ url('/'.'admin/leader') }}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="txt_id" value="{{ $data_leader[0]->id }}"> 
			<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
			<div class="form-group"> 
				<label for="">Name</label> 
				<input type="text" class="form-control" name="txt_title" value="<?php echo $data_leader[0]->name ?>" required=""> 
			</div> 
			<div class="form-group"> 
				<label for="">Designation</label> 
				<input type="text" class="form-control" name="txt_designation" value="<?php echo $data_leader[0]->designation ?>" required=""> 
			</div> 
			<div class="form-group"> 
				<label for="">Education 1</label> 
				<input type="text" class="form-control" name="txt_education1" value="<?php echo $data_leader[0]->education1 ?>" required=""> 
			</div> 
			<div class="form-group"> 
				<label for="">Education 2</label> 
				<input type="text" class="form-control" name="txt_education2" value="<?php echo $data_leader[0]->education2 ?>" required=""> 
			</div> 
			<div class="form-group"> 
				<label for="">Introduction</label> 
				<textarea class="form-control" name="txt_intro" id="txt_intro" required="">
					<?php echo $data_leader[0]->intro ?>
				</textarea> 
			</div>
			<div class="form-group"> 
				<label for="">Status</label> 
				<select class="" name="txt_status">
					<option value="1" <?php if($data_leader[0]->status == 1) echo 'selected' ?>>Active</option>
					<option value="0" <?php if($data_leader[0]->status == 0) echo 'selected' ?>>De-Active</option>
				</select> 
			</div>
			<div class="form-group"> 
				<img class="img-responsive" src="{{ asset('images/'.$data_leader[0]->image) }}">
				<label for=""><input type="file" name="image"></label> 
			</div>
			<hr> 
			<button type="submit" class="btn btn-default">Update</button>
			<button type="reset" class="btn btn-primary">Reset</button> </form> 
		</div>
	</div>
</div>
@endsection