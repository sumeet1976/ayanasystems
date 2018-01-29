<?php #echo "<pre>"; print_r($data_about); die; ?>

@extends ('layout.default')

@section('wrapper')

<section id="Banner" class="About_Bg">
	<div class="container">
		<h1>{{ $data_about[0]->title }}
			<span class="hide">the art of making real-time environment</span></h1>
	</div>
</section>

<div class="container service_cont">
	
	<div class="col-md-12">
		<div class="service_cont_inner">
			<h2 class="hide">We enable solutions by Artificial Intelligence, Robotics Process Automation, Machine Learning and Cloud Computing</h2>
			<?php echo html_entity_decode($data_about[0]->description) ?></p>
		</div>
	</div>

</div>

@Endsection