<?php
	//this will be used to store all the funcitons!!
	function getContentArray(){
		$contentArray = array();
		$connection = connectDB();
		$stmt = $connection->prepare('SELECT `id`,`Title`,`Date`,`Text`, `author` FROM `cms_project_articles` ORDER BY id DESC');
		$stmt->execute();
		$result = $stmt-> get_result();
		while($row = $result->fetch_array(MYSQL_ASSOC))
		{
			$contentArray[] = $row;
		}
		return $contentArray;
	}

	function getUserInfo($user){
		$contentArray = array();
		$connection = connectDB();
	    $stmt = $connection->prepare('SELECT id,name,email,ux,des,dev,info FROM `cms_project_users` WHERE name=? ');
	    $stmt->bind_param('s', $user);
	    $stmt->execute();
	    $result = $stmt-> get_result();
	    while($row = $result->fetch_array(MYSQL_ASSOC))
		{
			$contentArray[] = $row;
		}
		return $contentArray[0];
	}

	function getSpecificContentArray($id){
		$contentArray = array();
		$connection = connectDB();
		$stmt = $connection->prepare('SELECT `id`,`Title`,`Date`, `Text` , `author` FROM `cms_project_articles` WHERE `id`=?');
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$result = $stmt-> get_result();
		while($row = $result->fetch_array(MYSQL_ASSOC))
		{
			$contentArray[] = $row;
		}
		return $contentArray;
	}

	//this is to get content on a template page
	function getContent($what){
		$connection = connectDB();
		$stmt = $connection->prepare('SELECT content FROM `cms_project_content` WHERE `function` = ?');
		$stmt->bind_param('s', $what);
    	$stmt->execute();
    	$result = $stmt-> get_result();
    	while($row =$result->fetch_array(MYSQL_ASSOC))
	    {
	        return $row['content'];
	    }

	}

	#check the number of articles per user
	function numberOfArticles($user){
		$connection = connectDB();
		$stmt = $connection->prepare('SELECT COUNT(*) FROM `cms_project_articles` WHERE `author`=?');
    	$stmt->bind_param('s', $user);
    	$stmt->execute();

    	$result = $stmt-> get_result();
	    
	    while($row =$result->fetch_array(MYSQL_ASSOC))
	    {
	        return $row['COUNT(*)'];
	    }
	}

	#this is to log the user out
	function logOut(){
		unset($_SESSION['user']);
	}

	#check for user activity else logout user
	function autoLogOut(){
		$minutes=30;//Set logout time in minutes    
    	if (!isset($_SESSION['time'])) {
        	$_SESSION['time'] = time();
    	} else if ( (time() - $_SESSION['time']) > $minutes*60) {
        	session_destroy();
        	session_start();
        	redirect("You have been logged out automatically for security.");
    	}
	}

	#check if user is admin
	function isUserAdmin($user){
		$connection = connectDB();

	    $stmt = $connection->prepare('SELECT ADMIN FROM `cms_project_users` WHERE email=? ');
	    $stmt-> bind_param('s', $user);
	    $stmt->execute();
	    $result = $stmt-> get_result();
	    $array = $result->fetch_array(MYSQL_ASSOC);
	    return $array['ADMIN'];
	}
	
	#function check user login
	function checkUserLogin()
	{
		if(!isset($_SESSION["user"]))
		{
			$error = 'You are not logged in. Please login <a href="/BD-CMS/login.php">here</a>.';
			redirect($error);
		}
		$user = $_SESSION['user'];
		return $user;
	}

	function redirect($error){
		$_SESSION['error'] = $error;
		header('location:/BD-CMS/redirect.php');
	}
	

	#function to connect to database
	function connectDB(){
		$connection = new mysqli('localhost','root','usbw','test',3307);
		//$connection = new mysqli('bdmultimedia.be.mysql','bdmultimedia_be','t756114p05362','bdmultimedia_be');
		if($connection->connect_errno)
		{
			die('Connection Error: '.$connection->connect_errno);
		}
		return $connection;
	}

	#this is the function for the footer menu
	# login=2 =>
	function menu(){
		$connection = connectDB();

	    if(isset($_SESSION['user'])){
	    	$user = $_SESSION['user'];
	    	if(isUserAdmin($user)){
	    		$stmt = $connection->prepare('SELECT inhoud,link,admin FROM `cms_project_links` WHERE `login` = 0 OR `login` = 2');
	    	}else{
	    		$stmt = $connection->prepare('SELECT inhoud,link,admin FROM `cms_project_links` WHERE `login` = 0 OR `login` = 2 AND `admin` = 0');
	    	}
	    }else{
	    	$stmt = $connection->prepare('SELECT inhoud,link,admin FROM `cms_project_links` WHERE `login` = 0  OR `login` = 1');
	    }
	    $stmt->execute();

	    //resultaten ophalen
	    $result = $stmt-> get_result();
	    if(!$result)
	    {
	        die('Query error: '.$connection->error);
	    }
	    print '<nav id="main-nav">
			
			<h2>Main menu</h2>
			<ul>';

	    while($row =$result->fetch_array(MYSQL_ASSOC))
	    {
	    	if($row['admin']==0)
	    	{
	    		$activelink = '/BD-CMS/'.$row['link'];
		    	if($activelink == $_SERVER['PHP_SELF']){$active = "active";}else{$active=" ";};
		        //print '<li>';
		        if($row['inhoud'] == 'Login'){
		        	print '<li id="login"><a href="'.$row['link'].'">'.$row['inhoud'].'</a></li>';
		        }else{
		        	print '<li><a class="'.$active.'" href="'.$row['link'].'">'.$row['inhoud'].'</a></li>';
	        	}
	    	}
	    }
		print '</ul>';

		print '</nav>';

		print '<nav id="admin-nav">';
		
		print '<ul>';
		$connection->close();
	    $result->close();

	    $connection = connectDB();

	    if(isset($_SESSION['user'])){
	    	$user = $_SESSION['user'];
	    	if(isUserAdmin($user)){
	    		$stmt = $connection->prepare('SELECT inhoud,link,admin FROM `cms_project_links` WHERE `login` = 0 OR `login` = 2');
	    	}else{
	    		$stmt = $connection->prepare('SELECT inhoud,link,admin FROM `cms_project_links` WHERE `login` = 0 OR `login` = 2 AND `admin` = 0');
	    	}
	    }else{
	    	$stmt = $connection->prepare('SELECT inhoud,link,admin FROM `cms_project_links` WHERE `login` = 0  OR `login` = 1');
	    }
	    $stmt->execute();

	    //resultaten ophalen
	    $result = $stmt-> get_result();
	    if(!$result)
	    {
	        die('Query error: '.$connection->error);
	    }

		while($row =$result->fetch_array(MYSQL_ASSOC))
	    {
	    	if($row['admin']==1)
	    	{
	    		$activelink = '/BD-CMS/'.$row['link'];
		    	if($activelink == $_SERVER['PHP_SELF']){$active = "active";}else{$active=" ";};
		        //print '<li>';
		        if($row['inhoud'] == 'Login'){
		        	print '<li id="login"><a href="'.$row['link'].'">'.$row['inhoud'].'</a></li>';
		        }else{
		        	print '<li><a class="'.$active.'" href="'.$row['link'].'">'.$row['inhoud'].'</a></li>';
	        	}
	    	}
	    }

		$connection->close();
	    $result->close();

	    if(isset($_SESSION['user']))
		{
			print'<li><a href="'.$_SERVER['PHP_SELF'].'?logout=true">logout</a></li>';
		}
		print '<li id="cmsbanner">
					Powered by BD_CMS by <a href="http://www.bdmultimedia.be">BD Multimedia</a>
				</li>';

	    print '</ul>

		</nav>';
	}
?>

			