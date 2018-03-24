<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
  header('Location: login.php');
}
?>
<?php

//including the database connection file
include("connection.php");

function checkExist($user){
  include("connection.php");
  $result=mysqli_query($mysqli, "SELECT DISTINCT `counts` FROM `diagnosis` WHERE `userid` = '$user' ORDER BY 1 DESC LIMIT 1")
  or die("Could not execute the select query.");
  $res = mysqli_fetch_assoc($result);
  $calc = $res['count'];
  if ($res == '') {
    $cal = 1;
  } else {
    $cal = $calc + 1;
  }
  return $cal;
}

if(isset($_POST['bulk_add_submit'])){
  $num = $_POST['count'];
  $userId = $_POST['userId'];
  $ansArr = $_POST['ansArr'];
  $simpArr = $_POST['simpArr'];
  $count = checkExist($userId);
  for ($i=1; $i <= $num; $i++) {
    $simp = $simpArr[$i];
    $ans = $ansArr[$i];
    $result=mysqli_query($mysqli, "INSERT INTO `diagnosis`(`userid`, `simptomid`, `answer`, `counts`) VALUES ('$userId','$simp','$ans', '$count')")
    or die("Could not execute the INSERT query.");
  }

  header("Location: illness.php?id=");
}
