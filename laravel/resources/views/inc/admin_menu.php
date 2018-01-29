<?php #echo "<pre>"; print_r($log_data); die ?>

<!--left-fixed -start-->
<div class=" sidebar" role="navigation">
    <div class="navbar-collapse">
		<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
			<ul class="nav" id="side-menu">
				<li>
					<a href="/admin/welcome" class="active"><i class="fa fa-home nav_icon"></i>Dashboard</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-th-large nav_icon"></i>Services <span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse">
					<?php foreach ($data_services as $key => $value) { ?>
						<li>
							<a href="<?php echo url('/'.'admin/service/'.$value->id) ?>">
								<?php echo $value->title ?>
							</a>
						</li>
					<?php } ?>

					</ul>
					<!-- /nav-second-level -->
				</li>
				
				<li>
					<a href="<?php echo url('/'.'admin/about/') ?>"><i class="fa fa-file-text-o nav_icon"></i>About</a>
				</li>

				<li>
					<a href="#"><i class="fa fa-envelope nav_icon"></i>Query<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse">
						<li>
							<a href="<?php echo url('/'.'admin/request/query') ?>">Product & Service</a>
						</li>
						<li>
							<a href="<?php echo url('/'.'admin/request/career') ?>">Career</a>
						</li>
					</ul>
					<!-- //nav-second-level -->
				</li>

				<li>
					<a href="<?php echo url('/'.'admin/banner/') ?>"><i class="fa fa-picture-o nav_icon"></i>Banner</a>
				</li>

				<li>
					<a href="<?php echo url('/'.'admin/leaders/') ?>"><i class="fa fa-users nav_icon"></i>Leaders</a>
				</li>

				<li>
					<a href="<?php echo url('/'.'admin/welcome_message/') ?>"><i class="fa fa-comment-o nav_icon"></i>Welcome Message</a>
				</li>

			</ul>
			<!-- //sidebar-collapse -->
		</nav>
	</div>
</div>
<!--left-fixed -end-->

<!-- header-starts -->
<div class="sticky-header header-section ">
	<div class="header-left">
		<!--toggle button start-->
		<button id="showLeftPush"><i class="fa fa-bars"></i></button>
		<!--toggle button end-->
		<!--logo -->
		<div class="logo">
			<a href="">
				<h1>A_SYSTEMS</h1>
				<span>AdminPanel</span>
			</a>
		</div>
		<!--//logo-->
		<!--search-box-->
		<div class="search-box">
			<img src="<?php echo url('/'.'images/aslogo.png') ?>">
		</div><!--//end-search-box-->
		<div class="clearfix"> </div>
	</div>
	<div class="header-right">
		<div class="profile_details">		
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<div class="profile_img">	
							<span class="prfil-img"><img src="<?php echo asset('images/'.$log_data['pic']) ?>" alt=""> </span> 
							<div class="user-name">
								<p><?php echo $log_data['name'] ?></p>
								<span><?php echo $log_data['type'] ?></span>
							</div>
							<i class="fa fa-angle-down lnr"></i>
							<i class="fa fa-angle-up lnr"></i>
							<div class="clearfix"></div>	
						</div>	
					</a>
					<ul class="dropdown-menu drp-mnu">
						<li> <a href="/admin/setting"><i class="fa fa-cog"></i> Setting</a> </li>
						<li> <a href="/admin/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>				
	</div>
	<div class="clearfix"> </div>	
</div>
<!-- //header-ends -->