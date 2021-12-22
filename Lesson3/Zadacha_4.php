<html>
<head>
    <title>Урок 3</title>
    <meta charset="UTF-8">
    <style>
        .red {
    background-color: red;
    width: 10px;
}
    </style>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    Цифри від 1 до 100: <input type="text" name="number" placeholder="Введіть через кому" value="<?php if (!empty($_POST['number'])):echo trim($_POST['number']) ?>
	<?php endif ?>"> <br><br>
    <input type="submit"><br><br>
</form>
<?php
if (!empty($_POST['number'])) {
    
    $number = trim($_POST['number']);
    
    //Пошук "," в фоормі з кінця
    $pos_comma = strpos($number, ',', -1);
    
    if($pos_comma === false){
        $number = $number . ',';
    }
    
    // Проовірка на відовідність заповнення форми 1-100 через "," і пробіл
    $patern = '~^(100,\s*|([1-9][0-9]?)(,\s*))+$~';
    
    /* substr(preg_replace('~\s+~', '', $name), 0, -1)
     * Видаляє зайві пробіли і останній символ (пустий рядок) 
     */
    $valid_number = preg_match($patern, $number) ? substr(preg_replace('~\s+~', '', $number), 0, -1) : exit("<h4>Форма заповнена не коректно. Числа повинні бути від 1 до 100, розділені однією комою,<br> пробілом або без нього!</h4>Нариклад: 10,12 або 10, 12");
    
    // масив цифр з форми
    $array_number = explode(',', $valid_number);
   
    $diagrama = '';
    
    foreach ($array_number as $item){
        for($i = 1; $i <= $item; $i++){
           // var_dump($item);
            $diagrama .= "<span class=\"red\">&nbsp</span>";
            if($i == $item){
                $diagrama .= "<span>&nbsp;$item</span><br>";
            }
        }      
    }
  echo $diagrama;
}

?>
 
</body>
</html>
