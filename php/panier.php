<?php
require '_header.php';
//var_dump($_SESSION);

?>
<!DOCTYPE HTML>
<html>

  <head>
    <meta charset="utf-8">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" charset="utf-8">  
  <link href="../bootstrap/css/styles.css" rel="stylesheet">
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
  <script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
  </head>

  <body background="../image/bg.jpg">
   

   
      <header class="row col-sm-12" >
        <div class="navbar navbar-default navbar-fixed-top" style="background-color:#BBE1D7 ;">
         
                  <div class="navbar-header">
         
           <a class="navbar-brand" href="index.php">Location voiture</a>
        
         </div> 
         <div id="form-inline">
         <form class="form-inline">
              <div class="form-group">
                <label for="exampleInputName2">Name</label>
                 <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
              </div>
             <div class="form-group">
                 <label for="exampleInputEmail2">Email</label>
                 <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
              </div>
             <button type="submit" class="btn btn-default">Envoyer</button>
        </form>
        </div>
            </div>
      </header>
    
      <div class="row" > 
      <div class="col-sm-12">

        <div class="col-sm-2"> 

      <div class="row ">
      <nav class="col-sm-12">
          <ul class="nav nav-pills nav-stacked">
            <li> <a href="#"> <span class="glyphicon glyphicon-home"></span> Accueil </a> </li>
      <li> <a href="log-sign.html"> <span class="glyphicon glyphicon-pencil"></span> LOGIN/SIGN-UP </a> </li>
            <li> <a href="recherche-v.php"> <span class="glyphicon glyphicon-search"></span> Recherche voiture </a> </li>
      <li role="presentation"><a href="panier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Votre comparateur <span class="badge"><?php echo ($_SESSION["comp"]); ?></span></a></li>          
          </ul>
      </nav>
      </div>
    
    <div class="row">
      <div  class="col-sm-12" style="height:3px;">
      </div>
    </div>  
    
    <div class="row">
    <aside id="aside_id" class="col-sm-12">

      <address>
        <strong>Location voiture</strong><br>
        Bastia,<br>
        moukrim_yassine@hotmail.fr,<br>
        Tel: 04 04 04 04 04
      </address>
      
    </aside>
    
  </div>
  </div>  


<?php


?>
 

    
                <div id="main" class="clearfix">

                    <div class="checkout">
                    
                      
                      <div class="table" style="margin-left:240px; width:83%;">
                        <div class="wrap">

                          <div class="rowtitle">
                            <span class="name">Nom de Produit</span>
                            <span class="price">Prix/KM</span>
                            <span class="quantity">KMs</span>
                            <span class="subtotal">Prix/100KMs</span>
                            <span class="action">Actions</span>
                          </div>

                      

                        <?php
                        $ids=array_keys($_SESSION['panier']);

                          if(!empty($ids)){
                          $comma_separated = implode(",", $ids);

                          $sql = "SELECT * FROM vehicule WHERE id IN ($comma_separated)";
                          //exécution de la requête SQL
                          $produits = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;

                          while($res=mysql_fetch_array($produits)){
                        echo('
                         <form id="myform" method="post" action="reservation.php" >
                          <div class="row1">
                            <input type="hidden" name="img" value="'.$res['image'].'">
                            <input type="hidden" name="marque" value="'.$res['marque'].'">
                            <input type="hidden" name="modele" value="'.$res['modele'].'">
                            
                            <a href="#" class="img" > <img src='.$res['image'].' height="53" ></a>
                            <span class="name" >'.$res['marque'].' '.$res['modele'].'</span>
                            <span class="price" name="prix">'.$res['prix'].' €</span>
                            <span class="quantity"><input class="input_km" type="text" style="text-align:center" value='.$_SESSION['panier'][$res['id']].'></span>
                            <span class="subtotal">'.number_format($res['prix'] *100, 2, ',', ' ').'€</span>
                            <span class="action">
                              <a href="panier.php?delPanier='.$res['id'].'" class="del"><img src="../img/del.png"></a>
                              <a href="#" id="envoyer"><img src="../img/ok.png"/></a>
                            </span>
                            </div>
                            </form>
                            ');}
                              }
                            ?>
           

                          <div class="rowtotal">
                            Grand Total : <span class="total">1205205 € </span>
                          </div>
                          <input type="submit" value="Recalculer">
                        </div>
                      </div>
                      
                    </div>


                  </div>

         

        
</div>
</div>





<script type="text/javascript">
$(document).ready(function () {
 $("#envoyer").click(function(){
$('#myform').submit();
});
});
</script> 
</body>
</html>
