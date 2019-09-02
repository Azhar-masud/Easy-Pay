<?php
#connected data
mysql_connect('localhost','root','');
mysql_select_db('easy_pay');
session_start();
$page=$_GET['page'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>form</title>
</head>
<body>
	
	<?php

	switch ($page) {
		case 'sing_in':
			include"admin_sing_in.php";
			break;
		case 'sing_up':
			include"user_sing_up.php";
			break;
		
		default:
			include"admin_sing_in.php";
			break;
	}
	?>
</body>
</html>