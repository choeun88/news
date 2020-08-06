<?php
// define('DB_SERVER','localhost');
// define('DB_USER','root');
// define('DB_PASS' ,'');
// define('DB_NAME','news');
// $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// // Check connection
// if (mysqli_connect_errno())
// {
//  echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }

		$servername = "127.0.0.1";
		$username = "root";
		$password = "12345";
		$dbname = "news";
		$con = new mysqli($servername, $username, $password, $dbname);
		if ($con->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		
?>