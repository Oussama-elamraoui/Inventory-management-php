<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	$con=mysqli_connect('localhost','root','','gestion_de_stockage');
	if(mysqli_connect_errno()){
		echo "erreur";}
		else{
			echo "cnx avec succées";
		}
    ?>

</body>
</html>