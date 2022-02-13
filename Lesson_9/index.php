<?php

error_reporting(E_ALL);

use ShopProduct\Phone;
use ShopProduct\Book;

require_once('Autoloader.php');
Autoloader::registerAutoload();

$samsung = new Phone('Galaxy S21', 'Samsung', 2500, '256 GB');
$cleanCode = new Book('Clean Code by Robert Martin', 'Фабула', 550, 448);

echo ShopProductWriter::getShopProductInfo($samsung);
echo ShopProductWriter::getShopProductInfo($cleanCode);








































































