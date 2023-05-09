<?php
$file = fopen("./users.json", "r");

$content = fread($file, filesize("./users.json"));

$file_array = json_decode($content, true);

fclose($file);

foreach ($file_array as $user) {
    echo $user["first_name"] . " | " . $user['last_name'] . ' | ' . $user['age'] . "<br/>";
}
