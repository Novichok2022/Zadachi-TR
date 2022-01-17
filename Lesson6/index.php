<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
?>
<html>
<head>
    <title>Форма завантаження файла</title>
    <meta charset="UTF-8">
    </head>
<body>
    
    <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000" >
        Завантажити файл: <br><br>
        <input name="filename" type="file" ><br><br>
        <input type="submit" value="Завантажити" ><br><br>
    </form>
    
    <?php 
   
        //$upload_dir = "C:/Users/mykhailo.pivkach/Documents/NetBeansProjects/unit6_upload/upload";
        $upload_dir = "upload";
        if (isset($_FILES['filename'])) {
            $filename = $_FILES['filename']['name'];
            $tmp_filename = $_FILES['filename']['tmp_name'];
            move_uploaded_file($tmp_filename, "$upload_dir/$filename");
        }
        
       $upload_files = scandir('upload');
       
       
       include 'ZD_1.php';
   
       include 'ZD_2.php';
          
       include 'ZD_3.php';
    


foreach ($upload_files as $filename) {
    if ($filename !== "." && $filename !== ".." && filesize("$upload_dir/$filename") > 0) {
        //echo '<img src="' . "$upload_dir/$filename" . '">';
        //echo date('r', filectime("$upload_dir/$filename")) . '<br>';
        echo $filename . '<br>' . date('r', filectime("$upload_dir/$filename")) . '<br><br>';
    }
}
?>

</body>
</html>