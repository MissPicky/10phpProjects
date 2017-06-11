<?php
// Connect to Database
$con = mysqli_connect("localhost","user","password","database");
// Test connection_
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: ".mysqli_connect_error();
}
?>
