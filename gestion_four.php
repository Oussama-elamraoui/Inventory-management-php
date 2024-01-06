<!DOCTYPE html>
<html>
<head>
	<title>gestion de clients</title>
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

     <h2 align="center"> Inserer un nouveau fournisseur:</h2></br>
	 <form action="inserer_four.php" method="POST" >
	 	
		<table class="Authentification" id="table" align="center" border="3" style="box-shadow: 6px 6px 0px midnightblue;" >
			<tr align="center"width="120px" height="100px">
				<td align="center" width="100px" height="100px">
		<div >
			
			<label><B>Nom : </B></label></br>
				<input type=text name="nom"  style="width:250px"></br>
				<label><B>Prenom :</B></labele></br>
				<input type="text" name="prenom" style="width: 250px"></br>

				<label><B>Email :</B></labele></br>
				<input type="text" name="email" style="width: 250px"></br>

				<label><B> Numero de telephone:</B></labele></br>
				<input type="text" name="tel" style="width: 250px"></br>

				<label><B>Adresse :</B></labele></br>
				<TEXTAREA name="adrs" rows=4 cols=40></TEXTAREA></br>
				<input type="submit" class="btn btn-primary" name="Ajouter" value="Ajouter">
				<input type="reset" class="btn btn-primary" name="effacer" value="effacer">
		</div>
	            </td>
	        </tr>
	    </table>
	    	
	</form>




</body>
</html>