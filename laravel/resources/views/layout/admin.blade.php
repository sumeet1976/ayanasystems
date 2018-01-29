<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel :: Ayana Systems</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="{{ asset('css/admin/bootstrap.css') }}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{ asset('css/admin/style.css') }}" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="{{ asset('css/admin/font-awesome.css') }}" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="{{ asset('js/admin/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('js/admin/modernizr.custom.js') }}"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="{{ asset('css/admin/animate.css') }}" rel="stylesheet" type="text/css" media="all">
<script src="{{ asset('js/admin/wow.min.js') }}"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- chart -->
<script src="{{ asset('js/admin/Chart.js') }}"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="css/clndr.css" type="text/css" />
<script src="js/underscore-min.js" type="text/javascript"></script>
<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
<script src="js/clndr.js" type="text/javascript"></script>
<script src="js/site.js" type="text/javascript"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="{{ asset('js/admin/metisMenu.min.js') }}"></script>
<script src="{{ asset('js/admin/custom.js') }}"></script>
<link href="{{ asset('css/admin/custom.css') }}" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		
		
		{!! Helper::Header() !!}
		
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">

@if (\Session::has('success'))
    <div class="alert alert-success">
        <h3>{!! \Session::get('success') !!}</h3>
    </div>
@endif
@if (\Session::has('error'))
    <div class="alert alert-danger">
        <h3>{!! \Session::get('error') !!}</h3>
    </div>
@endif
				
				@yield('wrapper')
				
				<div class="clearfix"> </div>
			</div>
		</div>
		<!--footer-->
		
		<div class="footer">
		   <p>&copy; 2018 Ayana Systems Inc. All Rights Reserved | Powered by <a href="javascript:void(0)">IAK</a></p>
		</div>
        <!--//footer-->

	</div>
	<!-- Classie -->
		<script src="{{ asset('js/admin/classie.js') }}"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="{{ asset('js/admin/jquery.nicescroll.js') }}"></script>
	<script src="{{ asset('js/admin/scripts.js') }}"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="{{ asset('js/admin/bootstrap.js') }}"> </script>

<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>

<!-- ckeditor CDN 
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'txt_description' );
</script>
-->
<script src="{{ asset('js/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'txt_description' );
</script>

</body>
</html>