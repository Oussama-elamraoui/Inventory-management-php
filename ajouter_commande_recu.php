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
	<title></title>
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
	 <h2 align="center">la commande recu:</h2>
	
     <?php 
    
	 include"connexion_avec_bd.php" ;
	 $lesid=array() ;
	 $i=0;
	 if(isset($_POST['optradoi'])){
	 	foreach ($_POST['optradoi'] as $value) {
	 		$lesid[$i]=$value ;
	 		$i++;

	 	}
      
	 }
	 
	?>
	<form action="prepare_livraison.php" method="post">

		<div align="center"><B>choisir le client:</B><?php
			 				$var="SELECT id_client,nom,prenom FROM client";
			 				$res=$con->query($var);
			 				?>
			 				 <select name="ff[]">
			 				 	<?php 
			 				 	
                                while($frs=$res->fetch_row())
			 				 	{?>
			 				 		<option value="<?php echo $frs['0'] ?>"><?php echo $frs['0'].' '.$frs['1'].' '.$frs['2'] ?></option>
			 				 	<?php  } ?>
			 				 </select>

			 				 </div>

			 				</br>
	 <table style="background-color: white ; font-family: serif;"  align="center" cellspacing="0" cellpadding="0"  border="2" class="tableauacc" >

			 	<thead>
			 		<tr border="2" width="800">
			 			<th>Id produit</th><th>Nom produit</th><th>Quantitée à livrer</th><th>Quantitée en stock</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		<?php 
			 		$cp=0;

			 	    while ($cp<$i) { 
			 	    	$qt=0;
			 			$p=$lesid[$cp];
			 			$sql1="SELECT nom_prd FROM produit WHERE id_prd='$p'";
			 			$quant=$con->query($sql1);
	 
			 			while ($q=$quant->fetch_row()) {
			 				$qt=$q['0'];
			 			}
			 			$sql2="SELECT quant_cmd FROM entre_stock WHERE id_prd='$p'";
			 			$quant2=$con->query($sql2);
	 
			 			while ($q2=$quant2->fetch_row()) {
			 				$qt2=$q2['0'];
			 			}
			 	
			 	 ?>

			 			<tr >
			 				<td width="200" border="2" name="id" > <input type="text" value="<?php echo $lesid[$cp]; ?>" name="id1[]" readonly="readonly"></td>
			 				<td width="100" ><input readonly="readonly" value="<?php echo $qt ?>" type="text" name="nom">   </td>

			 				<td width="100" ><input type="text" name="quant[]">   </td>
			 				<td width="100" ><input type="text" value="<?php echo $qt2 ?>" readonly="readonly">   </td>


			 			</tr>
			 			<?php $cp++; } 
			 		?>


			 
			 		
			 	</tbody>

</table>
<div align="center">
			<button type="button" onclick="window.print()" class="btn btn-primary">imprimer</button>
			<input  type="submit" class="btn btn-primary" value="preparer livraison">
			
			
		</div>

</form>

</body>
</html>
