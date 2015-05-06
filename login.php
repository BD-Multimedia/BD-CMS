<?php 
	include_once('functions.php');

	include 'PasswordHash.php';
	$hasher = new PasswordHash(8, false);

	session_start();

	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		redirect("You are already logged in.");
	}


	if(isset($_POST["btnSubmit"]))
    {
    	$user =  $_POST['email'];
    	$password = $_POST['password'];

    	if(strlen($password) > 72 )
    	{
    		die("Password must be 73 characters or less");
    	}

    	$stored_hash = "*";
    	$connection = connectDB();
    	$stmt = $connection->prepare('SELECT PASSWORD FROM `cms_project_users` WHERE email=? ');
        $stmt-> bind_param('s', $user);
        $stmt->execute();
        $result = $stmt-> get_result();
        $array = $result->fetch_array(MYSQL_ASSOC);

    	$stored_hash = $array['PASSWORD'];


    	$check = $hasher->CheckPassword($password, $stored_hash);

    	if($check){
    		date_default_timezone_set("Europe/Brussels");
			$date = date("Y-m-d");
			$connection = connectDB();
    		$stmt = $connection->prepare('UPDATE `cms_project_users` SET last_login = ? WHERE email=? ');
        	$stmt-> bind_param('ss', $date ,$user);
        	$stmt->execute();
	   		$_SESSION['user'] = getUserName($user);
	   		$connection->close();
    		header('location: backend/index.php');
    		//print_r($_SESSION['user']);
    	}else{
    		$error='passwords do not match. Please retry';
    	};
    }
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
		
	
	
</head>

<body>

<div id="fluid-container">
	
	<header class="col-xs-12" id="site-header">

		<h1>BD-cms</h1>

		<button class="btn btn-default" id="menu-button">Menu</button>

	</header>

	<section id="menu">
		<button class="btn btn-default" id="menu-button-close">Close Menu</button>
		
		<?php menu('main'); ?>
	</section>

	<section class="col-xs-12 col-md-8" id="form">
		<h2>Login</h2>

		<form method="POST" action="<?php print $_SERVER['PHP_SELF']; ?>" class="col-sm-6 col-lg-5" >

			<div class="form-group">
				<label for="inputEmail">Email Adress</label>
				<input type="email" class="form-control" placeholder="Email Adress" id="inputEmail" name="email" required>
			</div>

			<div class="form-group">
				<label for="inputPassword">Password</label>
				<input type="password" class="form-control" placeholder="Password" id="inputPassword" name="password" required>
			</div>

			<button type="submit" class="btn btn-primary" name="btnSubmit">Login</button>


		</form>

	</section>
	

	
</div>
		
</body>
</html