<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['add']))
{
  $name = $_POST['name'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // checking empty fields
  if(empty($name) || empty($username) || empty($password) || empty($confirm_password)) {

    if(empty($name)) {
      echo "<font color='red'>Ruang nama kosong.</font><br/>";
    }

    if(empty($username)) {
      echo "<font color='red'>Ruang kata nama kosong.</font><br/>";
    }

    if(empty($password)) {
      echo "<font color='red'>Ruang kata laluan kosong.</font><br/>";
    }

    if(empty($confirm_password)) {
      echo "<font color='red'>Ruang sahkan kata laluan kosong.</font><br/>";
    }
  } else {
    //updating the table
    $result = mysqli_query($mysqli, "INSERT INTO `login`(`name`, `email`, `username`, `password`) VALUES ('$name', '$username', '$username', md5('$password'))")
    or die("Could not execute the select query.");

    //redirectig to the display page. In our case, it is view.php
    header("Location: login.php");
  }
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
  <div class="login-card">
    <div class="thumbnail"><img src="assets/img/sugar_glider1.jpg"></div>
    <form class="form-signin" name="form1" method="post" action="register.php" ><span class="reauth-email"> Sila isi diruangan yang disediakan.</span>
      <input class="form-control" type="text" required="" placeholder="Nama" autofocus="" name="name">
      <input class="form-control" type="email" required="" placeholder="Alamat Emel" autofocus="" name="username">
      <input class="form-control" type="password" required="" placeholder="Katalaluan" name="password">
      <input class="form-control" type="password" required="" placeholder="Ulang Katalaluan" name="confirm_password">
      <div class="checkbox">
        <div class="checkbox">
          <label>
            <input type="checkbox" required>Saya telah baca dan segala terma dan syarat.
          </label>
        </div>
      </div>
      <input class="btn btn-primary btn-block btn-lg btn-signin" name="add" type="submit" value="DAFTAR">
    </form>
  </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
