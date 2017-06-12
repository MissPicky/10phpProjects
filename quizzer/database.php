<?php
  // Create connection credentials
  $db_host='localhost';
  $db_name='database';
  $db_user='user';
  $db_pass='password';

  // Create mysqli-Object
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);

  // Error Handler
  if ($mysqli->connect_error){
    printf ("Connection failed: %s\n", $mysqli->connect_error);
  }


?>
