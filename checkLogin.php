<?php
/*
Created by Alex Morral on 15/03/15.
Copyright (c) 2015 alexmorral. All rights reserved.
*/
	session_start();
	require_once('db_connection.php');
	/*First we check if the form has been sent*/
	if(isset($_POST["username"]) && isset($_POST["password"])) {
		/*We escape the strings to prevent sql injection*/
		$username = $conn->real_escape_string($_POST["username"]);
		$password = $conn->real_escape_string($_POST["password"]);
		
		/*We could encrypt the password but I think is not the objective of this application
			We could have used a basic encryption like md5() or something like that.*/
		
		/*We query on the table with the data introduced*/
		$result = $conn->query("SELECT * FROM users WHERE username ='$username' AND password = '$password'");
		/*We check if the query is empty. That means that we check if the username exists and the pwd is correct.*/
		if($row = $result->fetch_assoc()) {
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			header("Location: index.php");
		}
		else {
			/*Something failed during the check. Let the login.php handle that with the $_GET variable*/
			header("Location: login.php?invalid_login=1");
		}
		$result->free();
	}
?>