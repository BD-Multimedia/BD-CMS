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
  $stmt = $connection->prepare('SELECT COUNT(`id`) FROM `cms_project_articles`');
    $stmt->execute();

    $result = $stmt-> get_result();
    
    while($row =$result->fetch_array(MYSQL_ASSOC))
    {
        $numOfArticles = $row['COUNT(`id`)'];
    }

  $stmt = $connection->prepare('SELECT COUNT(`id`) FROM `cms_project_users`');
    $stmt->execute();

    $result = $stmt-> get_result();
    
    while($row =$result->fetch_array(MYSQL_ASSOC))
    {
        $numOfUsers = $row['COUNT(`id`)'];
    }
  $connection->close();  

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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

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
            <li><a href="users.php">Users</a></li>
            <li><a href="articles.php">Articles</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">

      <section id="users" class="col-xs-12">
        <h2>Users</h2>

        <div class="stat col-xs-12 col-sm-6">
          <h3><?php print $numOfUsers; ?> Users</h3>
        </div>

        <div class="stat col-xs-12 col-sm-6">
          <h3><?php print $numOfUsers; ?> Admins</h3>
        </div>

        <div class="stat col-xs-12 col-sm-6">
          <h3>Add new user</h3>
        </div>

        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th class="hidden-xs">Admin</th>
              <th class="hidden-xs">Articles</th>
              <th class="hidden-xs">Last-Login</th>
              <th></th>
            </tr>
          </thead>

          <?php 
          $connection = connectDB();
          $stmt = $connection->prepare('SELECT id,name,email,admin,last_login FROM `cms_project_users`');
          $stmt->execute();
          $result = $stmt-> get_result();
          while($row = $result->fetch_array(MYSQL_ASSOC))
          {?>

          <tr>
            <td><?php print $row['name']; ?></td>
            <td class="hidden-xs"><?php if($row['admin']==1){print 'yes';}else{print 'no';} ?></td>
            <td class="hidden-xs"><?php print numberOfArticles($row['name']); ?></td>
            <td class="hidden-xs"><?php print $row['last_login']; ?></td>
            <td class="text-right"><a href="edit-user.php"><button class="btn btn-primary"><i class="fa fa-pencil-square"></i></button></a></td>
          </tr>

          <?php
          }
          ?>
        </table>



      </section>


    </div>


  </body>
</html>
