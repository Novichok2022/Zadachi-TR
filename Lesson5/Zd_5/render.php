
<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=0">Від дешевших до дорожчих</a>
    <br>
<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=1">Від дорожчих до дешевших</a>

<?php
if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        } else 
        { 
            $sort = "name";
        }
if (isset($_GET['order'])) {
            $order = $_GET['order'];
        } else {
            $order = 0;
        } 

if(!isset($_GET['sort']) && !isset($_GET['order'])) {
     $products = sortZahluschk($products);
  }

if($sort == 'price' && $order == 0){
    $products = sortArticleZrostanju($products);
}
elseif($sort == 'price' && $order == 1){
    $products  = sortArticleSpadanju($products);
}

  


