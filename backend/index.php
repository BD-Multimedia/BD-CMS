<?php  
  include_once("../functions.php");
  session_start();
  //checkUserLogin();
  $user = $_SESSION['user'];
  if(!isUserAdmin($user))
  {
    redirect("You are not admin");
  }
  $user = checkUserLogin();

  $webtitle = getContent('webtitle');


  $connection = connectDB();
  $stmt = $connection->prepare('SELECT COUNT(*) FROM `cms_project_articles`');
    $stmt->execute();

    $result = $stmt-> get_result();
    
    while($row =$result->fetch_array(MYSQL_ASSOC))
    {
        $numOfArticles = $row['COUNT(*)'];
    }

  $stmt = $connection->prepare('SELECT COUNT(*) FROM `cms_project_users`');
    $stmt->execute();

    $result = $stmt-> get_result();
    
    while($row =$result->fetch_array(MYSQL_ASSOC))
    {
        $numOfUsers = $row['COUNT(*)'];
    }

  

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Backend - BD cms</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet" type="text/css">
    <link href="css/backend.less" rel="stylesheet/less" type="text/css">

    <script src="js/jquery.js"></script>
    <script src="js/less.js"></script>
    <script src="js/bootstrap.js"></script>

   
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php"><?php print $webtitle; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="articles.php">Articles</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">

      <section id="stats" class="col-xs-12">
        <h2>Website Stats</h2>

        <div class="stat col-xs-6">
          <h3># Visitors</h3>
        </div>

        <a href="articles.php">
        <div class="stat col-xs-6">
          <h3><?php print $numOfArticles; ?> Articles</h3>
        </div>
        </a>

        <div class="stat col-xs-6">
          <h3><?php print $numOfUsers; ?> Users</h3>
        </div>

        <div class="stat col-xs-6">
          <h3>Visitors</h3>
        </div>

      </section>


    </div>


  </body>
</html>
