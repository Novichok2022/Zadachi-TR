<?php
 
 //Сума знижки для кожної позиції товару
 function sumaDiscountforArticle(array $data) {
     
     $articles = $data;

    foreach ($articles as $key => &$value) {
        if ($value['procent_discount'] === '' || $value['procent_discount'] === 0 || $value['procent_discount'] > 100) {
            $value['suma_discount'] = 0;
        }
        $value['suma_discount'] = (int) ($value['price'] * ($value['procent_discount'] / 100));
    }
    return $articles;
}


//Загальна сума товара із знижкою
function sumaTovarzDiscount(array $data) {
     
     $tovar = $data;
     
     foreach ($tovar as $key => &$value) {
         if($value['suma_discount'] === ''){
             continue;
     }  
        $value['discounted price'] = $value['price'] - $value['suma_discount'];
     }
     return $tovar;
     
 }    
 
 
 // Сортування товару по зроостаню
 function sortArticleZrostanju(array $array) {
     
     $arr_suma_discont = sumaDiscountforArticle($array);
     $array_tovar_disc = sumaTovarzDiscount($arr_suma_discont);
     
     uasort($array_tovar_disc, function ($x, $y) {
    if (($x['discounted price'] == $y['discounted price'])) {
        return 0;
    }
    return (($x['discounted price'] < $y['discounted price'])) ? -1 : 1;
    });
    return $array_tovar_disc;
}


// Сортування товару по спаданню
 function sortArticleSpadanju(array $array) {
     $arr_suma_discont = sumaDiscountforArticle($array);
     $array_tovar_disc = sumaTovarzDiscount($arr_suma_discont);
     
     uasort($array_tovar_disc, function ($x, $y) {
        if (($x['discounted price'] == $y['discounted price'])) {
            return 0;
        }
        return (($x['discounted price'] < $y['discounted price'])) ? 1 : -1;
    });
    return $array_tovar_disc;
}



//  Вибірка акційнихх товарів
function findActionArtcle($array) {
    
    $artcile = $array;
    $action_article = [];
    
    foreach ($artcile as $key => $value) {
        if($value['procent_discount'] > 0){
            $action_article[] = $value;
        }
        
    } 
    return $action_article;
}


function sortZahluschk(array $array) {
     
     $arr_suma_discont = sumaDiscountforArticle($array);
     $array_tovar_disc = sumaTovarzDiscount($arr_suma_discont);
     
     uasort($array_tovar_disc, function ($x, $y) {
    if (($x['discounted price'] == $y['discounted price']) || ($x['discounted price'] < $y['discounted price']) || 
($x['discounted price'] > $y['discounted price'])) {
        return 0;
    }
    });
    return $array_tovar_disc;
}
