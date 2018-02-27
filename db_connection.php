<?php

function OpenCon(){
	 $dbhost = "localhost";
		$dbuser="root";
		$dbpass=/*"insert your password here"*/;
		$db=/*"insert your database name here. Mine's potato"*/;
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connection failed: %s \n". $conn->error);
		return $conn;
	}
	function closecon($conn){
		$conn->close();
	}
?>
