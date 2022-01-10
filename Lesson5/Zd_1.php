<?php
include 'Function/function_zd_1.php';
?>
<html>
<head>
    <title>Задача 1</title>
    <meta charset="UTF-8">
    <style>
.redtext {
        color: red;
}
</style>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    Введіть список імен: <input type="text" style="width: 1000px; height: 50px;" name="name" value="<?php if (!isFormEmpty(['name'])):echo preg_replace('~\s+~', ' ', formValue('name'))?>
	<?php endif ?>"> <br><br>
    <input type="submit">
</form>
    
 <?php

 if (isFormEmpty(['name'])) {
     exit('Заповніть форму');
 } else {

     $names = addComatoEnd(trim($_POST['name']));

     // Перувірка на відовідність заповнення форми Буквами через "," і пробіл
     
     $patern = '~^(([А-Яа-яЁёЇїІіЄєҐґ\'a-z]{3,}(-[А-Яа-яЁёЇїІіЄєҐґ\'a-z]{3,})?)(,\s*))+$~iu';
     

     /* substr(preg_replace('~\s+~', '', $name), 0, -1)
      * Видаляє зайві пробіли і останній символ (пустий рядок) 
      */
     $valid_names = preg_match($patern, $names) ? substr(preg_replace('~\s+~', '', $names), 0, -1) 
             : exit("<h4>Форма заповнена не коректно. Імена повинні складатися мінімум з 3-х букв, без цифр, розділені однією комою,<br> пробілом або без нього!</h4>");

     // масив Імен з форми
     $array_names = explode(',', $valid_names);
     $sort_names = sortAlfhabet($array_names);
     $result = implode(', ', $sort_names['corect_values']);
     $not_corect_names = implode(', ', $sort_names['not_corect_values']);
     
     echo "$result <br><br> <h3>Імена, які не співпадають з заданим алфавітом</h3> <p class=\"redtext\"> $not_corect_names</p>";
 }

