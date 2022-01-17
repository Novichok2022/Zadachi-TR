<?php

foreach ($upload_files as $item) {
    $extension_file = substr($item, strrpos($item, '.') + 1);
    if ($extension_file == 'txt') {
        $stroki_fl = file("$upload_dir/$item");
        foreach ($stroki_fl as $value) {
            if (mb_stripos($value, 'тест') !== false) {
                unlink("$upload_dir/$item");
            }
        }
    }
}
