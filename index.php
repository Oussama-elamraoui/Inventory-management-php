<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<title>gestion de stockage </title>
	<style type="text/css">
		body{
			background-image: url(logooussama.jpeg);
			background-repeat: no-repeat;
			background-size: 700px;
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


<h1 align="center"><B>GESTION DE STOCK</B></h1>
	<form  action="verifierLogin.php" method="POST">
		<table style=" width: 40%; box-shadow: 6px 6px 0px midnightblue;" id="table" align="center" border="3"  >
			<tr width="150px" height="100px">
				<td  width="100px" height="100px">
		<div >
			<h2 align="center"> Authentification</h2></br></br></br>
			<label  ><B>Email:</B></label></br>
				<input type=text name="email" style="width:250px"></br>
				<label  ><B>Password :</B></labele></br>
				<input type="password" name="password" style="width: 250px"></br>
				<I><B><p >vous étes un:</p></B></I>
			<label><input type="radio" name="optradio" value="comptable" checked><B>Comptable</B></label>
		</div>
		<div class="radio">
			<label><input type="radio" name="optradio" value="employee" ><B>Employe</B></label>
		</div>
		<div class="radio disabled">
			<label><input type="radio" name="optradio" value="gestionnaire" ><B>Gestionnaire</B></label>
		</div>
				<input type="submit" value="Log in" class="btn btn-success" name="login">
				<a style="background-color: black" href="inscription.php">inscrivez-vous.</a>
		</div>
	            </td>
	        </tr>
	    </table>
	</form>
	
	

</body>
</html>