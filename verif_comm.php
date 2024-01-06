<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
// $con=mysqli_connect('localhost','root','','gestion_de_stockage');
// if (isset($_POST['quant'])&&(isset($_POST['quant'])&&(isset($_POST['ff']))
// {$a=$_POST['quant'];
// $b}
include"connexion_avec_bd.php" ;
if($_GET['cmd']){
	$table=$_GET['table'] ;
	echo print_r($table);
// echo print_r($valeur) ;


// $sql="INSERT INTO  ligne_de_commande(quantite_cmd)values ('$a')";


// $res=$con->query($sql) ; 
?>

</body>
</html>