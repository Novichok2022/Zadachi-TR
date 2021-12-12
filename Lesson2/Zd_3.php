<html>
<head>
    <title>Форма</title>
    <meta charset="UTF-8">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    Введіть ваше прізвище: <input type="text" name="surname" value="<?php if (!empty($_POST['surname'])):echo trim(($_POST['surname'])) ?>
	<?php endif ?>"> <br><br>
    Введіть ваше ім'я: <input type="text" name="name" value="<?php if (!empty($_POST['name'])):echo trim(($_POST['name'])) ?>
	<?php endif ?>"> <br><br>
    Введіть ваше ім'я по батькові: <input type="text" name="patronymic" value="<?php if (!empty($_POST['patronymic'])):echo trim(($_POST['patronymic'])) ?>
	<?php endif ?>"> <br><br>
    <input type="submit">
</form>
    
<?php

if (!empty(trim($_POST['surname'])) && !empty(trim($_POST['name'])) && !empty(trim($_POST['patronymic']))) {
    
    $surname = trim($_POST['surname']);
    $name = trim($_POST['name']);
    $patronymic = trim($_POST['patronymic']);
        
    $pervij_simv_surname = mb_strtoupper(mb_substr($surname, 0, 1));
    $next_simvoli_surname = mb_strtolower(mb_substr($surname, 1));
    
    //  Складує перетворене прізвище з першого і наступних символів
    $valid_surname = $pervij_simv_surname . $next_simvoli_surname;
    
    $name_inicial = mb_strtoupper(mb_substr($name, 0, 1));
 
    $patronymic_inicial = mb_strtoupper(mb_substr($patronymic, 0, 1));
    
    echo "Ваші ініціали $valid_surname $name_inicial. $patronymic_inicial. <br>";
}
 else {
     echo '<br>' . 'Заповніть всі форми';    
}
?>

</body>
</html>

