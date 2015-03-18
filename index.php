<?php
/*
Created by Alex Morral on 15/03/15.
Copyright (c) 2015 alexmorral. All rights reserved.
*/
	session_start();
	/*We check if we are still logged in. Else head to login to log in again*/
	if(!isset($_SESSION['user_id'])) header("Location: login.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/site.css">
<title>phpMsg</title>
</head>

<body>
<div id="content" style="text-align:center;">
<div id="user-box">
Logged in as <b><i style="color:#FFF"><?php echo $_SESSION['username']; ?> </i></b><br />
<a href="logout.php">Logout</a>
</div>
<h2>Welcome to php<span style="color:#FFF">Msg</span></h2><br /><br />
<h4 style="color:#FFF;">phpMsg is a basic application where you can send and receive messages.</h4>
<div id="links">
You can <a href="sendMsg.php" target="_self">Send a Message</a> <br /> <br />
<span style="color:#FFF;"><b>or</b> </span><br /> <br />
you can <a href="inbox.php" target="_self">Check your Inbox</a>
</div>
</div>
</body>
</html>