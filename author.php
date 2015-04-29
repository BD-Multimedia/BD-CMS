<?php 
	session_start();
	include_once('functions.php');
	$author = $_GET['author'];

	$authorArray = getUserInfo($author);

	if(isset($_GET['logout']) && $_GET['logout']=="true"){
		print "logged out";
		logOut();
	}

	autoLogOut();
?>
<!DOCTYPE html>
<html>

<head>
	<title>BD-cms</title>

	<meta name="viewport" content="width=device-width, initial-scale=1; user-scalable=0;">
	
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" />
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	
	
	<link href="css/custom.less" rel="stylesheet/less" type="text/css" />
	
	<script src="js/less.js"></script>
	<script src="js/jquery.js"></script>

	<script src="js/menu.js"></script>

	<script>
		$(document).ready(function() {
			$('#webdevelopment').animate({width: '<?php echo $authorArray['dev'] ?>%'});
			$('#webdesign').animate({width: '<?php echo $authorArray['des'] ?>%'});
			$('#ux-design').animate({width: '<?php echo $authorArray['ux'] ?>%'});
		});
	</script>
		
	
</head>

<body>

<div id="fluid-container">
	
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

	<section class="col-xs-12 col-md-8 col-md-offset-2" id="author">

		<h2><?php print $authorArray['name']; ?></h2>

		<div class="col-md-6">
		
			<img src="user_img/profile-pic<?php print "1" /*$authorArray['id'];*/?>.jpg" alt="profile pic" class="img-circle col-xs-8 col-xs-offset-2">

			<div class="clearfix"></div>

			<section id="short-info">

				<p class="lead"><?php print $authorArray['info'] ?></p>

			</section>

		</div>

		<div id="knowledge" class="col-md-6">
			<h3>Points of Interest</h3>

			<div class="progress">
				<div class="progress-bar" id="webdevelopment" area-valuenow="<?php echo $authorArray['dev'] ?>" area-valuemin="0" area-valuemax="100">Webdevelopment</div>
			</div>

			<div class="progress">
				<div class="progress-bar" id="webdesign" area-valuenow="<?php print $authorArray['des'] ?>" area-valuemin="0" area-valuemax="100">Webdesign</div>
			</div>

			<div class="progress">
				<div class="progress-bar" id="ux-design" area-valuenow="<?php print $authorArray['ux'] ?>" area-valuemin="0" area-valuemax="100">UX-design</div>
			</div>

		</div>




	

	</section>
	

	
</div>
		
</body>
</html