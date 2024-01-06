<!DOCTYPE html>
<html>
<head>
	<title>gestion des entres</title>
	<link rel="stylesheet" type="text/css" href="monstyle.css">
	<style type="text/css">
		body{
			background-image: url(backround5.jpg);
			background-repeat: no-repeat;
			background-size: 1400px;
			background-attachment: fixed;
			width: 100%;
			background-position: top;		}
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
	 <div style="background: fixed;" >
	 	<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">

		<!-- Links -->
		  <ul class="navbar-nav">
		  	<li><a href="ajout_produit.php"> <B>+AJOUT D'UN PRODUIT </B></br></a></li>&emsp;&emsp;&emsp;

		  	 <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#"></br><B>GESTION DE COMMANDE</B>
                 <span class="caret"></span></a>
                 <ul class="dropdown-menu">
          <li><a href="commande_recu.php">COMMANDE RECU</a></li>
          <li><a href="commande_envoyer.php">COMMANDE A ENVOYER</a></li>
          <li><a href="commande_attente.php">COMMANDE EN ATTENTE</a></li>
        </ul>
      </li>
        </ul>&emsp; &emsp; &emsp; &emsp; 
			<li><a href="gestion_client.php"> <B>GESTION DES CLIENTS </B> </a></li>&emsp;
			<li><a href="gestion_entre.php"> <B>GESTION DES ENTREES   </B>  </a></li>&emsp;&emsp;
			<li><a href="gestion_de_sortie.php"><B>GESTION DES SORTIES</B></a> </li>&emsp;&emsp; 
		    <li><a href="recherche.php"><B>RECHERCHE D'UN PRODUIT</B></a> </li>&emsp;&emsp; 
		  </ul>
		  &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; 

		 <ul class="nav navbar-nav navbar-right">
            <li><a href="index.phP"><span class="glyphicon glyphicon-user"></span><B> Deconnexion</B></a></li>

         </ul>

		</nav>	 	
 </div></br></br></br></br></br>
 

  <table style="background-color: white ; font-family: serif;"  align="center" cellspacing="0" cellpadding="0" width=80% border="2" class="tableauacc">

			 	<thead>
			 		<tr border="2" width="800">
			 			<th> numero de lot <?php include"connexion_avec_bd.php";
			$sql="SELECT max (num_lot)+1 FROM entre_stock";
			$res=$con->query($sql); 
		

			?> </th>
			 		</tr>
			 		<tr>
			 			<th>id_prd</th><th>nom fournisseur</th><th>quantite</th><th>date d'expiration</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		<?php 

			           include"connexion_avec_bd.php";
			            $sql="SELECT * FROM ligne_de_commande";
			            $res=$con->query($sql);
						echo print_r($res) ;
			 		    while ($cmd=$res->fetch_row()) {  ?>
 
			 			<tr width="800">
			 				<td width="800" border="2"> <?php echo $cmd['0'] ?></td>
			 				<td width="800" border="2"> <?php echo $cmd['1'] ?></td>
			 				<td width="800" border="2"> <?php echo $cmd['2'] ?></td>
			 				<td width="800" border="2"> <?php echo $cmd['3'] ?></td>
			 				<td width="800" border="2"> <?php echo $cmd['4'] ?></td>
			 				<td width="800" border="2"> <?php echo $cmd['5'] ?></td>
			 				

			 			</tr>


			 			<?php 
			 		} 
			 		?>
			 		
			 	</tbody>
		</table>

</body>
</html>