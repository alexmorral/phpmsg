<?php
/*
Created by Alex Morral on 15/03/15.
Copyright (c) 2015 alexmorral. All rights reserved.
*/
$hostCon = "localhost";
$usernamCon = "root";
$pwdCon  = "root";
$dbCon = "phpMsg";

// Create connection
$conn = new mysqli($hostCon, $usernamCon, $pwdCon, $dbCon);

// Check connection
if ($conn->connect_errno) die("Connection failed: " . $conn->connect_error);


?>