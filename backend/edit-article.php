<?php 
include_once('../functions.php');
session_start();
$webtitle = getContent('webtitle');

$user = $_SESSION['user'];
  if(!isUserAdmin($user))
  {
    redirect("You are not admin");
  }
  $user = checkUserLogin();

$tpl_file = "template.php";
$tpl_path = $_SERVER['DOCUMENT_ROOT']."/BD-CMS/backend/";
$articles_path = $_SERVER['DOCUMENT_ROOT']."/BD-CMS/articles/";

if(isset($_GET['id'])){
  $id = $_GET['id'];
}else{
  $id = $_POST['id'];
}
if(!isset($_POST['postArticle'])){
  $oldArticle = getContentArrayById($id);
  $author = $oldArticle['author'];
}
//print_r($oldArticle);

if(isset($_POST['postArticle']))
{
  if(!empty($_POST['text']) && !empty($_POST['title']))
  {
    date_default_timezone_set("Europe/Brussels");
    $text = $_POST['text'];
    $title = $_POST['title'];
    $date = date("Y-m-d");
    $connection = connectDB();
    $stmt = $connection->prepare('UPDATE `cms_project_articles` SET `Title`=?, `Text`=?, `LastMod`=? WHERE id = ?');
    $stmt-> bind_param('sssi', $title, $text, $date, $id);
    $stmt->execute();
    $connection->close();

    $data['Title'] = $title;
    $data['Text'] = nl2br($text);
    $data['Author'] = $_POST['author']; 
    $data['Date'] = $date;

    $placeholders = array("{Title}", "{Text}", "{Author}", "{Date}");
    $tpl = file_get_contents($tpl_path.$tpl_file);
    $new_article = str_replace($placeholders, $data, $tpl);
    $html_file_name = $data['Title'].".php";
    $fp = fopen($articles_path.$html_file_name, "w");
    fwrite($fp, $new_article);
    fclose($fp);
    header('location:articles.php');
  }
}

if(isset($_POST['deleteArticle']))
{
    $connection = connectDB();
    $stmt = $connection->prepare('DELETE FROM `cms_project_articles` WHERE id = ?');
    $stmt-> bind_param('i', $id);
    $stmt->execute();
    $connection->close();
    header('location:articles.php');
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

      <section id="new-article" class="col-xs-12">

      <form class="col-xs-12" method="post" action="<?php print $_SERVER['PHP_SELF']; ?>">

        <div class="form-group">

          <input name="title" type="text" placeholder="Change Title" value="<?php print $oldArticle['Title']; ?>" class="form-control" id="title">

        </div>

        <input type="hidden" name="id" value="<?php print($id); ?>">
        <input type="hidden" name="author" value="<?php print($author); ?>">

        <div class="form-group">

          <textarea name="text" placeholder="Type content here" value="" class="form-control" rows="17" id="text">
            <?php print $oldArticle['Text']; ?>
          </textarea>

        </div>

        <button name="postArticle" type="submit" class="btn btn-primary">Edit article</button>
        <button name="deleteArticle" type="submit" class="btn btn-primary">Delete article</button>

      </form>

      </section>  

    </div>


  </body>
</html>
