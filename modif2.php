<?php


include"connexion_avec_bd.php";
   $sql="SELECT count(id_prd) FROM produit" ;
   $res=$con->query($sql);
   $i=0;
   $t=array() ;
   while($rr=$res->fetch_row()){
	   $t[$i]=$rr['0'] ;
	   $i++;
   }
   if(isset($_POST['Modif'])){
   $j=0;
while($j<$i){

	
	$n=$_POST['nom'][$i];
	$p=$_POST['prix'][$i];
	$a=$_POST['id'][$i];
    


	$sql="UPDATE produit set nom_prd='$n',prix_prd='$p' WHERE id_prd=$a";

	$con->query($sql);
	
	
 $j++;
}
header("location:modif_produit.php" );}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


</body>
</html>