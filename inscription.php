<!DOCTYPE html>
<html>
<head>
	<title>inscription</title>
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
	<link rel="stylesheet" type="text/css" href="monstyle.css">

</head>
<body>
	<h1 align="center">Inscription:</h1>
	<form method="post" action="insersion.php">
		<table style=" width: 55%; box-shadow: 6px 6px 0px midnightblue;" align="center" border="2" class="table"> 
			<tr  >
				<td width="250px" height="250px">
					<div  class="radio">
						
					<B>Nom : </B></br>
					<input type="text" name="nom"></br>
				<B>Prénom :</B></br>
				<input type="text" name="prenom"></br>
			<B>email :</B></br>
			<input type="text" name="email"></br>
		<B>Choisir votre password:</B></br>
		<input type="password" name="password">
		<div class="radio">
			<B><p>vous étes un:</p></B>
			<label><input type="radio" name="optradio" value="comptable" checked><B>comptable</B></label>
		</div>
		<div class="radio">
			<label><input type="radio" name="optradio" value="employe" ><B>employe</B></label>
		</div>
		<div class="radio disabled">
			<label><input type="radio" name="optradio" value="gestionnaire" ><B>gestionnaire</B></label>
		</div>
		<input type="submit" name="inscrire"  class="btn btn-success" value="CONFIRMER">

	</div>
</td>
</tr>
</table>
</form>    
    


</body>
</html>