<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'FileEdit.php';
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
        
       $obj = new FileEdit();
               
       //Задача 1 -  розіл 6
       $moveFilesOverTime = $obj->moveFilesOverTime($upload_dir, 'backup', 3);
       
      //Задача 2 -  розіл 6
       $obj->deleteFilesThatContainsWord('upload', 'txt', 'тест');
      
       //Задача 3 -  розіл 6
       $obj->filePutReverseContent('upload/source.txt', 'dest.txt');
       
          


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