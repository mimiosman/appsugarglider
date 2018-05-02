<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
  header('Location: home.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM simptom");
$num = 0;
$userId = $_SESSION['id'];
?>

<?php
function divide($count){
  if ($count <= 5) {
    $tab = 1;
  } elseif ($count >= 6 and $count <= 10) {
    $tab = 2;
  } elseif ($count >= 11 and $count <= 15) {
    $tab = 3;
  } elseif ($count >= 16 and $count <= 20) {
    $tab = 4;
  }
  return $tab;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SG App</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
  <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="assets/img/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
  <!-- <link rel="manifest" href="assets/img/favicon/manifest.json"> -->
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!-- web app manifest for Android Chrome -->
  <link rel="manifest" href="manifest.json" />
  <link href="assets/img/favicon/favicon.ico" rel="shortcut icon">
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.php"><strong>Simptom</strong> </a>
        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav">
          <li role="presentation"><a href="diagnosis.php">Diagnosis</a></li>
          <li role="presentation"><a href="ask_expert.php">Tanya Pakar</a></li>
          <li role="presentation"><a href="care_tips.php">Penjagaan</a></li>
          <li role="presentation"><a href="logout.php">Log Keluar</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="thumbnail">
    <form id="save" action="simptom_save.php" method="post">
      <?php
      while($res = mysqli_fetch_array($result)) {
        $num++;
        $tabNum = divide($num);
        ?>
        <div class="caption tab<?php echo $tabNum; ?>">
          <p><?php echo $num . ". " . $res['detail']; ?></p>
          <div class="btn-group btn-group-justified" role="group">
            <label class="radio-inline"><input type="radio" name="ansArr[<?php echo $num; ?>]" value="1" required>Ya</label>
            <label class="radio-inline"><input type="radio" name="ansArr[<?php echo $num; ?>]" value="0">Tidak</label>
            <input type="hidden" name="simpArr[<?php echo $num; ?>]" value="<?php echo $res['id']; ?>">
          </div>
        </div>
        <?php
      }
      ?>
      <input type="hidden" name="count" value="<?php echo $num; ?>">
      <input type="hidden" name="userId" value="<?php echo $userId; ?>">
      <button type="button" id="btn1" class="btn btn-primary btn-block">Seterusnya</button>
      <button type="button" id="btn2" class="btn btn-primary btn-block">Seterusnya</button>
      <button type="button" id="btn3" class="btn btn-primary btn-block">Seterusnya</button>
      <input type="submit" id="btn4" class="btn btn-primary btn-block" name="bulk_add_submit" value="LIHAT KEPUTUSAN">
    </form>
  </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $(".tab1").show();
    $(".tab2").hide();
    $(".tab3").hide();
    $(".tab4").hide();
    $("#btn1").show();
    $("#btn2").hide();
    $("#btn3").hide();
    $("#btn4").hide();

    $("#btn1").click(function(){
      $(".tab1").hide();
      $(".tab2").show();
      $(".tab3").hide();
      $(".tab4").hide();
      $("#btn1").hide();
      $("#btn2").show();
      $("#btn3").hide();
      $("#btn4").hide();
    });

    $("#btn2").click(function(){
      $(".tab1").hide();
      $(".tab2").hide();
      $(".tab3").show();
      $(".tab4").hide();
      $("#btn1").hide();
      $("#btn2").hide();
      $("#btn3").show();
      $("#btn4").hide();
    });

    $("#btn3").click(function(){
      $(".tab1").hide();
      $(".tab2").hide();
      $(".tab3").hide();
      $(".tab4").show();
      $("#btn1").hide();
      $("#btn2").hide();
      $("#btn3").hide();
      $("#btn4").show();
    });
  });
  </script>
</body>

</html>
