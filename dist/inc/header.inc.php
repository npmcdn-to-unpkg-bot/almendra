<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title; ?></title>

		<!-- Bootstrap CSS -->
		<link href="<?php echo $assets_path; ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- App specific CSS -->
		<link href="<?php echo $assets_path; ?>/gaia/assets/css/gaia.css" rel="stylesheet">
		<link href="<?php echo $assets_path; ?>/gaia/assets/css/demo.css" rel="stylesheet">

	</head>
	<body>

	<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" color-on-scroll="200">
        <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
        <div class="container">
            <div class="navbar-header">
                <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a href="" class="navbar-brand">
                    <?php echo $title; ?>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right navbar-uppercase">
                	<li>
                        <a href="#"><i class="fa fa-facebook-square"></i> Share</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i> Tweet</a>
					</li>
                    <li>
                        <a href="" class="btn btn-danger btn-fill">Download</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>

	<br>

	<div class="section">
		<div class="container">
			<!-- content -->
			<div class="content">

			
