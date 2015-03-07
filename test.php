<!DOCTYPE html>
<html>
<head>
  <title>Ecommerce template</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8">
</head>

<body>







  <div id="main" class="clearfix">

<div class="checkout">
  <div class="title">
    <div class="wrap">
    <h2 class="first">Shopping Cart</h2>
    </div>
  </div>
  <form method="post" action="panier.php">
  <div class="table">
    <div class="wrap">

      <div class="rowtitle">
        <span class="name">Product name</span>
        <span class="price">Price</span>
        <span class="quantity">Quantity</span>
        <span class="subtotal">Prix avec TVA</span>
        <span class="action">Actions</span>
      </div>

 
      <div class="row">
        <a href="#" class="img"> <img src="img/1.jpg" height="53"></a>
        <span class="name">coucou</span>
        <span class="price">1500,00 €</span>
        <span class="quantity"><input type="text"></span>
        <span class="subtotal">15500 €</span>
        <span class="action">
          <a href="#" class="del"><img src="img/del.png"></a>
        </span>
      </div>
 
      <div class="rowtotal">
        Grand Total : <span class="total">1205205 € </span>
      </div>
      <input type="submit" value="Recalculer">
    </div>
  </div>
  </form>
</div>


  </div>





</body>

</html>