<?php
include 'Function/function_zd_1.php';
include 'Function/function_zd_3.php';
?>
<html>
<head>
    <title>Задача 3</title>
    <meta charset="UTF-8">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    Введіть список цілих чисел через кому: <input type="text" style="width: 1000px; height: 50px;" name="numbers" value="<?php if (!isFormEmpty(['numbers'])):echo preg_replace('~\s+~', ' ', formValue('numbers'))?>
	<?php endif ?>"> <br><br>
    <input type="submit">
</form>
    
 <?php

 if (isFormEmpty(['numbers'])) {
     exit('Заповніть форму');
 } else {
   
     $numbers = addComatoEnd(trim($_POST['numbers']));

    // Перувірка на відовідність заповнення форми Буквами через "," і пробіл

    $patern = '~^(([0-9]+)(,\s*))+$~';


    /* substr(preg_replace('~\s+~', '', $name), 0, -1)
     * Видаляє зайві пробіли і останній символ (пустий рядок) 
     */
    $valid_numbers = preg_match($patern, $numbers) ? substr(preg_replace('~\s+~', '', $numbers), 0, -1) : exit("<h4>Форма заповнена не коректно. Заповніть лише цілими числами,"
                    . " розділені однією комою,<br> пробілом або без нього!</h4>Нариклад: 10,12 або 10, 12");

    $array_number = array_map('intval', explode(',', $valid_numbers));

    echo 'Сума введених чисел: ' . sumaNumbers($array_number) . '<br>';
    echo 'Середнє значення введених чисел: ' . averageValue($array_number) . '<br>';
    echo 'Кількість парних чисел: ' . count(findEvenNumbers($array_number)) . '<br>';
    echo 'Всі непарні числа: ' . implode(', ', findNotEvenNumbers($array_number)) . '<br>';
}
 
 


 
