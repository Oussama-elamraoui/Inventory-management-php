
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>gestion de stockage</title>
	<link rel="stylesheet" type="text/css" href="monstyle.css"> 
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
     <div align="center">
	 <h1 >Modifier le nom ou le prix d'un produit:</h1>
     </div>
	 <form action="modif2.php" method="post" >

			<?php 
			include"connexion_avec_bd.php";
			$sql="SELECT * FROM produit";
			$res=$con->query($sql); ?>
		<div class="container">
        <table style="background-color: white ; font-family: serif;"  align="center" cellspacing="0" cellpadding="0" width=80% border="2" class="tableauacc">

			 	<thead>
			 		<tr border="2" width="800">
			 			<th >Id</th><th>Nom du produit</th><th >Prix en DH</th><th>Modification</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		<?php 
			 		while ($prd=$res->fetch_row()) { 
			 			// $qt=0;
			 			// $p=$prd['0'];
			 			// $sql1="SELECT quant_cmd FROM entre_stock WHERE id_prd='$p'";
			 			// $quant=$con->query($sql1);
	 
			 			// while ($q=$quant->fetch_row()) {
			 			// 	$qt=$q['0'];
			 			// }

			 			
			 			?>

			 			<tr width="800">
							 
			 				<td width="200" border="2"><input type="hidden" name="id[]" value="<?php echo $prd['0'] ?>"><input type="text" readonly="readonly" value="<?php echo $prd['0'] ?>" name=""> </td>
			 				<td width="200" border="2"><input type="text" value="<?php echo $prd['1'] ?>" name="nom[]"> </td>
			 				<td width="200" border="2"><input type="text" value="<?php echo $prd['3'] ?>" name="prix[]"> </td>
			 				
			 				


			 			</tr>
                       

			 			<?php 
			 		} 
			 		?>
			 		 <tr>
						  <td colspan="3">
						<div align="right">
				         <input type="submit" value="MODIFIER"  name="Modif">				 
		        
	                        </div>
				        </td>
						</tr>
			 	</tbody>
		</table>
		</div>
	</form>



</body>
</html>