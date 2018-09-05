<?php

	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.
	
	define('DBHOST', 'docker1');
	define('DBUSER', 'dbbob');
	define('DBPASS', 'ThePass');
	define('DBNAME', 'dbtest');

    $conn = new mysqli("192.168.9.12", "dbbob", "ThePass", "testdb") or die("Error " . mysqli_error($conn));


	
	//$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	//$dbcon = mysql_select_db(DBNAME);
	
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	
echo "Connected successfully";

//	if ( !$dbcon ) {
//		die("Database Connection failed : " . mysql_error());
//	}