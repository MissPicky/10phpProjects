<?php include '../config/config.php';?>
<?php include '../libraries/Database.php';?>
<?php include '../helpers/format_helper.php';?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PHP Lovers Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../css/blog.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="index.php">Dashboard</a>
          <a class="nav-link" href="add_post.php">Add Post</a>
          <a class="nav-link"  href="add_category.php">Add Category</a>
          <a class="nav-link right-link"  href="../index.php">Home</a>
        </nav>
      </div>
    </div>

    <div class="blog-header">
      <div class="container">
        <h1 class="blog-title">Dashboard</h1>
        <p class="lead blog-description">Admin Area of the PHP Lovers Blog</p>
      </div>
    </div>

    <div class="container">

      <div class="row">

        <div class="col-sm-12 blog-main">
          <?php if(isset($_GET['msg'])) : ?>
      			<div class="alert alert-success"><?php echo htmlentities($_GET['msg']); ?></div>
      		<?php endif; ?>
