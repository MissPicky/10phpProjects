<?php
/*
* Format the Data
*/
function formatDate($date){
  return date('j. F Y, G:H',strtotime($date));
}
/*
* Shorten the Post
*/
function shortenText($text, $chars = 450){
  $text = $text." ";
  $text = substr($text, 0, $chars);
  $text = substr($text, 0, strrpos($text, ' '));
  $text = $text."...";
  return $text;
}
?>
