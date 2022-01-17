<?php

function mb_strrev($str){
    $r = '';
    for ($i = mb_strlen($str); $i>=0; $i--) {
        $r .= mb_substr($str, $i, 1);
    }
    return $r;
}


$file1 = "source";
$path_to_file = "$upload_dir/$file1" . ".txt";

$fp = fopen($path_to_file, "r");
flock($fp,LOCK_SH);
if(!$fp){
    echo "Помилка читання. Можливо файла не існує";
    exit();
}
while (!feof($fp)){
    $lines[] = fgetcsv($fp, 0, PHP_EOL);
}
foreach ($lines as $item2){
    foreach ($item2 as $value) {
    $words[] = explode(' ', $value);    
    }
     
}
flock($fp, LOCK_UN);
fclose($fp);


$str = '';
for ($i = 0; $i < count($words); $i++) {
    for ($j = 0; $j < count($words[$i]); $j++) {
        
        if ($j === (count($words[$i]) - 1) && count($words) > 1) {
            $str .= mb_strrev($words[$i][$j]) . PHP_EOL;
            continue;
        }
        if($i === 0 && $j === 0  && !empty($words[0][0])){
            $str .= $words[0][0] . ' ';
            continue;
        }
       
        $str .= mb_strrev($words[$i][$j]) . ' ';
    }
}

$fp2 = fopen("upload/dest.txt", 'w');
fwrite($fp2, $str);
fclose($fp2);
