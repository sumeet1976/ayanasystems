<?php #echo "<pre>"; print_r($data_banners); die; ?>
@extends ('layout.admin')

@section('wrapper')
<div class="tables">
<div class="table-responsive bs-example widget-shadow">
	<h4>Banner</h4>
	<table class="table table-bordered"> 
		<thead> 
			<tr> 
				<th>#</th> <th>Title</th> <th>Tag Line</th> <th>Text 1</th> <th>Text 2</th> <th>Text 3</th> <th>Picture</th> <th>Status</th> <th>Action</th>
			</tr> 
		</thead> 
		<tbody> 
		<?php for ($i=0; $i < count($data_banners); $i++) { ?>
			<tr> 
				<th scope="row"><?php echo $i+1 ?></th> 
				<td><?php echo $data_banners[$i]->title ?></td> 
				<td><?php echo $data_banners[$i]->tag_line ?></td>
				<td><?php echo $data_banners[$i]->button1 ?></td>
				<td><?php echo $data_banners[$i]->button2 ?></td>
				<td><?php echo $data_banners[$i]->button3 ?></td> 
				<td><img class="img-responsive" src="{{ asset('images/'.$data_banners[$i]->background) }}"></td>
				<td><span class="label <?php if($data_banners[$i]->status == 1) echo 'label-success'; else echo 'label-danger' ?>">
					<?php if($data_banners[$i]->status == 1) echo 'Active'; else echo 'De-Active' 
					?>
				</span></td> 
				<td><span class="label label-primary"><a style="color: #fff" href="{{ url('/'.'admin/banner/edit/'.$data_banners[$i]->id) }}"><i style="color: #000" class="fa fa-edit"></i> Edit</a></span></td>
			</tr> 
		<?php } ?>
		</tbody> 
	</table> 
</div>
</div>
@endsection