<?php
	/*
Created by Alex Morral on 15/03/15.
Copyright (c) 2015 alexmorral. All rights reserved.
*/
	session_start();
	/*We check if we are still logged in. Else head to login to log in again*/
	if(!isset($_SESSION['user_id'])) header("Location: login.php");
	require_once("incl-func.php");
	
	/* We get all usernames and assign them to an array as the following way:
		Array Key: user id
		Array Value: username string
	We need to do this because later we need to know who's the sender and who the receiver.*/
	$urResult = getUsernames();
	$usernames = array();
	while($row = $urResult->fetch_assoc()) {
			$usernames[$row['id']] = $row['username'];
	}
	$urResult->free();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Inbox</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/site.css">
<script>
$(document).ready(function(){
	/*If the message is too long. We can see it full-sized by clicking on it.*/
	$(".second-line").click(function(event) {
		var id = $(this).attr("id");
		$("#msg_"+id).slideToggle();
	});
	/*If we click DELETE, send an AJAX petition to delete the message from the DB and we hide the messages from the list*/
	$(".delete").click(function(event) {
		var id = $(this).attr("id");
		$.ajax({
                url: 'incl-func.php',
                type: 'POST',
                data: {	action: "delete", msg_id: id},
                success: function (result) {
                  	$("#msg_"+id).slideUp();
					$("#head_"+id).slideUp();
					$("#hr_"+id).slideUp(); }
            });
	});
});
</script>
</head>
<body>
<div id="content">
<div id="back-box">
<h2><a href="index.php" style="color:#fff;"><</a></h2>
</div>
<div id="user-box">
Logged in as <b><i style="color:#FFF"><?php echo $_SESSION['username']; ?> </i></b><br />
<a href="logout.php">Logout</a>
</div>
<h2>Messages <span style="color:#fff;">Recieved</span></h2>
<div id="messages-received">
<?php
	/*We get all the messages the user has received*/
	$result = getMessagesRecieved($_SESSION["user_id"]);
	while($row = $result->fetch_assoc()) {
		echo "<div id='head_" . $row["id"] . "' class='first-line'>";
		echo "<span id='" . $row["id"] . "' class='second-line'>";
		echo "<b>Sender: </b>" . $usernames[$row['sender_id']] . " - <b>Subject: </b>" . $row["subject"] ; 
		echo "</span>";
		echo "<span id='" . $row["id"] . "' class='delete'>X</span>". "<br>";
		echo "</div>";
		echo "<div id='msg_". $row["id"] ."' style='display:none; padding-left:2px;'>";
		echo "<b>Message: </b>" . $row["message"];
		echo "</div>";
		echo "<hr id='hr_" . $row["id"] . "' />";
		
	}
	if( $result->num_rows == 0) {
		echo "<div style='text-align:center;'> You have no messages. </div>";
	}
	$result->free();
?>
</div>
<br />
<h2>Messages <span style="color:#fff;">Sent</span></h2>
<div id="messages-sent">
<?php
	/*We get all the messages the user has sent*/
	$result = getMessagesSent($_SESSION["user_id"]);
	while($row = $result->fetch_assoc()) {
		echo "<div id='head_" . $row["id"] . "' class='first-line'>";
		echo "<span id='" . $row["id"] . "' class='second-line'>";
		echo "<b>Receiver: </b>" . $usernames[$row['receiver_id']] . " - <b>Subject: </b>" . $row["subject"] ; 
		echo "</span>";
		echo "<span id='" . $row["id"] . "' class='delete'>X</span>". "<br>";
		echo "</div>";
		echo "<div id='msg_". $row["id"] ."' style='display:none; padding-left:2px;'>";
		echo "<b>Message: </b>" . $row["message"];
		echo "</div>";
		echo "<hr id='hr_" . $row["id"] . "' />";
	}
	if( $result->num_rows == 0) {
		echo "<div style='text-align:center;'> You have no messages. </div>";
	}
	$result->free();
?>
</div>
</div>
<div id="instruct-box" style="color:#ed387a;">
<h6>You can see the messages by clicking on them</h6>
</div>
</body>
</html>