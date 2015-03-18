<?php
/*
Created by Alex Morral on 15/03/15.
Copyright (c) 2015 alexmorral. All rights reserved.
*/
	session_start();
	/*We check if we are still logged in. Else head to login to log in again*/
	if(!isset($_SESSION['user_id'])) header("Location: login.php");
	/*We check if we have sent a message. If true wait 3 seconds and head to index*/
	if(isset($_POST["userReceiv"]) && !empty($_POST["message"]) && !empty($_POST["subject"])) header('Refresh:3; URL=index.php');
	require("incl-func.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Send message</title>
<link rel="stylesheet" type="text/css" href="css/site.css">

</head>

<body>
<div id="content">
<div id="message-box">
<div id="back-box">
<h2><a href="index.php" style="color:#FFF;"><</a></h2>
</div>
<div id="user-box">
Logged in as <b><i style="color:#FFF"><?php echo $_SESSION['username']; ?> </i></b><br />
<a href="logout.php">Logout</a>
</div>
<?php
/*We check if the form is sent. If true, then we send the message. Else we show the message form*/
	if(isset($_POST["userReceiv"]) && !empty($_POST["message"]) && !empty($_POST["subject"])) {
		global $conn;
		$receiverId = $_POST["userReceiv"];
		$senderId = $_POST["userSend"];
		$msg = $conn->real_escape_string($_POST["message"]);
		$subj = $conn->real_escape_string($_POST["subject"]);
		/*We insert the data to the messages table*/
		$queryString = "INSERT INTO messages (receiver_id, sender_id, subject, message) VALUES($receiverId, $senderId, '$subj', '$msg')";
		if(!$conn->query($queryString)) echo "Error: " . $conn->error;
		else {
		?>
        	<h2>Message Sent!</h2> <br /> <br/>
            <div id="message-info">
            <span style="color:#fff">Message sent succesfully.</span><br /> <br/> <br/> <br/>
            
            You will now be redirected to index...  <br/> <br /> <br/> <br/>
            or you can go directly to <a href="index.php">index</a>.
            </div>
            
        <?php
		
		}
	} else {
?>
<h2>Send a <span style="color:#fff;">Message</span></h2>
<form method="post" id="sendMsgForm">
<input type="hidden" name="userSend" value="<?php echo $_SESSION["user_id"]; ?> " />
<label>Receiver:</label> <br/>
<select name="userReceiv">
	<?php
		/*We get all the users we can send a message*/
		$result = getUsernameStrings($_SESSION['user_id']);	
		while($row = $result->fetch_assoc()) {
			echo "<option value='" . $row['id'] . "'>" . 	$row['username'] . "</option>";
		}
		$result->free();
	?>
</select><br/>
<label>Subject:</label> <br/>
<input type="text" name="subject" /> <br/>
<?php if(isset($_POST["userReceiv"]) && (empty($_POST["message"]) || empty($_POST["subject"]))) {?>
<div style="position:absolute; margin-top:-30px; left:600px;"><h5>You must fill in all the fields</h5></div>
<?php }?>
<label>Message:</label> <br />
<textarea name="message"></textarea> <br/>
<div id="submit-button">
	<input id="submit-button" type="submit" value="Send" />
</div>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
