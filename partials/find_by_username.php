<?php

function find_by_username($username)
{
    require_once '../dbconfig/connection.php';
    $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $username);
    $stmt->execute();
    return $stmt->fetch();
}
