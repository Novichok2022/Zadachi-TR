<?php

echo 'Напишіть скрипт, який виведе роки в '
. 'проміжку 3 2000 по 2100, в які проводиться ЧС з футболу.' . '<br><br>';

$start_futbolu = '';
for($i = 2000; $i <= 2100; $i++){ 
    $start_futbolu = $i % 4;
    if($start_futbolu === 0){
        echo "$i <br>";
    }
    
}