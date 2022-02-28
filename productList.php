<?php

require_once 'Db.php';


$db = new Db();
$products = $db->showAll();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Product List</title>
    <link rel="stylesheet" href="style.css">
    
  </head>
<body>

<form action="/mass-delete" method="POST">
<header>
        <?php require_once "header.php";?>
</header>





<div class="parent">
<?php
foreach($products as $product) {
?>
<div class="child">

  <input id="product-<?=$product->getSku()?>" class="delete-checkbox" name="product-<?=$product->getSku()?>"  type="checkbox" value="product-<?=$product->getSku()?>"/>
  <br /><br />

  <?=$product->getSku()?><br />
  <?=$product->getName()?><br />
  <?=$product->getPrice()?> $<br />
  
  <?php
    if($product->getProductType() === "DVD"){
      echo "Size:".$product->getSize();
    
  }
  if($product->getProductType() === "Book"){
    echo "Weight:".$product->getWeight();
  
}
  if($product->getProductType() === "Furniture"){
    echo "Dimension:".$product->getHeight()."x".$product->getLength()."x".$product->getWidth();
  
}
  ?>
</div>

<?php
}
?>
</div>
 

</form>








<footer>
<?php require_once "footer.php";?>
</footer>


</body>
</html>