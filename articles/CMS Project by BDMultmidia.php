<?php 
include_once('../functions.php');
$webtitle = getContent('webtitle');
session_start();
?>
<html>

<head>
	<title><?php print $webtitle; ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1; user-scalable=0;">
	
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet" />
	<link href="../css/bootstrap.min.css" rel="stylesheet" />
	
	
	<link href="../css/custom.less" rel="stylesheet/less" type="text/css"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	
	<script src="../js/less.js"></script>
	<script src="../js/jquery.js"></script>

	<script src="../js/menu.js"></script>
	
	
</head>

<body>

<div class="fluid-container">
	
	<header class="col-xs-12" id="site-header">

		<a href="../index.php"><h1>BD-cms</h1></a>

		<button class="btn btn-default" id="menu-button">Menu</button>

	</header>
	
	<section id="menu">
		<button class="btn btn-default" id="menu-button-close">Close Menu</button>
		
		<?php menu('article'); ?>
	</section>

	<div class="container">

	<a href="index.php">home</a>>>article

	<section class="content col-xs-12 col-md-8 col-lg-7">
		<article class="col-xs-12">

			<header>
				<h2>CMS Project by BDMultmidia</h2>
			</header>

			<img src="img/bootstrap.png" alt="bootstrap" class="img-thumbnail">

			<section class="article-content">
				<p>
					                                    We here at BD Multimedia have a passion for everything that deals with your experience with surfing on the Internet. As our passion for a CMS started to grow, two weeks ago we found ourself some spare time to create a new project that's when we started creating our own CMS.<br />
<br />
Now two weeks later I am proud to introduce you to our ALPHA CMS, we are looking for some bèta-testers for the near future. We are continuously developing the platform to release it to you as soon we decide to.<br />
<br />
Spread the word through any way you can imagine,... I mean, every way is a good way...<br />
<br />
Sincerely Greetings<br />
<br />
Bjorn Derudder Developer<br />
<br />
@BD Multimedia<br />
                                        
				</p>
			</section>

			<footer>
				<p class="article-data col-xs-8">
					<i class="fa fa-pencil-square-o" style="font-size: 15px;"></i>
					<em><a href="../author.php" class="author">Bjorn</a></em>
					<i class="fa fa-calendar-o" style="font-size: 15px;"></i>
					<span class="date">2015-05-06</span>.
				</p>
			</footer>

		</article>
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