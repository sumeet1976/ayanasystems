<?php 
#echo "<pre>";
#print_r($data_banner); 
#print_r($data_about);
#print_r($data_services);
#print_r($data_leaders);
#die; 
?>

@extends ('layout.default')

@section('wrapper')
<section id="Banner">
	<div class="container">
		<h1>{{ $data_banner[0]->title }}
			<span>{{ $data_banner[0]->tag_line }}</span></h1>
		<a href="" class="button">{{ $data_banner[0]->button1 }}</a>
		<a href="" class="button">{{ $data_banner[0]->button2 }}</a>
		<a href="" class="button">{{ $data_banner[0]->button3 }}</a>
		<img src="{{ asset('images/'.$data_banner[0]->background) }}">
	</div>
</section>

<section id="what_we_do">
	<div class="container">
		<div class="row">
			<div class="col-md-12 Heading">
				<h1>
					Powering Software With <a href="">AI</a>
					<span>Deliver meaningful value to our clients</span>
				</h1>
			</div>
		</div>
	</div>
	
	
	<?php
	$highlight_service = ['service_1', 'service_2', 'service_3', 'service_4', 'service_5', 'service_6', 'service_7', 'service_8', 'service_9', 'service_10', 'service_11', 'service_12', 'service_13', 'service_14', 'service_15'];

	for($i = 0; $i < count($data_services); $i++ ){
		if($data_services[$i]->status){
	?>
	
	<div class="row what_we_do">
		<div class="bg">
			<div class="row cont">
				<div class="item" id="{{ $highlight_service[$i] }}" onclick="location.href='service/{{ $data_services[$i]->id }}'">
					<img src="images/{{ $data_services[$i]->image }}">
					<h1>{{ $data_services[$i]->title }}</h1>
					<span class="home_service">
						<?php echo html_entity_decode($data_services[$i]->description) ?>
					</span>
					<a class="button" href="service/{{ $data_services[$i]->id }}"><span>Read More</span></a>
				</div>
			</div>
		</div>
	</div>
	
	<?php } } ?>

</section>

<section id="why_us">
	<div class="container">
		<div class="why_us_content">
		<h1>{{ $data_about[0]->title }}</h1>
		<span class="about_fxd_hgt">
		<?php echo html_entity_decode($data_about[0]->description) ?>
		</span>
		<a class="button" href="about"><span>Read More</span></a>
	</div>
	<div class="why_us_image">
		<img src="{{ asset('images/'.$data_about[0]->image) }}">
	</div>
	</div>	
</section>

<section id="request_quote">
	<div class="request_content">
		<h2>Do you have a business idea ? <a data-toggle="modal" data-target="#QuoteModal" href="javascript:void(0)">Let's Discuss</a> </h2>
	</div>	
</section>

<section id="leadership">
	<div class="container">
		<center><h1>Leadership <span class="hide">Innovation distinguishes between a leader and a follower</span></h1></center>
			
		<?php foreach($data_leaders as $key=>$value){ 
			if($value->status){
		?>
		<div class="col-md-6">
			<div class="leader">
				<div class="leader_pic"><img src="{{ asset('images/'.$value->image) }}"></div>
				<div class="leader_content">
					<h3>{{ $value->name }}<span>{{ $value->designation }}</span></h3>
					<p>{{ $value->education1 }}</p>
					<p>{{ $value->education2 }}</p>
				</div>
				<div class="leader_content intro">
					<p>{{ $value->name }}<span>{{ $value->designation }}</span></p>
					<p>{{ $value->intro }}</p>
				</div>
			</div>
		</div>
		<?php } } ?>
		
	</div>
</section>

<section id="contact_us">
	<center><h1>Office Locations</h1></center>
	<div class="row office_loc_row">
		<div class="col-md-6 india_office">
			<h1>India</h1>
			<img src="images/india.png" class="branch_image">
		</div>
		<div class="col-md-6">
			<div class="location_cont">
				<h3>Ayana Systems Pvt Ltd</h3>
				<p><i class="fa fa-map-marker"></i> E-506 G.K 2, New Delhi - 110048</p>
				<p><i class="fa fa-phone"></i> +91 9810477212</p>
			</div>
		</div>
	</div>
	<div class="row office_loc_row office_usa">
		<div class="col-md-6 location_cont">
			 <ul class="nav nav-tabs">
			    <li class="active"><a data-toggle="tab" href="#home">New York</a></li>
			    <li><a data-toggle="tab" href="#menu1">Princeton</a></li>
			    <li><a data-toggle="tab" href="#menu2">Houston</a></li>
			  </ul>

			  <div class="tab-content">
			    <div id="home" class="tab-pane fade in active">
			      <h3>Ayana Systems LLC</h3>
					<p><i class="fa fa-map-marker"></i> 27 Cliff Street
New York, NY 10038</p>
					<p><i class="fa fa-phone"></i> +1 (212) 285-2700</p>
			    </div>
			    <div id="menu1" class="tab-pane fade">
			      <h3>Ayana Systems LLC</h3>
					<p><i class="fa fa-map-marker"></i> 38 Remington Circle
Princeton Junction, NJ 08550</p>
					<p><i class="fa fa-phone"></i> +1 (609) 423-7941</p>
			    </div>
			    <div id="menu2" class="tab-pane fade">
			      <h3>Ayana Systems LLC</h3>
					<p><i class="fa fa-map-marker"></i> 147 South Hall, 
Sugar Land, TX 77478</p>
					<p><i class="fa fa-phone"></i> +1 (281) 410-1688</p>
			    </div>
			  </div>
		</div>
		<div class="col-md-6 usa_office">
			<h1>U.S.A</h1>
			<img src="images/whitehouse.png" class="branch_image">
		</div>
	</div>
</section>

@Endsection