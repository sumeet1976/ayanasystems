@extends ('layout.default')

@section('wrapper')

<section id="Banner" class="OtherPage Career">
<center><img class="cen_bg" src="{{ asset('images/team-image.png') }}"></center>
</section>

<div class="container service_cont">
	
	<div class="col-md-12">
		<div class="service_cont_inner">
			<h2>The best way to predict the future is to create it.
			<span>If you can DREAM it, you can DO it</span></h2>

			<p>We work where their ideas make an impact. From developing software that transforms healthcare to designing next-generation sport stadiums, ASers change the way that people experience the world. At AS, every voice contributes. Together, our mathematicians, engineers, coders and designers outthink challenges and make discoveries that alter industries. Our innovation attracts impressive partners, too. 
			</p>
			<p>We collaborate with global leaders like Apple, Twitter, Facebook and Box, using data analytics and cloud technology to build apps that help enterprises make smarter decisions.</p>
			<p>We invite you to be part of a diverse team of thinkers and doers. Work at AS, where the world’s top business and technology professionals are always up to something new.</p>
			
			<?php #echo "<pre>"; print_r($hidden_fields); die; ?>
<form id="CareerForm" method="post" action="<?php echo siteUrl.'Query' ?>" class="join_form" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" enctype="multipart/form-data">

<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

<input type="hidden" name="query_type" value="4">
			
		<h3>Join <b>Ayana Systems</b>. Your skills matter here!</h3>
			<div class="input_control">
				<input type="text" placeholder="" name="txtName" class="inputText">
				<span class="border"></span>
				<span class="floating-label"">Your Full Name</span>
			</div>
			<div class="input_control">
				<input type="email" placeholder="" name="txtEmail" class="inputText">
				<span class="border"></span>
				<span class="floating-label"">Email Address</span>
			</div>
			<div class="row">
				<div class="col-md-4">
				<div class="input_control">
					<input type="text" placeholder="" name="txtCCode" class="inputText" maxlength="5">
					<span class="border"></span>
					<span class="floating-label"">Country Code</span>
				</div>
				</div>
				<div class="col-md-8">
					<div class="input_control">
					<input type="text" placeholder="" name="txtContact" class="inputText" maxlength="12">
					<span class="border"></span>
					<span class="floating-label"">Contact Number</span>
					</div>
				</div>
			</div>

			<div class="input_control">
				<span class="input_limit">( upto 60 words )</span>
				<input type="text" maxlength="60" placeholder="" name="txtSkills" class="inputText">
				<span class="border"></span>
				<span class="floating-label"">Technical Skills</span>
			</div>

			<div class="input_control">
				<span class="input_limit">( upto 200 words )</span>
				<input type="text" maxlength="200" placeholder="" name="txtMessage" class="inputText">
				<span class="border"></span>
				<span class="floating-label"">Work Experience</span>
			</div>

			<div class="row">
				<div class="col-md-12">
					<span class="input_limit" style="margin-bottom: 0">( only pdf, doc, and docx formats are allowed. size should be maximum upto 2MB )</span>
					<div class="upload-btn-wrapper">
					  <button class="btn">Upload Resume</button>
					  <input type="file" name="image" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- <div class="progress">
					    <div class="bar"></div >
					    <div class="percent">0%</div >
					</div>
					<div id="status"></div> -->
				</div>
			</div>
			<hr>

			<input type="submit" value="SUBMIT" class="btnFormSubmit">
		</form>

		</div>
	</div>

</div>

@Endsection