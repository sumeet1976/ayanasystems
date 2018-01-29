<?php #echo "<pre>"; print_r($data_service); die; ?>

@extends ('layout.default')

@section('wrapper')

<section id="Banner" class="OtherPage">
<center><img class="cen_bg" src="{{ asset('images/'.$data_service[0]->image) }}"></center>
</section>

<div class="container service_cont">
	
	<div class="col-md-12">
		<div class="service_cont_inner" id="serv_cont">
			<h1 class="title">{{ $data_service[0]->title }}
			<span>{{ $data_service[0]->tag_line }}</span></h1>
			<?php echo html_entity_decode($data_service[0]->description) ?>
		</div>
	</div>


</div>

@Endsection