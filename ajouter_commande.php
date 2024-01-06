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
	 <h2 align="center">Saisir la quantitée à commander::</h2> 
	
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
	  $sql="SELECT max(num_lot)+1 FROM ligne_comm_fournisseur";
	 $nlot=$con->query($sql);
     while ($n=$nlot->fetch_row()) {
			 				$lotn=$n['0'];
			 			}
			 			
	?>
	<form action="attente_entre.php" method="post">
	 <table style="background-color: white ; font-family: serif;"  align="center" cellspacing="0" cellpadding="0" border="2" class="tableauacc" >
	 	<div align="center"><label><B>numero de lot:</B></label><input align="center" type="number" value="<?php echo $lotn; ?>" name="lot"></div>

			 	<thead>
			 		<tr border="2" width="800">
			 			<th>id produit</th><th>quantitée à commander</th><th>fournisseur</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		<?php 
			 		$cp=0;
			 	 while ($cp<$i) {// $nomp="SELECT nom_prd FROM produit WHERE id_prd=$valeur[$cp]";

			 	
			 	 ?>

			 			<tr >
			 				<td width="200" border="2" name="id" > <input type="text" value="<?php echo $lesid[$cp]; ?>" name="id1[]" readonly="readonly"></td>
			 				<td  width="200"><input type="text" name="quant[]">   </td>
			 				<td width="200"><?php
			 				$var="SELECT nom_f FROM fournisseur";
			 				$res=$con->query($var);
			 				?>
			 				 <select name="ff[]">
			 				 	<?php 
			 				 	
                                while($frs=$res->fetch_row())
			 				 	{?>
			 				 		<option value="<?php echo $frs['0'] ?>"><?php echo $frs['0'] ?></option>
			 				 	<?php  } ?>
			 				 </select>	
			 				 </td>


			 			</tr>
			 			<?php $cp++; } 
			 		?>


			 
			 	
			 	</tbody>

</table>
<div align="center">
		<input type="submit" name="cmd" value="Envoyer" class="btn btn-primary">
	    </div>

</form>

</body>
</html>
