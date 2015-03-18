<?php 
/*
Created by Alex Morral on 15/03/15.
Copyright (c) 2015 alexmorral. All rights reserved.
*/
    session_start(); 
    if(isset($_SESSION['user_id'])) { 
        session_destroy(); 
        header("Location: login.php"); 
    }
	header("Location: login.php"); 
?>