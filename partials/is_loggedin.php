<?php
function is_loggedin()
{
    return isset($_SESSION['username']);
}
