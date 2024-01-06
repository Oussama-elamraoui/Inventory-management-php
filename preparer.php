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
            <li><a href="index.php"><span class="glyphicon glyphicon-user"></span><B> Deconnexion</B></a></li>

         </ul>

		</nav>	 	
	 </div></br></br></br></br>
	
     <?php 
	 include"connexion_avec_bd.php" ;
	 $valeur=array() ;
	 $i=0;
	 if(isset($_POST['optradoi'])){
	 	foreach ($_POST['optradoi'] as $value) {
	 		$valeur[$i]=$value ;
	 		$i++;

	 	}
        
	 }
	 
	?>
	<form action="verif_comm.php" method="get">
	 <table style="background-color: white ; font-family: serif;"  align="center" cellspacing="0" cellpadding="0" width=80% border="2" class="tableauacc" >

			 	<thead>
			 		<tr border="2" width="800">
			 			<th>id produit</th><th>quantitée à commander</th><th>fournisseur</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		<?php 
			 		$cp=0;
			 	 while ($cp<$i) { $nomp="SELECT nom_prd FROM produit WHERE id_prd=$valeur[$cp]";

			 	
			 	 ?>

			 			<tr >
			 				<td width="800" border="2" > <?php echo $valeur[$cp]; ?></td>
			 				<td><input type="text" name="quant">   </td>
			 				<td><?php
			 				$var="SELECT nom_f FROM fournisseur";
			 				$res=$con->query($var);
			 				?>
			 				 <select name="ff">
			 				 	<?php 
			 				 	
                                while($frs=$res->fetch_row())
			 				 	{?>
			 				 		<option value="<?php echo $frs['0'] ?>"><?php echo $frs['0'] ?></option>
			 				 	<?php  ;} ?>
			 				 </select>	
			 				 </td>


			 			</tr>


			 			<?php 
			 			$p="SELECT num_fournisseur FROM fournisseur WHERE nom_f=$frs['0']"
			 			$re=$con->query($p);
                        $sql="INSERT INTO  ligne_de_commande(id_prd,num_fournisseur,quantite_cmd)values ($valeur['$cp'],$re['0'],)";
			 						 			$cp++;
			 		} 
			 		?>
			 		<tr align=right>
			 			<td colspan="3">
			 	       <input  type="submit" style="color: white;
	                   background-color:midnightblue;
	                   width: 80px; height: 50px;
	                   /*position:relative;*/ 

                        " name="cmd" class="button" value="envoyer">
                    </td>	

			 		</tr>
			 	</tbody>

</table>
</form>
</body>
</html>