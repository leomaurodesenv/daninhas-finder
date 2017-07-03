<!DOCTYPE html>
<html lang="en" ng-app="robots">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="Leonardo Mauro">
	
	<title>(DF) Daninha's Finder</title>

	<!-- Favicon -->
	<link rel="icon" href="./img/favicon.ico" type="image/x-ico" sizes="16x16" />
	<link rel="icon" href="./img/favicon.png" type="image/png" sizes="16x16" />
	
	<!-- Bootstrap core CSS -->
	<!--<link rel="stylesheet" href="./css/bootstrap.min.css">-->
	<link rel="stylesheet" href="./css/bootstrap.sandstone.min.css">
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<link rel="stylesheet" href="./css/ie10-viewport-bug-workaround.css">
	<!-- Ellipsify Trick -->
	<link rel="stylesheet" href="./css/ellipsify.css">
	<link rel="stylesheet" href="./css/style.css">

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]><script src="./js/ie8-responsive-file-warning.js"></script><![endif]-->
	<script src="./js/ie-emulation-modes-warning.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    
    <!-- Angular, Xively -->
    <script src="./js/jquery-1.12.1.min.js"></script>
	<script src="./js/xivelyjs-1.0.4.min.js"></script>
	<script src="./js/math/round.js"></script>
	<script src="./js/angular.min.js"></script>
	<script src="./js/app.js"></script>
</head>

<body ng-controller="Robots as robots">


	<!-- Navbar
	================================================== -->
	<nav class="navbar-default">
		<div class="container">
		
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<span class="navbar-brand">(DF) Daninha's Finder</span>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Mapa</a></li>
					<!--<li><a href="#">Infos</a></li>-->
				</ul>
			</div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
		
	</nav>
	
	<!-- Content
	================================================== -->