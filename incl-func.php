<?php
/*
Created by Alex Morral on 15/03/15.
Copyright (c) 2015 alexmorral. All rights reserved.
*/
require_once("db_connection.php");

/*Deletes a message with id = $_POST["id"] when this page it's called by the AJAX petition*/
if(isset($_POST['action']) &&  $_POST['action']=="delete") {
		global $conn;
		$conn->query("DELETE FROM messages WHERE id=" . $_POST['msg_id']);
}


/*It returns all username strings except for the own user. Used in sendMsg page to know the other users available*/
function getUsernameStrings($ownUserId) {
	global $conn;
	$result = $conn->query("SELECT id, username FROM users WHERE id != $ownUserId");
	return $result;
}

/*It returns all usernames and ids. Used in inbox page to know who's the receiver and who the sender*/
function getUsernames() {
	global $conn;
	$result = $conn->query("SELECT id, username FROM users");
	return $result;
}

/*It returns all the messages received for the user with id=$ownUserId. Used in inbox page*/
function getMessagesRecieved($ownUserId) {
	global $conn;
	$result = $conn->query("SELECT * FROM messages WHERE receiver_id = $ownUserId ORDER BY id DESC");
	return $result;
}

/*It returns all the messages sent for the user with id=$ownUserId. Used in inbox page*/
function getMessagesSent($ownUserId) {
	global $conn;
	$result = $conn->query("SELECT * FROM messages WHERE sender_id = $ownUserId ORDER BY id DESC");
	return $result;
}


?>