<?php
require_once 'is_loggedin.php';
require_once 'current_user.php';
require_once 'find_by_username.php';
function if_loggedin()
{
    if (is_loggedin()) {
        $username = current_user();
        $user = find_by_username($username);
        $user_role = $user['role'];
        if ($user_role === 'admin') {
            $to = "http://localhost/Tour-and-Travel-Full-Stack-Website/Admin";
        } else if ($user_role === 'user') {
            $to = "http://localhost/Tour-and-Travel-Full-Stack-Website/user";
        } else if ($user_role === 'tourguide') {
            $to = "http://localhost/Tour-and-Travel-Full-Stack-Website/tourguide/MySchedule.php";
        }
        header("Location: $to");
        exit;
    }
}
