<?php session_start(); ?>
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
  <div class="login-card">
    <div class="thumbnail"><img src="assets/img/sugar_glider1.jpg"></div>
    <?php
    include("connection.php");

    if(isset($_POST['submit'])) {
      $user = mysqli_real_escape_string($mysqli, $_POST['username']);
      $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

      if($user == "" || $pass == "") {
        echo "Sila isi katanama dan katalaluan.";
        echo "<br/>";
        echo "<a href='login.php'>Kembali</a>";
      } else {
        $result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
        or die("Could not execute the select query.");

        $row = mysqli_fetch_assoc($result);

        if(is_array($row) && !empty($row)) {
          $validuser = $row['username'];
          $_SESSION['valid'] = $validuser;
          $_SESSION['name'] = $row['name'];
          $_SESSION['id'] = $row['id'];
        } else {
          echo "Katanama dan katalaluan tidak sah.";
          echo "<br/>";
          echo "<a href='login.php'>Kembali</a>";
        }

        if(isset($_SESSION['valid'])) {
          header('Location: index.php');
        }
      }
    } else {
    ?>
    <form class="form-signin" name="form1" method="post" action="">
      <input class="form-control" type="email" required="" placeholder="Alamat Emel" autofocus="" name="username">
      <input class="form-control" type="password" required="" placeholder="Katalauan" name="password">
      <div class="checkbox">
        <div class="checkbox">
          <label>
            <input type="checkbox">Ingatkan saya
          </label>
        </div>
      </div>
      <button class="btn btn-primary btn-lg btn-signin" name="submit" type="submit">LOG MASUK</button>
    </form>
    <?php
    }
    ?>
    <a href="#Terlupa Katalaluan" class="forgot-password">Anda terlupa katalaluan?</a>
  </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
