<?php

class FileReader {

    /**
     * Розбиває файл на елементи, де кожен підмасив, означає перенос каретки на  нову лінію
     * 
     * @param string $nameFile
     * @return type array|exit()
     */
    public function getAllElemenstFile(string $nameFile) {

        $fp = fopen($nameFile, "r");
        flock($fp, LOCK_SH);
        if (!$fp) {
            echo "Помилка читання. Можливо файла не існує";
            exit();
        }
        while (!feof($fp)) {
            $lines[] = fgetcsv($fp, 0, PHP_EOL);
        }

        array_pop($lines);

        foreach ($lines as $item2) {
            foreach ($item2 as $value) {
                $words[] = explode(' ', $value);
            }
        }

        flock($fp, LOCK_UN);
        fclose($fp);

        return $words;
    }

}
