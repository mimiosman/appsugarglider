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
  <link rel="manifest" href="assets/img/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.php"><strong>Penjagaan</strong> </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="diagnosis.php">Diagnosis</a></li>
                    <li role="presentation"><a href="ask_expert.php">Tanya Pakar</a></li>
                    <li role="presentation"><a href="care_tips.php">Penjagaan</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="login-card">
      <div class="row">
        <div class="col">
          <img class="img-thumbnail" src="assets/img/cagesugarglider.png" height="100" width="100">
          <h4><strong>Sangkar</strong> </h4>
          <p class="text-justify">Sangkar sugar gliders adalah salah satu komponen penting dalam memastikan mereka dapat rasa selesa dalam persekitaran baru mereka.<a data-toggle="collapse" data-target="#demo">Lagi..</a></p>
          <p class="text-justify collapse" id="demo">Sugar gliders anda akan meluangkan majoriti masa mereka pada waktu malam di dalam sangkar mereka dan dengan memastikan bahawa sugars anda selesa, selamat&nbsp;dan bebas bersenam dengan sesuka hati mereka. </p>

        </div>
        <div class="col">
          <img class="img-thumbnail" src="assets/img/sugar_glider3.png" height="100" width="100">
          <h4><strong>Makanan</strong> </h4>
          <p class="text-justify">Sugar glider boleh dihidangkan dengan makanan seperti buah-buahan yang berlainan khasiat buatnya.<a data-toggle="collapse" data-target="#demo2">Lagi..</a></p>

          <p class="text-justify collapse" id="demo2">Keaktifan Sugar glider menyebabkan sugar glider sangat memerlukan&nbsp;<strong>protein </strong>dalam jumlah tinggi untuk memenuhi keperluan tenaga mereka. Protein dan kalsium sangat diperlukan untuk meningkatkan metabolisme seekor Sugar glider. Kekurangan protein dapat menyebabkan pertumbuhan Sugar Glider terbantut dan kelihat kurus, sementara kekurangan kalsium dapat menyebabkan masalah yang lebih serius seperti Hind Leg Paralysis (HLP).
          </p>
        </div>
      </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
