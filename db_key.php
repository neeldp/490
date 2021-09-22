<?php
	$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$cleardb_server = $cleardb_url["host"];
	$cleardb_username = $cleardb_url["user"];
	$cleardb_password = $cleardb_url["pass"];
	$cleardb_db = substr($cleardb_url["path"], 1);

	#$sql_host="localhost";
	#$sql_username="root";
	#$sql_password='';
	#$sql_database="users";
	function connect_db() {
		global $cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db;
		$conn=new mysqli($cleardb_server,$cleardb_username,$cleardb_password);
		if(mysqli_connect_error() !== null){
			return false;
		}
		$conn -> select_db($cleardb_db);
		return $conn;
	}

?>