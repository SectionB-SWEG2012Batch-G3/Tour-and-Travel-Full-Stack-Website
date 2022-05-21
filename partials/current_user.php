<?php
require_once 'current_user.php';
function current_user()
{
    if (is_loggedin()) {
        return $_SESSION['username'];
    }
    return null;
}
