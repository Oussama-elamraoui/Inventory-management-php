<?php
	session_start();
	include "connexion_avec_bd.php";
	if (isset($_POST['email']) && isset($_POST['password'])) {

		$em=$_POST['email'];
		$pass=$_POST['password'];
		$role=$_POST['optradio'];
		//echo $em;
		//echo $pass;
		//echo $role;
		// $sql="SELECT count(*) from users WHERE email_user='$em' AND password_user='$pass'";
		//@$query = "SELECT * FROM users WHERE login ='$username' AND mdp='$password' AND role='$role';";
	 	//@$result = mysqli_query($conn, $query)or die ('Erreur BDD : '.mysqli_error($conn) );
		$sql="SELECT * from users WHERE email_user='$em' AND password_user='$pass' AND role='$role';";
		@$res = mysqli_query($con, $sql)or die ('Erreur BDD : '.mysqli_error($con) );
		  //$res=$con->query($sql); 
		  //$nbr= count($res);
		  if(mysqli_num_rows($res) > 0){
		  	//echo "iciiiiiiiiii";
		  	header("location:acceuil.php");
		
		}
		else{
			
			
			echo '<script type = "text/javascript">';
        echo 'alert("Invalid Username or Password!");';
        echo 'window.location.href = "index.php" ';
        echo '</script>';
		}
	}
	?>