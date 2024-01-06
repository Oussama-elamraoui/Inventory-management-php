<!DOCTYPE html>
<html>
<head>
	<title>preparer la livraison</title>
</head>
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
          <a class="nav-link  " aria-current="page" href="modif_produit.php">MODIFIER</a>
        </li>
 
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
          <a class="nav-link " href="entre_stock.php">ENTREES</a>
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
            <a class="dropdown-item" href="commande_attente.php">EN ATTENTE</a>
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
<h2 align="center">liste des commandes en train de livraison</h2>
	 <form action="gestion_de_sortie.php" method="post">
<?php 


include "connexion_avec_bd.php" ;
$id=array() ;
$quant=array();
$k=0 ;
$n=0;
if(isset($_POST['quant']) && isset($_POST['ff']) ){
	   $id_cl=$_POST['ff'];
	   $aa=$id_cl['0'];
	 	foreach ($_POST['quant'] as $value) {
	 		$quant[$k]=$value;
	 		$k++;
	 	}
		 foreach ($_POST['id1'] as $valid) {
			$id[$n]=$valid ;
			$n++;
		}
		

    for($i=0;$i<$n;$i++){
	$b=$quant[$i];
	$c=$id[$i];
	$sql="INSERT INTO ligne_commande(id_prd,quant_liv,id_client) VALUES($c,$b,$aa)";
	$con->query($sql) ;
	

	}
	$w=0;
	$toto=array() ;
	$sql1="SELECT DISTINCT id_client FROM ligne_commande " ;
	$res=$con->query($sql1) ;
	while($pr=$res->fetch_row()){
      $toto[$w]=$pr['0'] ;
      $w++;
	}
	for($i=0;$i<$w;$i++){
		$sql2="SELECT * FROM ligne_commande WHERE id_client=$toto[$i]" ;
		$re=$con->query($sql2) ;
			  ?>
<table style="background-color: white ; font-family: serif;"  align="center" cellspacing="0" cellpadding="0"  border="2" class="tableauacc">

			 	<thead>
			 		<tr border="2" width="800">
			 			<th >Produit</th><th>Quantitée à livrer</th><th>Id_client</th>
			 		</tr>
			 	</thead>
			 	<tbody><?php  
			 		while($tab=$re->fetch_row()){
			 			$qt=0;
			 			$p=$tab['0'];
			 			$sql1="SELECT nom_prd FROM produit WHERE id_prd='$p'";
			 			$quant=$con->query($sql1);
	 
			 			while ($q=$quant->fetch_row()) {
			 				$qt=$q['0'];
			 			}
			 			



			 		
			 		  ?>

			 			<tr width="800">
                            <td  width="200"><input type="text" value="<?php echo $tab['0'].' '.$qt; ?>" name="id">   </td>
                            <td  width="200"><input type="text" value="<?php echo $tab['1'] ?>" name="qt">   </td>
                             <td  width="200"><input type="text" value="<?php echo $toto[$i] ?>" name="stock">   </td> 
			 				

                       
			 			</tr>
			 			
			 			

                     <?php } ?>
                     <tr align="right">
			 			<td colspan="3">
			 	         <div class="checkbox">
			                    <input type="checkbox" name="valid[]" value="<?php echo  $toto[$i]?>"></div>
                    </td>	

			 		</tr>
			 			
			 		
			 	</tbody>
		</table>
	</br>
	
<?php
}

}?>
<div align="center">
<input type="submit" class="btn btn-primary" name="" value="valider">
</div>
</form>


<form action="commande_recu.php" method="post">
<div align="center">
	<input type="submit" name="livrer" value="livrer autres commandes" class="btn btn-primary">
    </div>
</form>
</body>
</html>