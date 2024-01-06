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
	<title>entrer de stock</title>
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
include "connexion_avec_bd.php";
$valid=array();
$dat=array();
$j=0;
if (isset($_POST['valid'])) {
  // foreach($_POST['datex'] as $value) {
    
  //     $dat[$j]=$value;
  //     $j++;

      
  //   }     

	$k=0;

	foreach($_POST['valid'] as $value) {
		
	 		$valid[$k]=$value;
	 		$k++;

           
	 	}
     $w=0;
     $tt=array() ;
         $sql="SELECT id_prd FROM entre_stock" ;
         $re=$con->query($sql) ;
        
         while ($poo=$re->fetch_row()){
           $tt[$w]=$poo['0'] ;
           $w++;
         }
        
   $i=0;
	 	while ( $i <$k ) { 
       
	 	 $sql="SELECT id_produit ,quant_cmd,num_lot FROM ligne_comm_fournisseur WHERE num_lot=$valid[$i]"; 

	 	 $res=$con->query($sql) ;  
     
      
	 	 while ($v=$res->fetch_row()) {
     $x=$v['0'] ;
     $xx=$v['2'];
     $li=$v['1'] ; 
     $a=0 ;
     $sql2=" INSERT INTO facture (id_cli,id_prod,quantité,prix) VALUES(5,5,5,5)";
    if($con->query($sql2))
    echo"succee";
    else{echo"erreuuur";}
     for($d=0;$d<$w;$d++){
       
     if($tt[$d]==$x) $a++;}
    
     if($a==0){
	 	 	$sql1="INSERT INTO entre_stock(date_entre,id_prd,quant_cmd,num_lot) VALUES(SYSDATE(),'$x' ,'$li','$xx')"; 
	 	 	 $con->query($sql1) ;}	
         else{
           $sql2="UPDATE entre_stock SET quant_cmd=(quant_cmd+$li) WHERE id_prd='$x'";
           $con->query($sql2) ;
           $a=0;
         }
	 	 }
          
         $sql2="DELETE  FROM ligne_comm_fournisseur WHERE num_lot=$valid[$i]";
	 	    $con->query($sql2) ;
          $i++ ; 
	 	 }
	 	
	 	}
	
 $sql="SELECT * FROM entre_stock ";
        $res=$con->query($sql) ;        
 ?>
</br>
 <div align="center"><H2> Les produits entrés:</H2></div>
<div class="container">
        <table style="background-color: white ; font-family: serif;"  align="center" cellspacing="0" cellpadding="0"  border="2" class="tableauacc">

        <thead>
          <tr border="2" width="800">
            <th >Ref entre</th><th>Date entre</th><th>Id produit</th><th >Quantité en stock </th>
          </tr>
        </thead>
        <tbody>
          <?php 
          while ($prd=$res->fetch_row()) {   ?>
         
            <tr width="800">
              <td width="800" border="2"> <?php echo $prd['0'] ?></td>
              <td width="800" border="2"> <?php echo $prd['1'] ?></td>
              <td width="800" border="2"> <?php echo $prd['2'] ?></td>
              <td width="800" border="2"> <?php echo $prd['3'] ?></td>


            </tr>


            <?php 
          } 
          ?>
          
        </tbody>
    </table>
    </div>
    <div align="center">
  <button type="button" onclick="window.print()" class="btn btn-info">Imprimer</button>
  
</div>


</body>
</html>