<?php

$new_dir = "backup";
if (!file_exists(__DIR__ . "/$new_dir")) {
    mkdir($new_dir);
}

foreach ($upload_files as $flname) {
    if ($flname !== "." && $flname !== "..") {
        $date_for_now = date('Y-m-d', strtotime('now'));
        $date_flcreation = date('Y-m-d', filemtime("$upload_dir/$flname"));
        $date_of_move = date('Y-m-d', strtotime($date_flcreation . '+3 days'));
        if ($date_for_now > $date_of_move) {
            rename("$upload_dir/$flname", __DIR__ . "/$new_dir/" . $flname);
           
        }
    }
}
