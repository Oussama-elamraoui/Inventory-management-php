<!DOCTYPE>
<html>
<head>
	<title>check_login</title>
</head>
<body>

	<?php
		 session_start();
     include "connexion_avec_bd.php";  
	if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['optradio']))
	{
		function test_input($data) 
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		 $email = test_input($_POST['email']);
		 $password = test_input($_POST['password']);
		 $role = test_input($_POST['optradio']);
		 //echo "BONJOUR "." ".$username." ".$password." ".$role;

		 if (empty($email)){

		 	header("Location:./login.php?error= User Name is Required");

		 }else if (empty($password)){

		 	header("Location:./login.php?error= Password is Required");

		 } else {
		 header('Location:./code.php?username='.$email.'&password='.$password.'&role='.$role.'');
		 }

	
         }else {
         	header("Location:./login.php");
         }

 ?>
</body>
</html>