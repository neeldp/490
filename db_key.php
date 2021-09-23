<?php
	$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$sql_host = $cleardb_url["host"];
	$sql_username = $cleardb_url["user"];
	$sql_password = $cleardb_url["pass"];
	$sql_database = substr($cleardb_url["path"], 1);

	
	function connect_db() {
		global $sql_host, $sql_username, $sql_password, $sql_database;
		$conn=new mysqli($sql_host,$sql_username,$sql_password);
		if(mysqli_connect_error() !== null){
			return false;
		}
		$conn -> select_db($sql_database);
		return $conn;
	}

?>