<?php
/*
Created by Alex Morral on 15/03/15.
Copyright (c) 2015 alexmorral. All rights reserved.
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<div id="content">
<div id="login">

<h2><span style="color:#fcd20a">php</span><span style="color:#fff;">Msg</span></h2>
<?php if(isset($_GET['invalid_login'])) {?>
<div id="error_msg" style="margin-bottom:-38px; margin-top:25px;">
Invalid login!
</div>
<?php }?>
<form action="checkLogin.php" method="post">
	<div id="inputs">
		<input id="namefield" type="text" name="username" placeholder="User"/> <br/>
		<input id="passfield" type="password" name="password" placeholder="Password"/> <br/>
    </div>
    <div id="submit-button">
		<input type="submit" value="Login" />
    </div>
</form>

</div>
</div>
</body>

</html>