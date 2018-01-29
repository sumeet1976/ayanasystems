<?php #echo "<pre>"; print_r($data_services); die; ?>
@extends ('layout.admin')

@section('wrapper')
<div class="tables">
<div class="table-responsive bs-example widget-shadow">
	<h4>Services</h4>
	<table class="table table-bordered"> 
		<thead> 
			<tr> 
				<th>#</th> <th>Title</th> <th>Tag Line</th> <th>Image</th> <th>Status</th> <th>Action</th>
			</tr> 
		</thead> 
		<tbody> 
		<?php for ($i=0; $i < count($data_services); $i++) { ?>
			<tr> 
				<th scope="row"><?php echo $i+1 ?></th> 
				<td><?php echo $data_services[$i]->title ?></td> 
				<td><?php echo $data_services[$i]->tag_line ?></td>
				<td><img src="{{ asset('images/'.$data_services[$i]->image) }}" class="img-responsive"></td>
				<td><span style='cursor: none' class="label <?php if($data_services[$i]->status == 1) echo 'label-success'; else echo 'label-danger' ?>">
					<?php if($data_services[$i]->status == 1) echo 'Active'; else echo 'De-Active' 
					?>
				</span></td> 
				<td>
					<a href="<?php echo url('/'.'admin/service/'.$data_services[$i]->id) ?>">
						<span class="label label-primary">Edit</span>
					</a>
					<hr style="margin: 10px">
					<a href="{{ url('/'.'delete/service/'.$data_services[$i]->id) }}" class="pull-right" style=""><span class="label label-danger"><i style="color: #000" class="fa fa-times"></i> Delete</span></a>
				</td>
			</tr> 
		<?php } ?>
		</tbody> 
	</table> 
</div>
</div>
@endsection