<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ $meta['Title'] }}</title>
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<meta name="description" content="Ideas for innovative software development" />
		<meta name="keywords" content="AI, artificial intelligence, robotics" />
		<meta name="author" content="AYANA SYSTEMS" />
		<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
		
<link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}">

<link rel="stylesheet" href="{{ asset('css/jquery.sweet-modal.min.css') }}" />
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,700i|Arapey" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Syncopate:400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Bungee+Outline" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Bungee+Hairline" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Iceland" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- page specific custom css -->
<?php foreach ($css as $key => $value) { ?>
<link rel="stylesheet" type="text/css" href="{{ asset('css/'.$value) }}">
<?php } ?>

	</head>
	<body class="{{ $meta['BodyClass'] }}">

<section id="page_load">
	<img src="{{ asset('images/load_logo.png') }}" class="page_lode_logo">
	<span>please wait...</span>
	<img src="images/loading.gif" class="hide">
</section>

<header id="header">

<!--left-fixed -navigation-->
{!! Helper::Greeting() !!}
<!--left-fixed -navigation-->

<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/"><img class="Logo" src="{{ asset('images/aslogo.png') }}"></a>
      <span class="AsLogo" onclick="window.location.href='/'">AYANA<span>SYSTEMS</span></span>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a class="scroll_link <?php if($active_menu == 'S') echo 'active' ?>" href="{{ url('/'.'#what_we_do') }}">Services</a></li>
        <li><a class="scroll_link <?php if($active_menu == 'A') echo 'active' ?>" href="{{ url('/'.'about') }}">About</a></li>
        <li class="scroll_link"><a data-toggle="modal" data-target="#QuoteModal" href="javascript:void(0)">Request a Quote</a></li>
        <li class="hide"><a href="{{ url('/'.'#leadership') }}">Leadership</a></li>
        <li><a class="scroll_link" href="{{ url('/'.'#contact_us') }}"><i class="fa fa-bag"></i> Contact</a></li>
      	<li><a href="{{ url('/'.'career') }}" class="<?php if($active_menu == 'C') echo 'active' ?>"><i class="fa fa-handshake-o"></i> Careers</a></li>
      </ul>
    </div>
  </div>
</nav>

</header>
<section id="Head_for_scroll"></section>

@yield('wrapper')

<section id="contact_query">
	<div class="container">
		<div class="col-md-6 contact_query_email">
			<h2>Please feel free to contact us at</h2>
			<p><i class="fa fa-envelope-o"></i> hello@ayanasystems.com</p>
			<hr>
			<br><h2>Social Media</h2>
			<a target="_blank" href="" class="social_link">
				<i class="fa fa-facebook"></i>
			</a>
			<a target="_blank" href="" class="social_link">
				<i class="fa fa-twitter"></i>
			</a>
			<a target="_blank" href="" class="social_link">
				<i class="fa fa-linkedin"></i>
			</a>
			<a target="_blank" href="" class="social_link">
				<i class="fa fa-dribbble"></i>
			</a>
		</div>
		<div class="col-md-6 contact_query_form">
			<!--left-fixed -navigation-->
			<img src="{{ asset('images/team.jpg') }}" class="career_image">
			{!! Helper::ContactForm(1) !!}
			<!--left-fixed -navigation-->
		</div>
	</div>
</section>

<section id="Footer">
	<footer>
		<div class="container">
			<div class="col-md-4">	
				<h1 class="Logo"><img src="{{ asset('images/aslogo.png') }}"></h1>
				<p>
					We are a team of passionate, expert software developers and engineers across two continents making beautiful, creative products.
				</p>
				<p class="copy_write">&copy; All Rights Reserved 2018</p>
			</div>
			<div class="col-md-3">
				<ul>
					<li class="Heading">GET INVOLVED</li>
					<li><a href="{{ url('/'.'career') }}">Careers</a></li>
					<li><a href="{{ url('/'.'#contact_us') }}">Contact Us</a></li>
				</ul>
			</div>
			<div class="col-md-5">
				<ul>
					<li class="Heading">What We Do</li>
					<?php foreach ($data_services as $key => $value) { ?>
						<li>
							<a href="<?php echo url('/'.'service/'.$value->id) ?>">
								<?php echo $value->title ?>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</footer>
	<section id="FBottom">
		We <i class="fa fa-heart"></i> Our Clients
	</section>
</section>

<!-- Quote Popup -->
  <div class="modal fade" id="QuoteModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">We’d <span class="love"><b>love</b></span> to <b>discuss</b> and make it happen.</span></h4>
        </div>
        <div class="modal-body">
			{!! Helper::ContactForm(3) !!}
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>


<section id="bottom_strip">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="javascript:void(0)" onclick="UpScroll()">
					<i class="fa fa-angle-up"></i>
				</a>
				<a href="javascript:void(0)" onclick="DownScroll()">
					<i class="fa fa-angle-down"></i>
				</a>
			</div>
			<div class="col-md-8">
				<span class="title">Get your website online today!</span>
				<span class="btn"><a href="javascript:void(0)" data-toggle="modal" data-target="#QuoteModal">Get Started Now</a></span>
				<span class="call"><i class="fa fa-phone"></i> +91 9810 477 212</span>
			</div>
		</div>
	</div>
</section>

<section id="scroll_to_top">
	<a href="#header" class="scroll_link"><i class="fa fa-angle-up"></i></a>
</section>


<!-- common custom scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<script src="{{ asset('js/location_&_client.js') }}"></script>
<script src="{{ asset('js/layout.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.sweet-modal.min.js') }}"></script>

@if (\Session::has('success'))
	<script type='text/javascript'>
	$.sweetModal({
			content: 'Thank you.',
			title: '<?php echo (\Session::get('success')) ?>',
			icon: $.sweetModal.ICON_SUCCESS,
		theme: $.sweetModal.THEME_DARK,
			buttons: {
				'That\'s fine': {
					classes: 'greenB'
				}
			}
		});  
	</script>
@endif

<!-- page specific scripts -->
<?php foreach ($js as $key => $value) { ?>
<script type="text/javascript" src="{{ asset('js/'.$value) }}"></script>
<?php } ?>

	</body>
</html>
