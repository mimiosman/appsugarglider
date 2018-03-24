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
  while($res = mysqli_fetch_array($result)) {
    $calc =$res['counts'];
  }
  if (is_null($calc)) {
    $cal=1;
  } else {
    $cal=$calc+1;
  }
  return $cal;
}

function setPenyakit($user,$count){
  include("connection.php");
  $result=mysqli_query($mysqli, "SELECT id_penyakit, COUNT(id_penyakit) AS bilPenyakit FROM diagnosis
    JOIN link ON id_simptom = simptomid
    WHERE answer = 1 AND userid = '$user' AND counts = '$count'
    GROUP BY id_penyakit
    ORDER BY 2 DESC
    LIMIT 1")
  or die("Could not execute the select query penyakit.");
  while($res = mysqli_fetch_array($result)) {
    $sakit =$res['id_penyakit'];
  }
  if (is_null($sakit)) {
    $sick = 0;
  } else {
    $sick = $sakit;
  }
  return $sick;
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
  $sickId = setPenyakit($userId,$count);
  if (is_null($sickId)) {
    $sickId = 0;
  }

  header("Location: illness.php?id=".$sickId);
}
