<?php include 'database.php' ?>
<?php session_start();?>

<?php
// Get total questions
$query = "SELECT * FROM quizzerQuestions";
// Get the results
$questions = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $questions->num_rows;

  // Check to see if score is set
  if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
  }

  if ($_POST){
    $number=$_POST['number'];
    $selected_choice=$_POST['choice'];
    $next = $number+1;

    // Get correct choice
    $query = "SELECT * FROM quizzerChoices
              WHERE question_number = $number AND is_correct =1";
    // Get result
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    // Get row
    $row = $result->fetch_assoc();
    // Set correct_choice
    $correct_choice = $row['id'];

    // Compare
    if ($correct_choice == $selected_choice){
      $_SESSION['score']++;
    }

    // Last question?
    if ($number == $total){
      header("LOCATION: final.php");
      exit();
    } else {
      header("LOCATION:question.php?n=".$next);
    }

  }


?>
