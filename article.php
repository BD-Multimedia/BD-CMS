<?php 
	session_start();
	include_once('functions.php');

	if(isset($_GET['logout']) && $_GET['logout']=="true"){
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
	
	
	<link href="css/custom.less" rel="stylesheet/less" type="text/css"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	
	<script src="js/less.js"></script>
	<script src="js/jquery.js"></script>

	<script src="js/menu.js"></script>
	
	
</head>

<body>

<div class="fluid-container">
	
	<header class="col-xs-12" id="site-header">

		<a href="index.php"><h1>BD-cms</h1></a>

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

	<a href="index.php">home</a>>>article

	<section class="content col-xs-12 col-md-8 col-lg-7">
		<?php
			//foreachke van de artikels!
			$articles = getSpecificContentArray( $_GET['id']);
			foreach($articles as $article)
			{
				?>

		<article class="col-xs-12">

			<header>
				<h2><?php print $article['Title']; ?></h2>
			</header>

			<img src="img/bootstrap.png" alt="bootstrap" class="img-thumbnail">

			<section class="article-content">
				<p>
					<?php print $article['Text']; ?>
				</p>
			</section>

			<footer>
				<p class="article-data col-xs-8">
					<i class="fa fa-pencil-square-o" style="font-size: 15px;"></i>
					<em><a href="author.php" class="author"><?php print $article['author'] ?></a></em>
					<i class="fa fa-calendar-o" style="font-size: 15px;"></i>
					<span class="date"><?php print $article['Date'] ?></span>.
				</p>
			</footer>

		</article>


				<?php
			}
		?>



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