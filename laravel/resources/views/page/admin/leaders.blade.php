<?php #echo "<pre>"; print_r($data_leaders); die; ?>
@extends ('layout.admin')

@section('wrapper')
<div class="tables">
<div class="table-responsive bs-example widget-shadow">
	<h4>Leaders
<a href="{{ url('/'.'admin/add/leader') }}" class="pull-right">
	<span class="label label-primary">Add New Leader</span>
</a>
	</h4>
	<table class="table table-bordered"> 
		<thead> 
			<tr> 
				<th>#</th> <th>Name</th> <th>Designation</th> <th>Education1</th> <th>Education2</th> <th>Intro</th> <th>Picture</th> <th>Status</th> <th>Action</th>
			</tr> 
		</thead> 
		<tbody> 
		<?php for ($i=0; $i < count($data_leaders); $i++) { ?>
			<tr> 
				<th scope="row"><?php echo $i+1 ?></th> 
				<td><?php echo $data_leaders[$i]->name ?></td> 
				<td><?php echo $data_leaders[$i]->designation ?></td>
				<td><?php echo $data_leaders[$i]->education1 ?></td>
				<td><?php echo $data_leaders[$i]->education2 ?></td>
				<td><?php echo $data_leaders[$i]->intro ?></td> 
				<td><img class="img-responsive" src="{{ asset('images/'.$data_leaders[$i]->image) }}"></td>
				<td><span class="label <?php if($data_leaders[$i]->status == 1) echo 'label-success'; else echo 'label-danger' ?>">
					<?php if($data_leaders[$i]->status == 1) echo 'Active'; else echo 'De-Active' 
					?>
				</span></td> 
				<td><span class="label label-primary"><a style="color: #fff" href="{{ url('/'.'admin/leader/edit/'.$data_leaders[$i]->id) }}"><i style="color: #000" class="fa fa-edit"></i> Edit</a></span></td>
			</tr> 
		<?php } ?>
		</tbody> 
	</table> 
</div>
</div>
@endsection