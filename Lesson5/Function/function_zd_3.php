<?php

/**
 *  Перевірка значень на тип int
 * @param array $array
 * @return boolean
 */    
function arrayHasOnlyInts(array $array)
{
    foreach ($array as $value)
    {
        if (!is_int($value)) 
        {
             return false;
        }
    }
    return true;
}

/**
  * Знаходить суму значень масива
  * @param array $array
  * @return int. Повертає суму значень масива $array, 
  * або "0", якщо в масиві присутні строкові значення
  * 
  */
 function sumaNumbers(array $array): int 
 {
     $suma = 0;
     if(arrayHasOnlyInts($array)){
         foreach ($array as $item){
             $suma += $item;
         }
         return $suma;
     }
     return 0;
}

/**
 * Знаходить середнє значеня елементів масива
 * @param array $array
 * @param int $sings Кількість знаків після коми
 * @return float
 */
function averageValue(array $array,  int $sings = 2): float {
    if (sumaNumbers($array) === 0) {
        return 0;
    }
    $count_value = count($array);
    $average_value = round((sumaNumbers($array) / $count_value), $sings);
    
    return (float) $average_value;
}

/**
 * Знаходить всі парні числа
 * @param array $array
 * @return array|int
 */
function findEvenNumbers(array $array) {
    $even_numbers = [];
    if(arrayHasOnlyInts($array)){
         foreach ($array as $item){
             if($item % 2 === 0 ){
                 $even_numbers[] = $item;
             }
         }
         return $even_numbers;
     }
     return 0;
}

/**
 * Знаходить всі непарні числа
 * @param array $array
 * @return array|int
 */
function findNotEvenNumbers(array $array) {
    $not_even_numbers = [];
    if(arrayHasOnlyInts($array)){
         foreach ($array as $item){
             if($item % 2 !== 0 ){
                 $not_even_numbers[] = $item;
             }
         }
         return $not_even_numbers;
     }
     return 0;
}



// function deleteLeadingZero($arr) {
//     $str_corect = '';
//        foreach ($arr as $str1) {
//            if (ltrim($str1, '0') != '') {
//                $str_corect .= ltrim($str1, '0') . ', ';
//            } else {
//                $str_corect .= '0, ';
//            }
//        }
//        return $str_corect;
//    }
