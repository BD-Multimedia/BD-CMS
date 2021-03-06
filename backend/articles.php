<?php 
session_start();
include_once('../functions.php');
$webtitle = getContent('webtitle');

$user = $_SESSION['user'];
  if(!isUserAdmin($user))
  {
    redirect("You are not admin");
  }
  $user = checkUserLogin();
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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

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

      <section class="col-xs-12" id="articles">

        <a href="new-article.php">
          <section class="col-xs-6 article-menu">
          
            <h3>Add new article</h3>
          
          </section>
       </a>

       <a href="#">
          <section class="col-xs-6 article-menu">
          
            <h3>Show articles</h3>
          
          </section>
       </a>

        <table>
          <thead>
            <tr>
              <th class="padding-left">Title</th>
              <th class="hidden-xs">Author</th>
              <th class="hidden-xs text-center">Date</th>
              <th class="hidden-xs hidden-sm text-center">Last modified</th>
              <th></th>
            </tr>
          </thead>
          <?php
          //foreachke van de artikels!
          $articles = getContentArray();
          //print_r($articles);
          foreach($articles as $article)
          {
            ?>
          <tr>
            <td><?php print $article['Title']; ?></td>
            <td class="hidden-xs"><?php print $article['author'] ?></td>
            <td class="hidden-xs text-center"><?php print $article['Date'] ?></td>
            <td class="hidden-xs hidden-sm text-center"><?php print $article['LastMod'] ?></td>
            <td class="text-right"><a href="edit-article.php?id=<?php print $article['id'] ?>"><button class="btn btn-primary"><i class="fa fa-pencil-square"></i></button></a></td>
          </tr>
          <?php
          }
          ?>
        </table>

      </section>      

    </div>


  </body>
</html>
