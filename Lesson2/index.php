<html>
<head>
    <title>Форма</title>
    <meta charset="UTF-8">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    Введiть Ваш email: <input type="text" name="email" value="<?php if (!empty($_POST['email'])):echo trim(str_replace(' ', '', $_POST['email'])) ?>
	<?php endif ?>"> <br><br>
    <input type="submit">
</form>
    
<?php
if (!empty(trim($_POST['email']))) {
    
    /** @var string $email */
    $email = trim(str_replace(' ', '', $_POST['email']));
    
    /** @var int $email_len 
     * Довжина email i мiнус 1 символ для коректної роботи з strpos()
     */
    $email_len = strlen($email) - 1;
       
    $where_sobachka = strpos($email, '@');
    $where_sobachka_rev = strpos($email, '@', -1);
    
   
    $where_tochka_start = strpos($email, '.');
    
    //Пошук "." після знака "@"
    $where_tochka = strpos($email, '.', $where_sobachka);
    
    // Пошук першої "." з кінця  
    $where_tochka_rev = strpos($email, '.', -1);
    
    if($where_sobachka === 0 || $where_sobachka === $email_len 
            || $where_sobachka_rev === $email_len ){
        echo '"@" не може бути першим або останнiм символом'. '<br>';    
        exit();
    }
    
   // $where_sobachka+1 Повертає позицію символа після знакa "@"
    if($where_tochka === ($where_sobachka+1) || $where_tochka_rev === $email_len 
            || $where_tochka_start === 0){
        
       echo '"." не може ставитися вiдразу пiсля знаку "@", першим або останнiм символом';
       exit();
   }    
   elseif ($where_tochka === false) {
       echo 'Пiсля "@" повинна бути хоча б одна "."';    
       exit();
}
 
    echo "<br> Введена електрона адреса правильна";
 
}

else {echo "Введiть електрону адресу";}

?>

</body>
</html>


