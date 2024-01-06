<!DOCTYPE html>
<html>
<head>
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
	<title>les commandes envoyer</title>
</head>
<body>
	</br>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
     <a class="navbar-brand" href="acceuil.php">
      <img src="logo.jpg" alt="" width="30" height="28" class="d-inline-block align-text-top">
      A.O Stock
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div style="justify-content:flex-end"  class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="ajout_produit.php">+PRODUIT</a>
        </li>


         <li class="nav-item">
          <a class="nav-link " aria-current="page" href="gestion_client.php">CLIENTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="gestion_four.php">FOURNISSEURS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="gestion_entre.php">ENTREES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="gestion_de_sortie.php">SORTIES</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
            COMMANDES
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="commande_recu.php">RECUES</a>
            <a class="dropdown-item" href="commande_envoyer.php">A ENVOYEES</a>
            <a class="dropdown-item" href="commande_en_attente.php">EN ATTENTE</a>
            <div class="dropdown_divider"></div>
            <a href="#" class="dropdown-item"></a>
        </div>
    </li>
      
      <li class="nav-item">
          <a class="nav-link " href="recherche.php"> RECHERCHE PRODUITS</a>
        </li>
       <li class="nav-item" >
          <a class="nav-link " href="logout.php">DECONNEXION</a>
       </li>
    </ul>
    </div>
  </div>
</nav>

<?php 


include "connexion_avec_bd.php" ;
$id=array() ;
$ff=array();
$quant=array();$k=0 ;
$n=0;

$d=0;

if(isset($_POST['quant']) && isset($_POST['ff']) && isset($_POST['lot']) ){

	$num_lot=$_POST['lot'];
	

	 	foreach ($_POST['quant'] as $value) {
	 		$quant[$k]=$value;
	 		$k++;

	 	}
      
	 
	 $j=0;
	 
	 	foreach ($_POST['ff'] as $valf) {
	 		$ff[$j]=$valf ;
	 		$j++;
	 	}
		 
		 
		 foreach ($_POST['id1'] as $valid) {
			$id[$n]=$valid ;
			$n++;
		}
		
		


    for($i=0;$i<$n;$i++){
	$a=$ff[$i];
	$b=$quant[$i];
	$con->query("INSERT INTO `facture`(`id_cli`, `id_prod`, `quantité`, `prix`) VALUES (1,3,4,5)");
	$sql="INSERT INTO ligne_comm_fournisseur(id_produit,quant_cmd,num_fournisseur,cp,num_lot) VALUES($id[$i],'$b','$a',$n,$num_lot)";
	$con->query($sql) ;
	$sql2="SELECT prix_prd FROM produit WHERE id_prd='$id[$i]'";
	$res1=$con->query($sql2) ;
	$coc=array();
	while($rr=$res1->fetch_row()){
		$coc[0]=$rr['0'] ;
	}
	echo $coc[0];

    $sql2="INSERT INTO facture (id_cli,num_fo,id_prod,quantité,prix) VALUES(0,'$a',$id[$i],$b,$coc[0]*$b)";
    $con->query("INSERT INTO `facture`(`id_cli`) VALUES (1)");	
}


}

	 
 ?>
 

 <h2 align="center">liste des commandes en attente d'entré</h2>
 <form action="commande_envoyer.php">
		<div align="center">
		<input type="submit"  value="Ajouter une commande" class="btn btn-primary">
	    </div>
	    </form>
	 <form action="entre_stock.php" method="post"><div align="center">
	 	<div align="center">
		<input type="submit" name="valider" value="Valider" class="btn btn-primary">
	    </div>
		

			<?php 
			include"connexion_avec_bd.php";
 
			$sql="SELECT  cp FROM ligne_comm_fournisseur" ;
			$cmp=$con->query($sql);
			$a=0;
			$i=0 ;
			$s=0;
			$m=0;
			$y=array();
			$h=0;
			while ($cp=$cmp->fetch_row()){    			
			$y[$s]=$cp['0'] ;
            $s++; }
        
			
            
            
			while($i<$s){
				
				$m=0;
            $h=$y[$i];
			 $sql="SELECT * FROM ligne_comm_fournisseur LIMIT $h OFFSET $a";
			// $sql="SELECT * FROM ligne_comm_fournisseur";
			$res=$con->query($sql); 
			  ?>
		<div class="container">
        <table style="background-color: white ; font-family: serif;"  align="center" cellspacing="0" cellpadding="0" width=80% border="2" class="tableauacc">

			 	<thead>
			 		<tr border="2" width="800">
					 <th >Id produit</th><th>Quantitée</th><th>Nom de fournisseur</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		<?php 
					$x=0;
					$z=0;
			 		while ( $prd=$res->fetch_row()) {
			 			$x=$prd['0'];
			 			$z=$prd['1'] ;
			 			  $m++;

			 			//   $qt=0;
			 			// $p=$prd['0'];
			 			// $sql1="SELECT nom_prd FROM produit WHERE id_prd='$p'";
			 			// $quant=$con->query($sql1);
	 
			 			// while ($q=$quant->fetch_row()) {
			 			// 	$qt=$q['0'];
			 			// }
			 			

			 		  ?>

			 			<tr width="800">
						 
                            <td  width="200"><input type="text" value="<?php echo $prd['0']?>" name="id">   </td>
                            <td  width="200"><input type="text" value="<?php echo $prd['1'] ?>" name="qt">   </td>
                            <td  width="200"><input type="text" name="fo[]" value="<?php echo $prd['2'] ?>" name="four">   </td>


			 			</tr>
			 			


			 			<?php 
			 		 } $lo=array() ;
					  
			 		 $sql="SELECT num_lot FROM ligne_comm_fournisseur WHERE id_produit='$x' AND quant_cmd='$z'";
			 		 $ll=$con->query($sql);
			 		
			 		 $d=0;
                     while ($vv=$ll->fetch_row()) {
                     	$lo[$d]=$vv['0']; 
                     	$d++;
                   
                     }
                     
					 $bb=$lo[0] ;
			 		?>
			 		<tr align="right">
			 			<td colspan="5">
			 	         <div class="checkbox">
			                    <input type="checkbox" name="valid[]" value="<?php echo  $bb?>"></div>
                    </td>	

			 		</tr>
			 	</tbody>
		</table>
		</div>  <br> <br>
		<?php 
	
	
  
		$a=$a+$y[$i];
		$i=$i+$m ;

	  } ?>
    
	</form>

</body>
</html>