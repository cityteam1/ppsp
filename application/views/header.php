<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PPSP Project</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<!-- css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	  <style>
	  

    /* Set black background color, white text and some padding */
    footer {
		background-color: #555;
		color: white;
		padding:15px;
		position: relative;
		right: 0;
		bottom: 0;
		left: 0;
		text-align: center;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    /*@media screen and (max-width: 767px) {*/
    /*  .sidenav {*/
    /*    height: auto;*/
    /*    padding: 15px;*/
    /*  }*/
    /*  .row.content {height: auto;} */
    /*}*/
  </style>
</head>
<body>
	<header id="site-header">
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?= base_url() ?>">PPSP Project</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      				<ul class="nav navbar-nav">
	        			<li class="active"><a href="<?= base_url()?>">Home</a></li>
	        			<li><a href="<?= base_url('Actitives') ?>">Actitives</a></li>
	        			<li><a href="#">Deals</a></li>
	        			<li><a href="#">Stores</a></li>
	        			<li><a href="#">Contact</a></li>
      				</ul>
	      			<form class="navbar-form navbar-left">
	      				<div class="form-group">
	        				<input type="text" class="form-control" placeholder="Search">
	      				</div>
	      				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
	    			</form>
					<ul class="nav navbar-nav navbar-right" div class="dropdown"><!-- User icon  -->
					<?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
						<li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="ture"><span class="glyphicon glyphicon-user"></span> <?= $_SESSION['username']?> <b class="caret"></b></a>
	                    <ul class="dropdown-menu">
	                        <li>
	                            <a href="profile"><span class="glyphicon glyphicon-user" aria-hidden="true"> Profile</span></a>
	                        </li>
	                        <li>
	                        	<a href="profile"><span class="glyphicon glyphicon-user" aria-hidden="true"> Is admin = <?= $_SESSION['is_admin']?></span></a>
	                            
	                        </li>
	                        <li>
	                            <a href="#"><i class="fa fa-fw fa-gear"></i> Is comfirmed = <?= $data;?> </a>
	                        </li>
	                        <li class="divider"></li><!-- line -->
	                        <li>
	                            <a href="<?= base_url('logout') ?>"><span class="glyphicon glyphicon-log-in"></span> Log Out </a>
	                        </li>
                    	</ul>
                	</li>
						<?php else : ?>
							<li><a href="<?= base_url('register') ?>"><span class="glyphicon glyphicon-user"></span> Register</a></li>
							<li><a href="<?= base_url('login') ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						<?php endif; ?>
					</ul>
				</div><!-- .navbar-collapse -->
			</div><!-- .container-fluid -->
		</nav><!-- .navbar -->
	</header><!-- #site-header -->

	<main id="site-content" role="main">
		<div class="container">

		
		
