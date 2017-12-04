<?php 
	$dblocation="localhost";
	$dbuser="root";
	$dbpasswd="";
	$dbname="bookby";
	$dbcnx = @mysql_connect($dblocation, $dbuser, $dbpasswd);

	if (!$dbcnx) {
		echo "Connection error";
		exit();
	};

	if (!@mysql_select_db($dbname, $dbcnx)) {
		echo "Requested DB does not available at the moment. Try again later.";
		exit();
	}

?>