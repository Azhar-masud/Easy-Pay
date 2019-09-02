<?php
	include("connect/connected.php");
	session_start();
	$page=$_GET['page'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php

	switch ($page)
	 {
		case 'login':
			include"user_sign_in.php";
			break;
		case 'sing_up':
			include"user_sign_up.php";
			break;
		case 'sing_in':
			include"user_sign_in.php";
			break;
		
		default:
			include"user_sign_in.php";
			break;
	}

	?>
</body>
</html>