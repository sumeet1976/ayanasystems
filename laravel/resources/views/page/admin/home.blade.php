@extends ('layout.admin')

@section('wrapper')
<div class="row-one hide">
	<div class="col-md-4 widget">
		<div class="stats-left ">
			<h5>Live</h5>
			<h4>Visitors</h4>
		</div>
		<div class="stats-right">
			<label> 6</label>
		</div>
		<div class="clearfix"> </div>	
	</div>
	<div class="col-md-4 widget states-mdl">
		<div class="stats-left">
			<h5>Today</h5>
			<h4>Visitors</h4>
		</div>
		<div class="stats-right">
			<label> 80</label>
		</div>
		<div class="clearfix"> </div>	
	</div>
	<div class="col-md-4 widget states-last">
		<div class="stats-left">
			<h5>Pending</h5>
			<h4>Quotes</h4>
		</div>
		<div class="stats-right">
			<label>5</label>
		</div>
		<div class="clearfix"> </div>	
	</div>
	<div class="clearfix"> </div>	
</div>
@endsection