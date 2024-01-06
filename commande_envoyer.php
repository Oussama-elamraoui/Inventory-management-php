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
	 <h2 align="center">Choisir les produits à commander:</h2>
	 <form method="post" action="ajouter_commande.php">
	 <?php 
	 include"connexion_avec_bd.php" ;
	   $sql="SELECT id_prd,nom_prd,quantite_prd FROM produit ";
	   $res=$con->query($sql) ;
	   $sql1="SELECT id_produit FROM ligne_comm_fournisseur" ;
	   $re=$con->query($sql1) ;
	   $to=array() ;
	   $i=0 ;
	   while($pr=$re->fetch_row()){
                 $to[$i]=$pr['0'];
				 $i++;
	   }
	  
	   $mm=$i ;
	 ?>

	<div class="container">
	 <table style="background-color: white ; font-family: serif;"  align="center" cellspacing="0" cellpadding="0" width=80% border="2" class="tableauacc">

			 	<thead>
			 		<tr border="2" width="800">
			 			<th >Id</th><th>Nom du produit</th><th>Quantitée en stock</th><th>Choisir</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		<?php 
			 		while ($prd=$res->fetch_row()) { 
			 			$qt=0;
			 			$p=$prd['0'];
			 			$sql1="SELECT quant_cmd FROM entre_stock WHERE id_prd='$p'";
			 			$quant=$con->query($sql1);
			 			while ($q=$quant->fetch_row()) {
			 				$qt=$q['0'];
			 				
			 			}


			 		 ?>

			 			<tr width="800">
			 				<td width="800" border="2" name="id"> <?php echo $prd['0'] ?></td>
			 				<td width="800" border="2"> <?php echo $prd['1'] ?></td>
			 				<td width="800" border="2"> <?php 
			 					echo $qt; ?></td>
			 				
			 				<td><div class="checkbox">
							   <?php 
							   $ss=0;
								  for($j=0;$j<$mm;$j++){
									  
									if($to[$j]==$prd['0']){ $ss++;} }
									if($ss==0) {
										echo '<input type="checkbox" name="optradoi[]" value="'. $prd['0'] .'">';
			                     }
								else {

									echo "déja commander" ;
								} 
							?> 
								
								</div>
		                    </td>
			 			</tr>
			 			


			 			<?php 
			 		} 
			 		?>
			 	
			 	</tbody>
		</table>
		</div>
		<div align="center">
		<input type="submit" name="cmd" value="passer la commande" class="btn btn-primary">
	    </div>
	</form>
</body>
</html>