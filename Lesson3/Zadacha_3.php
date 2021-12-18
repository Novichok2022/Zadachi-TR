<html>
<head>
    <title>Урок3_Задача 3</title>
    <meta charset="UTF-8">
    <style>
   div {
    margin-bottom: 2px;
    font-size: 130%;
   }
   #right { text-align: right; }
  </style>
</head>
<body>
    <form action="" method="POST">
        
  <label for="number">Введіть число:</label><br>
  <input type="text" id="" name="number" size="50" placeholder="Число від 1 до 15" value="<?php if (!empty($_POST['number'])):echo trim($_POST['number']) ?>
	<?php endif ?>"> <br><br>
  <input type="submit" value="Відправити">
</form>

    
 <?php

$number = preg_match('/^([1-9]|1[0-5])$/', trim($_POST['number'])) ? (int)trim($_POST['number']) : exit("<h3>Значення не коректне. Діапазон від 1 до 15</h3>");

$piramid_mario = '';
	for ($i = 1; $i <= $number; $i++) {
		$piramid_mario.= '#';
		//var_dump($str5);
		echo "<div id=\"right\"><div class=\"content\">$piramid_mario</div></div>";
	}
?>

    