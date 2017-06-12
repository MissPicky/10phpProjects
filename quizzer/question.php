<?php include 'database.php' ?>
<?php session_start();?>
<?php
  // Set Question Number
  $number = (int) $_GET['n'];

  // Get Question
  $query = "SELECT * from quizzerQuestions
            WHERE question_number = $number";
  // Get result
  $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
  $question = $result->fetch_assoc();

  // Get Choices
  $query = "SELECT * from quizzerChoices
            WHERE question_number = $number";
  // Get results
  $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

  // Get total questions
  $query = "SELECT * FROM quizzerQuestions";
  // Get the results
  $questions = $mysqli->query($query) or die($mysqli->error.__LINE__);
  $total = $questions->num_rows;
  $next = $total +1;
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
    <div class="current">Question <?php echo $number ?> of <?php echo $total ?></div>
    <p class="question">
      <?php echo $question['question_text'] ?>
    </p>
    <form method="post" action="process.php">
      <ul class="choices">
        <?php while($row = $choices->fetch_assoc()) : ?>
          <li><input name="choice" type="radio" value="<?php echo $row['id'];?>"><?php echo $row['text']; ?></li>
        <?php endwhile; ?>
      </ul>
      <input type="submit" value="Submit">
      <input type="hidden" name="number" value="<?php echo $number; ?>" />
    </form>
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
