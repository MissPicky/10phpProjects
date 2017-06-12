<?php include 'database.php' ?>
<?php session_start();?>
<?php
// Get total questions
$query = "SELECT * FROM quizzerQuestions";
// Get the results
$questions = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $questions->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
<title>My Quizzer</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<header>
  <div class="container">
    <h1>My Quizzer</h1>
  </div>
</header>

<main>
  <div class="container">
    <h2>Test your knowledge</h2>
    <p>This is a multiple choice quiz to test your knowledge.</p>
    <ul>
      <li><strong>Number of Questions:</strong> <?php echo $total ?></li>
      <li><strong>Type:</strong> Multiple Choice</li>
      <li><strong>Estimated Time:</strong> <?php echo $total * 0.5 ?> Minutes</li>
    </ul>

    <a href="question.php?n=1" class="start">Start Quiz</a>
  </div>
</main>


<footer>
      <div class="container">
        <div class="social">
          <a target="_blank" href="https://www.facebook.com/erdbeerfleisch" title="facebook"><i class="fa fa-facebook"></i></a>
          <a target="_blank" href="https://twitter.com/erdbeerfleisch" title="Twitter"><i class="fa fa-twitter"></i></a>
          <a target="_blank" href="https://www.xing.com/profile/Julia_Waehnert/" title="Xing"><i class="fa fa-xing"></i></a>
          <a target="_blank" href="https://www.linkedin.com/in/julia-whnert-09078a12b/" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
          <a target="_blank" href="https://github.com/MissPicky" title="Github"><i class="fa fa-github"></i></a>
        </div>
        <p>Created by <a href="http://erdbeerfleisch.de">Erdbeerfleisch Web-Development</a>. © 2017</p>
    </div>
</footer>

</body>
</html>
