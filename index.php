<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: home.php');
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
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.php"><strong>Utama</strong> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="diagnosis.php">Diagnosis</a></li>
                    <li role="presentation"><a href="ask_expert.php">Tanya Pakar</a></li>
										<li role="presentation"><a href="question.php">Soalan Saya</a></li>
                    <li role="presentation"><a href="care_tips.php">Penjagaan</a></li>
                    <li role="presentation"><a href="logout.php">Log Keluar</a></li>
                </ul>
            </div>
        </div>
    </nav>
		<br>
		<br>
    <div class="login-card">
      <div class="rows">
        <h1>Sugar Glider</h1>
        <div class="thumbnail">
          <img src="assets/img/sugar_glider3.png">
        </div>
        <p class="text-justify"><em>Sugar Glider</em> atau nama saintifiknya <em>Pretaurus Breviceps</em> merupakan haiwan <em>marsupial</em> yangberasal dari Australia, dan sebahagian daripada Indonesia dan New Guinea. Haiwan ini bukan tergolong dalam spesies tupai terbang, dan diklasifikasikan sebagai haiwan eksotik di Amerika. <a data-toggle="collapse" data-target="#demo">Lagi..</a></p>
        <p class="text-justify collapse" id="demo">Haiwan ini juga adalah haiwan <em>nocturnal</em> iaitu berjaga dan mencarimakanan pada waktu malam hari dan tidur sepanjang siang hari. Haiwan ini jika melahirkan anak, ia akan di jaga dan disusui di dalam kantung perut ibunya samasebagaimana kanggaru. Nama <em>Sugar Glider</em> datangnya daripada pemakanan mereka yang gemar makan buah-buahan manis (gula atau madu) dan <em>Glider</em> dari tingkahlaku mereka yang suka melompat dan menjunam menggunakan membran yang dinamakan <em>patagium</em>.</p>
      </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
