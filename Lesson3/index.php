<html>
<head>
    <title>Урок3_Задача 1</title>
    <meta charset="UTF-8">
    
</head>
<body>
    <form action="" method="POST">
        
  <label for="price">Ціна автобіля в €:</label><br>
  <input type="text" id="price" name="price" size="50" value="<?php if (!empty($_POST['price'])):echo trim($_POST['price']) ?>
	<?php endif ?>"> <br><br>
  
  <label for="volume"> Об'єм двигуна в куб.см:</label><br>
  <input type="text" id="volume" name="volume" size="50" value="<?php if (!empty($_POST['volume'])):echo trim($_POST['volume']) ?>
	<?php endif ?>"> <br><br>
  
  <label for="year">Рік випуску автомобіля:</label><br>
  <input type="text" id="year" name="year" size="50" placeholder="З 1970 по поточний рік" value="<?php if (!empty($_POST['year'])):echo trim($_POST['year']) ?>
	<?php endif ?>"><br><br>
  
  <label for="engine">Тип двигуна:</label>
  <select id="engine" name="engine">
    <option value="benzin">бензин</option>
    <option value="dizel"<?php if($_POST['engine'] == 'dizel'):echo 'selected' ?> <?php endif ?>>дизель</option>
  </select><br><br>
  
  <input type="submit" value="Відправити">
</form>
    
<?php
define("BAZ_STAVKA_BENZIN", 50);
define("BAZ_STAVKA_DIZEL", 75);
$min_engine_volume = 600;
$max_engine_volume = 25000;
$now_year = (int)date('Y');

if(!empty(trim($_POST['price'])) && !empty(trim($_POST['volume'])) && !empty(trim($_POST['year']))){

    
//Валідація форми <price>
$price_valid = preg_match('/^\d+([\.\,]\d+)?$/', trim($_POST['price'])) ? trim($_POST['price']) : exit("<h3>Ціна не коректна</h3>");

$zamina_komi = str_replace(',', '.', $price_valid);

$price = round($zamina_komi, 2);

//Валідація форми <volume>
$volume = preg_match('/^\d+$/', trim($_POST['volume'])) ? (int)$_POST['volume'] : exit("<h3>Об’єм повинен складатися з цілого числа, без будь-яких знаків!</h3>");

if($volume < $min_engine_volume || $volume > $max_engine_volume){
        echo 'Об’єм не входить в діапазон від 800 до 25000 куб.см ';
        exit();
    }

//Валідація форми <year>    
$year = preg_match('/^\d{4}$/', trim($_POST['year'])) ? (int)$_POST['year'] : exit("Дата не коректна. Ведіть починаючи з 1970 по поточний рік");

if($year < 1970 || $year > $now_year){
    echo 'Дата не коректна. Введіть починаючи з 1970 по поточний рік';
    exit();
}

//Фомра engine
$engine = $_POST['engine'];
$kof_viku = $now_year-($year+1);

if($kof_viku === 0 || $kof_viku === -1){
    $kof_viku = 1;
}

if($engine == 'benzin'){
        $suma_akcizu = round((BAZ_STAVKA_BENZIN * ($volume/1000) * $kof_viku), 2);
        $total_suma_avto = round(($suma_akcizu + $price), 2);
        include 'table/table1.php';
}else{
        $suma_akcizu = round((BAZ_STAVKA_DIZEL * ($volume/1000) * $kof_viku), 2);
        $total_suma_avto = round(($suma_akcizu + $price), 2);
        include 'table/table1.php';
        
    }

} else{
    echo "<h2>Поля не можуть бути пусті. Будь ласка заповніть їх</h2>";
}

?>

</body>
</html>