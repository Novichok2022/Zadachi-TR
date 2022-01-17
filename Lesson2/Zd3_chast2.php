<html>
<head>
    <title>Задача по регулярках</title>
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
        
        $vstavka_ssilok = preg_replace( "~\b((ftp|https?)://)([a-z0-9-_]+\.)+((([a-z]{2,4})\b/\S*)|([a-z]{2,4})\b(?=\s)?)~i", "<a href = \"$0\">$0</a>", $text);
        
	echo "<br> $vstavka_ssilok <br><br>";
} else {
    echo 'Введіть текст з URL для редагування <br>';
}

?>





