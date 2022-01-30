<?php
function dbjson_write($json, $key, $value) {
    $file = $json;
    $details = [];
    $db = null;

    if (file_exists($file)) {
        $db = fopen($file, "a") or die("Unable to open file!");

        $filedata = file_get_contents($file);
        $details = json_decode(json_encode($filedata), true);
    }
    else {
        $db = fopen($file, "a") or die("Unable to open file!");
    }

    array_push($details, $key, $value);

    $data = json_encode($details);
    fwrite($db, $data);
}

function dbjson_get($json) {
    $file = $json;
    return file_get_contents($file);
}