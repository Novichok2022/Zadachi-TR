<?php

include 'Function/function_zd_1.php';
include 'Function/function_zd_4.php';
?>

<html>
<head>
    <title>Задача 4</title>
    <meta charset="UTF-8">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    Введіть ціле число: <input type="text" name="number" value="<?php if (!isFormEmpty(['number'])):echo formValue('number')?>
	<?php endif ?>"> <br><br>
    <input type="submit">
</form>
    
 <?php

 if (isFormEmpty(['number'])) {
     exit('Заповніть форму');
 } else {
   
     $number = trim($_POST['number']);
     //$patern = '~^([1-9][0-9]?)$~';
     //$patern = '~^([1-9][0-9]?)$~';(100,\s*|([1-9][0-9]?)(,\s*))+
     $patern = '~^(80|([1-9]|[1-7][0-9]))$~';

    $valid_number = preg_match($patern, $number) ? (int)$number : exit("<h4>Форма заповнена не коректно. Введіть ціле число від 1 до 80</h4>");
   
    echo 'Функція без рекурсії: ' . implode(', ', fibonachi($valid_number)) . '<br><br>';
    echo 'Функція з рекурсією: ' . recurfibonachi($valid_number);
    
 }