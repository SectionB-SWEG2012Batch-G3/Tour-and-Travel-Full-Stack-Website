<?php
require_once 'is_loggedin.php';
function current_user()
{
    if (is_loggedin()) {
        return $_SESSION['username'];
    }
    return null;
}
