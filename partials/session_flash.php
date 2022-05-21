<?php
function session_flash(...$session_keys)
{
    $data = [];
    foreach ($session_keys as $key) {
        if (isset($_SESSION["$key"])) {
            $data[] = $_SESSION["$key"];
        }
    }

    return $data;
}
