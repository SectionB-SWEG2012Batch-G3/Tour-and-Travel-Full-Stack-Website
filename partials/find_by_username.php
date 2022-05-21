<?php
require_once '../dbconfig/connection.php';

function find_by_username($username)
{
    $stmt = $GLOBALS['pdo']->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $username);
    $stmt->execute();
    return $stmt->fetch();
}
