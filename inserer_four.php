<!DOCTYPE html>
<html>
<head>
	<title>inserer un client</title>
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
	<?php 


include"connexion_avec_bd.php";
if(isset($_POST['nom']) && isset($_POST['prenom'])  && isset($_POST['email'])  && isset($_POST['tel']) && isset($_POST['adrs']))
{$nom=$_POST['nom'];
$prnm=$_POST['prenom'];
$mail=$_POST['email'];
$mob=$_POST['tel'];
$adr=$_POST['adrs'];

}

$sql="INSERT INTO  fournisseur(nom_f , prenom_f, mobile_f, adresse_f,email_f) VALUES ('$nom','$prnm','$mob','$adr','$mail')";

if ($res=$con->query($sql)) {?>
</br>
 
	<div class="alert alert-success">
  <strong>Success!</strong> le client <?php echo $nom.' '.$prnm.' '."est bien inscrit dans l'application"?>.
</div>
<?php }
else 
	echo "probleme d'insertion";
	?>
	<h2 align="center">LISTE DES FOURNISSEURS:</h2>
	<?php 

			 include"connexion_avec_bd.php";
			$aff="SELECT * FROM fournisseur ";
			$res=$con->query($aff); ?>

        <table style="background-color: white ; font-family: serif;"  align="center" cellspacing="0" cellpadding="0" width=80% border="2" class="tableauacc">

			 	<thead>
			 		<tr border="2">
			 			<th >id</th><th>Nom de fournisseur</th><th>Prenom fournisseur</th><th >Email fournisseur</th><th>Numero de telephone</th><th>Adresse</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		<?php 
			 		while ($clt=$res->fetch_row()) { ?>

			 			<tr>
			 				<td border="2"> <?php echo $clt['0'] ?></td>
			 				<td border="2"> <?php echo $clt['1'] ?></td>
			 				<td border="2"> <?php echo $clt['2'] ?></td>
			 				<td border="2"> <?php echo $clt['3'] ?></td>
			 				<td border="2"> <?php echo $clt['4'] ?></td>
			 				<td border="2"> <?php echo $clt['5'] ?></td>



			 			</tr>


			 			<?php 
			 		} 
			 		?>

			
</tbody>
</table>
<div align="center">
 <a href="gestion_client.php" type="button"><input class="btn btn-primary" value="Ajouter un nouveau client" type="submit" name="ajt"> </a>
 <a href="acceuil.php" type="button"><input class="btn btn-primary" value="Retour a l'acceuil" type="submit" name="ajt"> </a>
</div>
</body>
</html>