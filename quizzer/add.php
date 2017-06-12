<?php include 'database.php' ?>
<?php session_start();?>
<?php
  if (isset($_POST['submit'])){
    // Get the POST variables
    $question_number = $_POST['question_number'];
    $question_text = $_POST['question_text'];
    $choices = array();
    $choices[1]=$_POST['choice1'];
    $choices[2]=$_POST['choice2'];
    $choices[3]=$_POST['choice3'];
    $choices[4]=$_POST['choice4'];
    $choices[5]=$_POST['choice5'];
    $correct_choice = $_POST['correct_choice'];
    // Question Query
    $query = "INSERT into quizzerQuestions (question_number, question_text)
                            VALUES ('$question_number','$question_text')";
    // Run query
    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
    // Validate insert
    if ($insert_row){
      // For each of the Choices
      foreach($choices as $choice => $value){
        if ($value != ''){
          if ($correct_choice == $choice){
            $is_correct = 1;
          } else {
            $is_correct = 0;
          }
          // Choice Query
          $query = "INSERT into quizzerChoices (question_number, is_correct, text)
                    VALUES ('$question_number','$is_correct','$value')    ";
          // Run Choice Query
          $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
          // Validate insert
          if ($insert_row){
            continue;
          } else {
            die('Error: ('.$mysqli->errno.') '.$mysqli->error);
          }
        }
      }
      $msg = "Question has been added.";
    }
  } // isset POST

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
    <h2>Add A Question</h2>
    <?php
      if (isset($msg)){
        echo '<p>'.$msg.'</p>';
      }
    ?>
    <form method="post" action="add.php">
      <p>
        <label>Question Number</label>
        <input type="number" value="<?php echo $next; ?>" name="question_number">
      </p>
      <p>
        <label>Question Text</label>
        <input type="text" name="question_text">
      </p>
      <p>
        <label>Choice #1</label>
        <input type="text" name="choice1">
      </p>
      <p>
        <label>Choice #2</label>
        <input type="text" name="choice2">
      </p>
      <p>
        <label>Choice #3</label>
        <input type="text" name="choice3">
      </p>
      <p>
        <label>Choice #4</label>
        <input type="text" name="choice4">
      </p>
      <p>
        <label>Choice #5</label>
        <input type="text" name="choice5">
      </p>
      <p>
        <label>Correct Choice</label>
        <input type="number" name="correct_choice">
      </p>
      <input type="submit" value="Submit" name="submit">
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
