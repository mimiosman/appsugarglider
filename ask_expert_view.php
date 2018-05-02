<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: home.php');
}
?>
<?php
// including the database connection file
include_once("connection.php");

//getting id from url
$id = $_GET['id'];
$userId = $_SESSION['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM pakar JOIN login ON pakar.Asker = login.id WHERE pakar.id=$id");

while($res = mysqli_fetch_array($result))
{
  $name = $res['name'];
  $title = $res['Title'];
  $soalan = $res['Soalan'];
  $jawapan = $res['Jawapan'];
  $status = $res['Status'];
  $asker = $res['Asker'];
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
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.php"><strong>Tanya Pakar</strong> </a>
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
    <div class="login-card">
        <div class="thumbnail"><img src="assets/img/sugar_glider1.jpg"></div>
        <form class="form-signin" name="ask_expert" method="post" action="ask_expert.php">
            <input class="form-control" type="Text" placeholder="Penyoal" name="Penyoal" value="<?php echo $name ?>" readonly>
            <input class="form-control" type="Text" placeholder="Tajuk" name="tajuk" value="<?php echo $title ?>" readonly>
            <textarea class="form-control" rows="3" placeholder="Soalan" name="soalan" readonly><?php echo $soalan ?></textarea><br>
            <textarea class="form-control" rows="3" placeholder="Jawapan" name="jawapan" readonly><?php echo $jawapan ?></textarea><br>
						<a class="btn btn-primary btn-block form-control" href="ask_expert.php">KEMBALI</a><br>
						<?php if ($status == 0 && $asker == $userId) { ?>
							<div class="btn-group btn-group-justified" role="group">
								<a class="btn btn-success" role="button" href="ask_expert_edit.php?id=<?php echo $id ?>">KEMASKINI</a>
								<a class="btn btn-danger" role="button" href="ask_expert_delete.php?id=<?php echo $id ?>">PADAM</a>
							</div>
						<?php } ?>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
