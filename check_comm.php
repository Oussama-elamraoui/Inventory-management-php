<?php
include "connexion_avec_bd.php" ;
$i=0 ;
if(isset($_POST['quant'])){
	 	foreach ($_POST['quant'] as $value) {
	 		$quant[$i]=$value ;
	 		$i++;

	 	}
      
	 }
	 $j=0;
	 if(isset($_POST['ff'])){
	 	foreach ($_POST['ff'] as $valf) {
	 		$ff[$i]=$valf ;
	 		$j++;

	 	}
      
	 }
	 $valeur=$_GET['valeur'] ;
	 $cp=$_GET['i'];
	 header('Location:./attente_entre.php?valeur='.$valeur.'&cp='.$cp.'&quant='.$quant.'&ff='.$ff.'');


?>