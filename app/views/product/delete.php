<form action="delete?id=<?= $product['id'] ?>" method="post"
<?php
$products =  $this->get('product');
?>
<p>Ви впевнені, що бажаєте видалити товар #<b><?=$product['sku']?></b> ?</p>
<div class="yesno">
    <a href="<?php echo "/product/delete"?>?id=<?=$product['id']?>&value=yes" class="btn btn-success btn-sm" data-toggle="modal">Так</a>
    <a href="<?php echo "/product/delete"?>?id=<?=$product['id']?>&value=no" class="btn btn-success btn-sm" data-toggle="modal">Ні</a>
</div>
<div class="product">
    <p class="sku">Код: <?php echo $product['sku']?></p>
    <h4><?php echo $product['name']?></h4>
    <p> Ціна: <span class="price"><?php echo $product['price']?></span> грн</p>
    <p> Кількість: <?php echo $product['qty']?></p>