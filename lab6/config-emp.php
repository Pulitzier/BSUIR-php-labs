<?php 
	$dblocation="localhost";
	$dbuser="root";
	$dbpasswd="";
	$dbname="ipr6";
	$dbcnx = mysqli_connect($dblocation, $dbuser, $dbpasswd, $dbname);

	mysqli_set_charset($dbcnx,"utf8");

	if (!$dbcnx) {
		echo "Connection error";
		exit();
	};

?>