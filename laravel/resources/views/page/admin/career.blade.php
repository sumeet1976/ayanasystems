<?php 
$data = [];
foreach ($data_quotes['career'] as $key => $value) {
	foreach ($value as $key => $value) {
		foreach ($value as $key => $value) {
			$temp_arr[$key] = $value;
		}
		$data[] = $temp_arr;
	}
}
#echo "<pre>";
#print_r($data); die;
?>

@extends ('layout.admin')

@section('wrapper')
<div class="tables">
<h3>Career Requests</h3>
<div class="table-responsive bs-example widget-shadow">
	<table class="table table-bordered"> 
		<thead> 
			<tr> 
				<th>#</th> <th>Name</th> <th>Email</th> <th>Contact</th> <th>Skills</th> <th>Intro</th> <th>Status</th> <th>Action</th>
			</tr> 
		</thead> 
		<tbody> 
		<?php $i=0; foreach ($data as $key => $value) { ?>
			<tr> 
				<th scope="row"><?php echo ++$i ?></th> 
				<td>{{ $value['name'] }}</td> 
				<td>{{ $value['email'] }}</td>
				<td>{{ $value['contact'] }}</td>
				<td>{{ $value['skills'] }}</td>
				<td>{{ $value['about'] }}</td>
				<td><span class="label <?php if($value['status'] == 1) echo 'label-success'; else echo 'label-danger' ?>">
					<a style="color:#000" href="{{ url('/'.'update/status/query/'.$value['id'].'/'.$value['status']) }}">
						<?php if($value['status'] == 1) echo 'Active'; else echo 'De-Active' ?>
					</a>
				</span></td> 
				<td><span class="label label-danger"><a style="color: #fff" href="{{ url('/'.'delete/query/'.$value['id']) }}" class="confirmation"><i style="color: #000" class="fa fa-times"></i> Delete</a></span> 

				<?php if($value['resume'] != '') { ?>
				<hr style="margin: 10px"> 
				<span class="label label-primary"><a style="color: #fff" href="{{ url('/'.'resume/'.$value['resume']) }}" target="_blank"><i style="color: #000" class="fa fa-edit"></i> Resume</a></span>
				<?php } ?>

				</td>
			</tr> 
		<?php } ?>
		</tbody> 
	</table> 
</div>
</div>
@endsection