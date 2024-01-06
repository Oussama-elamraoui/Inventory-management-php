<!DOCTYPE html>
<html>
<head>
	<title></title>
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
if(isset($_POST['valid'])){
  $k=0;
  foreach($_POST['valid'] as $value) {
      
      $valid[$k]=$value;
      $k++;

           
    } 
    $tt=array();
    $w=0;   
     $sql="SELECT id_prd FROM sortie_stock" ;
    $re=$con->query($sql) ;
    while ($poo=$re->fetch_row()){
           $tt[$w]=$poo['0'] ;
           $w++;
         }
        
         $qt=array();
      
    
    $i=0;
 
   while ($i<$k) {
      $sql1="SELECT * FROM ligne_commande WHERE id_client=$valid[$i]";
       $r=$con->query($sql1) ;
       
      while ($cc=$r->fetch_row()){
      $n=$cc['0'] ;
       $sql02="SELECT quant_cmd FROM entre_stock WHERE id_prd=$n" ;
       $testq=$con->query($sql02) ;
       $l=0;
        while ($bb=$testq->fetch_row()){
           $qt[$l]=$bb['0'] ;
          
         }

      $p=$cc['1'];
      $o=$cc['2'];
      $z=0;
      for($i=0;$i<$w;$i++) {
        if($tt[$i]==$cc['0']) {$z++ ;} }
        
        $noo=$qt[0] ;
        if($z==0){
          if($noo>$p){
            $sql3="INSERT INTO sortie_stock (date_sortie,quantite_sort,id_prd,id_client) VALUES(SYSDATE(),'$p' ,'$n','$o')"; 
           $con->query($sql3) ;
           $sql6="UPDATE entre_stock SET quant_cmd=(quant_cmd-$p) WHERE id_prd='$n'";
           $con->query($sql6) ;
            $sql88="DELETE FROM ligne_commande WHERE  id_prd='$n'";
           $con->query($sql88) ;
         }
           else{
            $sql3="INSERT INTO sortie_stock(date_sortie,quantite_sort,id_prd,id_client) VALUES(SYSDATE(),'$noo' ,'$n','$o')";
            $con->query($sql3) ;
          $sql6="UPDATE entre_stock SET quant_cmd=0 WHERE id_prd='$n'";
           $con->query($sql6) ;
          $sql6="UPDATE ligne_commande SET quant_liv=($p-$noo) WHERE id_prd='$n'";
           $con->query($sql6) ;
           

           }
        }
        else{
          if($noo>$p){
          $sql14="UPDATE entre_stock SET quant_cmd=(quant_cmd-$p) WHERE id_prd='$n'";
           $con->query($sql14) ;
          $sql15="UPDATE sortie_stock SET quantite_sort=(quantite_sort+$p) , date_sortie=SYSDATE() WHERE id_prd='$n'";
           $con->query($sql15) ; 
            $sql99="DELETE FROM ligne_commande WHERE  id_prd='$n'";
           $con->query($sql99) ;
           }
           else{
             $sql4="UPDATE entre_stock SET quant_cmd=0 WHERE id_prd='$n'";
           $con->query($sql4) ;
          $sql5="UPDATE sortie_stock SET quantite_sort=(quantite_sort+$n) , date_sortie=SYSDATE() WHERE id_prd='$n'";
           $con->query($sql5) ;
           $sql55="UPDATE ligne_commande SET quant_liv=($p-$noo) WHERE id_prd='$n'";
           $con->query($sql55) ;
        

           }
           $z=0;
        }
      }
 $i++;

      }}
  $sql="SELECT * FROM sortie_stock ";
   $res=$con->query($sql) ;

      ?>
      </br>
 <div align="center"><H2> Les produits livrer:</H2></div>
<div class="container">
        <table style="background-color: white ; font-family: serif;"  align="center" cellspacing="0" cellpadding="0"  border="2" class="tableauacc">

        <thead>
          <tr border="2" width="800">
            <th >Reference de sortie</th><th>Date de sortie</th><th>Id produit</th><th >Quantité livrer</th><th>Id client</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          while ($prd=$res->fetch_row()) { 
           
            $qt2=0;
            $p=$prd['4'];
            $sql1="SELECT nom FROM client WHERE id_client='$p'";
            $quant2=$con->query($sql1);
   
            while ($q2=$quant2->fetch_row()) {
              $qt2=$q2['0'];
            }
            

            ?>

            <tr width="800">
              <td width="800" border="2"> <?php echo $prd['0'] ?></td>
              <td width="800" border="2"> <?php echo $prd['1'] ?></td>
              <td width="800" border="2"> <?php echo $prd['3']?></td>
              <td width="800" border="2"> <?php echo $prd['2'] ?></td>
              <td width="800" border="2"> <?php echo $prd['4'].' '.$qt2 ?></td>


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