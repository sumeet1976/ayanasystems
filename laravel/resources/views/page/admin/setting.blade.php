@extends ('layout.admin')

@section('wrapper')
<div class="forms">
<h3 class="title1">Admin Setting</h3>
	<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
		<div class="form-title">
			<h4>Confidential Details</h4>
		</div>
		<div class="form-body">
			<form action="{{ url('/'.'admin/setting') }}" method="post">
			
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="log_id" value="{{ $log_data['login_id'] }}">
			<input type="hidden" name="password" value="{{ $log_data['password'] }}">
			<input type="hidden" name="txt_pic" value="{{ $log_data['pic'] }}">

			<div class="row">
				<div class="col-md-4">
					<div class="form-group"> 
						<label for="">Name</label> 
						<input type="text" class="form-control" name="txt_name" value="{{ $log_data['name'] }}" required=""> 
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group"> 
						<label for="">Admin Type</label> 
						<input type="text" class="form-control" name="txt_type" value="{{ $log_data['type'] }}" required=""> 
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group"> 
						<label for="">Login ID</label> 
						<input type="text" class="form-control" name="txt_log_id" value="{{ $log_data['login_id'] }}" required=""> 
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group"> 
						<label for="">Old Password</label> 
						<input type="password" class="form-control" name="txt_password" value="" required="" minlength="5" maxlength="20"> 
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group"> 
						<label for="">New Password</label> 
						<input type="password" class="form-control" name="txt_new_password" value="" minlength="5" maxlength="20"> 
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group"> 
						<label for="">Email</label> 
						<input type="email" class="form-control" name="txt_email" value="{{ $log_data['email'] }}" required=""> 
					</div>
				</div>
			</div> 
			 <hr>
			 <div class="row">
			 	<div class="col-md-12">
			 		<button type="submit" class="btn btn-default">Update</button>
					<button type="reset" class="btn btn-primary">Reset</button>
			 	</div>
			 </div>
			 </form> 
		</div>
	</div>
</div>
@endsection