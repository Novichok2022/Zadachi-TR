
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

  foreach($products as $product)  :
?>
    <div class="product">
        <p class="sku">Код: <?php echo $product['sku']?></p>
        <h4><?php echo $product['name']?><h4>
        <p> Ціна: <span class="price"><?php echo $product['discounted price']?></span> грн</p>
        <?php if($product['discounted price'] != $product['price']):?>
        <p> Стара ціна: <span class="price"><?php echo $product['price']?></span> грн</p>
        <p> Сума знижки: <span class="price"><?php echo $product['suma_discount']?></span> грн</p>
        <?php endif; ?>
        <p><?php if(!$product['qty'] > 0) { echo 'Нема в наявності'; } ?></p>
    </div>
<?php endforeach; ?>


