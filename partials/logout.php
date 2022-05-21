<?php
session_start();
include_once 'is_loggedin.php';
var_dump(is_loggedin());
if (is_loggedin()) {
    unset($_SESSION['username'], $_SESSION['user_id']);
    session_destroy();
    header("Location: http://localhost/Tour-and-Travel-Full-Stack-Website/user/log%20in.php");
}
