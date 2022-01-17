<?php

 define('M', 2);
 define('N', 3);
 $masiv = [];


for($i = 0; $i < M; $i++){
    for($j = 0; $j < N; $j++){
        $masiv[$i][$j] = rand();
    }
}
//var_dump($masiv);
?>

<?php echo 'Задано двовимірний масив розмірністю ' . M . ' на ' . N . ' елементів<br><br><br>';?>
<table style="border:1px;border-style: dotted;">
<?php foreach ($masiv as $key => $value) : ?>
    <tr>
        <td style="border:1px;border-style: dotted; padding: 10px;">
            <?php echo "$key ";?>
        </td>
        <?php foreach ($value as $value_key => $item) : ?>
        <td style="border:1px;border-style: dotted; padding: 20px;">
            <?php echo "$value_key - $item"; ?>
        </td>
        <?php endforeach; ?>
    </tr>   
<?php endforeach; ?>
</table>
