<?php
require_once 'is_loggedin.php';
require_once 'current_user.php';
require_once '../dbconfig/connection.php';
function require_loggedin()
{
    if (!is_loggedin()) {
        $_SESSION['from'] = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
        header('Location: http://localhost/Tour-and-Travel-Full-Stack-Website/user/log%20in.php');
    } else {
        unset($_SESSION['from']);
        $stmt = $GLOBALS['pdo']->prepare("SELECT role FROM user WHERE email = :email");
        $user = current_user();
        $stmt->bindValue(':email', $user);
        $stmt->execute();
        return $stmt->fetch();
    }
}
