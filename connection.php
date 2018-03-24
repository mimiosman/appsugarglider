<?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","root")
			or die("cannot connected");

// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("test2",$conn);
*/

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

 /* local */

// $databaseHost = 'localhost';
// $databaseName = 'test2';
// $databaseUsername = 'root';
// $databasePassword = '';
// $databasePort = '3306';

/* remote */

$databaseHost = 'mysql8.db4free.net';
$databaseName = 'sugarglider';
$databaseUsername = 'sugarglider';
$databasePassword = 'sugarglider';
$databasePort = '3307';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName, $databasePort);

?>
