<!DOCTYPE html>
<html>
<head>

	<title>gestion de stockage </title>
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
	<link rel="stylesheet" type="text/css" href="monstyle.css">
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>


<h1 align="center"><B>GESTION DE STOCKAGE</B></h1>
	<form action="acceuil.php" method="POST" >
		<table class="Authentification" id="table" align="center" border="3"  >
			<tr width="150px" height="100px">
				<td  width="100px" height="100px">
		<div >
			<h1 align="center"> Authentification</h1></br>
			<label><B>Email:</B></label></br>
				<input type=text name="email" style="width:250px"></br>
				<label><B>Mot de passe :</B></labele></br>
				<input type="password" name="password" style="width: 250px"></br>
				<p>vous étes un:</p>
			<label><input type="radio" name="optradio" value="compt" checked><B>comptable</B></label>
		</div>
		<div class="radio">
			<label><input type="radio" name="optradio" value="emp" ><B>employee</B></label>
		</div>
		<div class="radio disabled">
			<label><input type="radio" name="optradio" value="gest" ><B>gestionnaire</B></label>
		</div>
				<input type="submit" name="login">
				<a href="inscription.php">inscrivez-vous.</a>
		</div>
	            </td>
	        </tr>
	    </table>
	</form>
	

</body>
</html>