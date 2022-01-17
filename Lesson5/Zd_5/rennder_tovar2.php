<?php

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

