<!DOCTYPE html>
<html>
<head>
	<title>resultat de recherche</title>
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
			<li><a href=""> <B>GESTION DES CLIENTS </B> </a></li>&emsp;
			<li><a href="gestion_entre.php"> <B>GESTION DES ENTREES   </B>  </a></li>&emsp;&emsp;
			<li><a href="gestion_de_sortie.php"><B>GESTION DES SORTIES</B></a> </li>&emsp;&emsp; 
		 <li><a href="recherche.php"><B>RECHERCHE D'UN PRODUIT</B></a>&emsp;&emsp;  </li> 
        </ul>&emsp; &emsp; &emsp; &emsp; 	
		  </ul>
		  &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; 

		 <ul class="nav navbar-nav navbar-right">
            <li><a href="index.phP"><span class="glyphicon glyphicon-user"></span><B> Deconnexion</B></a></li>

         </ul>

		</nav>	 	
	 </div></br></br></br>
	

			 		
			 		 <?php 
$con=mysqli_connect('localhost','root','','gestion_de_stockage');
if(isset($_POST['nom']) && isset($_POST['date'])  && isset($_POST['prix']) && isset($_POST['quant']) && isset($_POST['barre']))
{$n=$_POST['nom'];
$d=$_POST['date'];
$p=$_POST['prix'];
$q=$_POST['quant'];
$b=$_POST['barre'];
}
$sql="SELECT * FROM  produit WHERE (nom_prd like '%$n%') OR (date_exp='$d') OR (prix_prd='$p') OR 
(quantite_prd like '$q')  OR  (code_barre like '$b')";

$res=$con->query($sql) ;
?>
 <table align="center" cellspacing="0" cellpadding="45" width="200" border="2" class="tableauacc">

			 	<thead>
			 		<tr border="2">
			 			<th>nom du produit</th><th>date d'expiration</th><th>prix en DH</th><th>quantitée</th>
			 			<th>code barre</th>

			 		</tr>
			 		</thead>
			 		<tbody>
			 		<?php 
			 		while ($prd=$res->fetch_row()) { ?>

			 			<tr>
			 				
			 				<td border="2"> <?php echo $prd['1'] ?></td>
			 				<td border="2"> <?php echo $prd['2'] ?></td>
			 				<td border="2"> <?php echo $prd['3'] ?></td>
			 				<td border="2"> <?php echo $prd['4'] ?></td>
			 				<td border="2"> <?php echo $prd['5'] ?></td>


			 			</tr>


			 			<?php 
			 		} 
			 		?>
			 		
			 	</thead>
			 	<tbody>







			 	</tbody>
		</table>

</body>
</html>