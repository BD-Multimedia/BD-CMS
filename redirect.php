<?php 
	session_start();
	include_once('functions.php');

	if(isset($_GET['logout']) && $_GET['logout']=="true"){
		logOut();
	}

	if(isset($_SESSION['error'])){
		$error = $_SESSION['error'];
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>BD-cms</title>

	<meta name="viewport" content="width=device-width, initial-scale=1; user-scalable=0;">
	
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" />
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	
	
	<link href="css/custom.less" rel="stylesheet/less" type="text/css"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	
	<script src="js/less.js"></script>
	<script src="js/jquery.js"></script>

	<script src="js/menu.js"></script>
	
	
</head>

<body>

<div class="fluid-container">
	
	<header class="col-xs-12" id="site-header">

		<h1>BD-cms</h1>

		<button class="btn btn-default" id="menu-button">Menu</button>

	</header>

	<nav id="main-nav">
		<button class="btn btn-default" id="menu-button-close">Close Menu</button>
		<h2>Main menu</h2>
		<ul>
			<?php 
				menu();
				if(isset($_SESSION['user']))
				{
					?>
			<li><a href="<?php print $_SERVER['PHP_SELF'] ?>?logout=true">logout</a></li>
					<?php
				}
			?>
		</ul>

	</nav>

	<div class="container">

	<section class="content col-xs-12 col-md-8 col-lg-7">
		<h2>Redirect landing page</h2>
		<p><?php if(isset($error)){print $error;} ?></p>

	</section>




	<section id="sidebar-right" class="col-md-4 visible-md visible-lg col-lg-offset-1" >


		<div id="search-widget">
			<form>
				<div class="form-group">
					<label for="inputSearch">Search</label>
					<input type="text" class="form-control" placeholder="Search here" id="inputSearch">
				</div>
				<button type="submit" class="btn btn-default">Search</button>
			</form>
		</div>

	</section>

	</div>
	
</div>
		
</body>
</html