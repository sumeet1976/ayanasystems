@extends ('layout.admin')

<style type="text/css">
.sidebar, .sticky-header.header-section {
    display: none;
}
#page-wrapper {
    padding: 50px !important;
    margin: 0 auto !important;
    width: 75%;
}
</style>

@section('wrapper')
<div class="main-page login-page ">
				<h3 class="title1">Welcome to AdminPanel !</h3>
				
				<div class="widget-shadow">
					<div class="login-top">
						<h4><i class="fa fa-key"></i> Secured Login</h4>
					</div>
					<div class="login-body">
						<form action="{{ url('/'.'admin/ValidateLogin') }}" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
							<input type="text" class="user" name="userid" placeholder="Enter login id" required="">
							<input type="password" name="password" class="lock" placeholder="password" required="">
							<input type="submit" name="Sign In" value="Sign In">
							<div class="forgot-grid hide">
								<div class="forgot">
									<a href="#">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
				
				
			</div>
@endsection