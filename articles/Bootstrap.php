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
				<h2>Bootstrap</h2>
			</header>

			<img src="img/bootstrap.png" alt="bootstrap" class="img-thumbnail">

			<section class="article-content">
				<p>
					                                                                                                            Dear followers<br />
<br />
We are working hard on a standard theme for our CMS and we are currently developing our CMS in Bootstrap so it will be easier to port our system to bigger screens as we are now focusing on mobile devices.<br />
<br />
We are now developing in a ease pace so we don't oversee important things.<br />
<br />
We are continuously developing as for now we already implemented a WYSIWYG-editor. We are using the FCKeditor ( <a href="http://www.ckeditor.com" target="_blank">http://www.ckeditor.com</a> ) this is an open source editor that is very powerful for mobile as fpr bigger screens.<br />
<br />
We hope you keep spreading the words!<br />
<br />
Sincerely Greetings<br />
<br />
Bjorn Derudder<br />
<br />
Developer @ BD Multimedia<br />
                                                                                                              
				</p>
			</section>

			<footer>
				<p class="article-data col-xs-8">
					<i class="fa fa-pencil-square-o" style="font-size: 15px;"></i>
					<em><a href="../author.php?author=bjorn" class="author">bjorn</a></em>
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