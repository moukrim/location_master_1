<?php
require '_header.php';
//var_dump($_SESSION);

?>
<!DOCTYPE HTML>
<html>

  <head>
    <meta charset="utf-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8">  
  <link href="bootstrap/css/styles.css" rel="stylesheet">
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
  <script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
  </head>

  <body background="image/bg.jpg">
   

   
      <header class="row col-sm-12" >
        <div class="navbar navbar-default navbar-fixed-top" style="background-color:#BBE1D7 ;">
         
                  <div class="navbar-header">
         
           <a class="navbar-brand" href="#">Location voiture</a>
        
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



<?php
$ids=array_keys($_SESSION['panier']);

//unset($_SESSION['panier'][1]);
//unset($_SESSION['panier'][3]);
if(!empty($ids)){
$comma_separated = implode(",", $ids);

$sql = "SELECT * FROM vehicule WHERE id IN ($comma_separated)";
//exécution de la requête SQL
$produits = @mysql_query($sql, $cnx) or die($sql."<br>".mysql_error()) ;

}
else
die('empty!!!');


?>
 

    
                <div id="main" class="clearfix">

                    <div class="checkout">
                    
                      <form method="post" action="panier.php">
                      <div class="table">
                        <div class="wrap">

                          <div class="rowtitle">
                            <span class="name">Nom de Produit</span>
                            <span class="price">Price</span>
                            <span class="quantity">KMs</span>
                            <span class="subtotal">Prix avec TVA</span>
                            <span class="action">Actions</span>
                          </div>

                      

                        <?php
                          while($res=mysql_fetch_array($produits)){
                        echo('
                          <div class="row1">
                        
                            <a href="#" class="img"> <img src='.$res['image'].' height="53"></a>
                            <span class="name">'.$res['marque'].'</span>
                            <span class="price">'.$res['prix'].' €</span>
                            <span class="quantity"><input class="input_km" type="text" style="text-align:center" value='.$_SESSION['panier'][$res['id']].'></span>
                            <span class="subtotal">15500 €</span>
                            <span class="action">
                              <a href="panier.php?delPanier='.$res['id'].'" class="del"><img src="img/del.png"></a>
                            </span>
                            </div>
                            ');}
                            ?>
                          
                     

                      
                          <div class="rowtotal">
                            Grand Total : <span class="total">1205205 € </span>
                          </div>
                          <input type="submit" value="Recalculer">
                        </div>
                      </div>
                      </form>
                    </div>


                  </div>

         

        
</div>
</div>






</body>
</html>
