<?php

include_once 'FileReader.php';

class FileEdit {
    
    /**
     * Переміщення файлу, якщо дата створення, більша ніж задана кількість днів
     * 
     * @param string $fromDirectory
     * @param string $toDirectory
     * @param int $days
     */
    public function moveFilesOverTime(string $fromDirectory, string $toDirectory, int $days) {

        $fromDirectory = $this->deleteSlash($fromDirectory);

        $files = scandir(__DIR__ . '/' . $fromDirectory);
        if ($files === false) {
            exit(__FILE__ . '<br>' . '$fromDirectory не является каталогом');
        }

        $newDir = $this->makeDirectory($toDirectory);
        if ($newDir === false) {
            exit('Назва каталогу, задано не правильно');
        }

        foreach ($files as $flname) {
            if ($flname !== "." && $flname !== "..") {
                $date_for_now = date('Y-m-d', strtotime('now'));
                $date_flcreation = date('Y-m-d', filemtime("$fromDirectory/$flname"));
                $date_of_move = date('Y-m-d', strtotime($date_flcreation . "+$days days"));
                if ($date_for_now > $date_of_move) {
                    rename("$fromDirectory/$flname", __DIR__ . "/$toDirectory/" . $flname);
                }
            }
        }
        
        return true;
    }

    /**
     * Видалення файлів з диреккторії з заданим розширенням, які містять в собі
     * ключове слово 
     * 
     * @param string $directory
     * @param string $fileExtension
     * @param string $keyword
     * @return boolean
     */
    public function deleteFilesThatContainsWord(string $directory, string $fileExtension, string $keyword) {

        $directory = $this->deleteSlash($directory);

        $files = scandir(__DIR__ . '/' . $directory);
        if ($files === false) {
            exit(__FILE__ . '<br>' . '$directory не является каталогом');
        }

        $file_with_extension = self::getFilesByExtension($files, $fileExtension);
        if (empty($file_with_extension)) {
            exit('Файлів з таким розширенням не існує в заданому каталозі');
        }

        foreach ($file_with_extension as $file) {
            $stroki_file = file("$directory/$file");
            foreach ($stroki_file as $value) {
                if (mb_stripos($value, $keyword) !== false) {
                    unlink("$directory/$file");
                }
            }
        }
        return true;
    }

    /**
     * Отримує всі файли з директорії, які містять розширення $fileExtension
     * 
     * @param array $files
     * @param string $fileExtension
     * @return array
     */
    public static function getFilesByExtension(array $files, string $fileExtension): array {

        $files_by_extension = [];

        foreach ($files as $item) {
            $extension_file = self::getExtension($item);
            if ($extension_file == $fileExtension) {
                $files_by_extension[] = $item;
            }
        }

        return $files_by_extension;
    }
    
   
    /**
     * Створює файл з іменем $nameFile в директорії $dir 
     * 
     * @param type $nameFile
     * @param type $dir
     */
    public static function makeFile($nameFile, $dir = "newfiles") {

        $file = __DIR__ . '/' . "$dir/$nameFile";

        if (!file_exists($file)) {
            $fp = fopen($file, 'r');
            fclose($fp);
        }
    }

    /**
     * Зчитування файлу $readFile і вставка його значень із заду на перед в файл
     *  $fileToInsert 
     * 
     * @param string $readFile  
     * @param string $fileToInsert
     * @param string $dirToInsert
     */
    public function filePutReverseContent(string $readFile, string $fileToInsert, string $dirToInsert = 'upload') {

        $read_files = new FileReader();
        $elements_file = $read_files->getAllElemenstFile($readFile);
        $reverse_lines = $this->reverseLines($elements_file);



        $fp = fopen("$dirToInsert/$fileToInsert", 'w');
        fwrite($fp, $reverse_lines);
        fclose($fp);
    }

    /**
     * Запис рядків із заду на перед
     * 
     * @param array $lines
     * @return array
     */
    protected function reverseLines(array $lines): string {

        $str = '';
        for ($i = count($lines) - 1; $i >= 0; $i--) {
            for ($j = count($lines[$i]) - 1; $j >= 0; $j--) {

                if ($j === 0) {
                    $str .= $lines[$i][$j] . PHP_EOL;
                    continue;
                }

                $str .= $lines[$i][$j] . ' ';
            }
        }
        return $str;
    }

    /**
     * Сттворення директорії
     * 
     * @param string $dir
     * @return bool
     */
    public function makeDirectory(string $dir): bool {

        $dir = $this->deleteSlash($dir);
        $path_to_dir = __DIR__ . '/' . $dir;

        if (!file_exists($path_to_dir)) {
            mkdir($path_to_dir);
        }

        return true;
    }

    /**
     * Повертає ррозширення файлу
     * 
     * @param type $path
     * @return type
     */
    public static function getExtension($path) {
        return pathinfo($path, PATHINFO_EXTENSION);
    }
    
    /**
     * 
     * @param string $dir
     * @return string
     */
    protected function deleteSlash(string $dir): string {

        if ($dir[0] == '/') {
            $dir = mb_substr($dir, 1);
        }

        return $dir;
    }

}
