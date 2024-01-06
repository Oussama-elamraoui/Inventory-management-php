<?php 
	require_once("security.php");
?>
<?php 
	require_once("conn.php");
	$login=$_POST['email'];
	$pass=md5($_POST['password']);
	$ps=$pdo->prepare("SELECT * FROM USERS WHERE LOGIN='$login' AND PASSWORD='$pass'");
	$params=array($login,$pass);
	$ps->execute($params);
	
	if($user=$ps->fetch()){
		echo "iciiiiiiiiiii";
		session_start();
		$_SESSION['PROFILE']=$user;
		header("location:acceuil.php");
	}
	else {
		echo "erreur";
		//header("location:index.php");
	}
?>