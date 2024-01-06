
<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
			background-image: url(backround5.jpg);
			background-repeat: no-repeat;
			background-size: 1400px;
			background-attachment: fixed;
			width: 100%;
			background-position: top;	
		
		}
	</style>
	<title>inscription</title>
</head>
<body>
	<?php 
$con=mysqli_connect('localhost','root','','gestion_de_stockage');
if(isset($_POST['nom']) && isset($_POST['prenom'])  && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['optradio']))
{
	$a=$_POST['nom'];
	$b=$_POST['prenom'];
	$c=$_POST['email'];
	$d=$_POST['password'];
	$post=$_POST['optradio'];
	if (empty($a)) {


			echo '<script type = "text/javascript">';
        echo 'alert("il faut remplir les champs!");';
        echo 'window.location.href = "inscription.php" ';
        echo '</script>';
		
	}
		


	if ($post=="gestionnaire") {
	 
		$sql="INSERT INTO  gestionnaire(nom_gest , prenom_gest , email_gest, password_gest)values ('$a','$b','$c','$d')";
		$ins="INSERT INTO  users(email_user, password_user , role)values ('$c','$d','gestionnaire')";

        $res1=$con->query($ins) ; 
		$res=$con->query($sql) ; 
	}
	else if ($post=="comptable") {
	 
		$sql="INSERT INTO  comptable(nom_comp , prenom_comp, email_comp, password_comp) VALUES ('$a','$b','$c','$d')";
		$ins="INSERT INTO  users(email_user, password_user , role)values ('$c','$d','comptable')";

        $res1=$con->query($ins) ; 
		$res=$con->query($sql) ; 
	}
	else {
	 
		$sql="INSERT INTO  employe(nom_emp , prenom_emp, email_emp, password_emp) VALUES ('$a','$b','$c','$d')";
		$ins="INSERT INTO  users(email_user, password_user , role)values ('$c','$d','employee')";

        $res1=$con->query($ins) ; 
		$res=$con->query($sql) ; 
	}
}

 if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['optradio']))
{
	$sql="INSERT INTO  users(login , password, role) VALUES ('$c','$d', '$post')";


		$res=$con->query($sql) ;
}

?>
<div class="alert alert-success">
  <strong>Success!</strong> <?php echo "BOUNJOUR " . $a."  ".$b ."VOTRE POSTE EST:".$post." VOUS ETES INSCRIT DANS L'APPLICATION"?></br>
  <?php 
  echo "VOUS POUVEZ MAINTENANT ACCEDER L'APPLICATION"; ?>
 
</div>
<div align="center">
<form action="index.php">
	<input align="center" type="submit" name="inscrire"  class="btn btn-success" value="ACCEDER">
</form>
</div>
</body>
</html>
