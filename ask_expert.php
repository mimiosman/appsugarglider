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
$result = mysqli_query($mysqli, "SELECT *, pakar.id AS id_pakar, login.id AS id_login FROM pakar JOIN login ON pakar.Asker = login.id WHERE pakar.Status = 1");
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

	<!-- style for pagination button -->
	<style media="screen">
	.page-navigation a {
		margin: 0 2px;
		display: inline-block;
		padding: 3px 5px;
		color: #ffffff;
		background-color: #70b7ec;
		border-radius: 5px;
		text-decoration: none;
		font-weight: bold;
	}

	.page-navigation a[data-selected] {
		background-color: #3d9be0;
	}
	</style>
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
		<div class="thumbnail"><img src="assets/img/sugar_glider1.jpg"></div>
		<input class="form-control" type="Text" placeholder="Carian" autofocus="" id="filter">
		<br>
		<table class="table table-striped table-responsive" id="myTable">
			<thead>
				<tr>
					<th>Penyoal</th>
					<th>Tajuk</th>
				</tr>
			</thead>
			<tbody id="soal">
				<?php
				while($res = mysqli_fetch_array($result)) {
					?>
					<tr>
						<td><?php echo $res['name']; ?></td>
						<td><a href='ask_expert_view.php?id=<?php echo $res['id_pakar']; ?>'><?php echo $res['Title']; ?></a></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
		<br>
		<!-- <a class="btn btn-primary btn-block btn-signin form-control" href="ask_expert_add.php">Tambah Soalan</a> -->
	</div>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery-paginate.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function(){
	  $("#filter").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $("#soal tr").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	    });
	  });
		$('#myTable').paginate({
			limit: 5, //  elements per page
		  // initialPage: 1, // Start on second page
		  previous: true, // Show previous button
		  previousText: 'Sebelumnya', // Change previous button text
		  next: true, // Show previous button
		  nextText: 'Seterusnya', // Change next button text
		  first: false, // Show first button
		  firstText: 'First', // Change first button text
		  last: false, // Show last button
		  lastText: 'Last', // Change last button text
		  // optional: false, // Always show the navigation menu
		  // onCreate: function(obj) { console.log('Pagination done!'); } // `onCreate` callback
		  // onSelect: function(obj, i) { console.log('Page ' + i + ' selected!'); } // `onSelect` callback
		  // childrenSelector: 'tbody > tr.ugly', // Paginate the rows with the `ugly` class
		  // navigationWrapper: $('div#myNavWrapper'), // Append the navigation menu to the `#myNavWrapper` div
		  // navigationClass: 'my-page-navigation', // New css class added to the navigation menu
		  // pageToText: function(i) { return (i + 1).toString(16); } // Page numbers will be shown on hexadecimal notation
		});
	});
	</script>
</body>

</html>
