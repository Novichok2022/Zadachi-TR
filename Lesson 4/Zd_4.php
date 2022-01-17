<html>
<head>
    <title>Масиви Zd_4</title>
    <meta charset="UTF-8">
    <style>
   textarea { resize: both; }
  </style>
</head>
<body>
    
<form action="" method="post">
<textarea name="text" cols="70" rows="15"><?php if (!empty(trim($_POST['text'])))
    echo trim($_POST['text']);?>
</textarea>
	<br><br><input type="submit"><br><br>
</form>

<?php
if (!empty(trim($_POST['text']))) 
{
$text = trim($_POST['text']);

$array_text = explode(' ', $text);

$b = '';
$q = '';
$arr_count = count($array_text) - 1;
//var_dump($arr_count);
for($i = 0; $i <= $arr_count; $i++ )
{
    $znach_arr = mb_strlen($array_text[$i]);
    $znach_b = mb_strlen($b);
    $result = $znach_arr + $znach_b;
    
    if($result < 40)
    {
        $b .= $array_text[$i] . ' ';
        if($i === $arr_count){
            $q .= $b;
        }
    }
 else 
    {
        $q .= '<p align="justify">' . $b .'</p>';
        $b = $array_text[$i] . ' ';
        if($i === $arr_count){
            $q .= $b;
        }
    }
  }
}

echo $q . '<br>';
//echo  mb_strlen('спеціальні');
